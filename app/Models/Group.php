<?php

namespace App\Models;

use App\Models\Group\GroupTopic;
use App\Models\Home\HomeItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Facades\DB;

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

    public function memberships()
    {
        return $this->hasMany(GroupMember::class, 'group_id');
    }

    public function getUrl()
    {
        if ($this->alias)
            return $this->alias;

        return "{$this->id}/id";
    }

    public function getItems()
    {
        return HomeItem::where('group_id', $this->id)->get();
    }

    public function getTopics()
    {
        return GroupTopic::where([['group_id', '=', $this->id], ['is_deleted', '=', '0']])->orderBy('latest_comment', 'DESC')->paginate(10);
    }

    public function getOwner()
    {
        return User::find($this->owner_id);
    }

    public function getAdmins()
    {
        return GroupMember::where([['member_rank', '>=', 2]])->get();
    }

    public function members(): HasMany
    {
        return $this->hasMany(GroupMember::class, 'group_id')
            ->join('users', 'groups_memberships.user_id', '=', 'users.id')
            ->orderBy('member_rank')
            ->orderBy('users.username')
            ->select('groups_memberships.*', 'users.username');
    }

    public function filterByUsername($query = null)
    {
        return $this->members()->where('users.username', 'LIKE', "%$query%")->get();
    }

    public function getMember($userId = null)
    {
        return $this->members()->where('user_id', $userId ?? user()->id)->first();
    }

    public function addMember($userId = null)
    {
        if (!$this->getMember($userId ?? user()->id)) {
            GroupMember::create([
                'group_id'      => $this->id,
                'user_id'       => $userId ?? user()->id,
                'member_rank'   => '1'
            ]);
            return true;
        }

        return false;
    }

    public function removeMember($userId = null)
    {
        $member = $this->getMember($userId ?? user()->id);
        if ($member) {
            if ($member->user->favorite_group == $this->id) {
                $this->removeFavorite($member->user_id);
            }

            GroupMember::where([['group_id', $this->id], ['user_id', $member->user_id]])->delete();

            return true;
        }

        return false;
    }

    public function getPendingMembers()
    {
        $members = GroupMember::where([['group_id', $this->id], ['is_pending', '1']])->join('users', 'user_id', '=', 'users.id')->select(['id', 'username', 'groups_memberships.*'])->get();
        return $members;
    }

    public function makeFavorite($userId = null)
    {
        $member = $this->getMember($userId ?? user()->id);
        if ($member) {
            $member->user->setFavouriteGroup($this->id);
            return true;
        }
        return false;
    }

    public function removeFavorite($userId = null)
    {
        $member = $this->getMember($userId ?? user()->id);
        if ($member) {
            $member->user->setFavouriteGroup(0);
            return true;
        }
        return false;
    }
}
