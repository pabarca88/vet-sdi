<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalConveniosIndependientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional_convenios_independientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_convenio');
            $table->string('convenios');
            $table->string('tipo_atencion');
            $table->double('valor');
            $table->integer('id_profesional');
            $table->integer('id_lugar_atencion')->nullable();
            $table->string('productos_convenio')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->double('porcentaje');
            $table->integer('id_tipo_convenio');
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
        Schema::dropIfExists('profesional_convenios_independientes');
    }
}
