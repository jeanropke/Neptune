<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBan extends Model
{
    protected $table = 'users_bans';

    protected $fillable = [
        'ban_type', 'banned_value', 'message', 'banned_until'
    ];

    public $timestamps = false;

    protected $primaryKey = false;

}
