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
        Schema::create('personal_externos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tiempo');
            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->string('visita');
            $table->string('areaInstitucion');
            $table->string('motivo');
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
        Schema::dropIfExists('personal_externos');
    }
};
