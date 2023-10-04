<?php

namespace App\Imports;

use App\Models\Tramo;
use App\Models\Ciudad;
use App\Models\Administrador;
use App\Http\Controllers\ValidarController;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TramosImport implements ToModel, WithHeadingRow{
    protected $excel = [];

    public function __construct()
    {
        $this->excel = []; // Inicializa la variable excel en un nuevo array
    }
    /**
    * @param array $fila
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $fila)
    {
        // Validar que la fila tenga todos los datos necesarios y si los datos son numericos
        if ($this->validacion($fila)) {

            // Obtener el la ciudad de origen y destino
            $origen = Ciudad::where('nombre', $fila['origen'])->first();
            $destino = Ciudad::where('nombre', $fila['destino'])->first();

            // Obtener el tramo
            $tramo = Tramo::where(['idOrigen' => $origen->id, 'idDestino' => $destino->id])->first();

            // Si el tramo no existe y los datos numéricos son positivos se crea
            if (!$tramo) {

                $this->excel[] = [$origen->id . '-' . $destino->id];
                // Obtener el administrador
                $admin = Administrador::where('email', 'italo.donoso@ucn.cl')->first();

                // Crear el tramo
                $tramo = new Tramo([
                    "idAdministrador" => $admin->id,
                    "idOrigen" => $origen->id,
                    "idDestino" => $destino->id,
                    "totalAsientos" => $fila['cantidad_asientos'],
                    "tarifaBase" => $fila['tarifa_base']
                ]);
            }

            // Si el tramo no se encuentra repetido en el excel pero se encuentra en la base de datos se actualiza
            else if ($tramo && !in_array([$origen->id . '-' . $destino->id], $this->excel)) {
                $this->excel[] = [$origen->id . '-' . $destino->id];
                $tramo->totalAsientos = $fila['cantidad_asientos'];
                $tramo->tarifaBase = $fila['tarifa_base'];
            }

            return $tramo;
        }

        return null;
    }

    public function validacion(array $fila){

        // Validar que la fila tenga todos los datos necesarios
        if (empty($fila['origen'] && $fila['destino'] && $fila['cantidad_asientos'] && $fila['tarifa_base'])) {
            return false;
        }

        // Valida que los datos no sean numericos
        else if(is_numeric($fila['origen']) || is_numeric($fila['destino'])){
            return false;
        }

        // Valida que los datos no sean iguales
        else if($fila['origen'] === $fila['destino']){
            return false;
        }

        // Valida que los datos sean numericos
        else if(!is_numeric($fila['cantidad_asientos']) || !is_numeric($fila['tarifa_base'])){
            return false;
        }

        // Valida que los datos sean numéricos positivos
        else if((int)$fila['cantidad_asientos'] < 0 || (int)$fila['tarifa_base'] < 0){
            return false;
        }

        return true;
    }
}
