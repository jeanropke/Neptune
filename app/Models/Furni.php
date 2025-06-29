<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Furni extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'order_id', 'user_id', 'room_id', 'definition_id', 'x', 'y', 'z', 'wall_position', 'rotation', 'custom_data', 'is_hidden'
    ];

    public function getSprite()
    {
        $item = ItemDefination::find($this->definition_id);
        if($item)
            return $item->getNormalizedName();
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
