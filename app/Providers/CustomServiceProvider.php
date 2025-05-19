<?php

namespace App\Providers;

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
        $appTimePassed = Carbon::now() > Carbon::parse($this->getSeasonData('app_date') . ' 06:00:00');;

        view()->share('appTimePassed', $appTimePassed);
    }
}
