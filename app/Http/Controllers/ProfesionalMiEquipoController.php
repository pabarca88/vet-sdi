<?php

namespace App\Http\Controllers;

use App\Models\ProfesionalMiEquipo;
use App\Models\ProfesionalMiEquipoProfesional;
use App\Models\Profesional;
use Illuminate\Http\Request;

class ProfesionalMiEquipoController extends Controller
{
    /**
     * buscar listados de equipos del profesional
     */
    public function verEquiposProfesional(Request $request)
    {

        $datos = array();
        $error = array();
        $filtro = array();
        $valido = 1;

        if(empty($request->id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $filtro[] = array('id_profesional', $request->id_profesional);
            $filtro[] = array('estado', 1);

            $registros = ProfesionalMiEquipo::where($filtro)
                                            // ->with(['ProfesionalMiEquipoProfesionales' => function($query){
                                            //     $query->select();
                                            // }])
                                            ->get();

            $filtro_todos[] = array('id_profesional',$request->id_profesional);

            $registros_todos = ProfesionalMiEquipo::where($filtro_todos)
                                            // ->with(['ProfesionalMiEquipoProfesionales' => function($query){
                                            //     $query->select();
                                            // }])
                                            ->get();

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
                $datos['registros_'] = $registros_todos;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registros no encontrados';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] ='campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    /**
     * buscar profesionales del equipo
     */
    public function verDetalleEquipoProfesional(Request $request)
    {
        $datos = array();
        $error = array();
        $filtro = array();
        $valido = 1;

        if(empty($request->id_profesional_mi_equipo))
        {
            $error['id_profesional_mi_equipo'] = 'campo requerido';
            $valido = 0;
        }


        if($valido)
        {
            $filtro[] = array('id_profesional_mi_equipo', $request->id_profesional_mi_equipo);
            $filtro[] = array('estado', 1);

            $registros = ProfesionalMiEquipoProfesional::where($filtro)
                                                        ->with(['Profesional'=>function($query) {
                                                            $query->select('id','nombre','apellido_uno','apellido_dos','rut','email','telefono_uno');
                                                        } ])
                                                        ->with(['TipoEspecialidad'=>function($query) {
                                                            $query->select('id', 'nombre');
                                                        }])
                                                        ->with(['SubTipoEspecialidad'=>function($query) {
                                                            $query->select('id', 'nombre');
                                                        }])
                                                        ->get();

            if($registros)
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registros';
                $datos['registros'] = $registros;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'registros no encontrados';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] ='campo requerido';
            $datos['error'] = $error;
        }

        return $datos;
    }

    public function registroMiEquipoProfesionales(Request $request)
    {

        $datos = array();
        $registroEq = static::registrarEquipo( $request->nombre, $request->descripcion, $request->id_profesional );
        if($registroEq->estado == 1)
        {
            $datos['estado'] = 1;
            $datos['msj-equipo'] = 'Equipo Creado';
            $datos['result-equipo'] = $registroEq;
            $datos['cant-prof'] = 0;
            $datos['cant-prof-reg'] = 0;
            $datos['cant-prof-error'] = 0;

            if(count($request->profesionales)>0)
            {
                $datos['cant-prof'] = count($request->profesionales);
                foreach ($request->profesionales as $key => $profesional) {
                    $p = Profesional::find($profesional['profesional_id']);
                    $registroProf = static::registroEquipoProfesional( $registroEq->last_id, $p->id_tipo_especialidad, $p->id_sub_tipo_especialidad, $profesional['posicion'], $p->id );
                    if($registroProf->estado == 1)
                    {
                        $datos['profesionales'][$key]['estado'] = 1;
                        $datos['profesionales'][$key]['msj'] = 'Registrado';
                        $datos['profesionales'][$key]['result'] = $registroProf;
                        $datos['cant-prof-reg']++;
                    }
                    else
                    {
                        $datos['profesionales'][$key]['estado'] = 0;
                        $datos['profesionales'][$key]['msj'] = 'Problema en registro';
                        $datos['profesionales'][$key]['result'] = $registroProf;
                        $datos['cant-prof-error']++;
                    }

                }

            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'problema en registro de equipo';
            $datos['result-equipo'] = $registroEq;
        }

        return $datos;
    }

    public function eliminarMiEquipoProfesionales(Request $request){
        $id_equipo = $request->id;
        $equipo = ProfesionalMiEquipo::find($id_equipo);
        if($equipo->delete()){
            return ['estado' => 1];
        }else{
            return ['estado' => 0];
        }
    }

    public function modificarMiEquipoProfesionales(Request $request){

        $datos = array();
        $id_equipo = $request->id_equipo_modificar;
        $registroEq = ProfesionalMiEquipo::find($id_equipo);

        if($registroEq)
        {
            $datos['estado'] = 1;
            $datos['msj-equipo'] = 'Equipo Encontrado';
            $datos['result-equipo'] = $registroEq;
            $datos['cant-prof'] = 0;
            $datos['cant-prof-reg'] = 0;
            $datos['cant-prof-error'] = 0;

            // eliminamos la lista anterior para que no se dupliquen los registros
            $registros = ProfesionalMiEquipoProfesional::where('id_profesional_mi_equipo',$registroEq->id)->get();

            foreach($registros as $r) $r->delete();

            if(count($request->profesionales)>0)
            {
                $datos['cant-prof'] = count($request->profesionales);
                foreach ($request->profesionales as $key => $profesional) {
                    $p = Profesional::find($profesional['profesional_id']);

                    $registroProf = static::registroEquipoProfesional( $registroEq->id, $p->id_tipo_especialidad, $p->id_sub_tipo_especialidad, $profesional['posicion'], $p->id );
                    if($registroProf->estado == 1)
                    {
                        $datos['profesionales'][$key]['estado'] = 1;
                        $datos['profesionales'][$key]['msj'] = 'Registrado';
                        $datos['profesionales'][$key]['result'] = $registroProf;
                        $datos['cant-prof-reg']++;
                    }
                    else
                    {
                        $datos['profesionales'][$key]['estado'] = 0;
                        $datos['profesionales'][$key]['msj'] = 'Problema en registro';
                        $datos['profesionales'][$key]['result'] = $registroProf;
                        $datos['cant-prof-error']++;
                    }

                }

            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'problema en registro de equipo';
            $datos['result-equipo'] = $registroEq;
        }

        return $datos;
    }

    public function modificarEstadoMiEquipoProfesionales(Request $request){

        $id_equipo = $request->id;
        $equipo = ProfesionalMiEquipo::find($id_equipo);
        $equipo->estado = $request->habilitado;
        if($equipo->save()){
            return ['estado' => 1];
        }else{
            return ['estado' => 0];
        }
    }

    static public function registrarEquipo( $nombre, $descripcion, $id_profesional )
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($nombre))
        {
            $error['nombre'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($descripcion))
        {
            $error['descripcion'] = 'campo requerido';
            $valido = 0;
        }
        if(empty($id_profesional))
        {
            $error['id_profesional'] = 'campo requerido';
            $valido = 0;
        }

        if($valido)
        {
            $registro = new ProfesionalMiEquipo();
            $registro->nombre = $nombre;
            $registro->descripcion = $descripcion;
            $registro->id_profesional = $id_profesional;
            $registro->estado = 1;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['last_id'] = $registro->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problema en registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] ='campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

    static public function registroEquipoProfesional( $id_profesional_mi_equipo, $id_tipo_especialidad, $id_sub_tipo_especialidad, $posicion, $id_profesional )
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if(empty($id_profesional_mi_equipo))
        {
            $error['id_profesional_mi_equipo'] = 'campor requerido';
            $valido = 0;
        }
        if(empty($id_tipo_especialidad))
        {
            $error['id_tipo_especialidad'] = 'campor requerido';
            $valido = 0;
        }
        if(empty($id_sub_tipo_especialidad))
        {
            $error['id_sub_tipo_especialidad'] = 'campor requerido';
            $valido = 0;
        }
        if(empty($posicion))
        {
            $error['posicion'] = 'campor requerido';
            $valido = 0;
        }
        if(empty($id_profesional))
        {
            $error['id_profesional'] = 'campor requerido';
            $valido = 0;
        }
        // if(empty($estado))
        // {
        //     $error['estado'] = 'campor requerido';
        //     $valido = 0;
        // }

        if($valido)
        {
            $registro = new ProfesionalMiEquipoProfesional();
            $registro->id_profesional_mi_equipo = $id_profesional_mi_equipo;
            $registro->id_tipo_especialidad = $id_tipo_especialidad;
            $registro->id_sub_tipo_especialidad = $id_sub_tipo_especialidad;
            $registro->posicion = $posicion;
            $registro->id_profesional = $id_profesional;
            $registro->estado = 1;

            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'registro';
                $datos['last_id'] = $registro->id;
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'problema en registro';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] ='campo requerido';
            $datos['error'] = $error;
        }

        return (object)$datos;
    }

}
