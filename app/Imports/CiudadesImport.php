<?php

namespace App\Imports;

use App\Models\Ciudad;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CiudadesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!empty($row['origen'])) {
            $ciudad = Ciudad::where('nombre', $row['origen'])->first();

            if (!$ciudad) {
                // Si la ciudad no existe, crea una nueva
                $ciudad = new Ciudad([
                    "nombre" => $row['origen']
                ]);
            }

            return $ciudad;
        }
    }
}
