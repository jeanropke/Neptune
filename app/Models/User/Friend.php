<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table = 'messenger_friends';

    protected $fillable = [
        'from_id',
        'to_id'
    ];
}
