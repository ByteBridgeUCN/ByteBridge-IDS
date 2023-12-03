<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowRoutesTest extends TestCase
{
    /**
     * Tests the Show Routes view without authentification
     */
    public function testShowRoutesView(): void
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
        $response = $this->post('/LoadRoutes');

        $response->assertStatus(302);
    }
}
