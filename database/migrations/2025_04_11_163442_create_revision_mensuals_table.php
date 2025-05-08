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
        Schema::create('revision_mensuals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mantenimiento_infrestructura_id')
                  ->constrained('mantenimiento_infrestructuras')
                  ->onDelete('cascade');
            $table->date('fecha');
            $table->string('estado');
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
        Schema::dropIfExists('revision_mensuals');
    }
};
