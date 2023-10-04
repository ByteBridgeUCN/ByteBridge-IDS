<?php

namespace App\Imports;

use App\Models\Ciudad;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DestinoImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row){

        // Validar que la fila tenga todos los datos necesarios
        if ($this->validacion($row)) {

            // Obtener el la ciudad de destino
            $ciudad = Ciudad::where('nombre', $row['destino'])->first();

            // Si la ciudad no existe, crea una nueva
            if (!$ciudad) {

                // Se crea la ciudad
                $ciudad = new Ciudad([
                    "nombre" => $row['destino']
                ]);
            }

            return $ciudad;
        }

        return null;
    }

    public function validacion(array $fila){

        // Verificar que las columnas existan en el arreglo
        if (!isset($fila['origen']) || !isset($fila['destino']) || !isset($fila['cantidad_asientos']) || !isset($fila['tarifa_base'])) {
            return false;
        }

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
