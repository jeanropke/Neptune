<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = [
        'owner_id', 'category', 'name', 'description', 'model', 'ccts', 'wallpaper', 'floor', 'showname', 'superusers', 'accesstype', 'password', 'visitors_now', 'visitors_max', 'rating', 'is_hidden'
    ];

    public $timestamps = false;

    public function getState()
    {
        switch($this->accesstype)
        {
            case 0:
                return 'open';
            case 1:
                return 'locked';
            case 2:
                return 'password';
        }
    }

    public function getOwner()
    {
        $user = User::find($this->owner_id);
        if ($user)
            return $user->username;

        return "Owner ID {$this->owner_id}";
    }
}
