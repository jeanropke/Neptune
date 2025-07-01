<?php

namespace App\Models;

use App\Models\Group\Member;
use App\Models\Group\Topic;
use App\Models\Home\HomeItem;
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
        'alias'
    ];

    public function ensureGroupHomeItems()
    {
        if ($this->items->isEmpty()) {
            $defaultItems = [
                // guestbookwidget
                ['x' => 40,  'y' => 34,  'z' => 6, 'item_id' => 12, 'skin' => 'defaultskin'],
                // groupinfowidget
                ['x' => 433, 'y' => 40,  'z' => 3, 'item_id' => 13, 'skin' => 'defaultskin'],
                // bg_pattern_abstract2
                ['x' => 0,   'y' => 0,   'z' => 0, 'item_id' => 28, 'data' => 'background']
            ];

            foreach ($defaultItems as $item) {
                HomeItem::create(array_merge([
                    'owner_id' => $this->owner_id,
                    'group_id' => $this->id
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
            return "/groups/{$this->alias}";
        }

        return "/groups/{$this->id}/id";
    }

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class)->where('is_deleted', false);
    }

    public function filterByUsername(?string $query)
    {
        return $this->members()->where('users.username', 'LIKE', '%' . Str::lower($query) . '%')->get();
    }

    public function getMember($userId = null)
    {
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

    public function tags(): MorphMany
    {
        return $this->morphMany(Tag::class, 'holder');
    }

    public function items(): HasMany
    {
        return $this->hasMany(HomeItem::class, 'group_id')->with('store');
    }
}
