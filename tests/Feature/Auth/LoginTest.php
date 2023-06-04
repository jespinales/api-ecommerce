<?php

namespace Tests\Feature\Auth;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function shouldBeLogin()
    {
        $client = Client::factory()->create([
            'email' => 'client@example.com',
            'password' => bcrypt('password')
        ]);

        $response = $this->post(
            route('api.auth.login'),
            [
                'email' => $client->email,
                'password' => 'password'
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
