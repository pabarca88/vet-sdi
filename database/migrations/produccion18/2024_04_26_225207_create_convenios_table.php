<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_convenio');
            $table->integer('id_tipo_convenio');
            $table->integer('id_tipo_producto_');
            $table->double('descuento');
            $table->integer('id_responsable');
            $table->integer('id_tipo_cobro');
            $table->integer('id_tipo_pago');
            $table->string('condiciones');
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
        Schema::dropIfExists('convenios');
    }
}
