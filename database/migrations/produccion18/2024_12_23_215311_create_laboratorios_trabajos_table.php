<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoriosTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratorios_trabajos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_laboratorio');
            $table->integer('id_trabajo');
            $table->double('valor');
            $table->integer('estado')->default(1);
            $table->string('observacion')->nullable();
            $table->string('duracion')->nullable();
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
        Schema::dropIfExists('laboratorios_trabajos');
    }
}
