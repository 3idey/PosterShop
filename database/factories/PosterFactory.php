<?php

namespace Database\Factories;

use App\Models\Poster;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Poster>
 */
class PosterFactory extends Factory
{
    protected $model = Poster::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->words(3, true);
        $slug = Str::slug($title);
        $categories = ['films', 'sports', 'randoms'];
        $category = $this->faker->randomElement($categories);

        // Pick a default image from resources/images
        $images = [
            'resources/images/Breaking_Bad.jpeg',
            'resources/images/leo_messi.jpeg',
            'resources/images/Che_Guevara.jpeg',
            'resources/images/Free_Poster_on_the_Floor_Mockup_1.png',
            'resources/images/gayar1.jpg',
            'resources/images/icon.jpg',
        ];

        return [
            'slug' => $slug,
            'title' => Str::headline($title),
            'description' => $this->faker->sentence(12),
            'price' => $this->faker->randomFloat(2, 9, 49),
            'image' => $this->faker->randomElement($images),
            'category' => $category,
        ];
    }

    public function films(): static
    {
        return $this->state(fn () => ['category' => 'films']);
    }

    public function sports(): static
    {
        return $this->state(fn () => ['category' => 'sports']);
    }

    public function randoms(): static
    {
        return $this->state(fn () => ['category' => 'randoms']);
    }
}

