<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Limpiar la tabla antes de insertar datos para evitar duplicados
        DB::table('contactos')->truncate();

        // Insertar datos de ejemplo
        DB::table('contactos')->insert([
            [
                'nombres' => 'Aydee',
                'apellidos' => 'Alanoca Endara',
                'celular_trabajo' => '71968841',
                'correo_institucional' => 'aalanocae@univalle.edu',
                'Id_area' => 1,
                'id_usuario' => null, // Reemplaza con el ID real de un usuario existente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombres' => 'Fabiola',
                'apellidos' => 'Saavedra Áñez',
                'celular_trabajo' => '73200080',
                'correo_institucional' => 'fsaavedraa@univalle.edu',
                'Id_area' => 2,
                'id_usuario' => null, // Reemplaza con el ID real de otro usuario existente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Agrega más datos según sea necesario
        ]);
    }
}
