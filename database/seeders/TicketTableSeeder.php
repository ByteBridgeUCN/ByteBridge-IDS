<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {

        Ticket::create([
            'travelId' => 1,
            'travelDate' => now(),
            'purchaseDate' => now(),
            'purchasedSeats' => 2,
            'price' => 200,
            'ticketCode' => 'ADEF32',
        ]);

        Ticket::create([
            'travelId' => 2,
            'travelDate' => now()->addDays(5),
            'purchaseDate' => now(),
            'purchasedSeats' => 3,
            'price' => 250,
            'ticketCode' => 'BCDE44',
        ]);

        Ticket::create([
            'travelId' => 3,
            'travelDate' => '2023-11-05',
            'purchaseDate' => now(),
            'purchasedSeats' => 1,
            'price' => 150,
            'ticketCode' => 'XYZ123',
        ]);

        Ticket::create([
            'travelId' => 3,
            'travelDate' => '2023-11-05',
            'purchaseDate' => now(),
            'purchasedSeats' => 4,
            'price' => 150,
            'ticketCode' => 'TRJI499',
        ]);

        Ticket::create([
            'travelId' => 3,
            'travelDate' => '2023-11-05',
            'purchaseDate' => now(),
            'purchasedSeats' => 8,
            'price' => 150,
            'ticketCode' => 'DNEK38',
        ]);

        Ticket::create([
            'travelId' => 3,
            'travelDate' => now()->addDay(25),
            'purchaseDate' => now(),
            'purchasedSeats' => 8,
            'price' => 150,
            'ticketCode' => 'REYH36',
        ]);

        Ticket::create([
            'travelId' => 3,
            'travelDate' => now()->addDay(25),
            'purchaseDate' => now(),
            'purchasedSeats' => 23,
            'price' => 150,
            'ticketCode' => 'STHF45',
        ]);

        Ticket::create([
            'travelId' => 3,
            'travelDate' => now()->addDay(25),
            'purchaseDate' => now(),
            'purchasedSeats' => 4,
            'price' => 150,
            'ticketCode' => 'FRYJ67',
        ]);

        Ticket::create([
            'travelId' => 4,
            'travelDate' => now()->addDays(25),
            'purchaseDate' => now(),
            'purchasedSeats' => 2,
            'price' => 180,
            'ticketCode' => 'EFGH78',
        ]);

        Ticket::create([
            'travelId' => 5,
            'travelDate' => now()->addDays(65),
            'purchaseDate' => now(),
            'purchasedSeats' => 4,
            'price' => 300,
            'ticketCode' => 'PQRS99',
        ]);

    }

}
