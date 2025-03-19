<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WordFilter extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wordfilter';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'replacement', 'hide', 'name', 'report', 'mute'
    ];

    public $incrementing = false;
    public $primaryKey = 'key';
    public $timestamps = false;

}
