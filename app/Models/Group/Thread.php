<?php

namespace App\Models\Group;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model
{
    protected $table = 'cms_forum_threads';

    protected $fillable = [
        'topic_title',
        'poster_id',
        'is_open',
        'is_stickied',
        'views',
        'group_id',
        'created_at',
        'modified_at'
    ];

    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime',
        'modified_at' => 'datetime',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'poster_id');
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function reply() {
        return $this->hasOne(Reply::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class, 'thread_id');
    }

    public function latestReply()
    {
        return $this->replies()->orderByDesc('created_at')->first();
    }

    public function visibleRepliesPaginated(int $perPage = 10)
    {
        return $this->replies()->where('is_deleted', false)->with('author')->orderBy('created_at', 'asc')->paginate($perPage);
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
