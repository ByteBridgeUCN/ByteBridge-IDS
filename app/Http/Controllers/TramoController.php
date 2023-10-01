<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TramoController extends Controller
{
    public function almacenar(Request $request){

        // Creamos el tramo
        Tramo::create(
            [
                'idAdministrador' => $request->idAdministrador,
                'idOrigen' => $request->idOrigen,
                'idDestino' => $request->idDestino,
                'totalAsientos' => $request->totalAsientos,
                'tarifaBase' => $request->tarifaBase
            ]
        );
    }
}
