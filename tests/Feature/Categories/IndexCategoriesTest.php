<?php

namespace Tests\Feature\Categories;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexCategoriesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get(route('api.categories.index'));

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'status',
            'data' => ['categories']
        ]);
    }
}
