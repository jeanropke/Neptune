<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IPLog extends Model
{
    protected $table = 'users_ip_logs';

    protected $fillable = [
        'user_id',
        'ip_address',
        'created_at'
    ];

    protected $primaryKey = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
