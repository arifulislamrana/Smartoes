<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productsID = Product::pluck('id')->toArray();
        $comments = [
            'very good prouct',
            'Excellent quality',
            'Not very good',
            'very bad'
        ];

        return [
            'product_id' => $productsID[rand(0, count($productsID)-1)],
            'comment' => $comments[rand(0, count($comments)-1)],
        ];
    }
}
