<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitoTramiteTable extends Migration
{
    public function up()
    {
        Schema::create('RequisitoTramite', function (Blueprint $table) {
            $table->id('Id_requisito');
            $table->string('nombre_requisito', 100);
            $table->string('descripcion_requisito', 500);
            $table->boolean('estado');
            $table->unsignedBigInteger('Id_tramite');
            $table->foreign('Id_tramite')
                ->references('Id_tramite')
                ->on('Tramite');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('RequisitoTramite');
    }
}
