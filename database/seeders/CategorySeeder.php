<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array('male','female', 'pant', 'shirt');
        $len = count($data);

        for ($i=0; $i < $len; $i++)
        {
            DB::table('categories')->insert([
                'name' => array_pop($data),
            ]);
        }
    }
}
