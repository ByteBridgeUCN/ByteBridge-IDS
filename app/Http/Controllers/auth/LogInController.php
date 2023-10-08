<?php

namespace App\Http\Controllers\auth;

use App\Helpers\MyHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LogInController extends Controller
{

    // Crear función que muestre la vista para iniciar de sesión
    public function view(){
        return view('auth.login');
    }

    public function auth(Request $request){
        $message = makeMessage();
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ],$message);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('message', 'usuario no registrado o contraseña incorrecta.');
        }

        return redirect()->route('inicioAdministrador');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('inicio');
    }
}
