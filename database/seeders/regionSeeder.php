<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class regionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $regions = [
            [1,'Arica y Parinacota','XV'],
            [2,'Tarapacá','I'],
            [3,'Antofagasta','II'],
            [4,'Atacama','III'],
            [5,'Coquimbo','IV'],
            [6,'Valparaiso','V'],
            [7,'Metropolitana de Santiago','RM'],
            [8,'Libertador General Bernardo O\'Higgins','VI'],
            [9,'Maule','VII'],
            [10,'Biobío','VIII'],
            [11,'La Araucanía','IX'],
            [12,'Los Ríos','XIV'],
            [13,'Los Lagos','X'],
            [14,'Aisén del General Carlos Ibáñez del Campo','XI'],
            [15,'Magallanes y de la Antártica Chilena','XII']
        ];

        $regions = array_map(function($region){
           return [
               'id' => $region[0],
               'nombre' => $region[1],
               'sigla' => $region[2],
               
           ];
        }, $regions);

        DB::table('regiones')->insert($regions);

        
    }
}
