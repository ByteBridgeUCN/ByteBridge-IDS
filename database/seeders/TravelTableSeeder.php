<?php

namespace Database\Seeders;

use App\Models\Travel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TravelTableSeeder extends Seeder {

    /**
     * Run the database seeds
     */
    public function run(): void {

        Travel::create([
            'originId' => 5,
            'destinationId' => 6,
            'totalSeats' => 75,
            'baseRate' => 6500,
        ]);

        Travel::create([
            'originId' => 1,
            'destinationId' => 4,
            'totalSeats' => 90,
            'baseRate' => 4000,
        ]);

        Travel::create([
            'originId' => 3,
            'destinationId' => 2,
            'totalSeats' => 110,
            'baseRate' => 5575,
        ]);

        Travel::create([
            'originId' => 6,
            'destinationId' => 4,
            'totalSeats' => 120,
            'baseRate' => 7000,
        ]);

        Travel::create([
            'originId' => 2,
            'destinationId' => 1,
            'totalSeats' => 85,
            'baseRate' => 4525,
        ]);

    }

}
