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
        Schema::create('maquina_equipos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_interno')->nullable();
            $table->string('codigo_contable')->nullable();
            $table->string('linea')->nullable();
            $table->string('tipo')->nullable();
            $table->string('marca')->nullable();
            $table->string('procedencia')->nullable();
            $table->string('voltaje')->nullable();
            $table->string('frecuencia')->nullable();
            $table->boolean('revision_rodamiento_dia')->nullable();
            $table->boolean('verificacion_ruido_dia')->nullable();
            $table->boolean('verificacion_vibracion_dia')->nullable();
            $table->boolean('revision_retenes_dia')->nullable();
            $table->boolean('correas_poleas_cadenas_dia')->nullable();
            $table->boolean('revision_cinta_dia')->nullable();
            $table->boolean('lubricacion_dia')->nullable();
            $table->boolean('revision_motores_dia')->nullable();
            $table->boolean('revision_sensores_dia')->nullable();
            $table->boolean('limpieza_general_dia')->nullable();
            $table->boolean('revision_botoneras_dia')->nullable();
            $table->boolean('revision_parada_emergencia_dia')->nullable();
            $table->boolean('revision_panel_electrico_dia')->nullable();
            $table->boolean('calibracion_dia')->nullable();
            $table->boolean('funcionamiento_dia')->nullable();
            $table->boolean('revision_rodamiento_semestral')->nullable();
            $table->boolean('verificacion_ruido_semestral')->nullable();
            $table->boolean('verificacion_vibracion_semestral')->nullable();
            $table->boolean('revision_retenes_semestral')->nullable();
            $table->boolean('correas_poleas_cadenas_semestral')->nullable();
            $table->boolean('revision_cinta_semestral')->nullable();
            $table->boolean('lubricacion_semestral')->nullable();
            $table->boolean('revision_motores_semestral')->nullable();
            $table->boolean('revision_sensores_semestral')->nullable();
            $table->boolean('limpieza_general_semestral')->nullable();
            $table->boolean('revision_botoneras_semestral')->nullable();
            $table->boolean('revision_parada_emergencia_semestral')->nullable();
            $table->boolean('revision_panel_electrico_semestral')->nullable();
            $table->boolean('calibracion_semestral')->nullable();
            $table->boolean('funcionamiento_semestral')->nullable();
            $table->boolean('revision_rodamiento_anual')->nullable();
            $table->boolean('verificacion_ruido_anual')->nullable();
            $table->boolean('verificacion_vibracion_anual')->nullable();
            $table->boolean('revision_retenes_anual')->nullable();
            $table->boolean('correas_poleas_cadenas_anual')->nullable();
            $table->boolean('revision_cinta_anual')->nullable();
            $table->boolean('lubricacion_anual')->nullable();
            $table->boolean('revision_motores_anual')->nullable();
            $table->boolean('revision_sensores_anual')->nullable();
            $table->boolean('limpieza_general_anual')->nullable();
            $table->boolean('revision_botoneras_anual')->nullable();
            $table->boolean('revision_parada_emergencia_anual')->nullable();
            $table->boolean('revision_panel_electrico_anual')->nullable();
            $table->boolean('calibracion_anual')->nullable();
            $table->boolean('funcionamiento_anual')->nullable();
            $table->string('evaluacion')->nullable();
            $table->string('frecuencia_mantenimiento')->nullable();
            $table->string('responsable')->nullable();
            $table->string('evidencia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maquina_equipos');
    }
};
