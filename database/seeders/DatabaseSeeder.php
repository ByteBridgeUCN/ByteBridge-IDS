<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     */
    public function run(): void {

        // Run seeder
        $this->call(DeleteTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);

        $this->call(CityTableSeeder::class);
        $this->call(TravelTableSeeder::class);
        $this->call(TicketTableSeeder::class);

    }

}
