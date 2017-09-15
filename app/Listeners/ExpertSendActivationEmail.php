<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\ExpertSendActivationToken;
use App\Events\ExpertRequestActivationEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExpertSendActivationEmail
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
     * @param  ExpertRequestActivationEmail  $event
     * @return void
     */
    public function handle(ExpertRequestActivationEmail $event)
    {
        Mail::to($event->expert)->send(new ExpertSendActivationToken($event->expert->activationToken));
    }
}
