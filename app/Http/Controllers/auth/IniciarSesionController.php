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
        $this->validate($request, [
            'email' => ['required', 'email'],
            'contrasena' => ['required']
        ]);

        if(!Administrador::where('email', $request->email)->exists() || !Administrador::where('contrasena', $request->contrasena)->exists()){
            return back()->withErrors(['contrasena' => 'usuario no registrado o contraseña incorrecta']);
        }

        auth()->login(Administrador::where('email', $request->email)->first());
        return redirect()->route('inicioAdministrador');
    }

    public function cerrarSesion(){
        auth()->logout();
        return redirect()->route('inicio');
    }
}
