<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class HomeRating extends Model
{
    protected $table = 'cms_homes_rating';

    protected $fillable = [
        'user_id', 'home_id', 'rating'
    ];

    public $timestamps = false;
}
