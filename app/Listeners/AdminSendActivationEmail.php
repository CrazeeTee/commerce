<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\AdminSendActivationToken;

class AdminSendActivationEmail
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
        Mail::to($event->admin)->send(new AdminSendActivationToken($event->admin->activationToken));
    }
}
