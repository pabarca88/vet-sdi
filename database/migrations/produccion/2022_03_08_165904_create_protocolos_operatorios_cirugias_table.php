<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtocolosOperatoriosCirugiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocolos_operatorios_cirugias', function (Blueprint $table) {
            $table->id();



            $table->string('nro_pabellon')->nullable();
            $table->time('inicio_operacion')->nullable();
            $table->time('fin_operacion')->nullable();
            $table->string('diagnostico_preoperatorio')->nullable();
            $table->string('diagnostico_postoperatorio')->nullable();
            $table->string('codigo_cirugia')->nullable();
            $table->string('anestesia')->nullable();
            $table->string('cirujano')->nullable();
            $table->string('ayudantes')->nullable();
            $table->string('anestesistas_ayudantes_anestesia')->nullable();
            $table->string('arsenaleria')->nullable();
            $table->string('biopsia_rapida')->nullable();
            $table->string('biopsia_diferida')->nullable();
            $table->string('biopsia_nro_muestras')->nullable();
            $table->string('biopsia_patologo')->nullable();
            $table->string('nombre_operacion')->nullable();
            $table->string('material_hemostasia')->nullable();
            $table->string('material_cierre')->nullable();
            $table->string('otros_implantes')->nullable();
            $table->string('descripcion_cirugia')->nullable();
            $table->string('farmacos')->nullable();
            $table->string('pulso_presion_arterial')->nullable();
            $table->string('incidentes')->nullable();
            $table->string('recuperacion_anestesia')->nullable();
            $table->string('descripcion_anestesia')->nullable();
            $table->string('incidencias')->nullable();
            $table->string('destino_paciente')->nullable();
            $table->string('indicaciones_postoperacion')->nullable();

            //Parto Normal

            $table->string('semanas_gestacion')->nullable();
            $table->string('tipo_embarazo')->nullable();
            $table->string('sufrimiento_fetal')->nullable();
            $table->string('induccion_parto')->nullable();
            $table->string('presentacion_fetal')->nullable();
            $table->string('neonatologo')->nullable();
            $table->string('matron')->nullable();
            $table->string('presentacion_tipo_parto')->nullable();
            $table->string('placenta')->nullable();
            $table->string('recien_nacido')->nullable();
            $table->string('episiotomia')->nullable();
            $table->string('incidencias_parto')->nullable();

            $table->unsignedBigInteger('id_paciente')->nullable();
            $table->unsignedBigInteger('id_profesional')->nullable();
            $table->unsignedBigInteger('id_ficha_atencion')->nullable();
            $table->unsignedBigInteger('id_lugar_atencion')->nullable();
            $table->unsignedBigInteger('id_solicitud_pabellon')->nullable();

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
        Schema::dropIfExists('protocolos_operatorios_cirugias');
    }
}