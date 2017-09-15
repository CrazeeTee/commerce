<?php

namespace App\Events;

use App\Shop;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ShopRequestActivationEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

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

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     *
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
     */
}
