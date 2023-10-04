<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CiudadController extends Controller
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
    //
=======
>>>>>>> dev
    public function almacenar(Request $request){

        // Creamos la ciudad
        Ciudad::create(
            [
                'nombre' => $request->nombre
            ]
        );
    }
<<<<<<< HEAD
=======
>>>>>>> 256b4b0beba01b924d780852abea9ed33b20bbd9
>>>>>>> dev
}
