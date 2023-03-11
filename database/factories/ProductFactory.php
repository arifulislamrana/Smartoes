<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition(): array
    {
        $category = Category::pluck('id')->toArray();
        return [
            'name' => fake()->sentence(2),
            'description' => fake()->sentence(15),
            'selling_price' => rand(500, 1000),
            'buying_price' => rand(100, 499),
            'category_id' => $category[rand(0, count($category)-1)],
            'code' => uniqid(),
            'thumbnail' => "/themes/front/demoImage/demo".rand(1,3)."jpg",
        ];
    }
}
