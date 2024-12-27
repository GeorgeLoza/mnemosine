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
        Schema::create('division_formado_decorados', function (Blueprint $table) {
            $table->id();
            $table->date('tiempo')->nullable();
            $table->decimal('preparacion',5, 3)->nullable();
            $table->foreignId('orp_id')->nullable()->constrained('orps')->onDelete('cascade');
            $table->decimal('peso_crudo1', 5, 2)->nullable();
            $table->decimal('peso_crudo2', 5, 2)->nullable();
            $table->decimal('peso_crudo3', 5, 2)->nullable();
            $table->decimal('peso_crudo4', 5, 2)->nullable();
            $table->decimal('peso_ajonjoli1', 5, 2)->nullable();
            $table->decimal('peso_ajonjoli2', 5, 2)->nullable();
            $table->decimal('peso_ajonjoli3', 5, 2)->nullable();
            $table->decimal('peso_ajonjoli4', 5, 2)->nullable();
            $table->boolean('centreado')->nullable();
            $table->boolean('uniformidad')->nullable();
            $table->boolean('homogeneidad')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('responsable_pintado')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('responsable_decorado')->nullable()->constrained('users')->onDelete('set null');
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
        Schema::dropIfExists('division_formado_decorados');
    }
};
