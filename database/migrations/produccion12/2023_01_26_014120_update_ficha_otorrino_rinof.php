<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFichaOtorrinoRinof extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_otorrino_rinof', function (Blueprint $table) {

            $table->bigInteger('solicitado_id_profesional')->nullable()->after('id_ficha_otorrino');
            $table->string('solicitado_nombre')->nullable()->after('solicitado_id_profesional');
            $table->string('solicitado_apellido')->nullable()->after('solicitado_nombre');
            $table->string('solicitado_rut')->nullable()->after('solicitado_apellido');
            $table->string('solicitado_email')->nullable()->after('solicitado_rut');
            $table->string('solicitado_telefono')->nullable()->after('solicitado_email');
            $table->string('motivo')->nullable()->after('solicitado_telefono');
            $table->string('antecedentes')->nullable()->after('motivo');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_otorrino_rinof', function (Blueprint $table) {
            $table->drop('solicitado_id_profesional');
            $table->drop('solicitado_nombre');
            $table->drop('solicitado_apellido');
            $table->drop('solicitado_rut');
            $table->drop('solicitado_email');
            $table->drop('solicitado_telefono');
            $table->drop('motivo');
            $table->drop('antecedentes');
        });
    }
}
