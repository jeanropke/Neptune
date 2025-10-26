<?php

namespace App\Models\Neptune;

use Illuminate\Database\Eloquent\Model;

class Wordfilter extends Model
{
    protected $table = 'wordfilter';

    protected $fillable = [
        'word',
        'is_bannable',
        'is_filterable'
    ];

    public $timestamps = false;
}
