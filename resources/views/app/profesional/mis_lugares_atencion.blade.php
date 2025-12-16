@extends('template.profesional.template')
@section('content')

    <!--****Container Completo****-->
    <div class="pcoded-main-container">
        <div class="pcoded-content mt-top">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-2">
                            <div class="page-header-title">
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.configuracion') }}" data-toggle="tooltip" data-placement="top" title="Volver a panel de configuración">Panel de Configuración</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Mis lugares de atención</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h4 class="text-white f-20 d-inline">Mis lugares de atención</h4>
                                        <button type="button" class="btn btn-light btn-xs float-md-right d-inline" data-toggle="modal" data-target="#nuevo_lugar_atencion">
                                            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Agregar nuevo lugar de atención
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
                                                        <button type="button" class="btn btn-primary btn-sm btn-icon  accion_editar_horarios" data-toggle="modal" onclick="mi_horario_lugar_atencion({{ $l->id }})">
                                                            <i class="fas fa-clock"></i>
                                                        </button>

                                                    </td>
                                                    <td class="align-middle">
                                                        {{-- procedimientos --}}
                                                        <button type="button" class="btn btn-purple btn-sm btn-icon  accion_editar_horarios" data-toggle="modal" onclick="mi_procedimiento_lugar_atencion({{ $l->id }}, {{ $id_profesional }});">
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

    <!--Modal nuevo lugar de atención-->
    <div id="nuevo_lugar_atencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="nuevo_lugar_atencion"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nuevo_lugar_atencion_titulo">Agregar nuevo lugar de atención&nbsp;</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('profesional.agregar_centro') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Nombre</label>
                                    <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input class="form-control form-control-sm" name="rut_lugar_atencion" id="rut_lugar_atencion" type="text" onkeyup="formatoRut(this);">
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Direcci&oacute;n</label>
                                    <input class="form-control form-control-sm" name="direccion_lugar_atencion" id="direccion_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nº</label>
                                    <input class="form-control form-control-sm" name="numero_lugar_atencion" id="numero_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                    <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control form-control-sm" required>
                                        <option value="">Seleccione</option>
                                        @foreach ($region as $reg)
                                            @if (isset($region))
                                                <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select id="ciudad_agregar" name="ciudad_agregar" class="form-control form-control-sm" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group ">
                                    <label class="floating-label-activo-sm">Tipo</label>
                                    <select id="tipo_agregar_lugar_atencion" name="tipo_agregar_lugar_atencion" class="js-example-basic-single form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Centro Médico</option>
                                        <option value="2">Consulta Particular</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                    <input class="form-control form-control-sm" name="email_lugar_atencion" id="email_lugar_atencion" type="email">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                    <input class="form-control form-control-sm" name="telefono_lugar_atencion" id="telefono_lugar_atencion_1" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="notificar_pacientes" name="notificar_pacientes">
                                        <label for="notificar_pacientes" class="cr"></label>
                                        <label>Notificar a pacientes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                        <button type="submit" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal editar lugar de atención-->
    <div id="editar_lugar_atencion" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="editar_lugar_atencion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="editar_lugar_atencion_titulo">Configurar lugar de atención</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_editar_lugar_atencion">
                    <input type="hidden" name="id_lugar_atencion_modificar" id="id_lugar_atencion_modificar">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input name="editar_nombre_lugar_atencion" id="editar_nombre_lugar_atencion" type="text" val="" class="form-control form-control-sm">
                            </div>
                        </div>
                       <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Direcci&oacute;n&nbsp;/&nbsp;Calle</label>
                                <input name="editar_direccion_lugar_atencion" id="editar_direccion_lugar_atencion" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nº</label>
                                <input name="editar_numero_lugar_atencion" id="editar_numero_lugar_atencion" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                <select id="region_lugar_atencion_modificar" onchange="buscar_ciudades();" name="region_lugar_atencion_modificar" class="form-control form-control-sm" required>
                                    <option value="0">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Ciudad</label>
                                <select id="ciudad_lugar_atencion_modificar" name="ciudad_lugar_atencion_modificar" class="form-control form-control-sm" required>
                                    <option value="0">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo</label>
                                <select id="tipo_editar_lugar_atencion" name="tipo_editar_lugar_atencion" class="js-example-basic-single form-control form-control-sm">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Centro Médico</option>
                                    <option value="2">Consulta Particular</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                <input name="editar_email_lugar_atencion" id="editar_email_lugar_atencion" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                <input name="editar_telefono_lugar_atencion"  id="editar_telefono_lugar_atencion" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="notificar_pacientes_modificar" name="notificar_pacientes_modificar">
                                    <label for="notificar_pacientes_modificar" class="cr"></label>
                                    <label>Notificar a pacientes modificación</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                        <button type="button" onclick="editar_lugar_atencion();" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modal agregar lugar de atención existente-->
    <div id="modal_agregar_lugar_existente" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="agregar_lugar_existente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="">Desasociar o Agregar lugar existente</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Desasociar /Agregar</th>
                                            <th class="text-center align-middle">Nombre</th>
                                            <th class="text-center align-middle">Dirección</th>
                                            <th class="text-center align-middle">Tipo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="agregar-1" checked="">
                                                    <label for="agregar-1" class="cr"></label>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">Centro Médico ISQ</td>
                                            <td class="text-center align-middle">Villanelo,123,Viña del Mar</td>
                                            <td class="text-center align-middle">Centro Médico</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center align-middle">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="agregar-2" checked="">
                                                    <label for="agregar-2" class="cr"></label>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">Cemical</td>
                                            <td class="text-center align-middle">Papudo,123,La Ligua</td>
                                            <td class="text-center align-middle">Consulta Particular</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="not_pacientes_4">
                                    <label for="not_pacientes_4" class="cr"></label>
                                    <label>Notificar a pacientes modificación</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal editar asistentes-->
    <div id="editar_asistentes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_asistentes">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Configurar asistentes</h5>
                    <button type="button" id="cerrar_editar_asistentes" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    <div class="row" style="display: none">
                        <span><strong>Nombre: </strong></span><span id="nombre_asistente_agregar"></span>
                    </div>
                    <form id="">
                        <input type="hidden" name="mi_asistente_id_lugar_atencion" id="mi_asistente_id_lugar_atencion">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                <h6 class="text-c-blue">Escriba rut de el o la asistente que desea asociar a su lugar de atención</h6>
                            </div>
                            <div id="buscar_datos_asistente" class="col-sm-6 col-md-6 mb-3">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" placeholder="Rut de asistente" name="rut_asistente" id="rut_asistente" aria-label="Rut" aria-describedby="button-addon2" onkeyup="formatoRut(this);">
                                    <div class="input-group-append">
                                        <button class="btn btn-info" onclick="buscar_asistente($('#mi_asistente_id_lugar_atencion').val());" type="button" id="button-addon2">Asociar</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="datos_asistente" style="display: none">
                                <div class="card-informacion">
                                    <div class="card-body pb-0">
                                        <table class="table table-borderless table-xs">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Rut:</strong></td>
                                                    <td><span id="datos_rut_asistente"></span>
                                                        <input type="hidden" id="id_asistente_lugar_atencion" name="id_asistente_lugar_atencion">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Nombre:</strong></td>
                                                    <td><span id="datos_nombre_asistente"></span></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Correo Electr&oacute;nico:</strong></td>
                                                    <td id="datos_email_asistente"></td>
                                                </tr>
                                                <tr>
                                                    <td> <strong>Tel&eacute;fono:</strong></td>
                                                    <td><span id="datos_telefono_asistente"></span></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" colspan="2">
                                                        <button id="confirmar_datos_asistente" name="confirmar_datos_asistente" onclick="datos_confirmar_asistente($('#mi_asistente_id_lugar_atencion').val());" class="btn btn-info-light-c btn-xxs"><i class="feather icon-check"></i> Confirmar datos</button>
                                                        <button id="confirmar_datos_asistente_examen" name="confirmar_datos_asistente_examen" onclick="datos_confirmar_asistente_examen($('#mi_asistente_id_lugar_atencion').val());" class="btn btn-success-light-c btn-xxs"><i class="feather icon-check"></i> Confirmar y dar permiso de carga de examen</button>
                                                        <button id="limpiar_datos_asistente" name="limpiar_datos_asistente" onclick="datos_limpiar_asistente();" class="btn btn-danger-light-c btn-xxs"><i class="feather icon-x"></i> Limpiar datos</button>
                                                    <td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                <table id="mi_asistente_table" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Habilitar / Deshabilitar</th>
                                            <th>Rut</th>
                                            <th>Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer pt-2">
                    <button type="button" class="btn btn-danger btn-sm" id="cerrar_editar_asistentes1"><i class="feather icon-x"></i> Cancelar</button>
                    <button type="button" id="cerrar_editar_asistentes2" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal editar horario atencion-->
    <div id="modal_editar_horario_atencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_horario_atencion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Configurar horario de atenci&oacute;n</h5>
                    <button type="button" id="cerrar_modal_editar_horario_atencion" class="close text-white" onclick="" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="">
                        <input type="hidden" name="mi_horario_id_lugar_atencion" id="mi_horario_id_lugar_atencion">
                        <div class="form-row">
                            <div class="col-sm-12">
                                <h6 class="t-aten">Tipo de agenda</h6>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Seleccione </label>
                                    <select name="tipo_agenda_medica" id="tipo_agenda_medica" class="form-control form-control-sm" onclick="validar_tipo_agenda();">

                                        @if($profesional->id_especialidad == 2)
                                            <option value="2">Atención Dental</option>
                                        @else
                                            <option value="0">Seleccione</option>
                                            <option value="1">Atención General</option>
                                            <option value="3">Atención Telemedicina</option>
                                            <option value="4">Exámenes</option>
                                            <option value="5">Procedimiento</option>
                                        @endif

                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-sm-12">
                                <h6 class="text-c-blue mb-3">Duraci&oacute;n</h6>
                            </div> --}}

                            <div class="col-sm-12 mb-1">
                                <h6 class="t-aten">Horario de Atenci&oacute;n</h6>
                            </div>
                            {{-- <div class="col-sm-6 mb-2">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo Agenda </label>
                                    <select name="tipo_agenda_medica" id="tipo_agenda_medica" class=" form-control" onclick="validar_tipo_agenda();">
                                        <option value="0">Seleccione tipo de agenda</option>
                                        <option value="1">Atención General</option>
                                        <option value="2">Atención Dental</option>
                                        <option value="3">Atención Telemedicina</option>
                                        <option value="4">Exámenes</option>
                                        <option value="5">Procedimiento</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Duraci&oacute;n de Consultas M&eacute;dicas </label>
                                    <select name="duracion_horario" id="duracion_horario" class=" form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="00:15:00">15 minutos</option>
                                        <option value="00:30:00">30 minutos</option>
                                        <option value="00:45:00">45 minutos</option>
                                        <option value="01:00:00">60 minutos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Día de atención</label>
                                    <select name="dia_horario" id="dia_horario" class=" form-control form-control-sm">
                                        <option value="" selected>Seleccione</option>
                                        <option value="1">Lunes</option>
                                        <option value="2">Martes</option>
                                        <option value="3">Mi&eacute;rcoles</option>
                                        <option value="4">Jueves</option>
                                        <option value="5">Viernes</option>
                                        <option value="6">S&aacute;bado</option>
                                        <option value="0">Domingo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Desde </label>
                                    <select name="hora_inicio_horario" id="hora_inicio_horario" class=" form-control form-control-sm">
                                        <option value="0">Seleccione horario</option>
                                        <option value="08:00">08:00</option>
                                        <option value="08:30">08:30</option>
                                        <option value="09:00">09:00</option>
                                        <option value="09:30">09:30</option>
                                        <option value="10:00">10:00</option>
                                        <option value="10:30">10:30</option>
                                        <option value="11:00">11:00</option>
                                        <option value="11:30">11:30</option>
                                        <option value="12:00">12:00</option>
                                        <option value="12:30">12:30</option>
                                        <option value="13:00">13:00</option>
                                        <option value="13:30">13:30</option>
                                        <option value="14:00">14:00</option>
                                        <option value="14:30">14:30</option>
                                        <option value="15:00">15:00</option>
                                        <option value="15:30">15:30</option>
                                        <option value="16:00">16:00</option>
                                        <option value="16:30">16:30</option>
                                        <option value="17:00">17:00</option>
                                        <option value="17:30">17:30</option>
                                        <option value="18:00">18:00</option>
                                        <option value="18:30">18:30</option>
                                        <option value="19:00">19:00</option>
                                        <option value="19:30">19:30</option>
                                        <option value="20:00">20:00</option>
                                        <option value="20:30">20:30</option>
                                        <option value="21:00">21:00</option>
                                        <option value="21:30">21:30</option>
                                        <option value="22:00">22:00</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Hasta </label>
                                    <select name="hora_termino_horario" id="hora_termino_horario" class=" form-control form-control-sm">
                                        <option value="0">Seleccione horario</option>
                                        <option value="08:00">08:00</option>
                                        <option value="08:30">08:30</option>
                                        <option value="09:00">09:00</option>
                                        <option value="09:30">09:30</option>
                                        <option value="10:00">10:00</option>
                                        <option value="10:30">10:30</option>
                                        <option value="11:00">11:00</option>
                                        <option value="11:30">11:30</option>
                                        <option value="12:00">12:00</option>
                                        <option value="12:30">12:30</option>
                                        <option value="13:00">13:00</option>
                                        <option value="13:30">13:30</option>
                                        <option value="14:00">14:00</option>
                                        <option value="14:30">14:30</option>
                                        <option value="15:00">15:00</option>
                                        <option value="15:30">15:30</option>
                                        <option value="16:00">16:00</option>
                                        <option value="16:30">16:30</option>
                                        <option value="17:00">17:00</option>
                                        <option value="17:30">17:30</option>
                                        <option value="18:00">18:00</option>
                                        <option value="18:30">18:30</option>
                                        <option value="19:00">19:00</option>
                                        <option value="19:30">19:30</option>
                                        <option value="20:00">20:00</option>
                                        <option value="20:30">20:30</option>
                                        <option value="21:00">21:00</option>
                                        <option value="21:30">21:30</option>
                                        <option value="22:00">22:00</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-2">
                                <button type="button" onclick="mi_horario_agregar();" class="btn btn-info btn-sm float-md-right" data-dismiss="modal"><i class="fa fa-plus"></i> Agregar horario de atención</button>
                                {{-- <button type="button" id="cerrar_modal_horario2" class="btn btn-danger btn-sm">Cancelar</button> --}}
                            </div>
                            <div class="col-sm-12 mt-2 mb-2">
                                <table id="mi_horario_table" class="table table-sm">
                                    <thead>
                                        <tr>
											<th class="align-middle">Agenda</th>
                                            <th class="align-middle">Desde</th>
                                            <th class="align-middle">Hasta</th>
                                            <th class="align-middle">D&iacute;a</th>
                                            <th class="text-center align-middle">Acci&oacute;n</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="cerrar_modal_horario">Cancelar</button>
                    <button type="button" class="btn btn-info" id="cerrar_modal_horario1">Cerrar</button>
                </div>-->
            </div>
        </div>
    </div>

    <!--Modal Valores y Convenios-->
    <div id="modal_editar_valor_atencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_valor_atencion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Convenios y valores de atención médica</h5>
                    <button type="button" id="cerrar_modal_editar_valor_atencion" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_lugar_atencion_valor" id="id_lugar_atencion_valor">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                            <h6 class="t-aten">Valores de atención médica</h6>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-8 mb-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo de atención médica</label>
                                <select name="lugar_atencion_convenio" id="lugar_atencion_convenio" class=" form-control form-control-sm">
                                    <option value="">Seleccione una opción</option>
                                    <option value="En consulta médica">En consulta médica</option>
                                    <option value="Domicilio">Domicilio</option>
                                    <option value="Garantía por bono">Garantía por bono</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Valor</label>
                                <input name="valor_convenio" id="valor_convenio" type="number" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <h6 class="t-aten mb-2">Convenios</h6>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_1">
                                <label class="custom-control-label" id="text_convenio_1" for="convenio_1">Particular</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_2">
                                <label class="custom-control-label" id="text_convenio_2" for="convenio_2">Fonasa</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_3">
                                <label class="custom-control-label" id="text_convenio_3" for="convenio_3">Todas las Isapres</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_4">
                                <label class="custom-control-label" id="text_convenio_4" for="convenio_4">Banmédica</label>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_5">
                                <label class="custom-control-label" id="text_convenio_5" for="convenio_5">Colmena</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_6">
                                <label class="custom-control-label" id="text_convenio_6" for="convenio_6">Nueva Masvida</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_7">
                                <label class="custom-control-label" id="text_convenio_7" for="convenio_7">Consalud</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_8">
                                <label class="custom-control-label" id="text_convenio_8" for="convenio_8">Cruz Blanca</label>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_9">
                                <label class="custom-control-label" id="text_convenio_9" for="convenio_9">Cruz del Norte</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_10">
                                <label class="custom-control-label" id="text_convenio_10" for="convenio_10">Vida Tres</label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_11">
                                <label class="custom-control-label" id="text_convenio_11" for="convenio_11">Fundación </label>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="convenio_12">
                                <label class="custom-control-label" id="text_convenio_12" for="convenio_12">Isalud</label>
                            </div>
                        </div>
                        <div class="col-sm-12 mb-3 mt-2 text-center">
                            <button type="button" onclick="guardar_valores_lugar_atencion()" class="btn btn-info btn-sm" data-dismiss="modal"><i class="fa fa-plus"></i> Agregar convenio y valor</button>
                            <!--<button type="button" id="cerrar_convenio1" class="btn btn-danger btn-sm">Cancelar</button>-->
                        </div>
                        <div class="col-sm-12 mt-3 mb-3">
                            {{--  <table id="" class="table table-sm table-responsive">  --}}
                            <table id="tabla_valores" class="display table table-striped dt-responsive nowrap table-sm" style="100%">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Atención Médica</th>
                                        <th class="align-middle">Valor</th>
                                        <th class="align-middle">Convenios</th>
                                        <th class="align-middle">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--AÑADIR AL TD DE CONVENIOS LA CLASE "text-wrap"-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--<div class="modal-footer">
                    <button type="button" id="cerrar_convenio" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="cerrar_convenio2" class="btn btn-info">Guardar Cambios</button>
                </div>-->
            </div>
        </div>
    </div>
    <!--****Cierre Container Completo****-->

    <!--Modal procedimientos-->
    <div id="modal_agrear_editar_procedimientos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agrear_editar_procedimientos" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Procedimientos</h5>
                    <button type="button" id="cerrar_modal_editar_valor_atencion" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="cerrar_modal_agrear_editar_procedimientos();"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="modal_agrear_editar_procedimientos_id_lugar_atencion" id="modal_agrear_editar_procedimientos_id_lugar_atencion">
                    <input type="hidden" name="modal_agrear_editar_procedimientos_id_profesional" id="modal_agrear_editar_procedimientos_id_profesional">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Procedimientos</label>
                                <select name="agrear_editar_procedimientos_id_procedimiento" id="agrear_editar_procedimientos_id_procedimiento" class=" form-control form-control-sm">
                                    <option value="0">Seleccione</option>
                                    {{--  --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Minutos por bloque</label>
                                <input name="agrear_editar_procedimientos_minutos_bloque" id="agrear_editar_procedimientos_minutos_bloque" type="number" class="form-control form-control-sm" value="15" readonly>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Cantidad Bloques</label>
                                <input name="agrear_editar_procedimientos_cantidad_bloques" id="agrear_editar_procedimientos_cantidad_bloques" type="number" class="form-control form-control-sm" value="0" min="1" step="1">
                            </div>
                        </div>

                        <div class="col-sm-12 mb-3 mt-2">
                            <button type="button" onclick="registrar_mi_procedimiento_lugar_atencion()" class="btn btn-info float-md-right btn-sm"><i class="fa fa-plus"></i> Agregar convenio y valor</button>
                        </div>
                        <div class="col-sm-12 mt-3 mb-3">
                            {{--  <table id="" class="table table-sm table-responsive">  --}}
                            <table id="tabla_valores_proce_prof_lug_atencion" class="display table table-striped dt-responsive nowrap table-sm" style="100%">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Procedimiento</th>
                                        <th class="align-middle">Min/Bloque</th>
                                        <th class="align-middle">Cant. Bloque</th>
                                        <th class="align-middle">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--<div class="modal-footer">
                    <button type="button" id="cerrar_modal_agregar_editar_procedimiento" class="btn btn-danger" data-dismiss="modal" onclick="cerrar_modal_agrear_editar_procedimientos();">Cerrar</button>
                </div>-->
            </div>
        </div>
    </div>
    <!--****Cierre Container Completo****-->



@endsection

@section('page-script')
    <script>
        $(document).ready(function() {

        });
        /** modal editar_asistentes */
        function datos_confirmar_asistente(id) {

            let id_lugar_atencion = id;
            let id_asistente = $('#id_asistente_lugar_atencion').val();
            let url = "{{ route('profesional.agregar_asistente_lugar_atencion') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_lugar_atencion: id_lugar_atencion,
                    id_asistente: id_asistente
                },
            })
            .done(function(data) {
                if (data !== 'null')
                {
                    swal({
                        title: "Se ha agregado asistente al lugar de atención",
                        icon: "success",
                        buttons: "Aceptar",
                    });
                }
                else
                {
                    swal({
                        title: "Error al agregar asistente",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        };

        function datos_confirmar_asistente_examen(id) {

            let id_lugar_atencion = id;
            let id_asistente = $('#id_asistente_lugar_atencion').val();
            let url = "{{ route('profesional.agregar_asistente_lugar_atencion') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_lugar_atencion: id_lugar_atencion,
                    id_asistente: id_asistente,
                    examen:1,
                },
            })
            .done(function(data) {
                if (data !== 'null')
                {
                    swal({
                        title: "Se ha agregado asistente al lugar de atención",
                        icon: "success",
                        buttons: "Aceptar",
                    });
                }
                else
                {
                    swal({
                        title: "Error al agregar asistente",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        };
        /** fin modal editar_asistentes */

        /** modal procedimientos */
        function mi_procedimiento_lugar_atencion(id_lugar_atencion, id_profesional)
        {

            cargar_procedimientos_lugar_atencion(id_lugar_atencion);

            $('#agrear_editar_procedimientos_id_procedimiento').val(0);
            $('#agrear_editar_procedimientos_minutos_bloque').val(15);
            $('#agrear_editar_procedimientos_cantidad_bloques').val(0);

            $('#modal_agrear_editar_procedimientos').modal('show');
            cargar_tabla_procedimiento_prof_lugar_atencion(id_lugar_atencion, id_profesional);

        };

        function cargar_tabla_procedimiento_prof_lugar_atencion(id_lugar_atencion, id_profesional)
        {
            $('#tabla_valores_proce_prof_lug_atencion tbody').empty();

            let url = "{{ route('profesional.mis_procedimientos_lugar_atencion') }}";
            $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_lugar_atencion: id_lugar_atencion,
                    id_profesional: id_profesional,
                    estado: 1,
                },
            })
            .done(function(data)
            {
                if (data.estado == 1)
                {

                    $('#modal_agrear_editar_procedimientos_id_lugar_atencion').val(id_lugar_atencion);
                    $('#modal_agrear_editar_procedimientos_id_profesional').val(id_profesional);

                    $('#tabla_valores_proce_prof_lug_atencion tbody').empty();

                    $.each(data.registro, function (index, value) {
                        html ='';
                        html += '<tr>';
                        html += '    <td>'+value.nombre+'</td>';
                        html += '    <td>'+value.minutos_bloque+'</td>';
                        html += '    <td>'+value.cantidad_bloques+'</td>';
                        html += '    <td>';
                        // html += '       <button type="button" class="btn btn-info btn-sm btn-icon accion_editar_procedimiento has-ripple" data-toggle="modal" onclick="mi_procedimiento_lugar_atencion(83)">';
                        // html += '           <i class="fas fa-edit"></i><span class="ripple ripple-animate" style="height: 26px; width: 26px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: 2.9375px; left: 7px;"></span>';
                        // html += '       </button>';
                        html += '       <button type="button" class="btn btn-danger btn-sm btn-icon accion_eliminar_procedimiento has-ripple" data-toggle="modal" onclick="eliminar_procedimiento_lugar_atencion_profesional('+value.id+', '+id_lugar_atencion+', '+id_profesional+')">';
                        html += '           <i class="feather icon-trash-2"></i><span class="ripple ripple-animate" style="height: 26px; width: 26px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: 2.9375px; left: 7px;"></span>';
                        html += '       </button>';
                        html += '    </td>';
                        html += '</tr>';
                        $('#tabla_valores_proce_prof_lug_atencion tbody').append(html);
                    });


                } else {
                    console.log(resp)
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function cargar_procedimientos_lugar_atencion(id_lugar_atencion)
        {

            $('#agrear_editar_procedimientos_id_procedimiento').html('');
            let url = "{{ route('centro.procedimientos') }}";

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_lugar_atencion: id_lugar_atencion,
                    },
                })
                .done(function(data)
                {
                    console.log(data);
                    if (data.estado == 1)
                    {

                        $.each(data.registro, function (index, value) {
                            var html = '<option value="'+value.id+'">'+value.nombre+' '+value.cantidad_bloques+'Blq.</option>';
                            $('#agrear_editar_procedimientos_id_procedimiento').append(html);
                        });


                    } else {
                        console.log(resp)
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function registrar_mi_procedimiento_lugar_atencion()
        {
            let id_lugar_atencion = $('#modal_agrear_editar_procedimientos_id_lugar_atencion').val();
            let id_profesional = $('#modal_agrear_editar_procedimientos_id_profesional').val();
            let id_procedimiento = $('#agrear_editar_procedimientos_id_procedimiento').val();
            let nombre_procedimiento = $('#agrear_editar_procedimientos_id_procedimiento option:selected').text();
            let minutos_bloque = $('#agrear_editar_procedimientos_minutos_bloque').val();
            let cantidad_bloques = $('#agrear_editar_procedimientos_cantidad_bloques').val();
            let url = "{{ route('profesional.mis_procedimientos_lugar_atencion.registrar') }}";

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_lugar_atencion : id_lugar_atencion,
                        id_profesional : id_profesional,
                        id_procedimiento_centro : id_procedimiento,
                        nombre : nombre_procedimiento,
                        minutos_bloque : minutos_bloque,
                        cantidad_bloques : cantidad_bloques,
                    },
                })
                .done(function(data)
                {
                    console.log(data);
                    if (data.estado == 1)
                    {
                        cargar_tabla_procedimiento_prof_lugar_atencion(id_lugar_atencion, id_profesional);
                        swal({
                            title: "Procedimiento",
                            text: "Registro Exitoso",
                            icon: "success",
                            buttons: "Aceptar",
                        });

                    }
                    else
                    {
                        swal({
                            title: "Procedimiento",
                            text: "Falla en Registro",
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function cancelar_modal_agrear_editar_procedimientos()
        {
            $('#agrear_editar_procedimientos_id_procedimiento').val(0);
            $('#agrear_editar_procedimientos_minutos_bloque').val(15);
            $('#agrear_editar_procedimientos_cantidad_bloques').val(0);
        }

        function cerrar_modal_agrear_editar_procedimientos()
        {
            $('#modal_agrear_editar_procedimientos').modal('hide');
        }

        function eliminar_procedimiento_lugar_atencion_profesional(id, id_lugar_atencion, id_profesional)
        {
            let url = "{{ route('centro.procedimientos.eliminar') }}";
            $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id: id,
                    estado: 0,
                },
            })
            .done(function(data)
            {
                if (data.estado == 1)
                {
                    cargar_tabla_procedimiento_prof_lugar_atencion(id_lugar_atencion, id_profesional);
                    swal({
                        title: "Procedimiento",
                        text: "Eliminar",
                        icon: "success",
                        buttons: "Aceptar",
                    });

                } else {
                    swal({
                        title: "Procedimiento",
                        text: "Falla al Eliminar",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        /** fin modal procedimientos */

        /** validar tipo agenda */
        function validar_tipo_agenda()
        {
            var valor = $('#tipo_agenda_medica').val();
            if(valor == 5 || valor == 2)
            {
                $('#duracion_horario').val('00:15:00');
                $('#duracion_horario').attr('disabled', true);
            }
            else
            {
                $('#duracion_horario').val('0');
                $('#duracion_horario').attr('disabled', false);
            }
        }
        /** cierre validar tipo agenda */

        function eliminar_lugar_atencion(id)
        {
            let id_lugar_atencion = id;
            let url = "{{ route('profesional.cambio_estado_lugar_atencion') }}";


                swal({
                    title: "¿Esta seguro que desea ELIMINAR el lugar de atención?",
                    text: "Favor confirme o cancele la solicitud",
                    icon: "warning",
                    buttons: ["Cancelar", "Solicitar"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete)
                    {
                        let estado = 3;

                        $.ajax({
                            url: url,
                            type: "get",
                            data: {
                                //_token: _token,
                                id_lugar_atencion: id_lugar_atencion,
                                estado: estado
                            },
                        })
                        .done(function(data) {
                            if (data == 'ok')
                            {
                                swal({
                                    title: "Lugar de atencion ELIMINADO",
                                    icon: "success",
                                    buttons: "Aceptar",
                                    //SuccessMode: true,
                                });
                                location.reload();
                            }
                            else
                            {
                                swal({
                                    title: "Error",
                                    text: "Error al ELIMINAR el lugar de atencion",
                                    icon: "error",
                                    buttons: "Aceptar",
                                    DangerMode: true,
                                });
                            }
                        })
                        .fail(function(jqXHR, ajaxOptions, thrownError) {
                            console.log(jqXHR, ajaxOptions, thrownError)
                        });
                    }
                    else
                    {
                        swal({
                            title: "Solicitud Cancelada",
                            icon: "success",
                            buttons: "Aceptar",
                            dangerMode: true,
                        });
                    }
                });

        }
    </script>
@endsection
