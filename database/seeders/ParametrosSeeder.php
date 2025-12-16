<?php

namespace Database\Seeders;

use App\Models\Parametro;
use Illuminate\Database\Seeder;

class ParametrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parametro::create([
            'valor' => 'Reservada',
            'referencia' => 'Agenda_Estado',
        ]);

        Parametro::create([
        'valor' => 'Confirmada',
        'referencia' => 'Agenda_Estado',
        ]);

        Parametro::create([
        'valor' => 'Rechazada',
        'referencia' => 'Agenda_Estado',
        ]);

        Parametro::create([
        'valor' => 'Espera',
        'referencia' => 'Agenda_Estado',
        ]);

        Parametro::create([
        'valor' => 'Realizando',
        'referencia' => 'Agenda_Estado',
        ]);

        Parametro::create([
        'valor' => 'Realizada',
        'referencia' => 'Agenda_Estado',
        ]);

        Parametro::create([
        'valor' => 'Inasistida',
        'referencia' => 'Agenda_Estado',
        ]);
    }
}