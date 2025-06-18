<?php

namespace App\Models\Habbowood;

use Illuminate\Database\Eloquent\Model;

class MovieRating extends Model
{
    protected $table = 'cms_habbowood_movies_ratings';

    protected $fillable = [
        'user_id', 'movie_id', 'rating'
    ];

    public $timestamps = false;
    public $primaryKey = false;
}
