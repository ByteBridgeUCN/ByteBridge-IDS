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

        $archivo = $pedido->file('archivo');
        $extension = $archivo->getClientOriginalExtension();

        if ($extension !== 'xlsx') {
            return redirect('cargarRutas')->with('error', 'El archivo seleccionado no es Excel con extensión .xlsx.');
        }

        //TO-DO [08.10.2023] : FALTA IMPLEMENTAR LA VERIFICACION SI EL ARCHIVO PESA MAS DE 5 MB


        $validator = Validator::make($pedido->all(), ['archivo' => 'required|file|mimes:xlsx|max:5120',]);

        if ($validator->fails()) {
            return redirect('cargarRutas')
                ->withErrors($validator)
                ->withInput();
        }

        // Obtener la primera fila del archivo Excel
        $nombresColumnas = current(Excel::toArray([], $pedido->file('archivo')));

        // Verificar que todas las columnas requeridas estén presentes y coincidan
        foreach (['origen', 'destino', 'cantidad_asientos', 'tarifa_base'] as $columna) {
            if (!in_array($columna, $nombresColumnas[0])) {
                return redirect('cargarRutas')->with('error', 'El archivo Excel que ha cargado posee errores, por favor, verifique su archivo.');
            }
        }

        $tramosImport = new TramosImport();

        // Cargar el archivo excel
        if(Excel::import(new OrigenImport, $pedido->file('archivo')) != null){
            if(Excel::import(new DestinoImport, $pedido->file('archivo')) != null){
                if(Excel::import($tramosImport, $pedido->file('archivo')) != null){

                    $datos = Excel::toArray($tramosImport, $pedido->file('archivo'));

                    // Comprobar si hay datos
                    if (count($datos) > 0) {
                        // Obtener la primera hoja del archivo Excel
                        $hoja = $datos[0];

                        return view('auth.mostrarRutas', compact('hoja'));
                    } else {
                        return view('auth.cargarRutas')->with('error', 'El archivo Excel está vacío.');
                    }
                }
            }
        }

        return redirect('cargarRutas')->with('error', 'Pasó algo!');
    }
}
