<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    protected $table = 'cms_groups_members';

    protected $fillable = [
        'group_id', 'user_id', 'level_id', 'member_since'
    ];

    public $timestamps = false;

}
