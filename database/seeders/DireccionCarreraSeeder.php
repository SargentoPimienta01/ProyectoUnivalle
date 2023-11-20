<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DireccionCarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Poblamos la tabla con datos de ejemplo
        DB::table('direccion_carrera')->insert([
            'carrera' => 'Ingeniería de Sistemas Informáticos',
            'descripcion' => 'Descripción de Ingeniería Informática.',
            'facultad'=>'Facultad de Informática y Electrónica',
            'estado' => 1,
            'Id_area' => 8,
        ]);

        DB::table('direccion_carrera')->insert([
            'carrera' => 'Ingeniería Civil',
            'descripcion' => 'Descripción de Ciencias de la Computación.',
            'facultad'=>'Facultad de Tecnología',
            'estado' => 1,
            'Id_area' => 8,
        ]);
    }
}
