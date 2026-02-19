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
        Schema::create('formulario_cartels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('autores');
            $table->string('institucion');
            $table->string('url_cartel');
            $table->string('url_resumen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulario_cartels');
    }
};
