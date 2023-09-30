<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\MyHelper;

class IniciarSesionController extends Controller
{

    // Crear función que muestre la vista para iniciar de sesión
    public function vista(){
        return view('auth.login');
    }

    // Crear función que permita validar los datos ingresados en el formulario de inicio de sesión
    public function entrar(Request $request){
        // Validar
        $this->validate($request, [
            'email' => ['required', 'email'],
            'contrasena' => ['required']
        ]);

        if(!auth()->attempt($request->only('email', 'contrasena'), $request->remember)){
            return back()->with('message', 'Las credenciales son incorrectas');
        }

        return redirect()->route('inicioAdministrador');
    }
}
