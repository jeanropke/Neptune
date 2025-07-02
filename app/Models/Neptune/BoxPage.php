<?php

namespace App\Models\Neptune;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BoxPage extends Model
{
    protected $table = 'cms_boxes_pages';

    protected $fillable = [
        'box_id',
        'page',
        'column',
        'color'
    ];

    public $timestamps = false;

    public static function getBoxes($page)
    {
        return BoxPage::where('page', $page)->join('cms_boxes', 'cms_boxes_pages.box_id', '=', 'cms_boxes.id')->get();
    }

    public function box(): BelongsTo {
        return $this->belongsTo(Box::class, 'box_id');
    }
}
