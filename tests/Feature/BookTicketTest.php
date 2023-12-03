<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTicketTest extends TestCase
{
    /**
     * Tests the book ticket main page.
     */
    public function testBookTicketView(): void
    {
        $response = $this->get('/BookTicket');

        $response->assertStatus(200);
    }

    /**
     * Tests select an origin.
     */
    public function testBookTicketOrigin(): void
    {
        $response = $this->post('/BookTicket', ['origin' => '1']);

        $response->assertStatus(302);
    }

    /**
     * Tests select a destination.
     */
    public function testBookTicketDestination(): void
    {
        $response = $this->post('/BookTicket', ['destination' => '7']);

        $response->assertStatus(302);
    }

    /**
     * Tests select a travel date.
     */
    public function testBookTicketTravelDate(): void
    {
        $response = $this->post('/BookTicket', ['date' => '2023-12-12']);

        $response->assertStatus(302);
    }

    /**
     * Tests select a seat.
     */
    public function testBookTicketPurchased(): void
    {
        $response = $this->post('/BookTicket', ['purchasedSeats' => '1']);

        $response->assertStatus(302);
    }

    /**
     * Tests book ticket
     */
    public function testBookTicket(): void
    {
        $response = $this->post('/BookTicket', [
            'origin' => '1',
            'destination' => '7',
            'travelDate' => '2023-12-12',
            'purchasedSeats' => '1'
        ]);

        $response->assertStatus(200);
    }
}
