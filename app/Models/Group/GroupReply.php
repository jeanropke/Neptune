<?php

namespace App\Models\Group;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class GroupReply extends Model
{
    protected $table = 'cms_groups_replies';

    protected $fillable = [
        'topic_id', 'user_id', 'message', 'is_edited', 'is_deleted', 'hidden_by_staff'
    ];

    public function getAuthor()
    {
        return User::find($this->user_id);
    }

    public function getTopic()
    {
        $topic = GroupTopic::find($this->topic_id);
        if($topic)
            return $topic;
    }

    public function markAsDeleted()
    {
        if($this->is_deleted) return;

        $this->getAuthor()->getCmsSettings()->decrement('discussions_posts');

        $this->update(['is_deleted' => '1']);
    }
}
