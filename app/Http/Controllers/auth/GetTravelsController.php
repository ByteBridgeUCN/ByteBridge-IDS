<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\DestinationImport;
use App\Imports\OriginImport;
use App\Imports\TravelsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class GetTravelsController extends Controller
{
    public function view(){
        return view('auth.cargarRutas');
    }

    public function importTravels(Request $request)
    {
        if(!$request->hasFile('archivo')){
            return redirect('cargarRutas')->with('error', 'No se ha seleccionado ningún archivo.');
        }

        $file = $request->file('archivo');
        $extension = $file->getClientOriginalExtension();

        if ($extension !== 'xlsx') {
            return redirect('cargarRutas')->with('error', 'el archivo seleccionado no es Excel con extensión .xlsx.');
        }

        $validator = Validator::make($request->all(), ['archivo' => 'required|file|max:5120',]);

        if ($validator->fails()) {
            return redirect('cargarRutas')->withErrors('error', 'el tamaño máximo del archivo a cargar no puede superar los 5 megabytes');
        }

        // Obtener la primera fila del archivo Excel
        $columnsNames = current(Excel::toArray([], $request->file('archivo')));

        // Verificar que todas las columnas requeridas estén presentes y coincidan
        foreach (['origen', 'destino', 'cantidad_asientos', 'tarifa_base'] as $column) {
            if (!in_array($column, $columnsNames[0])) {
                return redirect('cargarRutas')->with('error', 'el archivo Excel que ha cargado posee errores, por favor, verifique su archivo.');
            }
        }

        $travelsImport = new TravelsImport();

        // Cargar el archivo excel
        if(Excel::import(new OriginImport, $request->file('archivo')) != null){
            if(Excel::import(new DestinationImport, $request->file('archivo')) != null){
                if(Excel::import($travelsImport, $request->file('archivo')) != null){

                    $data = Excel::toArray($travelsImport, $request->file('archivo'));

                    // Comprobar si hay datos
                    if (count($data) > 0) {
                        // Obtener la primera hoja del archivo Excel
                        $sheet = $data[0];

                        return view('auth.mostrarRutas', compact('sheet'));
                    } else {
                        return view('auth.cargarRutas')->with('error', 'El archivo Excel está vacío.');
                    }
                }
            }
        }

        return redirect('cargarRutas')->with('error', 'Pasó algo!');
    }
}