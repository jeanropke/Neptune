<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    protected $table = 'homes_details';

    protected $fillable = [
        'user_id',
        'background'
    ];

    public $timestamps = false;

    protected $primaryKey = 'user_id';
}
