<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CartSeeder::class,
            CustomerSeeder::class,
            MessageSeeder::class,
            OrderSeeder::class,
            ProductSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            CitySeeder::class,
            DistrictSeeder::class,
            ]);
    }
}
