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
        Schema::create('verificacion_ord_lip_des', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tiempo');
            $table->foreignId('ord_lim_des_id')->nullable()->constrained()->onDelete('restrict');
            $table->boolean('limpieza');
            $table->boolean('desinfeccion');
            $table->boolean('profunda');
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
        Schema::dropIfExists('verificacion_ord_lip_des');
    }
};
