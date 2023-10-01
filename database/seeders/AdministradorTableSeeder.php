<?php

namespace Database\Seeders;

use App\Models\Administrador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministradorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Administrador::create([
            'nombre' => 'Italo Donoso',
            'email' => 'italo.donoso@ucn.cl',
            'contrasena' => 'Turjoy91',
            'estado' => 'Habilitado'
        ]);
    }
}
