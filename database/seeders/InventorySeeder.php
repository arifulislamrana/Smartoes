<?php

namespace Database\Seeders;

use App\Models\Inventory;
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

        Inventory::factory(10)->create();
    }
}
