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
        Schema::create('observaciones_documentos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
             $table->foreignId(column: 'capitulo_id')->nullable()->constrained('formulario_capitulos')->nullOnDelete();
            $table->foreignId(column: 'user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->text(column: 'observacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observaciones_documentos');
    }
};
