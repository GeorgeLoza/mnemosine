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
        Schema::create('herramientas', function (Blueprint $table) {
            $table->id();
            $table->string('item');          // Nombre del ítem
            $table->string('marca');         // Marca
            $table->text('detalle');         // Detalle/Descripción
            $table->date('ultima_compra');   // Fecha de última compra
            $table->text('observaciones')->nullable(); // Observaciones (opcional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('herramientas');
    }
};
