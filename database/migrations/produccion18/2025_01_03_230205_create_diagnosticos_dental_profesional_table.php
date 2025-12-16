<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticosDentalProfesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosticos_dental_profesional', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_diagnostico');
            $table->unsignedBigInteger('id_profesional');
            $table->integer('laboratorio');
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
        Schema::dropIfExists('diagnosticos_dental_profesional');
    }
}
