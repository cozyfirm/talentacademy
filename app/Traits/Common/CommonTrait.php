<?php

namespace App\Traits\Common;
use App\Models\Programs\Season;
use Illuminate\Http\Request;

trait CommonTrait{
    protected static array $_time_arr = [];
    public static function formTimeArr(){
        for($i=0; $i<= 23; $i++){
            for($j=0; $j<60; $j+=15){
                $time = (($i < 10) ? ('0'.$i) : $i) . ':' . (($j < 10) ? ('0'.$j) : $j);
                self::$_time_arr[$time] = $time;
            }
        }

        return self::$_time_arr;
    }

    public function getSeasonData($param){
        try{
            $season = Season::where('active', '=', 1)->first();
            return ($season) ? $season->$param : "";
        }catch (\Exception $e){
            return "";
        }
    }
}
