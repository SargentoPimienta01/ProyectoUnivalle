<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreasTableSeeder extends Seeder
{
    public function run()
    {
        $areas = [
            [
                'nombre_area' => 'Trámites',
                'descripcion' => 'El área de trámites se encarga de la gestión de trámites',
                'estado' => true,
            ],
            [
                'nombre_area' => 'Cajas',
                'descripcion' => 'El área de cajas se encarga de la gestión económica',
                'estado' => true,
            ],
            [
                'nombre_area' => 'Plataforma de Atención',
                'descripcion' => 'El área de cajas se encarga de la gestión económica',
                'estado' => true,
            ],
        ];

        DB::table('areas')->insert($areas);
    }
}
