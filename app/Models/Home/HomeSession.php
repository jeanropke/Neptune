<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class HomeSession extends Model
{
    protected $table = 'homes_edit_sessions';

    protected $fillable = [
        'user_id', 'expire'
    ];

    public $timestamps = false;

    protected $primaryKey = 'user_id';
}
