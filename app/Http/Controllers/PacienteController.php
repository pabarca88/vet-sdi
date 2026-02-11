<?php



namespace App\Http\Controllers;


use App\Models\CuracionesServicio;
use App\Models\Direccion;

use App\Models\Especialidad;

use App\Models\FichaAtencion;

use App\Models\Paciente;

use App\Models\Prevision;

use App\Models\Profesional;
use App\Models\ProcedimientoServicio;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Crypt;



class PacienteController extends Controller

{

    public function index()

    {

        $paciente = new Paciente();

    }



    public function buscar_paciente(Request $request)

    {

        $paciente = Paciente::where('rut', $request->rut)->first();



        if (isset($paciente)) {

            return json_encode($paciente);

        }

    }



    public function crear_paciente(Request $request)

    {

        /* $user = Auth::user()->id;

         $profesional = Profesional::where('id_usuario', $user)->first();*/



        $validacion_email = User::where('email', $request->email_paciente_agregar)->first();



        if (isset($validacion_email) || $validacion_email != '') {

            return back()->with('mensaje', 'email ya se encuentra registrado');

        }



        //$apellidos = explode(" ", $request->apellidos_paciente_agregar);



        $direccion = new Direccion();

        $paciente = new Paciente();
		$paciente->token = md5(uniqid());
        $paciente->rut = $request->rut_paciente_agregar;

        $paciente->nombres = $request->nombres_paciente_agregar;

        $paciente->apellido_uno = $request->apellido_uno_paciente_agregar;

        $paciente->apellido_dos = $request->apellido_dos_paciente_agregar;

        $paciente->sexo = 'M';

        $paciente->fecha_nac = $request->fecha_nac_paciente_agregar;

        $paciente->id_prevision = $request->prevision_agregar;

        $paciente->email = $request->email_paciente_agregar;

        $paciente->telefono_uno = $request->telefono_paciente_agregar;

        $paciente->id_direccion = $direccion->id;



        if ($paciente->save()) {

            $direccion->direccion = $request->direccion_paciente_agregar;

            $direccion->numero_dir = mt_rand(100, 9999);

            $direccion->id_ciudad = $request->ciudad_agregar;



            if (!$direccion->save()) {

                back()->with('mensaje', 'error');

            }



            return back()->with('mensaje', 'se almacenado paciente al sistema');

        }



        return 'algo';

    }



    /* - Vue - */

    public function index2(){

        $code = Crypt::encryptString(Auth::user()->email);

        return view('template.pacienteTemplate',['code' => $code]);

    }



    public function getMisAtenciones(Request $request){

        $email = Crypt::decryptString($request->code);

        $paciente = Paciente::where('email', $email)->first();

        $fichas = FichaAtencion::where('id_paciente', $paciente->id)->get();



        $data = [

            'Fichas' => $fichas,

        ];

        return json_encode($data);

    }



    public function getMisProfesionales(Request $request){

        $user = User::where('email', Crypt::decryptString($request->code))->first();

        $fichas = FichaAtencion::where('id_paciente', $user->id)->get();

        $profesional = [];

        $especialidades = [];

        foreach ($fichas as $f) {

            $p = $f->profesional()->first();

            $espe = $p->Especialidad()->first()->nombre;

            $p->especialidad =  $espe;

            array_push($profesional, $p);

            array_push($especialidades, $espe);

        }

        $data = [

            'Profesionales' => $profesional,

            'Especialidad' => $especialidades,

        ];

        return json_encode($data);

    }



    public function getBuscarProfesional_1(Request $request){

        $especialidad = (isset($request->especialidad)) ? $request->especialidad : NULL;

        $convenios = (isset($request->convenios)) ? $request->convenios : NULL;

        $comuna = (isset($request->comuna)) ? $request->comuna : NULL;



        $Especialidad = Especialidad::where('nombre', 'like', '%'.$especialidad.'%')->get();

        $profesional = [];

        foreach ($Especialidad as $e) {

            if(isset($e->id)){

                foreach ($e->Profesionales()->get() as $p) {

                    $p->especialidad =  $e->nombre;

                    array_push($profesional, $p) ;

                }

            }

        };

        $data = [

            'Profesionales' => $profesional,

        ];

        return json_encode($data);

    }



