<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {

        User::create([
            'name' => 'Ítalo Donoso',
            'email' => 'italo.donoso@ucn.cl',
            'password' => 'Turjoy91',
            'state' => 'Habilitado'
        ]);

        User::create([
            'name' => 'Alexis Contreras',
            'email' => 'alexis.contreras@gmail.cl',
            'password' => 'alexis123',
            'state' => 'Habilitado'
        ]);

        User::create([
            'name' => 'Giantt Rivera',
            'email' => 'giantt.rivera@ucn.cl',
            'password' => 'giantt123',
            'state' => 'Habilitado'
        ]);

        User::create([
            'name' => 'María Guarda',
            'email' => 'maria.guarda@gmail.cl',
            'password' => 'maria123',
            'state' => 'Habilitado'
        ]);

        User::create([
            'name' => 'Ivan Dorador',
            'email' => 'ivan.dorador@gmail.cl',
            'password' => 'ivan123',
            'state' => 'Habilitado'
        ]);

        User::create([
            'name' => 'Pablo Robledo',
            'email' => 'pablo.robledo@gmail.cl',
            'password' => 'pablo123',
            'state' => 'Inhabilitado'
        ]);

    }

}
