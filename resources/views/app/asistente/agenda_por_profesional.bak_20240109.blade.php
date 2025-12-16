@extends('template.asistente.template')

{{--
@section('page-styles')
    <link href='{{ asset("js/fullcalendar-5.10.1/lib/main.css") }}' rel='stylesheet' />
@endsection
--}}

@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
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
            <div class="card-body">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-12 pt-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4 class="text-white f-20">
                                                    Agenda de :
                                                </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="agenda_lugar_atencion_asistente" id="agenda_lugar_atencion_asistente" class="form-control" onchange="cargarAgendaProfesional($('#id_lugar_atencion').val(), $('#id_profesional').val())">
                                                @if($lugares_atencion)
                                                    @foreach($lugares_atencion as $key_lugar_aten => $value_lugar_aten)
                                                        <option value="{{ $value_lugar_aten->id }}">{{ $value_lugar_aten->nombre }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 pt-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h4 class="text-white f-20">
                                                    Agenda del Profesional:
                                                </h4>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="agenda_profesional_asistente" id="agenda_profesional_asistente" class="form-control" onchange="cargarAgendaProfesional($('#id_lugar_atencion').val(), $('#id_profesional').val())">
                                                @if($profesional)
                                                    @foreach($profesional as $key_pro => $value_pro)
                                                        <option value="{{ $value_pro->id }}">{{ $value_pro->nombre }} {{ $value_pro->apellido_uno }} {{ $value_pro->apellido_dos }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-12 pt-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <button type="button" class="btn btn-outline-success btn-sm" id="btn_ver_lista_espera_profesional_seleccionado"onclick="lista_espera()"; ><i class="fas fa-save"></i>  Cargar Lista de Espera del profesional</button>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        {{-- BOTON DE LISTA DE ESPERA --}}
                        <div class="row">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-outline-success btn-sm" id="btn_ver_lista_espera_profesional_seleccionado"onclick="lista_espera()"; ><i class="fas fa-save"></i>  Cargar Lista de Espera del profesional</button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-outline-success btn-sm" id="btn_ver_agregar_hora_extra" onclick="abrir_horas_extras()"; ><i class="fas fa-save"></i>  Cargar Hora Extra del profesional</button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-outline-success btn-sm" id="btn_ver_agregar_hora_examen" onclick="abrir_horas_examen()"; ><i class="fas fa-save"></i>  Cargar Hora Examen del profesional</button>
                            </div>
                        </div>

                        {{-- AGENDA --}}
                        <div id='agenda'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#reservar_hora">
        Launch
    </button> --}}

    @include('app.asistente.modales.modal_consulta_agenda')
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
        $(document).ready(function()
        {
            cargarAgendaProfesional($('#id_lugar_atencion').val(), $('#id_profesional').val());
        });
   </script>
@endsection

