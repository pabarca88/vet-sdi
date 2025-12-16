<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificionConfirmacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificion_confirmacion', function (Blueprint $table) {
            $table->id();

            $table->string('tipo_notificacion')->default(1); // (1.reserva hora medica)

            $table->string('id_evento'); //
            $table->date('fecha_evento'); //
            $table->time('hora_evento'); //

            $table->dateTime('fecha_primera_notificacion'); //

            $table->integer('cantidad_notificacion')->nullable()->default(0); //
            $table->longText('medio_notificacion')->nullable(); //     email|app

            // {
            //     0:{
            //         0:{tipo:email,estado:1,fecha:2023-01-17 08:00:01},
            //         1:{tipo:app,estado:1,fecha:2023-01-17 08:00:01}
            //     },
            //     1:{
            //         0:{tipo:email,estado:1, fecha:2023-01-18 06:00:01}
            //     }
            // }

            $table->dateTime('fecha_notificacion')->nullable(); //

            $table->text('medio_confirmacion')->nullable(); //
            $table->dateTime('fecha_confirmacion')->nullable(); //
            $table->integer('estado_confirmacion')->nullable(); // (confirmado, rechazado)

            $table->string('otros',100)->nullable(); //
            $table->string('otros_1',100)->nullable(); //

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
        Schema::dropIfExists('notificion_confirmacion');
    }
}
