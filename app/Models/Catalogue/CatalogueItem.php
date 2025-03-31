<?php

namespace App\Models\Catalogue;

use Illuminate\Database\Eloquent\Model;

class CatalogueItem extends Model
{
    protected $table = 'catalogue_items';

    protected $fillable = [
        'id', 'page_id', 'sale_code', 'order_id', 'price', 'is_hidden', 'amount', 'definition_id',
        'item_specialspriteid', 'name', 'description', 'is_package', 'package_name', 'package_description'
    ];

    public $timestamps = false;

    public function getNormalizedName()
    {
        return str_replace('*', '_', $this->sale_code);
    }
}
