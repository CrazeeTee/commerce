<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\AdminSendActivationToken;
use App\Events\AdminRequestActivationEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
     * @param  AdminRequestActivationEmail  $event
     * @return void
     */
    public function handle(AdminRequestActivationEmail $event)
    {
        Mail::to($event->admin)->send(new AdminSendActivationToken($event->admin->activationToken));
    }
}
