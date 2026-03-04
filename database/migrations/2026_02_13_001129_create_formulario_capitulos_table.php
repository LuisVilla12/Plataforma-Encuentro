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
        Schema::create('formulario_capitulos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('autores');
            $table->string('institucion');
            $table->string('url_capitulo');
            $table->string('url_resumen');
            $table->string('url_cesion_derechos');
            $table->string('url_ine');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulario_capitulos');
    }
};
