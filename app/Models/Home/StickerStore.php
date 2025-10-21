<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class StickerStore extends Model
{
    protected $table = 'cms_stickers_catalogue';

    protected $fillable = [
        'name',
        'description',
        'type',
        'data',
        'price',
        'amount',
        'category_id',
        'min_rank',
        'widget_type'
    ];

    public $timestamps = false;

    public function getShortTypeAttribute(): string
    {
        return match ((int) $this->type) {
            2       => 'w', //widgets
            4       => 'b', //backgrounds
            5       => 'w', //group widgets
            default => 's'  //stickers
        };
    }

    public function getFullType(): string
    {
        switch ($this->type) {
            case 'b':
                return 'background';
            case 's':
                return 'sticker';
            case 'w':
                return 'widget';
            case 'commodity':
                return 'note';
            default:
                return $this->type . ' not found?';
        }
    }
}
