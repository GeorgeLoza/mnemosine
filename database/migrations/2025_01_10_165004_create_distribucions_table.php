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
        Schema::create('distribucions', function (Blueprint $table) {
            $table->id();
            $table->date('tiempo')->nullable();
            $table->foreignId('orp_id')->nullable()->constrained('orps')->onDelete('cascade');            
            $table->string('razon_social')->nullable();            
            $table->string('ubicacion')->nullable();            
            $table->integer('cantidad')->nullable();            
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
        Schema::dropIfExists('distribucions');
    }
};
