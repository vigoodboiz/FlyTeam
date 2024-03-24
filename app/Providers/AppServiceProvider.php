<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;


use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
    }


    public function register()
    {
    }
}