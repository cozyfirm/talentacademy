<?php

namespace App\Providers;

use App\Models\Programs\Program;
use App\Traits\Common\CommonTrait;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider{
    use CommonTrait;
    /**
     * Register services.
     */
    public function register(): void{
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void{
        /* Check if time for application is passed */
        $appTimePassed = Carbon::now() > Carbon::parse($this->getSeasonData('app_date') . ' 06:00:00');;

        /* Get all active programs for current season */
        $activePrograms = Program::whereHas('seasonRel', function ($q){
            $q->where('active', '=', 1);
        })->get(['id', 'title', 'description', 'image_id', 'season_id']);

        /**
         *  Share variables to all views
         */
        view()->share('appTimePassed', $appTimePassed);
        view()->share('activePrograms', $activePrograms);
    }
}
