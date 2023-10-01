<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\TablaExcelExport;
use App\Imports\TramosImport;
use App\Imports\OrigenImport;
use App\Imports\DestinoImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\auth\MostrarRutasController;

class MostrarRutasController extends Controller
{
    public function vista(){
        return view('auth.mostrarRutas');
    }
}
