<?php

namespace Tests\Feature\Categories;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class showCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function shouldGetInformationFromACategory(): void
    {
        $category = Category::factory(1)->create()->first();
        $response = $this->get(route('api.categories.show', [$category->id]));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'data' => [
                'id'
            ]
        ]);
    }
}
