<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'guilds';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'name', 'description', 'room_id', 'badge', 'date_created'
    ];

    public $timestamps = false;

}
