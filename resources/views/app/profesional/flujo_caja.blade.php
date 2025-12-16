{{-- @extends('layouts.templateFlujoCaja') --}}
@extends('template.profesional.template')
@section('content')

    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content m-top">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12 mt-2">
                            <div class="page-header-title">
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
                                    @elseif(Auth::user()->hasRole('Institucion'))
                                        <a href="{{ route('institucion.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    @elseif(Auth::user()->hasRole('Servicio'))
                                        <a href="{{ route('servicio.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    {{--  @elseif(Auth::user()->hasRole('AsistenCaja'))
                                        <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>  --}}
                                    @endif
                                    {{--  <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>  --}}
                                </li>
                                <li class="breadcrumb-item"><a href="#">Flujo de Caja</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
              <div class="row  mt-n3">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                    <div class="user-profile user-card pt-0 mt-2">
                        <div class="card-body py-0">
                            <div class="user-about-block m-0">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                        <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link text-reset active" id="recibo-caja-prof-tab" data-toggle="tab" href="#recibo-caja-prof" role="tab" aria-controls="recibo-caja-prof" aria-selected="true">Rendiciones de caja</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-reset" id="recepcion-programa-prof-tab" data-toggle="tab" href="#recepcion-programa-prof" role="tab" aria-controls="recepcion-programa-prof" aria-selected="true">Recepción de programas</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-reset" id="gestion-bonos-prof-tab" data-toggle="tab" href="#gestion-bonos-prof" role="tab" aria-controls="gestion-bonos-prof" aria-selected="true">Gestión de bonos</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-reset" id="gestion-programas-prof-tab" data-toggle="tab" href="#gestion-programas-prof" role="tab" aria-controls="gestion-programas-prof" aria-selected="true">Gestión de bonos programas</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link text-reset" id="gestion-bonos-diarios-prof-tab" data-toggle="tab" href="#gestion-bonos-diarios-prof" role="tab" aria-controls="gestion-bonos-diarios-prof" aria-selected="true">Gestión de bonos diarios</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--TABLAS-->
            <div class="row bg-gris">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                    <div class="tab-content" id="pills-tabContent">
                        {{-- PESTAÑA RENDICION DE CAJA --}}
                        <div class="tab-pane fade show active" id="recibo-caja-prof" role="tabpanel" aria-labelledby="recibo-caja-prof-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 mb-1">
                                    <h5 class="text-c-blue d-inline float-left pt-1 f-20">Rendiciones de caja</h5>
                                    @if(Auth::user()->hasRole('Profesional'))
										{{--<button id="iniciar_procesocobro_rendicion" type="button" class="btn btn-outline-primary btn-sm float-right d-inline iniciar_procesocobro_rendicion" onclick="">Iniciar Proceso de Cobro</button>--}}
                                        <button id="busqueda_avanzada_1" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm" onclick="$('#busqueda_avanzada_aparecer_prof_1').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                    @elseif(Auth::user()->hasRole('Asistente'))
                                        <button id="busqueda_avanzada_1" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm" onclick="$('#busqueda_avanzada_aparecer_asis_1').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                    @elseif(Auth::user()->hasRole('Institucion'))
                                        <button id="busqueda_avanzada_1" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm" onclick="$('#busqueda_avanzada_aparecer_inst_1').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                    @elseif(Auth::user()->hasRole('ProfesionalRecibe'))
                                        <button type="button" class="btn btn-outline-secondary btn-sm float-right d-inline shadow-sm">Recibo manual</button>
                                        <button id="busqueda_avanzada_1" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm" onclick="$('#busqueda_avanzada_aparecer_prof_1').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                    @elseif(Auth::user()->hasRole('Servicio'))
                                        <button id="busqueda_avanzada_1" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm" onclick="$('#busqueda_avanzada_aparecer_serv_1').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                    @elseif(Auth::user()->hasRole('AsistenCaja'))
                                        <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>
                                    @endif

                                    {{--  <button id="busqueda_avanzada_1" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm" onclick="$('#busqueda_avanzada_aparecer_1').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>  --}}
                                </div>
                            </div>
                            @if(Auth::user()->hasRole('Profesional'))
                                <div id="busqueda_avanzada_aparecer_prof_1" style="display:none">
                            @elseif(Auth::user()->hasRole('Asistente'))
                                <div id="busqueda_avanzada_aparecer_asis_1" style="display:none">
                            @elseif(Auth::user()->hasRole('Institucion'))
                                <div id="busqueda_avanzada_aparecer_inst_1" style="display:none">
                            @elseif(Auth::user()->hasRole('ProfesionalRecibe'))
                                <div id="busqueda_avanzada_aparecer_prof_1" style="display:none">
                            @elseif(Auth::user()->hasRole('Servicio'))
                                <div id="busqueda_avanzada_aparecer_serv_1" style="display:none">
                            @elseif(Auth::user()->hasRole('AsistenCaja'))
                                <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </a>
                            @endif
                        {{--  <div id="busqueda_avanzada_aparecer_2" style="display:none">  --}}
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-2 col-xxl-2 col-xxxl-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Fecha de rendición</label>
                                                    <input type="date" class="form-control form-control-sm" name="rinde_fecha" id="rinde_fecha">
                                                </div>
                                            </div>
                                       {{-- <div class="col-sm-12 col-md-4 col-lg-4 col-xl-2 col-xxl-2 col-xxxl-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm"> Lugar de atención</label>
                                                    <select name="lugares_atencion_agenda" id="lugares_atencion_agenda" class="form-control form-control-sm">
        												<option value="0">Seleccione Lugar</option>
                                                        @foreach ($lista_lugares_atencion_activos as $lugar_a)
                                                            <option value="{{ $lugar_a->id }}">{{ $lugar_a->nombre }}</option>
                                                        @endforeach
        											</select>
                                                </div>
                                            </div> --}}
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-6 col-xxl-4 col-xxxl-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Enviado por Asistente</label>
                                                    <select id="rinde_asistente" name="rinde_asistente" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        @if($lista_asistente)
                                                            @foreach($lista_asistente as $key_asistente => $value_asistente)
                                                                <option value="{{ $value_asistente->id }}">{{ $value_asistente->nombres }} {{ $value_asistente->apellido_uno }} {{ $value_asistente->apellido_dos }} </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            {{--
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-2 col-xxl-2 col-xxxl-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Convenio</label>
                                                    <select id="rinde_convenio" name="rinde_convenio" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        @if($lista_prevision)
                                                            @foreach($lista_prevision as $key_prevision => $value_prevision)
                                                                <option value="{{ $value_prevision->id }}">{{ $value_prevision->nombre }} </option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                            --}}
                                       {{-- <div class="col-sm-12 col-md-4 col-lg-4 col-xl-2 col-xxl-2 col-xxxl-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Estado consulta</label>
                                                    <select id="rinde_estado_consulta" name="rinde_estado_consulta" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        @if($lista_estado_consulta)
                                                            @foreach($lista_estado_consulta as $key_estado_consulta => $value_estado_consulta)
                                                                <option value="{{ $value_estado_consulta->id }}">{{ $value_estado_consulta->valor }} </option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                            </div> --}}

                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-2 col-xxl-2 col-xxxl-2">
                                                <button class="btn btn-block btn-sm btn-info" onclick="cargar_flujo_caja_rendicion();"><i class="feather icon-search"></i> Buscar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- en este ejemplo esta seleccionado todos los medios de pago-->
                            <div class="row">
                                 <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="dt-responsive table-responsive">
                                                <table id="tabla_rendir_caja" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle">Id Recepción</th>
                                                            <th class="align-middle">Fecha</th>
                                                            <th class="align-middle">Enviado por</th>
                                                            <th class="align-middle">Tipo autorizacion</th>
                                                            <th class="align-middle">Estado</th>
                                                            <th class="align-middle">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if( isset($rendiciones) )
                                                            @foreach($rendiciones as $key_b => $value_b)
                                                                @php
                                                                    if($value_b->estado == 1){
                                                                        $value_b->estado = 'EN ESPERA';
                                                                    }elseif($value_b->estado == 2){
                                                                        $value_b->estado = 'OTRO';
                                                                    }elseif($value_b->estado == 3){
                                                                        $value_b->estado = 'APROBADA';
                                                                    }else if($value_b->estado == 4){
                                                                        $value_b->estado = 'RECHAZADA';
                                                                    }
                                                                @endphp
                                                                <tr>
                                                                    <td class="align-middle">{{ $value_b->id }}</td>
                                                                    <td class="align-middle">{{ $value_b->fecha_rendicion }}</td>
                                                                    <td class="align-middle">{{ $value_b->Asistente()->first()->nombres }} {{ $value_b->Asistente()->first()->apellido_uno }} {{ $value_b->Asistente()->first()->apellido_dos }}</td>
                                                                    <td class="align-middle">2</td>
                                                                    <td class="align-middle">{{ $value_b->estado == 1 ? 'EN ESPERA' : $value_b->estado }}</td>
                                                                    <td class="align-middle">
                                                                        <button class="btn btn-primary-light-c btn-xxs" onclick="ver_rendicion({{ $value_b->id }})">Ver</button>
                                                                        <button class="btn btn-secondary btn-xxs" onclick="ver_pdf_rendicion({{ $value_b->id }},{{ $value_b->Asistente()->first()->id }})">Ver PDF</button>

                                                                        <div class="switch switch-success d-inline m-l-5">
                                                                            <input type="checkbox"
                                                                                   id="switch_rendicion_{{ $value_b->id }}"
                                                                                   onchange="cambiarEstadoRendicion(this)"
                                                                                   data-id="{{ $value_b->id }}"
                                                                                   data-email="{{ $value_b->Asistente()->first()->email }}"
                                                                                   {{ $value_b->estado == 'APROBADA' ? 'checked' : '' }}>
                                                                            <label for="switch_rendicion_{{ $value_b->id }}" class="cr"></label>
                                                                        </div>
                                                                        <label style="font-size: 11px;">Aprobar</label>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                    <div class="card">
                                        <div class="card-body py-1">
                                             <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="switch switch-success d-inline m-r-10">
                                                            <input type="checkbox" id="enviar_todos" onchange="seleccionar_bonos_rendicion();">
                                                            <label for="enviar_todos"class="cr"></label>
                                                        </div>
                                                        <label>Recepción total</label>
                                                        {{--  (Este switch selecciona todas las recepciones del profesional y envia mensaje (correo electrónico) de validación (código) al profesional de recepción conforme)  --}}
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pt-2">
                                                    <button id="iniciar_procesocobro_rendicion_2" type="button" class="btn btn-info btn-sm float-right d-inline iniciar_procesocobro_rendicion" onclick="iniciarProcesoCobro()" style="display: none;"><i class="feather icon-check"></i> Iniciar proceso de cobro</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- PESTAÑA GESTION RECEPCION DE PROGRAMAS --}}
                        <div class="tab-pane" id="recepcion-programa-prof" role="tabpanel" aria-labelledby="recepcion-programa-prof-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12 mt-3 mb-2">
                                    <h5 class="text-c-blue d-inline float-left pt-1 f-20">Rendición de programas</h5>

                                    @if(Auth::user()->hasRole('Profesional'))
                                        <button id="busqueda_avanzada_2" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm" onclick="$('#busqueda_avanzada_aparecer_prof_2').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                    @elseif(Auth::user()->hasRole('Asistente'))
                                        <button id="busqueda_avanzada_2" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm" onclick="$('#busqueda_avanzada_aparecer_asis_2').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                    @elseif(Auth::user()->hasRole('Institucion'))
                                        <button id="busqueda_avanzada_2" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm" onclick="$('#busqueda_avanzada_aparecer_inst_2').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                    @elseif(Auth::user()->hasRole('ProfesionalRecibe'))
                                        <button id="busqueda_avanzada_2" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm" onclick="$('#busqueda_avanzada_aparecer_prof_2').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                    @elseif(Auth::user()->hasRole('Servicio'))
                                        <button id="busqueda_avanzada_2" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm" onclick="$('#busqueda_avanzada_aparecer_serv_2').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                    {{--  @elseif(Auth::user()->hasRole('AsistenCaja'))
                                        <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>  --}}
                                    @endif
                                    {{--  <button id="busqueda_avanzada_2" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm" onclick="$('#busqueda_avanzada_aparecer_2').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>  --}}
                                </div>
                            </div>

                            @if(Auth::user()->hasRole('Profesional'))
                                <div id="busqueda_avanzada_aparecer_prof_2" style="display:none">
                            @elseif(Auth::user()->hasRole('Asistente'))
                                <div id="busqueda_avanzada_aparecer_asis_2" style="display:none">
                            @elseif(Auth::user()->hasRole('Institucion'))
                                <div id="busqueda_avanzada_aparecer_inst_2" style="display:none">
                            @elseif(Auth::user()->hasRole('ProfesionalRecibe'))
                                <div id="busqueda_avanzada_aparecer_prof_2" style="display:none">
                            @elseif(Auth::user()->hasRole('Servicio'))
                                <div id="busqueda_avanzada_aparecer_serv_2" style="display:none">
                            {{--  @elseif(Auth::user()->hasRole('AsistenCaja'))
                                <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </a>  --}}
                            @endif
                        {{--<div id="busqueda_avanzada_aparecer_2" style="display:none">  --}}
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Fecha de atención</label>
                                                    <input type="date" class="form-control form-control-sm" name="rinde_progr_fecha" id="rinde_progr_fecha">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Asistente</label>
                                                    <select id="rinde_progr_asistente" name="rinde_progr_asistente" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        @if($lista_asistente)
                                                            @foreach($lista_asistente as $key_asistente => $value_asistente)
                                                                <option value="{{ $value_asistente->id }}">{{ $value_asistente->nombres }} {{ $value_asistente->apellido_uno }} {{ $value_asistente->apellido_dos }} </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-2">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Convenio</label>
                                                    <select id="rinde_progr_convenio" name="rinde_progr_convenio" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        @if($lista_prevision)
                                                            @foreach($lista_prevision as $key_prevision => $value_prevision)
                                                                <option value="{{ $value_prevision->id }}">{{ $value_prevision->nombre }} </option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Estado consulta</label>
                                                    <select id="rinde_progr_estado_consulta" name="rinde_progr_estado_consulta" class="form-control form-control-sm">
                                                        <option value="">Seleccione</option>
                                                        @if($lista_estado_consulta)
                                                            @foreach($lista_estado_consulta as $key_estado_consulta => $value_estado_consulta)
                                                                <option value="{{ $value_estado_consulta->id }}">{{ $value_estado_consulta->valor }} </option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                <button class="btn btn-block btn-sm btn-info" onclick="cargar_flujo_caja_programa();"><i class="feather icon-search"></i> Buscar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="dt-responsive table-responsive">
                                                <table id="tabla_programas" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle">Convenio</th>
                                                            <th class="align-middle">Nº de programa</th>
                                                            <th class="align-middle">Código</th>
                                                            <th class="align-middle">Tipo</th>
                                                            <th class="align-middle">Fecha de atención</th>
                                                            <th class="align-middle">Paciente</th>
                                                            <th class="align-middle">Valor </th>
                                                            <th class="align-middle">Estado consulta</th>
                                                            <th class="align-middle">Recepción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if( isset($bonos_programa) )
                                                            @foreach($bonos_programa as $key_bp => $value_bp)
                                                                <tr >
                                                                    <td class="align-middle">{{ $value_bp->Convenio()->first()->nombre }}</td>
                                                                    <td class="align-middle">{{ $value_bp->numero_sesiones }}</td>
                                                                    <td class="align-middle">{{ $value_bp->numero_bono }}</td>
                                                                    <td class="align-middle">{{ $value_bp->TipoBono()->first()->nombre }}</td>
                                                                    <td class="align-middle">{{ $value_bp->fecha_atencion }}</td>
                                                                    <td class="align-middle">
                                                                        <span>{{ $value_bp->Paciente()->first()->nombres }} {{ $value_bp->Paciente()->first()->apellido_uno }} {{ $value_bp->Paciente()->first()->apellido_dos }}</span><br>
                                                                        <span>{{ $value_bp->Paciente()->first()->rut }}</span>
                                                                    </td>
                                                                    <td class="align-middle">${{ number_format($value_bp->valor_atencion, 2, ",", ".") }}</td>
                                                                    <td class="align-middle">{{ $value_bp->estado_consulta }}</td>
                                                                    <td class="align-middle">
                                                                        <div class="form-group">
                                                                            <div class="switch switch-success d-inline m-r-10">
                                                                                <input type="checkbox" id="rendir_caja_programa_{{ $value_bp->id }}">
                                                                                <label for="rendir_caja_{{ $value_bp->id }}"
                                                                                    class="cr"></label>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- PESTAÑA DE GESTION DE BONOS --}}
                        <div class="tab-pane" id="gestion-bonos-prof" role="tabpanel" aria-labelledby="gestion-bonos-prof-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12 mt-3">
                                    <h5 class="text-c-blue d-inline float-left f-20 pt-1">Gestión de bonos</h5>
                                    @if(Auth::user()->hasRole('Profesional'))
                                        <button id="busqueda_avanzada_3" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm mb-2" onclick="$('#busqueda_avanzada_aparecer_prof_3').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                    @elseif(Auth::user()->hasRole('Asistente'))
                                        <button id="busqueda_avanzada_3" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm mb-2" onclick="$('#busqueda_avanzada_aparecer_asis_3').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                    @elseif(Auth::user()->hasRole('Institucion'))
                                        <button id="busqueda_avanzada_3" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm mb-2" onclick="$('#busqueda_avanzada_aparecer_inst_3').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                    @elseif(Auth::user()->hasRole('ProfesionalRecibe'))
                                        <button id="busqueda_avanzada_3" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm mb-2" onclick="$('#busqueda_avanzada_aparecer_prof_3').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                    @elseif(Auth::user()->hasRole('Servicio'))
                                        <button id="busqueda_avanzada_3" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm mb-2" onclick="$('#busqueda_avanzada_aparecer_serv_3').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                    {{--  @elseif(Auth::user()->hasRole('AsistenCaja'))
                                        <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                            <i class="feather icon-home"></i>
                                        </a>  --}}
                                    @endif
                                    {{--  <button id="busqueda_avanzada_3" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm" onclick="$('#busqueda_avanzada_aparecer_3').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>  --}}
                                </div>
                            </div>
                                @if(Auth::user()->hasRole('Profesional'))
                                    <div id="busqueda_avanzada_aparecer_prof_3" style="display:none">
                                @elseif(Auth::user()->hasRole('Asistente'))
                                    <div id="busqueda_avanzada_aparecer_asis_3" style="display:none">
                                @elseif(Auth::user()->hasRole('Institucion'))
                                    <div id="busqueda_avanzada_aparecer_inst_3" style="display:none">
                                @elseif(Auth::user()->hasRole('ProfesionalRecibe'))
                                    <div id="busqueda_avanzada_aparecer_prof_3" style="display:none">
                                @elseif(Auth::user()->hasRole('Servicio'))
                                    <div id="busqueda_avanzada_aparecer_serv_3" style="display:none">
                            {{--  @elseif(Auth::user()->hasRole('AsistenCaja'))
                                <a href="{{ route('asistente_adm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </a>  --}}
                            @endif
                            {{--<div id="busqueda_avanzada_aparecer_3" style="display:none">  --}}
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Fecha de atención</label>
                                                        <input type="date" class="form-control form-control-sm" name="gestion_fecha" id="gestion_fecha">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Asistente</label>
                                                        <select id="gestion_asistente" name="gestion_asistente" class="form-control form-control-sm">
                                                            <option value="">Seleccione</option>
                                                            @if($lista_asistente)
                                                                @foreach($lista_asistente as $key_asistente => $value_asistente)
                                                                    <option value="{{ $value_asistente->id }}">{{ $value_asistente->nombres }} {{ $value_asistente->apellido_uno }} {{ $value_asistente->apellido_dos }} </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Convenio</label>
                                                        <select id="gestion_convenio" name="gestion_convenio" class="form-control form-control-sm">
                                                            <option value="">Seleccione</option>
                                                            @if($lista_prevision)
                                                                @foreach($lista_prevision as $key_prevision => $value_prevision)
                                                                    <option value="{{ $value_prevision->id }}">{{ $value_prevision->nombre }} </option>
                                                                @endforeach
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Estado consulta</label>
                                                        <select id="gestion_estado_consulta" name="gestion_estado_consulta" class="form-control form-control-sm">
                                                            <option value="">Seleccione</option>
                                                            @if($lista_estado_consulta)
                                                                @foreach($lista_estado_consulta as $key_estado_consulta => $value_estado_consulta)
                                                                    <option value="{{ $value_estado_consulta->id }}">{{ $value_estado_consulta->valor }} </option>
                                                                @endforeach
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-2">
                                                    <button class="btn btn-block btn-sm btn-info" onclick="cargar_flujo_caja_gestion_bonos();"><i class="feather icon-search"></i> Buscar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--BOTONES DE PESTAÑAS-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                        <div class="card py-0">
                                            <div class="card-body pb-2 pt-2">
                                                <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset active" id="pills-bonos_por_cobrar-tab" data-toggle="pill" href="#pills-bonos_por_cobrar" role="tab" aria-controls="pills-bonos_por_cobrar" aria-selected="true">
                                                            Bonos por cobrar
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset" id="pills-bonos_enviados-tab" data-toggle="pill" href="#pills-bonos_enviados" role="tab" aria-controls="pills-bonos_enviados" aria-selected="true">
                                                            Bonos enviados a cobro (archivo CSV)
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link-aten text-reset" id="pills-bonos_totales-tab" data-toggle="pill" href="#pills-bonos_totales" role="tab" aria-controls="pills-bonos_totales" aria-selected="true">
                                                            Bonos totales
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--PESTAÑAS-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="pills-bonos_por_cobrar" role="tabpanel" aria-labelledby="pills-bonos_por_cobrar-tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                        <h5 class="text-c-blue d-inline float-left f-18">Bonos por cobrar</h5>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="dt-responsive table-responsive">
                                                                    <table id="tabla_gestion_bonos" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="align-middle">Convenio</th>
                                                                                <th class="align-middle">Código</th>
                                                                                <th class="align-middle">Tipo</th>
                                                                                <th class="align-middle">Clase</th>
                                                                                <th class="align-middle">Fecha de atención</th>
                                                                                <th class="align-middle">Paciente</th>
                                                                                <th class="align-middle">Valor total</th>
                                                                                <th class="align-middle">Estado consulta</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if( isset($bonos_rendidos) )

                                                                                @foreach($bonos_rendidos as $key_br => $value_br)
                                                                                    <tr >
                                                                                        <td class="align-middle">{{ $value_br->Convenio()->first()->nombre }}</td>
                                                                                        <td class="align-middle">{{ $value_br->numero_bono }}</td>
                                                                                        <td class="align-middle">{{ $value_br->TipoBono()->first()->nombre }}</td>
                                                                                        <td class="align-middle">
                                                                                            @if($value_br->id_clase_bono == 1)
                                                                                                        Bono Emitido por Institucion
                                                                                                    @elseif($value_br->id_clase_bono == 2 || $value_br->id_clase_bono == 3)
                                                                                                        Boucher
                                                                                                    @elseif($value_br->id_clase_bono == 4)
                                                                                                        Bono Web
                                                                                                    @elseif($value_br->id_clase_bono == 5)
                                                                                                        Bono Web Pre-Pago
                                                                                                    @elseif($value_br->id_clase_bono == 6)
                                                                                                        Particular
                                                                                                    @elseif($value_br->id_clase_bono == 7)
                                                                                                        Copago
                                                                                                    @else
                                                                                                        Otro
                                                                                                    @endif
                                                                                        </td>
                                                                                        <td class="align-middle">{{ $value_br->fecha_atencion }}</td>
                                                                                        <td class="align-middle">
                                                                                            <span>{{ $value_br->Paciente()->first()->nombres }} {{ $value_br->Paciente()->first()->apellido_uno }} {{ $value_br->Paciente()->first()->apellido_dos }}</span><br>
                                                                                            <span>{{ $value_br->Paciente()->first()->rut }}</span>
                                                                                        </td>
                                                                                        <td class="align-middle">${{ number_format($value_br->valor_atencion, 2, ",", ".") }}</td>
                                                                                        <td class="align-middle">{{ $value_br->estado_consulta == 1 ? 'EN ESPERA' : 'OTRO' }}</td>

                                                                                    </tr>
                                                                                @endforeach
                                                                            @endif

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                        <button id="arch_csv" type="button" class="btn btn-info float-right d-inline iniciar_procesocobro shadow-sm" onclick="generarCSV()"><i class="feather icon-file"></i> Generar archivo CSV</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="pills-bonos_enviados" role="tabpanel" aria-labelledby="pills-bonos_enviados-tab">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                        <h5 class="text-c-blue d-inline float-left f-18">Bonos enviados a cobro (archivo CSV)</h5>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="dt-responsive table-responsive">
                                                                    <table id="tabla_gestion_bonos_generados" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="align-middle">Convenio</th>
                                                                                <th class="align-middle">Código</th>
                                                                                <th class="align-middle">Tipo</th>
                                                                                <th class="align-middle">Clase</th>
                                                                                <th class="align-middle">Fecha de atención</th>
                                                                                <th class="align-middle">Paciente</th>
                                                                                <th class="align-middle">Valor total</th>
                                                                                <th class="align-middle">Estado consulta</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if( isset($bonos_rendidos_generados) )

                                                                                @foreach($bonos_rendidos_generados as $key_br => $value_br)
                                                                                    <tr>
                                                                                        <td class="align-middle">{{ $value_br->Convenio()->first()->nombre }}</td>
                                                                                        <td class="align-middle">{{ $value_br->numero_bono }}</td>
                                                                                        <td class="align-middle">{{ $value_br->TipoBono()->first()->nombre }}</td>
                                                                                        <td class="align-middle">
                                                                                            @if($value_br->id_clase_bono == 1)
                                                                                                Bono Emitido por Institucion
                                                                                            @elseif($value_br->id_clase_bono == 2 || $value_br->id_clase_bono == 3)
                                                                                                Boucher
                                                                                            @elseif($value_br->id_clase_bono == 4)
                                                                                                Bono Web
                                                                                            @elseif($value_br->id_clase_bono == 5)
                                                                                                Bono Web Pre-Pago
                                                                                            @elseif($value_br->id_clase_bono == 6)
                                                                                                Particular
                                                                                            @elseif($value_br->id_clase_bono == 7)
                                                                                                Copago
                                                                                            @else
                                                                                                Otro
                                                                                            @endif
                                                                                        </td>
                                                                                        <td class="align-middle">{{ $value_br->fecha_atencion }}</td>
                                                                                        <td class="align-middle">
                                                                                            <span>{{ $value_br->Paciente()->first()->nombres }} {{ $value_br->Paciente()->first()->apellido_uno }} {{ $value_br->Paciente()->first()->apellido_dos }}</span><br>
                                                                                            <span>{{ $value_br->Paciente()->first()->rut }}</span>
                                                                                        </td>
                                                                                        <td class="align-middle">${{ number_format($value_br->valor_atencion, 2, ",", ".") }}</td>
                                                                                        <td class="align-middle">{{ $value_br->estado_consulta }}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            @endif
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>



                        {{-- PESTAÑA DE GESTION DE BONOS PROGRAMAS --}}
                        <div class="tab-pane" id="gestion-programas-prof" role="tabpanel" aria-labelledby="gestion-programas-prof-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12 mt-3 mb-2">
                                    <h5 class="text-c-blue d-inline float-left f-20 pt-1">Gestión de bonos programa</h5>
                                    <button id="busqueda_avanzada_4" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm" onclick="$('#busqueda_avanzada_aparecer_4').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12" id="busqueda_avanzada_aparecer_4" style="display:none">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-3 col-lg-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Fecha de atención</label>
                                                        <input type="date" class="form-control form-control-sm" name="gestion_progr_fecha" id="gestion_progr_fecha">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-9 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Asistente</label>
                                                        <select id="gestion_progr_asistente" name="gestion_progr_asistente" class="form-control form-control-sm">
                                                            <option value="">Seleccione</option>
                                                            @if($lista_asistente)
                                                                @foreach($lista_asistente as $key_asistente => $value_asistente)
                                                                    <option value="{{ $value_asistente->id }}">{{ $value_asistente->nombres }} {{ $value_asistente->apellido_uno }} {{ $value_asistente->apellido_dos }} </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Convenio</label>
                                                        <select id="gestion_progr_convenio" name="gestion_progr_convenio" class="form-control form-control-sm">
                                                            <option value="">Seleccione</option>
                                                            @if($lista_prevision)
                                                                @foreach($lista_prevision as $key_prevision => $value_prevision)
                                                                    <option value="{{ $value_prevision->id }}">{{ $value_prevision->nombre }} </option>
                                                                @endforeach
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Estado consulta</label>
                                                        <select id="gestion_progr_estado_consulta" name="gestion_progr_estado_consulta" class="form-control form-control-sm">
                                                            <option value="">Seleccione</option>
                                                            @if($lista_estado_consulta)
                                                                @foreach($lista_estado_consulta as $key_estado_consulta => $value_estado_consulta)
                                                                    <option value="{{ $value_estado_consulta->id }}">{{ $value_estado_consulta->valor }} </option>
                                                                @endforeach
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-2 text-center">
                                                    <button class="btn btn-block btn-sm btn-block btn-info" onclick="cargar_flujo_caja_rendicion_programa();"><i class="feather icon-search"></i> Buscar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="tabla_gestion_bonos_programa" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="align-middle">Convenio</th>
                                                                    <th class="align-middle">Nº de programa</th>
                                                                    <th class="align-middle">Código</th>
                                                                    <th class="align-middle">Tipo</th>
                                                                    <th class="align-middle">Fecha de atención</th>
                                                                    <th class="align-middle">Paciente</th>
                                                                    <th class="align-middle">Valor total</th>
                                                                    <th class="align-middle">Estado consulta</th>
                                                                    <th class="align-middle">Acción</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if( isset($bonos_rendidos) )
                                                                    @foreach($bonos_rendidos as $key_br => $value_br)
                                                                        <tr >
                                                                            <td class="align-middle">{{ $value_br->Convenio()->first()->nombre }}</td>
                                                                            <td class="align-middle">{{ $value_br->numero_sesiones }}</td>
                                                                            <td class="align-middle">{{ $value_br->numero_bono }}</td>
                                                                            <td class="align-middle">{{ $value_br->TipoBono()->first()->nombre }}</td>
                                                                            <td class="align-middle">{{ $value_br->fecha_atencion }}</td>
                                                                            <td class="align-middle">
                                                                                <span>{{ $value_br->Paciente()->first()->nombres }} {{ $value_br->Paciente()->first()->apellido_uno }} {{ $value_br->Paciente()->first()->apellido_dos }}</span><br>
                                                                                <span>{{ $value_br->Paciente()->first()->rut }}</span>
                                                                            </td>
                                                                            <td class="align-middle">${{ number_format($value_br->valor_atencion, 2, ",", ".") }}</td>
                                                                            <td class="align-middle">{{ $value_br->estado_consulta }}</td>
                                                                            <td class="align-middle">
                                                                                <div class="form-group">
                                                                                    <div class="switch switch-success d-inline m-r-10">
                                                                                        <input type="checkbox" id="rendir_caja_programa_{{ $value_br->id }}">
                                                                                        <label for="rendir_caja_{{ $value_br->id }}"
                                                                                            class="cr"></label>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						{{-- PESTAÑA DE VENTA DE BONOS PROGRAMAS --}}
                        <div class="tab-pane" id="pills-venta_bonos" role="tabpanel" aria-labelledby="pills-venta_bonos-tab">
							<div class="row">
                                <div class="col-md-12">
                                    <h5 class="text-c-blue d-inline float-left f-20">Venta de bonos</h5>
                                </div>
                            </div>
							<div class="form-row">
								<div class="col-sm-12 col-md-2">
									<div class="form-group">
										<label class="floating-label-activo-sm">Fecha de rendición</label>
										<input type="date" class="form-control form-control-sm" name="gestion_progr_fecha" id="gestion_progr_fecha">
									</div>
								</div>
								<div class="col-sm-12 col-md-2">
									<div class="form-group">
										<label class="floating-label-activo-sm">Rendir a:</label>
										<select id="gestion_progr_asistente" name="gestion_progr_asistente" class="form-control form-control-sm">
											<option value="">Seleccione</option>
											@if($lista_asistente)
												@foreach($lista_asistente as $key_asistente => $value_asistente)
													<option value="{{ $value_asistente->id }}">{{ $value_asistente->nombres }} {{ $value_asistente->apellido_uno }} {{ $value_asistente->apellido_dos }} </option>
												@endforeach
											@endif
										</select>
									</div>
								</div>
								<div class="col-sm-12 col-md-2">
									<div class="form-group">
										<label class="floating-label-activo-sm">Convenio</label>
										<select id="gestion_progr_convenio" name="gestion_progr_convenio" class="form-control form-control-sm">
											<option value="">Seleccione</option>
											@if($lista_prevision)
												@foreach($lista_prevision as $key_prevision => $value_prevision)
													<option value="{{ $value_prevision->id }}">{{ $value_prevision->nombre }} </option>

												@endforeach
											@endif
											<option value="0000">Todos</option>
										</select>
									</div>
								</div>
								<div class="col-sm-12 col-md-2 text-center">
									<button class="btn btn-block btn-sm btn-primary" onclick="cargar_flujo_caja_rendicion_programa();">Solicitar Código</button>
								</div>
								<div class="col-sm-12 col-md-2">
									<div class="form-group">
										<label class="floating-label-activo-sm">Código aceptación</label>
									   <input type="text" class="form-control form-control-sm" name="cod_acept_rendicion" id="cod_acept_rendicion"value="">
									</div>
								</div>
								<div class="col-sm-12 col-md-2 text-center">
									<button class="btn btn-block btn-sm btn-info" onclick="cargar_flujo_caja_rendicion_programa();">Rendir Venta Diaria</button>
								</div>
							</div>
							<div>

                                <table id="tabla_venta_bonos" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-wrap text-center align-middle">Folio Bono</th>
                                            <th class="text-center align-middle">Estado</th>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Valor</th>
                                            <th class="text-center align-middle">Ap.Seguro</th>
                                            <th class="text-center align-middle">T.Copago</th>
                                            <th class="text-center align-middle"><label>Rut Prestador</label><br><label>Nombre</label></th>
                                            <th class="text-center align-middle">Convenio</th>
                                            {{-- <th class="text-center align-middle">Asegurador</th> --}}
                                            <th class="text-center align-middle">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if( isset($bonos_rendidos) )
                                            @foreach($bonos_rendidos as $key_br => $value_br)
                                                <tr >
                                                    <td class="align-middle text-center">{{ $value_br->Convenio()->first()->nombre }}</td>
                                                    <td class="align-middle text-center">{{ $value_br->numero_sesiones }}</td>
                                                    <td class="align-middle text-center">{{ $value_br->numero_bono }}</td>
                                                    <td class="align-middle text-center">{{ $value_br->TipoBono()->first()->nombre }}</td>
                                                    <td class="align-middle text-center">{{ $value_br->fecha_atencion }}</td>
                                                    <td class="align-middle text-center">
                                                        <span>{{ $value_br->Paciente()->first()->nombres }} {{ $value_br->Paciente()->first()->apellido_uno }} {{ $value_br->Paciente()->first()->apellido_dos }}</span><br>
                                                        <span>{{ $value_br->Paciente()->first()->rut }}</span>
                                                    </td>
                                                    <td class="align-middle text-center">${{ number_format($value_br->valor_atencion, 2, ",", ".") }}</td>
                                                    <td class="align-middle text-center">{{ $value_br->estado_consulta }}</td>
                                                    <td class="align-middle text-center">
                                                        <div class="form-group">
                                                            <div class="switch switch-success d-inline m-r-10">
                                                                <input type="checkbox" id="rendir_caja_programa_{{ $value_br->id }}">
                                                                <label for="rendir_caja_{{ $value_br->id }}"
                                                                    class="cr"></label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{--  PESTAÑA DE BONOS DIARIOS A PROFESIONAL --}}
                        <div class="tab-pane" id="gestion-bonos-diarios-prof" role="tabpanel" aria-labelledby="gestion-bonos-diarios-prof-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12 mt-3 mb-2">
                                    <h5 class="text-c-blue d-inline float-left f-20 pt-1">Gestión de bonos diarios</h5>
                                    <button id="busqueda_avanzada_4" type="button" class="btn btn-primary btn-sm float-right d-inline shadow-sm" onclick="$('#busqueda_avanzada_aparecer_5').toggle();"><i class="feather icon-search"></i> Búsqueda avanzada</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12" id="busqueda_avanzada_aparecer_5" style="display:none">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-3 col-lg-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Fecha de atención</label>
                                                        <input type="date" class="form-control form-control-sm" name="gestion_diario_fecha" id="gestion_diario_fecha">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-9 col-lg-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Asistente</label>
                                                        <select id="gestion_diario_asistente" name="gestion_diario_asistente" class="form-control form-control-sm">
                                                            <option value="">Seleccione</option>
                                                            @if($lista_asistente)
                                                                @foreach($lista_asistente as $key_asistente => $value_asistente)
                                                                    <option value="{{ $value_asistente->id }}">{{ $value_asistente->nombres }} {{ $value_asistente->apellido_uno }} {{ $value_asistente->apellido_dos }} </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Convenio</label>
                                                        <select id="gestion_diario_convenio" name="gestion_diario_convenio" class="form-control form-control-sm">
                                                            <option value="">Seleccione</option>
                                                            @if($lista_prevision)
                                                                @foreach($lista_prevision as $key_prevision => $value_prevision)
                                                                    <option value="{{ $value_prevision->id }}">{{ $value_prevision->nombre }} </option>
                                                                @endforeach
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-2">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Estado consulta</label>
                                                        <select id="gestion_diario_estado_consulta" name="gestion_diario_estado_consulta" class="form-control form-control-sm">
                                                            <option value="">Seleccione</option>
                                                            @if($lista_estado_consulta)
                                                                @foreach($lista_estado_consulta as $key_estado_consulta => $value_estado_consulta)
                                                                    <option value="{{ $value_estado_consulta->id }}">{{ $value_estado_consulta->valor }} </option>
                                                                @endforeach
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-lg-2 text-center">
                                                    <button class="btn btn-block btn-sm btn-block btn-info" onclick="cargar_flujo_caja_rendicion_diario();"><i class="feather icon-search"></i> Buscar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="tabla_gestion_bonos_diarios" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="align-middle">Convenio</th>
                                                                    <th class="align-middle">Nº de programa</th>
                                                                    <th class="align-middle">Código</th>
                                                                    <th class="align-middle">Tipo</th>
                                                                    <th class="align-middle">Fecha de atención</th>
                                                                    <th class="align-middle">Paciente</th>
                                                                    <th class="align-middle">Valor total</th>
                                                                    <th class="align-middle">Estado consulta</th>
                                                                    <th class="align-middle">Asistente</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if( isset($bonos_diarios) )
                                                                    @foreach($bonos_diarios as $key_br => $value_br)
                                                                        <tr >
                                                                            <td class="align-middle">{{ $value_br->Convenio()->first()->nombre }}</td>
                                                                            <td class="align-middle">{{ $value_br->numero_sesiones }}</td>
                                                                            <td class="align-middle">{{ $value_br->numero_bono }}</td>
                                                                            <td class="align-middle">{{ $value_br->TipoBono()->first()->nombre }}</td>
                                                                            <td class="align-middle">{{ $value_br->fecha_atencion }}</td>
                                                                            <td class="align-middle">
                                                                                <span>{{ $value_br->Paciente()->first()->nombres }} {{ $value_br->Paciente()->first()->apellido_uno }} {{ $value_br->Paciente()->first()->apellido_dos }}</span><br>
                                                                                <span>{{ $value_br->Paciente()->first()->rut }}</span>
                                                                            </td>
                                                                            <td class="align-middle">${{ number_format($value_br->valor_atencion, 2, ",", ".") }}</td>
                                                                            <td class="align-middle">{{ $value_br->estado_consulta }}</td>
                                                                            <td class="align-middle">
                                                                            @if ($value_br->Asistente()->first())
                                                                                <span>{{ $value_br->Asistente()->first()->nombres }} {{ $value_br->Asistente()->first()->apellido_uno }}</span><br>
                                                                                <span>{{ $value_br->Asistente()->first()->rut }}</span>
                                                                            @else
                                                                                <span>Sin asistente</span>
                                                                            @endif
                                                                            </td>

                                                                        </tr>
                                                                    @endforeach
                                                                @endif

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="bonos_rendidos_fonasa" value="{{ $bonos_fonasa }}">
    <input type="hidden" id="bonos_rendidos_otros" value="{{ $bonos_otros }}">
    <input type="hidden" id="bonos_agrupados_convenio" value="{{ $bonos_agrupados_convenio }}">
    <!--Cierre: Container Completo-->
    {{-- @include('page.flujo_cajas.asistente_cm_publico.modales.ver_rendicion') --}}
    @include('app.profesional.modales.flujo_caja.ver_rendicion')
@endsection

@section('page-script')
    <script>
        $(document).ready(function(){
            $('#rinde_asistente').select2();
            $('#tabla_rendir_caja').DataTable({
                responsive: true,
            });

            // Inicializar estado del botón de cobro
            seleccionar_bonos_rendicion();
        });
        $(document).ready(function(){
            $('#tabla_programas').DataTable({
                responsive: true,
            });
        });
        $(document).ready(function(){
            $('#tabla_gestion_bonos').DataTable({
                responsive: true,
            });
        });
        $(document).ready(function(){
            $('#tabla_gestion_bonos_programa').DataTable({
                responsive: true,
            });
        });
        $(document).ready(function(){
            $('#tabla_gestion_bonos_diarios').DataTable({
                responsive: true,
            });
        });
        $(document).ready(function(){
            $('#tabla_venta_bonos').DataTable({
                responsive: true,
            });
        });

        $(document).ready(function(){
            $('#tabla_gestion_bonos_generados').DataTable({
                responsive: true,
            });
        });

        function ver_rendicion(id){
            let url = "{{ route('flujo_caja.profesional.rendicion.show', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data){
                    // abrir modal
                    $('#ver_rendicion').modal('show');
                    $('#ver_rendicion .modal-body').html(data);
                },
                error: function(error){
                    console.log(error);
                }

            });

        }

        function ver_pdf_rendicion(id, id_asistente){
            let url = "{{ route('flujo_caja.profesional.rendicion.pdf', [':id', ':id_asistente']) }}";
            url = url.replace(':id', id).replace(':id_asistente', id_asistente);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data){
                    // return console.log(data);
                    let url = data.ruta;
                    let height = 800;
                    let width = 1200;
                    let left = (screen.width / 2) - (width / 2);
                    let top = (screen.height / 2) - (height / 2);
                    let options = 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left;
                    window.open(url, 'pdf_rendicion', options);
                },
                error: function(error){
                    console.log(error);
                }

            });
        }

        function aprobar_rendicion(id, email){
            swal({
                title: "¿Está seguro de aprobar la rendición?",
                text: "Una vez aprobada la rendición, no podrá ser modificada.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((aceptar) => {
                if (aceptar) {
                    confirmar_aprobar_rendicion(id,email);
                }
            });
        }

        function rechazar_rendicion(id, email){
            swal({
                title: "¿Está seguro de rechazar la rendición?",
                text: "Una vez rechazada la rendición, no podrá ser modificada.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((aceptar) => {
                if (aceptar) {
                    let url = "{{ route('flujo_caja.profesional.rendicion.rechazar', ':id') }}";
                    url = url.replace(':id', id);

                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(data) {
                            $('#ver_rendicion').modal('hide');
                            swal("¡Rendición rechazada!", {
                                icon: "success",
                            });
                            let rendiciones = data.rendiciones;
                            let table = $('#tabla_rendir_caja').DataTable();
                            table.clear().draw();

                            for (let i = 0; i < rendiciones.length; i++) {
                                let r = rendiciones[i];
                                let nombreCompleto = `${r.asistente.nombres} ${r.asistente.apellido_uno} ${r.asistente.apellido_dos}`;
                                let acciones = generarAccionesRendicion(r.id, r.asistente.email, r.asistente.id, r.estado); // <-- ¡Importante!

                                table.row.add([
                                    r.id,
                                    r.fecha_rendicion,
                                    nombreCompleto,
                                    "2", // Aquí puedes reemplazar si quieres cargar dinámicamente el tipo
                                    r.estado,
                                    acciones
                                ]).draw(false);
                            }
                        },
                        error: function(error) {
                            console.log(error);
                            swal("Error al rechazar rendición", {
                                icon: "error",
                            });
                        }
                    });
                }
            });
        }

        function confirmar_aprobar_rendicion(id, email) {
            let url = "{{ route('flujo_caja.profesional.rendicion.aprobar', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    let rendiciones = data.rendiciones;
                    $('#ver_rendicion').modal('hide');

                    swal("¡Rendición aprobada y correo enviado a " + email + "!", {
                        icon: "success",
                    });

                    let table = $('#tabla_rendir_caja').DataTable();
                    table.clear().draw();

                    for (let i = 0; i < rendiciones.length; i++) {
                        let r = rendiciones[i];
                        let nombreCompleto = `${r.asistente.nombres} ${r.asistente.apellido_uno} ${r.asistente.apellido_dos}`;
                        let acciones = generarAccionesRendicion(r.id, r.asistente.email, r.asistente.id, r.estado); // <-- ¡Importante!

                        table.row.add([
                            r.id,
                            r.fecha_rendicion,
                            nombreCompleto,
                            "2", // Aquí puedes reemplazar si quieres cargar dinámicamente el tipo
                            r.estado,
                            acciones
                        ]).draw(false);
                    }
                },
                error: function(error) {
                    console.log(error);
                    swal("Error al aprobar rendición", {
                        icon: "error",
                    });
                }
            });
        }

        function generarCSV(){
            // preguntar si desea generar el archivo csv
            swal({
                title: "¿Está seguro de generar el archivo CSV?",
                text: "Una vez generado el archivo. \nSera destinado a la carpeta Descargas de su equipo.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((aceptar) => {
                if (aceptar) {
                    regenerarCSV();
                } else {
                    swal("La acción ha sido cancelada");
                }
            });


        }

        function regenerarCSV(){
            // crear array de prueba con el array de bonos rendidos
            let array_fonasa = JSON.parse($('#bonos_rendidos_fonasa').val());
            let array_otros = JSON.parse($('#bonos_rendidos_otros').val());
            let array_bonos_agrupados = JSON.parse($('#bonos_agrupados_convenio').val());
            console.log(array_bonos_agrupados);


            var url = "{{ route('flujo_caja.profesional.rendicion.cambiar_estado') }}";
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    bonos_fonasa: JSON.stringify(array_fonasa),
                    bonos_otros: JSON.stringify(array_otros),
                    bonos_agrupados: JSON.stringify(array_bonos_agrupados)
                },
                success: function(resp){
                    console.log(resp);
                    let data = array_bonos_agrupados;
                    console.log(data);
                    // dar formato a la fecha
                    let fecha_hoy = new Date();
                    fecha_hoy = fecha_hoy.getDate() + '-' + (fecha_hoy.getMonth() + 1) + '-' + fecha_hoy.getFullYear();

                    // Recorre cada propiedad del objeto
                    for (let key in data) {
                        if (data.hasOwnProperty(key)) {
                            let array = data[key];
                            let csv = '';
                            let rut_profesional = array[0].rut_profesional;
                            let convenio = array[0].convenio;
                            console.log(rut_profesional);

                            // Recorre cada elemento del array
                            array.forEach(function(row){
                                csv += row.numero_bono + ';' + row.rut_paciente + ';' + fecha_hoy + '\n';
                            });

                            console.log(csv);
                            let hiddenElement = document.createElement('a');
                            hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv);
                            hiddenElement.target = '_blank';
                            hiddenElement.download = 'gestionBonos_'+key+'_'+fecha_hoy+'_'+rut_profesional+'_'+convenio+'.csv';
                            hiddenElement.click();
                        }
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }

        function cargar_flujo_caja_rendicion() {
            var fecha = $('#rinde_fecha').val();
            // var lugares = $('#lugares_atencion_agenda').val();
            var asistente = $('#rinde_asistente').val();
            var convenio = $('#rinde_convenio').val();
            var estado_consulta = $('#rinde_estado_consulta').val();

            let url = "{{ route('flujo_caja.profesional.data_rendidos') }}";

            $.ajax({
                url: url,
                type: "GET",
                data: {
                    fecha : fecha,
                    // lugares : lugares,
                    // convenio : convenio,
                    asistente : asistente,
                    // estado_consulta : estado_consulta,
                },
            })
            .done(function(data) {

                console.log(data);
                if (data.estado == 1)
                {
                    let rendiciones = data.registros;
                            let table = $('#tabla_rendir_caja').DataTable();
                            table.clear().draw();

                            for (let i = 0; i < rendiciones.length; i++) {
                                let r = rendiciones[i];
                                let nombreCompleto = `${r.asistente.nombres} ${r.asistente.apellido_uno} ${r.asistente.apellido_dos}`;
                                let acciones = generarAccionesRendicion(r.id, r.asistente.email, r.asistente.id, r.estado); // <-- ¡Importante!

                                table.row.add([
                                    r.id,
                                    r.fecha_rendicion,
                                    nombreCompleto,
                                    "2", // Aquí puedes reemplazar si quieres cargar dinámicamente el tipo
                                    r.estado,
                                    acciones
                                ]).draw(false);
                            }
                }
                else
                {
                    $('#tabla_rendir_caja tbody').html('');
                    $('#tabla_rendir_caja tbody').append('<tr><td colspan="8"> Sin registros</td></tr>');

                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function generarAccionesRendicion(id, email, idAsistente, estado) {
            const aprobado = estado === "APROBADA";

            return `
                <button class="btn btn-primary-light-c btn-xxs" onclick="ver_rendicion(${id})">Ver</button>
                <button class="btn btn-secondary btn-xxs" onclick="ver_pdf_rendicion(${id}, ${idAsistente})">Ver PDF</button>

                <div class="switch switch-success d-inline m-l-5">
                    <input type="checkbox"
                        id="switch_rendicion_${id}"
                        onchange="cambiarEstadoRendicion(this)"
                        data-id="${id}"
                        data-email="${email}"
                        ${aprobado ? "checked" : ""}>
                    <label for="switch_rendicion_${id}" class="cr"></label>
                </div>
                <label style="font-size: 11px;">Aprobar</label>
            `;
        }



        function cargar_flujo_caja_programa() {
            var fecha = $('#rinde_progr_fecha').val();
            var asistente = $('#rinde_progr_asistente').val();
            var convenio = $('#rinde_progr_convenio').val();
            var estado_consulta = $('#rinde_progr_estado_consulta').val();

            let url = "{{ route('flujo_caja.profesional.data_rendidos_programa') }}";

            $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        fecha : fecha,
                        asistente : asistente,
                        convenio : convenio,
                        estado_consulta : estado_consulta,
                    },
                })
                .done(function(data) {
                    console.log(data);
                    if (data.estado == 1)
                    {
                        $('#tabla_programas tbody').html('');
                        for (i = 0; i < data.registros.length; i++) {

                            var j = 1; //contador para asignar id al boton que borrara la fila
                            var fila = '';
                            fila += '<tr>';
                            fila += '    <td class="align-middle text-center">'+data.registros[i].convenio.nombre+'</td>';
                            fila += '    <td class="align-middle text-center">'+data.registros[i].numero_sesiones+'</td>';
                            fila += '    <td class="align-middle text-center">'+data.registros[i].numero_bono+'</td>';
                            fila += '    <td class="align-middle text-center">'+data.registros[i].tipo_bono.nombre+'</td>';
                            fila += '    <td class="align-middle text-center">'+data.registros[i].fecha_atencion+'</td>';
                            fila += '    <td class="align-middle text-center">';
                            fila += '        <span>'+data.registros[i].paciente.nombres+' '+data.registros[i].paciente.apellido_uno+' '+data.registros[i].paciente.apellido_dos+'</span><br>';
                            fila += '        <span>'+data.registros[i].paciente.rut+'</span>';
                            fila += '    </td>';
                            fila += '    <td class="align-middle text-center">$'+data.registros[i].valor_atencion+'</td>';
                            fila += '    <td class="align-middle text-center">'+data.registros[i].estado_consulta+'</td>';
                            fila += '    <td class="align-middle text-center">';
                            fila += '        <div class="form-group">';
                            fila += '            <div class="switch switch-success d-inline m-r-10">';
                            fila += '                <input type="checkbox" id="rendir_caja_programa_'+data.registros[i].id+'">';
                            fila += '                <label for="rendir_caja_'+data.registros[i].id+'"';
                            fila += '                    class="cr"></label>';
                            fila += '            </div>';
                            fila += '        </div>';
                            fila += '    </td>';
                            fila += '</tr>';

                            j++;

                            $('#tabla_programas tbody').append(fila);

                        }
                    }
                    else
                    {
                        $('#tabla_programas tbody').html('');
                        $('#tabla_programas tbody').append('<tr><td colspan="8"> Sin registros</td></tr>');

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function cargar_flujo_caja_gestion_bonos()
        {
            var fecha = $('#gestion_fecha').val();
            var asistente = $('#gestion_asistente').val();
            var convenio = $('#gestion_convenio').val();
            var estado_consulta = $('#gestion_estado_consulta').val();

             let url = "{{ route('flujo_caja.profesional.data_gestion_bonos') }}";

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    fecha : fecha,
                    asistente : asistente,
                    convenio : convenio,
                    estado_consulta : estado_consulta,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {
                    $('#tabla_gestion_bonos tbody').html('');
                    for (i = 0; i < data.registros.bonos_rendidos.length; i++)
                    {
                        var fila = '';
                        fila += '<tr >';
                        fila += '    <td class="align-middle text-center">'+data.registros.bonos_rendidos[i].convenio.nombre+'</td>';
                        fila += '    <td class="align-middle text-center">'+data.registros.bonos_rendidos[i].numero_bono+'</td>';
                        fila += '    <td class="align-middle text-center">'+data.registros.bonos_rendidos[i].tipo_bono.nombre+'</td>';
                        fila += '    <td class="align-middle text-center">';
                        if(data.registros.bonos_rendidos[i].id_clase_bono == 1)
                            fila += 'Bono Emitido por Institucion';
                        else if(data.registros.bonos_rendidos[i].id_clase_bono == 2 || data.registros.bonos_rendidos[i].id_clase_bono == 3)
                            fila += 'Boucher';
                        else if(data.registros.bonos_rendidos[i].id_clase_bono == 4)
                            fila += 'Bono Web';
                        else if(data.registros.bonos_rendidos[i].id_clase_bono == 5)
                            fila += 'Bono Web Pre-Pago';
                        else if(data.registros.bonos_rendidos[i].id_clase_bono == 6)
                            fila += 'Particular';
                        else if(data.registros.bonos_rendidos[i].id_clase_bono == 7)
                            fila += 'Copago';
                        else
                            fila += 'Otro';
                        fila += '    </td>';
                        fila += '    <td class="align-middle text-center">'+data.registros.bonos_rendidos[i].fecha_atencion+'</td>';
                        fila += '    <td class="align-middle text-center">';
                        fila += '        <span>'+data.registros.bonos_rendidos[i].paciente.nombres+' '+data.registros.bonos_rendidos[i].paciente.apellido_uno+' '+data.registros.bonos_rendidos[i].paciente.apellido_dos+'</span><br>';
                        fila += '        <span>'+data.registros.bonos_rendidos[i].paciente.rut+'</span>';
                        fila += '    </td>';
                        fila += '    <td class="align-middle text-center">$'+data.registros.bonos_rendidos[i].valor_atencion+'</td>';
                        fila += '    <td class="align-middle text-center">'+data.registros.bonos_rendidos[i].estado_consulta+'</td>';
                        fila += '</tr>';
                        $('#tabla_gestion_bonos tbody').append(fila);

                    }

                    $('#tabla_gestion_bonos_generados tbody').html('');
                    for (i = 0; i < data.registros.bonos_rendidos_generados.length; i++)
                    {
                        var fila = '';
                        fila += '<tr >';
                        fila += '    <td class="align-middle text-center">'+data.registros.bonos_rendidos_generados[i].convenio.nombre+'</td>';
                        fila += '    <td class="align-middle text-center">'+data.registros.bonos_rendidos_generados[i].numero_bono+'</td>';
                        fila += '    <td class="align-middle text-center">'+data.registros.bonos_rendidos_generados[i].tipo_bono.nombre+'</td>';
                        fila += '    <td class="align-middle text-center">';
                        if(data.registros.bonos_rendidos_generados[i].id_clase_bono == 1)
                            fila += 'Bono Emitido por Institucion';
                        else if(data.registros.bonos_rendidos_generados[i].id_clase_bono == 2 || data.registros.bonos_rendidos_generados[i].id_clase_bono == 3)
                            fila += 'Boucher';
                        else if(data.registros.bonos_rendidos_generados[i].id_clase_bono == 4)
                            fila += 'Bono Web';
                        else if(data.registros.bonos_rendidos_generados[i].id_clase_bono == 5)
                            fila += 'Bono Web Pre-Pago';
                        else if(data.registros.bonos_rendidos_generados[i].id_clase_bono == 6)
                            fila += 'Particular';
                        else if(data.registros.bonos_rendidos_generados[i].id_clase_bono == 7)
                            fila += 'Copago';
                        else
                            fila += 'Otro';
                        fila += '    </td>';
                        fila += '    <td class="align-middle text-center">'+data.registros.bonos_rendidos_generados[i].fecha_atencion+'</td>';
                        fila += '    <td class="align-middle text-center">';
                        fila += '        <span>'+data.registros.bonos_rendidos_generados[i].paciente.nombres+' '+data.registros.bonos_rendidos_generados[i].paciente.apellido_uno+' '+data.registros.bonos_rendidos_generados[i].paciente.apellido_dos+'</span><br>';
                        fila += '        <span>'+data.registros.bonos_rendidos_generados[i].paciente.rut+'</span>';
                        fila += '    </td>';
                        fila += '    <td class="align-middle text-center">$'+data.registros.bonos_rendidos_generados[i].valor_atencion+'</td>';
                        fila += '    <td class="align-middle text-center">'+data.registros.bonos_rendidos_generados[i].estado_consulta+'</td>';
                        fila += '</tr>';
                        $('#tabla_gestion_bonos_generados tbody').append(fila);
                    }

                }
                else
                {
                    $('#tabla_gestion_bonos tbody').html('');
                    $('#tabla_gestion_bonos tbody').append('<tr><td colspan="8"> Sin registros</td></tr>');

                    $('#tabla_gestion_bonos_generados tbody').html('');
                    $('#tabla_gestion_bonos_generados tbody').append('<tr><td colspan="8"> Sin registros</td></tr>');

                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function cambiarEstadoRendicion(element) {
            const id = element.getAttribute('data-id');
            const email = element.getAttribute('data-email');
            const checked = element.checked;

            if (checked) {
                swal({
                    title: "¿Aprobar rendición?",
                    text: "Una vez aprobada, no podrá ser modificada.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: false,
                }).then((aceptar) => {
                    if (aceptar) {
                        confirmar_aprobar_rendicion(id, email);
                    } else {
                        // Si el usuario cancela, revertimos el switch
                        element.checked = false;
                        // Actualizar estado de botón de recepción
                        seleccionar_bonos_rendicion();
                    }
                });
            } else {
                swal({
                    title: "¿Rechazar rendición?",
                    text: "Una vez rechazada, no podrá ser modificada.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((aceptar) => {
                    if (aceptar) {
                        rechazar_rendicion(id, email);
                    } else {
                        // Si el usuario cancela, revertimos el switch
                        element.checked = true;
                        // Actualizar estado de botón de recepción
                        seleccionar_bonos_rendicion();
                    }
                });
            }

            // Actualizar el estado del botón de recepción después de cualquier cambio
            setTimeout(function() {
                seleccionar_bonos_rendicion();
            }, 100);
        }

        function seleccionar_bonos_rendicion(){
            console.log('seleccionar bonos rendicion');

            // Obtener el estado del checkbox "enviar_todos"
            var enviarTodos = document.getElementById('enviar_todos');
            var table = $('#tabla_rendir_caja').DataTable();

            // Usar DataTables API para obtener TODAS las filas (todas las páginas)
            var allRows = table.rows().nodes();
            var checkboxes = $(allRows).find('input[id^="switch_rendicion_"]');

            // Si se activó "enviar_todos", seleccionar/deseleccionar todas las rendiciones
            if (event && event.target && event.target.id === 'enviar_todos') {
                if (enviarTodos.checked) {
                    // Si se marca "enviar_todos", seleccionar todas
                    checkboxes.each(function() {
                        this.checked = true;
                    });
                } else {
                    // Si se desmarca "enviar_todos", restaurar al estado inicial (solo aprobadas)
                    checkboxes.each(function() {
                        // Buscar en la fila padre si el estado es "APROBADA"
                        var fila = $(this).closest('tr');
                        var estadoCell = fila.find('td').eq(4); // La columna de estado es la 5ta (índice 4)
                        var estadoTexto = estadoCell.text().trim();

                        // Solo marcar si el estado es APROBADA
                        this.checked = (estadoTexto === 'APROBADA');
                    });
                }
            }

            // Contar rendiciones seleccionadas usando DataTables API
            var seleccionados = [];
            checkboxes.each(function() {
                if (this.checked) {
                    var rendicionId = $(this).attr('data-id');
                    if (rendicionId) {
                        seleccionados.push(rendicionId);
                    }
                }
            });

            console.log('Rendiciones seleccionadas:', seleccionados);
            console.log('Total checkboxes encontrados:', checkboxes.length);

            // Mostrar/ocultar botón según selección
            var boton = document.getElementById('iniciar_procesocobro_rendicion_2');
            if(seleccionados.length > 0){
                boton.style.display = 'block';
            }else{
                boton.style.display = 'none';
            }

            // Verificar si todas las rendiciones están seleccionadas para marcar/desmarcar "enviar_todos"
            var todasSeleccionadas = true;
            checkboxes.each(function() {
                if (!this.checked) {
                    todasSeleccionadas = false;
                    return false; // break del each
                }
            });

            // Solo marcar "enviar_todos" si TODAS están seleccionadas
            enviarTodos.checked = todasSeleccionadas && checkboxes.length > 0;

            return seleccionados;
        }        function iniciarProcesoCobro() {
            // Obtener las rendiciones seleccionadas
            var rendicionesSeleccionadas = seleccionar_bonos_rendicion();

            if (rendicionesSeleccionadas.length === 0) {
                swal("Error", "Debe seleccionar al menos una rendición para iniciar el proceso de cobro.", "error");
                return;
            }

            // Confirmar acción
            swal({
                title: "¿Iniciar proceso de cobro?",
                text: "Se iniciará el proceso de cobro para " + rendicionesSeleccionadas.length + " rendición(es) seleccionada(s).",
                icon: "warning",
                buttons: {
                    cancel: "Cancelar",
                    confirm: "Confirmar"
                },
                dangerMode: false,
            }).then((confirmed) => {
                if (confirmed) {
                    // Aquí puedes agregar la lógica para procesar las rendiciones
                    console.log("Iniciando proceso de cobro para rendiciones:", rendicionesSeleccionadas);

                    // Ejemplo de llamada AJAX al backend
                    /*
                    $.ajax({
                        url: '{{ route("flujo_caja.profesional.iniciar_cobro") }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            rendiciones: rendicionesSeleccionadas
                        },
                        success: function(response) {
                            swal("¡Éxito!", "Proceso de cobro iniciado correctamente.", "success");
                            // Recargar tabla o actualizar vista
                        },
                        error: function(error) {
                            swal("Error", "Hubo un problema al iniciar el proceso de cobro.", "error");
                        }
                    });
                    */

                    // Por ahora, solo mostrar mensaje de éxito
                    swal("¡Proceso iniciado!", "El proceso de cobro ha sido iniciado para las rendiciones seleccionadas.", "success");
                }
            });
        }

    </script>
@endsection

