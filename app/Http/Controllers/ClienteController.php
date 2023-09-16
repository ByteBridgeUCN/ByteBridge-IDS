<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store(Request $request){
        // Validar

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
}
