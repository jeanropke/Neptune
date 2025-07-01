<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConsoleMessage extends Model
{
    protected $table = 'messenger_messages';

    protected $fillable = [
        'receiver_id',
        'sender_id',
        'unread',
        'body',
        'date'
    ];

    public $timestamps = false;

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function getReceiverName(): ?string
    {
        return $this->receiver?->username;
    }

    public function getSenderName(): ?string
    {
        return $this->sender?->username;
    }
}
