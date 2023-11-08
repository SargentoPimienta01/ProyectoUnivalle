<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TramiteTableSeeder extends Seeder
{
    public function run()
    {
        // Define los datos que deseas insertar en la tabla "Tramite" relacionados a la categoría 1 (Certificados)
        $tramitesCertificados = [
            'Estudiante Regular',
            'Culminación de Plan de Estudios',
            'Vencimiento de Plan de Estudios',
            'Certificado de Puntaje',
            'Carga Horaria (Horas Reloj y Académicas)',
            'Nomina de Docentes',
            'Historial Académico',
            'Estudios en Hora Reloj',
            'Certificado Promedio',
            'Orden de Mérito o Ranking',
            'Internado Rotatorio (Urbano y Rural)',
            'Informe Técnico del S.S.S.R.O',
        ];

        // Inserta los datos en la tabla "Tramite" para la categoría 1
        foreach ($tramitesCertificados as $tramite) {
            DB::table('Tramite')->insert([
                'nombre_tramite' => $tramite,
                'duracion_tramite' => 'Todos los trámites son de manera personal. (Duración del trámite 72Hrs)',
                'id_categoria_tramites' => 1, // Cambia esto según el ID de la categoría correspondiente
                'estado' => true,
                'id_ubicacion' => 1,
            ]);
        }
    }
}
