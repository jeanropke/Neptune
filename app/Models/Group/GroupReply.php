<?php

namespace App\Models\Group;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class GroupReply extends Model
{
    protected $table = 'cms_groups_replies';

    protected $fillable = [
        'id', 'topic_id', 'user_id', 'message', 'is_edited', 'is_deleted', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function getAuthor()
    {
        return User::find($this->user_id);
    }
}
