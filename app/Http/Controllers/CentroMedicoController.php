<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Profesional;
use App\Models\ProfesionalesLugaresAtencion;
use App\Models\TipoEspecialidad;
use App\Models\SubTipoEspecialidad;
use Illuminate\Http\Request;

class CentroMedicoController extends Controller
{
    //
    public function buscarProfesional(Request $req){

        $id_lugar_atencion = $req->id_centro_medico;

        $profesionalesLugarAtencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $id_lugar_atencion)->get();

        $especialidades = [];
        foreach($profesionalesLugarAtencion as $p){
            $profesional = Profesional::find($p->id_profesional);
            if($profesional){
                $especialidad = Especialidad::find($profesional->id_especialidad);
                array_push($especialidades, $especialidad);
            }
        }
        return array_values(array_unique($especialidades));
    }

    public function buscarEspecialidades(Request $req){
        $id_especialidad = $req->id_profesion;
        $id_lugar_atencion = $req->id_lugar_atencion;
        $profesionalesLugarAtencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $id_lugar_atencion)->get();
        $tipos_especialidad = [];
        foreach($profesionalesLugarAtencion as $p){
            $profesional = Profesional::where('id',$p->id_profesional)->where('id_especialidad', $id_especialidad)->first();
            if($profesional){
                $especialidad = TipoEspecialidad::find($profesional->id_tipo_especialidad);
                array_push($tipos_especialidad, $especialidad);
            }
        }
        return array_values(array_unique($tipos_especialidad));
    }

    public function buscarSubEspecialidades(Request $req){
        $id_tipo_especialidad = $req->id_tipo_especialidad;

        $id_lugar_atencion = $req->id_lugar_atencion;
        $profesionalesLugarAtencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $id_lugar_atencion)->get();
        $sub_tipos_especialidad = [];
        $profesionales = [];
        foreach($profesionalesLugarAtencion as $p){
            $profesional = Profesional::where('id',$p->id_profesional)->where('id_tipo_especialidad', $id_tipo_especialidad)->first();
            if($profesional){
                $especialidad = SubTipoEspecialidad::find($profesional->id_sub_tipo_especialidad);
                if($especialidad){
                    array_push($sub_tipos_especialidad, $especialidad);
                }else{
                    array_push($profesionales, $profesional);
                }

            }
        }
        if(count($sub_tipos_especialidad) > 0){
            $valores = array_values(array_unique($sub_tipos_especialidad));
            return ['value' => 'tipos_especialidades', 'tipos_especialidades' => $valores ];
        }else{
            $valores = array_values(array_unique($profesionales));
            return ['value' => 'profesionales', 'profesionales' => $valores];
        }

    }

    public function buscarProfesionales(Request $req){

        $id_lugar_atencion = $req->id_lugar_atencion;
        $id_profesion = $req->id_profesion;
        $id_especialidad = $req->id_especialidad;
        $id_tipo_especialidad = $req->id_tipo_especialidad;
        $profesionalesLugarAtencion = ProfesionalesLugaresAtencion::where('id_lugar_atencion', $id_lugar_atencion)->get();
        $profesionales = [];
        foreach($profesionalesLugarAtencion as $p){
            $profesional = Profesional::where('id',$p->id_profesional)->where('id_especialidad',$id_profesion)->where('id_tipo_especialidad', $id_especialidad)->where('id_sub_tipo_especialidad',$id_tipo_especialidad)->first();
            if($profesional){
                array_push($profesionales, $profesional);
            }


        }
        $result = array_values(array_unique($profesionales));

        return ['profesionales' => $profesionales];
    }
}
