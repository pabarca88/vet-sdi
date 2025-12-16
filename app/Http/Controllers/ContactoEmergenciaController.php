<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Asistente;
use App\Models\ContactoEmergencia;
use App\Models\Direccion;
use App\Models\Paciente;
use App\Models\PacienteContactoEmergencia;
use App\Models\Profesional;
use App\Models\Region;
use Illuminate\Http\Request;
use function GuzzleHttp\json_decode;

class ContactoEmergenciaController extends Controller
{

    public function buscar_contacto(Request $request)
    {
        $paciente = Paciente::findOrFail($request->id_paciente_contacto);
        if ($paciente->rut == $request->rut_contacto) {
            $mensaje = 'identicos';
            return  $mensaje;
        }

        $contacto = ContactoEmergencia::where('rut', $request->rut_contacto)->get();

        foreach ($contacto as $con) {
            $contacto_paciente = PacienteContactoEmergencia::where('id_contacto', $con->id)->where('id_paciente', $request->id_paciente_contacto)->first();
            if ($contacto_paciente != '') {
                return 'existe';
            }
        }
        $contacto = ContactoEmergencia::where('rut', $request->rut_contacto)->first();
        // $contacto_paciente = PacienteContactoEmergencia::where('id_contacto', $contacto->id)->where('id_paciente', $request->id_paciente_contacto)->first();
        //$contacto = $resultado->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre;
        $region = Region::all();
        if ($contacto == null) {
            $contacto = Paciente::where('rut', $request->rut_contacto)->first();
            if ($contacto == null) {
                $contacto = Profesional::where('rut', $request->rut_contacto)->first();
                if ($contacto == null) {
                    $contacto = Asistente::where('rut', $request->rut_contacto)->first();
                    if ($contacto == null) {
                        return 'vacio';
                    } else {
                        //$contacto->nombres = $contacto->nombre;
                        $contacto->direccion = $contacto->Direccion()->first()->direccion;
                        $contacto->numero_dir = $contacto->Direccion()->first()->numero_dir;
                        $contacto->ciudad = $contacto->Direccion()->first()->Ciudad()->first();
                        $contacto->region = $region;
                        return json_encode($contacto);
                    }
                } else {
                    $contacto->direccion = $contacto->Direccion()->first()->direccion;
                    $contacto->nombres = $contacto->nombre;
                    $contacto->numero_dir = $contacto->Direccion()->first()->numero_dir;
                    $contacto->ciudad = $contacto->Direccion()->first()->Ciudad()->first();
                    $contacto->region = $region;
                    return json_encode($contacto);
                }
            } else {
                $contacto->direccion = $contacto->Direccion()->first()->direccion;
                $contacto->numero_dir = $contacto->Direccion()->first()->numero_dir;
                $contacto->ciudad = $contacto->Direccion()->first()->Ciudad()->first();
                $contacto->region = $region;
                return json_encode($contacto);
            }
        } else {
            $contacto->telefono_uno = $contacto->telefono;
            $contacto->nombres = $contacto->nombre;
            $contacto->direccion = $contacto->Direccion()->first()->direccion;
            $contacto->numero_dir = $contacto->Direccion()->first()->numero_dir;
            $contacto->ciudad = $contacto->Direccion()->first()->Ciudad()->first();
            $contacto->region = $region;
            return json_encode($contacto);
        }
    }

    public function registrar_contacto_emergencia(Request $request)
    {
        $paciente = Paciente::where('id', $request->id_paciente)->first();
        if ($paciente->rut == $request->rut) {
            $mensaje = 'identicos';
            return  $mensaje;
        }

        $contacto_emergencia = ContactoEmergencia::where('rut', $request->rut)->first();
        //$direccion_contacto = Direccion::where('id', $contacto_emergencia->id_direccion)->first();
        if ($contacto_emergencia == null) {
            $contacto_emergencia = new ContactoEmergencia();
            $direccion_contacto = new Direccion();
        } else {
            $direccion_contacto = Direccion::where('id', $contacto_emergencia->id_direccion)->first();
        }

        $direccion_contacto->direccion = $request->direccion;
        $direccion_contacto->numero_dir = $request->numero_dir;
        $direccion_contacto->id_ciudad = $request->id_ciudad;
        $direccion_contacto->save();

        $contacto_emergencia->rut = $request->rut;
        $contacto_emergencia->nombre = $request->nombres;
        $contacto_emergencia->apellido_uno = $request->apellido_uno;
        $contacto_emergencia->apellido_dos = $request->apellido_dos;
        $contacto_emergencia->parentezco = $request->parentezco;
        $contacto_emergencia->fecha_nac = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
        $contacto_emergencia->prioridad = $request->prioridad;
        $contacto_emergencia->id_direccion = $direccion_contacto->id;

        if ($contacto_emergencia->email != $request->email) {
            $contacto_emergencia->email = $request->email;
        }
        $contacto_emergencia->telefono = $request->telefono;
        //$direccion_contacto = Direccion::where('id', $contacto_emergencia->id_direccion)->first();

        if ($contacto_emergencia->save()) {
            $pacienteContacto = new PacienteContactoEmergencia();
            $pacienteContacto->id_paciente = $request->id_paciente;
            $pacienteContacto->id_contacto = $contacto_emergencia->id;
            $contacto_emergencia->relacion = $request->parentezco;
            if (!$pacienteContacto->save()) {
                return 'error';
            }
            return json_encode($contacto_emergencia);
        } else {
            return 'error al registrar el contacto de emergencia';
        }

        /*
        $contacto = new ContactoEmergencia();
        $direccion = new Direccion();
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $direccion->direccion = $request->direccion;
        $direccion->numero_dir = mt_rand(100, 9999);
        $direccion->id_ciudad = $request->id_ciudad;
        $direccion->save();
        $contacto->rut = $request->rut;
        $contacto->nombre = $request->nombres;
        $contacto->apellido_uno = $request->apellido_uno;
        $contacto->apellido_dos = $request->apellido_dos;
        $contacto->parentezco = $request->parentezco;
        $contacto->fecha_nac = \Carbon\Carbon::parse($request->fecha)->format('Y-m-d');
        $contacto->prioridad = $request->prioridad;
        $contacto->email = $request->email;
        $contacto->telefono = $request->telefono;
        $contacto->id_direccion = $direccion->id;

        if ($contacto->save()) {
            $pacienteContacto = new PacienteContactoEmergencia();
            $pacienteContacto->id_paciente = $request->id_paciente;
            $pacienteContacto->id_contacto = $contacto->id;
            $contacto->relacion = $request->parentezco;

            if (!$pacienteContacto->save()) {
                return 'error';
            }

            /*  $details = [
                      'title' => 'Hora medica Reservada',
                      'body' => 'Estimado/a '.$contacto->nombres.' '.$contacto->apellido_uno.' '.$contacto->apellido_dos.',<br>
                      Junto con saludar, por medio de este correo le informamos que se ha reservado su hora medida <br>'.
                      'Fecha: '.$contacto->fecha_consulta.'<br>'.
                      'Hora : '.$hora_medica->hora_inicio.'<br>'.
                      'Profesional: <b>'.$profesional->nombre.' '.$profesional->apellido_uno.' '.$profesional->apellido_dos.'<b> <br><br>'.
                      'Que tenga un excelente día. </br></br>'.
                      'Saludos.',
                  ];
              //Mail::to($paciente->email)->send(new \App\Mail\RegistroPacienteMail($details));
            return json_encode($contacto);
        }
        return 'algo';*/
    }
}
