<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Intouch\LaravelNewrelic\Observers\NewrelicTimingObserver;
use Intouch\LaravelNewrelic\Observers\NewrelicCountingObserver;
use App\Customer;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Newrelic::setAppName('TestApp');
        Customer::observe(new NewrelicTimingObserver());
        Customer::observe(new NewrelicCountingObserver());
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
