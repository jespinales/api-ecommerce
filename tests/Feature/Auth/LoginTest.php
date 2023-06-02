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

        $dataResponse = $response->json();

        $response->assertStatus(200);
        $response->assertJsonStructure(
            ['client', 'access_token'],
            $dataResponse
        );
        $response->assertJson([
            'client' => [
                'firstname' => $client->firstname,
                'lastname' => $client->lastname,
                'email' => $client->email,
            ],
            'access_token' => $dataResponse['access_token']
        ]);
        $this->assertArrayNotHasKey('password', $dataResponse['client']);
        $this->assertArrayNotHasKey('remember_token', $dataResponse['client']);
    }
}
