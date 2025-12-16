<?php

namespace Database\Seeders;

use App\Models\receta;
use Illuminate\Database\Seeder;

class recetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $contador = 30;

        for ($i=0; $i <$contador ; $i++) { 
            receta::create([
                'id_profesional'=> mt_Rand(1, 10),
                'id_ficha_atencion'=> $i+1,
                'id_paciente'=> mt_Rand(1, 10)
                
            ]);
        }
        
    }
}
