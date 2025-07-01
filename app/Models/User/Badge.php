<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $table = 'users_badges';

    protected $fillable = [
        'user_id',
        'slot_id',
        'badge'
    ];

    public $timestamps = false;
}
