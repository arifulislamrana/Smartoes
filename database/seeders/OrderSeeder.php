<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userID = User::pluck('id')->toArray();

        for ($i=0; $i < count($userID); $i++) {
            $subTotal = rand(100,2000);
            $tax = rand(100,200);
            $total = $subTotal + $tax;
            $paid = rand(0,$total);
            DB::table('orders')->insert([
                'user_id' => $userID[$i],
                'subtotal' => $subTotal,
                'tax' => $tax,
                'total' => $total,
                'paid' => $paid,
                'due' => $total - $paid,
            ]);
        }
    }
}
