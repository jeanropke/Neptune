<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupMember extends Model
{
    protected $table = 'groups_memberships';

    protected $fillable = [
        'group_id', 'user_id', 'member_rank', 'is_pending', 'created_at', 'updated_at'
    ];

    public $timestamps = false;

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
