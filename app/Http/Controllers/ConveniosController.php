<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConvenioInstitucion;
use App\Models\EmpresasConvenios;
use App\Models\TipoConvenio;
use App\Models\TipoConvenioInstitucion;
use App\Models\TipoProductoConvenios;
use App\Models\TipoProducto;
use App\Models\Responsable;
use App\Models\TipoPago;
use App\Models\Convenio;
use App\Models\Profesional;
use App\Models\ProfesionalConveniosIndependientes;
use App\Models\Region;
use App\Models\Instituciones;
use App\Models\Servicios;
use App\Models\AdminInstServ;
// Auth
use Illuminate\Support\Facades\Auth;

class ConveniosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institucion = '';
        $tipo_institucion = '1';
        $id_busqueda = Auth::user()->id;
        if(Auth::user()->id == 3)
        {
            $id_busqueda = 5;
            $registro = Instituciones::where('id', $id_busqueda)->first();
        }
        else
        {
            $registro = Instituciones::where('id_usuario',Auth::user()->id)->first();
        }

        if($registro)
        {
            // var_dump($registro);
            // var_dump($registro->UsuarioAdministrador()->first());
            //var_dump($registro->UsuarioAdministrador()->first()->id);
            /** INSTITUCION */
            $institucion = $registro;
            $responsable = AdminInstServ::where('id',$registro->UsuarioAdministrador()->first()->id)->first();
            $tipo_institucion = 'institucion';

        }
        else
        {
            $registro = Servicios::where('id_usuario',Auth::user()->id)->first();
            if($registro)
            {
                /** SERVICIOS */
                $institucion = $registro;
                $tipo_institucion = 'servicio';
            }
            else
            {
                /** busqueda por responsable */
                $responsable = AdminInstServ::where('id_admin',Auth::user()->id)->first();

                if($responsable)
                {
                    $registro = Instituciones::where('id_responsable',$responsable->id)->first();
                    if($registro)
                    {
                        // var_dump($registro);
                        // var_dump($registro->UsuarioAdministrador()->first());
                        /** INSTITUCION */
                        $institucion = $registro;
                        $tipo_institucion = 'institucion';

                    }
                    else
                    {
                        $registro = Servicios::where('id_responsable',$responsable->id)->first();
                        if($registro)
                        {
                            /** SERVICIOS */
                            $institucion = $registro;
                            $tipo_institucion = 'servicio';
                        }
                        else
                        {
                            return back()->with('error','Institución no encontrada');
                        }
                    }
                }
                else
                {
                    return back()->with('error','Institución no encontrada');
                }
            }
        }

        //
        $tipos_convenio = TipoConvenio::all();
        $tipos_producto = TipoProducto::all();
        $responsables = Responsable::all();
        $tipos_pago = TipoPago::all();
        $convenios = Convenio::all();
        $tipos_convenio_institucion = TipoConvenioInstitucion::all();
        $tipoproducto_convenios = TipoProductoConvenios::all();

        $convenios_institucion = ConvenioInstitucion::select('convenio_institucion.*','tipo_convenio_institucion.nombre as tipo_convenio')
        ->join('tipo_convenio_institucion','convenio_institucion.id_tipo_convenio_institucion','=','tipo_convenio_institucion.id')
        ->where('convenio_institucion.id_institucion',$institucion->id)
        ->get();



        foreach($convenios_institucion as $convenio)
        {
            $tipos_productos = [];
            // pasar el json a array
            $convenio->productos = json_decode($convenio->productos_convenio_institucion);
            foreach($convenio->productos as $producto)
            {
                $tipo_producto = TipoProductoConvenios::find($producto);
                array_push($tipos_productos,$tipo_producto->descripcion);
            }

            $convenio->tipos_productos = $tipos_productos;
        }

        return view ('app.adm_cm.comercial.convenios',[
            'tipos_convenio' => $tipos_convenio,
            'tipos_producto' => $tipos_producto,
            'responsables' => $responsables,
            'tipos_pago' => $tipos_pago,
            'convenios' => $convenios,
            'tipos_convenio_institucion' => $tipos_convenio_institucion,
            'tipoproducto_convenios' => $tipoproducto_convenios,
            'convenios_institucion' => $convenios_institucion,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dameInfoConvenio($id){
        $tipo_convenio = TipoConvenio::find($id);
        return $tipo_convenio;
    }

    public function guardarTipoConvenio(Request $req){
        $tipo_convenio = new TipoConvenio();
        $tipo_convenio->nombre = $req->nombre;
        $tipo_convenio->descripcion = $req->descripcion;
        $tipo_convenio->save();
        return 'OK';
    }

    public function dameTiposConvenio(){
        $tipos_convenio = TipoConvenio::all();
        return $tipos_convenio;
    }

    public function guardarNuevoConvenio(Request $req){
        try {
            $nuevo_convenio = new ConvenioInstitucion();
            $nuevo_convenio->nombre_representante_convenio = $req->nombre_representante_convenio;
            $nuevo_convenio->id_tipo_convenio = $req->id_tipo_convenio;
            return $nuevo_convenio;
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }
    }


    public function misPropiosConvenios(){
        $profesional = Profesional::where('id_usuario', Auth::user()->id)->first();
        $tipos_convenio = TipoConvenio::all();
        $tipos_producto = TipoProducto::all();
        $responsables = Responsable::all();
        $tipos_pago = TipoPago::all();
        $convenios = Convenio::all();
        $tipos_convenio_institucion = TipoConvenioInstitucion::all();
        // 1: CM 2: DENTAL
        $tipoproducto_convenios = TipoProductoConvenios::where('id_tipo_convenio',2)->get();
        $regiones = Region::all();
        $convenios_empresas = EmpresasConvenios::where('id_profesional',$profesional->id)->get();
        $convenios_prevision = EmpresasConvenios::select('empresas_convenios.*','tipoproducto_convenios.descripcion')
                                                    ->leftjoin('tipoproducto_convenios','empresas_convenios.id_convenio','tipoproducto_convenios.id')
                                                    ->where('empresas_convenios.id_empresa',null)
                                                    ->where('empresas_convenios.id_profesional', $profesional->id)
                                                    ->get();

        return view('app.profesional.mis_convenios')->with([
            'profesional' => $profesional,
            'tipos_producto' => $tipos_producto,
            'tipos_convenio' => $tipos_convenio,
            'tipos_convenio_institucion' => $tipos_convenio_institucion,
            'tipoproducto_convenios' => $tipoproducto_convenios,
            'regiones' => $regiones,
            'convenios_empresas' => $convenios_empresas,
            'convenios_prevision' => $convenios_prevision
        ]);
    }

    public function nuevoConvenio(Request $request){
        try {

            $convenios_seleccionados = $request->conveniosSeleccionados;
            $profesional = Profesional::where('id_usuario',Auth::user()->id)->first();
            $mensaje = '';
            foreach($convenios_seleccionados as $c){
                $existe = EmpresasConvenios::where('nombre_convenio',$c['convenio'])->where('id_profesional',$profesional->id)->first();
                if($existe){
                    $mensaje .= 'El convenio '.$c['convenio'].' ya existe en su lista de convenios. ';
                    continue;
                }

                $profesional_convenio = new EmpresasConvenios();
                $profesional_convenio->nombre_convenio = $c['convenio'];
                $profesional_convenio->porcentaje = $c['condicion'];
                $profesional_convenio->estado_convenio = 1;
                $profesional_convenio->id_profesional = $profesional->id;
                $profesional_convenio->observaciones = $request->observaciones_nuevo_convenio;

                $profesional_convenio->save();
                $mensaje .= 'El convenio '.$c['convenio'].' ha sido guardado con éxito. ';
            }

            $convenios_empresas = EmpresasConvenios::where('id_profesional',$profesional->id)->get();
            foreach($convenios_empresas as $convenio){
                if($convenio->id_tipo_convenio){
                    $tipos_convenio_ = json_decode($convenio->id_tipo_convenio);
                    $tipos_convenios = [];
                    foreach($tipos_convenio_ as $tipo){
                        $tipo_convenio = TipoProductoConvenios::find($tipo);
                        array_push($tipos_convenios,$tipo_convenio->descripcion);
                    }
                    $convenio->tipos_convenio = $tipos_convenios;
                }else{
                    $convenio->tipos_convenio = [];
                }

            }

            return ['estado' => 1, 'mensaje' => 'Su convenio ha sido guardada con éxito.', 'convenios_empresas' => $convenios_empresas, 'mensaje' => $mensaje];

        } catch (\Exception $e) {
            //throw $th;
            return ['estado' => 0, 'mensaje' => $e->getMessage()];
        }

    }
}
