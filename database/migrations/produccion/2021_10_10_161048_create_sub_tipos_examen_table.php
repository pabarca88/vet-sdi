<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubTiposExamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_tipos_examen', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cod_examen')->nullable();
            $table->unsignedBigInteger('id_tipo_examen');
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
        Schema::dropIfExists('sub_tipos_examen');
    }
}
