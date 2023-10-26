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
        Schema::create('requisitos_gabinetes_medicos' , function (Blueprint $table) {
            $table->bigIncrements('Id_requisito');
            $table->string('nombre_requisito', 200);
            $table->string('descripcion_requisito', 500);
            $table->boolean('estado');
            $table->unsignedBigInteger('Id_gabinetemedico');
            $table->foreign('Id_gabinetemedico')->references('Id_gabinetemedico')->on('gabinetes_medicos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisitos_gabinetes_medicos' );
    }
};
