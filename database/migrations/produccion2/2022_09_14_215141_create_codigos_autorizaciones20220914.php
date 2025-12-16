<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodigosAutorizaciones20220914 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigos_autorizaciones', function (Blueprint $table) {
            $table->id();

            $table->integer('codigo');
            $table->bigInteger('id_tipo_autorizacion')->nullable();
            $table->bigInteger('id_control'); // id ficha atencion /
            $table->bigInteger('id_tipo_medio'); //1, telefon, 2, correo....
            $table->string('medio');// email, telefono valor
            $table->date('fecha_solititud');
            $table->time('hora_solititud');
            $table->date('fecha_autorizacion')->nullable();
            $table->time('hora_autorizacion')->nullable();
            $table->text('info_equipo_autorizacion')->nullable();
            $table->string('nombre_autoriza');
            $table->string('apellido_autoriza');
            $table->string('rut_autoriza');
            $table->bigInteger('id_parentezco_autoriza');

            $table->integer('estado')->nullable();

            $table->timestamps();
        });

        Schema::create('tipo_autorizacion', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('estado');

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
        Schema::dropIfExists('codigos_autorizaciones');
        Schema::dropIfExists('tipo_autorizacion');
    }
}
