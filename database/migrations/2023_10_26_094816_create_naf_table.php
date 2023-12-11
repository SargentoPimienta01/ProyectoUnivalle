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
        Schema::create('nafs', function (Blueprint $table) {
            $table->bigIncrements('Id_naf');
            $table->string('nombre_naf', 100);
            $table->string('descripcion', 100)->nullable();
            $table->unsignedBigInteger('id_ubicacion');
            $table->foreign('id_ubicacion')
                ->references('id')
                ->on('ubicaciones')->default(1);
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('Id_area')->default(5);
            $table->foreign('Id_area')->references('Id_area')->on('areas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nafs');
    }
};
