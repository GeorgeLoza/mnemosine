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
        Schema::create('ord_lim_des', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('sector_id')->nullable()->constrained()->onDelete('restrict');
            $table->boolean('lunes_lo');
            $table->boolean('lunes_des');
            $table->boolean('martes_lo');
            $table->boolean('martes_des');
            $table->string('miercoles_lo');
            $table->boolean('miercoles_des');
            $table->boolean('jueves_lo');
            $table->boolean('jueves_des');
            $table->boolean('viernes_des_pro');
            $table->boolean('sabado_lo');
            $table->boolean('sabado_des');
            $table->boolean('domingo_lo');
            $table->boolean('domingo_des');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ord_lim_des');
    }
};
