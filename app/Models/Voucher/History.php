<?php

namespace App\Models\Voucher;

use Illuminate\Database\Eloquent\Model;

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

    public function getItems()
    {
        $items = array();
        if ($this->items_redeemed) {
            foreach (explode('|', $this->items_redeemed) as $data) {
                $explode = explode(',', $data);
                array_push($items, (object)array(
                    'amount'    => $explode[0],
                    'sale_code' => str_replace('*', '_', $explode[1])
                ));
            }
        }
        return collect($items);
    }

    public function getUser()
    {
        $user = User::find($this->user_id);
        if ($user)
            return $user->username;
        return "Missing user id '{$this->user_id}'";
    }
}
