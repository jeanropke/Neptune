<?php

namespace App\Models;

use App\Models\Group\GroupTopic;
use App\Models\Home\HomeItem;
use Illuminate\Database\Eloquent\Model;
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

    public function getMembers($query = null)
    {
        $membersFromGroupMembers = DB::table('groups_memberships')
            ->join('users', 'user_id', '=', 'users.id')
            ->where([['group_id', $this->id], ['is_pending', '0']])
            ->select([
                'users.id AS user_id',
                'username',
                'member_rank'
            ]);

        $owner = DB::table('groups_details')
            ->join('users', 'owner_id', '=', 'users.id')
            ->where('groups_details.id', $this->id)
            ->select([
                'users.id AS user_id',
                'username',
                DB::raw("'3' as member_rank")
            ])->where('username', 'LIKE', "%$query%");

        $results = $membersFromGroupMembers
            ->union($owner)
            ->orderBy('member_rank', 'DESC')
            ->orderBy('username')
            ->where('username', 'LIKE', "%$query%")
            ->get();

        return GroupMember::hydrate($results->toArray());
    }

    public function getMember($userId = null)
    {
        return $this->getMembers()->where('user_id', $userId ?? user()->id)->first();
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
        if ($this->getMember($userId ?? user()->id)) {
            $user = User::find($userId ?? user()->id);
            GroupMember::where([['group_id', $this->id], ['user_id', $user->id]])->delete();

            $setting = $user->getCmsSettings();
            if ($setting) {
                if ($setting->favorite_group == $this->id) {
                    $setting->update(['favorite_group' => null]);
                }
            }
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
            $setting = $member->getUser()->getCmsSettings();
            if ($setting) {
                $setting->update(['favorite_group' => $this->id]);
                return true;
            }
            return false;
        }
        return false;
    }

    public function removeFavorite($userId = null)
    {
        $member = $this->getMember($userId ?? user()->id);
        if ($member) {
            $setting = $member->getUser()->getCmsSettings();
            if ($setting) {
                $setting->update(['favorite_group' => null]);
                return true;
            }
            return false;
        }
        return false;
    }
}
