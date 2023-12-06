<?php

namespace App\Providers;

use App\Interfaces\Eloquent\City\CityRepositoryInterface;
use App\Services\City\CityService;
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
    public function boot(): void
    {
        $this->app->bind(CityRepositoryInterface::class, CityService::class);

    }
}
