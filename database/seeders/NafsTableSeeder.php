<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NafsTableSeeder extends Seeder
{
    public function run()
    {
        $nafs = [
            [
                'nombre_naf' => 'Atencion al Contribuyente',
                'ubicacion_naf' => 'Piso 1',
                'estado' => true,
                'Id_area' => 5, // Reemplaza esto con el ID del área al que pertenece el NAF
            ],
            [
                'nombre_naf' => 'RE - IVA',
                'ubicacion_naf' => 'Piso 1',
                'estado' => true,
                'Id_area' => 5, // Reemplaza esto con el ID del área al que pertenece el NAF
            ],
            [
                'nombre_naf' => 'Dependientes (fromulario no sujetos FC- IVA)',
                'ubicacion_naf' => 'Piso 1',
                'estado' => true,
                'Id_area' => 5, // Reemplaza esto con el ID del área al que pertenece el NAF
            ],
            [
                'nombre_naf' => 'Emision de Facturas',
                'ubicacion_naf' => 'Piso 1',
                'estado' => true,
                'Id_area' => 5, // Reemplaza esto con el ID del área al que pertenece el NAF
            ],
            [
                'nombre_naf' => 'Facilidades de pago',
                'ubicacion_naf' => 'Piso 1',
                'estado' => true,
                'Id_area' => 5, // Reemplaza esto con el ID del área al que pertenece el NAF
            ],
        ];

        foreach ($nafs as $naf) {
            DB::table('nafs')->insert($naf);
        }

    }
}
