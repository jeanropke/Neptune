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

    public static function getGameTypeNameAttribute(?int $gameTypeId): string
    {
        return match ($gameTypeId) {
            0 => 'WOBBLE_SQUABBLE',
            1 => 'BATTLEBALL',
            2 => 'SNOWSTORM'
        };
    }

    public function getGameTypeIdAttribute(): string
    {
        return match ($this->game_type) {
            'WOBBLE_SQUABBLE'   => 0,
            'BATTLEBALL'        => 1,
            'SNOWSTORM'         => 2
        };
    }

    public static function loadScores($gameTypeId, $startDate = null, $endDate = null, $page = 0)
    {
        if (!$startDate || !$endDate) {
            $baseDate  = Carbon::now()->isMonday() ? Carbon::now() : Carbon::now()->previous(Carbon::MONDAY);
            $startDate = $baseDate->clone()->startOfDay();
            $endDate   = $baseDate->clone()->addDays(6)->endOfDay();
        }

        $games = GameHistory::where('game_type', GameHistory::getGameTypeNameAttribute($gameTypeId))
            ->whereBetween('played_at', [$startDate, $endDate])
            ->get(['team_data']);

        $stats = [];

        foreach ($games as $game) {
            foreach ($game->team_data['players'] ?? [] as $player) {
                $userId = $player['userId'];
                $score  = $player['score'];

                if (!isset($stats[$userId])) {
                    $stats[$userId] = [
                        'user_id'      => $userId,
                        'games_played' => 0,
                        'best_score'   => 0,
                        'total_score'  => 0,
                    ];
                }

                $stats[$userId]['games_played']++;
                $stats[$userId]['total_score'] += $score;
                $stats[$userId]['best_score'] = max($stats[$userId]['best_score'], $score);
            }
        }

        $statsCollection = collect($stats)
            ->sortByDesc('total_score')
            ->values();

        $userIds = $statsCollection->pluck('user_id');
        $users = User::whereIn('id', $userIds)->get(['id', 'username'])->keyBy('id');

        $statsWithUsername = $statsCollection->map(function ($stat) use ($users) {
            return (object) [
                ...$stat,
                'username' => $users[$stat['user_id']]->username ?? '--',
            ];
        });

        return (object) [
            'stats' => $statsWithUsername,
            'start' => $startDate,
            'end'   => $endDate,
            'page'  => $page
        ];
    }
}
