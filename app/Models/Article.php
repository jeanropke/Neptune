<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'url', 'image', 'title', 'short_text', 'long_text', 'author_id', 'author_override', 'is_deleted', 'created_at', 'updated_at'
    ];
}
