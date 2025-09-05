<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        Provider::factory(100)->make()->each(function ($provider) use ($categories) {
            $provider->category_id = $categories->random()->id;
            $provider->save();
        });
    }
}
