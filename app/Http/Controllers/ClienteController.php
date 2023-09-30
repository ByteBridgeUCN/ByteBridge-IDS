<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
<<<<<<< HEAD
    //
=======
    public function almacenar(Request $request){

        // Creamos el cliente
        Cliente::create(
            [
                'nombre' => $request->nombre,
                'email' => $request->email,
                'contrasena' => $request->contrasena,
                'estado' => $request->estado
            ]
        );
    }
>>>>>>> 256b4b0beba01b924d780852abea9ed33b20bbd9
}
