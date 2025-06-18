<?php

namespace App\Models\Habbowood;

use Illuminate\Database\Eloquent\Model;

class MovieView extends Model
{
    protected $table = 'cms_habbowood_movies_views';

    protected $fillable = [
        'ip_address', 'movie_id'
    ];

    public $primaryKey = false;
}
