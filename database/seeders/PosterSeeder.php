<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Poster;

class PosterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed key posters from config with stable slugs/images
        $config = config('posters', []);
        foreach ($config as $slug => $data) {
            Poster::updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $data['title'] ?? Str::headline($slug),
                    'description' => $data['description'] ?? null,
                    'price' => $data['price'] ?? 0,
                    'image' => $data['image'] ?? null,
                    'category' => $data['category'] ?? 'randoms',
                ]
            );
        }

        // Add extra random posters across categories
        Poster::factory()->count(10)->films()->create();
        Poster::factory()->count(10)->sports()->create();
        Poster::factory()->count(10)->randoms()->create();
    }
}
