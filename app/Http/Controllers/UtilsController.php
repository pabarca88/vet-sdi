<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Models\Articulo;
use App\Models\Ciudad;
use App\Models\ContactoEmergencia;
use App\Models\DiagnosticoCie;
use App\Models\Direccion;
use App\Models\Paciente;
use App\Models\PacienteContactoEmergencia;
use App\Models\Prevision;
use App\Models\Profesional;
use App\Models\RecetaDosis;
use App\Models\RecetaPresentacion;
use App\Models\Region;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UtilsController extends Controller
{
    public function getPrevisionesAll(){
        $previsones = Prevision::all();
        $data = [
            'Presiones' => $previsones
        ];
        return json_encode($data);
    }

    public function getCuidadesAll(){
        $ciudad = Ciudad::all();
        $data = [
            'Ciudad' => $ciudad
        ];
        return json_encode($data);
    }

    public function getRegiones(){
        $region = Region::all();
        $data = [
            'Regiones' => $region
        ];
        return json_encode($data);
    }

    public function getContacto(Request $request){
        $user = User::where('email', Crypt::decryptString($request->code))->first();
        $paciente = Paciente::where('id_usuario', $user->id)->first();

        $contacto = $paciente->ContactosEmergencia()->where('rut', $request->rut)->first();
        $contacto->relacion = $contacto->pivot->relacion;
        $direccion = $contacto->Direccion()->first();
        $direccion->Ciudad = $direccion->Ciudad()->first()->nombre;
        $direccion->Region = $direccion->Ciudad()->first()->id_region;
        $data = [
            'Contacto' => $contacto,
            'Direccion' => $direccion
        ];
        return json_encode($data);
    }

    public function setContacto(Request $request){
        try{
            $c = json_decode($request->contacto);
            $d = json_decode($request->direccion);

            $user = User::where('email', Crypt::decryptString($request->code))->first();
            $paciente = Paciente::where('id_usuario', $user->id)->first();
            $contacto = $paciente->ContactosEmergencia()->where('rut', $c->rut)->first();

            $contacto->rut              = $c->rut;
            $contacto->nombre           = $c->nombre;
            $contacto->apellido_uno     = $c->apellido_uno;
            $contacto->apellido_dos     = $c->apellido_dos;
            $contacto->email            = $c->email;
            $contacto->telefono         = $c->telefono;
            $contacto->prioridad        = $c->prioridad;
            $contacto->save();

            $pivot = PacienteContactoEmergencia::where('id_paciente', $c->pivot->id_paciente)
                                                ->where('id_contacto', $c->pivot->id_contacto)
                                                ->first();

            $pivot->relacion = $c->relacion;
            $pivot->save();

            $direccion = Direccion::where('id', $d->id)->first();
            $direccion->direccion   = $d->direccion;
            $direccion->numero_dir  = $d->numero_dir;
            $direccion->id_ciudad  = $d->id_ciudad;
            $direccion->save();

            $data = [
                'status' => 0,
            ];
        }catch(\Throwable $th){
            $data = [
                'status' => 1,
            ];
        }
        return json_encode($data);
    }

    public function delContacto(Request $request){
        $user = User::where('email', Crypt::decryptString($request->code))->first();
        $paciente = Paciente::where('id_usuario', $user->id)->first();
        $contacto = $paciente->ContactosEmergencia()->where('rut', $request->rut)->first();
        $paciente->ContactosEmergencia()->detach($contacto);
    }

    public function getPacientes(Request $request){
        $pacientes = Paciente::all()->take(5);
        foreach ($pacientes as $p) {
            $previcion = $p->Prevision()->first()->nombre;
            $p->Previcion = $previcion;
            $p->Premiun = false;
        }

        $data = [
            'pacientes' => $pacientes
        ];
        return json_encode($data);
    }

    public function getC10(Request $request){
        $c10 = DiagnosticoCie::all();
        $data = [
            'c10' => $c10
        ];
        return json_encode($data);
    }
    /* ---------- */

    public function getRegionesAll(){
        $region = Region::all();
        $data = [
            'Regiones' => $region
        ];
        return json_encode($data);
    }

    public function getCuidades( Request $request){
        $ciudad = Ciudad::where('id_region', $request->region)
                    ->orderby('nombre')->get();
        $data = [
            'Ciudad' => $ciudad
        ];
        return json_encode($data);
    }

    public function cambioContrasenaPerfil(Request $request)
    {
        $mensaje_error = '';
        $mensaje_error2 = '';
        $mensaje_success = '';
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($request->contrasena_actual)) {
            $error['contrasena_actual'] = 'campo requerido';
            $mensaje_error2 .= 'campo requerido\n';
            $valido = 0;
        }
        else
        {
            $filtro = array();
            $filtro[] = array('id', Auth::user()->id);
            $user = User::where( $filtro )->first();
            $password = $request->contrasena_actual;

            if (!password_verify($password, $user->password)) {
                if($user == NULL){
                    $error['contrasena_actual'] = 'Contraseña actual no es valida';
                    $mensaje_error2 .= 'Contraseña actual no es valida\n';
                    $valido = 0;
                }
            }
        }

        if(empty($request->password_registro)) {
            $error['password_registro'] = 'campo requerido';
            $mensaje_error2 .= 'campo requerido\n';
            $valido = 0;
        }

        if(empty($request->password_confirmacion_registro)) {
            $error['password_confirmacion_registro'] = 'campo requerido';
            $mensaje_error2 .= 'campo requerido\n';
            $valido = 0;
        }

        if(!empty($request->password_registro)  && !empty($request->password_confirmacion_registro))
        {
            if($request->password_registro != $request->password_confirmacion_registro)
            {
                $error['password_confirmacion'] = 'Contraseñas no son iguales';
                $mensaje_error2 .= 'Contraseñas no son iguales\n';
                $valido = 0;
            }
        }

        if($valido == 1)
        {
            $user->password = Hash::make($request->password_registro);
            $user->save();
            return redirect()->route('home.ingreso',['mensaje' => 'Contraseña actualizada'])->with('mensaje', 'Contraseña actualizada');

            // if($user->save())
            // {
            //     $datos['estado'] = 1 ;
            //     $datos['msj'] = 'Contraseña actualizada' ;
            //     $mensaje_success = 'Contraseña Actualizada';
            //     return back()->with('mensaje', 'Contraseña actualizada');
            //     // return redirect()->route('home.ingreso',['mensaje' => 'Contraseña actualizada'])->with('mensaje', 'Contraseña actualizada');
            // }
            // else
            // {
            //     $datos['estado'] = 0 ;
            //     $datos['msj'] = 'Problemas al Actualizar la Contraseña' ;
            //     $mensaje_error = 'Problemas al Actualizar la Contraseña';
            // }
        }
        else
        {
            $datos['estado'] = 0 ;
            $datos['msj'] = 'campos requeridos' ;
            $datos['error'] = $error;
            $mensaje_error = 'Campos requeridos.';
        }

        if(!empty($mensaje_error))
            return back()->with(['error' => $mensaje_error.'\n'.$mensaje_error2, 'titulo_error' => 'Cambio de Contraseña']);
        else
        {
            //envio de correo
            return redirect()->route('home.ingreso',['mensaje' => 'Contraseña actualizada'])->with('mensaje', 'Contraseña actualizada');
            // return back()->with( 'mensaje', 'Contraseña actualizada');
        }
    }

    public function getDosis(Request $request)
    {
        $dosis = Articulo::where('cod_parent', $request->id_medicamento)->get();
        return json_encode($dosis);
    }

    public function getArticulo(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $articulos = Articulo::orderby('nombre', 'asc')->select('id', 'nombre', 'droga', 'cant_comp', 'tipo_cont')->limit(15)->get();
        } else {
            $articulos = Articulo::orderby('nombre', 'asc')->select('id', 'nombre','droga', 'cant_comp', 'tipo_cont')->where('nombre', 'like', $search . '%')->limit(15)->get();
        }

        $response = array();
        foreach ($articulos as $articulo) {
            $response[] = array("value" => $articulo->id, "label" => $articulo->nombre,"droga" => $articulo->droga, "control" => $articulo->tipo_cont);
        }
        return response()->json($response);
    }

    public function getFrecuencia(Request $request)
    {
        $frecuencias = RecetaDosis::where('cod_parent', $request->id_dosis)->get();
        return json_encode($frecuencias);
    }

    public function getCantComp(Request $request)
    {
        $cant_comp = RecetaPresentacion::where('tipo_presentacion', $request->cant_comp)->get();
        return json_encode($cant_comp);
    }
}
