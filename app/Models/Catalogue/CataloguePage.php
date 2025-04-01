<?php

namespace App\Models\Catalogue;

use Illuminate\Database\Eloquent\Model;

class CataloguePage extends Model
{
    protected $table = 'catalogue_pages';

    protected $fillable = [
        'id', 'order_id', 'min_role', 'index_visible', 'is_club_only', 'name_index', 'link_list', 'name',
        'layout', 'image_headline', 'image_teasers', 'body', 'label_pick', 'label_extra_s', 'label_extra_t'
    ];

    public $timestamps = false;

    public function getCatalogueItems()
    {
        return CatalogueItem::where('page_id', $this->id)->get();
    }
}
