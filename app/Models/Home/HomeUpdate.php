<?php

namespace App\Models\Home;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomeUpdate extends Model
{
    protected $table = 'cms_homes_updates';

    protected $fillable = [
        'user_id',
        'updated_at'
    ];

    protected $primaryKey = 'user_id';

    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
