<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsMenu extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_menu';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'url', 'caption', 'icon', 'parent_id', 'order_num'
    ];

    public $timestamps = false;
}
