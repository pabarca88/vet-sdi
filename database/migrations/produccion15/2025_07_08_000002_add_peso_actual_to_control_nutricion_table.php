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
        Schema::table('control_nutricion', function (Blueprint $table) {
            $table->decimal('peso_actual', 8, 2)->nullable()->after('datos_control');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('control_nutricion', function (Blueprint $table) {
            $table->dropColumn('peso_actual');
        });
    }
};
