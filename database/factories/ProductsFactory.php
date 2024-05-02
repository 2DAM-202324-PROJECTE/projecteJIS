<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 1, 100),
            'stock' => fake()->numberBetween(1, 100),
            'image_url' => 'https://via.placeholder.com/150',
            'category_id' => fake()->numberBetween(1, 5),
            'state_id' => fake()->numberBetween(1, 2),
            'marca_id' => fake()->numberBetween(1, 5),
            'created_at' => now(),
            'updated_at' => now(),

        ];
    }
}
