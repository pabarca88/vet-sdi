<?php

namespace Database\Seeders;

use App\Models\Prevision;
use Illuminate\Database\Seeder;

class previsionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prevision::create([
            'nombre'=> 'Fonasa',
            'codigo'=> '01',
            'pagina_web'=>'www.fonasa.cl',
            'telefono'=>'123457'

        ]);
        Prevision::create([
            'nombre'=> 'Banmédica S.A.',
            'codigo'=> '99',
            'pagina_web'=>'www.banmedica.cl',
            'telefono'=>'600 600 3600'
        ]);

        Prevision::create([
            'nombre'=> 'Isalud Ltda.',
            'codigo'=> '63',
            'pagina_web'=>'https://www.isapredecodelco.c',
            'telefono'=>'800 633 444'
        ]);
        Prevision::create([
            'nombre'=> 'Colmena Golden Cross S.A.',
            'codigo'=> '67',
            'pagina_web'=>'www.colmena.cl',
            'telefono'=>''
        ]);
        Prevision::create([
            'nombre'=> 'Consalud S.A.',
            'codigo'=> '107',
            'pagina_web'=>'	www.consalud.cl',
            'telefono'=>''
        ]);
        Prevision::create([
            'nombre'=> 'Cruz Blanca S.A.',
            'codigo'=> '78',
            'pagina_web'=>'www.cruzblanca.cl',
            'telefono'=>'600 818 0000'
        ]);
        Prevision::create([
            'nombre'=> 'Cruz del Norte Ltda.',
            'codigo'=> '81',
            'pagina_web'=>'www.isaprecruzdelnorte.cl',
            'telefono'=>'97 799365'
        ]);
        Prevision::create([
            'nombre'=> 'Nueva Masvida S.A.',
            'codigo'=> '94',
            'pagina_web'=>'www.nuevamasvida.cl',
            'telefono'=>'600 600 262'
        ]);
        Prevision::create([
            'nombre'=> 'Fundación Ltda.',
            'codigo'=> '76',
            'pagina_web'=>'www.isaprefundacion.cl',
            'telefono'=>'22 347 9000'
        ]);
        Prevision::create([
            'nombre'=> 'Vida Tres S.A.',
            'codigo'=> '80',
            'pagina_web'=>'www.vidatres.cl',
            'telefono'=>'6006003535'
        ]);
    }
}
