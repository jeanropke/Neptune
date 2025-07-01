<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StoreCategory extends Model
{
    protected $table = 'cms_homes_store_categories';

    protected $fillable = [
        'caption',
        'order_num',
        'min_rank',
        'type'
    ];

    public $timestamps = false;

    public function items(): HasMany
    {
        return $this->hasMany(StoreItem::class, 'category', 'id');
    }
}
