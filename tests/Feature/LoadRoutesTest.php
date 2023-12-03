<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoadRoutesTest extends TestCase
{
    /** @test */     public function test_excel_file() {
        $user = User::create([
            'name' => 'Ítalo Donoso',
            'email' => 'italo.donoso@ucn.cl',
            'password' => Hash::make('Turjoy92'),
            'state' => 'Habilitado',
        ]);

        // Autentica al usuario
        $this->actingAs($user);


        $response = $this->post('/LoadRoutes');
        
        $excelFile = UploadedFile::fake()->create('test.xlsx', 500); 

        $response = $this->post('/LoadRoutes', ['excel_file' => $excelFile,]);

        $response->assertStatus(302);
    }
}
