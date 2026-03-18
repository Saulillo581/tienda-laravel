<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    \App\Models\Producto::create([
        'nombre' => 'Sabritas Original 45g',
        'precio' => 17.00,
        'stock' => 15
    ]);

    \App\Models\Producto::create([
        'nombre' => 'Pepsi 600ml',
        'precio' => 16.00,
        'stock' => 20
    ]);
    }
}
