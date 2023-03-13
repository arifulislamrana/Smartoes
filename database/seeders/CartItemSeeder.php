<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productId = Product::pluck('id')->toArray();
        $userId = User::pluck('id')->toArray();
        $flag = min(count($productId), count($userId));

        for ($i=0; $i < $flag; $i++)
        {
            DB::table('cart_items')->insert([
                'user_id' => $userId[rand(0, count($userId)-1)],
                'product_id' => array_pop($productId), // to remove product duplication
                'amount' => rand(1, 10),
            ]);
        }
    }
}
