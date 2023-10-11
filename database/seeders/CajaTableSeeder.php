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
        ];
        foreach ($cajas as $caja) {
            DB::table('caja')->insert($caja);
        }
    }
}
