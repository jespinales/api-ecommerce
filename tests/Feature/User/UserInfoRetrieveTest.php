<?php

namespace Tests\Feature\User;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserInfoRetrieveTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function shouldRetrieveUserInfo(): void
    {
        $email = 'client@example.com';
        $client = Client::factory()->create([
            "email" => $email,
            "password" => 'password'
        ]);

        $accessToken = $client->createToken('API token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => "Bearer $accessToken"
        ])->get(route('api.client.me'));

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'status',
            'data' => ['client']
        ]);

        $this->assertContains($email, $response->json('data.client'));
    }
}
