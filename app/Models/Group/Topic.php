<?php

namespace App\Models\Group;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    protected $table = 'cms_groups_topics';

    protected $fillable = [
        'group_id',
        'user_id',
        'subject',
        'views',
        'replies',
        'latest_comment',
        'is_deleted'
    ];

    protected $casts = [
        'is_deleted' => 'boolean',
        'latest_comment' => 'datetime',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class, 'topic_id')->where('is_deleted', false)->with('author');
    }

    public function latestReply()
    {
        return $this->replies()->orderByDesc('created_at')->first();
    }

    public function visibleRepliesPaginated(int $perPage = 10)
    {
        return $this->replies()->where('is_deleted', false)->orderBy('created_at', 'asc')->paginate($perPage);
    }

    public function visibleReplies()
    {
        return $this->replies()->where('is_deleted', false)->orderBy('created_at', 'asc')->get();
    }

    public function markAsDeleted(): void
    {
        if ($this->is_deleted) return;

        $this->update(['is_deleted' => true]);

        $this->visibleReplies()->each->markAsDeleted();
    }
}
