<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class StoreCategory extends Model
{
    protected $table = 'cms_homes_store_categories';

    protected $fillable = [
        'caption', 'order_num', 'min_rank', 'type'
    ];

    public $timestamps = false;

    public function getItems() {
        return StoreItem::where('category', $this->id)->get();
    }
}
