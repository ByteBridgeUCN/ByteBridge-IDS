<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CiudadController extends Controller
{
<<<<<<< HEAD
    public function almacenar(Request $request){

        // Creamos la ciudad
        Ciudad::create(
            [
                'nombre' => $request->nombre
            ]
        );
    }
=======
    //
>>>>>>> testing
}
