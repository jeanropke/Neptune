<?php

namespace App\Models;

use App\Models\Group\GroupTopic;
use App\Models\Home\HomeItem;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups_details';

    protected $fillable = [
        'owner_id', 'name', 'description', 'badge', 'group_type', 'forum_type', 'forum_premission', 'alias'
    ];

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

    public function getMembers()
    {
        return GroupMember::where([['group_id', '=', $this->id]])->get();
    }
}
