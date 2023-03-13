<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = ['Pcs','kg','liter', 'Pair'];
        foreach ($units as $unit) {
            DB::table('units')->insert([
                'name' => $unit,
            ]);
        }

        $productID = Product::pluck('id')->toArray();
        $unitID = Unit::pluck('id')->toArray();

        for ($i=0; $i < count($productID); $i++) {
            DB::table('inventories')->insert([
                'product_id' => $productID[$i],
                'unit_id' => $unitID[rand(0,count($unitID)-1)],
                'quantity' => rand(10,20),
            ]);
        }
    }
}
