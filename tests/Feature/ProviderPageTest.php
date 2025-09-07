<?php

namespace Tests\Feature;

use App\Models\Provider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProviderPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_shows_provider_profile_page(): void
    {
        $provider = Provider::factory()->withCategory()->create();

        $response = $this->get(route('providers.details', $provider));

        $response->assertOk()
            ->assertSee($provider->name)
            ->assertSee($provider->short_description);
    }
}
