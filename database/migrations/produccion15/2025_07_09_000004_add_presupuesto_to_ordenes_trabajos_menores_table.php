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
        Schema::table('ordenes_trabajos_menores', function (Blueprint $table) {
            $table->tinyInteger('presupuesto')->default(0)->after('id_laboratorio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ordenes_trabajos_menores', function (Blueprint $table) {
            $table->dropColumn('presupuesto');
        });
    }
};
