<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AddToCart implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $item;
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($item)
    {
        $this->item = $item;
        $this->title = 'Item Added!';
        $this->message = "Added {$item->name} to the cart.";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['my-channel'];
    }

    public function broadcastAs()
    {
        return 'add-to-cart';
    }
}
