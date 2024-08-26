<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderStatus::truncate();
        OrderStatus::create([
            'name' => 'Por atender'
        ]);
        OrderStatus::create([
            'name' => 'En proceso'
        ]);
        OrderStatus::create([
            'name' => 'En delivery'
        ]);
        OrderStatus::create([
            'name' => 'Recibido'
        ]);
    }
}
