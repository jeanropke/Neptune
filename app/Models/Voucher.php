<?php

namespace App\Models;

use App\Models\Voucher\Item;
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

    protected $primaryKey = 'voucher_code';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    public function items()
    {
        return $this->hasMany(Item::class, 'voucher_code', 'voucher_code');
    }

    public function groupedItems()
    {
        return $this->items()
            ->select('catalogue_sale_code', DB::raw('COUNT(*) as amount'))
            ->groupBy('catalogue_sale_code')
            ->get();
    }

    public function deleteItems()
    {
        $this->items()->delete();
    }
}
