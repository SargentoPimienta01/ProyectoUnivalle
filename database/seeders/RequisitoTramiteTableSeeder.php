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
            //Certificados
            [
                'nombre_requisito' => 'Certificado de Estudiante Regular',
                'descripcion_requisito' => "1. Solicitar el Formulario de Certificado, otorgado por ventanilla de trámites o presentar una carta (1 ejemplar) de solicitud al VICERRECTOR de la Universidad (M. Sc. Ing. Franklin Nestor Rada).\n2. Indicar a dónde o a quién debe ir dirigido dicho certificado (Empresa, Institución).\n3. Estado Económico, solicitado en Plataforma de Informaciones.",
                'estado' => true,
                'Id_tramite' => 1, // Cambia esto según el ID del trámite correspondiente
            ],
            [
                'nombre_requisito' => 'Certificado de Culminación de Plan de Estudios. ',
                'descripcion_requisito' => "1. Solicitar el Formulario de Certificado, otorgado por ventanilla de trámites o presentar una carta (1 ejemplar) de solicitud al VICERRECTOR de la Universidad (M. Sc. Ing. Franklin Nestor Rada).\n2. Indicar a dónde o a quién debe ir dirigido dicho certificado (Empresa, Institución).\n3. Estado Económico, solicitado en Plataforma de Informaciones.",
                'estado' => true,
                'Id_tramite' => 2, // Cambia esto según el ID del trámite correspondiente
            ],
            [
                'nombre_requisito' => 'Certificado de Vencimiento de Plan de Estudios. ',
                'descripcion_requisito' => "1. Solicitar el Formulario de Certificado, otorgado por ventanilla de trámites o presentar una carta (1 ejemplar) de solicitud al VICERRECTOR de la Universidad (M. Sc. Ing. Franklin Nestor Rada).\n2. Indicar a dónde o a quién debe ir dirigido dicho certificado (Empresa, Institución).\n3. Estado Económico, solicitado en Plataforma de Informaciones.",
                'estado' => true,
                'Id_tramite' => 3, // Cambia esto según el ID del trámite correspondiente
            ],
            [
                'nombre_requisito' => 'Certificado de Puntaje. ',
                'descripcion_requisito' => "1. Solicitar el Formulario de Certificado, otorgado por ventanilla de trámites o presentar una carta (1 ejemplar) de solicitud al VICERRECTOR de la Universidad (M. Sc. Ing. Franklin Nestor Rada).\n2. Indicar a dónde o a quién debe ir dirigido dicho certificado (Empresa, Institución).\n3. Estado Económico, solicitado en Plataforma de Informaciones.",
                'estado' => true,
                'Id_tramite' => 4, // Cambia esto según el ID del trámite correspondiente
            ],
            [
                'nombre_requisito' => 'Certificado de Carga de Horaria (Horas reloj y Académicas). ',
                'descripcion_requisito' => "1. Solicitar el Formulario de Certificado, otorgado por ventanilla de trámites o presentar una carta (1 ejemplar) de solicitud al VICERRECTOR de la Universidad (M. Sc. Ing. Franklin Nestor Rada).\n2. Indicar a dónde o a quién debe ir dirigido dicho certificado (Empresa, Institución).\n3. Estado Económico, solicitado en Plataforma de Informaciones.",
                'estado' => true,
                'Id_tramite' => 5, // Cambia esto según el ID del trámite correspondiente
            ],
            [
                'nombre_requisito' => 'Nomina de Docentes.',
                'descripcion_requisito' => "1. Solicitar el Formulario de Certificado, otorgado por ventanilla de trámites o presentar una carta (1 ejemplar) de solicitud al VICERRECTOR de la Universidad (M. Sc. Ing. Franklin Nestor Rada).\n2. Indicar a dónde o a quién debe ir dirigido dicho certificado (Empresa, Institución).\n3. Estado Económico, solicitado en Plataforma de Informaciones.",
                'estado' => true,
                'Id_tramite' => 6, // Cambia esto según el ID del trámite correspondiente
            ],
            [
                'nombre_requisito' => 'Historial Académico. ',
                'descripcion_requisito' => "1. Solicitar el Formulario de Certificado, otorgado por ventanilla de trámites o presentar una carta (1 ejemplar) de solicitud al VICERRECTOR de la Universidad (M. Sc. Ing. Franklin Nestor Rada).\n2. Indicar a dónde o a quién debe ir dirigido dicho certificado (Empresa, Institución).\n3. Estado Económico, solicitado en Plataforma de Informaciones.",
                'estado' => true,
                'Id_tramite' => 7, // Cambia esto según el ID del trámite correspondiente
            ],
            [
                'nombre_requisito' => 'Estudios en Hora Reloj.',
                'descripcion_requisito' => "1. Solicitar el Formulario de Certificado, otorgado por ventanilla de trámites o presentar una carta (1 ejemplar) de solicitud al VICERRECTOR de la Universidad (M. Sc. Ing. Franklin Nestor Rada).\n2. Indicar a dónde o a quién debe ir dirigido dicho certificado (Empresa, Institución).\n3. Estado Económico, solicitado en Plataforma de Informaciones.",
                'estado' => true,
                'Id_tramite' => 8, // Cambia esto según el ID del trámite correspondiente
            ],
            [
                'nombre_requisito' => 'Certificado Promedio.',
                'descripcion_requisito' => "1. Solicitar el Formulario de Certificado, otorgado por ventanilla de trámites o presentar una carta (1 ejemplar) de solicitud al VICERRECTOR de la Universidad (M. Sc. Ing. Franklin Nestor Rada).\n2. Indicar a dónde o a quién debe ir dirigido dicho certificado (Empresa, Institución).\n3. Estado Económico, solicitado en Plataforma de Informaciones.",
                'estado' => true,
                'Id_tramite' => 9, // Cambia esto según el ID del trámite correspondiente
            ],
            [
                'nombre_requisito' => 'Orden de Mérito o Ranking.',
                'descripcion_requisito' => "1. Solicitar el Formulario de Certificado, otorgado por ventanilla de trámites o presentar una carta (1 ejemplar) de solicitud al VICERRECTOR de la Universidad (M. Sc. Ing. Franklin Nestor Rada).\n2. Indicar a dónde o a quién debe ir dirigido dicho certificado (Empresa, Institución).\n3. Estado Económico, solicitado en Plataforma de Informaciones.",
                'estado' => true,
                'Id_tramite' => 10, // Cambia esto según el ID del trámite correspondiente
            ],
            [
                'nombre_requisito' => 'Internado Rotatorio (Urbano y Rural).',
                'descripcion_requisito' => "1. Solicitar el Formulario de Certificado, otorgado por ventanilla de trámites o presentar una carta (1 ejemplar) de solicitud al VICERRECTOR de la Universidad (M. Sc. Ing. Franklin Nestor Rada).\n2. Indicar a dónde o a quién debe ir dirigido dicho certificado (Empresa, Institución).\n3. Estado Económico, solicitado en Plataforma de Informaciones.",
                'estado' => true,
                'Id_tramite' => 11, // Cambia esto según el ID del trámite correspondiente
            ],
            [
                'nombre_requisito' => 'Informe Técnico del S.S.S.R.O.',
                'descripcion_requisito' => "1. Solicitar el Formulario de Certificado, otorgado por ventanilla de trámites o presentar una carta (1 ejemplar) de solicitud al VICERRECTOR de la Universidad (M. Sc. Ing. Franklin Nestor Rada).\n2. Indicar a dónde o a quién debe ir dirigido dicho certificado (Empresa, Institución).\n3. Estado Económico, solicitado en Plataforma de Informaciones.",
                'estado' => true,
                'Id_tramite' => 12, // Cambia esto según el ID del trámite correspondiente
            ],
            //Tramites
        ];

        // Inserta los datos en la tabla "RequisitoTramite" para el trámite 1
        foreach ($requisitosCertificadoEstudianteRegular as $requisito) {
            DB::table('RequisitoTramite')->insert($requisito);
        }
    }
}
