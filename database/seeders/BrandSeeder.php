<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array('mouj','D&G', 'gucci', 'nike');
        $type = ['male', 'female', 'all'];
        $len = count($data);

        for ($i=0; $i < $len; $i++)
        {
            DB::table('brands')->insert([
                'name' => array_pop($data),
                'type' => $type[rand(0, 2)],
            ]);
        }
    }
}
