<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
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

        Role::create([
            'name' => 'Administrador'
        ]);

        Role::create([
            'name' => 'Cliente'
        ]);

        UserRole::create([
            'roleId' => Role::where('name', 'Administrador')->first()->id,
            'userId' => User::where('name', 'Ítalo Donoso')->first()->id
        ]);

        UserRole::create([
            'roleId' => Role::where('name', 'Cliente')->first()->id,
            'userId' => User::where('name', 'Alexis Contreras')->first()->id
        ]);

        UserRole::create([
            'roleId' => Role::where('name', 'Cliente')->first()->id,
            'userId' => User::where('name', 'Giantt Rivera')->first()->id
        ]);

        UserRole::create([
            'roleId' => Role::where('name', 'Administrador')->first()->id,
            'userId' => User::where('name', 'María Guarda')->first()->id
        ]);

        UserRole::create([
            'roleId' => Role::where('name', 'Cliente')->first()->id,
            'userId' => User::where('name', 'Ivan Dorador')->first()->id
        ]);

        UserRole::create([
            'roleId' => Role::where('name', 'Administrador')->first()->id,
            'userId' => User::where('name', 'Pablo Robledo')->first()->id
        ]);

    }

}
