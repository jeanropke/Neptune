<?php

namespace App\Models\Catalogue;

use Illuminate\Database\Eloquent\Model;

class CataloguePackage extends Model
{
    protected $table = 'catalogue_packages';

    protected $fillable = [
        'id', 'salecode', 'definition_id', 'special_sprite_id', 'amount'
    ];

    public $timestamps = false;
}
