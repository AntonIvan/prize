<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Prize\PrizeMoney;
use App\Prize\PrizePoints;
use App\Prize\PrizeThings;

class PrizeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias(PrizeMoney::class, "prize.money");
        $this->app->alias(PrizePoints::class, "prize.points");
        $this->app->alias(PrizeThings::class, "prize.things");
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
