<?php

namespace App\Models;

use App\Models\Catalogue\CatalogueItem;
use App\Models\Home\StoreItem;
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
        if(!$this->item_ids) return true;

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

    public function getHomeItems()
    {
        $items = array();
        foreach (explode(';', $this->home_ids) as $home_id) {
            $item = StoreItem::find($home_id);
            if($item)
                array_push($items, $item);
        }
        return collect($items);
    }
}
