<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class HomeSession extends Model
{
    protected $table = 'cms_homes_sessions';

    protected $fillable = [
        'user_id', 'home_id', 'group_id', 'expires_at'
    ];

    public $timestamps = false;

    protected $primaryKey = 'user_id';
}
