<?php

namespace App\Models\Neptune;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Box extends Model
{
    protected $table = 'cms_boxes';

    protected $fillable = [
        'title',
        'content',
        'requirement',
        'created_by'
    ];

    public $timestamps = false;

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
