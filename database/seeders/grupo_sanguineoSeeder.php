<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GrupoSanguineo;

class grupo_sanguineoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GrupoSanguineo::create([
            'nombre_gs' => 'O negativo',
            'descripcion_gs' => 'Este grupo sanguíneo no tiene marcadores A ni B y tampoco presenta el factor Rh.
            '

        ]);
        GrupoSanguineo::create([
            'nombre_gs' => 'O positivo',
            'descripcion_gs' => 'Este grupo sanguíneo no tiene marcadores A ni B pero sí que presenta el factor Rh. Se trata de uno de los grupos sanguíneos más frecuentes (junto con el A positivo).'

        ]);
        GrupoSanguineo::create([
            'nombre_gs' => 'A negativo',
            'descripcion_gs' => 'Este grupo sanguíneo solo tiene el marcador A.'

        ]);
        GrupoSanguineo::create([
            'nombre_gs' => 'A positivo',
            'descripcion_gs' => 'Este grupo sanguíneo tiene el marcador A y el factor Rh, pero no tiene el marcador B. Junto con el O positivo, se trata de uno de los dos grupos sanguíneos más frecuentes.'

        ]);
        GrupoSanguineo::create([
            'nombre_gs' => 'B negativo',
            'descripcion_gs' => 'Este grupo sanguíneo solo tiene el marcador B.'

        ]);
        GrupoSanguineo::create([
            'nombre_gs' => 'B positivo',
            'descripcion_gs' => 'Este grupo sanguíneo tiene el marcador B y el factor Rh, pero carece del marcador A.'

        ]);
        GrupoSanguineo::create([
            'nombre_gs' => 'AB negativo',
            'descripcion_gs' => 'Este grupo sanguíneo tiene los marcadores A y B, pero carece del factor Rh.'

        ]);
        GrupoSanguineo::create([
            'nombre_gs' => 'AB positivo',
            'descripcion_gs' => 'Este grupo sanguíneo tiene los tres marcadores: A, B y factor Rh.'

        ]);
    }
}