@extends('template.profesional.template')
@section('content')
    <!--****Container Completo****-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Mis lugares de atención</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a mi escritorio"><i
                                            class="feather       icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profesional.configuracion') }}"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Volver a panel de configuración">Panel de configuración</a></li>
                                <li class="breadcrumb-item"><a href="#">Mis lugares de
                                        atención</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="row">
                                <div class="col-md-6 pt-2">
                                    <h4 class="text-white f-20">Mis lugares de atención</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-right">
                                        <div class="btn-group mb-2 mr-2">
                                            <button type="button" class="btn btn-sm btn-outline-light" data-toggle="modal"
                                                data-target="#nuevo_lugar_atencion">
                                                <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Agregar nuevo lugar de atención
                                            </button>
                                        </div>
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
                            <div style="overflow-x:auto;"></div>
                                <div class="table-responsive">
                                    <table id="tabla_lugares_atencion"
                                        class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Dirección</th>
                                                <th>Tipo</th>
                                                <th>Contacto</th>
                                                <th>Editar</th>
                                                <th>Asistentes</th>
                                                <th>Horarios</th>
                                                <th>Convenios y Valores</th>
                                                <th>Deshabilitar</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            {{-- {{ dd($lugares) }} --}}
                                            @if (isset($lugares))
                                                @foreach ($lugares as $l)
                                                    <tr>
                                                        <td>{{ $l->nombre }}</td>
                                                        <td>
                                                            <span>{{ $l->Direccion()->first()->direccion . ' ' . $l->Direccion()->first()->numero_dir }}</span><br>
                                                            <span>{{ $l->Direccion()->first()->Ciudad()->first()->nombre }}</span>
                                                        </td>
                                                        <td>
                                                            @if ($l->tipo == 1)
                                                                Centro Medico
                                                            @else
                                                                Particular
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span>{{ $l->email }}</span><br>
                                                            <span>{{ $l->telefono }}</span>
                                                        </td>
                                                        <td>
                                                            <!--Botón Modal-->

                                                            <button type="button"
                                                                class="btn btn-info btn-sm btn-icon  accion_editar_lugar_atencion"
                                                                data-toggle="modal"
                                                                onclick="ver_lugar_atencion({{ $l->id }});"
                                                                data-target="#editar_lugar_atencion" title="Editar Lugar Atención">
                                                                <i class="feather icon-home"></i>
                                                            </button>


                                                        </td>
                                                        <td>
                                                            <!--Botón Modal-->
                                                            <button type="button"
                                                                class="btn btn-warning btn-sm btn-icon  accion_asistentes"
                                                                onclick="mi_asistente_lugar_atencion({{ $l->id }})"
                                                                data-toggle="tooltip" data-placement="top" title="Configurar"><i
                                                                    class="feather icon-user"></i></button>
                                                        </td>
                                                        <td>
                                                            <!--Botón Modal-->

                                                            <button type="button"
                                                                class="btn btn-info btn-sm btn-icon  accion_editar_horarios"
                                                                data-toggle="modal"
                                                                onclick="mi_horario_lugar_atencion({{ $l->id }})">
                                                                <i class="feather icon-clock"></i>
                                                            </button>

                                                        </td>
                                                        <td>
                                                            <!--Botón Modal-->
                                                            <button type="button"
                                                                class="btn btn-success btn-sm btn-icon accion_editar_valores"
                                                                data-toggle="modal"
                                                                onclick="mis_valores_lugar_atencion({{ $l->id }})"
                                                                title="Configurar"><i class="fas fa-dollar-sign"></i></button>
                                                        </td>

                                                        <td>
                                                            @if ($l->pivot->estado == '1')
                                                                <div>
                                                                    <div class="switch switch-success d-inline m-r-10">
                                                                        <input type="checkbox"
                                                                            onclick="cambio_estado_lugar_atencion({{ $l->id }})"
                                                                            id="estado_lugar_atencion_{{ $l->id }}"
                                                                            checked="true">
                                                                        <label for="estado_lugar_atencion_{{ $l->id }}"
                                                                            class="cr">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div>
                                                                    <div class="switch switch-success d-inline m-r-10">
                                                                        <input type="checkbox"
                                                                            onclick="cambio_estado_lugar_atencion({{ $l->id }})"
                                                                            id="estado_lugar_atencion_{{ $l->id }}">
                                                                        <label for="estado_lugar_atencion_{{ $l->id }}"
                                                                            class="cr">
                                                                        </label>
                                                                    </div>
                                                                </div>
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

    <!--Modal nuevo lugar de atención-->
    <div id="nuevo_lugar_atencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="nuevo_lugar_atencion"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nuevo_lugar_atencion_titulo">Agregar nuevo lugar de
                        atención&nbsp;</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('profesional.agregar_centro') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Nombre</label>
                                    <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Rut</label>
                                    <input class="form-control form-control-sm" name="rut_lugar_atencion" id="rut_lugar_atencion" type="text" onkeyup="formatoRut(this);">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="floating-label">Direcci&oacute;n</label>
                                    <input class="form-control form-control-sm" name="direccion_lugar_atencion"
                                        id="direccion_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="floating-label">Depto. | Ofic.</label>
                                    <input class="form-control form-control-sm" name="numero_lugar_atencion" id="numero_lugar_atencion"
                                        type="text">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                    <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar"
                                        class="form-control form-control-sm" required>
                                        <option value="">Seleccione una Regi&oacute;n</option>
                                        @foreach ($region as $reg)
                                            @if (isset($region))
                                                <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select id="ciudad_agregar" name="ciudad_agregar" class="form-control form-control-sm" required>
                                        <option value=""></option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <label class="floating-label-activo-sm">Tipo</label>
                                    <select id="tipo_agregar_lugar_atencion" name="tipo_agregar_lugar_atencion"
                                        class="js-example-basic-single form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Centro Médico</option>
                                        <option value="2">Consulta Particular</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Correo Electr&oacute;nico</label>
                                    <input class="form-control form-control-sm" name="email_lugar_atencion" id="email_lugar_atencion"
                                        type="email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Tel&eacute;fono</label>
                                    <input class="form-control form-control-sm" name="telefono_lugar_atencion"
                                        id="telefono_lugar_atencion_1" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
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
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="form_editar_lugar_atencion">
                        <input type="hidden" name="id_lugar_atencion_modificar" id="id_lugar_atencion_modificar">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Nombre</label>
                                    <input name="editar_nombre_lugar_atencion" placeholder="Ingrese Nombre"
                                        id="editar_nombre_lugar_atencion" type="text" val="" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label class="floating-label">Direcci&oacute;n&nbsp;/&nbsp;Calle</label>
                                    <input name="editar_direccion_lugar_atencion" placeholder="Ingrese Direcci&oacute;n"
                                        id="editar_direccion_lugar_atencion" type="text" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="floating-label">Depto. | Ofic.</label>
                                    <input name="editar_numero_lugar_atencion" placeholder="Ingrese n&uacute;mero"id="editar_numero_lugar_atencion" type="text" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Regi&oacute;n</label>
                                    <select id="region_lugar_atencion_modificar" onchange="buscar_ciudades();"
                                        name="region_lugar_atencion_modificar" class="form-control form-control-sm" required>
                                        <option value="0">Seleccione</option>

                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select id="ciudad_lugar_atencion_modificar" name="ciudad_lugar_atencion_modificar"
                                        class="form-control form-control-sm" required>
                                        <option value="0">Seleccione</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo</label>
                                    <select id="tipo_editar_lugar_atencion" name="tipo_editar_lugar_atencion"
                                        class="js-example-basic-single form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Centro Médico</option>
                                        <option value="2">Consulta Particular</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Correo Electr&oacute;nico</label>
                                    <input name="editar_email_lugar_atencion" placeholder="Ingrese Email"
                                        id="editar_email_lugar_atencion" type="text" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tel&eacute;fono</label>
                                    <input name="editar_telefono_lugar_atencion" placeholder="Ingrese Tel&eacute;fono"
                                        id="editar_telefono_lugar_atencion" type="text" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="notificar_pacientes_modificar"
                                            name="notificar_pacientes_modificar">
                                        <label for="notificar_pacientes_modificar" class="cr"></label>
                                        <label>Notificar a pacientes modificación</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                 <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                    <button type="button" onclick="editar_lugar_atencion();" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal agregar lugar de atención existente-->
    <div id="modal_agregar_lugar_existente" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="agregar_lugar_existente" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="">Desasociar o agregar lugar existente</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Desasociar /Agregar</th>
                                            <th>Nombre</th>
                                            <th>Dirección</th>
                                            <th>Tipo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="agregar-1" checked="">
                                                    <label for="agregar-1" class="cr"></label>
                                                </div>
                                            </td>
                                            <td>Centro Médico ISQ</td>
                                            <td>Villanelo,123,Viña del Mar</td>
                                            <td>Centro Médico</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="agregar-2" checked="">
                                                    <label for="agregar-2" class="cr"></label>
                                                </div>
                                            </td>
                                            <td>Cemical</td>
                                            <td>Papudo,123,La Ligua</td>
                                            <td>Consulta Particular</td>
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
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                    <button type="submit" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar cambios</button>
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
                    <button type="button" id="cerrar_editar_asistentes" class="close text-white" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row" style="display: none">
                        <span><strong>Nombre: </strong></span><span id="nombre_asistente_agregar"></span>
                    </div>
                    <form id="">
                        <input type="hidden" name="mi_asistente_id_lugar_atencion" id="mi_asistente_id_lugar_atencion">
                        <div class="row">
                            <div class="col-sm-12 mb-2">
                                <h6 class="text-c-blue">Escriba rut de el o la asistente que desea asociar a su lugar de
                                    atención</h6>
                            </div>
                            <div id="buscar_datos_asistente" class="col-sm-6 col-md-6 mb-3">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control form-control-sm" placeholder="Rut" name="rut_asistente" id="rut_asistente" aria-label="Rut" aria-describedby="button-addon2" onkeyup="formatoRut(this);">
                                    &nbsp;&nbsp;
                                    <div class="input-group-append">
                                        <button class="btn btn-success"
                                            {{--  @if (isset($l)) onclick="buscar_asistente({{ $l->id }});" @endif  --}}
                                            onclick="buscar_asistente($('#mi_asistente_id_lugar_atencion').val());"
                                            type="button" id="button-addon2">Asociar</button>
                                    </div>

                                </div>
                            </div>

                            <div>
                                <table class="table table-borderless table-xs" id="datos_asistente" style="display: none">
                                    <tbody>
                                        <tr>

                                            <td><strong>Rut:</strong></td>
                                            <td><span id="datos_rut_asistente"></span>
                                                <input type="hidden" id="id_asistente_lugar_atencion"
                                                    name="id_asistente_lugar_atencion">
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
                                            <th scope="row" colspan="2">
                                                <button id="confirmar_datos_asistente" name="confirmar_datos_asistente"
                                                    @if (isset($l)) onclick="datos_confirmar_asistente({{ $l->id }});" @endif
                                                    class="btn btn-success btn-sm">Confirmar
                                                    Datos</button>
                                                <button id="limpiar_datos_asistente" name="limpiar_datos_asistente"
                                                    onclick="datos_limpiar_asistente();"
                                                    class="btn btn-info btn-sm">Limpiar
                                                    Datos</button>
                                            <td>
                                            </td>

                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12 mb-3">
                                <table id="mi_asistente_table"
                                    class="display table table-striped table-hover dt-responsive nowrap btn-sm"
                                    style="width:100%">
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
    <div id="modal_editar_horario_atencion" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="editar_horario_atencion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Configurar horario de
                        atenci&oacute;n</h5>
                    <button type="button" id="cerrar_modal_editar_horario_atencion" class="close text-white" onclick=""
                        data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="mi_horario_id_lugar_atencion" id="mi_horario_id_lugar_atencion">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h6 class="text-c-blue mb-3">Duraci&oacute;n de consultas m&eacute;dicas</h6>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                <div class="form-group fill">
                                    <label class="floating-label">Tiempo</label>
                                    <select name="duracion_horario" id="duracion_horario" class=" form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="00:15:00">15 minutos</option>
                                        <option value="00:30:00">30 minutos</option>
                                        <option value="00:45:00">45 minutos</option>
                                        <option value="01:00:00">60 minutos</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h6 class="text-c-blue mb-3">Horarios y días de atenci&oacute;n</h6>
                            </div>
                            <div class="col-sm-6 col-md-6 col-md-6 col-xl-6 mb-2">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo agenda </label>
                                    <select name="tipo_agenda_medica" id="tipo_agenda_medica" class=" form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Atención general</option>
                                        <option value="2">Atención dental</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-md-6 col-xl-6 mb-2">
                                <div class="form-group">
                                    <label class="floating-label">Día </label>
                                    <select name="dia_horario" id="dia_horario" class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Lunes</option>
                                        <option value="2">Martes</option>
                                        <option value="3">Mi&eacute;rcoles</option>
                                        <option value="4">Jueves</option>
                                        <option value="5">Viernes</option>
                                        <option value="6">S&aacute;bado</option>
                                        <option value="7">Domingo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-md-6 col-xl-6 mb-2">
                                <div class="form-group fill">
                                    <label class="floating-label">Desde </label>
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
                            <div class="col-sm-6 col-md-6 col-md-6 col-xl-6 mb-2">
                                <div class="form-group fill">
                                    <label class="floating-label">Hasta </label>
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

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2 text-center">
                                <button type="button" onclick="mi_horario_agregar();" class="btn btn-info btn-sm"
                                    data-dismiss="modal">Agregar horario de
                                    atención</button>
                                {{-- <button type="button" id="cerrar_modal_horario2"
                                    class="btn btn-danger btn-sm">Cancelar</button> --}}
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2 mb-2">
                                <table id="mi_horario_table" class="table table-xs text-left">
                                    <thead>
                                        <tr>
                                            <th>Desde</th>
                                            <th>Hasta</th>
                                            <th>D&iacute;a</th>
                                            <th>Acci&oacute;n</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" id="cerrar_modal_horario"><i class="feather icon-x"></i> Cancelar</button>
                    <button type="button" class="btn btn-info btn-sm" id="cerrar_modal_horario1"><i class="feather icon-save"></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Valores y Convenios-->
    <div id="modal_editar_valor_atencion" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="editar_valor_atencion" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Convenios y Valores de atención médica</h5>
                    <button type="button" id="cerrar_modal_editar_valor_atencion" class="close text-white"
                        data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="">
                        <input type="hidden" name="id_lugar_atencion_valor" id="id_lugar_atencion_valor">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="text-c-blue mb-3">Valores de atención médica</h6>
                            </div>
                            <div class="col-sm-8 mb-2">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo de atención médica</label>
                                    <select name="lugar_atencion_convenio" id="lugar_atencion_convenio"
                                        class=" form-control form-control-sm">
                                        <option value="">Seleccione una opción</option>
                                        {{--  <option value="Particular">Particular</option>  --}}
                                        <option value="En consulta médica">En consulta médica</option>
                                        <option value="Domicilio">Domicilio</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-2">
                                <div class="form-group fill">
                                    <label class="floating-label">Valor</label>
                                    <input name="valor_convenio" id="valor_convenio" type="number" class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <h6 class="text-c-blue mb-2">Convenios</h6>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="convenio_1">
                                    <label class="custom-control-label" id="text_convenio_1"
                                        for="convenio_1">Particular</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="convenio_2">
                                    <label class="custom-control-label" id="text_convenio_2"
                                        for="convenio_2">Fonasa</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="convenio_3">
                                    <label class="custom-control-label" id="text_convenio_3" for="convenio_3">Todas las
                                        Isapres</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="convenio_4">
                                    <label class="custom-control-label" id="text_convenio_4"
                                        for="convenio_4">Banmédica</label>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="convenio_5">
                                    <label class="custom-control-label" id="text_convenio_5"
                                        for="convenio_5">Colmena</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="convenio_6">
                                    <label class="custom-control-label" id="text_convenio_6" for="convenio_6">Nueva
                                        Masvida</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="convenio_7">
                                    <label class="custom-control-label" id="text_convenio_7"
                                        for="convenio_7">Consalud</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="convenio_8">
                                    <label class="custom-control-label" id="text_convenio_8" for="convenio_8">Cruz
                                        Blanca</label>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="convenio_9">
                                    <label class="custom-control-label" id="text_convenio_9" for="convenio_9">Cruz del
                                        Norte</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="convenio_10">
                                    <label class="custom-control-label" id="text_convenio_10" for="convenio_10">Vida
                                        Tres</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="convenio_11">
                                    <label class="custom-control-label" id="text_convenio_11" for="convenio_11">Fundación
                                    </label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="convenio_12">
                                    <label class="custom-control-label" id="text_convenio_12"
                                        for="convenio_12">Isalud</label>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3 mt-2 text-center">
                                <button type="button" onclick="guardar_valores_lugar_atencion()"
                                    class="btn btn-info btn-sm" data-dismiss="modal">Agregar convenio y
                                    valor</button>
                                <button type="button" id="cerrar_convenio1" class="btn btn-danger btn-sm">Cancelar</button>
                            </div>
                            <div class="col-sm-12 mt-3 mb-3">
                                {{--  <table id="" class="table table-sm table-responsive">  --}}
                                <table id="tabla_valores" class="display table table-striped dt-responsive nowrap table-xs" style="100%">
                                    <thead>
                                        <tr>
                                            <th>Atención Médica</th>
                                            <th>Valor</th>
                                            <th>Convenios</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cerrar_convenio" class="btn btn-danger btn-sm"
                        data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
                    <button type="button" id="cerrar_convenio2" class="btn btn-info btn-sm"> <i class="feather icon-save"></i> Guardar cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--****Cierre Container Completo****-->

@endsection

@section('page-script')
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
