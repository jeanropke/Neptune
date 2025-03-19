<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class HomeRating extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_homes_rating';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'home_id', 'rating'
    ];

    public $timestamps = false;


}
