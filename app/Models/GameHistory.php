<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class GameHistory extends Model
{
    protected $table = 'games_played_history';

    protected $fillable = [
        'game_name',
        'game_creator',
        'game_type',
        'map_id',
        'winning_team',
        'winning_team_score',
        'extra_data',
        'team_data',
        'played_at'
    ];

    public $timestamps = false;

    protected $dates = ['played_at'];

    protected $casts = [
        'played_at' => 'datetime',
        'team_data' => 'json'
    ];
}
