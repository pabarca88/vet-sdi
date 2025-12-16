<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemuneraciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remuneraciones', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('id_contrato_dependiente');
            $table->bigInteger('id_empleado');

            $table->integer('r_mes_liq');
            $table->integer('r_ano_liq');
            $table->integer('r_sueldo_base');
            $table->integer('r_bonos')->nullable();
            $table->integer('r_horas_extra')->nullable();
            $table->integer('r_otros_imp')->nullable();
            $table->integer('r_total_h_imponibles')->nullable();
            $table->integer('r_colacion')->nullable();
            $table->integer('r_movilizacion')->nullable();
            $table->integer('r_asignacion_fam')->nullable();
            $table->integer('r_otros_noimp')->nullable();
            $table->integer('r_total_no_imponibles')->nullable();
            $table->integer('r_total_haberes')->nullable();
            $table->integer('r_afp')->nullable();
            $table->integer('r_seg_cesantia')->nullable();
            $table->integer('r_afp_vol')->nullable();
            $table->integer('r_por_salud')->nullable();
            $table->integer('r_prestamos')->nullable();
            $table->integer('r_anticipos')->nullable();
            $table->integer('r_ahorro_vol')->nullable();
            $table->integer('r_seguro_complementario')->nullable();
            $table->integer('r_otros_desc_pers')->nullable();
            $table->integer('r_total_desc')->nullable();
            $table->integer('r_suma_r_total_haberes');
            $table->integer('r_suma_r_total_desc')->nullable();
            $table->integer('r_a_pagar');

            // generador
            $table->bigInteger('id_liquidador_generador');
            $table->dateTime('r_fecha_generado')->useCurrent();

            // cambio a pagado
            $table->bigInteger('id_liquidador_pago')->nullable();
            $table->dateTime('r_fecha_pago')->default(NULL)->nullable();

            // cambio a eliminado
            $table->bigInteger('id_liquidador_eliminado')->nullable();
            $table->dateTime('r_fecha_eliminado')->default(NULL)->nullable();


            $table->string('pdf')->nullable();

            $table->integer('estado')->default(1);

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
        Schema::dropIfExists('remuneraciones');
    }
}
