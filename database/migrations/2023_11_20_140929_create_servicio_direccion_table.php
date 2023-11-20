<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioDireccionTable extends Migration
{
    public function up()
    {
        Schema::create('servicio_direccion', function (Blueprint $table) {
            $table->id();
            $table->string('Titulo');
            $table->string('Image')->nullable(); // Puedes cambiar el tipo de dato según tus necesidades
            $table->text('Requisitos')->nullable();
            $table->boolean('estado');
            $table->unsignedBigInteger('direccion_carrera_id');
            $table->foreign('direccion_carrera_id')->references('id')->on('direccion_carrera')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servicio_direccion');
    }
}

