<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class HabbowoodMovie extends Model
{
    protected $table = 'cms_habbowood_movies';

    protected $fillable = [
        'title', 'author_id', 'genre', 'views'
    ];

    public function getAuthor()
    {
        return User::find($this->author_id);
    }
}
