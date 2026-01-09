<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfoGeneralToMascotasTable extends Migration
{
    public function up()
    {
        Schema::table('mascotas', function (Blueprint $table) {
            $table->text('dieta')->nullable()->after('enfermedad_cronica');
            $table->date('ultima_desparasitacion')->nullable()->after('dieta');
            $table->string('producto_desparasitacion', 255)->nullable()->after('ultima_desparasitacion');
            $table->text('cirugias')->nullable()->after('producto_desparasitacion');
            $table->text('vacunas')->nullable()->after('cirugias');
            $table->text('viajes')->nullable()->after('vacunas');
            $table->boolean('vive_con_animales')->nullable()->after('viajes');
        });
    }

    public function down()
    {
        Schema::table('mascotas', function (Blueprint $table) {
            $table->dropColumn([
                'dieta',
                'ultima_desparasitacion',
                'producto_desparasitacion',
                'cirugias',
                'vacunas',
                'viajes',
                'vive_con_animales',
            ]);
        });
    }
}
