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
        Schema::create('seleccion_visuals', function (Blueprint $table) {
            $table->id();
            $table->date('tiempo')->nullable();
            $table->foreignId('orp_id')->nullable()->constrained('orps')->onDelete('cascade');
            $table->decimal('color_corteza', 5, 3)->nullable();            
            $table->decimal('color_base', 5, 3)->nullable();            
            $table->decimal('aspecto_miga', 5, 3)->nullable();            
            $table->decimal('deformidad_corte', 5, 3)->nullable();            
            $table->decimal('agujero_aire', 5, 3)->nullable();            
            $table->decimal('huecos_desgrane', 5, 3)->nullable();            
            $table->decimal('insuficiencia_ajonjoli', 5, 3)->nullable();            
            $table->decimal('exceso_ajonjoli', 5, 3)->nullable();            
            $table->decimal('arrugas_superficie', 5, 3)->nullable();            
            $table->decimal('globos_superficie', 5, 3)->nullable();            
            $table->decimal('harina_base', 5, 3)->nullable();            
            $table->decimal('simetria', 5, 3)->nullable();            
            $table->decimal('hundimiento_base', 5, 3)->nullable();            
            $table->decimal('presencio_beso', 5, 3)->nullable();            
            $table->decimal('total_merma', 5, 3)->nullable();            
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('responsable')->nullable()->constrained('users')->onDelete('set null');
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
        Schema::dropIfExists('seleccion_visuals');
    }
};
