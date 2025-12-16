<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Paciente']);
        $role3 = Role::create(['name' => 'Profesional']);
        $role4 = Role::create(['name' => 'Asistente']);
        //$role5 = Role::create(['name' => 'Profesional_premium']);

        Permission::create(['name' => 'admin.home'])->assignRole($role1);
        Permission::create(['name' => 'admin.role.create']);
        Permission::create(['name' => 'admin.role.edit']);
        Permission::create(['name' => 'admin.role.destroy']);
        Permission::create(['name' => 'admin.role.index']);

        Permission::create(['name' => 'admin.permisos.create']);
        Permission::create(['name' => 'admin.permisos.edit']);
        Permission::create(['name' => 'admin.permisos.destroy']);
        Permission::create(['name' => 'admin.permisos.index']);

        Permission::create(['name' => 'profesional.pacientes.home'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'profesional.premium.pacientes.reposo_medico']);
        Permission::create(['name' => 'profesional.premium.pacientes.licencia']);
        Permission::create(['name' => 'profesional.premium.pacientes.ficha_medica_unica']);
        Permission::create(['name' => 'profesional.premium.pacientes.atenciones_previas']);
        Permission::create(['name' => 'profesional.premium.pacientes.resultados_examenes']);
        Permission::create(['name' => 'profesional.premium.pacientes.interconsulta']);
        Permission::create(['name' => 'profesional.premium.pacientes.informe_medico']);
        Permission::create(['name' => 'profesional.premium.pacientes.uso_personal']);
        Permission::create(['name' => 'profesional.premium.pacientes.atenciones_medicas_previas_sidebar']);

        Permission::create(['name' => 'paciente.home'])->syncRoles([$role1, $role2]);
    }
}