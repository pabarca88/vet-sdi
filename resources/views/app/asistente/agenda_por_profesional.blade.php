@extends('template.asistente.template')

@section('page-styles')
    <link href='{{ asset('css/estilos_boton_agen_examenes.css') }}' rel='stylesheet' />
    <style>
        .status-circle .circle {
            width: 20px;
            height: 20px;
            background-color: red;
            border-radius: 50%;
            display: inline-block;
            border: 2px solid #fff; /* Opcional: Borde blanco para mejor visibilidad */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Opcional: Sombra suave */
        }
    </style>
@endsection

@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header mb-2">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Agenda de Profesionales</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    @if(Auth::user()->hasRole('Profesional'))
                                        <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    @elseif(Auth::user()->hasRole('Asistente'))
                                        <a href="{{ route('asistente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    @endif
                                </li>
                                <li class="breadcrumb-item"><a href="#">Agenda de Profesionales</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <!--agenda-->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-body pb-1 mb-1">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 pb-1">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h5 class="text-c-blue f-14">AGENDA DE</h5>
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Seleccione Profesional</label>
                                                <select name="agenda_lugar_atencion_asistente" id="agenda_lugar_atencion_asistente" class="form-control form-control-sm" onchange="cargarAgendaProfesional(1,'')">
                                                    @if($lugares_atencion)
                                                        @foreach($lugares_atencion as $key_lugar_aten => $value_lugar_aten)
                                                            <option value="{{ $value_lugar_aten->id }}">{{ $value_lugar_aten->nombre }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <h5 class="text-c-blue f-14">AGENDA DE PROFESIONALES</h5>
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Seleccione Profesional</label>
                                                <select name="agenda_profesional_asistente" id="agenda_profesional_asistente" class="form-control form-control-sm" onchange="cargarAgendaProfesional(1,'')">
                                                    @if($profesional)
                                                        @foreach($profesional as $key_pro => $value_pro)
                                                            <option value="{{ $value_pro->id }}" data-id_tipo_agenda="{{ $value_pro->id_tipo_agenda }}">{{ $value_pro->nombre }} {{ $value_pro->apellido_uno }} {{ $value_pro->apellido_dos }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 f-12 pb-0" id="tabla_info_profesional" style="display: none;">
                                     <div class="align-middle m-b-25">
                                        <img src="{{ asset('images/iconos/usuario_profesional.svg') }}" alt="user image" class="img-radius align-top m-r-15 wid-60" id="img_profesional">
                                        <div class="d-inline-block f-11">
                                            <span>
                                                <strong id="nombre_profesional_agenda"></strong>
                                            </span><br>
                                            <span id="especialidad_porfesional_agenda"></span>
                                            <button type="button" class="btn btn-info-light-c btn-xxxs" id="btn_ver_info_profesional_seleccionado"  onclick=""><i class="feather icon-plus"></i> Más información</button>
                                            @include('general.bloqueo_hora.bloque_hora_asistente')
                                            @include('general.anular_hora.anular_hora_asistente')
                                            <span class="status active"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 pb-0" id="seccion_agenda_botones" style="display: none;">
                                    <button type="button" class="btn btn-success-light-c btn-block btn-xxxs" id="btn_ver_lista_espera_profesional_seleccionado" onclick="lista_espera();" ><i class="feather icon-external-link"></i> Ver lista de Espera</button>
                                    <button type="button" class="btn btn-success-light-c btn-block btn-xxxs " id="btn_ver_agregar_hora_extra" onclick="abrir_horas_extras()"; ><i class="feather icon-external-link"></i> Agregar Horas extras</button>
                                    <button type="button" class="btn btn-success-light-c btn-block btn-xxxs " id="btn_ver_agregar_hora_examen" onclick="abrir_horas_examen()"; ><i class="feather icon-external-link"></i>  Ver horas examenes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="seccion_agenda_agendas" style="display: none;">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="text-c-blue my-1" style="font-size: 1.1rem;" id="titulo_tipo_agenda"></h5>
                                </div>
                            </div>
                            <div id='agenda'></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: agenda -->
        </div>
    </div>
<!-- DATOS DE VITAL IMPORTANCIA -->
<input type="hidden" name="id_profesional" id="id_profesional" value="">
@endsection


@section('modals')

    @include('app.asistente.modales.modal_profesional_informacion')
    @include('general.asistentes.modal_consulta_agenda')

    @include('app.asistente.modales.lista_espera')

    {{-- horas extras --}}
    @include('app.asistente.modales.horas_extras')
    @include('app.asistente.modales.horas_extras_agendar')

    {{-- hora examen --}}
    @include('app.general.asistente.reserva_hora_examen.horas_examen')
    @include('app.general.asistente.reserva_hora_examen.horas_examen_agendar')
@endsection

@section('page-script')
    <script>
        $(document).ready(function(){
            cargarAgendaProfesional(1,'');
        });
    </script>
    
@endsection

@include('app.general.asistente.agenda.boton_flotante_agenda_exa_ciru')
