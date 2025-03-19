<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_bans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ban_type', 'banned_value', 'message', 'banned_until'
    ];

    public $timestamps = false;

    protected $primaryKey = false;

}
