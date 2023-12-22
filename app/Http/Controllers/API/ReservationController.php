<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;


class ReservationController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request) : JsonResponse
    {
    try {
        // Iniciar una transacción
        DB::beginTransaction();

        // Validar y procesar los datos de la reserva
        $reservationData = $request->all();
        $reservationData['user_id'] = Auth::id(); // Asignar el user_id del usuario autenticado
        $reservation = Reservation::create($reservationData);

        // Despachar el evento de reserva creada
        event(new \App\Events\ReservationCreate($reservation));

        // Confirmar la transacción
        DB::commit();

        // Retornar una respuesta exitosa o el objeto de reserva creado
        return response()->json(['message' => 'Reserva creada exitosamente', 'reserva' => $reservation], 201);
    } catch (\Exception $e) {
        // Revertir la transacción en caso de error
        DB::rollback();

        // Retornar una respuesta de error
        return response()->json(['message' => 'Error al crear la reserva', 'error' => $e->getMessage()], 500);
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
