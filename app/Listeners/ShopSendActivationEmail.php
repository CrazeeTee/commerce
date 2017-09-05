<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use App\Mail\ShopSendActivationToken;

class ShopSendActivationEmail
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
        Mail::to($event->shop)->send(new ShopSendActivationToken($event->shop->activationToken));
    }
}
