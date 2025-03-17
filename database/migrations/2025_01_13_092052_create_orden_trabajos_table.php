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
        Schema::create('orden_trabajos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tiempo_solicitud')->nullable();
            $table->foreignId('user_solicitante')->nullable()->constrained('users')->onDelete('set null');
            $table->string('numero_ot')->nullable();
            $table->string('tipo_ot')->nullable();
            $table->text('desperfecto')->nullable();
            $table->foreignId('maquina_equipo_id')->nullable()->constrained('maquina_equipos')->onDelete('cascade');
            $table->text('estado')->nullable();
            $table->dateTime('tiempo_respuesta')->nullable();
            $table->foreignId('user_tecnico')->nullable()->constrained('users')->onDelete('set null');
            $table->text('accion')->nullable();
            $table->foreignId('user_aprobado')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_trabajos');
    }
};
