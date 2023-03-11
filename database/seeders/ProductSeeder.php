<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(10)->create();

        $sizes = ['L', 'XL', 'XXL', '42', '43'];

        foreach ($sizes as $size) 
        {
            DB::table('sizes')->insert([
                'size' => $size,
            ]);
        }
    }
}
