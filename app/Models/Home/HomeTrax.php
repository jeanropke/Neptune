<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class HomeTrax extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'soundtracks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'author', 'track'
    ];

    public $timestamps = false;


}