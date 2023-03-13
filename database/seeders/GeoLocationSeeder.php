<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GeoLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = json_decode(file_get_contents(public_path('BdGeoLocation.json'), true));

        $i = 1;
        $j = 1;
        $k = 1;

        foreach ($data as $div => $dis)
        {
            DB::table('divisions')->insert([
                'name' => $div,
            ]);

            foreach ($dis as $dis => $thanas)
            {
                DB::table('districts')->insert([
                    'name' => $dis,
                    'division_id' => $i,
                ]);

                foreach ($thanas as $thana => $codes)
                {
                    DB::table('police_stations')->insert([
                        'name' => $thana,
                        'district_id' => $j,
                    ]);

                    foreach ($codes as $code)
                    {
                        DB::table('post_codes')->insert([
                            'code' => $code,
                            'police_station_id' => $k,
                        ]);
                    }

                    $k++;
                }

                $j++;
            }

            $i++;
        }

    }
}
