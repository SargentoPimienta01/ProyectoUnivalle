<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Biblioteca;

class BibliotecasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Biblioteca::create([
            'titulo'      => 'Biblioteca 1',
            'descripcion' => 'Biblioteca 1',
            'hora'        => '14:17:01',
            'fecha'       => '2023-11-01',
            'foto'        => 'https://www.comunidadbaratz.com/wp-content/uploads/La-biblioteca-es-inclusion-social-e-igualdad-de-oportunidades.jpg',
            'categoria' => 'Anuncio',
            'estado'      => 1,
            // 'deleted_at'  => NULL, // Puedes comentar esta línea si no usas soft deletes
        ]);
    }
}
