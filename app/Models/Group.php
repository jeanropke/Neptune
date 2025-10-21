<?php

namespace App\Models;

use App\Models\Group\Member;
use App\Models\Group\Thread;
use App\Models\Home\HomeItem;
use App\Models\Home\Sticker;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;

class Group extends Model
{
    protected $table = 'groups_details';

    protected $fillable = [
        'owner_id',
        'name',
        'description',
        'badge',
        'group_type',
        'forum_type',
        'forum_premission',
        'alias',
        'created_at'
    ];

    public $timestamps = false;

    protected $dates = ['created_at'];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function ensureGroupHomeItems()
    {
        if ($this->items->isEmpty()) {
            $defaultItems = [
                // guestbookwidget
                ['x' => 40,  'y' => 34,  'z' => 6, 'sticker_id' => 11100, 'skin' => '1'],
                // groupinfowidget
                ['x' => 433, 'y' => 40,  'z' => 3, 'sticker_id' => 11000, 'skin' => '1']
            ];

            foreach ($defaultItems as $item) {
                Sticker::create(array_merge([
                    'user_id'   => $this->owner_id,
                    'group_id'  => $this->id,
                    'is_placed' => '1'
                ], $item));
            }

            $this->load('items');
        }
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function admins(): HasMany
    {
        return $this->hasMany(Member::class, 'group_id')
            ->where('member_rank', '>=', '2')
            ->with('user');
    }

    public function memberships(): HasMany
    {
        return $this->hasMany(Member::class, 'group_id');
    }

    public function members(): HasMany
    {
        return $this->memberships()
            ->with('user')
            ->join('users', 'groups_memberships.user_id', '=', 'users.id')
            ->orderBy('member_rank')
            ->orderBy('users.username')
            ->select('groups_memberships.*', 'users.username');
    }

    public function pendingMembers()
    {
        return $this->memberships()->where('is_pending', 1)->with('user');
    }

    public function getUrlAttribute(): string
    {
        if ($this->alias) {
            return "groups/{$this->alias}";
        }

        return "groups/{$this->id}/id";
    }

    //->with('replies');
    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class, 'group_id')->with('replies');
    }

    public function filterByUsername(?string $query)
    {
        return $this->members()->where('users.username', 'LIKE', '%' . Str::lower($query) . '%')->get();
    }

    public function getMember($userId = null)
    {
        if ($this->owner_id == $userId)
            return User::find($userId);
        return $this->memberships()->where('user_id', $userId ?? user()->id)->first();
    }

    public function addMember(?int $userId = null): bool
    {
        $userId = $userId ?? auth()->id();

        $member = $this->getMember($userId);

        if ($member) {
            return false;
        }

        $this->members()->create([
            'user_id' => $userId,
            'member_rank' => 1,
        ]);

        return true;
    }

    public function removeMember(?int $userId = null): bool
    {
        $userId = $userId ?? auth()->id();

        $member = $this->getMember($userId);
        if (!$member) {
            return false;
        }

        if ($member->user->favorite_group == $this->id) {
            $member->user->setFavouriteGroup(0);
        }

        $member->delete();

        return true;
    }

    public function makeFavorite($userId = null): bool
    {
        return $this->updateFavoriteGroup($userId, $this->id);
    }

    public function removeFavorite($userId = null): bool
    {
        return $this->updateFavoriteGroup($userId, 0);
    }

    private function updateFavoriteGroup(?int $userId, int $groupId): bool
    {
        $member = $this->getMember($userId ?? user()->id);

        if (! $member || ! $member->user) {
            return false;
        }

        $member->user->setFavouriteGroup($groupId);
        return true;
    }

    public function addTag($tag): string
    {
        $tag = Str::lower($tag);
        if (!$this->tags()->where('tag', $tag)->exists()) {
            $this->tags()->insert([
                'tag'           => $tag,
                'holder_id'     => $this->id,
                'holder_type'   => 'group'
            ]);
            return 'valid';
        }
        return 'invalidtag';
    }

    public function removeTag(string $tag): void
    {
        $this->tags()->where('tag', $tag)->delete();
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Sticker::class, 'group_id')->where('is_placed', '1')->with('store');
    }
}
