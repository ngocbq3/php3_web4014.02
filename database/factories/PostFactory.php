<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text('25'),
            'description' => fake()->paragraph(1),
            'content'   => fake()->paragraph(3),
            'view'  => rand(0, 1000),
            'image' => fake()->imageUrl(),
            'category_id'   => rand(1, 4),
        ];
    }
}
