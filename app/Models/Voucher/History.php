<?php

namespace App\Models\Voucher;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class History extends Model
{
    protected $table = 'vouchers_history';

    protected $fillable = [
        'voucher_code',
        'user_id',
        'used_at',
        'credits_redeemed',
        'items_redeemed'
    ];

    public $timestamps = false;

    public function getItemsAttribute(): Collection
    {
        return collect(explode('|', $this->items_redeemed))
            ->filter()
            ->map(function ($data) {
                [$amount, $saleCode] = explode(',', $data);
                return (object)[
                    'amount'    => (int) $amount,
                    'sale_code' => str_replace('*', '_', $saleCode)
                ];
            });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
