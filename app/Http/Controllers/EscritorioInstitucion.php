<?php

namespace App\Http\Controllers;

use App\Models\Instituciones;
use App\Models\Region;
use App\Models\TipoInstitucion;
use App\Models\TipoServicio;
use Illuminate\Support\Facades\Auth;

class EscritorioInstitucion extends Controller
{
    public function index()
    {
        $servicio = Instituciones::where('id_usuario', Auth::user()->id)->first();
        $region = Region::all();
        $tipo_servicio = TipoServicio::all();
        $tipo_institucion = TipoInstitucion::all();
        // preguntar si el usuario tiene rol de AdministradorLaboratorio
        $user = Auth::user();
        $adminLab = false;
        foreach ($user->roles as $rol) {
            if ($rol->name == 'AdministradorLaboratorio') {
                $adminLab = true;
                break;
            }
        }

        if (isset($servicio))
        {
            if($servicio->bienvenido == 0)
                return view('bienvenida.inicio_instituciones')->with(['regiones' => $region ]);
            else{
                if($adminLab)
                    return view('app.laboratorio.adm_general.home',['institucion' => $servicio]);
                elseif($servicio->id_tipo_institucion == 2)
                    return view('app.adm_hospital.home',['institucion' => $servicio])->render();
                elseif($servicio->id_tipo_institucion == 4)
                    return view('app.adm_hospital.home')->with(['region' => $region, 'tipo_servicio' => $tipo_servicio, 'tipo_institucion' => $tipo_institucion,'institucion' => $servicio]);
                else
                    return view('app.adm_cm.home')->with(['region' => $region, 'tipo_servicio' => $tipo_servicio, 'tipo_institucion' => $tipo_institucion,'institucion' => $servicio]);
            }


            // return view('app.profesional.escritorio_profesional')->with(['region' => $region, 'profesional' => $profesional, 'hora_dia' => $horas_dia]);
            return view('app.adm_cm.home',['adminLab' => $adminLab]);
        }
        else
        {
            return view('auth.Registros.registro_institucion')->with([
                'region' => $region,
                'tipo_servicio' => $tipo_servicio,
                'tipo_institucion' => $tipo_institucion,

            ]);
        }
    }
}
