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
        Schema::create('dimensions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orp_id')->nullable()->constrained('orps')->onDelete('cascade');
            $table->decimal('preparacion', 5, 3)->nullable();
            $table->decimal('altura_total', 5, 2)->nullable();
            $table->decimal('diametro', 5, 2)->nullable();
            $table->decimal('altura_base', 5, 2)->nullable();
            $table->decimal('altura_feta_centro', 5, 2)->nullable();
            $table->decimal('altura_split', 5, 2)->nullable();
            $table->decimal('ancho_split', 5, 2)->nullable();
            $table->decimal('peso', 5, 2)->nullable();  
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
        Schema::dropIfExists('dimensions');
    }
};
