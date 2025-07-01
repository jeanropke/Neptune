<?php

namespace App\Models\Neptune;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $table = 'cms_articles';

    protected $fillable = [
        'url',
        'image',
        'title',
        'short_text',
        'long_text',
        'author_id',
        'author_override',
        'publish_date',
        'is_deleted',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'publish_date'  => 'datetime'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getAuthorNameAttribute(): ?string
    {
        return $this->author_override ?: $this->author?->username;
    }

    public function getPublishDateResolvedAttribute()
    {
        return $this->publish_date ?: $this->created_at;
    }

    public function getTitleResolvedAttribute()
    {
        if (user() && user()->hasPermission('can_create_site_news') && $this->publish_date_resolved > now()) {
            return '[NOT YET RELEASED] ' . $this->title;
        }

        return $this->title;
    }
}