    public function getBuscarProfesional_2(Request $request){



        $nombrerut = (isset($request->rut)) ? $request->rut : NULL;

        $comuna = (isset($request->comuna)) ? $request->comuna : NULL;

        $profesional = Profesional::where(function ($query) use ($nombrerut) {

            $query->where('rut', 'like', '%'.$nombrerut.'%')

                    ->orWhere('nombre', 'like', '%'.$nombrerut.'%')

                    ->orWhere('apellido_uno', 'like', '%'.$nombrerut.'%')

                    ->orWhere('apellido_dos', 'like', '%'.$nombrerut.'%');

        })->get();



        $data = [

            'Profesionales' => $profesional,

        ];

        return json_encode($data);

    }



    public function getBuscarProfesional_3(Request $request){



        $especialidad = (isset($request->especialidad)) ? $request->especialidad : NULL;

        $convenios = (isset($request->convenios)) ? $request->convenios : NULL;

        $comuna = (isset($request->comuna)) ? $request->comuna : NULL;



        $Especialidad = Especialidad::where('nombre', 'like', '%'.$especialidad.'%')->get();

        $profesional = [];

        foreach ($Especialidad as $e) {

            if(isset($e->id)){

                foreach ($e->Profesionales()->get() as $p) {

                    array_push($profesional, $p) ;

                }

            }

        }



        $data = [

            'Profesionales' => $profesional,

        ];

        return json_encode($data);

    }



    public function getRecetas(Request $request){

        $user = User::where('email', Crypt::decryptString($request->code))->first();

        $fichas = FichaAtencion::where('id_paciente', $user->id)->get();

        $recetas = [];

        foreach($fichas as $f){

            foreach($f->Recetas()->get() as $r){

                $profesional = $f->Profesional()->first();

                $profesional->Especialidad = $profesional->Especialidad()->first()->nombre;

                $r->Profesional = $profesional;

                $r->Diagnostico = $f->hipotesis_diagnostico;

                $r->fechaReceta = \Carbon\Carbon::parse($r->created_at)->format('d/m/Y');

                array_push($recetas, $r);

            }

        }

        $data = [

            'Recetas' => $recetas,

        ];

        return json_encode($data);

    }







    public function getLicencias(Request $request){

        $user = User::where('email', Crypt::decryptString($request->code))->first();

        $fichas = FichaAtencion::where('id_paciente', $user->id)->get();

        $licencias = [];

        foreach($fichas as $f){

            foreach($f->Licencias()->get() as $l){

                $profesional = $f->Profesional()->first();

                $profesional->Especialidad = $profesional->Especialidad()->first()->nombre;

                $l->Profesional = $profesional;

                $l->Diagnostico = $f->hipotesis_diagnostico;

                $l->fechaLicencia = \Carbon\Carbon::parse($l->created_at)->format('d/m/Y');

                array_push($licencias, $l);

            }

        }

        $data = [

            'Licencias' => $licencias,

        ];

        return json_encode($data);

    }



    public function getCertificados(Request $request){

        $user = User::where('email', Crypt::decryptString($request->code))->first();

        $fichas = FichaAtencion::where('id_paciente', $user->id)->get();

        $certificados = [];

        foreach($fichas as $f){

            foreach($f->Certificados()->get() as $c){

                $profesional = $f->Profesional()->first();

                $profesional->Especialidad = $profesional->Especialidad()->first()->nombre;

                $c->Profesional = $profesional;

                $c->Diagnostico = $f->hipotesis_diagnostico;

                $c->fechaCertificado = \Carbon\Carbon::parse($c->created_at)->format('d/m/Y');

                array_push($certificados, $c);

            }

        }

        $data = [

            'Certificados' => $certificados,

        ];

        return json_encode($data);

    }



    public function getExamenes(Request $request){

        $user = User::where('email', Crypt::decryptString($request->code))->first();

        $fichas = FichaAtencion::where('id_paciente', $user->id)->get();

        $examenes = [];

        foreach($fichas as $f){

            foreach($f->Examenes()->get() as $e){

                $profesional = $f->Profesional()->first();

                $profesional->Especialidad = $profesional->Especialidad()->first()->nombre;

                $e->Profesional = $profesional;

                $e->Diagnostico = $f->hipotesis_diagnostico;

                $e->fechaExamen = \Carbon\Carbon::parse($e->created_at)->format('d/m/Y');

                array_push($examenes, $e);

            }

        }

        $data = [

            'Examenes' => $examenes,

        ];

        return json_encode($data);

    }



