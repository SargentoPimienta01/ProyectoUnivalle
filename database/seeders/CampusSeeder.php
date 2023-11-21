<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Población de datos de prueba
        DB::table('campuses')->insert([
            'nombre' => 'Campus A',
            'detalle' => 'Detalles del Campus A',
            'hora' => '08:00:00',
            'fecha' => '2023-11-20',
            'estado' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('campuses')->insert([
            'nombre' => 'Campus B',
            'detalle' => 'Detalles del Campus B',
            'hora' => '10:30:00',
            'fecha' => '2023-11-21',
            'estado' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Puedes agregar más registros según sea necesario
    }
}
