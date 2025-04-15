<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmulatorSetting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'setting', 'value'
    ];

    public $timestamps = false;
    public $primaryKey = 'setting';
}
