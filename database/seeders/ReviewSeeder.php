<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productsID = Product::pluck('id');
      
        $comments = [
            'very good prouct',
            'Excellent quality',
            'NOt very good',
            'very bad'
        ];
        $i = 0;
        foreach ($productsID as $product) {
            DB::table('reviews')->insert([
                'product_id' => $product,
                'comment' => $comments[$i]
            ]);
            if ($i<3) {
                $i++;
            }
            else{
                $i = 0;
            }
            
        }

    }
}
