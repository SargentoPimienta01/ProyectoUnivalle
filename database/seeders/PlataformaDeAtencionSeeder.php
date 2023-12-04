<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlataformaDeAtencion;

class PlataformaDeAtencionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlataformaDeAtencion::create([
            'servicio' => 'Plan de pagos',
            'descripcion' => 'Brindamos asistencia técnica especializada',
            'requisitos' => 'Acceso a Netvalle. El estudiante debe haber cancelado 1000bs de inscripción.',
            'estado' => true,
            'Id_area' => 9,
        ]);

        PlataformaDeAtencion::create([
            'servicio' => 'Inscripción de estudiantes nuevos',
            'descripcion' => 'Brindamos asistencia técnica especializada',
            'requisitos' => 'Plataforma inscribe en sistema Netvalle solo a estudiantes nuevos. Se necesitan: Fotocopia de CI, 2 Fotocopias legalizadas de Título de Bachiller, 2 Certificados de nacimiento.',
            'estado' => true,
            'Id_area' => 9,
        ]);
    
        PlataformaDeAtencion::create([
            'servicio' => 'Información de carreras',
            'descripcion' => 'Atención para consultas y preguntas generales',
            'requisitos' => 'Plataforma necesita acceso con montos aprobados y oficiales',
            'estado' => true,
            'Id_area' => 9,
        ]);

        PlataformaDeAtencion::create([
            'servicio' => 'Reimpresión de credenciales',
            'descripcion' => 'Atención para consultas y preguntas generales',
            'requisitos' => 'Comprobante de pago o factura de Bs. 70, dos días para la impresión. Identificación del estudiante.',
            'estado' => true,
            'Id_area' => 9,
        ]);

        PlataformaDeAtencion::create([
            'servicio' => 'Solvencia',
            'descripcion' => 'Atención para consultas y preguntas generales',
            'requisitos' => 'Estado económico sin deudas del estudiante, Plataforma de acceso a Netvalle.',
            'estado' => true,
            'Id_area' => 9,
        ]);

        PlataformaDeAtencion::create([
            'servicio' => 'Reservas',
            'descripcion' => 'Atención para consultas y preguntas generales',
            'requisitos' => 'El sistema de plataforma debe estar habilitado para la siguiente gestión. El estudiante debe presentar su CI y un pago mínimo para la siguiente gestión.',
            'estado' => true,
            'Id_area' => 9,
        ]);

        PlataformaDeAtencion::create([
            'servicio' => 'Las inscripciones desde segundo semestre',
            'descripcion' => 'Atención para consultas y preguntas generales',
            'requisitos' => 'Se deben realizar en el sistema o en cajas directamente.',
            'estado' => true,
            'Id_area' => 9,
        ]);
    }
}
