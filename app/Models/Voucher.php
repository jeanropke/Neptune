<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Voucher extends Model
{
    protected $table = 'vouchers';

    protected $fillable = [
        'voucher_code',
        'credits',
        'expiry_date',
        'is_single_use'
    ];

    public $primaryKey = 'voucher_code';

    public $timestamps = false;

    public function getItems()
    {
        return VoucherItem::where('voucher_code', $this->voucher_code)->get();
    }

    public function deleteItems() {
        DB::table('vouchers_items')->where('voucher_code', $this->voucher_code)->delete();
    }
}
