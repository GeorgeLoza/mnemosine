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
        Schema::create('orps', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo');
            $table->foreignId('producto_id')->constrained()->onDelete('cascade');
            $table->decimal('lote', 7, 4)->nullable();
            $table->string('estado');
            $table->dateTime('tiempo_produccion')->nullable();
            $table->dateTime('tiempo_elaboracion')->nullable();
            $table->date('fecha_vencimiento1')->nullable();
            $table->date('fecha_vencimiento2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orps');
    }
};
