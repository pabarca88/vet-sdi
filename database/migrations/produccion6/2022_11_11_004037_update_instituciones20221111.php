<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInstituciones20221111 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instituciones', function (Blueprint $table) {
            $table->string('razon_social')->nullable()->after('nombre');
            $table->string('certificado_supersalud')->nullable()->after('rut');
        });
    }

    public function down()
    {
        Schema::table('instituciones', function (Blueprint $table) {
            $table->drop('razon_social');
            $table->drop('certificado_supersalud');
        });
    }
}
