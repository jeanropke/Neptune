<?php

namespace App\Models;

use App\Models\Catalogue\CatalogueItem;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Model;

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

    public function getCatalogueItem()
    {
        return CatalogueItem::where('sale_code', $this->sale_code)->first();
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

        foreach($hourData as $numbers) {
            $catalogPage    = explode(',', $numbers)[0];
            $hoursRequired  = explode(',', $numbers)[1];

            if($catalogPage == $this->getCatalogueItem()->page_id)
            {
                return $this->getHandoutAmountInHours($hoursRequired);
            }
        }
        return false;
    }
}
