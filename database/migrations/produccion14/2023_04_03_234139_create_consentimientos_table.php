<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsentimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('con_consentimientos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_consent');
            $table->string('nombre');
            $table->longText('texto');
            $table->integer('estado')->nullable()->default(1);
            $table->string('otro')->nullable();
            $table->timestamps();
        });
        Schema::create('con_consentimientos_pcte', function (Blueprint $table)
        {
            $table->id();
            $table->bigInteger('id_consent');
            $table->bigInteger('id_fc');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->string('num_consentimiento');
            $table->dateTime('fecha_cons');
            $table->string('observaciones_con')->nullable();
            $table->integer('revocacion')->nullable();
            $table->dateTime('fecha_revocacion')->nullable();
            $table->string('observaciones_rev')->nullable();
            $table->string('otro')->nullable();
            $table->integer('id_log_users_devices')->nullable();
            $table->integer('confirmacion')->nullable()->default(0);
            $table->timestamps();
        });
        Schema::create('con_consentimientos_dental_pcte', function (Blueprint $table)
        {
            $table->id();
            $table->bigInteger('id_consent');
            $table->bigInteger('id_fc');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->string('num_consentimiento');
            $table->dateTime('fecha_cons');
            $table->dateTime('piezas')->nullable();
            $table->dateTime('grupo')->nullable();
            $table->string('observaciones_con')->nullable();
            $table->integer('revocacion')->nullable();
            $table->dateTime('fecha_revocacion')->nullable();
            $table->string('observaciones_rev')->nullable();
            $table->string('otro')->nullable();
            $table->integer('id_log_users_devices')->nullable();
            $table->integer('confirmacion')->nullable()->default(0);
            $table->timestamps();
        });
        Schema::create('con_sol_alta_medica', function (Blueprint $table)
        {
            $table->id();
            $table->bigInteger('id_sol');
            $table->bigInteger('id_fc');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->string('num_sol');
            $table->dateTime('fecha_sol');
            $table->dateTime('fecha_hospit')->nullable();
            $table->string('observaciones_sol_alta')->nullable();
            $table->string('otro')->nullable();

            $table->integer('id_log_users_devices')->nullable();
            $table->integer('confirmacion')->nullable()->default(0);

            $table->timestamps();
        });
        Schema::create('con_rechazo_tratamiento', function (Blueprint $table)
        {
            $table->id();
            $table->bigInteger('id_sol');
            $table->bigInteger('id_fc');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->string('num_sol');
            $table->dateTime('fecha_sol');
            $table->string('observaciones_rech')->nullable();
            $table->string('otro')->nullable();

            $table->integer('id_log_users_devices')->nullable();
            $table->integer('confirmacion')->nullable()->default(0);

            $table->timestamps();
        });
        Schema::create('con_traslado', function (Blueprint $table)
        {
            $table->id();
            $table->bigInteger('id_sol_tr');
            $table->bigInteger('id_fc');
            $table->bigInteger('id_paciente');
            $table->bigInteger('id_profesional');
            $table->integer('id_tipo');
            $table->string('num_sol_tras');
            $table->dateTime('fecha_sol');
            $table->string('observaciones_trasl')->nullable();
            $table->string('otro')->nullable();

            $table->integer('id_log_users_devices')->nullable();
            $table->integer('confirmacion')->nullable()->default(0);

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
        Schema::dropIfExists('con_consentimientos');
        Schema::dropIfExists('con_consentimientos_pcte');
        Schema::dropIfExists('con_consentimientos_dental_pcte');
        Schema::dropIfExists('con_sol_alta_medica');
        Schema::dropIfExists('con_rechazo_tratamiento');
        Schema::dropIfExists('con_traslado');
    }
}
