<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\TramosImport;
use App\Imports\OrigenImport;
use App\Imports\DestinoImport;
use Maatwebsite\Excel\Facades\Excel;

class CargarRutasController extends Controller
{
    public function create(){
        return view('auth.cargarRutas');
    }

    public function importarRutas(Request $request)
    {

        // Cargar el archivo excel
        Excel::import(new OrigenImport, $request->file('archivo'));

        Excel::import(new DestinoImport, $request->file('archivo'));

        Excel::import(new TramosImport, $request->file('archivo'));

        return redirect('/')->with('success', 'All good!');
    }
}
