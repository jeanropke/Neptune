<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAchievement extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_achievements';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'achievement_name', 'progress'
    ];

    public $timestamps = false;

}