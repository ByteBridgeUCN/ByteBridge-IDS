<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Travel;

class DailyRoutesController extends Controller
{
    // Crear función que muestre la vista de inicio de sesión de administrador
    public function view() {

        $fechaActual = now();
        return view('auth.DailyRoutes');

    }

    public function showDailyRoutes(){

        $listRoutes = Travel::with('originCity', 'destinationCity')
        ->orderBy('id')
        ->paginate(10);
        return view('auth.DailyRoutes', compact('listRoutes'));
    }
}
