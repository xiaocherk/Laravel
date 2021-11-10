<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CompletePayment
{
    use Dispatchable, SerializesModels;

    public $email;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email =$email;
    }

}
