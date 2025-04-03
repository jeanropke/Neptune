<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomChatLog extends Model
{
    protected $table = 'room_chatlogs';

    protected $fillable = [
        'user_id',
        'room_id',
        'timestamp',
        'chat_type',
        'message'
    ];

    public function getUsername()
    {
        $user = User::find($this->user_id);
        if ($user)
            return $user->username;
    }

    public function getRoomName()
    {
        $room = Room::find($this->room_id);
        if ($room)
            return $room->name;
        return '<i>Room deleted</i>';
    }

    public function getChatType()
    {
        switch ($this->chat_type) {
            case 0:
                return 'Chat';
            case 1:
                return 'Shout';
            default:
            case 2:
                return 'Whisper';
        }
    }
}
