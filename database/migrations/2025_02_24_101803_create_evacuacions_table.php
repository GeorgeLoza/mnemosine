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
        Schema::create('evacuacions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tiempo');
            $table->Integer('turno');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('zunino')->nullable();
            $table->string('molde')->nullable();
            $table->string('hiline')->nullable();
            $table->string('reposteria')->nullable();
            $table->string('bk')->nullable();
            $table->string('grissin')->nullable();
            $table->string('hornos')->nullable();
            $table->string('codificado')->nullable();
            $table->string('embolsado_t1')->nullable();
            $table->string('embolsado_t2')->nullable();
            $table->string('embolsado_pan_molde')->nullable();
            $table->string('embolsado_bk')->nullable();
            $table->string('embolsado_reposteria')->nullable();
            $table->string('embolsado_grissin')->nullable();
            $table->text('observacion')->nullable();
            $table->text('correcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evacuacions');
    }
};
