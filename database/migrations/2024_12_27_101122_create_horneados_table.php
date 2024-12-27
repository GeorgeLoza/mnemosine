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
        Schema::create('horneados', function (Blueprint $table) {
            $table->id();
            $table->date('tiempo')->nullable();
            $table->decimal('preparacion', 5, 3)->nullable();
            $table->foreignId('orp_id')->nullable()->constrained('orps')->onDelete('cascade');
            $table->boolean('verificacion_corte')->nullable();
            $table->integer('nhorno')->nullable();
            $table->time('tiempo_horneado')->nullable();
            $table->decimal('temperatura', 5, 2)->nullable();
            $table->decimal('temperatura_nucleo', 5, 2)->nullable();
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
        Schema::dropIfExists('horneados');
    }
};
