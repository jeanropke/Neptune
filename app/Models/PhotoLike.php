<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoLike extends Model
{
    protected $table = 'cms_photos_likes';

    protected $fillable = [
        'user_id', 'photo_id', 'liked_at'
    ];

    public $timestamps = false;
    public $incrementing = false;
}
