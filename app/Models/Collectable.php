<?php

namespace App\Models;

use App\Models\Catalogue\CatalogueItem;
use Illuminate\Database\Eloquent\Model;

class Collectable extends Model
{
    protected $table = 'cms_collectables';

    protected $fillable = [
        'id', 'start_at', 'end_at', 'item_id'
    ];

    public function getRemainingTime()
    {
        return $this->end_at - time();
    }

    public function getCatalogueItem()
    {
        return CatalogueItem::find($this->item_id);
    }
}
