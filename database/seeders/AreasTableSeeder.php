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
                'descripcion' => 'La plataforma de atención se encarga de la atención al usuario',
                'estado' => true,
            ],
            [
                'nombre_area' => 'Gabinete Médico',
                'descripcion' => 'Gabinete médico se encarga de la atención médica',
                'estado' => true,
            ],
            [
                'nombre_area' => 'NAF',
                'descripcion' => 'NAF se encarga de la parte fiscal',
                'estado' => true,
            ],
            [
                'nombre_area' => 'Cafeteria',
                'descripcion' => 'La Cafeteria de la Universidad',
                'estado' => true,
            ],
            [
                'nombre_area' => 'Bienestar Universitario',
                'descripcion' => 'Bienestar de los estudiantes de la universidad',
                'estado' => true,
            ],
            [
                'nombre_area' => 'Direcciones de carrera',
                'descripcion' => 'Información de las direcciones de carrera',
                'estado' => true,
            ],
            [
                'nombre_area' => 'Posgrados',
                'descripcion' => 'Información de posgrados en la universidad',
                'estado' => true,
            ],
            [
                'nombre_area' => 'Biblioteca',
                'descripcion' => 'Recursos académicos esenciales',
                'estado' => true,
            ],
            [
                'nombre_area' => 'Campus deportivo',
                'descripcion' => 'Entorno universitario deportivo',
                'estado' => true,
            ],
        ];

        DB::table('areas')->insert($areas);
    }
}
