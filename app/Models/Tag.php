<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tag extends Model
{
    protected $table = 'cms_tags';

    protected $fillable = [
        'tag', 'holder_id', 'holder_type'
    ];

    public $primaryKey = false;

    public $timestamps = false;

    public function holder(): BelongsTo
    {
        if ($this->holder_type == 'user')
            return $this->belongsTo(User::class, 'holder_id');

        return $this->belongsTo(Group::class, 'holder_id');
    }
}
