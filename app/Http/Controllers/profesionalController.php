<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use App\Models\FichaAtencion;
use App\Models\LugarAtencion;
use App\Models\LugarAtencionUser;
use App\Models\Profesional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class profesionalController extends Controller
{
    /* Revisar por idEspacialidad */
    public function getPacientes(){
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $ficha_atencion = FichaAtencion::where('id_profesional', $profesional->id)->get();
        $pacientes = [];
        foreach ($ficha_atencion as $f) {
            $p = $f->Paciente()->first();
            $p->code = Crypt::encryptString($p->email);
            $previcion = $p->Prevision()->first()->nombre;
            $p->Previcion = $previcion;
            $p->Premiun = false;
            array_push($pacientes, $p);
        }

        $data = [
            'pacientes' => $pacientes,
        ];
        return json_encode($data);
    }

    public function getMisClinicasDental(){
        $ula = LugarAtencionUser::where('id_user' , Auth::user()->id)->get();
        $lugares = [];
        foreach ($ula as $l) {
            $lu = $l->LugaresAtencion()->first();
            
            $dir = $lu->Direccion()->first();
            $ciudad = $dir->Ciudad()->first();
            
            $lu->ciudad = $ciudad->nombre;
            $lu->direccion = $dir->direccion.' #'.$dir->numero_dir;
            
            array_push($lugares,  $lu);
        }

        $data = [
            'Lugares' => $lugares,
        ];
        return json_encode($data);
    }

    public function newLugarAtencion(Request $request){
        $profesional = NULL;
        $status = '';
        $mesagge = '';
        $valida = true;
        
        $lugar = LugarAtencion::where('rut', $request->rut)
                            ->orWhere('email', $request->email)
                            ->first();
        if(isset($lugar->id)){
            $status = '01';
            $mesagge = 'Centro Ingresado ya existe';
            $valida = false;
        }

        if($valida){
            switch ($request->view) {
                case 'DENTAL':
                        
                        $profesional = Profesional::where('id_usuario', Auth::user()->id)
                                                ->where('id_especialidad' , '3')
                                                ->first();
                    break;
            }
            
            $dir = new Direccion();
            $dir->direccion = $request->direccion;
            $dir->numero_dir = $request->numerodir;
            $dir->id_ciudad = $request->comuna;
    
            if($dir->save()){
                $lugar = new LugarAtencion();
                $lugar->nombre = $request->nombre;
                $lugar->rut = $request->rut;
                $lugar->email = $request->email;
                $lugar->telefono = $request->telefono;
                $lugar->id_direccion = $dir->id;
                $lugar->tipo = '1';
                
                if($lugar->save()){
                    switch ($request->vista) {
                        case '01':
                            if($profesional->LugaresAtencion()->attach($lugar)){
                                $status = '02';
                                $mesagge = '';
                            }else{
                                $status = '02';
                                $mesagge = 'Centro no Registrado';
                            }
                            break;

                        case '02':
                            $lau = new LugarAtencionUser();
                            $lau->id_lugar_atencion = $lugar->id;
                            $lau->id_user = Auth::user()->id;

                            if($lau->save()){
                                $status = '00';
                                $mesagge = '';
                            }else{
                                $status = '02';
                                $mesagge = 'Centro no Registrado';
                            }
                            break;
                    }
                }else{
                    $status = '02';
                    $mesagge = 'Centro no guardada';
                }
            }else{
                $status = '02';
                $mesagge = 'Direccion no guardada';
            }
        }

        $data = [
            'status' => $status,
            'mesagge' => $mesagge,
        ];

        return json_encode($data);
    }
}
