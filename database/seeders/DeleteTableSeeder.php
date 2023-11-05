<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use App\Models\Role;
use App\Models\Ticket;
use App\Models\City;
use App\Models\Travel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeleteTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {

        UserRole::query()->delete();
        User::query()->delete();
        Role::query()->delete();
        Ticket::query()->delete();
        Travel::query()->delete();
        City::query()->delete();

    }

}
