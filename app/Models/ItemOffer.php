<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemOffer extends Model
{
    protected $table = 'cms_items_offers';

    protected $fillable = ['id', 'salecode', 'items', 'price', 'enabled'];

    public $timestamps = false;

    public function isValid()
    {
        $itemsIds = explode(',', $this->items);
        foreach ($itemsIds as $itemId) {
            $item = ItemDefination::find($itemId);
            if (!$item)
                return false;
        }
        return true;
    }
}
