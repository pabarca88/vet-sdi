<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('mascotas', function (Blueprint $table) {
            $table->longText('vacunas_registro')->nullable()->after('vacunas');
            $table->longText('desparasitaciones_registro')->nullable()->after('vacunas_registro');
        });
    }

    public function down(): void
    {
        Schema::table('mascotas', function (Blueprint $table) {
            $table->dropColumn(['vacunas_registro', 'desparasitaciones_registro']);
        });
    }
};

