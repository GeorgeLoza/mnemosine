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
        Schema::table('mantenimiento_infrestructuras', function (Blueprint $table) {
            Schema::table('mantenimiento_infrestructuras', function (Blueprint $table) {
                $table->string('frecuencia')->nullable()->after('infrestructura');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mantenimiento_infrestructuras', function (Blueprint $table) {
            Schema::table('mantenimiento_infrestructuras', function (Blueprint $table) {
                $table->dropColumn('frecuencia');
            });
        });
    }
};
