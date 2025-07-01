<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Tag extends Model
{
    protected $table = 'cms_tags';

    protected $fillable = [
        'tag',
        'holder_id',
        'holder_type'
    ];

    public $primaryKey = false;

    public $timestamps = false;

    public function holder(): MorphTo
    {
        return $this->morphTo();
    }

}
