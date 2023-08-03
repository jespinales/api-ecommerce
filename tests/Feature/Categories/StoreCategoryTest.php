<?php

namespace Tests\Feature\Categories;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function shouldStoreCategory(): void
    {
        $name = 'Phones';
        $description = "Lorem ipsum dolor sit amet, consectetur "
        ."adipiscing elit. Fusce at scelerisque tellus, euismod "
        ."posuere massa. Vestibulum sit amet aliquet libero, et "
        ."ullamcorper felis. Aliquam venenatis diam sit amet sagittis "
        ."elementum. Morbi rutrum, sapien vitae volutpat.";

        $client = Client::factory(1)->create()->first();
        $accessToken = $client->createToken('API token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $accessToken")
            ->post(
                route('api.categories.store'),
                ['name' => $name, 'description' => $description]
            );

        $response->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'data' => [
                    'id',
                    'name',
                    'description'
                ]
            ])
            ->assertJsonFragment([
                'name' => $name,
                'description' => $description
            ]);
    }
}
