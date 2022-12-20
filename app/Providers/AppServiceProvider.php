<?php

namespace App\Providers;

use App\Traits\User\NotificationTrait;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Stevebauman\Location\Facades\Location;

class AppServiceProvider extends ServiceProvider
{
    use NotificationTrait;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (App::environment('local')) {
            $ip = "220.158.204.250";
        } else {
            $ip = request()->ip();
        }

        $location = Location::get($ip);

        date_default_timezone_set($location->timezone ?? config('app.timezone'));

        View::share('notifications', $this->getNotification());
    }
}
