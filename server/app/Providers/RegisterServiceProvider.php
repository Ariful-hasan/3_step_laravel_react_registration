<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\RegisterContract;
use App\Services\RegisterService;
use App\Contracts\RegisterRepositoryContract;
use App\Repositories\RegisterRepository;
use App\Contracts\PaymentContract;
use App\Services\PaymentService;

class RegisterServiceProvider extends ServiceProvider
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
        $this->app->bind(PaymentContract::class, PaymentService::class);
        $this->app->bind(RegisterRepositoryContract::class, RegisterRepository::class);
    }
}