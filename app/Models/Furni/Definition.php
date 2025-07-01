<?php

namespace App\Models\Furni;

use Illuminate\Database\Eloquent\Model;

class Definition extends Model
{
    protected $table = 'items_definitions';

    protected $fillable = [
        'sprite',
        'sprite_id',
        'name',
        'description',
        'colour',
        'length',
        'width',
        'top_height',
        'max_status',
        'behaviour',
        'interactor',
        'is_tradable',
        'is_recyclable',
        'drink_ids'
    ];

    public $timestamps = false;

    public function getNormalizedName()
    {
        return str_replace('*', '_', $this->sprite);
    }
}
