<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\TramosImport;
use App\Imports\CiudadesImport;
use Maatwebsite\Excel\Facades\Excel;

class CargarRutasController extends Controller
{
    public function create(){
        return view('auth.cargarRutas');
    }

    public function importarRutas(Request $request)
    {

        // Validar que el archivo sea de tipo excel
        Excel::import(new CiudadesImport, $request->file('archivo'));

        Excel::import(new TramosImport, $request->file('archivo'));

        return redirect('/')->with('success', 'All good!');
    }
}
