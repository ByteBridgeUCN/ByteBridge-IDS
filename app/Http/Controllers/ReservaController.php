<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
    //
=======
>>>>>>> dev
    public function almacenar(Request $request){
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
<<<<<<< HEAD
=======
>>>>>>> 256b4b0beba01b924d780852abea9ed33b20bbd9
>>>>>>> dev
}
