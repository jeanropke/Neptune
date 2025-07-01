<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmuSetting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'setting',
        'value'
    ];

    public $timestamps = false;
    protected $primaryKey = 'setting';
    public $incrementing = false;
}
