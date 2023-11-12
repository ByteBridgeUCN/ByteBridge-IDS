<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{

    use RefreshDatabase;

    public function testSuccessfulLogin()
    {
        $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

        // Crea un usuario de prueba
        $response = $this->post('/Login', [
            'email' => 'italo.donoso@ucn.cl',
            'password' => 'Turjoy91',
        ]);

        $response->assertStatus(302); // Verifica el código de estado de la respuesta (redirección)
        $response->assertRedirect('/');
    }

}
