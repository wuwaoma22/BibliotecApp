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
        Schema::create('copias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('libro_id');
            $table->foreign('libro_id')->references('id')->on('libros');
            $table->unsignedBigInteger('localidad_id');
            $table->foreign('localidad_id')->references('id')->on('localidades');
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->unsignedBigInteger('disponibilidad_id');
            $table->foreign('disponibilidad_id')->references('id')->on('disponibilidads');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copias');
    }
};
