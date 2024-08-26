<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\Rol;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::truncate();
        Position::create([
            'name' => 'Logistica'
        ]);
        Position::create([
            'name' => 'Venta'
        ]);
        Position::create([
            'name' => 'Administración'
        ]);
    }
}
