<?php

namespace App\Models\Group;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class GroupTopic extends Model
{
    protected $table = 'cms_groups_topics';

    protected $fillable = [
        'group_id', 'user_id', 'subject', 'views', 'replies', 'latest_comment', 'is_deleted'
    ];

    public function getAuthor()
    {
        return User::find($this->user_id);
    }

    public function getLatestPost()
    {
        return GroupReply::where([['topic_id', '=', $this->id], ['is_deleted', '=', '0']])->orderBy('created_at', 'DESC')->first();
    }

    public function getReplies()
    {
        return GroupReply::where([['topic_id', '=', $this->id], ['is_deleted', '=', '0']])->orderBy('created_at', 'ASC')->paginate(10);
    }

    public function getAllReplies()
    {
        return GroupReply::where([['topic_id', '=', $this->id], ['is_deleted', '=', '0']])->get();
    }

    public function getGroup()
    {
        $group = Group::find($this->group_id);
        if ($group)
            return $group;
    }

    public function markAsDeleted()
    {
        if ($this->is_deleted) return;
        $this->update(['is_deleted' => '1']);

        foreach ($this->getAllReplies() as $reply) {
            $reply->markAsDeleted();
        }
    }
}
