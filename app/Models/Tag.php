<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'cms_tags';

    protected $fillable = [
        'tag', 'holder_id', 'holder_type'
    ];

    public $primaryKey = false;

    public $timestamps = false;
}
