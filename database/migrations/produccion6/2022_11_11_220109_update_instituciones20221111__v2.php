<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInstituciones20221111V2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instituciones', function (Blueprint $table) {
            $table->string('sitio_web')->nullable()->after('id_tipo_institucion');
            $table->string('whatsapp')->nullable()->after('telefono');
            $table->tinyInteger('sucursales')->nullable()->default(0)->after('whatsapp');
            $table->string('horario_atencion')->nullable()->after('sucursales');
        });
    }

    public function down()
    {
        Schema::table('instituciones', function (Blueprint $table) {
            $table->drop('sitio_web');
            $table->drop('whatsapp');
            $table->drop('sucursales');
            $table->drop('horario_atencion');
        });
    }
}
