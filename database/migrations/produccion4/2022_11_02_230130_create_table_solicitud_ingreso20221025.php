<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSolicitudIngreso20221025 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosp_ingreso', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_fichas_atenciones');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_clinica')->nullable();
            $table->date('fecha_solicitud')->nullable();
            $table->string('hosp_en',50)->nullable();
            $table->string('dg_ingreso',100)->nullable();
            $table->string('serv_hosp', 50)->nullable();
            $table->string('ind_ingreso',300)->nullable();
            $table->string('organo_op', 100)->nullable();
            $table->string('tipo_op', 100)->nullable();
            $table->string('tipo_anest',100)->nullable();
            $table->string('hora_op')->nullable();
            $table->string('cirujano')->nullable();
            $table->string('ayudante')->nullable();
            $table->string('anestesista')->nullable();
            $table->string('arsenalera',100)->nullable();
            $table->string('instr_esp',255)->nullable();
            $table->string('otros_hosp',255)->nullable();
            $table->string('img_1',100)->nullable();
            $table->string('img_2',100)->nullable();
            $table->string('img_3',100)->nullable();
            $table->string('img_4',100)->nullable();
            $table->string('img_5',100)->nullable();
            $table->string('img_6',100)->nullable();
            $table->tinyInteger('estado')->defaul('1');
            $table->timestamps();
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hosp_ingreso');

    }
}

