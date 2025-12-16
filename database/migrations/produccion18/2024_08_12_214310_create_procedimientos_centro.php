<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimientosCentro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimientos_centro', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_lugar_atencion');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->string('minutos_bloque')->nullable();
            $table->string('cantidad_bloques');
            $table->string('otros')->nullable();
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
        Schema::dropIfExists('procedimientos_centro');
    }
}
