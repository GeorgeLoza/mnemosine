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
        Schema::create('verificacion_orden_limpiezas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tiempo');
            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->foreignId('orden_limpieza_id')->nullable()->constrained()->onDelete('restrict');
            $table->string('estado');
            $table->text('observaciones')->nullable();
            $table->text('correccion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verificacion_orden_limpiezas');
    }
};
