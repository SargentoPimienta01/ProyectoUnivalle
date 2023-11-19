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
        Schema::create('bienestar_universitario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Id_area');
            $table->string('servicio');
            $table->text('detalle');
            $table->boolean('estado');
            $table->foreign('Id_area')->references('Id_area')->on('areas')->default(7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bienestar_universitario');
    }
};
