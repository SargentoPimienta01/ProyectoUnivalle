<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CajaTableSeeder extends Seeder
{
    public function run()
    {
        $cajas = [
            [
                'nombre_caja' => 'Cobro de colegiatura/otros',
                'descripcion_caja' => 'Esta caja se utiliza para el cobro de colegiaturas y otros pagos relacionados con la institución.',
                'estado' => true,
                'Id_area' => 2,
            ],
            [
                'nombre_caja' => 'Cobro de tramites',
                'descripcion_caja' => 'Esta caja se utiliza para el cobro por tramites que necesitan un pago adicional.',
                'estado' => true,
                'Id_area' => 2,
            ],
            [
                'nombre_caja' => 'Cobro de cheques',
                'descripcion_caja' => 'Esta caja se utiliza para el cobro de cheques que la universidad expenda.',
                'estado' => true,
                'Id_area' => 2,
            ],
            
        ];
        foreach ($cajas as $caja) {
            DB::table('caja')->insert($caja);
        }
    }
}
