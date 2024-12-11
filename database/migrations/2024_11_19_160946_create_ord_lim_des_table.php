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
            $table->boolean('lunes_lo')->nullable();
            $table->boolean('lunes_des')->nullable();
            $table->boolean('martes_lo')->nullable();
            $table->boolean('martes_des')->nullable();
            $table->boolean('miercoles_lo')->nullable();
            $table->boolean('miercoles_des')->nullable();
            $table->boolean('jueves_lo')->nullable();
            $table->boolean('jueves_des')->nullable();
            $table->boolean('viernes_des_pro')->nullable();
            $table->boolean('sabado_lo')->nullable();
            $table->boolean('sabado_des')->nullable();
            $table->boolean('domingo_lo')->nullable();
            $table->boolean('domingo_des')->nullable();
            $table->timestamps();
            $table->foreignId('sector_id')->nullable()->constrained()->onDelete('restrict');
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
