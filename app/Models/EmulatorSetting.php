<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmulatorSetting extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'setting', 'value'
    ];

    public $timestamps = false;
    public $primaryKey = 'setting';
}
