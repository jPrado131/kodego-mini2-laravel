<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'title' => fake()->title(),
            'content' => fake()->paragraphs(),
            'author' => 1,
            'thumbnail_url' => fake()->imageUrl(600,400),
            'type' => 'post',
            'status' => 'publish',       
        ];
    }
}
