<?php

namespace App\Models;

use App\Models\Voucher\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Voucher extends Model
{
    protected $table = 'vouchers';

    protected $fillable = [
        'voucher_code', 'credits', 'expiry_date', 'is_single_use'
    ];

    public $primaryKey = 'voucher_code';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    public function items()
    {
        return $this->hasMany(Item::class, 'voucher_code', 'voucher_code');
    }

    public function getGroupedItems()
    {
        return $this->items()
            ->select('catalogue_sale_code', DB::raw('COUNT(catalogue_sale_code) AS amount'))
            ->groupBy('catalogue_sale_code')
            ->get();
    }

    public function deleteItems()
    {
        $this->items()->delete();
    }
}
