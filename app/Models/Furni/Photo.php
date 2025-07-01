<?php

namespace App\Models\Furni;

use App\Models\Furni;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    protected $table = 'items_photos';

    protected $fillable = [
        'photo_id',
        'photo_user_id',
        'timestamp',
        'photo_data',
        'photo_checksum'
    ];

    protected $primaryKey = 'photo_id';
    public $timestamps = false;

    public function getData()
    {
        return (object)[
            'date' => Carbon::parse($this->timestamp),
            'text' => $this->furni ? substr($this->furni->custom_data, 20) : ''
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'photo_user_id');
    }

    public function furni(): BelongsTo
    {
        return $this->belongsTo(Furni::class, 'photo_id');
    }
}
