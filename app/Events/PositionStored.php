<?php

namespace App\Events;

use App\Models\Vehicle;
use App\Models\Position;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PositionStored implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $vehicle;
    public $position;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Vehicle $vehicle, Position $position)
    {
        $this->vehicle = $vehicle;
        $this->position = $position;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('position.stored.'.$this->vehicle->id);
    }
}
