<?php

namespace App\Models\Neptune;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'cms_settings';

    protected $fillable = [
        'key',
        'value'
    ];

    public $timestamps = false;
    public $incrementing = false;
    public $primaryKey = 'key';
}
