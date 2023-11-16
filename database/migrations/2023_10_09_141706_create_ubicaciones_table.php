<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_ubicacion');
            $table->string('edificio');
            $table->integer('planta');
            $table->longText('horario')->default('Preguntar en información');
            $table->longText('detalles_direccion')->default('Preguntar en la entrada o informaciones Univalle');
            $table->tinyInteger('estado')->default(1);
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubicaciones');
    }
};
