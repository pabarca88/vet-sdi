{{-- @extends('layouts.templateFlujoCaja') --}}
@extends('template.laboratorio.laboratorio_profesional.template')
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
                                <h5 class="m-b-10 font-weight-bold">Rendir caja diaria</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Flujo de caja</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->

            <div class="row">
                <div class="col-sm-12">
                    <div class="user-profile user-card pt-0 mt-2">
                        <div class="card-body py-0">
                            <div class="user-about-block m-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                            @if (isset($es_institucion))
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset active" id="tab_redicion_cm-tab" data-toggle="tab" href="#tab_redicion_cm" role="tab" aria-controls="tab_redicion_cm" aria-selected="true">Rendición a Laboratorio</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset" id="tab_redicion_prof-tab" data-toggle="tab" href="#tab_redicion_prof" role="tab" aria-controls="tab_redicion_prof" aria-selected="true">Rendición a profesional</a>
                                                </li>
                                            @else
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset active" id="tab_redicion_prof-tab" data-toggle="tab" href="#tab_redicion_prof" role="tab" aria-controls="tab_redicion_prof" aria-selected="true">Rendición a profesional</a>
                                                </li>
                                            @endif


                                            <li class="nav-item">
                                                <a class="nav-link text-reset" id="tab_recepcion_programas-tab" data-toggle="tab" href="#tab_recepcion_programas" role="tab" aria-controls="tab_recepcion_programas" aria-selected="true">Recepción de programas</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="tab-content mt-4" id="pills-tabContent">
                        {{-- PESTAÑA RENDICION DE CAJA CM--}}
                        <div class="tab-pane fade show active " id="tab_redicion_cm" role="tabpanel" aria-labelledby="tab_redicion_cm-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                     <h5 class="text-c-blue f-18 pt-1">Rendir caja del {{ date('d-m-Y') }}</h5>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                @if(isset($lista_bonos))
                                                <input type="hidden" name="lista_bonos" id="lista_bonos" value="{{ $lista_bonos }}">
                                                @endif
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxxl-1">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Nº de Bonos</label>
                                                            <input type="number" class="form-control form-control-sm" id="numero_bonos" name="numero_bonos" value="{{ isset($total_bonos) ? $total_bonos : '' }}" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxxl-1">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Efectivo</label>
                                                            <input type="number" class="form-control form-control-sm" id="efectivo" name="efectivo" value="{{ isset($total_efectivo) ? $total_efectivo : '' }}" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxxl-1">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Otros</label>
                                                            <input type="number" class="form-control form-control-sm" id="otros" name="otros" value="{{ isset($total_otros) ? $total_otros : '' }}" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxxl-1">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Total documentos</label>
                                                            <input type="number" class="form-control form-control-sm" id="total" name="total" value="{{ isset($total) ? $total : '' }}" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 col-xxxl-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Recibe caja</label>
                                                            <select name="id_asistente_receptor" id="id_asistente_receptor" class="form-control form-control-sm">
                                                                <option value="0">Seleccione</option>
                                                                @if(isset($listado_recibe))
                                                                    @foreach ( $listado_recibe as $recibe )
                                                                        <option value="{{ $recibe->id }}">{{ strtoupper($recibe->nombre.' '.$recibe->apellido_uno.' '.$recibe->apellido_dos) }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 col-xxx-3">
                                                        <div class="form-group">
                                                            <label class="floating-label-activo-sm">Observaciones</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="observaciones_rendicion" id="observaciones_rendicion"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxxl-1">
                                                         <button class="btn btn-block btn-sm btn-outline-primary" onclick="$('#up_archivo_cm').toggle();"> <i class="feather icon-upload"></i> Subir archivo</button>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxxl-1">
                                                        <button class="btn btn-block btn-sm btn-info" onclick="rendir_caja();" id="btn_rendicion_caja_diaria"><i class="feather icon-check"></i> Rendir caja</button>
                                                    </div>
                                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxx-1">
                                                        <button class="btn btn-block btn-sm btn-outline-secondary" onclick="generar_pdf_rendicion_cm();" id="btn_rendicion_caja_diaria"><i class="feather icon-check"></i> Generar PDF</button>
                                                    </div>
                                                    <div id="up_archivo_cm" style="display:none" class="col-sm-12 col-md-12">
                                                        <input type="hidden" name="input_lista_archivo" id="input_lista_archivo" value="">
                                                        <div class="form-row">
                                                            <div class="form-group col-12">
                                                                <!-- [ Main Content ] start -->
                                                                <div class="dropzone" id="mis-archivos-rendicion" action="{{ route('rendir.archivo.carga') }}">
                                                                </div>
                                                                <!-- [ file-upload ] end -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-group">
                                                        <label for="" class="floating-label-activo-sm">Fecha</label>
                                                        <input type="date" value="<?php echo date('Y-m-d'); ?>" id="fecha_rendicion" class="form-control form-control-sm">
                                                    </div>
                                                    <button type="button" class="btn btn-outline-success btn-sm mt-3 w-100" onclick="buscarRendicion()"><i class="fas fa-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-10 col-xl-10">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="tabla_rendir_caja" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="align-middle">Tipo</th>
                                                                    <th class="align-middle">Código</th>
                                                                    <th class="align-middle">Convenio</th>
                                                                    <th class="align-middle">Tipo pago</th>
                                                                    <th class="align-middle">Aporte seguros</th>
                                                                    <th class="align-middle">Aporte convenio</th>

                                                                    <th class="align-middle">Copago paciente</th>
                                                                    <th class="align-middle">Valor total</th>
                                                                    <th class="align-middle">F/Atención</th>
                                                                    <th class="align-middle">Paciente</th>
                                                                    <th class="align-middle">Profesional</th>
                                                                    <th class="align-middle">Responsable</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if( isset($bono) )
                                                                    @foreach($bono as $key_b => $value_b)
                                                                        <tr >
                                                                            <td class="align-middle">{{ $value_b->TipoBono()->first()->nombre }}</td>
                                                                            <td class="align-middle">{{ $value_b->numero_bono }}</td>
                                                                            <td class="align-middle">{{ $value_b->Convenio()->first()->nombre }}</td>
                                                                            <td class="align-middle">
                                                                                @if($value_b->id_clase_bono == 1)
                                                                                    Emitido por la institución
                                                                                 @elseif($value_b->id_clase_bono == 2)
                                                                                    Control sin costo
                                                                                {{--@elseif($value_b->id_clase_bono == 3)
                                                                                    Caja Vecina
                                                                                @elseif($value_b->id_clase_bono == 4)
                                                                                    Bono Web
                                                                                @elseif($value_b->id_clase_bono == 5)
                                                                                    Bono Web Pre-Pago --}}
                                                                                @elseif($value_b->id_clase_bono == 6)
                                                                                    Particular
                                                                                @elseif($value_b->id_clase_bono == 8)
                                                                                    Garantía
                                                                                @elseif($value_b->id_clase_bono == 9)
                                                                                    Bono físico
                                                                                @else
                                                                                    Otro
                                                                                @endif
                                                                            </td>
                                                                            <td class="align-middle">@if($value_b->id_clase_bono != 6) ${{ number_format($value_b->aporte_seguro,0,',','.') }} <button class="btn btn-outline-success btn-xxs" data-toggle="tooltip" data-placement="top" title="Pago mediante: Efectivo, Tarjeta"><i class="fas fa-search"></i></button> @else $0  @endif </td>
                                                                            <td>${{ number_format($value_b->bonificacion,0,',','.') }}</td>
                                                                            <td class="align-middle">${{ number_format($value_b->valor_atencion, 0, ",", ".") }} <button class="btn btn-outline-success btn-xxs" data-toggle="tooltip" data-placement="top" title="Pago mediante: Efectivo, Tarjeta"><i class="fas fa-search"></i></button> </td>
                                                                            <td class="align-middle">${{ number_format($value_b->a_pagar,0,',','.') }}</td>


                                                                            <td class="align-middle">{{ $value_b->fecha_atencion }}</td>


                                                                            <td class="align-middle">
                                                                                <span>{{ $value_b->Paciente()->first()->nombres }} {{ $value_b->Paciente()->first()->apellido_uno }} {{ $value_b->Paciente()->first()->apellido_dos }}</span><br>
                                                                                <span>{{ $value_b->Paciente()->first()->rut }}</span>
                                                                            </td>

                                                                            <td class="align-middle">
                                                                                <span>{{ $value_b->Profesional()->first()->nombres }} {{ $value_b->Profesional()->first()->apellido_uno }} {{ $value_b->Profesional()->first()->apellido_dos }}</span><br>
                                                                                <span>{{ $value_b->Profesional()->first()->rut }}</span>
                                                                            </td>
                                                                            <td class="align-middle">{{ $value_b->responsable }}</td>
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



                        {{-- PESTAÑA RENDICION DE CAJA A PROFESIONAL --}}
                        <div class="tab-pane fade" id="tab_redicion_prof" role="tabpanel" aria-labelledby="tab_redicion_prof-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h5 class="text-c-blue f-18 pt-1">Rendir caja a Profesional del {{ date('d-m-Y') }}</h5>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-row">
                                                <input type="hidden" name="lista_bonos_prof" id="lista_bonos_prof" value="">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Nº de bonos</label>
                                                                <input type="number" class="form-control form-control-sm" id="numero_bonos_prof" name="numero_bonos_prof" value="" readonly="readonly">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Efectivo</label>
                                                                <input type="number" class="form-control form-control-sm" id="efectivo_prof" name="efectivo_prof" value="" readonly="readonly">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Otros</label>
                                                                <input type="number" class="form-control form-control-sm" id="otros_prof" name="otros_prof" value="" readonly="readonly">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-1 col-xxx-1">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Total documentos</label>
                                                                <input type="number" class="form-control form-control-sm" id="total_prof" name="total_prof" value="" readonly="readonly">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 col-xxx-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Recibe caja</label>
                                                                <select name="id_asistente_receptor_prof" id="id_asistente_receptor_prof" class="form-control form-control-sm" onclick="cargar_registros_prof();">
                                                                    <option value="0">Seleccione</option>
                                                                    @if(isset($listado_recibe_prof))
                                                                        @foreach ( $listado_recibe_prof as $recibe )
                                                                            <option value="{{ $recibe->id }}">{{ strtoupper($recibe->nombre.' '.$recibe->apellido_uno).' ('.$recibe->rut.')' }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-6 col-lg-3 col-xl-3 col-xxl-3 col-xxx-3">
                                                            <div class="form-group">
                                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxx-1">
                                                            <button class="btn btn-block btn-sm btn-outline-primary" onclick="$('#up_archivo_prof').toggle();"> <i class="feather icon-upload"></i> Subir archivo</button>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxx-1">
                                                            <button class="btn btn-block btn-sm btn-info" onclick="rendir_caja_prof();" id="btn_rendicion_caja_diaria"><i class="feather icon-check"></i> Rendir Caja</button>
                                                        </div>
                                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 col-xxl-1 col-xxx-1">
                                                            <button class="btn btn-block btn-sm btn-outline-secondary" onclick="generar_pdf_rendicion_prof();" id="btn_rendicion_caja_diaria"><i class="feather icon-check"></i> Generar PDF</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-12 col-xxl-12 col-xxxl-12">
                                                            <div id="up_archivo_prof" style="display:none" >
                                                                <input type="hidden" name="input_lista_archivo_prof" id="input_lista_archivo_prof" value="">
                                                                <div class="form-row">
                                                                    <div class="form-group col-12">
                                                                        <!-- [ Main Content ] start -->
                                                                        <div class="dropzone" id="mis-archivos-rendicion-prof" action="{{ route('rendir.archivo.carga') }}">
                                                                        </div>
                                                                        <!-- [ file-upload ] end -->
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
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="tabla_rendir_caja_prof" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="align-middle">Tipo</th>
                                                                    <th class="align-middle">Código</th>
                                                                    <th class="align-middle">Convenio</th>
                                                                    <th class="align-middle">Tipo pago</th>
                                                                    <th class="align-middle">Aporte seguros</th>
                                                                    <th class="align-middle">Aporte convenio</th>
                                                                    <th class="align-middle">Copago paciente</th>
                                                                    <th class="align-middle">Valor total</th>
                                                                    <th class="align-middle">F/Atención</th>
                                                                    <th class="align-middle">Paciente</th>
                                                                    <th class="align-middle">Profesional</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
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

                        {{-- PESTAÑA RENDICION PROGRAMAS DE CAJA A PROFESIONAL --}}
                        <div class="tab-pane fade" id="tab_recepcion_programas" role="tabpanel" aria-labelledby="tab_recepcion_programas-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h5 class="text-c-blue f-18 pt-1">Recepción de programas del {{ date('d-m-Y') }}</h5>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxxl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="dt-responsive table-responsive">
                                                        <table id="tabla_rendir_caja" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th class="align-middle">Tipo</th>
                                                                    <th class="align-middle">Código</th>
                                                                    <th class="align-middle">Convenio</th>
                                                                    <th class="align-middle">Tipo Bono</th>
                                                                    <th class="align-middle">Aporte Convenio</th>
                                                                    <th class="align-middle">Aporte Seguros</th>
                                                                    <th class="align-middle">Copago Paciente</th>
                                                                    <th class="align-middle">Valor total</th>
                                                                    <th class="align-middle">F/Atención</th>
                                                                    <th class="align-middle">Paciente</th>
                                                                    <th class="align-middle">Profesional</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @if( isset($bono) )
                                                                    @foreach($bono as $key_b => $value_b)
                                                                        <tr >
                                                                            <td class="align-middle text-center">{{ $value_b->TipoBono()->first()->nombre }}</td>
                                                                            <td class="align-middle text-center">{{ $value_b->numero_bono }}</td>
                                                                            <td class="align-middle text-center">{{ $value_b->Convenio()->first()->nombre }}</td>
                                                                            <td class="align-middle text-center">
                                                                                @if($value_b->id_clase_bono == 1)
                                                                                    Bono Fisico
                                                                                @elseif($value_b->id_clase_bono == 2)
                                                                                    Sencillito
                                                                                @elseif($value_b->id_clase_bono == 3)
                                                                                    Caja Vecina
                                                                                @elseif($value_b->id_clase_bono == 4)
                                                                                    Bono Web
                                                                                @elseif($value_b->id_clase_bono == 5)
                                                                                    Bono Web Pre-Pago
                                                                                @elseif($value_b->id_clase_bono == 6)
                                                                                    Particular
                                                                                @else
                                                                                    Otro
                                                                                @endif
                                                                            </td>
                                                                            <td></td>

                                                                            <td></td>
                                                                            <td class="align-middle text-center"><button class="btn btn-outline-success btn-sm"><i class="fas fa-search"></i></button> </td>
                                                                            <td class="align-middle text-center">${{ number_format($value_b->valor_atencion, 2, ",", ".") }}</td>
                                                                            <td class="align-middle text-center">{{ $value_b->fecha_atencion }}</td>


                                                                            <td class="align-middle text-center">
                                                                                <span>{{ $value_b->Paciente()->first()->nombres }} {{ $value_b->Paciente()->first()->apellido_uno }} {{ $value_b->Paciente()->first()->apellido_dos }}</span><br>
                                                                                <span>{{ $value_b->Paciente()->first()->rut }}</span>
                                                                            </td>

                                                                            <td class="align-middle text-center">
                                                                                <span>{{ $value_b->Profesional()->first()->nombres }} {{ $value_b->Profesional()->first()->apellido_uno }} {{ $value_b->Profesional()->first()->apellido_dos }}</span><br>
                                                                                <span>{{ $value_b->Profesional()->first()->rut }}</span>
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
</div>

<input type="hidden" name="numero_rendicion_hidde" id="numero_rendicion_hidde" value="">
<input type="hidden" name="id_profesional" id="id_profesional" value="">
    <!--Cierre: Container Completo-->
@endsection

@section('modales')
    {{-- @include('page.flujo_cajas.asistente_cm_publico.modales.modal_rendicion_caja_diaria') --}}
    @include('app.general.asistente.flujo_caja.modal.modal_rendicion_caja_diaria')
    {{-- @include('page.flujo_cajas.asistente_cm_publico.modales.modal_consulta_agenda') --}}
    {{-- @include('app.general.asistente.flujo_caja.modal.modal_consulta_agenda') --}}
@endsection

@section('page-script')
  <script>
    $('#up_archivo_cm').click(function(){
            $('#upload_archivo_cm').toggle();
        });
    </script>

    <script>
            let clase_bono = ['Bono Fisico' ,'Sencillito' ,'Caja Vecina' ,'Bono Web' ,'Bono Web Pre-Pago' ,'Particular'];
            var tiempo = 0; // CANTIDAD MINUTOS A ESPERAR PARA APROBACION
            var conteo_activo = 0; // valida si conteo esta activo

            $(document).ready(function(){
                $('#id_asistente_receptor').select2();
                $('#id_asistente_receptor_prof').select2();
                $('#id_asistente_receptor_prof').on('select2:select', function (e) {
                    cargar_registros_prof(); // tu función
                });
                $('#tabla_rendir_caja').DataTable({
                    responsive: true,
                });
                $('#tabla_rendir_caja_prof').DataTable({
                    responsive: true,
                });
                //cargar_registros();
                cargar_registros_prof();
            });

            function seleccionar_bonos_rendicion(){
                var estado  = $('#enviar_todos').is(':checked')
                $("input:checkbox").each(function() {
                    if($(this).attr('id') != 'enviar_todos')
                    {
                        if(estado != $(this).is(':checked'))
                        {
                            $(this).trigger('click');
                        }
                    }
                });
            }

            function cargar_flujo_caja() {
                var fecha = {{ date('Y-m-d') }};
                var convenio = $('#rinde_convenio').val();
                var estado_consulta = $('#rinde_estado_consulta').val();

                let url = "{{ route('flujo_caja.data_flujo_caja') }}";

                $.ajax({
                        url: url,
                        type: "GET",
                        data: {
                            fecha : fecha,
                            convenio : convenio,
                            estado_consulta : estado_consulta,
                        },
                    })
                    .done(function(data) {

                        console.log(data);
                        if (data.estado == 1)
                        {
                            $('#tabla_rendir_caja tbody').html('');
                            for (i = 0; i < data.registros.length; i++) {

                                var j = 1; //contador para asignar id al boton que borrara la fila
                                var fila = '';
                                fila += '<tr >';
                                fila += '    <td class="align-middle text-center">'+ data.registros[i].tipo_bono.nombre+'</td>';
                                fila += '    <td class="align-middle text-center">'+ data.registros[i].numero_bono+'</td>';
                                fila += '    <td class="align-middle text-center">'+ data.registros[i].numero_bono+'</td>';
                                fila += '    <td class="align-middle text-center">'+ data.registros[i].convenio.nombre+'</td>';
                                fila += '    <td class="align-middle text-center">'+ data.registros[i].fecha_atencion+'</td>';
                                fila += '    <td class="align-middle text-center">';
                                fila += '        <span>'+ data.registros[i].paciente.nombres+' '+ data.registros[i].paciente.apellido_uno+' '+ data.registros[i].paciente.apellido_dos+'</span><br>';
                                fila += '        <span>'+ data.registros[i].paciente.rut +'</span>';
                                fila += '    </td>';
                                fila += '    <td class="align-middle text-center">$'+ data.registros[i].valor_atencion +'</td>';
                                fila += '    <td class="align-middle text-center">'+ data.registros[i].parametro.valor +'</td>';
                                fila += '    <td class="align-middle text-center">'+ data.registros[i].profesional.nombre+' '+ data.registros[i].profesional.apellido_uno+' '+ data.registros[i].profesional.apellido_dos+'</td>';
                                fila += '    {{--  <td class="align-middle text-center">{{ $value_b->observaciones }}</td>  --}}';
                                fila += '    <td class="align-middle text-center">';
                                fila += '        <div class="form-group">';
                                fila += '            <div class="switch switch-success d-inline m-r-10">';
                                fila += '                <input type="checkbox" id="rendir_caja_'+ data.registros[i].id +'">';
                                fila += '                <label for="rendir_caja_'+ data.registros[i].id +'"';
                                fila += '                    class="cr"></label>';
                                fila += '            </div>';
                                fila += '        </div>';
                                fila += '    </td>';
                                fila += '</tr>';
                                j++;

                                $('#tabla_rendir_caja tbody').append(fila);

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

            function rendir_caja()
            {
                let url = "{{ route('asistentecm.solicitar_rendir_caja') }}";

                $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            bonos : $('#lista_bonos').val(),
                            id_asistente_receptor : $('#id_asistente_receptor').val(),
                            archivos : $('#input_lista_archivo').val(),
                            observaciones : $('#observaciones_rendicion').val(),
                        },
                    })
                    .done(function(data) {

                        console.log(data);
                        if (data.estado == 1)
                        {
                            $('#numero_rendicion_hidde').val(data.last_id);
                            $('#numero_rendicion').html(data.last_id);
                            $('#nombre_receptor').html(data.registro.asistente_receptor.nombres+' '+data.registro.asistente_receptor.apellido_uno+' '+data.registro.asistente_receptor.apellido_dos);
                            $('#total_documento').html(data.registro.total_documentos);
                            $('#total_bonos').html(data.registro.total_bono);
                            $('#total_efectivo').html(data.registro.total_efectivo);
                            $('#total_otros').html(data.registro.total_otros);

                            $('#aprobacion').html('En Espera de Aprobación <span id="aprobacion_tiempo"></span>');

                            $('#rendicion_caja_diaria').modal('show',{backdrop: 'static', keyboard: false});

                            tiempo = data.autorizacion.tiempo;
                            console.log(data.autorizacion);
                            conteo_activo = 1;
                            validar_rendicion();
                        }
                        else
                        {
                            swal({
                                title: "Solicitud de Rendicion con Problema",
                                text: data.msj,
                                icon: "error",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            });
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            }

            function cerrarModalRendicion()
            {
                swal({
                    title: "Rendición Diaria.",
                    text: 'Al "Aceptar" cierra la ventana sin Esperar Aprobación del receptor.',
                    icon: "warning",
                    buttons: ["Aceptar", 'Cancelar'],
                }).then((result) => {
                    if (result == true)
                    {
                        console.log('regresar');
                    } else {

                        $('#rendicion_caja_diaria').modal('hide');
                    }
                })
            }

            /** actualizar pagina */
            function actualizar_registros()
            {
                let url = "{{ route('asistentecm.rendir') }}";
                document.reload(url);
            }

            function validar_rendicion()
            {
                $('#aprobacion_tiempo').html(''+tiempo+' minutos');
                console.log(tiempo);
                console.log(conteo_activo);
                if(tiempo > 0 && conteo_activo == 1)
                {
                    setTimeout(function(){
                        tiempo = tiempo-1;
                        $('#aprobacion_tiempo').html(''+tiempo+' minutos');
                        var value_validacion = 0;

                        var id_rendicion = $('#numero_rendicion_hidde').val()
                        let url = "{{ route('asistentecm.rendir_caja_validar_autorizacion') }}";

                        $.ajax({
                                url: url,
                                type: "POST",
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    id_rendicion : id_rendicion,
                                },
                            })
                            .done(function(data) {
                                console.log('success validar rendicion');
                                console.log(data);
                                if (data.estado == 1)
                                {
                                    if(data.registro.estado == 0)
                                    {
                                        console.log('espera aprobacion');
                                    }
                                    else
                                    {
                                        $('#numero_rendicion_hidde').val('');
                                        $('#numero_rendicion').html('');
                                        $('#nombre_receptor').html('');
                                        $('#total_documento').html('');
                                        $('#total_bonos').html('');
                                        $('#total_efectivo').html('');
                                        $('#total_otros').html('');
                                        $('#input_lista_archivo').html('');
                                        //myDropzone_rendicion_prof.removeAllFiles();

                                        $('#aprobacion').html('En Espera de Aprobación <span id="aprobacion_tiempo"></span>');
                                        $('#rendicion_caja_diaria').modal('hide');

                                        tiempo = 0;
                                        conteo_activo = 0;

                                        if(data.registro.estado == 1)
                                        {
                                            swal({
                                                title: "Solicitud de Rendicion.",
                                                text: "Rendicion Aceptada conforme",
                                                icon: "success",
                                                buttons: "Aceptar",
                                                // DangerMode: true,
                                            });

                                            console.log('confirmado');
                                            value_validacion = 1;
                                            cargar_registros();
                                            cargar_registros_prof()
                                            return false;
                                        }
                                        else if(data.registro.estado == 2)
                                        {
                                            swal({
                                                title: "Solicitud de Rendicion.",
                                                text: "Autorizaión Vencida",
                                                icon: "success",
                                                buttons: "Aceptar",
                                                // DangerMode: true,
                                            });
                                        }
                                        else if(data.registro.estado == 3)
                                        {
                                            swal({
                                                title: "Solicitud de Rendicion.",
                                                text: "Autorizaión Rechazada",
                                                icon: "error",
                                                buttons: "Aceptar",
                                                // DangerMode: true,
                                            });
                                        }
                                    }
                                }
                                else
                                {
                                    swal({
                                        title: "Solicitud de Rendicion con Problema",
                                        text: data.msj,
                                        icon: "error",
                                        buttons: "Aceptar",
                                        // DangerMode: true,
                                    });
                                }

                                validar_rendicion(tiempo);
                                if(tiempo == 8)
                                {
                                    swal({
                                        title: "Solicitud de Rendicion",
                                        text: 'El tiempo para Autorizar Rendición esta por finalizar, Desea continuar presione el botón "Más Tiempo", si "Acepta" la Rendición quedará Anulada y debera realizarla de nuevo.',
                                        icon: "warning",
                                        buttons: ["Aceptar", 'Más Tiempo'],
                                    }).then((result) => {
                                        if (result == true)
                                        {
                                            reiniciar_rendicion( $('#numero_rendicion_hidde').val());
                                        }
                                    });
                                }

                            })
                            .fail(function(jqXHR, ajaxOptions, thrownError) {
                                console.log(jqXHR, ajaxOptions, thrownError)
                            });
                    }, 10000);// 600 = 1seg |  60000 = 1 minutos | 10000 = 10 seg | 600000 = 10 minutos
                }
                else
                {
                    conteo_activo = 0;
                    $('#aprobacion').html('Se a finalizado el tiempo para la aprobación, debe realizar la rendicion nuevamente');
                    console.log('desistir rendicion');
                    desistir_rendicion();
                }
            }

            function desistir_rendicion()
            {
                var id_rendicion = $('#numero_rendicion_hidde').val();

                let url = "{{ route('asistentecm.rendicion_caja_desistir') }}";

                $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id_rendicion : id_rendicion
                        },
                    })
                    .done(function(data) {

                        console.log(data);
                        if (data.estado == 1)
                        {
                            $('#numero_rendicion_hidde').val('');
                            $('#numero_rendicion').html('');
                            $('#nombre_receptor').html('');
                            $('#total_documento').html('');
                            $('#total_bonos').html('');
                            $('#total_efectivo').html('');
                            $('#total_otros').html('');

                            $('#aprobacion').html('En Espera de Aprobación <span id="aprobacion_tiempo"></span>');

                            $('#rendicion_caja_diaria').modal('hide');

                            tiempo = 0;
                            conteo_activo = 0;

                            swal({
                                title: "Solicitud de Rendicion.",
                                text: "Codigo no recibido a tiempo",
                                icon: "error",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            });
                        }
                        else
                        {
                            swal({
                                title: "Falla Solicitud de Rendicion, Autorizacion no recibido a tiempo",
                                text: data.msj,
                                icon: "error",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            });
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            }

            function reiniciar_rendicion(id_rendicion)
            {
                let url = "{{ route('asistentecm.rendicion_caja_extender_validacion') }}";

                $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id_rendicion : id_rendicion
                        },
                    })
                    .done(function(data) {

                        console.log(data);
                        if (data.estado == 1)
                        {
                            tiempo = data.autorizacion.tiempo;
                            conteo_activo = 1;
                            validar_rendicion();
                        }
                        else
                        {
                            swal({
                                title: "Falla Solicitud de Rendicion Desistida",
                                text: data.msj,
                                icon: "error",
                                buttons: "Aceptar",
                                // DangerMode: true,
                            });
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            }

            function cargar_registros()
            {
                    let url = "{{ route('asistentecm.rendicion_carga_bonos') }}";

                    $.ajax({
                            url: url,
                            type: "GET",
                            data: {},
                        })
                        .done(function(data) {

                            console.log(data);
                            if (data.estado == 1)
                            {

                                $('#numero_bonos').val(data.total_bonos);
                                $('#efectivo').val(data.total_efectivo);
                                $('#otros').val(data.total_otros);
                                $('#total').val(data.total);

                                // var lista_bonos = '';
                                $('#tabla_rendir_caja tbody').html('');
                                $(data.bonos).each(function(index, value) { // indice, valor
                                    var html = '';
                                    let clase_bono = ['','Bono Fisico','Sencillito','Caja Vecina','Bono Web','Bono Web Pre-Pago','Particular','Otro'];
                                    html +='<tr >';
                                    html +='    <td class="align-middle text-center">'+value.TipoBono.nombre+'</td>';
                                    html +='    <td class="align-middle text-center">'+value.numero_bono+'</td>';
                                    html +='    <td class="align-middle text-center">'+clase_bono[value.id_clase_bono]+'</td>';
                                    html +='    <td class="align-middle text-center">'+value.Convenio.nombre+'</td>';
                                    html +='    <td class="align-middle text-center">'+value.fecha_atencion+'</td>';
                                    html +='    <td class="align-middle text-center">';
                                    html +='        <span>'+value.Paciente.nombres+' '+value.Paciente.apellido_uno+' '+value.Paciente.apellido_dos+'</span><br>';
                                    html +='        <span>'+value.Paciente.rut+'</span>';
                                    html +='    </td>';
                                    html +='    <td class="align-middle text-center">'+$.number( value.valor_atencion, 2, ',' )+'</td>';
                                    html +='    <td class="align-middle text-center">';
                                    html +='        <span>'+value.Profesional.nombres+' '+value.Profesional.apellido_uno+' '+value.Profesional.apellido_dos+'</span><br>';
                                    html +='        <span>'+value.Profesional.rut+'</span>';
                                    html +='    </td>';
                                    html +='</tr>';
                                    $('#tabla_rendir_caja tbody').append(html);
                                    // lista_bonos +='|'+value.id+'' ;
                                });

                                $('#tabla_rendir_caja').DataTable().destroy();
                                $('#tabla_rendir_caja').DataTable({
                                    responsive: true,
                                });

                                $('#lista_bonos').val(data.lista_bonos)

                            }
                            else
                            {
                                swal({
                                    title: "Problemas al cargar bonos del día",
                                    text: data.msj,
                                    icon: "error",
                                    buttons: "Aceptar",
                                    // DangerMode: true,
                                });
                                return '0';
                            }

                        })
                        .fail(function(jqXHR, ajaxOptions, thrownError) {
                            console.log(jqXHR, ajaxOptions, thrownError)
                        });
            }

            /** MANEJO DE ARCHIVO */
            // mis-archivos-rendicion
            var myDropzone_rendicion ;
            Dropzone.options.misArchivosRendicion = {
                init:function()
                {
                    myDropzone_rendicion = this;
                },
                url: "{{ route('rendir.archivo.carga') }}",
                method: 'post',
                createImageThumbnails: true,
                addRemoveLinks: true,
                headers:{
                    'X-CSRF-TOKEN' : CSRF_TOKEN,
                    // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
                },

                acceptedFiles: "application/pdf, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, text/csv",
                maxFilesize: 4,
                maxFiles: 6,
                /** El texto utilizado antes de que se eliminen los archivos. */
                dictDefaultMessage: "Arrastre un Archivo PDF, XLS o CSV al recuadro para subirlo.",

                /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
                dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

                /**
                 * El texto que se agregará antes del formulario alternativo.
                 * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
                 * ser ignorado.
                 */
                dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

                /**
                 * Si el tamaño del archivo es demasiado grande.
                 * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
                 */
                 dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

                /** Si el archivo no coincide con el tipo de archivo. */
                dictInvalidFileType: "No puedes subir archivos de este tipo.",

                /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
                dictCancelUpload: "Cancelar carga",

                /** El texto que se muestra si una carga se canceló manualmente */
                dictUploadCanceled: "Subida cancelada.",

                /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
                dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

                /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
                dictRemoveFile: "Eliminar archivo",

                /**
                 * Se muestra si `maxFiles` es st y se excede.
                 */
                dictMaxFilesExceeded: "No puede cargar más archivos.",

                // accept(file, done) {
                //     console.log('-------------accept-----------------------');
                //     cargar_lista_archivo();
                //     return done();
                // },
                success: function(file, response){
                    // console.log('-------------success-----------------------');
                    cargar_lista_archivo(myDropzone_rendicion, 'rendicion', 'input_lista_archivo');

                    if (file.previewElement) {
                        return file.previewElement.classList.add("dz-success");
                    }
                },
                error(file, message) {
                    // console.log('-------------error-----------------------');
                    if (file.previewElement) {
                        file.previewElement.classList.add("dz-error");
                        if (typeof message !== "string" && message.error)
                        {
                            message = message.error;
                        }
                        else
                        {
                            message = message.message;
                        }
                        for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                            node.textContent = message;
                        }
                    }
                },
                removedfile(file) {
                    // console.log('-------------removedfile-----------------------');
                    cargar_lista_archivo(myDropzone_rendicion, 'rendicion', 'input_lista_archivo');
                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    }
                    return this._updateMaxFilesReachedClass();
                },
                canceled: function canceled(file) {
                    cargar_lista_archivo(myDropzone_rendicion, 'rendicion', 'input_lista_archivo');
                    return this.emit("error", file, this.options.dictUploadCanceled);
                },
            };

            var lista_archivo = {};
            function cargar_lista_archivo(obj_dropzone, alias_archivo, input)
            {
                // console.log('--------------cargar_lista_archivo----------------------');
                lista_archivo = [];
                let temp  = obj_dropzone.getAcceptedFiles();
                $.each(temp, function( index, value )
                {
                    if(value.status == "success")
                    {
                        if(value.xhr !== undefined)
                        {
                            var archivo_temp = JSON.parse(value.xhr.response);
                            lista_archivo[index] = [
                                url = archivo_temp.archivo.url,
                                nombre_original = archivo_temp.archivo.original_file_name,
                                nombre_archivo = archivo_temp.archivo.nombre_archivo,
                                file_extension = archivo_temp.archivo.file_extension,
                            ];
                            $('#'+input).val('');
                            $('#'+input).val(JSON.stringify(lista_archivo));
                        }
                    }
                });
            }

            function abrir_venta_bono(){
                console.log('abrir venta bono');
                $('#consulta').modal('show');
            }

            // ************ PROFESIONALES ************
            /** MANEJO DE ARCHIVO */
            // mis-archivos-rendicion-prof
            var myDropzone_rendicion_prof ;
            Dropzone.options.misArchivosRendicionProf = {
                init:function()
                {
                    myDropzone_rendicion_prof = this;
                },
                url: "{{ route('rendir.archivo.carga') }}",
                method: 'post',
                createImageThumbnails: true,
                addRemoveLinks: true,
                headers:{
                    'X-CSRF-TOKEN' : CSRF_TOKEN,
                    // 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
                },

                acceptedFiles: "application/pdf, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, text/csv",
                maxFilesize: 4,
                maxFiles: 6,
                /** El texto utilizado antes de que se eliminen los archivos. */
                dictDefaultMessage: "Arrastre un Archivo PDF, XLS o CSV al recuadro para subirlo.",

                /** El texto que reemplaza el texto del mensaje predeterminado si el navegador no es compatible. */
                dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",

                /**
                 * El texto que se agregará antes del formulario alternativo.
                 * Si usted mismo proporciona un elemento alternativo, o si esta opción es `nula`, esto
                 * ser ignorado.
                 */
                dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",

                /**
                 * Si el tamaño del archivo es demasiado grande.
                 * `{ {filesize} }` y `{ {maxFilesize} }` serán reemplazados con los respectivos valores de configuración.
                 */
                 dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",

                /** Si el archivo no coincide con el tipo de archivo. */
                dictInvalidFileType: "No puedes subir archivos de este tipo.",

                /** Si `addRemoveLinks` es verdadero, el texto que se usará para cancelar el enlace de carga. */
                dictCancelUpload: "Cancelar carga",

                /** El texto que se muestra si una carga se canceló manualmente */
                dictUploadCanceled: "Subida cancelada.",

                /** Si `addRemoveLinks` es verdadero, el texto que se utilizará para la confirmación al cancelar la carga. */
                dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",

                /** Si `addRemoveLinks` es verdadero, el texto que se usará para eliminar un archivo. */
                dictRemoveFile: "Eliminar archivo",

                /**
                 * Se muestra si `maxFiles` es st y se excede.
                 */
                dictMaxFilesExceeded: "No puede cargar más archivos.",

                // accept(file, done) {
                //     console.log('-------------accept-----------------------');
                //     cargar_lista_archivo();
                //     return done();
                // },
                success: function(file, response){
                    // console.log('-------------success-----------------------');
                    cargar_lista_archivo(myDropzone_rendicion_prof, 'rendicion', 'input_lista_archivo_prof');

                    if (file.previewElement) {
                        return file.previewElement.classList.add("dz-success");
                    }
                },
                error(file, message) {
                    // console.log('-------------error-----------------------');
                    if (file.previewElement) {
                        file.previewElement.classList.add("dz-error");
                        if (typeof message !== "string" && message.error)
                        {
                            message = message.error;
                        }
                        else
                        {
                            message = message.message;
                        }
                        for (let node of file.previewElement.querySelectorAll( "[data-dz-errormessage]" )) {
                            node.textContent = message;
                        }
                    }
                },
                removedfile(file) {
                    // console.log('-------------removedfile-----------------------');
                    cargar_lista_archivo(myDropzone_rendicion_prof, 'rendicion', 'input_lista_archivo_prof');
                    if (file.previewElement != null && file.previewElement.parentNode != null) {
                        file.previewElement.parentNode.removeChild(file.previewElement);
                    }
                    return this._updateMaxFilesReachedClass();
                },
                canceled: function canceled(file) {
                    cargar_lista_archivo(myDropzone_rendicion_prof, 'rendicion', 'input_lista_archivo_prof');
                    return this.emit("error", file, this.options.dictUploadCanceled);
                },
            };

            function seleccionar_bono_prof()
            {
                var lista = [];
                $('.id_check_bono').each(function(key, elemento){
                    if( $(elemento).prop('checked') ) {
                        lista.push($(elemento).attr('data-id'));
                    }
                });

                $('#lista_bonos_prof').val(lista.join("|"));

                console.log($('#lista_bonos_prof').val());
            }

            function cargar_registros_prof()
            {
                let url = "{{ route('asistentecm.rendicion_carga_bonos') }}";
                $('#tabla_rendir_caja').DataTable();
                $('#tabla_rendir_caja_prof').DataTable().destroy();
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        'id_profesional': $('#id_asistente_receptor_prof').val()
                    },
                })
                .done(function(data) {

                    console.log(data);
                    if (data.estado == 1)
                    {

                        $('#numero_bonos_prof').val(data.total_bonos);
                        $('#efectivo_prof').val(data.total_efectivo);
                        $('#otros_prof').val(data.total_otros);
                        $('#total_prof').val(data.total);


                        $('#tabla_rendir_caja_prof tbody').html('');

                        for (var i = 0; i < data.bono.length; i++) {

                            var fila = '';
                            fila += '<tr>';
                            fila += '    <td class="align-middle text-center">' + data.bono[i].tipo_bono.nombre + '</td>';
                            fila += '    <td class="align-middle text-center">' + data.bono[i].numero_bono + '</td>';
                            fila += '    <td class="align-middle text-center">' + data.bono[i].convenio.nombre + '</td>';
                            fila += '    <td class="align-middle text-center">' + (data.bono[i].id_clase_bono || '') + '</td>';
                            fila += '    <td class="align-middle text-center">$' + (data.bono[i].aporte_seguro || 0) + '</td>';
                            fila += '    <td class="align-middle text-center">$' + (data.bono[i].bonificacion || 0) + '</td>';

                            fila += '    <td class="align-middle text-center">$' + (data.bono[i].valor_atencion || 0) + '</td>';
                            fila += '    <td class="align-middle text-center">$' + (data.bono[i].a_pagar || data.bono[i].valor_atencion) + '</td>';
                            fila += '    <td class="align-middle text-center">' + data.bono[i].fecha_atencion + '</td>';
                            fila += '    <td class="align-middle text-center">';
                            fila += '        <span>' + data.bono[i].paciente.nombres + ' ' + data.bono[i].paciente.apellido_uno + ' ' + data.bono[i].paciente.apellido_dos + '</span><br>';
                            fila += '        <span>' + data.bono[i].paciente.rut + '</span>';
                            fila += '    </td>';
                            fila += '    <td class="align-middle text-center">';
                            fila += '        <span>' + data.bono[i].profesional.nombre + ' ' + data.bono[i].profesional.apellido_uno + ' ' + data.bono[i].profesional.apellido_dos + '</span>';
                            fila += '    </td>';
                            fila += '</tr>';

                            $('#tabla_rendir_caja_prof tbody').append(fila);
                        }

                        // Reactivar el DataTable
                        $('#tabla_rendir_caja_prof').DataTable({
                            responsive: true,
                            destroy: true // importante para evitar errores si recargas la tabla
                        });



                        $('#lista_bonos_prof').val(data.lista_bonos)

                    }
                    else
                    {
                        swal({
                            title: "Problemas al cargar bonos del día",
                            text: data.msj,
                            icon: "error",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        });
                        return '0';
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }

            function rendir_caja_prof()
            {
                let url = "{{ route('asistentecm.solicitar_rendir_caja.prof') }}";

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        bonos : $('#lista_bonos_prof').val(),
                        id_asistente_receptor : $('#id_asistente_receptor_prof').val(),
                        archivos : $('#input_lista_archivo_prof').val(),
                    },
                })
                .done(function(data) {

                    console.log(data);
                    if (data.estado == 1)
                    {
                        $('#numero_rendicion_hidde').val(data.last_id);
                        $('#numero_rendicion').html(data.last_id);
                        $('#nombre_receptor').html(data.registro.profesional_receptor.nombres+' '+data.registro.profesional_receptor.apellido_uno+' '+data.registro.profesional_receptor.apellido_dos);
                        $('#total_documento').html(data.registro.total_documentos);
                        $('#total_bonos').html(data.registro.total_bono);
                        $('#total_efectivo').html(data.registro.total_efectivo);
                        $('#total_otros').html(data.registro.total_otros);

                        $('#aprobacion').html('En Espera de Aprobación <span id="aprobacion_tiempo"></span>');

                        $('#rendicion_caja_diaria').modal('show',{backdrop: 'static', keyboard: false});
                        console.log(data.autorizacion);
                        tiempo = data.autorizacion.tiempo;
                        conteo_activo = 1;
                        validar_rendicion();
                    }
                    else
                    {
                        swal({
                            title: "Solicitud de Rendicion con Problema",
                            text: data.msj,
                            icon: "error",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }

            function generar_pdf_rendicion_cm(){
                let url = "{{ route('asistentecm.pdf_bonos_cm_dia') }}";

                $.ajax({
                    url: url,
                    type: "get",
                })
                .done(function(data) {
                     console.log(data);
                    // Abrir el PDF en una ventana emergente
                    var width = 800;
                    var height = 600;
                    var left = (screen.width - width) / 2;
                    var top = (screen.height - height) / 2;
                    window.open(data.ruta, 'Rendición Caja', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError);
                    swal({
                        title: "Error al generar PDF Rendición Caja",
                        text: jqXHR.responseJSON.error || 'Intente nuevamente, si el problema persiste contacte al administrador',
                        icon: "error",
                        buttons: "Aceptar",
                        // DangerMode: true,
                    });
                });
            }

            function generar_pdf_rendicion_prof(){
                let id_profesional = $('#id_asistente_receptor_prof').val();
                let url = "{{ url('flujo_caja/caja/pdf/bonos/prof/dia') }}"+"/"+id_profesional;

                $.ajax({
                    url: url,
                    type: "get",
                })
                .done(function(data) {
                     console.log(data);
                   // Abrir el PDF en una ventana emergente
                   var width = 800;
                            var height = 600;
                            var left = (screen.width - width) / 2;
                            var top = (screen.height - height) / 2;
                            window.open(data.ruta, 'Rendición Caja', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }

            function buscarRendicion(){
                console.log('buscarRendicion');
                let url = "{{ route('asistentecm.rendicion_carga_bonos_fecha') }}";
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        'fecha': $('#fecha_rendicion').val()
                    },
                })
                .done(function(data) {
                    console.log(data);
                    if (data.estado == 1)
                    {

                        $('#numero_bonos').val(data.total_bonos);
                        $('#efectivo').val(data.total_efectivo);
                        $('#otros').val(data.total_otros);
                        $('#total').val(data.total);


                        $('#tabla_rendir_caja tbody').html('');

                        for (var i = 0; i < data.bono.length; i++) {
                            // formatear numero con separador de miles
                            var numeroBono = data.bono[i].numero_bono.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            var valorAtencion = data.bono[i].valor_atencion.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            var a_pagar = data.bono[i].a_pagar.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            var aporte_convenio = data.bono[i].aporte_seguro.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            var bonificacion = data.bono[i].bonificacion.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

                            var fila = '';
                            fila += '<tr>';
                            fila += '    <td class="align-middle text-center">' + data.bono[i].tipo_bono.nombre + '</td>';
                            fila += '    <td class="align-middle text-center">' + numeroBono + '</td>';
                            fila += '    <td class="align-middle text-center">' + data.bono[i].convenio.nombre + '</td>';
                            fila += '    <td class="align-middle text-center">' + (data.bono[i].tipo || '') + '</td>';
                            fila += '    <td class="align-middle text-center">$' + (aporte_convenio || 0) + '</td>';
                            fila += '    <td class="align-middle text-center">$' + (bonificacion || 0) + '</td>';

                            fila += '    <td class="align-middle text-center">$' + (valorAtencion || 0) + '</td>';
                            fila += '    <td class="align-middle text-center">$' + (a_pagar || valorAtencion) + '</td>';
                            fila += '    <td class="align-middle text-center">' + data.bono[i].fecha_atencion + '</td>';

                            fila += '</tr>';

                            $('#tabla_rendir_caja tbody').append(fila);
                        }

                        $('#lista_bonos').val(data.lista_bonos)

                    }
                    else
                    {
                        swal({
                            title: "Problemas al cargar bonos del día",
                            text: data.msj,
                            icon: "error",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        });
                        return '0';
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
        </script>
    @endsection
