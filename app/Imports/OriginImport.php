<?php

namespace App\Imports;

use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OriginImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row){

        // Validar que la fila tenga todos los datos necesarios
        if ($this->validacion($row)) {

            // Obtener el la ciudad de origen
            $city = City::where('name', $row['origen'])->first();

            // Si la ciudad no existe, crea una nueva
            if (!$city) {

                // Se crea la ciudad
                $city = new City([
                    "name" => $row['origen']
                ]);
            }

            return $city;
        }

        return null;
    }

    public function validacion(array $row){

        // Validar que la fila tenga todos los datos necesarios
        if (empty($row['origen'] && $row['destino'] && $row['cantidad_asientos'] && $row['tarifa_base'])) {
            return false;
        }

        // Valida que los datos no sean numericos
        else if(is_numeric($row['origen']) || is_numeric($row['destino'])){
            return false;
        }

        // Valida que los datos no sean iguales
        else if($row['origen'] === $row['destino']){
            return false;
        }

        // Valida que los datos sean numericos
        else if(!is_numeric($row['cantidad_asientos']) || !is_numeric($row['tarifa_base'])){
            return false;
        }

        // Valida que los datos sean numéricos positivos
        else if((int)$row['cantidad_asientos'] < 0 || (int)$row['tarifa_base'] < 0){
            return false;
        }

        return true;
    }
}
