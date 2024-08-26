<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UnitMeasurementSeeder::class,
            TypeProductSeeder::class,
            RolSeeder::class,
            PositionSeeder::class,
            OrderStatusSeeder::class,
        ]);
    }
}
