<?php

namespace App\Providers;

use Unirest\Request;
use Unirest\Request\Body;
use App\Rave\RavePay;
use Illuminate\Support\ServiceProvider;

class RaveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('rave', function ($app) {
            return new RavePay($app->make("request"), new Request, new Body);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