    public function getInfoPerfil(Request $request){

        $user = User::where('email', Crypt::decryptString($request->code))->first();

        $paciente = Paciente::where('id_usuario', $user->id)->first();

        $prevision = $paciente->Prevision()->first();

        $direccion = $paciente->Direccion()->first();

        $direccion->Ciudad = $direccion->Ciudad()->first()->nombre;

        $direccion->Region = $direccion->Ciudad()->first()->id_region;

        $data = [

            'Paciente' => $paciente,

            'Prevision' => $prevision,

            'Direccion' => $direccion,

        ];

        return json_encode($data);

    }



    public function getContacto(Request $request){

        $user = User::where('email', Crypt::decryptString($request->code))->first();

        $paciente = Paciente::where('id_usuario', $user->id)->first();

        $contactos = $paciente->ContactosEmergencia()->get();

        $data = [

            'Conctacto' => $contactos,

            'Paciente' => $paciente->id,

        ];

        return json_encode($data);

    }



    public function updPerfilContacto(Request $request){

        try {

            $email = (isset($request->email)) ? $request->email : NULL;

            $fono1 = (isset($request->fono1)) ? $request->fono1 : NULL;

            $fono2 = (isset($request->fono2)) ? $request->fono2 : NULL;



            $status = 0;

            $mensaje = '';



            $paciente = Paciente::where('id', $request->paciente )->first();



            $paciente->email = $email;

            $paciente->telefono_uno = $fono1;

            $paciente->telefono_dos = $fono2;



            if($paciente->save()){

                $status = 1;

                $mensaje = '';

            }else{

                $status = 0;

                $mensaje = 'Error al Actualizar Contacto';

            }

        } catch (\Throwable $th) {

            $status = 2;

            $mensaje = 'Ha Ocurrido un error, Por Favor vuelva a intentarlo más tarde.';

        }

        $data = [

            'status' => $status,

            'mesage' => $mensaje,

        ];

        return json_encode($data);

    }



    public function updInfoPersonal(Request $request){

        try {

            $rut = (isset($request->rut)) ? $request->rut : NULL;

            $nombres = (isset($request->nombres)) ? $request->nombres : NULL;

            $apellido1 = (isset($request->apellido1)) ? $request->apellido1 : NULL;

            $apellido2 = (isset($request->apellido2)) ? $request->apellido2 : NULL;

            $sexo = (isset($request->sexo)) ? $request->sexo : NULL;

            $fechaNac = (isset($request->fechaNac)) ? $request->fechaNac : NULL;

            $id_prevision = (isset($request->prevision)) ? $request->prevision : NULL;

            $prevision = [];



            $status = 0;

            $mensaje = '';



            $paciente = Paciente::where('id', $request->paciente )->first();

            $prevision = Prevision::where('id', $id_prevision)->first();



            $paciente->rut = $rut;

            $paciente->nombres = $nombres;

            $paciente->apellido_uno = $apellido1;

            $paciente->apellido_dos = $apellido2;

            $paciente->sexo = $sexo;

            $paciente->fecha_nac = $fechaNac;

            $paciente->id_prevision = $id_prevision;



            if($paciente->save()){

                $status = 1;

                $mensaje = '';

            }else{

                $status = 0;

                $mensaje = 'Error al Actualizar Contacto';

            }

        } catch (\Throwable $th) {

            $status = 2;

            $mensaje = 'Ha Ocurrido un error, Por Favor vuelva a intentarlo más tarde.';

        }

        $data = [

            'status' => $status,

            'mesage' => $mensaje,

            'Prevision' => $prevision,

        ];

        return json_encode($data);

    }



    public function updPerfilResidencia(Request $request){

        try {

            $id_ciudad = (isset($request->ciudad)) ? $request->ciudad : NULL;

            $direc = (isset($request->direccion)) ? $request->direccion : NULL;

            $num_dir = (isset($request->numero)) ? $request->numero : NULL;

            $ciudad = '';



            $status = 0;

            $mensaje = '';



            $paciente = Paciente::where('id', $request->paciente )->first();

            $direccion = $paciente->Direccion()->first();



            $direccion->id_ciudad = $id_ciudad;

            $direccion->direccion = $direc;

            $direccion->numero_dir = $num_dir;



            if($direccion->save()){

                $status = 1;

                $mensaje = '';

                $ciudad = $direccion->Ciudad()->first()->nombre;

            }else{

                $status = 0;

                $mensaje = 'Error al Actualizar Contacto';

            }

        } catch (\Throwable $th) {

            $status = 2;

            $mensaje = $th;//'Ha Ocurrido un error, Por Favor vuelva a intentarlo más tarde.';

        }

        $data = [

            'status' => $status,

            'mesage' => $mensaje,

            'ciudad' => $ciudad,

        ];

        return json_encode($data);

    }





