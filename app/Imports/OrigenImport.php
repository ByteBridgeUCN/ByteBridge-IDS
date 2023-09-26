<?php

namespace App\Imports;

use App\Models\Ciudad;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrigenImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row){

        // Validar que la fila tenga todos los datos necesarios
        if (!empty($row['origen'] && $row['destino'] && $row['cantidad_asientos'] && $row['tarifa_base'])) {

            // Obtener el la ciudad de origen
            $ciudad = Ciudad::where('nombre', $row['origen'])->first();

            // Si la ciudad no existe, crea una nueva
            if (!$ciudad) {

                // Se crea la ciudad
                $ciudad = new Ciudad([
                    "nombre" => $row['origen']
                ]);
            }

            return $ciudad;
        }
    }
}
