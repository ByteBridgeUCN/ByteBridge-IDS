<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CiudadController extends Controller
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

        // Creamos la ciudad
        Ciudad::create(
            [
                'nombre' => $request->nombre
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
