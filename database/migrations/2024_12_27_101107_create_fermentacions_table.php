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
        Schema::create('fermentacions', function (Blueprint $table) {
            $table->id();
            $table->date('tiempo')->nullable();
            $table->decimal('preparacion', 5, 3)->nullable();
            $table->foreignId('orp_id')->nullable()->constrained('orps')->onDelete('cascade');
            $table->integer('ncamara')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->decimal('humedad', 5, 2)->nullable();
            $table->decimal('temperatura', 5, 2)->nullable();
            $table->time('hora_salida')->nullable();
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
        Schema::dropIfExists('fermentacions');
    }
};
