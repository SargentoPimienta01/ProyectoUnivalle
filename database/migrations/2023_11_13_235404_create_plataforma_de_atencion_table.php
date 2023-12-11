<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plataforma_de_atencions', function (Blueprint $table) {
            $table->bigIncrements('Id_plataforma_de_atencion');
            $table->string('servicio', 100);
            $table->string('descripcion', 100);
            $table->text('requisitos');
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('Id_area')->default(10);
            $table->foreign('Id_area')->references('Id_area')->on('areas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plataforma_de_atencions');
    }
};
