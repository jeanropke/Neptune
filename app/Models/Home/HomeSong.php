<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class HomeSong extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'soundmachine_songs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'title', 'item_id', 'length', 'data', 'burnt'
    ];

    public $timestamps = false;
}
