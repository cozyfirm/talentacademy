<?php

namespace App\Providers;

use App\Channels\FirebaseChannel;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(UrlGenerator $url): void{
        Schema::defaultStringLength(191);

        if (env('APP_ENV') !== 'local') { //so you can work on it locally
            $url->forceScheme('https');
        }

        /**
         *  Add FirebaseChannel so when we add "firebase" in via method in notification
         *
         *  public function via(object $notifiable): array{
         *      return ['database', 'firebase'];
         *  }
         *
         *  it will trigger this custom channel
         */
        $this->app->make(ChannelManager::class)->extend('firebase', function ($app) {
            return new FirebaseChannel();
        });
    }
}
