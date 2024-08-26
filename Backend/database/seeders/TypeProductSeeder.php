<?php

namespace Database\Seeders;

use App\Models\TypeProduct;
use Illuminate\Database\Seeder;

class TypeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        TypeProduct::truncate();
        TypeProduct::create([
            'code' => 'TO001',
            'name' => 'Conservas'
        ]);
        TypeProduct::create([
            'code' => 'T0002',
            'name' => 'Vegetales'
        ]);
        TypeProduct::create([
            'code' => 'T0003',
            'name' => 'Fideos'
        ]);
    }
}
