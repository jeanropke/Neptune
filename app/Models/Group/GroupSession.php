<?php

namespace App\Models\Group;

use Illuminate\Database\Eloquent\Model;

class GroupSession extends Model
{
    protected $table = 'groups_edit_sessions';

    protected $fillable = [
        'user_id', 'group_id', 'expire'
    ];

    public $incrementing = false;
    protected $primaryKey = null;
    public $timestamps = false;
}
