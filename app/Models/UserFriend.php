<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFriend extends Model
{

    protected $table = 'messenger_friends';

    protected $fillable = [
        'from_id', 'to_id'
    ];
}
