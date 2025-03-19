<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuildMember extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'guilds_members';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'guild_id', 'user_id', 'level_id', 'member_since'
    ];

    public $timestamps = false;

}
