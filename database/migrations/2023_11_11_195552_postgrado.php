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
        Schema::create('postgrados', function (Blueprint $table) {
            $table->bigIncrements('Id_postgrado');
            $table->string('nombre_programa', 100);
            $table->string('descripcion', 900);
            $table->string('modalidad', 100);
            $table->string('categoria', 100);
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('Id_area')->default(9);
            $table->foreign('Id_area')->references('Id_area')->on('areas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postgrados');
    }
};
