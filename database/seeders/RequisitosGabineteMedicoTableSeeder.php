<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequisitosGabineteMedicoTableSeeder extends Seeder
{
    public function run()
    {
        $requisitosGabinetesMedicos = [
            [
                'nombre_requisito' => 'Personal Interno',
                'descripcion_requisito' => 'Credencial Universitario',
                'estado' => true,
                'Id_gabinetemedico' => 1, // Reemplaza esto con el ID del Gabinete Médico correspondiente
            ],
            [
                'nombre_requisito' => 'Personal Externo',
                'descripcion_requisito' => 'Cedula de Identidad',
                'estado' => true,
                'Id_gabinetemedico' => 2, // Reemplaza esto con el ID del Gabinete Médico correspondiente
            ],
        ];

        foreach ($requisitosGabinetesMedicos as $requisitoGabineteMedico) {
            DB::table('requisitos_gabinetes_medicos')->insert($requisitoGabineteMedico);
        }

    }
}
