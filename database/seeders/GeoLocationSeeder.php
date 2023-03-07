<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeoLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents('BdGeoLocation.json'), true);

        foreach ($data as $div => $dis)
        {
            //dd($dis);
            foreach ($dis as $dis => $thana)
            {
                //dd($thana);
                foreach ($thana as $codes)
                {
                    //dd($codes);
                    foreach ($codes as $code)
                    {
                        //echo $code." ";
                    }
                }
            }
        }

    }
}
