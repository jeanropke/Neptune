<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Furni extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'id ', 'order_id', 'user_id', 'room_id', 'definition_id', 'x', 'y', 'z', 'wall_position', 'rotation', 'custom_data', 'is_hidden'
    ];

    public function getSprite()
    {
        $item = ItemDefination::find($this->definition_id);
        if($item)
            return $item->getNormalizedName();
    }

    public function getOwner()
    {
        return User::find($this->user_id);
    }
}
