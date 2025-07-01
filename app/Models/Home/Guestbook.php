<?php

namespace App\Models\Home;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guestbook extends Model
{
    protected $table = 'cms_homes_guestbook';

    protected $fillable = [
        'user_id',
        'message',
        'widget_id',
        'deleted_by'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function widget(): BelongsTo
    {
        return $this->belongsTo(HomeItem::class, 'widget_id');
    }

    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function getHomeOwner()
    {
        if (!$this->widget) {
            return (object) ['username' => "Widget not found ({$this->widget_id})"];
        }

        return $this->widget->owner;
    }
}
