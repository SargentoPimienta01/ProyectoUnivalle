<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GabineteMedicoTableSeeder extends Seeder
{
    public function run()
    {
        $gabinetesMedicos = [
            [
                'nombre_gabinetemedico' => 'Atencion medica general a estudiantes',
                'ubicacion_gabinetemedico' => 'Piso 1',
                'estado' => true,
                'Id_area' => 4, // Reemplaza esto con el ID del Área correspondiente
            ],
            [
                'nombre_gabinetemedico' => 'Artencion medica personas externas',
                'ubicacion_gabinetemedico' => 'Piso 1',
                'estado' => true,
                'Id_area' => 4, // Reemplaza esto con el ID del Área correspondiente
            ],
        ];

        foreach ($gabinetesMedicos as $gabineteMedico) {
            DB::table('gabinetes_medicos')->insert($gabineteMedico);
        }

    }
}
