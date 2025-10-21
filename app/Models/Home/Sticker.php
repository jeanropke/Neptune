<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sticker extends Model
{
    protected $table = 'cms_stickers';

    protected $fillable = [
        'user_id',
        'x',
        'y',
        'z',
        'sticker_id',
        'skin_id',
        'group_id',
        'text',
        'is_placed',
        'extra_data'
    ];

    public $timestamps = false;

    public function getShortType(): ?string
    {
        return $this->store?->type;
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(StickerStore::class, 'sticker_id');
    }

    public function getSkinNameAttribute(): ?string
    {
        return match ((int) $this->skin_id) {
            2 => 'speechbubbleskin',
            3 => 'metalskin',
            4 => 'noteitskin',
            5 => 'notepadskin',
            6 => 'goldenskin',
            7 => 'hc_machineskin',
            8 => 'hc_pillowskin',
            9 => 'nakedskin',
            default => 'defaultskin',
        };
    }

    public function getFullType(): string
    {
        $type = $this->store?->type;

        return match ($type) {
            'b' => 'Backgrounds',
            's' => 'Stickers',
            'w' => 'Widgets',
            'commodity' => 'Commodity',
            default => ($type ? "{$type} not found?" : 'Unknown'),
        };
    }
}
