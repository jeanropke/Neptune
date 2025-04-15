<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class StoreCategory extends Model
{
    protected $table = 'cms_homes_store_categories';

    protected $fillable = [
        'caption', 'parent_id', 'order_num'
    ];

    public $timestamps = false;

    public function getChildrens()
    {
        return StoreCategory::where('parent_id', $this->id)->get();
    }

    public function getItems() {
        return StoreItem::where('category', $this->id)->get();
    }
}
