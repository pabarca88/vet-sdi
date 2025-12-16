<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamenesAudicionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examenes_audicion', function (Blueprint $table) {
            $table->id();

            // Campos de relaciones (FK)
            $table->unsignedBigInteger('id_ficha');
            $table->unsignedBigInteger('id_lugar_atencion');
            $table->unsignedBigInteger('id_profesional');
            $table->unsignedBigInteger('id_paciente');

            // Campo archivo para guardar los paths de archivos subidos
            // Usando el mismo tipo que en tratamientos_vppb (text con utf8mb4_unicode_ci)
            $table->text('archivo')->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable();

            // Campo estado (siguiendo el patrón de otras tablas)
            $table->integer('estado')->default(1);

            // Timestamps
            $table->timestamps();

            // Índices para mejorar performance en consultas
            $table->index('id_ficha');
            $table->index('id_lugar_atencion');
            $table->index('id_profesional');
            $table->index('id_paciente');
            $table->index('estado');

            // Comentario para documentar la tabla
            //$table->comment('Tabla para almacenar exámenes de audición con archivos adjuntos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examenes_audicion');
    }
}
