<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id('Id_area'); // Utilizamos un campo autoincremental en lugar de INT NOT NULL
            $table->string('nombre_area', 100);
            $table->string('descripcion', 256)->nullable(); // Permitimos valores nulos en la descripción
            $table->boolean('estado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('areas');
    }
}

