@extends('template.templateBuscadorProfesionales')

@section('page-styles')
    <style>
        .titulos_tarjetas {
            font-size: 20px!important;
        }
        .btn.btn-icon {
            width: 35px!important;
            height: 35px!important;
            font-size: 15px!important;
        }
    </style>
@endsection


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
                                <h5 class="m-b-10 font-weight-bold">Reservar hora médica</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip" data-placement="top"
                                        title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="buscador_profesional_paciente.php">Reservar hora médica</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!--Buscador de profesionales-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-white bg-light">
                            <h4 class="f-22 pt-1 text-c-blue text-center">Reserve su hora médica</h4>
                            <input type="hidden" name="select_tipo_agenda" id="select_tipo_agenda" value="1,2">
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs mb-3 justify-content-center" id="Buscadores" role="tablist">
                                <li class="nav-item text-uppercase mx-3">
                                    <a class="nav-link active" onclick="$('#select_tipo_agenda').val(1);$('#div_resultado_busqueda').html('')" id="buscar_especialidad-tab" data-toggle="tab" href="#buscar_especialidad" role="tab" aria-controls="home" aria-selected="true">Especialidad</a>
                                </li>
                                <li class="nav-item text-uppercase mx-3">
                                    <a class="nav-link" onclick="$('#select_tipo_agenda').val(1);$('#div_resultado_busqueda').html('')" id="buscar_profesional-tab" data-toggle="tab" href="#buscar_profesional" role="tab" aria-controls="buscar_profesional" aria-selected="false">Profesional</a>
                                </li>
                                <li class="nav-item text-uppercase mx-3">
                                    <a class="nav-link" onclick="$('#select_tipo_agenda').val(3);$('#div_resultado_busqueda').html('')" id="buscar_videoconsulta-tab" data-toggle="tab" href="#buscar_videoconsulta" role="tab" aria-controls="buscar_videoconsulta" aria-selected="false">Videoconsulta</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="BuscadoresContent">

                                <!--Hora por especialidad-->
                                <div class="tab-pane fade show active" id="buscar_especialidad" role="tabpanel" aria-labelledby="buscar_especialidad-tab">
                                    {{--  <form>  --}}
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <h6 class="mb-4 mt-2">Ingrese los datos solicitados para buscar horas por especialidad</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Profesión</label>
                                                    <select class="form-control form-control-sm" name="buscar_especialidad_profesion" id="buscar_especialidad_profesion" onchange="buscar_tipo_especialidad(this);">
                                                        <option value="">Seleccione</option>

                                                        @if(isset($profesiones))
                                                            @foreach($profesiones as $pro_key => $pro)
                                                            @php
                                                                $selected_id1 = '';
                                                                if((int)$filtros['id_profesion']==$pro->id && (int)$filtros['id_profesion']>0)
                                                                $selected_id1 = 'selected';
                                                            @endphp
                                                                <option value="{{ $pro->id }}" {{$selected_id1}}>{{ $pro->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Especialidad</label>
                                                    <select class="form-control form-control-sm" name="buscar_especialidad_especialidad" id="buscar_especialidad_especialidad" onchange="buscar_sub_tipo_especialidad(this);">
                                                        <option value="">Seleccione</option>
                                                        @if(isset($especialidades))
                                                            @foreach($especialidades as $esp_key => $esp)
                                                            @php
                                                                $selected_id2 = '';
                                                                if($filtros['id_especialidad']==$esp->id && $filtros['id_especialidad']!=0)
                                                                $selected_id2 = 'selected';
                                                            @endphp
                                                                <option value="{{ $esp->id }}" {{$selected_id2}}>{{ $esp->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Sub-Especialidad</label>
                                                    <select class="form-control form-control-sm" name="buscar_especialidad_subespec" id="buscar_especialidad_subespec">
                                                        <option value="">Seleccione</option>
                                                        @if(isset($sub_especialidades))
                                                            @foreach($sub_especialidades as $sub_key => $sub)
                                                                @php
                                                                    $selected_id3 = '';
                                                                    if($filtros['id_subespecialidad']==$sub->id && $filtros['id_subespecialidad']!=0)
                                                                    $selected_id3 = 'selected';
                                                                @endphp
                                                                <option value="{{ $sub->id }}" {{$selected_id3}}>{{ $sub->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Región</label>
                                                    <select class="form-control form-control-sm" name="buscar_especialidad_region" id="buscar_especialidad_region" onchange="buscar_ciudad(this);">
                                                        <option value="">Seleccione</option>
                                                        @foreach($regiones as $reg_key => $reg)
                                                            <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Comuna</label>
                                                    <select class="form-control form-control-sm" name="buscar_especialidad_comuna" id="buscar_especialidad_comuna">
                                                        <option value="">Seleccione</option>
                                                        @foreach($ciudades as $ciu_key => $ciu)
                                                            <option value="{{ $ciu->id }}">{{ $ciu->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">

                                                {{-- <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="buscar_especialidad_hora24" value="1">
                                                        <label for="buscar_especialidad_hora24" class="cr"></label>
                                                    </div>
                                                    <label><strong>Buscar horas para las próx. 24 hrs</strong></label>
                                                </div> --}}
                                            </div>
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <button class="btn btn-info" type="bottom" id="btn_buscar_especialidad" onclick="buscar_profesional_especialidad();"><i class="feather icon-search"></i> Buscar horas</button>
                                            </div>
                                        </div>
                                    {{--  </form>  --}}
                                </div>

                                <!--Hora por profesional-->
                                <div class="tab-pane fade" id="buscar_profesional" role="tabpanel" aria-labelledby="buscar_profesional-tab">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <h6 class="mb-4 mt-2">Ingrese los datos solicitados para buscar horas por profesional</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Nombre o Rut del profesional</label>
                                                    <input type="text" class="form-control form-control-sm" name="buscar_profesional_dato_profesional" id="buscar_profesional_dato_profesional">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Región</label>
                                                    <select class="form-control form-control-sm" name="buscar_profesional_region" id="buscar_profesional_region" onchange="buscar_ciudad(this);">
                                                        <option value="">Seleccione</option>
                                                        @foreach($regiones as $reg_key => $reg)
                                                            <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Comuna</label>
                                                    <select class="form-control form-control-sm" name="buscar_profesional_comuna" id="buscar_profesional_comuna">
                                                        <option value="">Seleccione</option>
                                                        @foreach($ciudades as $ciu_key => $ciu)
                                                            <option value="{{ $ciu->id }}">{{ $ciu->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                             <div class="col-sm-12 col-md-4">

                                                {{-- <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="buscar_profesional_hora24" value="1">
                                                        <label for="buscar_profesional_hora24" class="cr"></label>
                                                    </div>
                                                    <label><strong>Buscar horas para las próx. 24 hrs</strong></label>
                                                </div> --}}

                                            </div>
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <button class="btn btn-info" type="button" onclick="buscar_profesional_profesional();"><i class="feather icon-search"></i> Buscar horas</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!--Hora por videoconsulta-->
                                <div class="tab-pane fade" id="buscar_videoconsulta" role="tabpanel" aria-labelledby="buscar_videoconsulta-tab">
                                    {{--  <form>  --}}
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <h6 class="mb-4 mt-2">Ingrese los datos solicitados para buscar horas por especialidad</h6>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Profesión</label>
                                                    <select class="form-control form-control-sm" name="buscar_videoconsulta_profesion" id="buscar_videoconsulta_profesion" onchange="buscar_tipo_especialidad(this);">
                                                        <option value="">Seleccione</option>

                                                        @if(isset($profesiones))
                                                            @foreach($profesiones as $pro_key => $pro)
                                                            @php
                                                                $selected_id1 = '';
                                                                if((int)$filtros['id_profesion']==$pro->id && (int)$filtros['id_profesion']>0)
                                                                $selected_id1 = 'selected';
                                                            @endphp
                                                                <option value="{{ $pro->id }}" {{$selected_id1}}>{{ $pro->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Especialidad</label>
                                                    <select class="form-control form-control-sm" name="buscar_videoconsulta_especialidad" id="buscar_videoconsulta_especialidad" onchange="buscar_sub_tipo_especialidad(this);">
                                                        <option value="">Seleccione</option>
                                                        @if(isset($especialidades))
                                                            @foreach($especialidades as $esp_key => $esp)
                                                            @php
                                                                $selected_id2 = '';
                                                                if($filtros['id_especialidad']==$esp->id && $filtros['id_especialidad']!=0)
                                                                $selected_id2 = 'selected';
                                                            @endphp
                                                                <option value="{{ $esp->id }}" {{$selected_id2}}>{{ $esp->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Sub-Especialidad</label>
                                                    <select class="form-control form-control-sm" name="buscar_videoconsulta_subespec" id="buscar_videoconsulta_subespec">
                                                        <option value="">Seleccione</option>
                                                        @if(isset($sub_especialidades))
                                                            @foreach($sub_especialidades as $sub_key => $sub)
                                                                @php
                                                                    $selected_id3 = '';
                                                                    if($filtros['id_subespecialidad']==$sub->id && $filtros['id_subespecialidad']!=0)
                                                                    $selected_id3 = 'selected';
                                                                @endphp
                                                                <option value="{{ $sub->id }}" {{$selected_id3}}>{{ $sub->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>

                                            {{-- <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Previsión</label>
                                                    <select class="form-control form-control-sm" name="prevision" id="buscar_videoconsulta_prevision">
                                                        <option value="">Seleccione</option>
                                                    </select>
                                                </div>
                                            </div> --}}

                                            <div class="col-sm-12 col-md-4">
                                                {{-- <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="buscar_videoconsulta_hora24" value="1">
                                                        <label for="buscar_videoconsulta_hora24" class="cr"></label>
                                                    </div>
                                                    <label><strong>Buscar horas para las próx. 24 hrs</strong></label>
                                                </div> --}}
                                            </div>
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <button class="btn btn-info" type="bottom" id="btn_buscar_especialidad_video_consulta" onclick="buscar_profesional_especialidad_video_consulta();"><i class="feather icon-search"></i> Buscar horas</button>
                                            </div>
                                        </div>
                                    {{--  </form>  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="div_resultado_busqueda">
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->

    <!--Modals buscador -->
    @include("app.general.buscador_profesionales.modals.ficha_profesional")
    @include("app.general.buscador_profesionales.modals.reservar_hora")

@endsection


@section('page-script')
    <script>
     @if( $filtros['id_profesion'] !=0 && $filtros['id_especialidad'] !=0 )
        buscar_profesional_especialidad();
     @endif
    </script>
@endsection
