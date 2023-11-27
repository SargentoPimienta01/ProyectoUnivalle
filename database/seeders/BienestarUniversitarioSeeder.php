<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BienestarUniversitarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // BienestarUniversitarioSeeder.php
    public function run()
    {
        DB::table('bienestar_universitario')->insert([
            'servicio' => 'Gabinete médico',
            'detalle' => 'Presentación de credencial universitaria',
            'id_ubicacion' => 1,
            'estado' => 1,
            'Id_area' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('bienestar_universitario')->insert([
            'servicio' => 'Gabinete psicológico',
            'detalle' => 'Presentación de credencial universitaria',
            'id_ubicacion' => 1,
            'estado' => 1,
            'Id_area' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('bienestar_universitario')->insert([
            'servicio' => 'Consultorio Jurídico',
            'detalle' => 'Presentación de credencial universitaria',
            'id_ubicacion' => 1,
            'estado' => 1,
            'Id_area' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('bienestar_universitario')->insert([
            'servicio' => 'CAE - Asesoramiento y acompañamiento a estudiantes',
            'detalle' => 'Ser estudiante de Univalle - La Paz',
            'id_ubicacion' => 1,
            'estado' => 1,
            'Id_area' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('bienestar_universitario')->insert([
            'servicio' => 'Vitrina de descuentos Univalle',
            'detalle' => 'Presentación de credencial universitaria',
            'id_ubicacion' => 1,
            'estado' => 1,
            'Id_area' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

}
