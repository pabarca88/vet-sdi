<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisosProfesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_profesional', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_paciente')->nullable();
            $table->boolean('permiso_cotizar')->default(false);
            $table->boolean('permiso_vender_audifonos')->default(false);
            $table->timestamps();
            // $table->foreign('id_profesional')->references('id')->on('profesionales')->onDelete('cascade');
            // $table->foreign('id_paciente')->references('id')->on('pacientes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos_profesional');
    }
}
