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
     * Tests the book ticket main page.
     */
    public function testBookTicketOriginFound(): void
    {
        $response = $this->get('/BookTicket', ['origin' => '1']);

        $response->assertStatus(200);
    }
    
    /**
     * Tests the book ticket main page.
     */
    public function testBookTicketDestinationFound(): void
    {
        $response = $this->get('/BookTicket', ['destination' => '7']);

        $response->assertStatus(200);
    }

    /**
     * Tests the book ticket main page.
     */
    public function testBookTicketTravelDateFound(): void
    {
        $response = $this->get('/BookTicket', ['date' => '2023-12-12']);

        $response->assertStatus(200);
    }

    /**
     * Tests the book ticket main page.
     */
    public function testBookTicketPurchasedSeat(): void
    {
        $response = $this->get('/BookTicket', ['purchasedSeats' => '1']);

        $response->assertStatus(200);
    }
}
