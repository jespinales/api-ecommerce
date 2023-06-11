<?php

namespace Tests\Feature\Auth;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function shouldBeRegister(): void
    {
        $email = 'client@example.com';
        $password = 'password';

        $response = $this->post(
            route('api.auth.register'),
            [
                'firstname' => 'example',
                'lastname' => 'client',
                'email' => $email,
                'password' => $password
            ]
        );

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'status',
            'data' => [
                'client',
                'access_token'
            ]
        ]);
    }
}
