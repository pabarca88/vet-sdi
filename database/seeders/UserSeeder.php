<?php

namespace Database\Seeders;

use App\Models\Asistente;
use App\Models\FichaAtencion;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cristhopher
        $user1 = User::create(
            [
                'name' => 'Cristopher Escobar',
                'email' => 'jkriman@gmail.com',
                'password' => Hash::make('12345678'),
            ]
        );

        $user1->assignRole('Admin');
        $user1->givePermissionTo('admin.role.create');
        $user1->givePermissionTo('profesional.premium.pacientes.reposo_medico');
        $user1->givePermissionTo('profesional.premium.pacientes.licencia');
        $user1->assignRole('Profesional');
        $user1->assignRole('Paciente');
        $user1->assignRole('Asistente');

        $profesional1 = Profesional::create(
            [
                'nombre' => 'Cristopher',
                'apellido_uno' => 'Escobar',
                'apellido_dos' => 'Escobar',
                'sexo' => 'M',
                'rut' => '17804678-0',
                'email' => $user1->email,
                'telefono_uno' => 981431769,
                'telefono_dos' => null,
                'certificado' => mt_rand(1, 10),
                'id_direccion' => mt_rand(1, 12),
                'id_especialidad' => mt_rand(1, 12),
                'id_usuario' => $user1->id,
            ]
        );

        Paciente::create([
            'rut' => '17804678-0',
            'nombres' => 'Cristopher',
            'apellido_uno' => 'Escobar',
            'apellido_dos' => 'Escobar',
            'telefono_uno' => 981431769,
            'telefono_dos' => null,
            'profesion' => 'Informatico',
            'sexo' => 'M',
            'email' => $user1->email,
            'fecha_nac' => '1990-12-01 22:10:15',
            'id_prevision' => mt_rand(1, 10),
            'id_direccion' => mt_rand(1, 12),
            'id_usuario' => $user1->id,
        ]);

        Asistente::create([
            'rut' => '17804678-0',
            'nombres' => 'Cristopher',
            'apellido_uno' => 'Maldonado',
            'apellido_dos' => 'Contreras',
            'telefono_uno' => 981431769,
            'telefono_dos' => null,
            'sexo' => 'M',
            'email' => $user1->email,
            'fecha_nac' => '1990-12-01 22:10:15',
            'id_direccion' => mt_rand(1, 12),
            'id_usuario' => $user1->id,
        ]);

        // FichaAtencion::create([
        //         'motivo' => 'consulta prueba',
        //         'id_paciente' => mt_rand(1, 10),
        //         'id_profesional' => $profesional1->id,
        //     ]);

        // ProfesionalesLugaresAtencion::create([
        //         'id_profesional' => $profesional1->id,
        //         'id_lugar_atencion' => mt_rand(1, 10),
        //     ]);

        //END Cristhopher

        // Alexander Maldonado
        $user2 = User::create(
            [
                'name' => 'Alexander Maldonado',
                'email' => 'aldaner74@gmail.com',
                'password' => Hash::make('12345678'),
            ]
        );

        $user2->assignRole('Admin');
        $user2->assignRole('Profesional');
        $user2->assignRole('Paciente');
        $user2->assignRole('Asistente');

        $profesional2 = Profesional::create(
            [
                'nombre' => 'Alexander Edwards ',
                'apellido_uno' => 'Maldonado',
                'apellido_dos' => 'Contreras',
                'sexo' => 'M',
                'rut' => '19772400-5',
                'email' => $user2->email,
                'telefono_uno' => 981431769,
                'telefono_dos' => null,
                'certificado' => mt_rand(1, 10),
                'id_direccion' => mt_rand(1, 12),
                'id_especialidad' => mt_rand(1, 12),
                'id_usuario' => $user2->id,
            ]
        );

        Paciente::create([
            'rut' => '19772400-5',
            'nombres' => 'Alexander Edwards ',
            'apellido_uno' => 'Maldonado',
            'apellido_dos' => 'Contreras',
            'telefono_uno' => 981431769,
            'telefono_dos' => null,
            'profesion' => 'Informatico',
            'sexo' => 'M',
            'email' => $user2->email,
            'fecha_nac' => '1990-12-01 22:10:15',
            'id_prevision' => mt_rand(1, 10),
            'id_direccion' => mt_rand(1, 12),
            'id_usuario' => $user2->id,
        ]);

        Asistente::create([
            'rut' => '19772400-5',
            'nombres' => 'Alexander Edwards ',
            'apellido_uno' => 'Maldonado',
            'apellido_dos' => 'Contreras',
            'telefono_uno' => 981431769,
            'telefono_dos' => null,
            'sexo' => 'M',
            'email' => $user2->email,
            'fecha_nac' => '1990-12-01 22:10:15',
            'id_direccion' => mt_rand(1, 12),
            'id_usuario' => $user2->id,
        ]);

        // FichaAtencion::create([
        //         'motivo' => 'consulta prueba',
        //         'id_paciente' => mt_rand(1, 10),
        //         'id_profesional' => $profesional2->id,
        //     ]);

        // ProfesionalesLugaresAtencion::create([
        //         'id_profesional' => $profesional2->id,
        //         'id_lugar_atencion' => mt_rand(1, 10),
        //     ]);

        //END ALEXANDER

        // Jaime Kriman
        $user3 = User::create(
            [
                'name' => 'Jaime Kriman',
                'email' => 'jkriman@gmail.com',
                'password' => Hash::make('12345678'),
            ]
        );

        $user3->assignRole('Admin');
        $user3->assignRole('Profesional');
        $user3->assignRole('Paciente');
        $user3->assignRole('Asistente');

        $profesional3 = Profesional::create(
            [
                'nombre' => 'Jaime',
                'apellido_uno' => 'kriman',
                'apellido_dos' => 'kriman',
                'sexo' => 'M',
                'rut' => '11111111-1',
                'email' => $user3->email,
                'telefono_uno' => 981431769,
                'telefono_dos' => null,
                'certificado' => mt_rand(1, 10),
                'id_direccion' => mt_rand(1, 12),
                'id_especialidad' => mt_rand(1, 12),
                'id_usuario' => $user3->id,
            ]
        );

        Paciente::create([
            'rut' => '11111111-1',
            'nombres' => 'Jaime',
            'apellido_uno' => 'kriman',
            'apellido_dos' => 'kriman',
            'telefono_uno' => 981431769,
            'telefono_dos' => null,
            'profesion' => 'Informatico',
            'sexo' => 'M',
            'email' => $user3->email,
            'fecha_nac' => '1990-12-01 22:10:15',
            'id_prevision' => mt_rand(1, 10),
            'id_direccion' => mt_rand(1, 12),
            'id_usuario' => $user3->id,
        ]);

        Asistente::create([
            'rut' => '11111111-1',
            'nombres' => 'Jaime',
            'apellido_uno' => 'kriman',
            'apellido_dos' => 'kriman',
            'telefono_uno' => 981431769,
            'telefono_dos' => null,
            'sexo' => 'M',
            'email' => $user3->email,
            'fecha_nac' => '1990-12-01 22:10:15',
            'id_direccion' => mt_rand(1, 12),
            'id_usuario' => $user3->id,
        ]);

        // FichaAtencion::create([
        //         'motivo' => 'consulta prueba',
        //         'id_paciente' => mt_rand(1, 10),
        //         'id_profesional' => $profesional3->id,
        //     ]);

        // ProfesionalesLugaresAtencion::create([
        //         'id_profesional' => $profesional3->id,
        //         'id_lugar_atencion' => mt_rand(1, 10),
        //     ]);

        //END Jaime

        // Mireya
        $user4 = User::create(
            [
                'name' => 'Mireya Acuña',
                'email' => 'magchile77@gmail.com',
                'password' => Hash::make('12345678'),
            ]
        );

        $user4->assignRole('Admin');
        $user4->assignRole('Profesional');
        $user4->assignRole('Paciente');
        $user4->assignRole('Asistente');

        $profesional4 = Profesional::create(
            [
                'nombre' => 'Mireya',
                'apellido_uno' => 'Acuña',
                'apellido_dos' => 'Acuña',
                'sexo' => 'M',
                'rut' => '9152125-0',
                'email' => $user4->email,
                'telefono_uno' => 981431769,
                'telefono_dos' => null,
                'certificado' => mt_rand(1, 10),
                'id_direccion' => mt_rand(1, 12),
                'id_especialidad' => mt_rand(1, 12),
                'id_usuario' => $user4->id,
            ]
        );

        Paciente::create([
            'rut' => '9152125-0',
            'nombres' => 'Mireya',
            'apellido_uno' => 'Acuña',
            'apellido_dos' => 'Acuña',
            'telefono_uno' => 981431769,
            'telefono_dos' => null,
            'profesion' => 'Informatico',
            'sexo' => 'M',
            'email' => $user4->email,
            'fecha_nac' => '1990-12-01 22:10:15',
            'id_prevision' => mt_rand(1, 10),
            'id_direccion' => mt_rand(1, 12),
            'id_usuario' => $user4->id,
        ]);

        Asistente::create([
            'rut' => '9152125-0',
            'nombres' => 'Mireya',
            'apellido_uno' => 'Acuña',
            'apellido_dos' => 'Acuña',
            'telefono_uno' => 981431769,
            'telefono_dos' => null,
            'sexo' => 'M',
            'email' => $user4->email,
            'fecha_nac' => '1990-12-01 22:10:15',
            'id_direccion' => mt_rand(1, 12),
            'id_usuario' => $user4->id,
        ]);

        // FichaAtencion::create([
        //     'motivo' => 'consulta prueba',
        //     'id_paciente' => mt_rand(1, 10),
        //     'id_profesional' => $profesional4->id,
        // ]);

        // ProfesionalesLugaresAtencion::create([
        //     'id_profesional' => $profesional4->id,
        //     'id_lugar_atencion' => mt_rand(1, 10),
        // ]);

        //END Mireya

        $user5 = User::create(
            [
                'name' => 'Daniela Sepúlveda',
                'email' => 'dasebraa@gmail.com',
                'password' => Hash::make('12345678'),
            ]
        );

        $user5->assignRole('Admin');
        $user5->assignRole('Paciente');

        // $user6 = User::create(
        //     [
        //         'name' => 'Nicolas Fernandez',
        //         'email' => 'nicolasfernz@gmail.com',
        //         'password' => Hash::make('12345678'),
        //     ]
        // );

        // $user6->assignRole('Admin');
        // $user6->assignRole('Paciente');
    }
}
