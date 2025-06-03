<?php

namespace App\Models;

use App\Models\Catalogue\CatalogueItem;
use Illuminate\Database\Eloquent\Model;

class ItemOffer extends Model
{
    protected $table = 'cms_items_offers';

    protected $fillable = [
        'salecode', 'name', 'item_ids', 'price', 'enabled'
    ];

    public $timestamps = false;

    public function isValid()
    {
        foreach (explode(';', $this->item_ids) as $item_id) {
            $item = CatalogueItem::find($item_id);
            if (!$item)
                return false;
        }
        return true;
    }

    public function getItems()
    {
        $items = array();
        foreach (explode(';', $this->item_ids) as $item_id) {
            $item = CatalogueItem::find($item_id);
            if($item)
                array_push($items, $item);
        }
        return collect($items);
    }
}
