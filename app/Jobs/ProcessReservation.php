<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessReservation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $reservation;


    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        $this->reservation = $reservation;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Realizar las acciones necesarias para finalizar la reserva
        // Por ejemplo, enviar una confirmación por correo electrónico
        if ($user) {
            Mail::to($user->email)->send(new ConfirmacionReserva($this->reservation));
        }

    }
}
