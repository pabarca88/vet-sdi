<?php

namespace Database\Seeders;

use App\Models\Profesional;
use Illuminate\Database\Seeder;

class profesionalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profesional::factory(10)->create();
    }
}
