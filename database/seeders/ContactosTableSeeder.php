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
                'nombres' => 'Nombre1',
                'apellidos' => 'Apellido1',
                'celular_trabajo' => '123456789',
                'correo_institucional' => 'nombre1@correo.com',
                'area_responsable' => 'Área1',
                'id_usuario' => null, // Reemplaza con el ID real de un usuario existente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombres' => 'Nombre2',
                'apellidos' => 'Apellido2',
                'celular_trabajo' => '987654321',
                'correo_institucional' => 'nombre2@correo.com',
                'area_responsable' => 'Área2',
                'id_usuario' => null, // Reemplaza con el ID real de otro usuario existente
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Agrega más datos según sea necesario
        ]);
    }
}
