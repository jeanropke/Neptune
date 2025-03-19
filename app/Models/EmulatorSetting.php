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
    protected $table = 'emulator_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'value'
    ];

    public $timestamps = false;
    public $primaryKey = "key";

    public static function getsSetting($key)
    {
        return EmulatorSetting::where('key', $key)->first()->value;
    }
}
