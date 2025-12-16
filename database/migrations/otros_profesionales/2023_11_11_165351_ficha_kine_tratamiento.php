<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FichaKineTratamiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_kine_tratamiento', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ficha_atencion_otros');
            $table->bigInteger('id_ficha_kinesiologia');
            $table->bigInteger('id_profesional');
            $table->bigInteger('id_paciente');
            $table->integer('tipo_trat')->nullable();
            $table->string('r_comentario')->nullable();
            $table->string('otro')->nullable();
            $table->string('otro1')->nullable();
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
       Schema::dropIfExists('ficha_kine_tratamiento');
    }
}
