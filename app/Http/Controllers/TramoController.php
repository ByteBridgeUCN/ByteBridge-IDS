<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TramoController extends Controller
{
<<<<<<< HEAD
<<<<<<< HEAD
=======
<<<<<<< HEAD
    //
=======
>>>>>>> dev
=======
>>>>>>> 1ce2dac7168a26586f70cf058c9f4ca69196c6ad
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 256b4b0beba01b924d780852abea9ed33b20bbd9
>>>>>>> dev
=======
>>>>>>> 1ce2dac7168a26586f70cf058c9f4ca69196c6ad
}
