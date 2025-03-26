<?php

namespace App\Models\Group;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class GroupTopic extends Model
{
    protected $table = 'cms_groups_topics';

    protected $fillable = [
        'id', 'group_id', 'user_id', 'title', 'content', 'views', 'replies', 'created_at', 'updated_at'
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
