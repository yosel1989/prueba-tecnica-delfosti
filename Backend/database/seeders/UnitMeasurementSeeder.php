<?php

namespace Database\Seeders;

use App\Models\UnitMeasurement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitMeasurementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnitMeasurement::truncate();
        UnitMeasurement::create([
            'code' => 'KL',
            'name' => 'Kilos'
        ]);
        UnitMeasurement::create([
            'code' => 'UN',
            'name' => 'Unidad'
        ]);
        UnitMeasurement::create([
            'code' => 'PAQ',
            'name' => 'Paquete'
        ]);
    }
}
