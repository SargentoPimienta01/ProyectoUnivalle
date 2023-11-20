<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionCarreraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_carrera', function (Blueprint $table) {
            $table->id();
            $table->string('carrera');
            $table->text('descripcion');
            $table->string('facultad');
            $table->boolean('estado');
            $table->unsignedBigInteger('Id_area')->default(8);
            $table->foreign('Id_area')->references('Id_area')->on('areas')->default(8);
            $table->timestamps(); // Esto agrega automáticamente los campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direccion_carrera');
    }
}
