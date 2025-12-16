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
        Schema::table('ordenes_trabajos_mayores', function (Blueprint $table) {
            $table->tinyInteger('estado')->default(0)->after('presupuesto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ordenes_trabajos_mayores', function (Blueprint $table) {
            $table->dropColumn('estado');
        });
    }
};
