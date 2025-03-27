<?php

namespace App\Models\Group;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class GroupTopic extends Model
{
    protected $table = 'cms_groups_topics';

    protected $fillable = [
        'id', 'group_id', 'user_id', 'subject', 'views', 'replies', 'latest_comment', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
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
}
