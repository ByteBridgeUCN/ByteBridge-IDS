<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchTicketTest extends TestCase
{
    /**
     * Use a registered ticket code
     */
    public function testSearchRegistredTicketCode(): void
    {
        $response = $this->post('/SearchTicket', ['ticketCode' => 'ADEF32']);

        $response->assertStatus(200);
    }

    /**
     * Use a non registered ticket code
     */
    public function testSearchNonRegistredTicketCode(): void
    {
        $response = $this->post('/SearchTicket', ['ticketCode' => 'AREF32']);

        $response->assertStatus(302);
    }

    /**
     * Use a invalid ticket code "Numbers > 2"
     */
    public function testSearchInvalidNumbersTicketCode(): void
    {
        $response = $this->post('/SearchTicket', ['ticketCode' => 'ARE332']);

        $response->assertStatus(302);
    }

    /**
     * Use a invalid ticket code "Letters > 4"
     */
    public function testSearchInvalidLettersTicketCode(): void
    {
        $response = $this->post('/SearchTicket', ['ticketCode' => 'ADEFR2']);

        $response->assertStatus(302);
    }

    /**
     * Use a non ticket code
     */
    public function testSearchNonTicketCode(): void
    {
        $response = $this->post('/SearchTicket', ['ticketCode' => '']);

        $response->assertStatus(302);
    }
}
