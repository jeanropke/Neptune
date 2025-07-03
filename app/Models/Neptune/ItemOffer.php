<?php

namespace App\Models\Neptune;

use App\Models\Catalogue\Item;
use App\Models\Home\StoreItem;
use Illuminate\Database\Eloquent\Model;

class ItemOffer extends Model
{
    protected $table = 'cms_items_offers';

    protected $fillable = [
        'salecode',
        'name',
        'item_ids',
        'price',
        'enabled'
    ];

    public $timestamps = false;

    public function getItemIds(): array
    {
        return array_filter(explode(';', $this->item_ids));
    }

    public function getHomeIds(): array
    {
        return array_filter(explode(';', $this->home_ids));
    }

    public function items()
    {
        return Item::whereIn('id', $this->getItemIds())->get();
    }

    public function storeItems()
    {
        return StoreItem::whereIn('id', $this->getHomeIds())->get();
    }

    public function isValid(): bool
    {
        if (empty($this->item_ids)) {
            return true;
        }

        return Item::whereIn('id', $this->getItemIds())->count() === count($this->getItemIds());
    }
}
