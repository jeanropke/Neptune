<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'camera_web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'user_id', 'room_id', 'timestamp', 'url'
    ];

    public $timestamps = false;

    public function getRoomName()
    {
        $room = Room::find($this->room_id);
        if ($room)
            return $room->name;

        return null;
    }

    public function getUserName()
    {
        $user = User::find($this->user_id);
        if ($user)
            return $user->username;

        return null;
    }

    public function getLikes()
    {
        return PhotoLike::where('photo_id', $this->id)->get();
    }
}
