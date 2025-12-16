<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header pt-3 pb-2 bg-light">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="f-18 d-inline mt-3 text-info">Sucursales</h6>
                        <div class="btn-group mb-2 mr-2 float-right">
                            <button type="button" class="btn btn-info btn-sm" onclick="ag_sucursal();"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Añadir nueva</button>
                            {{-- <button type="button" class="btn btn-outline-info  btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                            <div class="dropdown-menu">
                                <button class="dropdown-item" type="button" class="btn  btn-primary" data-toggle="modal" data-target="#modal_agregar_lugar_existente">Desasociar o agregar<br> lugar de atención <br>existente</button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                    </div>
                </div>
                <table id="sucursales_cm" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Identificación</th>
                            <th class="text-center align-middle">Dirección</th>
                            <th class="text-center align-middle">Contacto</th>
                            <th class="text-center align-middle">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($sucursales)
                            @foreach ($sucursales as $suc)
                                <tr>
                                    <td class="align-middle text-center">
                                        <strong>{{ $suc->nombre }}</strong><br>
                                        {{ $suc->rut }}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ $suc->direccion->direccion }} {{ $suc->direccion->numero_dir }}<br>
                                        {{ $suc->ciudadObj->nombre }}
                                    </td>
                                    <td class="align-middle text-center">
                                        <span>{{ $suc->email }}</span><br>
                                        <span>{{ $suc->telefono }}</span>
                                        @if(!empty($suc->telefono_2))
                                            <br><span>{{ $suc->telefono_2 }}</span>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <!--Botón Modal-->
                                        <button type="button" class="btn btn-info btn-sm btn-icon" onclick="ed_sucursal({{ $suc->id }});" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                        <!--Botón Modal-->
                                        {{-- <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="asis_sucursal({{ $suc->id }});" data-toggle="tooltip" data-placement="top" title="Asistentes"><i class="feather icon-user"></i></button> --}}
                                        <!--Botón Modal-->
                                        <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="hor_sucursal({{ $suc->id_institucion }}, {{ $suc->id_lugar_atencion }}, {{ $suc->id }});" data-toggle="tooltip" data-placement="top" title="Horario de sucursal"><i class="feather icon-watch"></i></button>
                                        <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="adm_boxes({{ $suc->id_institucion }},{{ $suc->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Administrar boxes"><i class="feather icon-box"></i></button>
                                        <button type="button" class="btn btn-success btn-sm btn-icon" onclick="adm_bodegas({{ $suc->id_institucion }},{{ $suc->id_lugar_atencion }},{{ $suc->id }});" data-toggle="tooltip" data-placement="top" title="Administrar bodegas"><i class="feather icon-archive"></i></button>
                                    </td>
                                </tr>

                            @endforeach

                        @endif
                        {{-- <tr>
                            <td class="align-middle text-center">
                                <strong>CEMICAL (CASA MATRIZ)</strong><br>
                                00.000.000-0
                            </td>
                            <td class="align-middle text-center">
                                <span>Arlegui, 23</span><br>
                                <span>Viña del Mar</span>
                            </td>
                            <td class="align-middle text-center">
                                <span>contacto@correo.cl</span><br>
                                <span>2178218</span>
                            </td>
                            <td class="align-middle text-center">
                                <!--Botón Modal-->
                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="ed_sucursal();" data-toggle="tooltip" data-placement="top" title="Editar"><i class="feather icon-edit"></i></button>
                                <!--Botón Modal-->
                                <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="asis_sucursal();" data-toggle="tooltip" data-placement="top" title="Asistentes"><i class="feather icon-user"></i></button>
                                <!--Botón Modal-->
                                <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="hor_sucursal();" data-toggle="tooltip" data-placement="top" title="Horario de sucursal"><i class="feather icon-watch"></i></button>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{--  MODAL  SUCURSAL  --}}
<div id="bodegas_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="bodegas_sucursal_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center" id="bodegas_sucursal_label">Administrar bodegas de {{ $institucion->nombre }}
                    <!--Sin los parentesis, solo cargar el nombre de la sucursal-->
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!--TABLA RESPONSIVA HACIA ABAJO-->
                        <table id="bodegas_sucursal_tabla"
                            class="display table table-striped dt-responsive nowrap text-center table-xs"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bodegas as $bodega)
                                    <tr>
                                        <td class="align-middle">{{ $bodega->nombre }}</td>
                                        <td class="align-middle">{{ $bodega->descripcion }}</td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="asignar_bodega({{ $bodega->id }});" data-toggle="tooltip" data-placement="top" title="Asignar"><i class="feather icon-plus"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="a_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_sucursal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Añadir nueva sucursal</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="a_sucursal_id_institucion" id="a_sucursal_id_institucion" value="{{ $institucion->id }}">
                {{-- <input type="hidden" name="a_sucursal_id_lugar_atencion" id="a_sucursal_id_lugar_atencion" value="{{ $institucion->id_lugar_atencion }}"> --}}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Rut</label>
                            <input class="form-control form-control-sm" name="a_sucursal_rut" id="a_sucursal_rut" type="text" oninput="formatoRut(this)">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Nombre</label>
                            <input class="form-control form-control-sm" name="a_sucursal_nombre" id="a_sucursal_nombre" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Dirección</label>
                            <input class="form-control form-control-sm" name="a_sucursal_direccion" id="a_sucursal_direccion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Región</label>
                            <select class="form-control form-control-sm" name="a_sucursal_region" id="a_sucursal_region" onchange="buscar_ciudad_sucursal('a_sucursal_region', 'a_sucursal_comuna', 0);">
                                <option value="">Seleccione</option>
                                @if($regiones)
                                    @foreach ($regiones as $reg )
                                        <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Comuna</label>
                            <select class="form-control form-control-sm" name="a_sucursal_comuna" id="a_sucursal_comuna">
                                {{--  --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Correo electrónico</label>
                            <input class="form-control form-control-sm" name="email" id="a_sucursal_email" type="a_sucursal_email">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Teléfono</label>
                            <input class="form-control form-control-sm" name="a_sucursal_telefono_1" id="a_sucursal_telefono_1"
                                type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Teléfono (opcional)</label>
                            <input class="form-control form-control-sm" name="a_sucursal_telefono_2" id="a_sucursal_telefono_2"
                                type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Valor del examen (%)</label>
                            <input class="form-control form-control-sm" name="a_sucursal_valor" id="a_sucursal_valor"
                                type="number" value="100">
                        </div>
                    </div>
                    {{-- <div class="col-sm-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="not_pacientes_1">
                                <label for="not_pacientes_1" class="cr"></label>
                                <label>Notificar a pacientes</label>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-sm mx-auto" onclick="registrar_sucursal();">Añadir nueva sucursal</button>
            </div>
        </div>
    </div>
</div>

<div id="e_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="e_sucursal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Editar sucursal</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="e_sucursal_id_sucursal" id="e_sucursal_id_sucursal">
                <input type="hidden" name="e_sucursal_id_institucion" id="e_sucursal_id_institucion" value="">
                <input type="hidden" name="e_sucursal_id_lugar_atencion" id="e_sucursal_id_lugar_atencion" value="">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input class="form-control form-control-sm" name="e_sucursal_rut" id="e_sucursal_rut" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Nombre</label>
                                <input class="form-control form-control-sm" name="e_sucursal_nombre" id="e_sucursal_nombre" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Dirección</label>
                                <input class="form-control form-control-sm" name="e_sucursal_direccion" id="e_sucursal_direccion" type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Región</label>
                                <select class="form-control form-control-sm" name="e_sucursal_region" id="e_sucursal_region" onchange="buscar_ciudad_sucursal('e_sucursal_region', 'e_sucursal_comuna', 0);">
                                    <option value="">Seleccione</option>
                                    @if($regiones)
                                        @foreach ($regiones as $reg )
                                            <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Comuna</label>
                                <select class="form-control form-control-sm" name="e_sucursal_comuna" id="e_sucursal_comuna">
                                    {{--  --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Correo electrónico</label>
                                <input class="form-control form-control-sm" name="e_sucursal_email" id="e_sucursal_email"
                                    type="email">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Teléfono</label>
                                <input class="form-control form-control-sm" name="e_sucursal_telefono_1" id="e_sucursal_telefono_1"
                                    type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Teléfono (opcional)</label>
                                <input class="form-control form-control-sm" name="e_sucursal_telefono_2" id="e_sucursal_telefono_2"
                                    type="text">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="switch switch-success d-inline m-r-10">
                                    <input type="checkbox" id="not_pacientes_1">
                                    <label for="not_pacientes_1" class="cr"></label>
                                    <label>Notificar a pacientes</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-sm mx-auto" onclick="modificar_sucursal();">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>

<div id="asistentes_sucursal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="asistentes_sucursal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asistentes de ( Nombre de sucursal)
                    <!--Sin los parentesis, solo cargar el nombre de la sucursal-->
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h6>Ingrese Rut de el o la asistente que desea asociar a su lugar de atención</h6>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-sm" placeholder="Rut"
                                    aria-label="Rut" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-info btn-sm" type="button"
                                        id="button-addon2">Asociar</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <!--TABLA RESPONSIVA HACIA ABAJO-->
                            <table id="res-config"
                                class="display table table-striped dt-responsive nowrap text-center table-xs"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Acción</th>
                                        <th>Rut</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="habdes_1">
                                                <label class="custom-control-label" for="habdes_1"></label>
                                            </div>
                                        </td>
                                        <td>00.000.000-0</td>
                                        <td>Pepita Sanchez Díaz</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-sm mx-auto">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="horario_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="horario_sucursal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Horario de ( Nombre de sucursal)
                    <!--Sin los parentesis, solo cargar el nombre de la sucursal-->
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="horario_sucursal_id_institucion" id="horario_sucursal_id_institucion" value="">
                <input type="hidden" name="horario_sucursal_id_sucursal" id="horario_sucursal_id_sucursal" value="">
                <input type="hidden" name="horario_sucursal_id_lugar_atencion" id="horario_sucursal_id_lugar_atencion" value="">
                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="text-c-blue">Horario de atención</h6>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Día</label>
                            <select class="form-control form-control-sm" name="horario_sucursal_dia" id="horario_sucursal_dia">
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
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Desde</label>
                            <select class="form-control form-control-sm" name="horario_sucursal_horario_inicio" id="horario_sucursal_horario_inicio">
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
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Hasta</label>
                            <select class="form-control form-control-sm" name="horario_sucursal_horario_termino" id="horario_sucursal_horario_termino">
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
                    <div class="col-sm-6 col-md-3">
                        <button onclick="registrar_horario_sucursal();" type="button" class="btn btn-info btn-sm btn-block">Añadir horario</button></td>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <!--TABLA RESPONSIVA HACIA ABAJO-->
                        <table class="display table table-striped dt-responsive nowrap table-xs text-center"
                            style="width:100%" name="horario_sucursal_tabla" id="horario_sucursal_tabla">
                            <thead>
                                <tr>
                                    <th>Desde</th>
                                    <th>Hasta</th>
                                    <th>Día</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>8:00 am</td>
                                    <td>19:00 pm</td>
                                    <td>Martes</td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm btn-icon"
                                            data-toggle="tooltip" data-placement="top" title="Eliminar"><i
                                                class="feather icon-x"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm mx-auto">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>

<div id="boxes_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="boxes_sucursal">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Administrar boxes de {{ $institucion->nombre }}
                    <!--Sin los parentesis, solo cargar el nombre de la sucursal-->
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="bodegas_sucursal_id_institucion" id="bodegas_sucursal_id_institucion" value="{{ $institucion->id }}">
                <input type="hidden" name="bodegas_sucursal_id_lugar_atencion" id="bodegas_sucursal_id_lugar_atencion" value="{{ $institucion->id_lugar_atencion }}">
                <div class="row">
                    <div class="col-sm-12">
                        <!--TABLA RESPONSIVA HACIA ABAJO-->
                        <table id="boxes_sucursal_tabla"
                            class="display table table-striped dt-responsive nowrap text-center table-xs"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>N° de box</th>
                                    <th>Tipo especialización</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Contenido cargado por JS --}}
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-success" onclick="mostrar_formulario_nuevo_box()">Nuevo box</button>
                        </div>
                    </div>
                </div>
                <div id="formulario_nuevo_box" class="d-none">
                    <hr>
                    <div class="modal-body">
                        <div class="row">
                            <div class="modal-body">
                                <form>
                                    <div class="form-row">
                                        <div class="col-md-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Asignar N° al box</label>
                                                <input type="text" name="numero_box" id="numero_box" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Tipo Box</label>
                                                <select class="form-control form-control-sm" name="tpo_box_servicio" id="tpo_box_servicio" onchange="dame_especializacion_box()">
                                                    <option value="0">Seleccione</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="Especializado">Especializado</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" id="contenedor_tpo_especializacion">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Tipo de especialización</label>
                                                <select class="form-control form-control-sm" name="tpo_especializacion" id="tpo_especializacion">
                                                    <option value="0">Seleccione</option>
                                                    <option value="Oftalmologia">Oftalmología</option>
                                                    <option value="Otorrino">Otorrino</option>
                                                    <option value="Odontologia general">Odontologia general</option>
                                                    <option value="Sala de procedimientos">Sala de procedimientos</option>
                                                    <option value="Vacunatorio">Vacunatorio</option>
                                                    <option value="Kinesiologia y rehabilitacion">Kinesiologia y rehabilitacion</option>
                                                    <option value="Etc">Etc</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 d-none">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Equipamiento</label>
                                                <select class="form-control form-control-sm" name="equip_ad" id="equip_ad" multiple="multiple">
                                                    <option value="Carro paro">Carro paro</option>
                                                    <option value="Oxigenoterápia">Oxigenoterápia</option>
                                                    <option value="Pabellon de yeso">Pabellon de yeso</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 d-none">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Cantidad de camillas</label>
                                                <input type="number" class="form-control form-control-sm" name="n_camillas_box_servicio" id="n_camillas_box_servicio">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Ubicación</label>
                                                <select class="form-control form-control-sm" name="tpo_equip_servicio" id="tpo_equip_servicio">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1">Piso 1</option>
                                                    <option value="2">Piso 2</option>
                                                    <option value="3">Piso 3</option>
                                                    <option value="4">Piso 4</option>
                                                    <option value="5">Piso 5</option>
                                                    <option value="6">Piso 6</option>
                                                    <option value="7">Piso 7</option>
                                                    <option value="8">Piso 8</option>
                                                    <option value="9">Piso 9</option>
                                                    <option value="10">Piso 10</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Sección</label>
                                                <select class="form-control form-control-sm" name="seccion_box" id="seccion_box">
                                                    <option value="0">Seleccione</option>
                                                    <option value="1">Pediatría</option>
                                                    <option value="2">General</option>
                                                    <option value="3">Ginecobstetricia</option>
                                                    <option value="4">Rehabilitación</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="form-group fill">
                                                <label class="floating-label-activo-sm">Observaciones</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ot_pat_act_" id="ot_pat_act_"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-sm-12 text-center">
                                <button type="button" onclick="guardar_box_laboratorio()" class="btn btn-info btn-sm mx-auto" data-toggle="collapse" data-target=".info-basica" aria-expanded="false" aria-controls="info-basica-1 info-basica-2">
                                    <i class="feather icon-plus"></i> Añadir
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

    </div>
</div>



<script>
    /*-SUCURSALES-*/
    /*-Agregar sucursal-*/
    function ag_sucursal() {
        $('#a_sucursal').modal('show');
    }

    function registrar_sucursal()
    {
        var id_institucion = $('#a_sucursal_id_institucion').val();
        var id_lugar_atencion = '';
        var rut = $('#a_sucursal_rut').val();
        var nombre = $('#a_sucursal_nombre').val();
        var direccion = $('#a_sucursal_direccion').val();
        var region = $('#a_sucursal_region').val();
        var comuna = $('#a_sucursal_comuna').val();
        var email = $('#a_sucursal_email').val();
        var telefono_1 = $('#a_sucursal_telefono_1').val();
        var telefono_2 = $('#a_sucursal_telefono_2').val();

        var valido = 1;
        var mensaje = '';

        // if( id_sucursal == '' )
        // {
        //     mensaje += 'campo requerido id_sucursal\n';
        //     valido = 0;
        // }
        if( rut == '' )
        {
            mensaje += 'campo requerido rut\n';
            valido = 0;
        }
        if( nombre == '' )
        {
            mensaje += 'campo requerido nombre\n';
            valido = 0;
        }
        if( direccion == '' )
        {
            mensaje += 'campo requerido direccion\n';
            valido = 0;
        }
        if( region == '' )
        {
            mensaje += 'campo requerido region\n';
            valido = 0;
        }
        if( comuna == '' )
        {
            mensaje += 'campo requerido comuna\n';
            valido = 0;
        }
        if( email == '' )
        {
            mensaje += 'campo requerido email\n';
            valido = 0;
        }
        if( telefono_1 == '' )
        {
            mensaje += 'campo requerido telefono_1\n';
            valido = 0;
        }
        // if( telefono_2 == '' )
        // {
        //     mensaje += 'campo requerido\n';
        //     valido = 0;
        // }

        if( valido == 1 )
        {
            let url = "{{ route('sucursal.registrar') }}";
            $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: CSRF_TOKEN,
                    id_institucion: id_institucion,
                    id_lugar_atencion: '',
                    rut: rut,
                    nombre: nombre,
                    direccion: direccion,
                    region: region,
                    comuna: comuna,
                    email: email,
                    telefono: telefono_1,
                    telefono_2: telefono_2,
                },
            })
            .done(function(data) {
                if (data != null)
                {
                    console.log(data);
                    $('#a_sucursal_rut').val('');
                    $('#a_sucursal_nombre').val('');
                    $('#a_sucursal_direccion').val('');
                    $('#a_sucursal_region').val('');
                    $('#a_sucursal_comuna').val('');
                    $('#a_sucursal_email').val('');
                    $('#a_sucursal_telefono_1').val('');
                    $('#a_sucursal_telefono_2').val('');

                    $('#a_sucursal').modal('hide');

                    swal({
                        title: "registro exitoso",
                        icon: "success",
                    });

                    setTimeout(function() {
                        location.reload()
                    }, 500);
                }
                else
                {
                    swal({
                        title: "Error al registrar",
                        icon: "error",
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
                title: "Agregar Sucursal",
                text: mensaje,
                icon: "error"
            })
        }

    }

    /*-Editar sucursal-*/
    function ed_sucursal(id)
    {
        $('#e_sucursal_id_sucursal').val('');
        $('#e_sucursal_id_institucion').val('');
        $('#e_sucursal_id_lugar_atencion').val('');
        $('#e_sucursal_rut').val('');
        $('#e_sucursal_nombre').val('');
        $('#e_sucursal_direccion').val('');
        $('#e_sucursal_region').val('');
        $('#e_sucursal_comuna').val('');
        $('#e_sucursal_email').val('');
        $('#e_sucursal_telefono_1').val('');
        $('#e_sucursal_telefono_2').val('');

        let url = "{{ route('sucursal.ver_registro') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                id: id,
            },
        })
        .done(function(data)
        {
            if (data.estado == 1)
            {

                $('#e_sucursal_id_sucursal').val(id);
                $('#e_sucursal_id_institucion').val(data.registro.id_institucion);
                $('#e_sucursal_id_lugar_atencion').val(data.registro.id_lugar_atencion);
                $('#e_sucursal_rut').val(data.registro.rut);
                $('#e_sucursal_nombre').val(data.registro.nombre);
                $('#e_sucursal_direccion').val(data.registro.direccion.direccion);
                $('#e_sucursal_region').val(data.registro.regionObj.id);
                buscar_ciudad_sucursal('e_sucursal_region', 'e_sucursal_comuna', data.registro.ciudadObj.id);
                // $('#e_sucursal_comuna').val(data.registro.ciudadObj);
                $('#e_sucursal_email').val(data.registro.email);
                $('#e_sucursal_telefono_1').val(data.registro.telefono);
                $('#e_sucursal_telefono_2').val(data.registro.telefono_2);
                $('#e_sucursal').modal('show');
            }
            else
            {
                swal({
                    title: "Error",
                    text: "Error al cargar sucursal",
                    icon: "error"
                })
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function asignar_bodega(id){
        let url = "{{ route('sucursal.bodega.asignar') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                id: id,
                id_sucursal: $('#bodegas_sucursal_id_sucursal').val(),
                id_bodega: $('#bodegas_sucursal_id_bodega').val(),
                id_lugar_atencion: $('#bodegas_sucursal_id_lugar_atencion').val(),
                _token: CSRF_TOKEN,
            },
        })
        .done(function(data)
        {
            console.log(data);
            if (data.estado == 1)
            {
                swal({
                    title: "Asignar Bodega",
                    text: "Bodega asignada con éxito",
                    icon: "success"
                })
            }
            else
            {
                swal({
                    title: "Error",
                    text: "Error al asignar bodega",
                    icon: "error"
                })
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function modificar_sucursal()
    {
        var id_sucursal = $('#e_sucursal_id_sucursal').val();
        var id_institucion = $('#e_sucursal_id_institucion').val();
        var id_lugar_atencion = $('#e_sucursal_id_lugar_atencion').val();
        var rut = $('#e_sucursal_rut').val();
        var nombre = $('#e_sucursal_nombre').val();
        var direccion = $('#e_sucursal_direccion').val();
        var region = $('#e_sucursal_region').val();
        var comuna = $('#e_sucursal_comuna').val();
        var email = $('#e_sucursal_email').val();
        var telefono_1 = $('#e_sucursal_telefono_1').val();
        var telefono_2 = $('#e_sucursal_telefono_2').val();

        var valido = 1;
        var mensaje = '';

        if( id_sucursal == '' )
        {
            mensaje += 'campo requerido id_sucursal\n';
            valido = 0;
        }
        if( rut == '' )
        {
            mensaje += 'campo requerido rut\n';
            valido = 0;
        }
        if( nombre == '' )
        {
            mensaje += 'campo requerido nombre\n';
            valido = 0;
        }
        if( direccion == '' )
        {
            mensaje += 'campo requerido direccion\n';
            valido = 0;
        }
        if( region == '' )
        {
            mensaje += 'campo requerido region\n';
            valido = 0;
        }
        if( comuna == '' )
        {
            mensaje += 'campo requerido comuna\n';
            valido = 0;
        }
        if( email == '' )
        {
            mensaje += 'campo requerido email\n';
            valido = 0;
        }
        if( telefono_1 == '' )
        {
            mensaje += 'campo requerido telefono_1\n';
            valido = 0;
        }
        // if( telefono_2 == '' )
        // {
        //     mensaje += 'campo requerido\n';
        //     valido = 0;
        // }

        if( valido == 1)
        {
            let url = "{{ route('sucursal.modificar') }}";
            $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: CSRF_TOKEN,
                    id: id_sucursal,
                    id_institucion:id_institucion,
                    id_lugar_atencion:'',
                    rut: rut,
                    nombre: nombre,
                    direccion: direccion,
                    numero_dir: '',
                    comuna: comuna,
                    id_direccion: 0,
                    email: email,
                    telefono: telefono_1,
                    telefono_2: telefono_2,
                    otro: '',
                    estado: '',
                },
            })
            .done(function(data)
            {
                if (data.estado == 1)
                {
                    swal({
                        title: "Modificar Sucursal",
                        text: "Cambio realizado con exito",
                        icon: "success"
                    })

                    $('#e_sucursal').modal('hide');

                    $('#e_sucursal_id_sucursal').val('');
                    $('#e_sucursal_rut').val('');
                    $('#e_sucursal_nombre').val('');
                    $('#e_sucursal_direccion').val('');
                    $('#e_sucursal_region').val('');
                    $('#e_sucursal_comuna').val('');
                    $('#e_sucursal_email').val('');
                    $('#e_sucursal_telefono_1').val('');
                    $('#e_sucursal_telefono_2').val('');

                    setTimeout(function() {
                        location.reload()
                    }, 500);
                }
                else
                {
                    swal({
                        title: "Modificar Sucursal",
                        text: "Falla en modificar sucursal",
                        icon: "error"
                    })
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else
        {
            swal({
                title: "Modificar Sucursal",
                text: mensaje,
                icon: "error"
            })
        }
    }

    /*-Asistentes de sucursal-*/
    // function asis_sucursal() {
    //     $('#asistentes_sucursal').modal('show');
    // }

    /*-Horario sucursal -*/
    function hor_sucursal(id_institucion, id_lugar_atencion, id_sucursal)
    {
        $('#horario_sucursal_tabla tbody').html('');

        carga_registros_horario_sucursal(id_institucion, id_lugar_atencion, id_sucursal);

    }

    function registrar_horario_sucursal()
    {
        var id_institucion = $('#horario_sucursal_id_institucion').val();
        var id_lugar_atencion = $('#horario_sucursal_id_lugar_atencion').val();
        var id_sucursal = $('#horario_sucursal_id_sucursal').val();
        var dia = $('#horario_sucursal_dia').val();
        var horario_inicio = $('#horario_sucursal_horario_inicio').val();
        var horario_termino = $('#horario_sucursal_horario_termino').val();

        var valido = 1;
        var mensaje = '';

        if(id_institucion == '')
        {
            mensaje = 'campo requerido id_institucion';
            valido = 0;
        }
        if(id_lugar_atencion == '')
        {
            mensaje = 'campo requerido id_lugar_atencion';
            valido = 0;
        }
        if(id_sucursal == '')
        {
            mensaje = 'campo requerido id_sucursal';
            valido = 0;
        }
        if(dia == '')
        {
            mensaje = 'campo requerido dia';
            valido = 0;
        }
        if(horario_inicio == '')
        {
            mensaje = 'campo requerido horario_inicio';
            valido = 0;
        }
        if(horario_termino == '')
        {
            mensaje = 'campo requerido horario_termino';
            valido = 0;
        }

        if(valido  == 1)
        {
            let url = "{{ route('sucursal.horario.registrar') }}";

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token: CSRF_TOKEN,
                    id_institucion:id_institucion,
                    id_sucursal:id_sucursal,
                    id_lugar_atencion:id_lugar_atencion,
                    hora_inicio:horario_inicio,
                    hora_termino:horario_termino,
                    dia:dia,
                    duracion_consulta:15, //15 min
                    tipo_agenda: 4,//examenes
                    otro:'',
                    estado:1,
                },
            })
            .done(function(data)
            {
                if( data.estado == 1 )
                {
                    swal({
                        title: "Horario de Sucursal",
                        text: "Registro exitoso",
                        icon: "success"
                    });

                    carga_registros_horario_sucursal(id_institucion, id_lugar_atencion, id_sucursal);

                }
                else
                {
                    var mensaje = '';
                    if(data.error)
                    {
                        $.each(data.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }
                    swal({
                        title: "Horario de Sucursal",
                        text: "Error al cargar\n"+mensaje,
                        icon: "error"
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
        else
        {
            var mensaje = '';
            if(data.error)
            {
                $.each(data.error, function (indexInArray, valueOfElement)
                {
                    mensaje += valueOfElement+'\n';
                });
            }
            else
            {
                mensaje += 'Intente nuevamente.';
            }
            swal({
                title: "Horario de Sucursal",
                text: "Error al cargar\n"+mensaje,
                icon: "error"
            });
        }
    }

    function carga_registros_horario_sucursal(id_institucion, id_lugar_atencion, id_sucursal)
    {
        var valido = 1;
        var mensaje = '';

        $('#horario_sucursal_tabla tbody').html('');

        if(id_sucursal == '')
        {
            valido = 0;
            mensaje += 'campo rquerido id_sucursal\n';
        }

        if( valido == 1 )
        {
            let url = "{{ route('sucursal.horario.ver_registros') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_sucursal: id_sucursal,
                    estado: 1,
                },
            })
            .done(function(data)
            {
                if (data.estado == 1)
                {

                    $('#horario_sucursal_id_institucion').val(id_institucion);
                    $('#horario_sucursal_id_sucursal').val(id_sucursal);
                    $('#horario_sucursal_id_lugar_atencion').val(id_lugar_atencion);


                    $.each(data.registros, function (indexInArray, valueOfElement)
                    {
                        let dia = '';
                        dias = valueOfElement.dia.split(',');
                        for (let i = 0; i < dias.length; i++) {
                            if (dias[i] == 0) {
                                dia += 'Domingo '
                            } else if (dias[i] == 1) {
                                dia += 'Lunes '
                            } else if (dias[i] == 2) {
                                dia += 'Martes '
                            } else if (dias[i] == 3) {
                                dia += 'Miercoles '
                            } else if (dias[i] == 4) {
                                dia += 'Jueves '
                            } else if (dias[i] == 5) {
                                dia += 'Viernes '
                            } else if (dias[i] == 6) {
                                dia += 'Sabado '
                            }
                        }

                        html='';
                        html += '<tr>';
                        html += '    <td>'+valueOfElement.hora_inicio+'</td>';
                        html += '    <td>'+valueOfElement.hora_termino+'</td>';
                        html += '    <td>'+dia+'</td>';
                        html += '    <td><button type="button" onclick="eliminar_horario_sucursal( '+valueOfElement.id+', '+valueOfElement.id_institucion+', '+valueOfElement.id_lugar_atencion+', '+valueOfElement.id_sucursal+');" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button></td>';
                        html += '</tr>';

                        $('#horario_sucursal_tabla tbody').append(html);
                    });

                    $('#horario_sucursal').modal('show');
                }
                else
                {
                    swal({
                        title: "Horario de Sucursal",
                        text: "Error al cargar",
                        icon: "error"
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
                title: "Horario de Sucursal",
                text: "campo requerido\n"+mensaje,
                icon: "error",
            });
        }
    }

    function eliminar_horario_sucursal(id, id_institucion, id_lugar_atencion, id_sucursal)
    {
        var valido = 1;
        var mensaje = '';

        if(id_sucursal == '')
        {
            valido = 0;
            mensaje += 'campo rquerido id_sucursal\n';
        }

        if( valido == 1 )
        {
            let url = "{{ route('sucursal.horario.modificar') }}";

            $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: CSRF_TOKEN,
                    id: id_sucursal,
                    estado: 0,
                },
            })
            .done(function(data)
            {
                if (data.estado == 1)
                {

                    swal({
                        title: "Horario de Sucursal",
                        text: "Eliminado",
                        icon: "success"
                    });
                    carga_registros_horario_sucursal(id_institucion, id_lugar_atencion, id_sucursal)
                }
                else
                {
                    swal({
                        title: "Horario de Sucursal",
                        text: "Error al cargar",
                        icon: "error"
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
                title: "Horario de Sucursal",
                text: "campo requerido\n"+mensaje,
                icon: "error",
            });
        }
    }

    /** ciudad */
    function buscar_ciudad_sucursal(select_region, select_ciudad, id_ciudad=0) {

        let region = $('#'+select_region).val();
        let url = "{{ route('home.buscar_ciudad_region') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                region: region,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);

                let ciudades = $('#'+select_ciudad);

                ciudades.find('option').remove();
                ciudades.append('<option value="0">Seleccione Ciudad</option>');
                $(data).each(function(i, v) { // indice, valor
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                })

                if(id_ciudad != 0)
                    ciudades.val(id_ciudad);

            } else {

                swal({
                    title: "Error",
                    text: "Error al cargar las ciudades",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                })
                // alert('No se pudo Cargar las ciudades');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    };

    function formatoRut(rut)
    {
        var valor = rut.value.replace('.','');
        valor = valor.replace(/\-/g,'');
        valor = valor.replace(/\ /g,'');
        valor = valor.replace(/[qwertyuiopasdfghjlñzxcvbnmQWERTYUIOPASDFGHJLÑZXCVBNM]/g,'');
        valor = valor.replace(/[/,´.*'+¿?^$!¡=&%"#¨_:;`~°{}()|[\]\\]/g,'');

        cuerpo = valor.slice(0,-1);
        dv = valor.slice(-1).toUpperCase();
        rut.value = cuerpo + '-'+ dv

        if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

        suma = 0;
        multiplo = 2;

        for(i=1;i<=cuerpo.length;i++)
        {
            index = multiplo * valor.charAt(cuerpo.length - i);
            suma = suma + index;
            if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
        }

        dvEsperado = 11 - (suma % 11);
        dv = (dv == 'K')?10:dv;
        dv = (dv == 0)?11:dv;

        if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

        rut.setCustomValidity('');
    }

    function adm_boxes(id_institucion, id_lugar_atencion)
    {
        let url = "{{ route('laboratorio.box') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    id_lugar_atencion: id_lugar_atencion,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                { 
                    $('#id_lugar_atencion').val(id_lugar_atencion);
                    if (data.estado == 1)
                    {
                        $('#boxes_sucursal').modal('show');
                        $('#formulario_nuevo_box').addClass('d-none');
                        let table = $('#boxes_sucursal_tabla').DataTable();
                        table.clear().draw();
                        $.each(data.registros, function (indexInArray, valueOfElement)
                        {
                            let tipo_especializacion = valueOfElement.tipo_especializacion ? valueOfElement.tipo_especializacion : 'General';

                            table.row.add( [
                                valueOfElement.tipo_box,
                                valueOfElement.numero_box,
                                tipo_especializacion,
                                '<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_box_lab('+valueOfElement.id+', '+id_institucion+', '+id_lugar_atencion+');" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button>'
                            ] ).draw( false );
                        });


                        // cargarAgendaSucursal();
                    }
                    else
                    {
                        swal({
                            title: "Carga de Box",
                            text: "Falla en Actualización.\nIntente de nuevo.",
                            icon: "error",
                        });
                    }
                }
                else
                {
                    swal({
                        title: "Carga de Box",
                        text: "Falla en Actualización.\nIntente de nuevo.",
                        icon: "error",
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

    function adm_bodegas(id_institucion, id_lugar_atencion)
    {
        $('#bodegas_sucursal').modal('show');
        $('#bodegas_sucursal_id_institucion').val(id_institucion);
        $('#bodegas_sucursal_id_lugar_atencion').val(id_lugar_atencion);
    }

    function mostrar_formulario_nuevo_box()
    {
        $('#formulario_nuevo_box').removeClass('d-none');
    }
    
     function guardar_box_laboratorio(){
        let numero_box = $('#numero_box').val();
        let tpo_box_servicio = $('#tpo_box_servicio').val();
        let id_institucion = $('#id_institucion').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        if(tpo_box_servicio == 'Especializado'){
            var tpo_especializacion = $('#tpo_especializacion').val();
        }else{
            var tpo_especializacion = '';
        }
        let tpo_equip_servicio = $('#tpo_equip_servicio').val();
        let seccion_box = $('#seccion_box').val();
        let ot_pat_act_ = $('#ot_pat_act_').val();
        let n_camillas_box_servicio = $('#n_camillas_box_servicio').val();
        let equip_ad = $('#equip_ad').val();
        let url = "{{ route('adm_cm.guardar_box_servicio') }}";

        var valido = 1;
        var mensaje = '';

        if(numero_box == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el número de box</li>';
        }
        if(tpo_box_servicio == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar el tipo de box</li>';
        }

        if(tpo_box_servicio == 'Especializado' && tpo_especializacion == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar el tipo de especialización</li>';
        }
        if(tpo_equip_servicio == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la ubicación del box</li>';
        }
        if(seccion_box == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la sección del box</li>';
        }
        if(valido == 0){
            swal({
                title: "Error",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje
                    }
                },
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
            return false;
        }

        $.ajax({
            url: url,
            type: "post",
            data: {
                numero_box: numero_box,
                tpo_box_servicio: tpo_box_servicio,
                tpo_especializacion: tpo_especializacion,
                tpo_equip_servicio: tpo_equip_servicio,
                seccion_box: seccion_box,
                ot_pat_act_: ot_pat_act_,
                n_camillas_box_servicio: n_camillas_box_servicio,
                equip_ad: equip_ad,
                id_institucion: id_institucion,
                id_lugar_atencion: id_lugar_atencion,
                _token:'{{ csrf_token() }}'
            }
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {
                $('#boxes_sucursal').modal('hide');
                swal({
                    title: "Box guardado",
                    text: "Box guardado correctamente",
                    icon: "success",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
                $('#tabla_boxes_atencion').empty();
                $('#tabla_boxes_atencion').append(data.v);
            }else{
                swal({
                    title: "Error",
                    text: "Error al guardar el box",
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        });
    }

     function eliminar_box_lab(id) {
        swal({
                title: "Eliminar Box",
                text: "¿Está seguro que desea eliminar el box?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    confirmar_eliminar_box_lab(id);
                }
            });
    }

    function confirmar_eliminar_box_lab(id) {
        let data = {
            id: id,
            id_institucion: $('#id_institucion').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: CSRF_TOKEN,
        };
        let url = "{{ route('adm_cm.eliminar_box_servicio') }}";
        $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if (data.estado == 1) {
                        // $('#tabla_boxes_atencion').empty();
                        // $('#tabla_boxes_atencion').append(data.v);
                        swal({
                            title: "Box",
                            text: "Box Eliminado Correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                        // cerrar modal
                        $('#boxes_sucursal').modal('hide');
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar box",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                } else {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar box",
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
</script>
