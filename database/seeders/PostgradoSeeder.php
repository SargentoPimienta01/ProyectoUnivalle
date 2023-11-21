<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostgradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ejemplo de datos para la tabla postgrados
        $postgrados = [
            [
                'nombre_programa' => 'Maestría en Informática',
                'descripcion' => 'Descripción de la maestría en informática',
                'modalidad' => 'Presencial',
                'categoria' => 'Tecnología',
                'estado' => true,
                'Id_area' => 7,
            ],
            // Agrega más datos según sea necesario
        ];

        // Inserta los datos en la tabla postgrados
        DB::table('postgrados')->insert($postgrados);
    }
}
