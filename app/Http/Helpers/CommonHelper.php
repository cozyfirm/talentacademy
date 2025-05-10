<?php

use App\Models\Programs\Season;
use App\Traits\Common\CommonTrait;
use Carbon\Carbon;

class CommonHelper{
    protected static $_months = ['Januar', 'Februar', 'Mart', 'April', 'Maj', 'Juni', 'Juli', 'August', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'];

    public static function getCurrentSeason(){
        return Season::where('active', '=', 1)->first();
    }
    public static function getAppDate(): string{
        return Carbon::parse(self::getCurrentSeason()->app_date)->format('d.m.Y');
    }
    public static function getStartDate(): string{
        return Carbon::parse(self::getCurrentSeason()->start_date)->format('d.m.Y');
    }
    public static function getStartDateDay(): string{
        return Carbon::parse(self::getCurrentSeason()->start_date)->format('d');
    }
    public static function getEndDate(): string{
        $currentSeason = self::getCurrentSeason();

        return Carbon::parse($currentSeason->end_date)->format('d') . '. ' . self::$_months[(int)(Carbon::parse($currentSeason->end_date)->format('m')) - 1] . ' ' . Carbon::parse($currentSeason->end_date)->format('Y');
    }
}
