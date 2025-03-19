<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserFriend extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'messenger_friendships';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_one_id', 'user_two_id'
    ];

    public $timestamps = false;
}
