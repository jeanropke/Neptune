<?php

namespace App\Models\Neptune;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $table = 'site_articles';

    protected $fillable = [
        'title',
        'short_story',
        'full_story',
        'author_id',
        'author_override',
        'topstory',
        'topstory_override',
        'article_image',
        'is_published',
        'is_future_published',
        'views',
        'created_at'
    ];

    public $timestamps = false;

    protected $dates = ['created_at'];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getAuthorNameAttribute(): ?string
    {
        return $this->author_override ?: $this->author?->username;
    }

    public function getTopstoryImageAttribute(): ?string
    {
        return $this->topstory_override ?: cms_config('site.web.url') . '/images/top_story_images/' . $this->topstory . '.gif';
    }

    public function getShortTextAttribute(): ?string
    {
        return str_replace(["\r", "\n"], '', $this->short_story);
    }

    public function getTitleResolvedAttribute()
    {
        if (user() && user()->hasPermission('can_create_site_news') && $this->is_future_published) {
            return '[NOT YET RELEASED] ' . $this->title;
        }

        return $this->title;
    }
}
