<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        $this->call([
            GeoLocationSeeder::class,
            EmployeeSeeder::class,
            TagSeeder::class,
            VendorSeeder::class,
            DiscountSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            ReviewSeeder::class,
            CartItemSeeder::class,
        ]);
    }
}