    /* new Version*/



    public function getRecetasByFicha(Request $request){

        $fichas = FichaAtencion::where('id', $request->code)->first();

        $recetas = $fichas->Recetas()->get();

        $data = [

            'Recetas' => $recetas,

        ];

        return json_encode($data);

    }



    public function getExamenesByFicha(Request $request){

        $fichas = FichaAtencion::where('id', $request->code)->first();

        $examenes = $fichas->Examenes()->get();

        $data = [

            'Examenes' => $examenes,

        ];

        return json_encode($data);

    }


    public function actualizarPrevision(Request $request)
    {
        $datos = array();
        $error = array();
        $valido = 1;

        if($valido)
        {
            $registro = Paciente::find($request->id_paciente);
            $registro->id_prevision = $request->id_prevision;
            if($registro->save())
            {
                $datos['estado'] = 1;
                $datos['msj'] = 'exito';
            }
            else
            {
                $datos['estado'] = 0;
                $datos['msj'] = 'Falla';
            }
        }
        else
        {
            $datos['estado'] = 0;
            $datos['msj'] = 'Campos requeridos';
            $datos['error'] = $error;
        }

        return $datos;

    }

    public function indicarProcedimientoSDI(Request $request){


        if(strval($request->ind_med) !== '0'){

            $procedimiento_servicio = new ProcedimientoServicio();
            $procedimiento_servicio->id_institucion = 19; // Se debe cambiar por la institucion del profesional
            $procedimiento_servicio->id_servicio = 4; // Se debe cambiar por el servicio del profesional
            $procedimiento_servicio->id_paciente = $request->id_paciente;
            $procedimiento_servicio->id_responsable = Auth::user()->id;
            // crear un array con los datos
            $datos = [
                'nombre_procedimiento' => $request->ind_med,
                'ind_vig_sig' => '',
            ];

            // Convertir el array a JSON
            $datos_json = json_encode($datos);
            $procedimiento_servicio->datos_procedimiento = $datos_json;
            $procedimiento_servicio->save();
        }

        if(strval($request->ind_cc) !== "0"){

            $procedimiento_servicio = new ProcedimientoServicio();
            $procedimiento_servicio->id_institucion = 19; // Se debe cambiar por la institucion del profesional
            $procedimiento_servicio->id_servicio = 4; // Se debe cambiar por el servicio del profesional
            $procedimiento_servicio->id_paciente = $request->id_paciente;
            $procedimiento_servicio->id_responsable = Auth::user()->id;

            // crear un array con los datos
            $datos = [
                'nombre_procedimiento' => $request->ind_cc,
                'ind_vig_sig' => '',
            ];

            // Convertir el array a JSON
            $datos_json = json_encode($datos);
            $procedimiento_servicio->datos_procedimiento = $datos_json;
            $procedimiento_servicio->save();

           $this->guardarControlCiclo($request->ind_cc, $request->id_paciente);
        }

        if(strval($request->ind_pp) !== "0"){
            $procedimiento_servicio = new ProcedimientoServicio();
            $procedimiento_servicio->id_institucion = 19; // Se debe cambiar por la institucion del profesional
            $procedimiento_servicio->id_servicio = 4; // Se debe cambiar por el servicio del profesional
            $procedimiento_servicio->id_paciente = $request->id_paciente;
            $procedimiento_servicio->id_responsable = Auth::user()->id;
            // crear un array con los datos
            $datos = [
                'nombre_procedimiento' => $request->ind_pp,
                'ind_vig_sig' => '',
            ];

            // Convertir el array a JSON
            $datos_json = json_encode($datos);
            $procedimiento_servicio->datos_procedimiento = $datos_json;
            $procedimiento_servicio->save();
        }

        if(strval($request->ind_proc) !== "0"){
            $procedimiento_servicio = new ProcedimientoServicio();
            $procedimiento_servicio->id_institucion = 19; // Se debe cambiar por la institucion del profesional
            $procedimiento_servicio->id_servicio = 4; // Se debe cambiar por el servicio del profesional
            $procedimiento_servicio->id_paciente = $request->id_paciente;
            $procedimiento_servicio->id_responsable = Auth::user()->id;
            // crear un array con los datos
            $datos = [
                'nombre_procedimiento' => $request->ind_proc,
                'ind_vig_sig' => '',
            ];

            // Convertir el array a JSON
            $datos_json = json_encode($datos);
            $procedimiento_servicio->datos_procedimiento = $datos_json;
            $procedimiento_servicio->save();
        }

        if(strval($request->ind_inmmed) !== "0"){
            $procedimiento_servicio = new ProcedimientoServicio();
            $procedimiento_servicio->id_institucion = 19; // Se debe cambiar por la institucion del profesional
            $procedimiento_servicio->id_servicio = 4; // Se debe cambiar por el servicio del profesional
            $procedimiento_servicio->id_paciente = $request->id_paciente;
            $procedimiento_servicio->id_responsable = Auth::user()->id;
            // crear un array con los datos
            $datos = [
                'nombre_procedimiento' => $request->ind_inmmed,
                'ind_vig_sig' => '',
            ];

            // Convertir el array a JSON
            $datos_json = json_encode($datos);
            $procedimiento_servicio->datos_procedimiento = $datos_json;
            $procedimiento_servicio->save();
        }

        if(strval($request->ind_cur) !== "0"){
            $procedimiento_servicio = new ProcedimientoServicio();
            $procedimiento_servicio->id_institucion = 19; // Se debe cambiar por la institucion del profesional
            $procedimiento_servicio->id_servicio = 4; // Se debe cambiar por el servicio del profesional
            $procedimiento_servicio->id_paciente = $request->id_paciente;
            $procedimiento_servicio->id_responsable = Auth::user()->id;
            // crear un array con los datos
            $datos = [
                'nombre_procedimiento' => $request->ind_cur,
                'ind_vig_sig' => '',
            ];

            // Convertir el array a JSON
            $datos_json = json_encode($datos);
            $procedimiento_servicio->datos_procedimiento = $datos_json;
            // $procedimiento_servicio->save();

            $this->guardarCuracion($request->ind_cur, $request->id_paciente);
        }

        $procedimientos = $this->dameTodosProcedimientosPaciente($request->id_paciente);
        $curaciones = $this->dameCuracionesPaciente($request->id_paciente);

        return json_encode(
            ['status' => 1,
            'message' => 'Procedimiento(s) guardado(s) correctamente',
            'procedimientos' => $procedimientos,
            'curaciones' => $curaciones
        ]
    );

    }

