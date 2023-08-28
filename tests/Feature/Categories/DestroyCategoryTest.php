<?php

namespace Tests\Feature\Categories;

use App\Models\Category;
use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DestroyCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function shouldDestroyCategory(): void
    {
        $client = Client::factory(1)->create()->first();
        $accessToken = $client->createToken('API token')->plainTextToken;
        $category = Category::factory(1)->create()->first();

        $response = $this->withHeader('Authorization', "Bearer $accessToken")
            ->delete(
                route('api.categories.destroy', [$category->id])
            );

        $response->assertStatus(200);
    }
}
