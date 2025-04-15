<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    protected $table = 'cms_homes_guestbook';

    protected $fillable = [
        'user_id', 'message', 'widget_id', 'is_deleted', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
