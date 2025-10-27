<?php

namespace App\Models\Neptune;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $table = 'cms_menu';

    protected $fillable = [
        'url',
        'caption',
        'icon',
        'parent_id',
        'order_num',
        'min_rank',
        'visible'
    ];

    public $timestamps = false;

    public function submenus(): HasMany
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
}