    public function dameTodosProcedimientosPaciente($idpaciente){
        $procedimientos =  ProcedimientoServicio::select('procedimientos_servicio.*','users.name as responsable')
                                                    ->join('users','users.id','=','procedimientos_servicio.id_responsable')
                                                    ->where('id_paciente', $idpaciente)
                                                    ->get();

            foreach($procedimientos as $procedimiento)
            {

                // sacar la fecha y hora del campo created_at
                $procedimiento->fecha = date('d-m-Y', strtotime($procedimiento->created_at));
                $procedimiento->hora = date('H:i', strtotime($procedimiento->created_at));
            }

            return $procedimientos;
    }

    public function dameCuracionesPaciente($idpaciente){
        $curaciones =  CuracionesServicio::select('curaciones_servicio.*','users.name as responsable')
                                             ->join('users','users.id','=','curaciones_servicio.id_responsable')
                                             ->where('id_paciente', $idpaciente)
                                             ->get();

            foreach($curaciones as $curacion)
            {
                // convertir el atributo datos_procedimiento de longtext a array
                $curacion->datos_curacion = json_decode($curacion->datos_curacion);
                // sacar la fecha y hora del campo created_at
                $curacion->fecha = date('d-m-Y', strtotime($curacion->created_at));
                $curacion->hora = date('H:i', strtotime($curacion->created_at));
            }

            return $curaciones;
    }

    public function guardarCuracion($nombre_procedimiento, $id_paciente){
        // guardar curacion
        $nueva_curacion = new CuracionesServicio();
        $nueva_curacion->id_institucion = 19; // Se debe cambiar por la institucion del profesional
        $nueva_curacion->id_servicio = 4; // Se debe cambiar por el servicio del profesional
        $nueva_curacion->id_paciente = $id_paciente;
        $nueva_curacion->id_responsable = Auth::user()->id;
        $nueva_curacion->otros = '';
        $nueva_curacion->otros_2 = '';

        // crear un array con los datos
        $datos = [
            'nombre_procedimiento' => $nombre_procedimiento,
            'ind_vig_sig' => '',
        ];

        // Convertir el array a JSON
        $datos_json = json_encode($datos);
        $nueva_curacion->datos_curacion = $datos_json;
        $nueva_curacion->save();

        return true;
    }

