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
        // Diplomados
        DB::table('postgrados')->insert([
            'nombre_programa' => 'Diplomado en Desarrollo de Aplicaciones Móviles',
            'descripcion' => 'Programa de 4 meses con certificación en desarrollo para plataformas móviles, modalidad virtual',
            'modalidad' => 'modalidad virtual',
            'categoria' => 'diplomado',
            'estado' => '1',
            'Id_area' => '7',
            'created_at' => '2023-11-15 22:55:00',
            'updated_at' => null,
        ]);

        DB::table('postgrados')->insert([
            'nombre_programa' => 'Diplomado en Big Data Analytics',
            'descripcion' => 'Diplomado de 5 meses con certificación en análisis de grandes volúmenes de datos, modalidad presencial',
            'modalidad' => 'presencial',
            'categoria' => 'diplomado',
            'estado' => '1',
            'Id_area' => '7',
            'created_at' => '2023-11-15 23:00:00',
            'updated_at' => null,
        ]);

        DB::table('postgrados')->insert([
            'nombre_programa' => 'Diplomado en Marketing Digital',
            'descripcion' => 'Programa de 3 meses con certificación en estrategias de marketing digital, modalidad virtual',
            'modalidad' => 'modalidad virtual',
            'categoria' => 'diplomado',
            'estado' => '1',
            'Id_area' => '7',
            'created_at' => '2023-11-15 23:05:00',
            'updated_at' => null,
        ]);

        DB::table('postgrados')->insert([
            'nombre_programa' => 'Diplomado en Inteligencia Artificial',
            'descripcion' => 'Diplomado de 6 meses con certificación en inteligencia artificial, modalidad presencial',
            'modalidad' => 'presencial',
            'categoria' => 'diplomado',
            'estado' => '1',
            'Id_area' => '7',
            'created_at' => '2023-11-15 23:10:00',
            'updated_at' => null,
        ]);

        // Doctorados
        DB::table('postgrados')->insert([
            'nombre_programa' => 'Doctorado en Ciencias de la Computación',
            'descripcion' => 'Programa de investigación avanzada en ciencias de la computación con duración de 5 años',
            'modalidad' => 'presencial',
            'categoria' => 'doctorado',
            'estado' => '1',
            'Id_area' => '7',
            'created_at' => '2023-11-15 23:15:00',
            'updated_at' => null,
        ]);

        DB::table('postgrados')->insert([
            'nombre_programa' => 'Doctorado en Medicina',
            'descripcion' => 'Programa de estudios avanzados en medicina con enfoque en investigación, duración 6 años',
            'modalidad' => 'presencial',
            'categoria' => 'doctorado',
            'estado' => '1',
            'Id_area' => '7',
            'created_at' => '2023-11-15 23:20:00',
            'updated_at' => null,
        ]);

        DB::table('postgrados')->insert([
            'nombre_programa' => 'Doctorado en Economía',
            'descripcion' => 'Programa de investigación avanzada en economía con duración de 4 años',
            'modalidad' => 'presencial',
            'categoria' => 'doctorado',
            'estado' => '1',
            'Id_area' => '7',
            'created_at' => '2023-11-15 23:25:00',
            'updated_at' => null,
        ]);

        DB::table('postgrados')->insert([
            'nombre_programa' => 'Doctorado en Psicología Clínica',
            'descripcion' => 'Programa de estudios avanzados en psicología clínica con duración de 5 años',
            'modalidad' => 'presencial',
            'categoria' => 'doctorado',
            'estado' => '1',
            'Id_area' => '7',
            'created_at' => '2023-11-15 23:30:00',
            'updated_at' => null,
        ]);

        // Maestrías
        DB::table('postgrados')->insert([
            'nombre_programa' => 'Maestría en Administración de Proyectos',
            'descripcion' => 'Programa de 2 años enfocado en la gestión de proyectos, modalidad presencial',
            'modalidad' => 'presencial',
            'categoria' => 'maestria',
            'estado' => '1',
            'Id_area' => '7',
            'created_at' => '2023-11-15 23:35:00',
            'updated_at' => null,
        ]);

        DB::table('postgrados')->insert([
            'nombre_programa' => 'Maestría en Ciencias Ambientales',
            'descripcion' => 'Programa de 2 años con enfoque en ciencias ambientales, modalidad virtual',
            'modalidad' => 'modalidad virtual',
            'categoria' => 'maestria',
            'estado' => '1',
            'Id_area' => '7',
            'created_at' => '2023-11-15 23:40:00',
            'updated_at' => null,
        ]);

        DB::table('postgrados')->insert([
            'nombre_programa' => 'Maestría en Derecho Internacional',
            'descripcion' => 'Programa de 2 años con énfasis en derecho internacional, modalidad presencial',
            'modalidad' => 'presencial',
            'categoria' => 'maestria',
            'estado' => '1',
            'Id_area' => '7',
            'created_at' => '2023-11-15 23:45:00',
            'updated_at' => null,
        ]);

        DB::table('postgrados')->insert([
            'nombre_programa' => 'Maestría en Ingeniería de Software',
            'descripcion' => 'Programa de 2 años con especialización en ingeniería de software, modalidad virtual',
            'modalidad' => 'modalidad virtual',
            'categoria' => 'maestria',
            'estado' => '1',
            'Id_area' => '7',
            'created_at' => '2023-11-15 23:50:00',
            'updated_at' => null,
        ]);
    }
}
