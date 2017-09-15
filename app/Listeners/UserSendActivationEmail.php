<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserSendActivationToken;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\UserRequestActivationEmail;

class UserSendActivationEmail
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param UserRequestActivationEmail $event
     * @return void
     */
    public function handle(UserRequestActivationEmail $event)
    {
        Mail::to($event->user)->send(new UserSendActivationToken($event->user->activationToken));
    }
}
