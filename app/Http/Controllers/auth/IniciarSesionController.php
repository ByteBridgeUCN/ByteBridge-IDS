<?php

namespace App\Http\Controllers\auth;

use App\Helpers\MyHelper;
use App\Http\Controllers\Controller;
use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IniciarSesionController extends Controller
{

    // Crear función que muestre la vista para iniciar de sesión
    public function vista(){
        return view('auth.login');
    }

    public function autenticar(Request $request){
        $mensaje = crearMensaje();
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ],$mensaje);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('message', 'Usuario no registrado o contraseña incorrecta.');
        }

        return redirect()->route('inicioAdministrador');
    }

    public function cerrarSesion(){
        auth()->logout();
        return redirect()->route('inicio');
    }
}
