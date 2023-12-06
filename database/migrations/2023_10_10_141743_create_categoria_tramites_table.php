<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaTramitesTable extends Migration
{
    public function up()
    {
        Schema::create('categoriatramites', function (Blueprint $table) {
            $table->id('id_categoria_tramites');
            $table->string('nombre_categoria');
            $table->boolean('estado');
            $table->unsignedBigInteger('Id_area');
            $table->foreign('Id_area')->references('Id_area')->on('areas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('CategoriaTramites');
    }
}
