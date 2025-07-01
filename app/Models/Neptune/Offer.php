<?php

namespace App\Models\Neptune;

use Illuminate\Database\Eloquent\Model;

class CmsOffer extends Model
{
    protected $table = 'cms_offers';

    protected $fillable = [
        'name',
        'description',
        'price',
        'reward'
    ];

    public $timestamps = false;
}
