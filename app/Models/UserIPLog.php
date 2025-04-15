<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserIPLog extends Model
{
    protected $table = 'users_ip_logs';

    protected $fillable = [
        'user_id', 'ip_address', 'created_at'
    ];

    protected $primaryKey = false;

}
