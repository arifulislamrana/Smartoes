<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array('eid','puja', 'boisakhi', 'bosonto');
        $amount = [10, 20, 30];
        $len = count($data);

        for ($i=0; $i < $len; $i++)
        {
            DB::table('discounts')->insert([
                'name' => array_pop($data),
                'amount' => $amount[rand(0, 2)],
            ]);
        }
    }
}
