<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\TramosImport;
use App\Imports\OrigenImport;
use App\Imports\DestinoImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class CargarRutasController extends Controller
{
    public function vista(){
        return view('auth.cargarRutas');
    }

    public function importarRutas(Request $pedido)
    {
        if(!$pedido->hasFile('archivo')){
            return redirect('cargarRutas')->with('error', 'No se ha seleccionado ningún archivo.');
        }

        $validator = Validator::make($pedido->all(), ['archivo' => 'required|file|mimes:xlsx|max:5120',]);

        if ($validator->fails()) {
            return redirect('cargarRutas')
                ->withErrors($validator)
                ->withInput();
        }

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

        return redirect('inicioAdministrador')->with('success', 'All good!');
    }
}
