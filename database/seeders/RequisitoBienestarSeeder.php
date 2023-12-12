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
        DB::table('requisito_bienestar')->insert([
            'servicio' => 'Consultorio Médico',
            'detalle' => 'Atención Médica a personal externo en casos de emergencia.',
            'requisitos' => 'Carnet de Identidad',
            'horarios' => 'Lun - Vie 9:00 - 18:00',
            'estado' => 1,
            'Id_bienestar' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('requisito_bienestar')->insert([
            'servicio' => 'Gabinete psicológico',
            'detalle' => 'Atención psicologica en general a estudiantes y  personal administrativo, docentes, seguridad, limpieza Univalle.',
            'requisitos' => 'Credencial Universitaria.',
            'horarios' => 'Lun - Vie 9:00 - 18:00',
            'estado' => 1,
            'Id_bienestar' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('requisito_bienestar')->insert([
            'servicio' => 'Consultorio Jurídico',
            'detalle' => 'Atención en temas juridicos a personal universitario.',
            'requisitos' => 'Credencial Universitaria.',
            'horarios' => 'Lun - Vie 9:00 - 18:00',
            'estado' => 1,
            'Id_bienestar' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('requisito_bienestar')->insert([
            'servicio' => 'CAE - Asesoramiento y acompañamiento a estudiantes',
            'detalle' => 'Atención, Asesoramiento, acompañamiento y solvencia de duda a estudiantes.',
            'requisitos' => 'Ser estudiante Univalle La Paz.',
            'horarios' => 'Lun - Vie 9:00 - 18:00',
            'estado' => 1,
            'Id_bienestar' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('requisito_bienestar')->insert([
            'servicio' => 'Vitrina de descuentos Univalle',
            'detalle' => 'Atención y informacion en descuentos disponibles para estudiantes univalle',
            'requisitos' => 'Credencial universitario.',
            'horarios' => 'Lun - Vie 9:00 - 18:00',
            'estado' => 1,
            'Id_bienestar' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }


}
