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
        Schema::create('verificacion_herramientas', function (Blueprint $table) {
            $table->id();$table->dateTime('tiempo');
            $table->foreignId('orden_trabajo_id')->constrained('orden_trabajos')->onDelete('cascade');
            $table->string('herramienta');
            $table->Integer('cantidad_ingreso');
            $table->foreignId('user_ingreso')->constrained('users')->onDelete('cascade')->nullable();
            $table->Integer('cantidad_salida')->nullable();
            $table->foreignId('user_salida')->nullable()->constrained('users')->onDelete('cascade');
            $table->text('observaciones')->nullable();    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verificacion_herramientas');
    }
};