    public function eliminarCuracion(Request $req){
        try {
            $curacion = CuracionesServicio::where('id', $req->id)->first();
            $curacion->delete();
            $procedimientos = $this->dameTodosProcedimientosPaciente($req->id_paciente);
            $curaciones = $this->dameCuracionesPaciente($req->id_paciente);
            return json_encode([
                'estado' => 'success',
                'mensaje' => 'Curación eliminada correctamente',
                'procedimientos' => $procedimientos,
                'curaciones' => $curaciones
            ]);
        } catch (\Exception $e) {
            $procedimientos = $this->dameTodosProcedimientosPaciente($req->id_paciente);
            $curaciones = $this->dameCuracionesPaciente($req->id_paciente);
            return json_encode([
                'estado' => 'error',
                'mensaje' => $e->getMessage(),
                'procedimientos' => $procedimientos,
                'curaciones' => $curaciones
            ]);
        }
    }

    public function eliminarProcedimientoSDI(Request $request){
        try {

            $procedimiento = ProcedimientoServicio::where('id', $request->id)->first();
            $procedimiento->delete();
            $procedimientos = $this->dameTodosProcedimientosPaciente($request->id_paciente);
            $curaciones = $this->dameCuracionesPaciente($request->id_paciente);
            return json_encode([
                'estado' => 'success',
                'mensaje' => 'Procedimiento eliminado correctamente',
                'procedimientos' => $procedimientos,
                'curaciones' => $curaciones
            ]);
        } catch (\Exception $e) {
            $procedimientos = $this->dameTodosProcedimientosPaciente($request->id_paciente);
            $curaciones = $this->dameCuracionesPaciente($request->id_paciente);
            return json_encode([
                'estado' => 'error',
                'mensaje' => $e->getMessage(),
                'procedimientos' => $procedimientos,
                'curaciones' => $curaciones
            ]);
        }

    }

    public function suspenderProcedimientoSDI(Request $request){
        try {

            $procedimiento = ProcedimientoServicio::where('id', $request->id)->first();
            if($procedimiento->estado == 0) $procedimiento->estado = 1; else $procedimiento->estado = 0;
            $procedimiento->save();
            $procedimientos = $this->dameTodosProcedimientosPaciente($request->id_paciente);
            $curaciones = $this->dameCuracionesPaciente($request->id_paciente);
            return json_encode([
                'estado' => 'success',
                'mensaje' => 'Procedimiento suspendido correctamente',
                'procedimientos' => $procedimientos,
                'curaciones' => $curaciones
            ]);
        } catch (\Exception $e) {
            $procedimientos = $this->dameTodosProcedimientosPaciente($request->id_paciente);
            $curaciones = $this->dameCuracionesPaciente($request->id_paciente);
            return json_encode([
                'estado' => 'error',
                'mensaje' => $e->getMessage(),
                'procedimientos' => $procedimientos,
                'curaciones' => $curaciones
            ]);
        }

    }

    public function guardarControlCiclo($id_cc, $id_paciente){
        return $id_cc;
    }
	static public function generarEmailPacienteTemporal($nombre, $apellido_uno, $apellido_dos)
    {
        // Limpieza de caracteres especiales y espacios
        $nombre = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $nombre));
        $apellido_uno = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $apellido_uno));
        $apellido_dos = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $apellido_dos));

        // Generar el correo base
        $nombre_correo = "{$nombre}.{$apellido_uno}.{$apellido_dos}";
        $correo = $nombre_correo . '@med-sdi.cl';

        // Verificar si el correo ya existe en la base de datos
        $registro_cant = Paciente::where('email', 'like', "{$nombre_correo}%@med-sdi.cl")->count();

        // Si existe, agregar un número incremental para garantizar unicidad
        if ($registro_cant > 0) {
            $registro_cant++; // Incrementar para evitar conflictos
            $correo = "{$nombre_correo}.{$registro_cant}@med-sdi.cl";
        }

        // Retornar el correo generado
        return $correo;
    }
}
