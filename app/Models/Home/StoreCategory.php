<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class StoreCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_homes_store_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'caption', 'parent_id', 'order_num'
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
