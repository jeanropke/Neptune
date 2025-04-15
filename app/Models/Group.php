<?php

namespace App\Models;

use App\Models\Group\GroupTopic;
use App\Models\Home\HomeItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'cms_groups';

    protected $fillable = [
        'user_id', 'name', 'description', 'badge', 'url', 'date_created'
    ];

    public $timestamps = false;

    public function getUrl()
    {
        if($this->url)
            return $this->url;

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
        return User::find($this->user_id);
    }

    public function getAdmins()
    {
        return GroupMember::where([['level_id', '<=', 2]])->get();
    }

    public function getMembers()
    {
        return GroupMember::where([['user_id', '=', $this->id]])->get();
    }

}
