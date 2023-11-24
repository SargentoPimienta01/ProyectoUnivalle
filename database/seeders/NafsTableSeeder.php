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
                'id_ubicacion' => 1,
                'estado' => true,
                'Id_area' => 5, // Reemplaza esto con el ID del área al que pertenece el NAF
            ],
            [
                'nombre_naf' => 'RE - IVA',
                'id_ubicacion' => 1,
                'estado' => true,
                'Id_area' => 5, // Reemplaza esto con el ID del área al que pertenece el NAF
            ],
            [
                'nombre_naf' => 'Dependientes (fromulario no sujetos FC- IVA)',
                'id_ubicacion' => 1,
                'estado' => true,
                'Id_area' => 5, // Reemplaza esto con el ID del área al que pertenece el NAF
            ],
            [
                'nombre_naf' => 'Emision de Facturas',
                'id_ubicacion' => 1,
                'estado' => true,
                'Id_area' => 5, // Reemplaza esto con el ID del área al que pertenece el NAF
            ],
            [
                'nombre_naf' => 'Facilidades de pago',
                'id_ubicacion' => 1,
                'estado' => true,
                'Id_area' => 5, // Reemplaza esto con el ID del área al que pertenece el NAF
            ],
        ];

        foreach ($nafs as $naf) {
            DB::table('nafs')->insert($naf);
        }

    }
}
