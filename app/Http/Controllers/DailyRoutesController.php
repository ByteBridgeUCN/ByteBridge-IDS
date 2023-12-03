<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DailyRoutesController extends Controller
{
        // Crear función que muestre la vista de inicio de sesión de administrador
        public function view() {

            return view('auth.DailyRoutes');

        }
}
