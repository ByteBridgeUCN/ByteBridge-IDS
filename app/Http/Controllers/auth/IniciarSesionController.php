<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IniciarSesionController extends Controller
{

    // Crear función que muestre la vista para iniciar de sesión
    public function crear(){
        return view('auth.login');
    }

    // Crear función que permita validar los datos ingresados en el formulario de inicio de sesión
    public function almacenar(Request $request){

        // Validar
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => 'required'
        ], makeMessages());

        // Verificar si el usuario existe en la base de datos
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('message', 'Usuario no registrado o contraseña incorrecta');
        }

        return redirect()->route('inicio');
    }
}
