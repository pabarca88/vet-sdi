<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimientosImplantesRehabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimientos_implantes_rehab', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_procedimiento')->nullable();
            $table->unsignedInteger('id_paciente');
            $table->unsignedInteger('id_profesional');
            $table->unsignedInteger('id_ficha_atencion');
            $table->unsignedInteger('id_especialidad');

            $table->double('numero_pieza')->nullable();
            $table->date('fecha')->nullable();

            $table->unsignedInteger('id_tipo_procedimiento')->nullable();
            $table->string('tipo_procedimiento', 255)->nullable();

            // Anestesia
            $table->unsignedInteger('id_tipo_anestesia')->nullable();
            $table->string('anestesia', 255)->nullable();
            $table->integer('numero_tubos')->nullable();
            $table->unsignedInteger('id_tecnica_anestesia')->nullable();
            $table->string('tecnica_anestesia', 255)->nullable();
            $table->unsignedInteger('id_anestesico')->nullable();
            $table->string('anestesico', 255)->nullable();

            // Incidentes
            $table->unsignedInteger('id_incidentes')->nullable();
            $table->string('incidentes', 255)->nullable();

            // Material de restauración y anclaje
            $table->unsignedInteger('id_material_rest')->nullable();
            $table->string('material_rest', 255)->nullable();
            $table->unsignedInteger('id_tipo_anclaje')->nullable();
            $table->string('tipo_anclaje', 255)->nullable();

            $table->unsignedInteger('estado')->default(1);

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
        Schema::dropIfExists('procedimientos_implantes_rehab');
    }
}
