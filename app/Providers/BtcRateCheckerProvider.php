<?php

namespace App\Providers;

use App\Http\Controllers\api\v1\btc\BtcRateController;
use App\Http\Interfaces\BtcRateChecker as BtcRateInterface;
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
        $this->app->bind(BtcRateInterface::class, BtcRateController::class);
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
