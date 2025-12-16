<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoConvenioDentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_convenio_dental', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();;
            $table->string('descripcion')->nullable();
            $table->integer('estado')->default(1);
            $table->double('porcentaje_dcto')->nullable();
            $table->date('fechas_de_pago')->nullable();
            $table->string('otros')->nullable();
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
        Schema::dropIfExists('tipo_convenio_dental');
    }
}
