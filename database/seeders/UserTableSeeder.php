<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ítalo Donoso',
            'email' => 'italo.donoso@ucn.cl',
            'password' => 'Turjoy91',
            'state' => 'Habilitado'
        ]);

        Role::create([
            'name' => 'Administrador'
        ]);

        UserRole::create([
            'roleId' => Role::where('name', 'Administrador')->first()->id,
            'userId' => User::where('name', 'Ítalo Donoso')->first()->id
        ]);

    }
}
