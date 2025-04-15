<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsoleMessage extends Model
{
    protected $table = 'messenger_messages';

    protected $fillable = [
        'receiver_id', 'sender_id', 'unread', 'body', 'date'
    ];

    public $timestamps = false;

    public function getReceiverName()
    {
        $user = User::find($this->receiver_id);
        if ($user)
            return $user->username;
    }

    public function getSenderName()
    {
        $user = User::find($this->sender_id);
        if ($user)
            return $user->username;
    }
}
