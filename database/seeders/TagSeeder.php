<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array('cotton','warm', 'male', 'trend');
        $len = count($data);

        for ($i=0; $i < $len; $i++)
        {
            DB::table('tags')->insert([
                'name' => array_pop($data),
            ]);
        }
    }
}
