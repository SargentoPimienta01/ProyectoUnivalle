<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTramiteTable extends Migration
{
    public function up()
    {
        Schema::create('Tramite', function (Blueprint $table) {
            $table->id('Id_tramite');
            $table->string('nombre_tramite');
            $table->string('duracion_tramite', 100);
            $table->unsignedBigInteger('id_categoria_tramites');
            $table->boolean('estado');
            $table->foreign('id_categoria_tramites')
                ->references('id_categoria_tramites')
                ->on('CategoriaTramites');
            $table->unsignedBigInteger('id_ubicacion');
            $table->foreign('id_ubicacion')
                ->references('id')
                ->on('ubicaciones')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Tramite');
    }
}
