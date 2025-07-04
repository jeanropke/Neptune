<?php

namespace App\Models\Catalogue;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'catalogue_packages';

    protected $fillable = [
        'salecode', 'definition_id', 'special_sprite_id', 'amount'
    ];

    public $timestamps = false;
}
