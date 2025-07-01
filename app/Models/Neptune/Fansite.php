<?php

namespace App\Models\Neptune;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fansite extends Model
{
    protected $table = 'cms_fansites';

    protected $fillable = [
        'url',
        'name',
        'description',
        'image',
        'created_by'
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
