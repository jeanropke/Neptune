<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'users_transactions';

    protected $fillable = [
        'user_id',
        'item_id',
        'catalogue_id',
        'amount',
        'description',
        'credit_cost',
        'pixel_cost',
        'is_visible',
    ];

    public $timestamps = false;

    protected $dates = ['created_at'];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
