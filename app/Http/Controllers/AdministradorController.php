<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function store(Request $request){
        // Validar

        // Creamos el administrador
        Administrador::create(
            [
                'nombre' => $request->nombre,
                'email' => $request->email,
                'contrasena' => $request->contrasena,
                'estado' => $request->estado
            ]
        );
    }
}
