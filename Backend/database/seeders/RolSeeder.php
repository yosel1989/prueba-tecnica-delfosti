<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rol::truncate();
        Rol::create([
            'name' => 'Encargado'
        ]);
        Rol::create([
            'name' => 'Vendedor'
        ]);
        Rol::create([
            'name' => 'Delivery'
        ]);
        Rol::create([
            'name' => 'Repartidor'
        ]);
    }
}
