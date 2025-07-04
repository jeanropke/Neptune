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
        'color',
        'type'
    ];

    public $timestamps = false;

    public function box(): BelongsTo {
        return $this->belongsTo(Box::class, 'box_id');
    }
}
