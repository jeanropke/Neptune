<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsOffer extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cms_offers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'description', 'price', 'reward'
    ];

    public $timestamps = false;



}
