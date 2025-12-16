<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesPlanTratamientoTable extends Migration
{
    public function up()
    {
        Schema::create('examenes_plan_tratamiento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ficha_atencion');
            $table->string('diagnostico');
            $table->json('examenes'); // Aquí se almacenan los nombres de los exámenes seleccionados
            $table->text('observaciones')->nullable();
            $table->tinyInteger('tipo_examen'); // Ej: 1 para funcionales, 2 para imagenología, etc.
            $table->timestamps();

            // Opcional: si tienes la tabla fichas_atencion
            // $table->foreign('id_ficha_atencion')->references('id')->on('fichas_atencion')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('examenes_plan_tratamiento');
    }
}
