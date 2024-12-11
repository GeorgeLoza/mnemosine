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
        Schema::create('premezcla1s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orp_id')->nullable()->constrained('orps')->onDelete('cascade');
            $table->date('tiempo')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('responsable')->nullable()->constrained('users')->onDelete('set null');
            $table->decimal('azucar', 8, 4)->nullable();
            $table->decimal('leche', 8, 4)->nullable();
            $table->decimal('gluten', 8, 4)->nullable();
            $table->decimal('sal_yodada', 8, 4)->nullable();
            $table->decimal('propionato_calcio', 8, 4)->nullable();
            $table->decimal('esteaoril_lactilato_sodio', 8, 4)->nullable();
            $table->decimal('almidon', 8, 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premezcla1s');
    }
};
