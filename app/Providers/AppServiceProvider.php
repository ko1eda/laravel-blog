<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Billing\Stripe;

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
            $view->with('archive', \App\Post::fetchArchives());
        });
    }

    /**
     * Register any application services.
     * note we use singleton here instead of bind because
     * we are registerting it as a singleton:
     *  This means that whenever the service is refrenced it will
     *  use the same instance instead of making a new instance each time
     *  this is useful when providing a service that requires an api key obivously.
     *
     * what this does is register your class or interface with laravels IoC container
     * which allow it to then resolve your class automatically when it is required as a typehinted
     * dependency. It will resolve it to whatever you provide it inside the function closure
     *
     * You can then register your Service provider files inside the config.app.php file as an alias.
     * In general I would assume you would probably make spereate files for your service providers
     *
     * If you have a service provider that does not need to use its boot method
     * you can add a protected $defer = true property to it
     * this means that it will only load the service when it is necessary
     * @return void
     */
    public function register()
    {
        \App::singleton(Stripe::class, function () {
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
