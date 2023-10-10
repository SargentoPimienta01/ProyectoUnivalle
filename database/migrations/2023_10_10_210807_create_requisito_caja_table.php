<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitoCajaTable extends Migration
{
    public function up()
    {
        Schema::create('requisito_caja', function (Blueprint $table) {
            $table->id('Id_requisito');
            $table->string('nombre_requisito', 20);
            $table->string('descripcion_requisito', 500);
            $table->boolean('estado');
            $table->unsignedBigInteger('Id_caja');
            $table->foreign('Id_caja')->references('Id_caja')->on('caja');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('requisito_caja');
    }
}
