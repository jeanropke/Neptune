<?php

namespace App\Models\Furni;

use App\Models\Catalogue\Item;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Collectable extends Model
{
    protected $table = 'rare_cycle';

    protected $fillable = [
        'sale_code',
        'reuse_time'
    ];

    public function getRemainingTime()
    {
        return $this->reuse_time - time();
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'sale_code', 'sale_code');
    }

    public function getHandoutAmountInHours($hours)
    {
        $unit = emu_config("credits.scheduler.timeunit");
        $amount = emu_config("credits.scheduler.interval");
        $interval = CarbonInterval::make("{$amount} {$unit}");

        $interval = $interval->totalMinutes;

        $minutesInHour = 60;
        $minutes = $minutesInHour / $interval;

        return (($hours * $minutes) * emu_config("credits.scheduler.amount"));
    }

    public function getPrice()
    {
        $hourData = explode('|', emu_config("rare.cycle.pages"));

        foreach ($hourData as $numbers) {
            $catalogPage    = explode(',', $numbers)[0];
            $hoursRequired  = explode(',', $numbers)[1];

            if ($catalogPage == $this->item->page_id) {
                return $this->getHandoutAmountInHours($hoursRequired);
            }
        }
        return false;
    }
}
