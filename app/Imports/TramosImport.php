<?php

namespace App\Imports;

use App\Models\Tramo;
use App\Models\Ciudad;
use App\Models\Administrador;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TramosImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!empty($row['origen'] && $row['destino'] && $row['cantidad_asientos'] && $row['tarifa_base'])) {

            if (!(Tramo::where('idOrigen', $row['origen'])->first() && Tramo::where('idDestino', $row['destino'])->first())) {
                // Si el tramo no existe, crea una nueva
                $origen = Ciudad::where('nombre', $row['origen'])->first();
                $destino = Ciudad::where('nombre', $row['destino'])->first();
                $admin = Administrador::where('email', 'italo.donoso@ucn.cl')->first();

                $tramo = new Tramo([
                    "idAdministrador" => $admin->id,
                    "idOrigen" => $origen->id,
                    "idDestino" => $destino->id,
                    "totalAsientos" => $row['cantidad_asientos'],
                    "tarifaBase" => $row['tarifa_base']
                ]);
            }

            return $tramo;
        }
    }
}
