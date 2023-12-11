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
            'titulo'      => 'Uso de computadoras',
            'descripcion' => 'Se pueden usar las computadoras para buscar libros, trabajos y tesis',
            'hora'        => '14:17:01',
            'fecha'       => '2023-11-01',
            'foto'        => 'https://images.rawpixel.com/image_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIyLTA1L3B4NzE4MzAzLWltYWdlLWt3dnhqNDhyLmpwZw.jpg',
            'categoria' => 'Anuncio',
            'estado'      => 1,
            // 'deleted_at'  => NULL, // Puedes comentar esta línea si no usas soft deletes
        ]);
    }
}
