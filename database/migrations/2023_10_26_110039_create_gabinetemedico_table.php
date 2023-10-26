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
        Schema::create('gabinetes_medicos' , function (Blueprint $table) {
            $table->bigIncrements('Id_gabinetemedico');
            $table->string('nombre_gabinetemedico', 100);
            $table->string('ubicacion_gabinetemedico', 100);
            $table->boolean('estado');
            $table->unsignedBigInteger('Id_area');
            $table->foreign('Id_area')->references('Id_area')->on('areas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gabinetes_medicos' );
    }
};
