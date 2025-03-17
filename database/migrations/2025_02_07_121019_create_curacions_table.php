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
        Schema::create('curacions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('tiempo');
            $table->foreignId('trabajador_id')->constrained('users')->onDelete('cascade');
            $table->text('detalle');
            $table->boolean('esparatrapo')->default(false);
            $table->boolean('guante')->default(false);
            $table->foreignId('responsable_inicio')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('responsable_fin')->nullable()->constrained('users')->onDelete('cascade');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curacions');
    }
};
