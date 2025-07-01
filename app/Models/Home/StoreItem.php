<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class StoreItem extends Model
{
    protected $table = 'cms_homes_store_items';

    protected $fillable = [
        'caption',
        'class',
        'category',
        'price',
        'type'
    ];

    public $timestamps = false;

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
