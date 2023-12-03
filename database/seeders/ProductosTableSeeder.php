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
            'foto' => 'https://perfectdailygrind.com/wp-content/uploads/2020/08/Filter-or-Americano-2.jpg',
            'id_categoria' => 3,
        ]);

        Producto::create([
            'nombre' => 'Café Latte',
            'descripcion' => 'Café con leche vaporizada y una capa de espuma.',
            'precio' => 3.50,
            'foto' => 'https://clubdelcafe.net/wp-content/uploads/2020/05/taza-de-caf%C3%A9-latte-1024x683.jpg',
            'id_categoria' => 3,
        ]);

        Producto::create([
            'nombre' => 'Cappuccino',
            'descripcion' => 'Café con partes iguales de café, leche vaporizada y espuma de leche.',
            'precio' => 4.00,
            'foto' => 'https://upload.wikimedia.org/wikipedia/commons/0/00/Cappuccino_PeB.jpg',
            'id_categoria' => 3,
        ]);
    }
}
