<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\ShopSendActivationToken;
use App\Events\ShopRequestActivationEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShopSendActivationEmail
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
     * @param  ShopRequestActivationEmail  $event
     * @return void
     */
    public function handle(ShopRequestActivationEmail $event)
    {
        Mail::to($event->shop)->send(new ShopSendActivationToken($event->shop->activationToken));
    }
}
