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
        view()->composer('*', function ($view)
        {
            $settings = \App\Models\Setting::first();

            $services = \App\Models\Service::where('status' ,'عرض')->latest()->take(4)->get();
            $partners = \App\Models\Partner::where('status' ,'عرض')->latest()->get();

            $view->with(compact('settings' , 'services' , 'partners' ));
        });





    }
}