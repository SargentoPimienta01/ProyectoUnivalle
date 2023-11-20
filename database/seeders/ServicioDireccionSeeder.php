<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServicioDireccion;

class ServicioDireccionSeeder extends Seeder
{
    public function run()
    {
        ServicioDireccion::create([
            'Titulo' => 'Servicio 1',
            'Image' => 'ruta/a/la/imagen1.jpg',
            'Requisitos' => 'Requisitos para el servicio 1',
            'estado' => 1,
            'direccion_carrera_id' => 1,
        ]);

        ServicioDireccion::create([
            'Titulo' => 'Servicio 2',
            'Image' => 'ruta/a/la/imagen2.jpg',
            'Requisitos' => 'Requisitos para el servicio 2',
            'estado' => 1,
            'direccion_carrera_id' => 1,
        ]);

    }
}
