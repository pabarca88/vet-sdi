@extends('template.asistente_dental.template_tad')
@section('content')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Escritorio Asistente Dental (TONS)</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Mi escritorio </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--Cierre: Header-->
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card-deck">
                    <div class="card subir px-4 py-2">
                        <a href="{{ ROUTE('asistentecm.ma.confirmar_hora') }}">

                                <div class="row d-inline my-auto">
                                    <div class="col-sm-4 d-inline">
                                        <img class="wid-40 mt-0 " src="{{ asset('images/iconos/agenda.svg') }}">
                                    </div>
                                    <div class="col-sm-8 d-inline">
                                        <h5 class="text-left d-inline">Laboratorio Pendiente</h5>
                                    </div>
                                </div>
                        </a>
                    </div>
                    <div class="card subir px-4 py-2">
                        <a href="{{ ROUTE('asistentecm.ma.buscar_paciente') }}">
                            <div class="row d-inline my-auto">
                                <div class="col-sm-4 d-inline">
                                    <img class="wid-40 mt-0 " src="{{ asset('images/iconos/pacientes.svg') }}">
                                </div>
                                <div class="col-sm-8 d-inline">
                                    <h5 class="text-left d-inline">Buscar pacientes</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card subir px-4 py-2">
                        <a href="{{ ROUTE('asistentecm.ma.mis_profesionales') }}">
                            <div class="row d-inline my-auto">
                                <div class="col-sm-4 d-inline">
                                    <img class="wid-40 mt-40" src="{{ asset('images/iconos/profesionales.svg') }}">
                                </div>
                                <div class="col-sm-8 d-inline">
                                    <h5 class="mt-3 text-left d-inline">Profesionales</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card-deck">
                    <div class="card subir px-4 py-2">
                        <a href="{{ ROUTE('asistentecm.ma.confirmar_hora') }}">
                            <div class="row d-inline my-auto">
                                <div class="col-sm-4 d-inline">
                                    <img class="wid-40 mt-0 " src="{{ asset('images/iconos/agenda.svg') }}">
                                </div>
                                <div class="col-sm-8 d-inline">
                                    <h5 class="text-left d-inline">Materiales (Bodega)</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="card subir px-4 py-2">
                        <a href="{{ ROUTE('asistentecm.ma.mis_profesionales') }}">
                            <div class="row d-inline my-auto">
                                <div class="col-sm-4 d-inline">
                                    <img class="wid-40 mt-40" src="{{ asset('images/iconos/profesionales.svg') }}">
                                </div>
                                <div class="col-sm-8 d-inline">
                                    <h5 class="mt-3 text-left d-inline">Control de Gastos por paciente</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="card subir px-4 py-2">
                        <a href="{{ ROUTE('asistentecm.ma.mis_profesionales') }}">
                            <div class="row d-inline my-auto">
                                <div class="col-sm-4 d-inline">
                                    <img class="wid-40 mt-40" src="{{ asset('images/iconos/profesionales.svg') }}">
                                </div>
                                <div class="col-sm-8 d-inline">
                                    <h5 class="mt-3 text-left d-inline">Convenios</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--Row Botones
        {{--  <div class="row m-b-5">
            <div class="col-md-12">
                <div class="card-deck">

                    <div class="card  subir py-auto">
                        <a href="{{ ROUTE('asistentecm.ma.confirmar_hora') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-30 text-center mt-1 mb-2" src="{{ asset('images/iconos/pacientes.svg') }}">
                                <h5 class="mt-1 mb-0">Confirmar Hora</h5>
                            </div>
                        </a>
                    </div>
                    <div class="card  subir py-auto">
                        <a href="{{ ROUTE('asistentecm.ma.buscar_paciente') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-30 text-center mt-1 mb-2" src="{{ asset('images/iconos/pacientes.svg') }}">
                                <h5 class="mt-1 mb-0">Buscar Pacientes</h5>
                            </div>
                        </a>
                    </div>

                    <div class="card subir py-auto">
                        <a href="{{ ROUTE('asistentecm.ma.mis_profesionales') }}">
                            <div class="card-body text-center" style="cursor:pointer">
                                <img class="wid-30 text-center" src="{{ asset('images/iconos/agenda.svg') }}">
                                <h5 class="mt-1 mb-0">Profesionales</h5>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>-->  --}}

        <!--Tabla agenda del día y flujo de caja-->
        <div class="row m-b-10">
            <div class="col-md-12">
                <div class="card h-100 pb-1">
                    <div class="card-header bg-c-info">
                        <div class="row">
                            <div class="col-sm-12 d-inline text-center">
                                <h5 class="text-white my-1" style="font-size: 1.2rem;">Agendas Profesionales</h5>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="agenda_lugar_atencion_asistente" id="agenda_lugar_atencion_asistente" value="">
                    <div class="card-body pt-4 pb-0">
                        <div class="form-row">
                            <div class="col-sm-3 d-inline text-center">
                                <div class="card">
                                    <label class="floating-label-activo-sm">Agendas del Centro</label>
                                    <select class="form-control form-control-sm" id="agenda_profesional_asistente" name="agenda_profesional_asistente" onchange="cargarAgendaProfesional('')">
                                        <option value="">Selecione</option>
                                        {{--  @if($profesionales)
                                        @foreach($profesionales as $key_pro => $value_pro)
                                            <option value="{{ $value_pro->id }}">{{ strtoupper($value_pro->nombre) }} {{ strtoupper($value_pro->apellido_uno) }} {{ strtoupper($value_pro->apellido_dos) }}</option>
                                        @endforeach
                                    @endif  --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-9 d-inline text-center">
                                <div class="dt-responsive table-responsive" >
                                    <table class="table table-striped table-bordered nowrap table-xs" id="tabla_info_profesional">
                                        <thead>
                                            <tr >
                                                <th colspan="2" class="text-center align-middle">Agenda Profesional:</th>
                                            </tr>
                                        </thead>
                                        <tbody style="display: none;">
                                            <tr>
                                                <td class="text-center align-middle">
                                                    <span><strong id="nombre_profesional_agenda"></strong></span><br>
                                                    <span id="especialidad_porfesional_agenda">
                                                    </span>
                                                </td>
                                                <td class="text-center align-middle">
                                                        {{--  <button type="button" class="btn btn-info btn-sm" id="btn_ver_info_profesional_seleccionado"  onclick="info_profesional({{ $profesional->id }});"><i class="fa fa-plus"></i> Ver Información</button>  --}}
                                                        <button type="button" class="btn btn-info btn-sm" id="btn_ver_info_profesional_seleccionado"  onclick=""><i class="fa fa-plus"></i> Ver Información</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 d-inline text-center">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-sm-3 pt-1 pb-1 d-inline text-center" >
                                            <button type="button" class="btn btn-outline-success btn-sm" id="btn_ver_lista_espera_profesional_seleccionado" onclick="gasto_material()"; ><i class="fas fa-save"></i>  Cargos de materiales a Paciente</button>
                                        </div>
                                        <div class="col-sm-4 pt-1 pb-1 d-inline text-center" >
                                            <button type="button" class="btn btn-outline-success btn-sm" id="btn_ver_agregar_hora_extra" onclick="lab_dent_mayor()"; ><i class="fas fa-save"></i>  O. de trabajo M</button>
                                            <button type="button" class="btn btn-outline-success btn-sm" id="btn_ver_agregar_hora_extra" onclick="control_trab()"; ><i class="fas fa-save"></i>  O. de trabajo men</button>
                                        </div>
                                        <div class="col-sm-2 pt-1 pb-1 d-inline text-center" >
                                            <button type="button" class="btn btn-outline-success btn-sm" id="btn_ver_agregar_hora_extra" onclick="presupuesto()"; ><i class="fas fa-save"></i> Presupuesto</button>
                                        </div>
                                        <div class="col-sm-3 pt-1 pb-1 d-inline text-center" >
                                            <button type="button" class="btn btn-outline-success btn-sm" id="btn_ver_agregar_hora_examen" onclick="abrir_horas_examen()"; ><i class="fas fa-save"></i>  Agendar nueva cita</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div id='agenda'></div>
                    </div>
                </div>
            </div>
            <!--
            <div class="col-md-4">
                <div class="card subir text-center h-100">
                    <a href="http://www.cronicos.cl/registro.php" target="_blank">
                    <img class="img-fluid card-img-top" src="{{ asset('images/iconos/inscripciones_1.svg') }}" alt="Inscripciones" class="btn  btn-arrastre" type="button">
                    <!- -<a href="{{ ROUTE('asistentecm.registro_paciente') }}" class="btn" type="button">

                    <div class="card-body">
                        <h4 class="card-title f-20 pt-3">Inscripciones</h4>
                        <p class="card-text">Registre pacientes a Farmacrónicos</p>
                    </div>
                    </a>
                </div>
            </div>
            -->
        </div>
		<div class="col-sm-12">
            <div class="row">
            </div>
        </div>
        <!--CIERRE: Row Botones -->

    </div>
    @include('atencion_odontologica.formularios_dentales_tons.ayudante_dental.cargar_presupuesto')
    @include('atencion_odontologica.formularios_dentales_tons.laboratorio_dental.m_trabajo')
    @include('atencion_odontologica.formularios_dentales_tons.laboratorio_dental.m_trabajoM')
    @include('atencion_odontologica.formularios_dentales_tons.pedido_material_trabajo.m_pmateriales')
    @include('atencion_odontologica.formularios_dentales_tons.pedido_material_trabajo.pedido_insumos_materiales')
    @include('atencion_odontologica.formularios_dentales_tons.ayudante_dental.modal_control_trabajo')
    @include('atencion_odontologica.formularios_dentales_tons.ayudante_dental.modal_gastosmaterial_gen')
</div>
@include('app.adm_cm.modales.en_construccion')
{{--  @include('app.asistente_dental_tecn.sidebar_derecho_tons')  --}}
<!--Cierre: Container Completo-->
@endsection
