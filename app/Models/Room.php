<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = [
        'owner_id',
        'category',
        'name',
        'description',
        'model',
        'ccts',
        'wallpaper',
        'floor',
        'showname',
        'superusers',
        'accesstype',
        'password',
        'visitors_now',
        'visitors_max',
        'rating',
        'is_hidden'
    ];

    public $timestamps = false;

    public function getState(): string
    {
        return match ($this->accesstype) {
            0 => 'open',
            1 => 'locked',
            2 => 'password',
            default => 'unknown',
        };
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
