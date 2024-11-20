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
        Schema::create('documentacions', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('tipo');
            $table->string('version');
            $table->string('estado');
            $table->dateTime('fecha_creacion');
            $table->foreignId('creador_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('fecha_revision')->nullable();
            $table->foreignId('revisor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->dateTime('fecha_aprobacion')->nullable();
            $table->foreignId('aprovador_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('pdf_path')->nullable();
            $table->string('word_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentacions');
    }
};
