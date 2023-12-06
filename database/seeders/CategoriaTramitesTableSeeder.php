<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaTramitesTableSeeder extends Seeder
{
    public function run()
    {
        $categorias = [
            'Certificados',
            'Legalizaciones',
            'Certificados de Calificaciones y Programas Analíticos',
            'Documentos de Extensión de Documentos de Defensa Pública',
            'Certificados de Calificaciones',
            'Extensión de Supletorio de Diploma Académico',
            'Requisitos para el Título en Provisión Nacional',
            'Extensión de Diploma de Maestría',
            'Cambio de Apellido',
            'Cambio de Nacionalidad',
            'Convalidación de Materias y Traspasos',
            'Cajas',
        ];

        foreach ($categorias as $categoria) {
            DB::table('categoriatramites')->insert([
                'nombre_categoria' => $categoria,
                'estado' => true,
                'Id_area' => 1, // Cambia esto según el Id del área al que pertenecen estas categorías
            ]);
        }
    }
}
