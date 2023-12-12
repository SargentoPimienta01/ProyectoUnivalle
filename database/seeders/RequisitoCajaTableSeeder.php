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
            [
                'nombre_requisito' => 'Cobro tramites',
                'descripcion_requisito' => 'Formulario de solvencia emitido por el area de tramites.',
                'estado' => true,
                'Id_caja' => 2, // Cambia esto según el ID de la caja correspondiente
            ],
            [
                'nombre_requisito' => 'Cobro cheques',
                'descripcion_requisito' => 'Carnet de identidad, indispensable en caso de tercero se requiere carta autorizada, Todo ingreso o cobro debe ser realizado en cajas de la univerisdad.',
                'estado' => true,
                'Id_caja' => 3, // Cambia esto según el ID de la caja correspondiente
            ],
            // Puedes agregar más requisitos según sea necesario
        ];

        // Inserta los datos en la tabla "RequisitoCaja"
        foreach ($requisitos as $requisito) {
            DB::table('requisito_caja')->insert($requisito);
        }
    }
}
