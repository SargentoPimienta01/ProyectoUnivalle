<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequisitoCajaTableSeeder extends Seeder
{
    public function run()
    {
        // Define los datos que deseas insertar en la tabla "RequisitoCaja"
        $requisitos = [
            [
                'nombre_requisito' => 'Cobro colegiatura/otros',
                'descripcion_requisito' => 'Datos del estudiante, en caso de inicio de semestre se requerirá el formulario de inscripción. También aplica a la modalidad de titulación.',
                'estado' => true,
                'Id_caja' => 1, // Cambia esto según el ID de la caja correspondiente
            ],
            // Puedes agregar más requisitos según sea necesario
        ];

        // Inserta los datos en la tabla "RequisitoCaja"
        foreach ($requisitos as $requisito) {
            DB::table('requisito_caja')->insert($requisito);
        }
    }
}
