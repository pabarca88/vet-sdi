@extends('template.profesional.template')
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
                                <h5 class="m-b-10 font-weight-bold">Mis exámenes</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profesional.index_receta_online') }}"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Volver a inicio de receta online">Receta Online</a></li>
                                <li class="breadcrumb-item"><a href="#">Mis exámenes</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h4 class="text-c-blue f-22">Mis exámenes</h4>
                        </div>
                        <div class="card-body">
                            <table id="tabla_examenes_profesional_ro"
                                class="display table table-striped dt-responsive nowrap table-xs"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        {{--  <th class="text-wrap text-center align-middle" hidden="hidden">Nº de Orden</th>  --}}
                                        <th class="text-wrap text-center align-middle">Fecha</th>
                                        <th class=" align-middle">Paciente</th>
                                        <th class=" align-middle">Nombre del examen</th>
                                        <th class=" align-middle">Tipo</th>
                                        {{-- <th class=" align-middle">Comentarios</th> --}}
                                        {{--<th class=" align-middle">Acción</th>--}}
                                        {{--<th class=" align-middle">Estado</th>--}}
                                        <th class=" align-middle">Examen</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (isset($examenes) && count($examenes) > 0)
                                        @foreach ($examenes as $examen)
                                            <tr>
                                                {{--  <td class="text-wrap align-middle">{{ $examen->id }}</td>  --}}
                                                <td class="text-wrap text-center align-middle" style="font-size:12px">
                                                    {{ $examen['created_at'] }}
                                                </td>

                                                <td class="align-middle" style="font-size:12px">
                                                    {{ $examen['Paciente']['nombre'] }}<br>
                                                    {{ $examen['Paciente']['rut'] }}
                                                </td>
                                                <td class="align-middle text-wrap" style="font-size:10px"><label>{{ $examen['examen'] }}</label></td>
                                                <td class="align-middle text-wrap" style="font-size:10px"><label>{{ $examen['tipo_examen'] }}</label></td>
                                                <!--<td class="align-middle text-center">
                                                    <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar Examen a Paciente"><i class="feather icon-navigation"></i></button>
                                                </td>-->
                                                 <!--<td class="align-middle text-center">Enviado</td>-->
                                               <td class="align-middle"> <div onclick="ver_pdf_orden_examenes('{{ $examen['id_ficha_atencion']  }}')" class="btn btn-success-light-c btn-xxs"><i class="feather icon-activity"></i> Ver examen</div></td>
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
    <!--Cierre: Container Completo-['
    <!--'] Modal examen profesional-->
    <!-- <div id="agregar_examen_profesional_ro" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="agregar_receta_profesional_ro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Agregar examen</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                    <!--<form id="recetas_profesional" method="POST" action="{{ route('examen_ppf.registrar') }}">
                    <form id="recetas_profesional">
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <h6 class="text-c-blue ml-2 mb-3">Ingrese los datos del examen</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <input type="hidden" value="" id="email_paciente"/>
                                <input type="hidden" value="" id="id_paciente"/>
                                <input type="hidden" value="" id="code_paciente"/>
                                <input type="hidden" value="{{ csrf_token() }}" id="_token"/>
                                <input type="hidden" value="{{ @Auth::user()->id }}" id="id_profesional"/>

                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Rut del Paciente</label>
                                        <input type="person" class="form-control" name="rut_paciente" id="rut_paciente" >
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Nombres del Paciente</label>
                                        <input type="text" class="form-control" name="nombres_paciente" id="nombres_paciente">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Apellidos del Paciente</label>
                                        <input type="text" class="form-control" name="apellidos_paciente"
                                            id="apellidos_paciente">
                                    </div>
                                </div>
                                <!--<div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label">Nombre del Examen</label>
                                        <select id="nombre_examen" name="nombre_examen" class="form-control">
                                            <option selected value="0">Seleccione una opción </option>
                                            <option>..</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Asociar a Atención de fecha:</label>
                                        <select id="id_ficha_atencion"  name="id_ficha_atencion" class="form-control">>
                                            <option value="0">Seleccione Atención</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tipo del Examen</label>
                                        <input type="text" class="form-control" name="t_examen" id="t_examen">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Nombre del Examen</label>
                                        <input type="text" class="form-control" name="n_examen" id="n_examen">
                                    </div>
                                </div>
                                <!--
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Fecha del Examen</label>
                                        <input type="date" class="form-control" name="fecha_paciente" id="fecha_paciente">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <h6 class="ml-2 mt-2">Adjuntar examen</h6>
                                        <input type="file" class="aform-control-file pb-3" id="adjuntar_examen_receta_online" onchange="convertToBase64();">
                                        <input type="hidden" value="" id="adjuntar_examen_receta_online_base64"/>
                                    </div>
                                </div>
                                <!--<div class="col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label">Comentarios</label>
                                        <textarea class="form-control" rows="1" name="comentarios_examen" id="comentarios_examen"></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-info" onclick="guardar_examen();">Guardar y Subir Examen</button>
                        <!-- <input type="submit" class="btn btn-info" value="Guardar y Subir Examen"/>
                    </div>
                 </form>
            </div>
        </div>
    </div>-->
@endsection
