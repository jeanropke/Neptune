<?php

namespace App\Models\Xmas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GiftRequest extends Model
{
    protected $table = 'cms_gift_requests';

    protected $fillable = [
        'username',
        'email',
        'ip_address'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
}
