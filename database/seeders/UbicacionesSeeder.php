<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Ubicacion;

class UbicacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ubicacion::create([
            'nombre_ubicacion' => 'Departamento de trámites',
            'Image'=> 'https://i.ibb.co/C6gF0vC/Bienestar-Universitario.jpg',
            'edificio' => 'Torre B, Av Argentina N°2067',
            'planta' => 0,
            'horario' => 'LUN A VIE 08:00 a 19:00, SAB 08:00 A 12:00.',
            'detalles_direccion' => 'Preguntar en la entrada o informaciones',
        ]);

        Ubicacion::create([
            'nombre_ubicacion' => 'Auditorio',
            'Image'=>'https://i.ibb.co/kJ9Zzdy/Clinica-Odontologica.jpg',
            'edificio' => 'Torre A, Av Argentina N°2083',
            'planta' => 0,
            'horario' => 'Preguntar en información',
            'detalles_direccion' => 'Frente a la entrada',
        ]);
    }
}
