<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\ExpertSendActivationToken;

class ExpertSendActivationEmail
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
     * @param $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->expert)->send(new ExpertSendActivationToken($event->expert->activationToken));
    }
}
