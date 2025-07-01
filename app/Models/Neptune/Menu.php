<?php

namespace App\Models\Neptune;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'cms_menu';

    protected $fillable = [
        'url',
        'caption',
        'icon',
        'parent_id',
        'order_num',
        'min_rank'
    ];

    public $timestamps = false;

    public function getSubmenus()
    {
        return CmsMenu::where('parent_id', $this->id)->get();
    }
}
