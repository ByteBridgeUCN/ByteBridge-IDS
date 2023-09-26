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
    public function crear(){
        return view('auth.cargarRutas');
    }

    public function importarRutas(Request $pedido)
    {

        // Cargar el archivo excel
        if(Excel::import(new OrigenImport, $pedido->file('archivo')) != null){
            if(Excel::import(new DestinoImport, $pedido->file('archivo')) != null){
                if(Excel::import(new TramosImport, $pedido->file('archivo')) != null){
                    $datos = Excel::toArray(new TramosImport, $pedido->file('archivo'));

                    // Comprobar si hay datos
                    if (count($datos) > 0) {
                        // Obtener la primera hoja del archivo Excel (puedes ajustar esto según tus necesidades)
                        $hoja = $datos[0];

                        return view('auth.mostrarRutas', compact('hoja'));
                    } else {
                        return view('auth.mostrarRutas')->with('error', 'El archivo Excel está vacío.');
                    }
                }
            }
        }

        return redirect('/')->with('success', 'All good!');
    }
}
