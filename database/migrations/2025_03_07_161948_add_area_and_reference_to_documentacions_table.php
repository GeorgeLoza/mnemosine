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
        Schema::table('documentacions', function (Blueprint $table) {
            $table->string('area')->after('tipo'); // Añadir columna 'area' después de 'tipo'
            $table->foreignId('documento_referenciado_id')->nullable()->constrained('documentacions')->nullOnDelete(); // Referencia a la misma tabla
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documentacions', function (Blueprint $table) {
            //
        });
    }
};
