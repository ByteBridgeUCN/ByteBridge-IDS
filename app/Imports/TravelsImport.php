<?php

namespace App\Imports;

use App\Models\Travel;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TravelsImport implements ToModel, WithHeadingRow{
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
    public function model(array $row)
    {
        // Validar que la fila tenga todos los datos necesarios y si los datos son numericos
        if ($this->validation($row)) {

            // Obtener el la ciudad de origen y destino
            $origin = City::where('name', $row['origen'])->first();
            $destination = City::where('name', $row['destino'])->first();

            // Si la ciudad no existe, crea una nueva
            if (!$origin) {

                // Se crea la ciudad
                $origin = new City([
                    "name" => $row['origen']
                ]);
                $origin->save();
            }

            // Si la ciudad no existe, crea una nueva
            if (!$destination) {

                // Se crea la ciudad
                $destination = new City([
                    "name" => $row['destino']
                ]);
                $destination->save();
            }

            // Obtener el tramo
            $travel = Travel::where('originId', $origin->id)->where('destinationId', $destination->id)->first();

            // Si el tramo no existe y los datos numéricos son positivos se crea
            if (!$travel) {

                $this->excel[] = [$origin->id . '-' . $destination->id];

                // Crear el tramo
                $travel = new Travel([
                    "originId" => $origin->id,
                    "destinationId" => $destination->id,
                    "totalSeats" => $row['cantidad_asientos'],
                    "baseRate" => $row['tarifa_base']
                ]);
            }

            // Si el tramo no se encuentra repetido en el excel pero se encuentra en la base de datos se actualiza
            else if ($travel && !in_array([$origin->id . '-' . $destination->id], $this->excel)) {
                $this->excel[] = [$origin->id . '-' . $destination->id];
                $travel->totalSeats = $row['cantidad_asientos'];
                $travel->baseRate = $row['tarifa_base'];
            }

            return $travel;
        }

        return null;
    }

    public function validation(array $row){

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
