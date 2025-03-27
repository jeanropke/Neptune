<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsUserSettings extends Model
{
    protected $table = 'cms_users_settings';

    protected $fillable = [
        'id', 'user_id', 'home_public', 'favorite_group', 'discussions_posts'
    ];

    public $timestamps = false;
}
