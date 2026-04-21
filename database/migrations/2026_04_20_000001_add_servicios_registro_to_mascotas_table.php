<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('mascotas', function (Blueprint $table) {
            $table->longText('suscripciones_servicios_registro')->nullable()->after('desparasitaciones_registro');
            $table->longText('reservas_servicios_registro')->nullable()->after('suscripciones_servicios_registro');
        });
    }

    public function down(): void
    {
        Schema::table('mascotas', function (Blueprint $table) {
            $table->dropColumn(['suscripciones_servicios_registro', 'reservas_servicios_registro']);
        });
    }
};
