<?php

namespace App\Models\Catalogue;

use Illuminate\Database\Eloquent\Model;

class CataloguePage extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'catalog_pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'parent_id', 'caption_save', 'caption', 'icon_color', 'icon_image', 'visible', 'enabled',
        'min_rank', 'club_only', 'order_num', 'page_layout', 'page_headline', 'page_teaser', 'page_special',
        'page_text1', 'page_text2', 'page_text_details', 'page_text_teaser', 'vip_only', 'includes', 'room_id'
    ];

    public $timestamps = false;
}
