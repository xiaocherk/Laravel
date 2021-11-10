<?php

namespace App\Providers;

use App\Providers\CompletePayment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPaymentNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CompletePayment  $event
     * @return void
     */
    public function handle(CompletePayment $event)
    {
        //
    }
}
