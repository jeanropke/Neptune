<?php

namespace App\Models\Group;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    protected $table = 'cms_groups_replies';

    protected $fillable = [
        'topic_id',
        'user_id',
        'message',
        'is_edited',
        'is_deleted',
        'hidden_by_staff'
    ];

    protected $casts = [
        'is_edited' => 'boolean',
        'is_deleted' => 'boolean',
        'hidden_by_staff' => 'boolean',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->with('cmsSettings');
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function markAsDeleted(): void
    {
        if ($this->is_deleted) {
            return;
        }

        $this->author?->cmsSettings?->decrement('discussions_posts');

        $this->update(['is_deleted' => true]);
    }
}
