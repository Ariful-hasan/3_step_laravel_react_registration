<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\RegisterContract;
use App\Utilities\RegisterService;

class AppServiceProvider extends ServiceProvider
{
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
        $this->app->bind(RegisterContract::class, RegisterService::class);
    }
}
