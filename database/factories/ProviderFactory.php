<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companyName = fake()->company();

        return [
            'name' => $companyName,
            'short_description' => fake()->sentence(12),
            'logo' => 'https://placehold.co/200x200?text=' . urlencode($companyName),
            'category_id' => null,
        ];
    }

    public function withCategory(): static
    {
        return $this->state(fn () => [
            'category_id' => Category::factory(),
        ]);
    }
}
