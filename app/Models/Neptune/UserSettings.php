<?php

namespace App\Models\Neptune;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSettings extends Model
{
    protected $table = 'cms_users_settings';

    protected $fillable = [
        'user_id',
        'home_public',
        'discussions_posts'
    ];

    public $timestamps = false;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
