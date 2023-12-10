<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajaTable extends Migration
{
    public function up()
    {
        Schema::create('caja', function (Blueprint $table) {
            $table->id('Id_caja');
            $table->string('nombre_caja', 100);
            $table->string('descripcion_caja', 256);
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('Id_area')->default(2);
            $table->foreign('Id_area')->references('Id_area')->on('areas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('caja');
    }
}
