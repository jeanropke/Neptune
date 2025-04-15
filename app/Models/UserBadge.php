<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBadge extends Model
{
    protected $table = 'users_badges';

    protected $fillable = [
        'user_id', 'slot_id', 'badge_code'
    ];

    public $timestamps = false;

}
