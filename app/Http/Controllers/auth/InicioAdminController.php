<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InicioAdminController extends Controller
{

    // Crear función que muestre la vista de inicio de sesión de administrador
    public function crear(){
        return view('auth.inicioAdministrador');
    }
}
