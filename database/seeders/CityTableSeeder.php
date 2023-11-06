<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {

        City::create([
            'name' => 'Antofagasta',
        ]);

        City::create([
            'name' => 'Santiago',
        ]);

        City::create([
            'name' => 'Valparaíso',
        ]);

        City::create([
            'name' => 'Concepción',
        ]);

        City::create([
            'name' => 'La Serena',
        ]);

        City::create([
            'name' => 'Punta Arenas',
        ]);

    }

}
