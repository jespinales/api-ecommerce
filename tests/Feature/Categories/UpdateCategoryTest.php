<?php

namespace Tests\Feature\Categories;

use App\Models\Category;
use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function shouldUpdateCategory(): void
    {
        $otherName = 'other name';
        $newDescription = 'other description';

        $category = Category::factory(1)->create()->first();
        $client = Client::factory(1)->create()->first();

        $accessToken = $client->createToken('API token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $accessToken")
            ->patch(
                route('api.categories.update', [$category->id]),
                ['name' => $otherName, 'description' => $newDescription]
            );

        $response->assertStatus(200)
            ->assertJsonFragment([
                'name' => $otherName,
                'description' => $newDescription,
            ]);
    }
}
