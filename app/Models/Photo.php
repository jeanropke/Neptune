<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'items_photos';

    public $primaryKey = 'photo_id';

    protected $fillable = [
        'photo_id', 'photo_user_id', 'timestamp', 'photo_data', 'photo_checksum'
    ];

    public $timestamps = false;

    public function getUserName()
    {
        $user = User::find($this->photo_user_id);
        if ($user)
            return $user->username;

        return null;
    }

    public function getLikes()
    {
        return PhotoLike::where('photo_id', $this->id)->get();
    }
}
