<?php

namespace Database\Seeders;

use App\Models\TipoExamen;
use Illuminate\Database\Seeder;

class tipo_examenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoExamen::create([
            'nombre'=> 'Sangre'

        ]);

        TipoExamen::create([
            'nombre'=> 'Examenes en el paciente'

        ]);
        TipoExamen::create([
            'nombre'=> 'Orina'

        ]);
        TipoExamen::create([
            'nombre'=> 'DEPOSICIONES EXUDADOS, SECRECIONES Y OTROS LIQUIDOS'

        ]);
        TipoExamen::create([
            'nombre'=> 'IMAGENOLOGIA'

        ]);
        TipoExamen::create([
            'nombre'=> 'EXAMENES OTORRINOLARINGOLOGIA'

        ]);
        TipoExamen::create([
            'nombre'=> 'EXAMENES OFTALMOLOGIA'

        ]);
    }
}
