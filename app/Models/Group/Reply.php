<?php

namespace App\Models\Group;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    protected $table = 'cms_forum_replies';

    protected $fillable = [
        'thread_id',
        'message',
        'poster_id',
        'is_edited',
        'is_deleted'
    ];

    public $timestamps = false;

    protected $casts = [
        'created_at'    => 'datetime',
        'modified_at'   => 'datetime',
        'is_edited'     => 'boolean',
        'is_deleted'    => 'boolean'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'poster_id');
    }

    public function thread(): BelongsTo
    {
        return $this->belongsTo(Topic::class, 'thread_id');
    }

    public function markAsDeleted()
    {
        if ($this->is_deleted) {
            return;
        }

        $this->load('author.cmsSettings');

        $this->update(['is_deleted' => true]);
    }
}
