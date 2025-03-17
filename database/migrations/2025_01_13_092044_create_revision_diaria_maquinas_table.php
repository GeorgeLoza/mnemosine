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
        Schema::create('revision_diaria_maquinas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maquina_equipo_id')->nullable()->constrained('maquina_equipos')->onDelete('cascade');
            $table->dateTime('tiempo');
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
        Schema::dropIfExists('revision_diaria_maquinas');
          }
};

