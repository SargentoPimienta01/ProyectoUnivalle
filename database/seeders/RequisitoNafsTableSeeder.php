<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequisitoNafsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $requisitosNafs = [
            [
                'nombre_requisito' => 'Ya registrado',
                'descripcion_requisito' => 'Nit, Usuario, Contraseña, Cedula de identidad',
                'estado' => true,
                'Id_naf' => 1, // Reemplaza esto con el ID del NAF al que pertenece el requisito
            ],
            [
                'nombre_requisito' => 'No registrado',
                'descripcion_requisito' => 'Cedula de identidad',
                'estado' => true,
                'Id_naf' => 1, // Reemplaza esto con el ID del NAF al que pertenece el requisito
            ],

            [
                'nombre_requisito' => 'Ya inscrito',
                'descripcion_requisito' => 'Codigo de Beneficiario, Usuario, Contraseña',
                'estado' => true,
                'Id_naf' => 2, // Reemplaza esto con el ID del NAF al que pertenece el requisito
            ],
            [
                'nombre_requisito' => 'No inscrito',
                'descripcion_requisito' => 'Cedudal de identidad, Numero de cuenta bancaria, Correo Electronico',
                'estado' => true,
                'Id_naf' => 2, // Reemplaza esto con el ID del NAF al que pertenece el requisito
            ],

            [
                'nombre_requisito' => 'Ya inscrito',
                'descripcion_requisito' => 'Codigo Dependiente, Usuario, Contraseña',
                'estado' => true,
                'Id_naf' => 3, // Reemplaza esto con el ID del NAF al que pertenece el requisito
            ],
            [
                'nombre_requisito' => 'No inscrito',
                'descripcion_requisito' => 'Cedula de identidad, Codigo Dependiente',
                'estado' => true,
                'Id_naf' => 3, // Reemplaza esto con el ID del NAF al que pertenece el requisito
            ],
            
            [
                'nombre_requisito' => 'Normal',
                'descripcion_requisito' => 'Numero de autorizacion (Manuales)',
                'estado' => true,
                'Id_naf' => 4, // Reemplaza esto con el ID del NAF al que pertenece el requisito
            ],
            [
                'nombre_requisito' => 'ERtronica',
                'descripcion_requisito' => 'Accesos, NIT, Usuario, Contraseña, Datos de Cliente, Servicio o producto',
                'estado' => true,
                'Id_naf' => 4, // Reemplaza esto con el ID del NAF al que pertenece el requisito
            ],

            [
                'nombre_requisito' => 'Normal',
                'descripcion_requisito' => 'Acceso, NIT, Usuario, Contraseña',
                'estado' => true,
                'Id_naf' => 5, // Reemplaza esto con el ID del NAF al que pertenece el requisito
            ],

        ];

        foreach ($requisitosNafs as $requisitoNaf) {
            DB::table('requisitos_nafs')->insert($requisitoNaf);
        }
    }
}
