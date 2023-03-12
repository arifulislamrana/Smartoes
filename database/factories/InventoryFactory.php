<?php

namespace Database\Factories;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Unit;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productID = Product::pluck('id')->toArray();
        $unitID = Unit::pluck('id')->toArray();
        return [
            'product_id' => $productID[rand(0,count($productID)-1)],
            'unit_id' => $unitID[rand(0,count($unitID)-1)],
            'amount' => rand(10,20),
        ];
    }
}
