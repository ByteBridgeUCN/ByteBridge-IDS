<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\TravelsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class GetTravelsController extends Controller {

    public function view() {

        return view('auth.LoadRoutes');

    }

    public function importTravels(Request $request) {

        if(!$request->hasFile('file')) {
            return redirect('LoadRoutes')->with('error', 'No se ha seleccionado ningún archivo.');

        }

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        if ($extension !== 'xlsx') {
            return redirect('LoadRoutes')->with('error', 'el archivo seleccionado no es Excel con extensión .xlsx.');

        }

        $validator = Validator::make($request->all(), ['file' => 'required|file|max:5120',]);

        if ($validator->fails()) {
            return redirect('LoadRoutes')->with('error', 'el tamaño máximo del archivo a cargar no puede superar los 5 megabytes');

        }

        // Obtener la primera fila del archivo Excel
        $columnsNames = current(Excel::toArray([], $request->file('file')));

        // Verificar que todas las columnas requeridas estén presentes y coincidan
        foreach (['origen', 'destino', 'cantidad_asientos', 'tarifa_base'] as $column) {

            if (!in_array($column, $columnsNames[0])) {
                
                return redirect('LoadRoutes')->with('error', 'el archivo Excel que ha cargado posee errores, por favor, verifique su archivo.');

            }

        }

        $travelsImport = new TravelsImport();
        $travel = Excel::import($travelsImport, $request->file('file'));

        // Cargar el archivo excel
        if($travel != null) {
            $data = Excel::toArray($travelsImport, $request->file('file'));

            // Comprobar si hay datos
            if (count($data) > 0) {
                // Obtener la primera hoja del archivo Excel
                $sheet = $data[0];
                return view('auth.ShowRoutes', compact('sheet'));

            } else {
                return view('auth.LoadRoutes')->with('error', 'El archivo Excel está vacío.');

            }

        }

        return redirect('LoadRoutes')->with('error', 'Pasó algo!');
        
    }
    
}
