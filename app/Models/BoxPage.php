<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoxPage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_boxes_pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'box_id', 'page', 'column', 'color'
    ];

    public $timestamps = false;

    public static function getBoxes($page)
    {
        return BoxPage::where('page', $page)->join('cms_boxes', 'cms_boxes_pages.box_id', '=', 'cms_boxes.id')->get();
    }

}