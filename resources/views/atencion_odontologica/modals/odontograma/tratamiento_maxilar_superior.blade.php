<div id="tratamiento_maxilar_superior" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="tratamiento_maxilar_superior" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Maxilar superior</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form_diagnostico_tratamiento">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" id="fecha_registro" name="fecha_registro" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Diagnóstico</label>
                                <select class="form-control form-control-sm" id="diagnostico_combo">
                                    <option value="0">Seleccione</option>
                                    @foreach ($diagnosticos as $d)
                                        <option value="{{ $d->id }}">{{ $d->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Tratamiento</label>
                                <input type="text" class="form-control form-control-sm" id="diag_seleccionado_gral_autocomplete" name="diag_seleccionado_gral_autocomplete">
                            </div>
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Comentarios</label>
                                <textarea class="form-control form-control-sm" rows="2" id="comentarios" name="comentarios"></textarea>
                            </div>
                            <div class="form-group d-none">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="terminado_checkbox" value="1">
                                    <label class="form-check-label" for="terminado_checkbox">Trabajo terminado</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="control_checkbox" value="1">
                                    <label class="form-check-label" for="control_checkbox">Agendar control</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-success btn-sm btn-block" onclick="guardarDiagnosticoTratamiento()">
                                    <i class="fa fa-plus"></i> Agregar Diagnóstico/Tratamiento
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('img_dental/boca_sup.png') }}" class="img-fluid">
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-xs">
                            <thead>
                                <tr>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Diagnóstico</th>
                                    <th class="text-center">Tratamiento</th>
                                    <th class="text-center">Comentarios</th>
                                    <th class="text-center">Avance</th>
                                    <th class="text-center">Valor</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_diagnosticos_tratamientos">
                                @foreach($todos as $diagnostico)
                                @if($diagnostico->localizacion == 'Maxilar superior')
                                    <tr>
                                        <td class="text-center">{{ $diagnostico->fecha }}</td>
                                        <td class="text-center">{{ $diagnostico->descripcion}}</td>
                                        <td class="text-center">{{ $diagnostico->diagnostico_tratamiento}}</td>
                                        <td class="text-center">{{ $diagnostico->comentario }}</td>
                                        <td class="text-center">{{ $diagnostico->terminado ? 'TERMINADO' : 'PENDIENTE' }}</td>
                                        <td class="text-center">{{ number_format($diagnostico->valor, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico({{ $diagnostico->id }},'gral')">
                                                <i class="feather icon-x"></i>
                                            </button>
                                            @if($diagnostico->presupuesto == 0)
                                                <button class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto({{ $diagnostico->id }},'gral', this)"></button>
                                            @else
                                                <button class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto({{ $diagnostico->id }},'gral', this)"></button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-info" onclick="guardarTodo()">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div id="tratamiento_maxilar_superior_endo" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="tratamiento_maxilar_superior" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-20">Maxilar superior Infantil Endodoncia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                    <li class="nav-item">
                        <a class="btn btn-outline-info active btn-sm mr-1 my-1" id="diag_max_sup-tab" data-toggle="tab" href="#diag_max_sup" role="tab" aria-controls="diag_max_sup" aria-selected="false">Diagnostico</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-info btn-sm mr-1 my-1" id="trat_max_sup-tab" data-toggle="tab" href="#trat_max_sup" role="tab" aria-controls="trat_max_sup" aria-selected="false">Tratamiento</a>
                    </li>
                </ul>
                <div class="tab-content" id="Profesionales_cm">
                    <div class="tab-pane fade active show" id="diag_max_sup" role="tabpanel" aria-labelledby="diag_max_sup-tab">

                        <form class="mt-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Fecha diagnostico</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_diag_endo"
                                            id="fecha_diag_endo">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Diagnostico</label>
                                        <input type="text" name="diag_seleccionado_endo_autocomplete" id="diag_seleccionado_endo_autocomplete" class="form-control form-control-sm">

                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Comentarios</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="2"
                                            name="comentarios_diag_endo" id="comentarios_diag_endo"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1_diag_endo"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1_diag_endo">Trabajo terminado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2_diag_endo"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox2_diag_endo">Agendar control</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-sm  btn-block" onclick="agregar_diagnostico_dental('Maxilar superior','endo')"><i
                                                class="fa fa-plus"></i> Agregar Diagnostico</button>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('img_dental/boca_sup.png') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!--Tabla-->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-xs">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Fecha</th>
                                                    <th class="text-center align-middle">Procedimiento</th>
                                                    <th class="text-center align-middle">Avance</th>
                                                    <th class="text-center align-middle">Comentarios</th>
                                                    <th class="text-center align-middle">Valor</th>
                                                    <th class="text-center align-middle">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_diagnosticos_endo">

                                                @foreach($todos as $diagnostico)
                                                <tr>
                                                    <td class="text-center align-middle">{{$diagnostico->fecha}}</td>
                                                    <td class="text-center align-middle">{{$diagnostico->diagnostico_tratamiento == '' ? 'SIN INFORMACION' : $diagnostico->diagnostico_tratamiento}}</td>
                                                    <td class="text-center align-middle">{{$diagnostico->terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}}</td>
                                                    <td class="text-center align-middle">{{$diagnostico->comentario}}</td>
                                                    <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                    <td class="text-center align-middle">
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico({{ $diagnostico->id }},'endo')"><i
                                                                class="feather icon-x"></i></button>
                                                                @if($diagnostico->presupuesto == 0)
                                                                    <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto({{ $diagnostico->id }},'gral', this)"></button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto({{ $diagnostico->id }},'gral', this)"></button>
                                                                @endif
                                                    </td>
                                                </tr>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--Cierre: Tabla-->
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="tab-pane fade" id="trat_max_sup" role="tabpanel" aria-labelledby="trat_max_sup-tab">
                        <form class="mt-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Fecha procedimiento</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_proc_endo"
                                            id="fecha_proc_endo">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Procedimiento</label>
                                        <input type="text" name="proc_seleccionado_endo_autocomplete" id="proc_seleccionado_endo_autocomplete" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Comentarios</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="2"
                                            name="comentarios_tratamiento_endo" id="comentarios_tratamiento_endo"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1_tratamiento_endo"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1_tratamiento_endo">Trabajo terminado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2_tratamiento_endo"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox2_tratamiento_endo">Agendar control</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-sm  btn-block" onclick="agregar_tratamiento_dental('Maxilar superior','endo')"><i
                                                class="fa fa-plus"></i> Agregar Tratamiento</button>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('img_dental/boca_sup.png') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!--Tabla-->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-xs">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Fecha</th>
                                                    <th class="text-center align-middle">Procedimiento</th>
                                                    <th class="text-center align-middle">Avance</th>
                                                    <th class="text-center align-middle">Comentarios</th>
                                                    <th class="text-center align-middle">Valor</th>
                                                    <th class="text-center align-middle">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_tratamientos_endo">
                                                @foreach($maxilar_superior_gral_tratamientos_endo as $tratamiento)
                                                <tr>
                                                    <td class="text-center align-middle">{{$tratamiento->fecha}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->diagnostico_tratamiento == '' ? 'SIN INFORMACION' : $tratamiento->diagnostico_tratamiento}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->comentario}}</td>
                                                    <td class="text-center align-middle">{{ number_format($tratamiento->valor,0,',','.') }}</td>
                                                    <td class="text-center align-middle">
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento({{ $tratamiento->id }},'endo')"><i
                                                                class="feather icon-x"></i></button>
                                                                @if($tratamiento->terminado == 1)
                                                                <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto({{ $tratamiento->id }},'gral', this)"></button>
                                                                @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--Cierre: Tabla-->
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<div id="tratamiento_maxilar_superior_odontop" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="tratamiento_maxilar_superior" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-20">Maxilar superior Infantil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                    <li class="nav-item">
                        <a class="btn btn-outline-info active btn-sm mr-1 my-1" id="prof_salud-tab" data-toggle="tab" href="#prof-salud" role="tab" aria-controls="prof_-alud" aria-selected="false">Diagnostico</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-info btn-sm mr-1 my-1" id="odontologos-tab" data-toggle="tab" href="#odontologos" role="tab" aria-controls="odontologos" aria-selected="false">Tratamiento</a>
                    </li>
                </ul>
                <div class="tab-content" id="Profesionales_cm">
                    <div class="tab-pane fade active show" id="prof-salud" role="tabpanel" aria-labelledby="prof-salud-tab">

                        <form class="mt-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Fecha diagnostico</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_diag_odontop"
                                            id="fecha_diag_odontop">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Diagnostico</label>
                                        <input type="text" name="diag_seleccionado_odontop" id="diag_seleccionado_odontop" class="form-control form-control-sm">

                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Comentarios</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="2"
                                            name="comentarios_diag_odontop" id="comentarios_diag_odontop"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1_diag_odontop"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1_diag_odontop">Trabajo terminado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2_diag_odontop"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox2_diag_odontop">Agendar control</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-sm  btn-block" onclick="agregar_diagnostico_dental('Maxilar superior','odontop')"><i
                                                class="fa fa-plus"></i> Agregar Diagnóstico</button>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('img_dental/boca_sup.png') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!--Tabla-->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-xs">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Fecha</th>
                                                    <th class="text-center align-middle">Procedimiento</th>
                                                    <th class="text-center align-middle">Avance</th>
                                                    <th class="text-center align-middle">Comentarios</th>
                                                    <th class="text-center align-middle">Valor</th>
                                                    <th class="text-center align-middle">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_diagnosticos">

                                                @foreach($todos as $diagnostico)
                                                <tr>
                                                    <td class="text-center align-middle">{{$diagnostico->fecha}}</td>
                                                    <td class="text-center align-middle">{{$diagnostico->procedimiento == '' ? 'SIN INFORMACION' : $diagnostico->procedimiento}}</td>
                                                    <td class="text-center align-middle">{{$diagnostico->terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}}</td>
                                                    <td class="text-center align-middle">{{$diagnostico->comentario}}</td>
                                                    <td class="text-center align-middle">{{ number_format($diagnostico->valor,0,',','.') }}</td>
                                                    <td class="text-center align-middle">
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico({{ $diagnostico->id }},'odontop')"><i
                                                                class="feather icon-x"></i></button>
                                                                @if($diagnostico->presupuesto == 0)
                                                                    <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto({{ $diagnostico->id }},'gral', this)"></button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto({{ $diagnostico->id }},'gral', this)"></button>
                                                                @endif
                                                    </td>
                                                </tr>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--Cierre: Tabla-->
                                </div>
                            </div>
                        </form>

                    </div>
                    <div class="tab-pane fade" id="odontologos" role="tabpanel" aria-labelledby="odontologos-tab">
                        <form class="mt-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Fecha procedimiento</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_proc_odontop_"
                                            id="fecha_proc_odontop_">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Procedimiento</label>
                                        <input type="text" name="proc_seleccionado_odontop" id="proc_seleccionado_odontop" class="form-control form-control-sm">

                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Comentarios</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="2"
                                            name="comentarios_tratamiento_odontop" id="comentarios_tratamiento_odontop"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1_tratamiento_odontop"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1_tratamiento_odontop">Trabajo terminado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2_tratamiento_odontop"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox2_tratamiento_odontop">Agendar control</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-sm  btn-block" onclick="agregar_tratamiento_dental('Maxilar superior','odontop')"><i
                                                class="fa fa-plus"></i> Agregar Tratamiento</button>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('img_dental/boca_sup.png') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <!--Tabla-->
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-xs">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Fecha</th>
                                                    <th class="text-center align-middle">Procedimiento</th>
                                                    <th class="text-center align-middle">Avance</th>
                                                    <th class="text-center align-middle">Comentarios</th>
                                                    <th class="text-center align-middle">Valor</th>
                                                    <th class="text-center align-middle">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_tratamientos">
                                                @foreach($todos as $tratamiento)
                                                <tr>
                                                    <td class="text-center align-middle">{{$tratamiento->fecha}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->procedimiento == '' ? 'SIN INFORMACION' : $tratamiento->procedimiento}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->comentario}}</td>
                                                    <td class="text-center align-middle">{{ number_format($tratamiento->valor,0,',','.') }}</td>
                                                    <td class="text-center align-middle">
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento({{ $tratamiento->id }},'odontop')"><i
                                                                class="feather icon-x"></i></button>
                                                                @if($tratamiento->terminado == 1)
                                                                <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto({{ $tratamiento->id }},'gral', this)"></button>
                                                                @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--Cierre: Tabla-->
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>

    function maxilar_superior() {
        $('#tratamiento_maxilar_superior').modal('show');
    }

    function maxilar_superior_endo() {
        $('#tratamiento_maxilar_superior_endo').modal('show');
    }

    function maxilar_superior_odontop() {
        $('#tratamiento_maxilar_superior_odontop').modal('show');
    }


    function guardarDiagnosticoTratamiento() {
        const fecha = $('#fecha_registro').val();
        const diagnostico = $('#diagnostico_combo').val();
        const tratamiento = $('#diag_seleccionado_gral_autocomplete').val();
        const comentarios = $('#comentarios').val();
        const terminado = $('#terminado_checkbox').is(':checked') ? 1 : 0;
        const agendarControl = $('#control_checkbox').is(':checked') ? 1 : 0;

        const id_ficha_atencion = $('#id_fc').val();
        const id_paciente = $('#id_paciente_fc').val(); // Asumo que esta función ya la tienes
        const id_profesional = $('#id_profesional_fc').val();
        const id_lugar_atencion = $('#id_lugar_atencion').val();
        const id_especialidad = $('#id_especialidad').val();
        const tipo_examen = 'maxilar_superior';
        const localizacion_examen = 'Maxilar superior';

        // Validaciones básicas
        let errores = [];
        if (!fecha) errores.push('Debe seleccionar la fecha.');
        if (diagnostico === '0') errores.push('Debe seleccionar un diagnóstico.');
        if (!tratamiento) errores.push('Debe ingresar el tratamiento.');
        // if (!comentarios) errores.push('Debe ingresar comentarios.');

        if (errores.length > 0) {
            swal({
                title: 'Advertencia',
                text: errores.join('\n'),
                icon: 'warning',
                confirmButtonText: 'Aceptar'
            });
            return;
        }

        const data = {
            fecha,
            diagnostico,
            tratamiento: tratamiento,
            comentarios,
            trabajo_terminado: terminado ? 'Si' : 'No',
            agendar_control: agendarControl ? 'Si' : 'No',
            id_ficha_atencion,
            id_paciente,
            id_profesional,
            id_lugar_atencion,
            id_especialidad,
            tipo_examen,
            localizacion_examen,
            especialidad_examen: 'tratamiento',
            _token: CSRF_TOKEN
        };

        $.ajax({
            type: 'POST',
            url: "{{ route('profesional.guardar_examen_boca_general') }}",
            data: data,
            success: function (response) {
                console.log(response);
                cargar_a_presupuesto(response.examen.id,'gral');
                let diagnosticos = response.todos;
                let table = $('#table_tto_boca_gral').DataTable();
                    // Limpiar la tabla completamente
                    table.clear().draw();

                    // Agregar cada fila nuevamente
                    diagnosticos.forEach(function(diagnostico) {
                            table.row.add([
                                diagnostico.fecha,
                                diagnostico.localizacion,
                                diagnostico.descripcion,
                                diagnostico.diagnostico_tratamiento,
                                diagnostico.comentario,
                                formatoMoneda(diagnostico.valor),
                                `
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_tratamiento_inf(${diagnostico.id}, 'gral')">
                                    <i class="feather icon-x"></i>
                                </button>
                                ${diagnostico.presupuesto == 0
                                    ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id}, 'gral', this)"><i class="feather icon-shopping-cart"></i></button>`
                                    : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id}, 'gral', this)"><i class="feather icon-log-out"></i></button>`
                                }
                                `
                            ]).draw(false);
                    });
                $('#tbody_diagnosticos_tratamientos').empty();
                $('#planificacion_max_sup_diagnosticos_gral').empty();
                $('#contenedor_maxilar_superior_gral_diagnosticos_presupuesto').empty();
                diagnosticos.forEach(diagnostico => {
                    if(diagnostico.localizacion == 'Maxilar superior'){
                    let html = `<tr>
                                <td class="text-center align-middle">${diagnostico.fecha}</td>
                                <td class="text-center align-middle">${diagnostico.descripcion}</td>
                                <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                <td class="text-center align-middle">${diagnostico.comentario}</td>
                                <td class="text-center align-middle">${diagnostico.valor}</td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico(${diagnostico.id},'gral')"><i class="feather icon-x"></i></button>
                                    ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral', this);"><i class="feather icon-shopping-cart"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral', this);"><i class="feather icon-shopping-cart"> </i> </button>`}
                                </td>
                            </tr>`;
                    $('#tbody_diagnosticos_tratamientos').append(html);
                    }
                });

                    diagnosticos.forEach(diagnostico => {
                        $('#planificacion_max_sup_diagnosticos_gral').append(`
                        <div class="form-row">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" value="${ diagnostico.especialidad_examen} ${diagnostico.diagnostico_tratamiento }">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello"  id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                        <option selected  value="1">Uniradicular</option>
                                        <option value="2">Biradicular</option>
                                        <option value="2">Triradicular</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Convenio</label>
                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello"  id="adenopatias" class="form-control form-control-sm">
                                        <option selected  value="1">Convenio</option>
                                        <option value="2">Sin Convenio</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        `);
                    });

                        diagnosticos.forEach(diagnostico => {
                            if(diagnostico.presupuesto == 1){
                            $('#contenedor_maxilar_superior_gral_diagnosticos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2 d-flex justify-content-center">
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral', this)"><i class="fas fa-trash"></i> </button>
                                </div>
                            `);
                            }
                        });

                let valores_boca_general = response.valores_tratamientos[0];
                let valores_odontograma = response.valores_tratamientos[1];
                let valores_insumos = response.valores_tratamientos[2];
                let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                $('#subtotal_clinico').val(formatoMoneda(total_general));
                $('#total_clinico').val(formatoMoneda(total_general));

                // Limpia el formulario
                $('#form_diagnostico_tratamiento')[0].reset();
                $('#diagnostico_combo').val('0');
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                swal({
                    title: 'Error',
                    text: 'No se pudo guardar el diagnóstico/tratamiento.',
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
        });
    }


    function eliminar_diagnostico(id, tipo_examen){
        swal({
                    title: "¿Esta seguro que desea ELIMINAR el diagnostico?",
                    text: "Favor confirme o cancele la solicitud",
                    icon: "warning",
                    buttons: ["Cancelar", "Confirmar"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete)
                    {
                        confirmar_eliminar_diagnostico(id, tipo_examen);
                    }
                });
    }

    function confirmar_eliminar_diagnostico(id, tipo_examen){
        let url = "{{ ROUTE('profesional.eliminar_diagnostico_dental') }}";
        let data = {
            'id': id,
            'id_paciente' : $('#id_paciente_fc').val(),
            '_token': CSRF_TOKEN
        }

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                if(tipo_examen == 'gral'){
                    let diagnosticos = response.todos;
                    let table = $('#table_tto_boca_gral').DataTable();
                    // Limpiar la tabla completamente
                    table.clear().draw();

                    // Agregar cada fila nuevamente
                    diagnosticos.forEach(function(diagnostico) {
                            table.row.add([
                                diagnostico.fecha,
                                diagnostico.localizacion,
                                diagnostico.descripcion,
                                diagnostico.diagnostico_tratamiento,
                                diagnostico.comentario,
                                formatoMoneda(diagnostico.valor),
                                `
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_tratamiento_inf(${diagnostico.id}, 'gral')">
                                    <i class="feather icon-x"></i>
                                </button>
                                ${diagnostico.presupuesto == 0
                                    ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id}, 'gral', this)"><i class="feather icon-shopping-cart"></i></button>`
                                    : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id}, 'gral', this)"><i class="feather icon-log-out"></i></button>`
                                }
                                `
                            ]).draw(false);
                    });
                    $('#tbody_diagnosticos_tratamientos').empty();
                    $('#planificacion_max_sup_diagnosticos_gral').empty();

                    $('#contenedor_maxilar_superior_gral_diagnosticos_presupuesto').empty();
                    diagnosticos.forEach(diagnostico => {
                        if(diagnostico.localizacion == 'Maxilar superior'){
                                let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>
                                    <td class="text-center align-middle">${diagnostico.valor}</td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico(${diagnostico.id},'gral')"><i class="feather icon-x"></i></button>
                                         ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral', this);"><i class="feather icon-shopping-cart"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral', this);"><i class="feather icon-shopping-cart"> </i> </button>`}
                                    </td>
                                </tr>`;
                                $('#tbody_diagnosticos_tratamientos').append(html);
                            }
                        let html_planificacion = `
                        <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                        <input type="text" class="form-control form-control-sm" value="${diagnostico.especialidad_examen} ${diagnostico.diagnostico_tratamiento}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                            <option selected="" value="1">Uniradicular</option>
                                            <option value="2">Biradicular</option>
                                            <option value="2">Triradicular</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Convenio</label>
                                        <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                            <option selected="" value="1">Convenio</option>
                                            <option value="2">Sin Convenio</option>
                                        </select>
                                    </div>
                                </div>

                            </div>`;

                        $('#planificacion_max_sup_diagnosticos_gral').append(html_planificacion);
                        if(diagnostico.presupuesto == 1){
                            $('#contenedor_maxilar_superior_gral_diagnosticos_presupuesto').append(`
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-3">
                                <label class="floating-label-activo-sm">Prestación</label>
                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Sub-Total</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-1">
                                <label class="floating-label-activo-sm">Descuento</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                            </div>
                            <div class="form-group col-md-2">
                                <label class="floating-label-activo-sm">Total prestación</label>
                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                            </div>
                            <div class="form-group col-md-2 d-flex justify-content-center">
                                <button classtton type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral', this)"><i class="fas fa-trash"></i> </button>
                            </div>
                        `);
                        }

                    });
                    $('#contenedor_todos').empty();
                    diagnosticos.forEach(t => {
                        if (t.presupuesto == 1) {
                            $('#contenedor_todos').append(`
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="card-informacion">
                                            <div class="card-body pb-0">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label-activo-sm">${t.localizacion}</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-6 fill">
                                                        <label class="floating-label-activo-sm">Prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${t.diagnostico_tratamiento}">
                                                    </div>
                                                    <div class="form-group col-md-4 fill">
                                                        <label class="floating-label-activo-sm">Sub-Total</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3">
                                                        <label class="floating-label-activo-sm">Descuento</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                    </div>
                                                    <div class="form-group col-md-4 fill">
                                                        <label class="floating-label-activo-sm">Total
                                                            prestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                    </div>
                                                    <div class="form-group col-md-1 fill">
                                                        <button type="button" class="btn btn-danger btn-icon" onclick="sacar_de_presupuesto(${t.id},'gral')"><i class="feather icon-x"></i> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>`
                            );
                        }
                    });
                }else if(tipo_examen == 'endo'){
                    let diagnosticos = response.maxilar_superior_gral_diagnostico_endo;
                    $('#tbody_diagnosticos_endo').empty();
                    $('#planificacion_max_sup_diagnosticos_endo').empty();
                    $('#contenedor_maxilar_superior_endo_diagnosticos_presupuesto').empty();
                    diagnosticos.forEach(diagnostico => {
                        let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>
                                    <td class="text-center align-middle">${diagnostico.valor} </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico(${diagnostico.id},'endo')"><i class="feather icon-x"></i></button>
                                         ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral', this);"><i class="feather icon-shopping-cart"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral', this);"><i class="feather icon-shopping-cart"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_diagnosticos_endo').append(html);
                    });
                    let html_planificacion = `
                        <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                        <input type="text" class="form-control form-control-sm" value="${diagnostico.especialidad_examen} ${diagnostico.diagnostico_tratamiento}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                            <option selected="" value="1">Uniradicular</option>
                                            <option value="2">Biradicular</option>
                                            <option value="2">Triradicular</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Convenio</label>
                                        <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                            <option selected="" value="1">Convenio</option>
                                            <option value="2">Sin Convenio</option>
                                        </select>
                                    </div>
                                </div>

                            </div>`;
                    diagnosticos.forEach(diagnostico => {
                        $('#planificacion_max_sup_diagnosticos_endo').append(html_planificacion);
                    });
                    diagnosticos.forEach(diagnostico => {
                        if(diagnostico.presupuesto == 1){
                            $('#contenedor_maxilar_superior_endo_diagnosticos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${diagnostico.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${diagnostico.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${diagnostico.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" >Ver Estado Trabajo</button>
                                </div>
                            `);
                        }

                    });

                }
                let valores_boca_general = response.valores_tratamientos[0];
                let valores_odontograma = response.valores_tratamientos[1];
                let valores_insumos = response.valores_tratamientos[2];
                let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                $('#subtotal_clinico').val(formatoMoneda(total_general));
                $('#total_clinico').val(formatoMoneda(total_general));
                let todos = response.todos;

                let table_gral = $('#presup_estado_pago_gral').DataTable();

                // Limpiar la tabla antes de agregar nuevas filas
                table_gral.clear().draw();

                // Recorrer el odontograma y agregar nuevas filas
                todos.forEach(function(odonto) {

                    if (odonto.presupuesto == 1) {
                        if (odonto.estado_pago == 'ok') {
                            var clase = 'bg-success';
                        } else if (odonto.estado_pago == 'intermedio') {
                            var clase = 'bg-warning';
                        } else {
                            var clase = 'bg-danger';
                        }
                        if (odonto.estado == 0) {
                            var estado = 'TERMINADO';
                        } else {
                            var estado = 'PENDIENTE';
                        }
                        // Agregar una nueva fila a la tabla
                        let rowNode = table_gral.row.add([
                            odonto.localizacion,
                            odonto.diagnostico_tratamiento,
                            formatoMoneda(formatoMoneda(odonto.valor)),
                            0,
                            formatoMoneda(odonto.valor),
                            ' <div class="circle ' + clase + '"></div>',
                            estado
                        ]).draw(false).node();

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle status-circle');
                    }

                });

                 $('#table_pagos_reasignar_grupos tbody').empty();
                    todos.forEach(function(odonto) {
                        if (odonto.presupuesto == 1) {
                            let fila = `<tr>
                            <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                            <td>${odonto.diagnostico_tratamiento}</td>
                            <td>${formatoMoneda(odonto.valor)}</td>
                            <td><button type="button" class="btn btn-danger" onclick="eliminar_diagnostico(${odonto.id},'gral',this)"><i class="feather icon-x"> </i> </button></td>
                        </tr>`;
                            $('#table_pagos_reasignar_grupos tbody').append(fila);
                        }
                    });
            },
            error: function(xhr, status, error){
                console.log(xhr.responseText);
            }
        })
    }

    function eliminar_tratamiento(id, tipo_examen){
        swal({
            title: "¿Esta seguro que desea ELIMINAR el tratamiento?",
            text: "Favor confirme o cancele la solicitud",
            icon: "warning",
            buttons: ["Cancelar", "Solicitar"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete)
            {
                confirmar_eliminar_tratamiento(id, tipo_examen);
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

    function confirmar_eliminar_tratamiento(id, tipo_examen){
        let url = "{{ ROUTE('profesional.eliminar_tratamiento_dental') }}";
        let data = {
            'id': id,
            'id_paciente' : $('#id_paciente_fc').val(),
            '_token': CSRF_TOKEN
        }
        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                if(tipo_examen == 'gral'){
                    let tratamientos = response.maxilar_superior_gral_tratamiento;
                    $('#tbody_tratamientos').empty();
                    $('#planificacion_max_sup_tratamientos_gral').empty();
                    $('#contenedor_maxilar_superior_gral_tratamientos_presupuesto').empty();
                    tratamientos.forEach(tratamiento => {
                        let html = `<tr>
                                    <td class="text-center align-middle">${tratamiento.fecha}</td>
                                    <td class="text-center align-middle">${tratamiento.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${tratamiento.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${tratamiento.comentario}</td>
                                    <td class="text-center align-middle">${tratamiento.valor} </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento(${tratamiento.id},'gral')"><i class="feather icon-x"></i></button>
                                         ${tratamiento.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${tratamiento.id},'gral', this);"><i class="feather icon-shopping-cart"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${tratamiento.id},'gral', this);"><i class="feather icon-shopping-cart"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_tratamientos').append(html);
                        $('#planificacion_max_sup_tratamientos_gral').append(`
                        <div class="form-row">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">${tratamiento.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" value="${tratamiento.especialidad_examen} ${tratamiento.diagnostico_tratamiento}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                        <option selected="" value="1">Uniradicular</option>
                                        <option value="2">Biradicular</option>
                                        <option value="2">Triradicular</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Convenio</label>
                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                        <option selected="" value="1">Convenio</option>
                                        <option value="2">Sin Convenio</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        `);
                        if(tratamiento.presupuesto == 1){
                            $('#contenedor_maxilar_superior_gral_tratamientos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${tratamiento.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${tratamiento.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${tratamiento.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${tratamiento.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" >Ver Estado Trabajo</button>
                                </div>
                            `);
                        }

                    });
                }else if(tipo_examen == 'endo'){
                    let tratamientos = response.maxilar_superior_gral_tratamiento_endo;
                    $('#tbody_tratamientos_endo').empty();
                    $('#planificacion_max_sup_tratamientos_endo').empty();
                    $('#contenedor_maxilar_superior_endo_tratamientos_presupuesto').empty();
                    tratamientos.forEach(tratamiento => {
                        let html = `<tr>
                                    <td class="text-center align-middle">${tratamiento.fecha}</td>
                                    <td class="text-center align-middle">${tratamiento.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${tratamiento.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${tratamiento.comentario}</td>
                                    <td class="text-center align-middle">${tratamiento.valor} </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento(${tratamiento.id},'endo')"><i class="feather icon-x"></i></button>
                                         ${tratamiento.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${tratamiento.id},'gral', this);"><i class="feather icon-shopping-cart"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${tratamiento.id},'gral', this);"><i class="feather icon-shopping-cart"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_tratamientos_endo').append(html);
                        $('#planificacion_max_sup_tratamientos_endo').append(`
                        <div class="form-row">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">${tratamiento.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" value="${tratamiento.especialidad_examen} ${tratamiento.diagnostico_tratamiento}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                        <option selected="" value="1">Uniradicular</option>
                                        <option value="2">Biradicular</option>
                                        <option value="2">Triradicular</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Convenio</label>
                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                        <option selected="" value="1">Convenio</option>
                                        <option value="2">Sin Convenio</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        `);
                        if(tratamiento.presupuesto == 1){
                            $('#contenedor_maxilar_superior_endo_tratamientos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${tratamiento.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${tratamiento.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${tratamiento.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${tratamiento.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" >Ver Estado Trabajo</button>
                                </div>
                            `);
                        }

                    });
                }
                let valores_examenes = response.valores_tratamientos[0];
                let valores_piezas = response.valores_tratamientos[1];

                $('#valores_examenes_presupuesto').html(formatoMoneda(valores_examenes));
                $('#valores_piezas_presupuesto').html(formatoMoneda(valores_piezas));
            },
            error: function(xhr, status, error){
                console.log(xhr.responseText);
            }
        });
    }
</script>
