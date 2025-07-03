<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function getDateCarbonAttribute(): ?Carbon
    {
        return $this->date ? Carbon::createFromTimestamp($this->date) : null;
    }
}
