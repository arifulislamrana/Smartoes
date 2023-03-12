<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = Order::pluck('user_id')->toArray();
        $orderId = Order::pluck('id')->toArray();
        $flag = min(count($userId), count($orderId));

        for ($i=0; $i < $flag; $i++)
        {
            DB::table('payments')->insert([
                'order_id' => array_pop($orderId), // to remove product duplication
                'user_id' => $userId[rand(0, count($userId)-1)],
                'total' => rand(1, 100000),
                'payment_account' => 'xxxx-xxxxxxxxxx'
            ]);
        }
    }
}
