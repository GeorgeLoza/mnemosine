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
        Schema::create('higiene_personals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supervisor_id')->constrained('users')->onDelete('cascade'); // Foreign key for supervisor
            $table->foreignId('trabajador_id')->constrained('users')->onDelete('cascade'); // Foreign key for worker
            $table->dateTime('tiempo');
            $table->boolean('uniforme');
            $table->boolean('higiene');
            $table->boolean('salud');
            $table->boolean('objetos_extranos');
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
        Schema::dropIfExists('higiene_personals');
    }
};
