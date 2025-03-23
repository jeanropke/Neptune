<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoucherHistory extends Model
{
    protected $table = 'vouchers_history';

    protected $fillable = [
        'voucher_code', 'user_id', 'used_at', 'credits_redeemed', 'items_redeemed'
    ];

    public $timestamps = false;

}
