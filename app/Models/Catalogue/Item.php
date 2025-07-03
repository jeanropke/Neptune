<?php

namespace App\Models\Catalogue;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    protected $table = 'catalogue_items';

    protected $fillable = [
        'page_id',
        'sale_code',
        'order_id',
        'price',
        'is_hidden',
        'amount',
        'definition_id',
        'item_specialspriteid',
        'name',
        'description',
        'is_package',
        'package_name',
        'package_description'
    ];

    public $timestamps = false;

    public function getNormalizedName()
    {
        return str_replace('*', '_', $this->sale_code);
    }

    public function getName(): string
    {
        return $this->is_package ? $this->package_name : $this->name;
    }

    public function getDescription(): string
    {
        return $this->is_package ? $this->package_description : $this->description;
    }

     public function package(): HasOne
    {
        return $this->hasOne(Package::class, 'salecode', 'sale_code');
    }
}
