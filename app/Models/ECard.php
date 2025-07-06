<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ECard extends Model
{
    protected $table = 'cms_ecards';

    protected $fillable = [
        'body',
        'username',
        'receiver_name',
        'receiver_email',
        'sender_email',
        'type',
        'lang'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
}
