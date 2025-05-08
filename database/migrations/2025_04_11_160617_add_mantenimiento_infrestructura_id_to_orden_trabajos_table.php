<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orden_trabajos', function (Blueprint $table) {
            $table->foreignId('mantenimiento_infrestructura_id')
                ->nullable()
                ->after('maquina_equipo_id') // Opcional: define la posición de la columna
                ->constrained('mantenimiento_infrestructuras')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('orden_trabajos', function (Blueprint $table) {
            $table->dropForeign(['mantenimiento_infrestructura_id']);
            $table->dropColumn('mantenimiento_infrestructura_id');
        });
    }
};
