<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $table = 'users_statistics';

    protected $fillable = [
        'user_id',
        'guestbook_unread_messages',
        'battleball_score_all_time',
        'snowstorm_score_all_time',
        'wobble_squabble_score_all_time',
        'battleball_games_won',
        'snowstorm_games_won',
        'wobble_squabble_games_won',
    ];

    public $timestamps = false;
}
