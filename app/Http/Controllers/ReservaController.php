<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function store(Request $request){
        // Validar

        // Creamos la reserva
        Reserva::create(
            [
                'idTramo' => $request->idTramo,
                'idCliente' => $request->idCliente,
                'diaReserva' => $request->diaReserva,
                'cantAsientos' => $request->cantAsientos,
                'fechaCompra' => $request->fechaCompra,
                'totalPrecio' => $request->totalPrecio
            ]
        );
    }
}
