<?php

namespace App\Listeners;

use App\Events\ReservationCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProccesrReservationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ReservationCreate $event): void
    {
        \App\Jobs\ProcessReservation::dispatch($event->reservation);

    }
}
