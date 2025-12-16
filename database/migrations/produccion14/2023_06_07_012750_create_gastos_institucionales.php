<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGastosInstitucionales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gastos_institucionales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_institucion');
            $table->bigInteger('id_lugar_atencion');
            $table->bigInteger('id_adm');
            $table->integer('tipo')->nullable();
            $table->string('nombre')->nullable();
            $table->date('vencimiento')->nullable();
            $table->string('emisor')->nullable();
            $table->string('folio')->nullable();
            $table->string('grupo')->nullable();
            $table->string('mes_pago')->nullable();
            $table->string('ano_pago')->nullable();
            $table->string('modo_pago')->nullable();
            $table->string('monto')->nullable();
            $table->integer('estado')->default('1')->nullable();
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
        Schema::dropIfExists('gastos_institucionales');
    }
}
