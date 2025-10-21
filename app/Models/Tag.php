<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Tag extends Model
{
    protected $table = 'users_tags';

    protected $fillable = [
        'user_id',
        'tag',
        'room_id',
        'group_id',
        'created_at'
    ];

    public $primaryKey = false;

    public $timestamps = false;

    protected $dates = ['created_at'];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function getOwnerAttribute()
    {
        if ($this->user_id && $this->user_id != 0) {
            return $this->user;
        }

        if ($this->room_id && $this->room_id != 0) {
            return $this->room;
        }

        if ($this->group_id && $this->group_id != 0) {
            return $this->group;
        }

        return null;
    }

    public function getOwnerTypeAttribute()
    {
        if ($this->user_id && $this->user_id != 0) {
            return 'user';
        }

        if ($this->room_id && $this->room_id != 0) {
            return 'room';
        }

        if ($this->group_id && $this->group_id != 0) {
            return 'group';
        }

        return null;
    }
}
