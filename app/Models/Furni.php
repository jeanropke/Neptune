<?php

namespace App\Models;

use App\Models\Furni\Definition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Furni extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'order_id',
        'user_id',
        'room_id',
        'definition_id',
        'x',
        'y',
        'z',
        'wall_position',
        'rotation',
        'custom_data',
        'is_hidden'
    ];

    public function definition(): BelongsTo
    {
        return $this->belongsTo(Definition::class, 'definition_id');
    }

    public function getSprite(): ?string
    {
        return $this->definition?->getNormalizedName() ?? null;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
