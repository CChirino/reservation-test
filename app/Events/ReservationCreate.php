<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Reservation;

class ReservationCreate
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reservation;

    /**
     * Create a new event instance.
     *
     * @param Reservation $reservation
     * @return void
     */
    public function __construct(Reservation $reservation)
    {
        $this->$reservation = $reservation;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}