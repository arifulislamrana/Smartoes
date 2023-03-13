<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productId = Product::pluck('id')->toArray();
        $orderId = Order::pluck('id')->toArray();
        $flag = min(count($productId), count($orderId));

        for ($i=0; $i < $flag; $i++)
        {
            DB::table('order_items')->insert([
                'order_id' => array_pop($orderId), // to remove product duplication
                'product_id' => $productId[rand(0, count($productId)-1)],
                'quantity' => rand(1, 10),
            ]);
        }
    }
}
