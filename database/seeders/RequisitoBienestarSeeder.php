<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequisitoBienestarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // RequisitoBienestarSeeder.php
    public function run()
    {
        DB::table('requisito_bienestar')->insert([
            'servicio' => 'Consultorio Médico',
            'detalle' => 'Atención Médica en general a estudiantes y  personal administrativo, docentes, seguridad, limpieza Univalle.',
            'requisitos' => 'Credencial Universitaria.',
            'horarios' => 'Lun - Vie 9:00 - 18:00',
            'estado' => 1,
            'Id_bienestar' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }


}
