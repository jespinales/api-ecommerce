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
        $client = Client::create([
            'firstname' => 'Juan',
            'lastname' => 'Perez',
            'email' => 'example@email.com',
            'password' => bcrypt('12345678')
        ]);

        $response = $this->post(
            route('api.auth.login'),
            [
                'email' => $client->email,
                'password' => '12345678'
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
