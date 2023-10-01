<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function almacenar(Request $request){

        // Crear un nuevo administrador en la base de datos
        Administrador::create(
            [
                'nombre' => $request->nombre,
                'email' => $request->email,
                'password' => $request->contrasena,
                'estado' => $request->estado,
            ]);
    }
}
