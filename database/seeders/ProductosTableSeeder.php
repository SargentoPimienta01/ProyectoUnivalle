<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Producto::create([
            'nombre' => 'Café Americano',
            'descripcion' => 'Un café suave y aromático.',
            'precio' => 2.50,
            'foto' => 'https://ejemplo.com/americano.jpg',
        ]);

        Producto::create([
            'nombre' => 'Café Latte',
            'descripcion' => 'Café con leche vaporizada y una capa de espuma.',
            'precio' => 3.50,
            'foto' => 'https://ejemplo.com/latte.jpg',
        ]);

        Producto::create([
            'nombre' => 'Cappuccino',
            'descripcion' => 'Café con partes iguales de café, leche vaporizada y espuma de leche.',
            'precio' => 4.00,
            'foto' => 'https://ejemplo.com/cappuccino.jpg',
        ]);
    }
}
