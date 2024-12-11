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
        Schema::create('premezcla3s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orp_id')->nullable()->constrained('orps')->onDelete('cascade');
            $table->date('tiempo')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('responsable')->nullable()->constrained('users')->onDelete('set null');
            $table->decimal('manteca', 8, 4)->nullable();
            $table->decimal('emulsificante', 8, 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premezcla3s');
    }
};
