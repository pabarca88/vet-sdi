<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaUro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_uro', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_fichas_atenciones')->nullable();
            $table->bigInteger('id_paciente')->nullable();
            $table->bigInteger('id_profesional')->nullable();

            $table->string('descripcion_consulta_uro')->nullable();
            $table->string('antec_especialidad_uro')->nullable();
            $table->bigInteger('tipo_antecedente')->nullable();
            $table->string('antec_nuevo')->nullable();

            $table->integer('costo_vert_ld')->nullable();
            $table->string('obs_costo_vert_ld')->nullable();
            $table->integer('costo_vert_li')->nullable();
            $table->string('obs_costo_vert_li')->nullable();

            $table->integer('examen_abd')->nullable();
            $table->string('obs_examen_abd')->nullable();

            $table->integer('tacto_rec')->nullable();
            $table->string('obs_tacto_rec')->nullable();

            $table->integer('antigeno_prost')->nullable();
            $table->string('obs_antigeno_prost')->nullable();

            $table->integer('biopsia_uro')->nullable();
            $table->string('obs_biopsia_uro')->nullable();

            $table->integer('ingle')->nullable();
            $table->string('obs_detalle_ingle')->nullable();

            $table->integer('habitos_micionales')->nullable();
            $table->string('obs_habitos_micionales')->nullable();

            $table->integer('funcion_pene')->nullable();
            $table->string('obs_funcion_pene')->nullable();

            $table->integer('sintomas_funcionales')->nullable();
            $table->string('obs_sintomas_funcionales')->nullable();

            $table->integer('uretra_masc')->nullable();
            $table->string('obs_detalle_uretra_masc')->nullable();

            $table->integer('examen_pene')->nullable();
            $table->string('obs_pene_anormal')->nullable();

            $table->integer('examen_test')->nullable();
            $table->string('obs_test_anormal')->nullable();

            $table->integer('vulva')->nullable();
            $table->string('obs_det_vulva')->nullable();

            $table->integer('vagina')->nullable();
            $table->string('obs_detalle_uretra_fem')->nullable();

            $table->integer('examen_horm')->nullable();
            $table->string('obs_examen_horm')->nullable();
            $table->string('obs_ex_uro')->nullable();

            $table->string('estado')->nullable();

            $table->timestamps();
        });

        Schema::create('ficha_uro_tipo', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_profesional')->nullable();
            $table->string('nombre');
            $table->string('descripcion')->nullable();

            $table->string('descripcion_consulta_uro')->nullable();
            $table->string('antec_especialidad_uro')->nullable();
            $table->bigInteger('tipo_antecedente')->nullable();
            $table->string('antec_nuevo')->nullable();

            $table->integer('costo_vert_ld')->nullable();
            $table->string('obs_costo_vert_ld')->nullable();
            $table->integer('costo_vert_li')->nullable();
            $table->string('obs_costo_vert_lI')->nullable();

            $table->integer('examen_abd')->nullable();
            $table->string('obs_examen_abd')->nullable();

            $table->integer('tacto_rec')->nullable();
            $table->string('obs_tacto_rec')->nullable();

            $table->integer('antigeno_prost')->nullable();
            $table->string('obs_antigeno_prost')->nullable();

            $table->integer('biopsia_uro')->nullable();
            $table->string('obs_biopsia_uro')->nullable();

            $table->integer('ingle')->nullable();
            $table->string('obs_detalle_ingle')->nullable();

            $table->integer('habitos_micionales')->nullable();
            $table->string('obs_habitos_micionales')->nullable();

            $table->integer('funcion_pene')->nullable();
            $table->string('obs_funcion_pene')->nullable();

            $table->integer('sintomas_funcionales')->nullable();
            $table->string('obs_sintomas_funcionales')->nullable();

            $table->integer('uretra_masc')->nullable();
            $table->string('obs_detalle_uretra_masc')->nullable();

            $table->integer('examen_pene')->nullable();
            $table->string('obs_pene_anormal')->nullable();

            $table->integer('examen_test')->nullable();
            $table->string('obs_test_anormal')->nullable();

            $table->integer('vulva')->nullable();
            $table->string('obs_det_vulva')->nullable();

            $table->integer('vagina')->nullable();
            $table->string('obs_detalle_uretra_fem')->nullable();

            $table->integer('examen_horm')->nullable();
            $table->string('obs_examen_horm')->nullable();
            $table->string('obs_ex_uro')->nullable();

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
        Schema::dropIfExists('ficha_uro');
    }
}
