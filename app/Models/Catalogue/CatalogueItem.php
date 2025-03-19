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
    protected $table = 'catalog_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'page_id', 'item_ids', 'catalog_name', 'cost_credits', 'cost_points', 'points_type', 'amount', 'song_id',
        'limited_stack', 'limited_sells', 'extradata', 'club_only', 'have_offer', 'offer_id', 'order_number'
    ];

    public $timestamps = false;

    public function getItemBase()
    {
        if(str_contains($this->item_ids, ';'))
            return Furniture::find($this->id);
        return Furniture::find($this->item_ids);
    }
}
