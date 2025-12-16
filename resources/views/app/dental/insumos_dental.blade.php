@extends('template.dental.template')
@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>Registro de atención dental</strong></h5>
                                <p class="font-italic mt-0 mb-0 text-white">
                                    @php
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        $fecha = \Carbon\Carbon::parse(now());
                                        $mes = $meses[($fecha->format('n')) - 1];
                                        $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                    @endphp
                                    {{ $fecha }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
            </div>
            <!-- CIERRE HEADER -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h4 class="text-white f-20 d-inline">Insumos dentales</h4>
                                        <button type="button" class="btn btn-light btn-xs float-md-right d-inline" data-toggle="modal" data-target="#nuevos_insumos_dentales">
                                            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Agregar nuevos insumos
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                @if (isset($mensaje))
                                    <span class="alert alert-warning"> {{ $mensaje }}</span>
                                @endif
                            </div>
                            <table id="tabla_lugares_atencion"
                                class="display table table-striped dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Nombre</th>
                                        <th class="align-middle">Dirección</th>
                                        <th class="align-middle">Tipo</th>
                                        <th class="align-middle">Contacto</th>
                                        <th class="align-middle">Editar</th>
                                        <th class="align-middle">Asistentes</th>
                                        <th class="align-middle">Horarios</th>
                                        <th class="align-middle">Procedimientos</th>
                                        <th class="align-middle">Convenios y Valores</th>
                                        <th class="align-middle">Deshabilitar</th>
                                        <th class="align-middle">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- {{ dd($lugares) }} --}}
                                    @if (isset($lugares))
                                        @foreach ($lugares as $l)
                                            @if ($l->pivot->estado !== 3)
                                                <tr>
                                                    <td class="align-middle">{{ $l->nombre }}</td>
                                                    <td class="align-middle">
                                                        <span>{{ $l->Direccion()->first()->direccion . ' ' . $l->Direccion()->first()->numero_dir }}</span><br>
                                                        <span>{{ $l->Direccion()->first()->Ciudad()->first()->nombre }}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        @if ($l->tipo == 1)
                                                            Centro Medico
                                                        @else
                                                            Particular
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">
                                                        <span>{{ $l->email }}</span><br>
                                                        <span>{{ $l->telefono }}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        {{-- editar lugar atencion --}}
                                                        <button type="button" class="btn btn-info btn-sm btn-icon  accion_editar_lugar_atencion" data-toggle="modal" onclick="ver_lugar_atencion({{ $l->id }});" data-target="#editar_lugar_atencion" title="Editar lugar de atención">
                                                            <i class="feather icon-edit"></i>
                                                        </button>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        {{-- ver asistente lugar de atencion --}}
                                                        <button type="button" class="btn btn-warning btn-sm btn-icon  accion_asistentes" onclick="mi_asistente_lugar_atencion({{ $l->id }})" data-toggle="tooltip" data-placement="top" title="Configurar">
                                                            <i class="feather icon-user"></i>
                                                        </button>
                                                    </td>
                                                    <td class="align-middle">
                                                        {{-- horario --}}
                                                        <button type="button" class="btn btn-info btn-sm btn-icon  accion_editar_horarios" data-toggle="modal" onclick="mi_horario_lugar_atencion({{ $l->id }})">
                                                            <i class="fas fa-clock"></i>
                                                        </button>

                                                    </td>
                                                    <td class="align-middle">
                                                        {{-- procedimientos --}}
                                                        <button type="button" class="btn btn-info btn-sm btn-icon  accion_editar_horarios" data-toggle="modal" onclick="mi_procedimiento_lugar_atencion({{ $l->id }}, {{ $id_profesional }});">
                                                            <i class="fas fa-procedures"></i>
                                                        </button>

                                                    </td>
                                                    <td class="align-middle">
                                                        {{-- valores de lugar de atencion --}}
                                                        <button type="button" class="btn btn-success btn-sm btn-icon accion_editar_valores" data-toggle="modal" onclick="mis_valores_lugar_atencion({{ $l->id }})" title="Configurar">
                                                            <i class="fas fa-dollar-sign"></i>
                                                        </button>
                                                    </td>

                                                    <td>
                                                        {{-- estado de lugar de atencion --}}
                                                        @if ($l->pivot->estado == '1')
                                                            <div class="align-middle">
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" onclick="cambio_estado_lugar_atencion({{ $l->id }})" id="estado_lugar_atencion_{{ $l->id }}" checked="true">
                                                                    <label for="estado_lugar_atencion_{{ $l->id }}" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="align-middle">
                                                                <div class="switch switch-success d-inline m-r-10">
                                                                    <input type="checkbox" onclick="cambio_estado_lugar_atencion({{ $l->id }})" id="estado_lugar_atencion_{{ $l->id }}">
                                                                    <label for="estado_lugar_atencion_{{ $l->id }}" class="cr"></label>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    </td>

                                                    <td>
                                                        {{-- eliminar de lugar de atencion --}}

                                                        <div class="align-middle">
                                                            <button type="button" class="btn btn-danger btn-sm btn-icon accion_editar_valores" data-toggle="modal" onclick="eliminar_lugar_atencion({{ $l->id }})" title="Eliminar">
                                                                <i class="feather icon-x"></i>
                                                            </button>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endif
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

@include('app.dental.modals.atencion_general.formularios_generales.insumos_dentales')
@endsection
