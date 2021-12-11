<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kavenegar\KavenegarApi;

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
        $this->app->singleton(KavenegarApi::class, function ($app){
            new KavenegarApi( config("services.kavenegar.key"), true);
        });
    }
}
