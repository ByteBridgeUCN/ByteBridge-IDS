<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IniciarSesionController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => 'required'
        ], makeMessages());

        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('message', 'Usuario no registrado o contraseña incorrecta');
        }

        return redirect()->route('inicio');
    }
}
