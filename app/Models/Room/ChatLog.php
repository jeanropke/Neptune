<?php

namespace App\Models\Room;

use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ChatLog extends Model
{
    protected $table = 'room_chatlogs';

    protected $fillable = [
        'user_id',
        'room_id',
        'timestamp',
        'chat_type',
        'message'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function getRoomNameAttribute()
    {
        return $this->room?->name ?? '<i>Room deleted</i>';
    }

    public function getChatTypeAttribute($value)
    {
        return match ((int)$value) {
            0 => 'Chat',
            1 => 'Shout',
            default => 'Whisper'
        };
    }

    public function getTimestampCarbonAttribute(): ?Carbon
    {
        return $this->timestamp ? Carbon::createFromTimestamp($this->timestamp) : null;
    }
}
