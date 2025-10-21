<?php

namespace App\Models\Home;

use App\Models\GameHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sticker extends Model
{
    protected $table = 'cms_stickers';

    protected $fillable = [
        'user_id',
        'x',
        'y',
        'z',
        'sticker_id',
        'skin_id',
        'group_id',
        'text',
        'is_placed',
        'extra_data'
    ];

    public $timestamps = false;

    public function getShortType(): ?string
    {
        return $this->store?->type;
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(StickerStore::class, 'sticker_id');
    }

    public function getSkinNameAttribute(): ?string
    {
        return match ((int) $this->skin_id) {
            2 => 'speechbubbleskin',
            3 => 'metalskin',
            4 => 'noteitskin',
            5 => 'notepadskin',
            6 => 'goldenskin',
            7 => 'hc_machineskin',
            8 => 'hc_pillowskin',
            9 => 'nakedskin',
            default => 'defaultskin',
        };
    }

    public function getFullType(): string
    {
        $type = $this->store?->type;

        return match ($type) {
            'b' => 'Backgrounds',
            's' => 'Stickers',
            'w' => 'Widgets',
            'commodity' => 'Commodity',
            default => ($type ? "{$type} not found?" : 'Unknown'),
        };
    }

    public function getGameTypeNameAttribute(): string
    {
        return match ((int) $this->extra_data) {
            0 => 'WOBBLE_SQUABBLE',
            1 => 'BATTLEBALL',
            2 => 'SNOWSTORM'
        };
    }

    public function getGameTypeIdAttribute(): string
    {
        return match ($this->gameTypeName) {
            'WOBBLE_SQUABBLE'   => 0,
            'BATTLEBALL'        => 1,
            'SNOWSTORM'         => 2
        };
    }

    public function loadScores($startDate = null, $endDate = null, $page = 0)
    {
        if (!$startDate || !$endDate) {
            $baseDate  = Carbon::now()->isMonday() ? Carbon::now() : Carbon::now()->previous(Carbon::MONDAY);
            $startDate = $baseDate->clone()->startOfDay();
            $endDate   = $baseDate->clone()->addDays(6)->endOfDay();
        }

        $games = GameHistory::where('game_type', $this->gameTypeName)
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
