<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_categories_structure()
    {
        Category::factory()->create();

        $response = $this->getJson( route('api.categories.index'));

        $response->assertOk()
            ->assertJsonStructure(['data' => [['id', 'name']]]);
    }

    public function test_api_returns_all_categories()
    {
        Category::factory()->count(5)->create();

        $response = $this->getJson('/api/categories');

        $response->assertOk()
            ->assertJsonCount(5, 'data');
    }
}
