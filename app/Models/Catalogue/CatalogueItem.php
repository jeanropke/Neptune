<?php

namespace App\Models\Catalogue;

use App\Models\Furniture;
use Illuminate\Database\Eloquent\Model;

class CatalogueItem extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'catalogue_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'page_id', 'sale_code', 'order_id', 'price', 'is_hidden', 'amount', 'definition_id',
        'item_specialspriteid', 'name', 'description', 'is_package', 'package_name', 'package_description'
    ];

    public $timestamps = false;

    public function getItemBase()
    {
        if(str_contains($this->item_ids, ';'))
            return Furniture::find($this->id);
        return Furniture::find($this->item_ids);
    }

    public function getNormalizedName()
    {
        return str_replace('*', '_', $this->sale_code);
    }
}
