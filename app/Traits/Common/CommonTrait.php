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

    /**
     * Generate custom hash, contained only english alphabet,
     * @param $input
     * @return string
     */
    public function getCustomHash($input): string {
        // Get SHA-256 hash in base64, which includes + and / by default
        $hash = base64_encode(hash('sha256', $input, true));

        // Replace + and / with allowed characters, remove = padding
        $hash = strtr($hash, '+/', 'AB');  // Replace + with A, / with B
        $hash = rtrim($hash, '=');

        // Add dashes at fixed or random positions (optional)
        $hash = substr($hash, 0, 60); // Ensure 60 characters
        return $hash;
    }

    /**
     * Generate random string, with given length
     *
     * @param $length
     * @return string
     */
    function generateRandomPassword($length = 8) :string{
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        return substr(str_shuffle(str_repeat($characters, $length)), 0, $length);
    }
}
