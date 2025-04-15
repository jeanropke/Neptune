<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    protected $table = 'cms_articles';

    protected $fillable = [
        'url', 'image', 'title', 'short_text', 'long_text', 'author_id', 'author_override', 'publish_date', 'is_deleted', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'created_at'    => 'datetime',
        'publish_date'  => 'datetime'
    ];

    public function getAuthor()
    {
        if ($this->author_override)
            return $this->author_override;

        $user = User::find($this->author_id);
        if ($user)
            return $user->username;
    }

    public function getPublishDate()
    {
        if ($this->publish_date)
            return $this->publish_date;

        return $this->created_at;
    }

    public function getTitle()
    {
        if (Auth::check()) {
            if (user()->hasPermission('can_create_site_news')) {
                if ($this->getPublishDate() > Carbon::now()) {
                    return "[NOT YET RELEASED] {$this->title}";
                }
            }
        }

        return $this->title;
    }
}
