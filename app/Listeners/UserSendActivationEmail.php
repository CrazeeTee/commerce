<?php

namespace App\Listeners;

use App\Events\UserRequestActivationEmail;
use App\Mail\UserSendActivationToken;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class UserSendActivationEmail
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
        Mail::to($event->user)->send(new UserSendActivationToken($event->user->activationToken));
    }
}
