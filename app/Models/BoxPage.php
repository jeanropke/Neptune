<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoxPage extends Model
{
    protected $table = 'cms_boxes_pages';

    protected $fillable = [
        'box_id', 'page', 'column', 'color'
    ];

    public $timestamps = false;

    public static function getBoxes($page)
    {
        return BoxPage::where('page', $page)->join('cms_boxes', 'cms_boxes_pages.box_id', '=', 'cms_boxes.id')->get();
    }

    public function getTitle()
    {
        $box = Box::find($this->box_id);
        if($box)
            return $box->title;

        return "Box {$this->box_id} not found!";
    }

}
