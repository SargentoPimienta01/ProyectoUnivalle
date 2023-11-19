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
        Schema::create('requisito_bienestar', function (Blueprint $table) {
            $table->id();
            $table->string('servicio', 128);
            $table->string('detalle', 256);
            $table->text('requisitos');
            $table->text('horarios');
            $table->boolean('estado');
            $table->unsignedBigInteger('Id_bienestar');
            $table->foreign('Id_bienestar')
                ->references('id')
                ->on('bienestar_universitario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisito_bienestar');
    }
};
