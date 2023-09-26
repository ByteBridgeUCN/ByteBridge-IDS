<?php

namespace App\Imports;

use App\Models\Tramo;
use App\Models\Ciudad;
use App\Models\Administrador;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TramosImport implements ToModel, WithHeadingRow{
    protected $excel = [];
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Validar que la fila tenga todos los datos necesarios y si los datos son numericos
        if (!empty($row['origen'] && $row['destino'] && $row['cantidad_asientos'] && $row['tarifa_base']) &&
            is_numeric($row['cantidad_asientos']) && is_numeric($row['tarifa_base'])) {

            // Obtener el la ciudad de origen y destino
            $origen = Ciudad::where('nombre', $row['origen'])->first();
            $destino = Ciudad::where('nombre', $row['destino'])->first();

            // Obtener el tramo
            $tramo = Tramo::where(['idOrigen' => $origen->id, 'idDestino' => $destino->id])->first();

            // Si el tramo no existe y los datos numéricos son positivos se crea
            if (!$tramo) {

                $this->excel[] = $origen->id . '-' . $destino->id;
                // Obtener el administrador
                $admin = Administrador::where('email', 'italo.donoso@ucn.cl')->first();

                // Crear el tramo
                $tramo = new Tramo([
                    "idAdministrador" => $admin->id,
                    "idOrigen" => $origen->id,
                    "idDestino" => $destino->id,
                    "totalAsientos" => $row['cantidad_asientos'],
                    "tarifaBase" => $row['tarifa_base']
                ]);
            }

            // Si el tramo ya existe en el mismo excel o si se carga otro archivo se actualiza
            else if (!in_array($origen->id . '-' . $destino->id, $this->excel)) {
                $tramo->totalAsientos = $row['cantidad_asientos'];
                $tramo->tarifaBase = $row['tarifa_base'];
            }

            return $tramo;
        }
    }
}
