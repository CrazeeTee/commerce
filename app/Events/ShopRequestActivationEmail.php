<?php

namespace App\Events;

use App\Shop;
use Illuminate\Queue\SerializesModels;

class ShopRequestActivationEmail
{
    use SerializesModels;

    public $shop;

    /**
     * Create a new event instance.
     *
     * @param Shop $shop
     */
    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }
}
