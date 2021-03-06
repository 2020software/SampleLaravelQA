<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // ローカルではなくサーバー（）でのみhttpsが必要な場合
        if (config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
    }
}