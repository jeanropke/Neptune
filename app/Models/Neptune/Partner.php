<?php

namespace App\Models\Neptune;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Partner extends Model
{
    protected $table = 'cms_partners';

    protected $fillable = [
        'title',
        'description',
        'image',
        'url',
        'enabled',
        'order_num',
        'created_by'
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
