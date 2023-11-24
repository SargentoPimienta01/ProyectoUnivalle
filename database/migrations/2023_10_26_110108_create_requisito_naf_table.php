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
        Schema::create('requisitos_nafs', function (Blueprint $table) {
            $table->bigIncrements('Id_requisito');
            $table->string('nombre_requisito', 200);
            $table->string('descripcion_requisito', 500);
            $table->boolean('estado')->default(1);
            $table->unsignedBigInteger('Id_naf');
            $table->foreign('Id_naf')->references('Id_naf')->on('nafs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisitos_nafs');
    }
};
