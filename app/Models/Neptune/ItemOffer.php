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

    public function isValid(): bool
    {
        if (empty($this->item_ids)) {
            return true;
        }

        return collect(explode(';', $this->item_ids))
            ->every(fn($id) => Item::find($id));
    }

    public function getItems()
    {
        return collect(explode(';', $this->item_ids))
            ->map(fn($id) => Item::find($id))
            ->filter();
    }

    public function getHomeItems()
    {
        if (empty($this->home_ids)) {
            return collect();
        }

        return collect(explode(';', $this->home_ids))
            ->map(fn($id) => StoreItem::find($id))
            ->filter();
    }
}
