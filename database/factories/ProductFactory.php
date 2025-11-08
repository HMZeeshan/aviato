<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word, // Random product name
            'description' => $this->faker->sentence(10), // Random product description
            'price' => $this->faker->randomFloat(2, 10, 500), // Random product price between 10 and 500
            'category_id' => Category::factory(), // Create a category for each product
            'image' => $this->faker->imageUrl(640, 480, 'products', true),
        ];
    }
}
