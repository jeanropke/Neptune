<?php

namespace App\Models\Staff;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    protected $table = 'cms_stafflogs';

    protected $fillable = [
       'user_id', 'page', 'message', 'ip_address'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
