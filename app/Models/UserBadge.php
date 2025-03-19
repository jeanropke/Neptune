<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBadge extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_badges';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'slot_id', 'badge_code'
    ];

    public $timestamps = false;

}
