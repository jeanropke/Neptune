<?php

namespace App\Models\Group;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    protected $table = 'groups_memberships';

    protected $fillable = [
        'group_id',
        'user_id',
        'member_rank',
        'is_pending',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
