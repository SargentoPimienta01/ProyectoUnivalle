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
            'servicio' => 'Soporte Técnico',
            'descripcion' => 'Brindamos asistencia técnica especializada',
            'requisitos' => 'Requisito 1',
            'estado' => true,
            'Id_area' => 9,
        ]);
    
        PlataformaDeAtencion::create([
            'servicio' => 'Consulta General',
            'descripcion' => 'Atención para consultas y preguntas generales',
            'requisitos' => 'Requisito 2',
            'estado' => false,
            'Id_area' => 9,
        ]);
    }
}
