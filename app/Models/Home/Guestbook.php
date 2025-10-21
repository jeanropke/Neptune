<?php

namespace App\Models\Home;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guestbook extends Model
{
    protected $table = 'cms_guestbook_entries';

    protected $fillable = [
        'user_id',
        'message',
        'home_id',
        'group_id',
        'created_at'
    ];

    public $timestamps = false;

    protected $dates = ['created_at'];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function owner(): BelongsTo
    {
        if($this->group_id)
            return $this->belongsTo(Group::class, 'group_id');

        return $this->belongsTo(User::class, 'home_id');
    }
}
