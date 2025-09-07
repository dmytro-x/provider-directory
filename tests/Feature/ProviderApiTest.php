<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Provider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProviderApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_provider_structure()
    {
        Provider::factory()->withCategory()->create();

        $response = $this->getJson( route('api.providers.index'));

        $response->assertOk()
            ->assertJsonStructure(['data' => [['id', 'name', 'short_description', 'category']]]);
    }

    public function test_api_response_returns_all_providers()
    {
        Provider::factory(5)->withCategory()->create();

        $response = $this->getJson( route('api.providers.index'));

        $response->assertOk()
            ->assertJsonCount(5, 'data');
    }

    public function test_api_response_filtered_providers_by_category()
    {
        Provider::factory()->withCategory()->create(); //category1
        Provider::factory()->withCategory()->create(); //category2
        $category3 = Category::factory()->create(); //category3

        Provider::factory(3)->create(['category_id' => $category3->id]);

        $response = $this->getJson(
            route('api.providers.index', ['category' => $category3->id])
        );

        $response->assertOk()
            ->assertJsonCount(3, 'data');
    }
}
