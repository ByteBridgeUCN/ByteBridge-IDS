<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CiudadController extends Controller
{
<<<<<<< HEAD
    //
=======
    public function almacenar(Request $request){

        // Creamos la ciudad
        Ciudad::create(
            [
                'nombre' => $request->nombre
            ]
        );
    }
>>>>>>> 256b4b0beba01b924d780852abea9ed33b20bbd9
}
