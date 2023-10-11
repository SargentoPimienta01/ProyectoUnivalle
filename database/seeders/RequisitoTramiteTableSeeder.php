<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequisitoTramiteTableSeeder extends Seeder
{
    public function run()
    {
        // Define los datos que deseas insertar en la tabla "RequisitoTramite" relacionados al trámite 1 (Certificado de Estudiante Regular)
        $requisitosCertificadoEstudianteRegular = [
            [
                'nombre_requisito' => 'Certificado de Estudiante Regular',
                'descripcion_requisito' => "1. Solicitar el Formulario de Certificado, otorgado por ventanilla de trámites o presentar una carta (1 ejemplar) de solicitud al VICERRECTOR de la Universidad (M. Sc. Ing. Franklin Nestor Rada).\n2. Indicar a dónde o a quién debe ir dirigido dicho certificado (Empresa, Institución).\n3. Estado Económico, solicitado en Plataforma de Informaciones.",
                'estado' => true,
                'Id_tramite' => 1, // Cambia esto según el ID del trámite correspondiente
            ],
            // Agrega más requisitos según sea necesario
        ];

        // Inserta los datos en la tabla "RequisitoTramite" para el trámite 1
        foreach ($requisitosCertificadoEstudianteRegular as $requisito) {
            DB::table('RequisitoTramite')->insert($requisito);
        }
    }
}
