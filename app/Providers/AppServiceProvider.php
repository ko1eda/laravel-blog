<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * after you register your service providers
     * with the service container each providers
     * boot method will be called
     * this will run any logic you want
     * knowing the application has been booted up
     * you can use this to provide pieces of your
     * application with data not tied to a specific route
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        \View::composer('partials.sidebar', function ($view) {
            $view->with('archive', \App\Post::getArchive());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
