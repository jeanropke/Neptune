<?php

namespace App\Models\Catalogue;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    protected $table = 'catalogue_pages';

    protected $fillable = [
        'order_id',
        'min_role',
        'index_visible',
        'is_club_only',
        'name_index',
        'link_list',
        'name',
        'layout',
        'image_headline',
        'image_teasers',
        'body',
        'label_pick',
        'label_extra_s',
        'label_extra_t'
    ];

    public $timestamps = false;

    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'page_id');
    }
}
