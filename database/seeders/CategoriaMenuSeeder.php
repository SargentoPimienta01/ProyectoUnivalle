<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categoria_menus')->insert([
            'nombre' => 'Jugos y batidos',
            'descripcion' => 'Jugos y batidos Univalle',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categoria_menus')->insert([
            'nombre' => 'Postres',
            'descripcion' => 'Postres Univalle',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categoria_menus')->insert([
            'nombre' => 'Cafetería',
            'descripcion' => 'Cafés Univalle',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categoria_menus')->insert([
            'nombre' => 'Combos y desayunos',
            'descripcion' => 'Combos y desayunos Univalle',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categoria_menus')->insert([
            'nombre' => 'Sandwiches',
            'descripcion' => 'Sandwiches Univalle',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
