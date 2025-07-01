<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    protected $table = 'users_bans';

    protected $fillable = [
        'ban_type',
        'banned_value',
        'message',
        'banned_until'
    ];

    public $timestamps = false;

    protected $primaryKey = 'banned_value';
}
