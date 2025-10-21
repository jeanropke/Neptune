<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StickerCategory extends Model
{
    protected $table = 'cms_stickers_categories';

    protected $fillable = [
        'name',
        'min_rank',
        'category_type'
    ];

    public $timestamps = false;

    public function items(): HasMany
    {
        return $this->hasMany(StickerStore::class, 'category_id');
    }
}
