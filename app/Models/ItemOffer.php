<?php

namespace App\Models;

use App\Models\Catalogue\CatalogueItem;
use Illuminate\Database\Eloquent\Model;

class ItemOffer extends Model
{
    protected $table = 'cms_items_offers';

    protected $fillable = [
        'salecode', 'name', 'items', 'price', 'enabled'
    ];

    public $timestamps = false;

    public function isValid()
    {
        $itemsSprites = explode(';', $this->items);
        foreach ($itemsSprites as $sprite) {
            $item = CatalogueItem::where('sale_code', $sprite)->first();
            if (!$item)
                return false;
        }
        return true;
    }

    public function getItems()
    {
        $items = array();
        $itemsSprites = explode(';', $this->items);
        foreach ($itemsSprites as $sprite) {
            $item = CatalogueItem::where('sale_code', $sprite)->first();
            if($item)
                array_push($items, $item);
        }
        return collect($items);
    }
}
