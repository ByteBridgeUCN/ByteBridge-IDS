<?php

namespace Database\Seeders;

use App\Models\UserRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {

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
