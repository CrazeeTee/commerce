<?php

namespace App\Events;

use App\Expert;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ExpertRequestActivationEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $expert;

    /**
     * Create a new event instance.
     *
     * @param Expert $expert
     */
    public function __construct(Expert $expert)
    {
        $this->expert = $expert;
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
