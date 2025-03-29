<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemOffer extends Model
{
    protected $table = 'cms_items_offers';

    protected $fillable = [
        'id', 'salecode', 'items', 'price', 'enabled'
    ];

    public $timestamps = false;
}
