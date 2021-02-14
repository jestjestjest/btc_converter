<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BtcRateCheckerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Interfaces\BtcRate::class, \App\Services\BtcRateChecker::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
