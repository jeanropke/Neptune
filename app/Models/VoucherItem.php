<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoucherItem extends Model
{
    protected $table = 'vouchers_items';

    protected $fillable = [
        'voucher_code', 'catalogue_sale_code'
    ];

    public $timestamps = false;

}
