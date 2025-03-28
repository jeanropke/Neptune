<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StarterPack extends Model
{
    protected $table = 'cms_starter_packs';

    protected $fillable = [
        'id', 'name', 'image', 'salecode', 'items', 'price', 'enabled'
    ];

    public $timestamps = false;
}
