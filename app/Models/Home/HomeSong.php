<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class HomeSong extends Model
{
    protected $table = 'soundmachine_songs';

    protected $fillable = [
        'user_id', 'title', 'item_id', 'length', 'data', 'burnt'
    ];

    public $timestamps = false;
}
