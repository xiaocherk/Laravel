<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\CompletePayment;
use App\Listeners\SendPaymentNotification;

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
        //
    }
}
