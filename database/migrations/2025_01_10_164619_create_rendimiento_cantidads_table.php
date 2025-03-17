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
        Schema::create('rendimiento_cantidads', function (Blueprint $table) {
            $table->id();
            $table->date('tiempo')->nullable();
            $table->foreignId('orp_id')->nullable()->constrained('orps')->onDelete('cascade');
            $table->decimal('rendimiento_teorico', 5, 3)->nullable();            
            $table->decimal('rendimiento_real', 5, 3)->nullable();            
            $table->decimal('cantidad_conforme', 5, 3)->nullable();            
            $table->decimal('cantidad_no_conforme', 5, 3)->nullable();            
            $table->decimal('cantidad_pedido', 5, 3)->nullable();            
            $table->decimal('cantidad_contramuestra', 5, 3)->nullable();            
            $table->decimal('muestra_micro', 5, 3)->nullable();            
            $table->decimal('muestra_fisico', 5, 3)->nullable();            
            $table->decimal('canastillo_limpio', 5, 3)->nullable();            
            $table->decimal('cantidad_bolsa', 5, 3)->nullable();            
            $table->decimal('calidad_sellado', 5, 3)->nullable();            
            $table->decimal('cantidad_embalado', 5, 3)->nullable();            
            $table->decimal('calidad_embalado', 5, 3)->nullable();            
            $table->decimal('cantidad_canastillos', 5, 3)->nullable();            
            $table->decimal('total_nerma', 5, 3)->nullable();            
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('user_recepcionado')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('user_entregado')->nullable()->constrained('users')->onDelete('set null');
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
        Schema::dropIfExists('rendimiento_cantidads');
    }
};
