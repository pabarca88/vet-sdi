<div id="tratamiento_maxilar_inferior" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="tratamiento_maxilar_inferior" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Maxilar inferior</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="form_diagnostico_tratamiento_inferior">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" id="fecha_registro_inf" name="fecha_registro_inf" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Diagnóstico</label>
                                <select class="form-control form-control-sm" id="diagnostico_combo_inf">
                                    <option value="0">Seleccione</option>
                                    @foreach ($diagnosticos as $d)
                                        <option value="{{ $d->id }}">{{ $d->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Tratamiento</label>
                                <input type="text" class="form-control form-control-sm" id="diag_seleccionado_max_inf_gral_autocomplete" name="diag_seleccionado_max_inf_gral_autocomplete">
                            </div>
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Comentarios</label>
                                <textarea class="form-control form-control-sm" rows="2" id="comentarios_max_inf" name="comentarios_max_inf"></textarea>
                            </div>
                            <div class="form-group d-none">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="terminado_checkbox_inf" value="1">
                                    <label class="form-check-label" for="terminado_checkbox_inf">Trabajo terminado</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="control_checkbox_inf" value="1">
                                    <label class="form-check-label" for="control_checkbox_inf">Agendar control</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-success btn-sm btn-block" onclick="guardarDiagnosticoTratamientoInferior()">
                                    <i class="fa fa-plus"></i> Agregar Diagnóstico/Tratamiento
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('img_dental/boca_inf.png') }}" class="img-fluid">
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
                            <tbody id="tbody_diagnosticos_tratamientos_inf">
                                @foreach($todos as $diagnostico)
                                @if($diagnostico->localizacion == 'Maxilar inferior')
                                    <tr>
                                        <td class="text-center">{{ $diagnostico->fecha }}</td>
                                        <td class="text-center">{{ $diagnostico->descripcion }}</td>
                                        <td class="text-center">{{ $diagnostico->diagnostico_tratamiento }}</td>
                                        <td class="text-center">{{ $diagnostico->comentario }}</td>
                                        <td class="text-center">{{ $diagnostico->terminado ? 'TERMINADO' : 'PENDIENTE' }}</td>
                                        <td class="text-center">{{ number_format($diagnostico->valor, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_tratamiento_inf({{ $diagnostico->id }},'gral')">
                                                <i class="feather icon-x"></i>
                                            </button>
                                            @if($diagnostico->presupuesto == 0)
                                                <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto({{ $diagnostico->id }},'gral', this)"></button>
                                            @else
                                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto({{ $diagnostico->id }},'gral', this)"></button>
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
                <button class="btn btn-info" onclick="guardarTodoInferior()">Guardar</button>
            </div>
        </div>
    </div>
</div>

<div id="tratamiento_maxilar_inferior_endo" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="tratamiento_maxilar_inferior" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_tratamiento_dental">Maxilar inferior Endodoncia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                    <li class="nav-item">
                        <a class="btn btn-outline-info active btn-sm mr-1 my-1" id="diagnostico_max_inf_endo-tab" data-toggle="tab" href="#diagnostico_max_inf_endo" role="tab" aria-controls="diagnostico_max_inf_endo" aria-selected="false">Diagnostico</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-info btn-sm mr-1 my-1" id="tratamiento_max_inf_endo-tab" data-toggle="tab" href="#tratamiento_max_inf_endo" role="tab" aria-controls="tratamiento_max_inf_endo" aria-selected="false">Tratamiento</a>
                    </li>
                </ul>
                <div class="tab-content" id="Profesionales_cm">
                    <div class="tab-pane fade active show" id="diagnostico_max_inf_endo" role="tabpanel" aria-labelledby="diagnostico_max_inf_endo-tab">
                        <form class="mt-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Fecha diagnostico</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_diag_max_inf_endo"
                                            id="fecha_diag_max_inf_endo">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Diagnostico</label>
                                        <input type="text" name="diag_seleccionado_max_inf_endo_autocomplete" id="diag_seleccionado_max_inf_endo_autocomplete" class="form-control form-control-sm">

                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Comentarios</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="2"
                                            name="comentarios_diag_max_inf_endo" id="comentarios_diag_max_inf_endo"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1_diag_max_inf_endo"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1_diag_max_inf_endo">Trabajo terminado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2_diag_max_inf_endo"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox2_diag_max_inf_endo">Agendar control</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-sm  btn-block" onclick="agregar_diagnostico_dental_max_inf('Maxilar inferior','endo')"><i
                                                class="fa fa-plus"></i> Agregar Diagnostico</button>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('img_dental/boca_inf.png') }}">
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
                                            <tbody id="tbody_diagnosticos_max_inf_endo">
                                                @foreach ($maxilar_inferior_gral_diagnosticos_endo as $t)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $t->fecha }}</td>
                                                        <td class="text-center align-middle">{{ $t->diagnostico_tratamiento == '' ? 'SIN INFORMACION' : $t->diagnostico_tratamiento}}</td>
                                                        <td class="text-center align-middle">{{ $t->terminado == 1 ? 'TERMINADO' : 'PENDIENTE' }}</td>
                                                        <td class="text-center align-middle">{{ $t->comentario }}</td>
                                                        <td class="text-center align-middle">{{ number_format($t->valor,0,',','.') }}</td>
                                                        <td class="text-center align-middle"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_diagnostico_max_inf({{ $t->id }},'endo')"><i
                                                                    class="fa fa-trash"></i></button>
                                                                    @if($t->presupuesto == 0)
                                                                    <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto({{ $t->id }},'gral', this)"></button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto({{ $t->id }},'gral', this)"></button>
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
                    <div class="tab-pane fade" id="tratamiento_max_inf_endo" role="tabpanel" aria-labelledby="tratamiento_max_inf_endo-tab">
                        <form class="mt-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Fecha procedimiento</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_proc_max_inf_endo"
                                            id="fecha_proc_max_inf_endo">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Procedimiento</label>
                                        <input type="text" name="proc_seleccionado_max_inf_endo_autocomplete" id="proc_seleccionado_max_inf_endo_autocomplete" class="form-control form-control-sm">

                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Comentarios</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="2"
                                            name="comentarios_tratamiento_max_inf_endo" id="comentarios_tratamiento_max_inf_endo"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1_tratamiento_max_inf_endo"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1_tratamiento_max_inf_endo">Trabajo terminado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2_tratamiento_max_inf_endo"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox2_tratamiento_max_inf_endo">Agendar control</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-sm  btn-block" onclick="agregar_tratamiento_dental_max_inf('Maxilar inferior','endo')"><i
                                                class="fa fa-plus"></i> Agregar Tratamiento</button>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('img_dental/boca_inf.png') }}">
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
                                            <tbody id="tbody_tratamientos_max_inf_endo">
                                                @foreach($maxilar_inferior_gral_tratamientos_endo as $tratamiento)
                                                <tr>
                                                    <td class="text-center align-middle">{{$tratamiento->fecha}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->diagnostico_tratamiento == '' ? 'SIN INFORMACION' : $tratamiento->diagnostico_tratamiento}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->comentario}}</td>
                                                    <td class="text-center align-middle">{{number_format($tratamiento->valor,0,',','.')}}</td>
                                                    <td class="text-center align-middle">
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_max_inf({{ $tratamiento->id }},'endo')"><i
                                                                class="feather icon-x"></i></button>
                                                                @if($tratamiento->terminado == 1)
                                                                <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="agregar_a_presupuesto({{ $tratamiento->id }},'endo')"><i
                                                                    class="feather icon-shopping-cart"></i></button>
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
<div id="tratamiento_maxilar_inferior_odontop" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="tratamiento_maxilar_inferior" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_tratamiento_dental">Maxilar inferior</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                    <li class="nav-item">
                        <a class="btn btn-outline-info active btn-sm mr-1 my-1" id="diagnostico_max_inf-tab" data-toggle="tab" href="#diagnostico_max_inf" role="tab" aria-controls="diagnostico_max_inf" aria-selected="false">Diagnostico</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-info btn-sm mr-1 my-1" id="tratamiento_max_inf-tab" data-toggle="tab" href="#tratamiento_max_inf" role="tab" aria-controls="tratamiento_max_inf" aria-selected="false">Tratamiento</a>
                    </li>
                </ul>
                <div class="tab-content" id="Profesionales_cm">
                    <div class="tab-pane fade active show" id="diagnostico_max_inf" role="tabpanel" aria-labelledby="diagnostico_max_inf-tab">
                        <form class="mt-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Fecha diagnostico</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_diag_max_inf_odontop"
                                            id="fecha_diag_max_inf_odontop">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Diagnostico</label>
                                        <input type="text" name="diag_seleccionado_max_inf_odontop" id="diag_seleccionado_max_inf_odontop" class="form-control form-control-sm">

                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Comentarios</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="2"
                                            name="comentarios_diag_max_inf_odontop" id="comentarios_diag_max_inf_odontop"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1_diag_max_inf_odontop"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1_diag_max_inf_odontop">Trabajo terminado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2_diag_max_inf_odontop"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox2_diag_max_inf_odontop">Agendar control</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-sm  btn-block" onclick="agregar_diagnostico_dental_max_inf('Maxilar inferior','odontop')"><i
                                                class="fa fa-plus"></i> Agregar Diagnostico</button>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('img_dental/boca_inf.png') }}">
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
                                            <tbody id="tbody_diagnosticos_max_inf_odontop">
                                                @foreach ($maxilar_inferior_gral_diagnosticos as $t)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $t->fecha }}</td>
                                                        <td class="text-center align-middle">{{ $t->diagnostico_tratamiento == '' ? 'SIN INFORMACION' : $t->diagnostico_tratamiento }}</td>
                                                        <td class="text-center align-middle">{{ $t->terminado == 1 ? 'TERMINADO' : 'PENDIENTE' }}</td>
                                                        <td class="text-center align-middle">{{ $t->comentario }}</td>
                                                        <td class="text-center align-middle">{{ number_format($t->valor,0,',','.') }}</td>
                                                        <td class="text-center align-middle"><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_diagnostico_max_inf({{ $t->id }},'odontop')"><i
                                                                    class="fa fa-trash"></i></button>
                                                                    @if($t->presupuesto == 0)
                                                                    <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto({{ $t->id }},'gral', this)"></button>
                                                                @else
                                                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto({{ $t->id }},'gral', this)"></button>
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
                    <div class="tab-pane fade" id="tratamiento_max_inf" role="tabpanel" aria-labelledby="tratamiento_max_inf-tab">
                        <form class="mt-5">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Fecha procedimiento</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_proc_max_inf_odontop"
                                            id="fecha_proc_max_inf_odontop">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Procedimiento</label>
                                        <input type="text" name="proc_seleccionado_max_inf_odontop" id="proc_seleccionado_max_inf_odontop" class="form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Comentarios</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="2"
                                            name="comentarios_tratamiento_max_inf_odontop" id="comentarios_tratamiento_max_inf_odontop"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1_tratamiento_max_inf_odontop"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1_tratamiento_max_inf_odontop">Trabajo terminado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2_tratamiento_max_inf_odontop"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox2_tratamiento_max_inf_odontop">Agendar control</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success btn-sm  btn-block" onclick="agregar_tratamiento_dental_max_inf('Maxilar inferior','odontop')"><i
                                                class="fa fa-plus"></i> Agregar Tratamiento</button>
                                    </div>
                                </div>
                                <div class="col-md-4 text-center">
                                    <img src="{{ asset('img_dental/boca_inf.png') }}">
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
                                            <tbody id="tbody_tratamientos_max_inf">
                                                @foreach($maxilar_inferior_gral_tratamientos as $tratamiento)
                                                <tr>
                                                    <td class="text-center align-middle">{{$tratamiento->fecha}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->procedimiento == '' ? 'SIN INFORMACION' : $tratamiento->procedimiento}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}}</td>
                                                    <td class="text-center align-middle">{{$tratamiento->comentario}}</td>
                                                    <td class="text-center align-middle">{{number_format($tratamiento->valor,0,',','.')}}</td>
                                                    <td class="text-center align-middle">
                                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_max_inf({{ $tratamiento->id }},'odontop')"><i
                                                                class="feather icon-x"></i></button>
                                                                @if($tratamiento->terminado == 1)
                                                                <button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto({{ $tratamiento->id }},'gral')"></button>
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
    function maxilar_inferior() {
        $('#tratamiento_maxilar_inferior').modal('show');
    }

    function maxilar_inferior_endo() {
        $('#tratamiento_maxilar_inferior_endo').modal('show');
    }

    function maxilar_inferior_odontop() {
        $('#tratamiento_maxilar_inferior_odontop').modal('show');
    }

    function agregar_tratamiento_dental_max_inf(localizacion_examen, tipo_examen){
        let fecha_proc = $('#fecha_proc_max_inf_'+tipo_examen).val();
        let proc_seleccionado = $('#proc_seleccionado_max_inf_'+tipo_examen+'_autocomplete').val();
        let comentarios_tratamiento = $('#comentarios_tratamiento_max_inf_'+tipo_examen).val();
        let trabajo_terminado = $('#inlineCheckbox1_tratamiento_max_inf_'+tipo_examen).is(':checked')? 'Si' : 'No';
        let agendar_control = $('#inlineCheckbox2_tratamiento_max_inf_'+tipo_examen).is(':checked')? 'Si' : 'No';
        let id_ficha_atencion = $('#id_fc').val();
        let id_paciente = dame_id_paciente();
        let id_profesional = $('#id_profesional_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_especialidad = $('#id_especialidad').val();

        let valido = 1;
        let mensaje = '';

        if(fecha_proc == ''){
            valido = 0;
            mensaje += 'Debe seleccionar una fecha de procedimiento.\n';
        }

        if(proc_seleccionado == '-1'){
            valido = 0;
            mensaje += 'Debe seleccionar un procedimiento.\n';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                text: mensaje,
                type: 'error',
                confirmButtonText: 'Aceptar'
            });
            return false;
        }

        let data = {
            'fecha': fecha_proc,
            'diag_seleccionado': proc_seleccionado,
            'comentarios': comentarios_tratamiento,
            'trabajo_terminado': trabajo_terminado,
            'agendar_control': agendar_control,
            'id_ficha_atencion': id_ficha_atencion,
            'id_paciente': id_paciente,
            'id_profesional': id_profesional,
            'id_lugar_atencion': id_lugar_atencion,
            'tipo_examen': tipo_examen,
            'especialidad_examen':'tratamiento',
            'id_especialidad': id_especialidad,
            'localizacion_examen': localizacion_examen,
            '_token': CSRF_TOKEN
        }

        let url = "{{ ROUTE('profesional.guardar_examen_boca_general') }}";

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                if(tipo_examen == 'gral'){
                    let tratamientos = response.maxilar_inferior_gral_tratamiento;
                    $('#tbody_tratamientos_max_inf').empty();
                    $('#planificacion_max_inf_tratamientos_gral').empty();
                    $('#contenedor_maxilar_inferior_gral_tratamientos_presupuesto').empty();
                    tratamientos.forEach(t => {
                        let valor = new Intl.NumberFormat().format(t.valor);
                        $('#tbody_tratamientos_max_inf').append(`
                        <tr>
                            <td class="text-center align-middle">${t.fecha}</td>
                            <td class="text-center align-middle">${t.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : t.diagnostico_tratamiento}</td>
                            <td class="text-center align-middle">${t.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                            <td class="text-center align-middle">${t.comentario}</td>
                            <td class="text-center align-middle">${valor}</td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_max_inf(${t.id},'gral')"><i
                                        class="feather icon-x"></i></button>
                                        ${t.terminado == 1 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${t.id},'gral');"><i class="feather icon-shopping-cart"> </i> </button>` : ''}
                            </td>
                        </tr>
                        `);
                        $('#planificacion_max_inf_tratamientos_gral').append(`
                        <div class="form-row">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Maxilar inferior</label>
                                    <input type="text" class="form-control form-control-sm" value="${t.especialidad_examen} ${t.diagnostico_tratamiento}">
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
                        </div>
                        `);
                        if(t.presupuesto == 1){
                            $('#contenedor_maxilar_inferior_gral_tratamientos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${t.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${t.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${t.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${t.valor}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="btn btn-light btn-sm rounded m-0 float-right has-ripple feather icon-edit" >Ver Estado Trabajo</button>
                                </div>
                            `);
                        }

                    });
                }else if(tipo_examen == 'endo'){
                    let tratamientos = response.maxilar_inferior_gral_tratamiento_endo;
                    $('#tbody_tratamientos_max_inf_endo').empty();
                    $('#contenedor_maxilar_inferior_endo_tratamientos_presupuesto').empty();
                    tratamientos.forEach(t => {
                        let valor = new Intl.NumberFormat().format(t.valor);
                        $('#tbody_tratamientos_max_inf_endo').append(`
                        <tr>
                            <td class="text-center align-middle">${t.fecha}</td>
                            <td class="text-center align-middle">${t.diagnostico_tratamiento == '' ? 'SIN INFORMACION' : t.diagnostico_tratamiento}</td>
                            <td class="text-center align-middle">${t.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                            <td class="text-center align-middle">${t.comentario}</td>
                            <td class="text-center align-middle">${valor}</td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_max_inf(${t.id},'endo')"><i
                                        class="feather icon-x"></i></button>
                                         ${t.terminado == 1 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${t.id},'gral');"><i class="feather icon-shopping-cart"> </i> </button>` : ''}
                            </td>
                        </tr>
                        `);
                    });
                    $('#planificacion_max_inf_tratamientos_endo').empty();
                    tratamientos.forEach(t => {
                        $('#planificacion_max_inf_tratamientos_endo').append(`
                        <div class="form-row">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Maxilar inferior</label>
                                    <input type="text" class="form-control form-control-sm" value="${t.especialidad_examen} ${t.diagnostico_tratamiento}">
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
                        </div>
                        `);
                    });
                    tratamientos.forEach(t => {
                        if(t.presupuesto == 1){
                            $('#contenedor_maxilar_inferior_endo_tratamientos_presupuesto').append(`
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">${t.localizacion}</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="floating-label-activo-sm">Prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${t.diagnostico_tratamiento}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${t.valor}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="floating-label-activo-sm">Descuento</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="floating-label-activo-sm">Total prestación</label>
                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${t.valor}">
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
        })
    }

    function agregar_diagnostico_dental_max_inf(localizacion_examen, tipo_examen){
        let fecha = $('#fecha_diag_max_inf_'+tipo_examen).val();
        let diagnostico_seleccionado = $('#diag_seleccionado_max_inf_'+tipo_examen+'_autocomplete').val();
        let comentarios_diag = $('#comentarios_diag_max_inf_'+tipo_examen).val();
        let trabajo_terminado = $('#inlineCheckbox1_diag_max_inf_'+tipo_examen).is(':checked')? 'Si' : 'No';
        let agendar_control = $('#inlineCheckbox2_diag_max_inf_'+tipo_examen).is(':checked')? 'Si' : 'No';
        let id_ficha_atencion = $('#id_fc').val();
        let id_paciente = dame_id_paciente();
        let id_profesional = $('#id_profesional_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let id_especialidad = $('#id_especialidad').val();

        let valido = 1;
        let mensaje = '';

        if(fecha == ''){
            valido = 0;
            mensaje += 'Debe seleccionar una fecha de procedimiento.\n';
        }

        if(diagnostico_seleccionado == '-1'){
            valido = 0;
            mensaje += 'Debe seleccionar un diagnostico.\n';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                text: mensaje,
                type: 'error',
                confirmButtonText: 'Aceptar'
            });
            return false;
        }

        let data = {
            'fecha': fecha,
            'diag_seleccionado': diagnostico_seleccionado,
            'comentarios': comentarios_diag,
            'trabajo_terminado': trabajo_terminado,
            'agendar_control': agendar_control,
            'id_ficha_atencion': id_ficha_atencion,
            'id_paciente': id_paciente,
            'id_profesional': id_profesional,
            'id_lugar_atencion': id_lugar_atencion,
            'tipo_examen': tipo_examen,
            'especialidad_examen':'diagnostico',
            'id_especialidad': id_especialidad,
            'localizacion_examen': localizacion_examen,
            '_token': CSRF_TOKEN
        }

        let url = "{{ ROUTE('profesional.guardar_examen_boca_general') }}";

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                if(tipo_examen == 'gral'){
                    let diagnosticos = response.maxilar_inferior_gral_diagnostico;
                    $('#tbody_diagnosticos_max_inf').empty();
                    $('#planificacion_max_inf_diagnosticos_gral').empty();
                    $('#contenedor_maxilar_inferior_gral_diagnosticos_presupuesto').empty();
                    diagnosticos.forEach(diagnostico => {
                        let valor = new Intl.NumberFormat("de-DE").format(diagnostico.valor);
                        let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>
                                    <td class="text-center align-middle">${valor} </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_max_inf(${diagnostico.id},'gral')"><i class="feather icon-x"></i></button>
                                         ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="feather icon-shopping-cart"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral', this);"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_diagnosticos_max_inf').append(html);
                        $('#planificacion_max_inf_diagnosticos_gral').append(`
                            <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Maxilar inferior</label>
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
                            </div>
                        `);
                        if(diagnostico.presupuesto == 1){
                            $('#contenedor_maxilar_inferior_gral_diagnosticos_presupuesto').append(`
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
                }else if(tipo_examen == 'endo'){
                    let diagnosticos = response.maxilar_inferior_gral_diagnostico_endo;
                    $('#tbody_diagnosticos_max_inf_endo').empty();
                    $('#planificacion_max_inf_diagnosticos_endo').empty();
                    $('#contenedor_maxilar_inferior_endo_diagnosticos_presupuesto').empty();
                    diagnosticos.forEach(diagnostico => {
                        let valor = new Intl.NumberFormat("de-DE").format(diagnostico.valor);
                        let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>
                                    <td class="text-center align-middle">${valor} </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_max_inf(${diagnostico.id},'endo')"><i class="feather icon-x"></i></button>
                                        ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="feather icon-shopping-cart"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral', this);"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_diagnosticos_max_inf_endo').append(html);
                        $('#planificacion_max_inf_diagnosticos_endo').append(`
                        <div id="planificacion_max_inf_diagnosticos_gral">
                                                                                                                                                                                                                            <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Maxilar inferior</label>
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
                            </div>
                        </div>
                        `);
                        if(diagnostico.presupuesto == 1){
                            $('#contenedor_maxilar_inferior_endo_diagnosticos_presupuesto').append(`
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
                let valores_examenes = response.valores_tratamientos[0];
                let valores_piezas = response.valores_tratamientos[1];

                $('#valores_examenes_presupuesto').html(formatoMoneda(valores_examenes));
                $('#valores_piezas_presupuesto').html(formatoMoneda(valores_piezas));
            },
            error: function(xhr, status, error){
                console.log(xhr.responseText);
            }
        })

    }

    function eliminar_diagnostico_max_inf(id, tipo_examen){
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
                        confirmar_eliminar_diagnostico_max_inf(id, tipo_examen);
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

    function confirmar_eliminar_diagnostico_max_inf(id, tipo_examen){
        let url = "{{ ROUTE('profesional.eliminar_diagnostico_dental') }}";
        let data = {
            'id': id,
            'id_paciente' : dame_id_paciente(),
            'id_ficha_atencion' : $('#id_fc').val(),
            'id_lugar_atencion': $('#id_lugar_atencion').val(),
            '_token': CSRF_TOKEN
        }

        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                if(tipo_examen == 'gral'){
                    let diagnosticos = response.maxilar_inferior_gral_diagnostico;
                    $('#tbody_diagnosticos_max_inf').empty();
                    $('#planificacion_max_inf_diagnosticos_gral').empty();
                    $('#contenedor_maxilar_inferior_gral_diagnosticos_presupuesto').empty();
                    diagnosticos.forEach(diagnostico => {
                        let valor = new Intl.NumberFormat("de-DE").format(diagnostico.valor);
                        let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>
                                    <td class="text-center align-middle">${valor} </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_max_inf(${diagnostico.id},'gral')"><i class="feather icon-x"></i></button>
                                        ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="feather icon-shopping-cart"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral', this);"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_diagnosticos_max_inf').append(html);
                        $('#planificacion_max_inf_diagnosticos_gral').append(`
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
                                    </div>
                        `);
                        if(diagnostico.presupuesto == 1){
                            $('#contenedor_maxilar_inferior_gral_diagnosticos_presupuesto').append(`
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
                }else if(tipo_examen == 'endo'){
                    let diagnosticos = response.maxilar_inferior_gral_diagnostico_endo;
                    $('#tbody_diagnosticos_max_inf_endo').empty();
                    $('#planificacion_max_inf_diagnosticos_endo').empty();
                    $('#contenedor_maxilar_inferior_endo_diagnosticos_presupuesto').empty();
                    diagnosticos.forEach(diagnostico => {
                        let valor = new Intl.NumberFormat("de-DE").format(diagnostico.valor);
                        let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>
                                    <td class="text-center align-middle">${diagnostico.valor} </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico_max_inf(${diagnostico.id},'endo')"><i class="feather icon-x"></i></button>
                                        ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral');"><i class="feather icon-shopping-cart"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral', this);"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_diagnosticos_max_inf_endo').append(html);
                        $('#planificacion_max_inf_diagnosticos_endo').append(`
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
                                    </div>
                        `);
                        if(diagnostico.presupuesto == 1){
                            $('#contenedor_maxilar_inferior_endo_diagnosticos_presupuesto').append(`
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
                let valores_examenes = response.valores_tratamientos[0];
                let valores_piezas = response.valores_tratamientos[1];

                $('#valores_examenes_presupuesto').html(formatoMoneda(valores_examenes));
                $('#valores_piezas_presupuesto').html(formatoMoneda(valores_piezas));
            },
            error: function(xhr, status, error){
                console.log(xhr.responseText);
            }
        })
    }

    function eliminar_tratamiento_max_inf(id, tipo_examen){
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
                confirmar_eliminar_tratamiento_max_inf(id, tipo_examen);
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

    function confirmar_eliminar_tratamiento_max_inf(id, tipo_examen){
        let url = "{{ ROUTE('profesional.eliminar_tratamiento_dental') }}";
        let data = {
            'id': id,
            'id_paciente' : dame_id_paciente(),
            'id_ficha_atencion' : $('#id_fc').val(),
            'id_lugar_atencion' : $('#id_lugar_atencion').val(),
            '_token': CSRF_TOKEN
        }
        $.ajax({
            type: 'post',
            url: url,
            data: data,
            success: function(response){
                console.log(response);
                if(tipo_examen == 'gral'){
                    let tratamientos = response.maxilar_inferior_gral_tratamiento;
                    $('#tbody_tratamientos_max_inf').empty();
                    $('#planificacion_max_inf_tratamientos_gral').empty();
                    $('#contenedor_maxilar_inferior_gral_tratamientos_presupuesto').empty();
                    tratamientos.forEach(tratamiento => {
                        let valor = new Intl.NumberFormat("de-DE").format(tratamiento.valor);
                        let html = `<tr>
                                    <td class="text-center align-middle">${tratamiento.fecha}</td>
                                    <td class="text-center align-middle">${tratamiento.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${tratamiento.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${tratamiento.comentario}</td>
                                    <td class="text-center align-middle">${valor} </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_max_inf(${tratamiento.id},'gral')"><i class="feather icon-x"></i></button>
                                        ${tratamiento.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${tratamiento.id},'gral');"><i class="feather icon-shopping-cart"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${tratamiento.id},'gral', this);"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                        $('#tbody_tratamientos_max_inf').append(html);
                        $('#planificacion_max_inf_tratamientos_gral').append(`
                        <div class="form-row">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Maxilar inferior</label>
                                    <input type="text" class="form-control form-control-sm" value="${tratamiento.especialidad_examen} ${tratamiento.diagnostico_tratamiento}">
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
                        </div>
                        `);
                        if(tratamiento.presupuesto == 1){
                            $('#contenedor_maxilar_inferior_gral_tratamientos_presupuesto').append(`
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
                    let tratamiento = response.maxilar_inferior_gral_tratamiento_endo;
                    $('#tbody_tratamientos_max_inf_endo').empty();
                    $('#planificacion_max_inf_tratamientos_endo').empty();
                    $('#contenedor_maxilar_inferior_endo_tratamientos_presupuesto').empty();
                    tratamiento.forEach(tratamiento => {
                        // dar formato de moneda al valor
                        let valor = new Intl.NumberFormat("de-DE").format(tratamiento.valor);
                        let html = `<tr>
                            <td class="text-center align-middle">${tratamiento.fecha}</td>
                            <td class="text-center align-middle">${tratamiento.diagnostico_tratamiento}</td>
                            <td class="text-center align-middle">${tratamiento.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                            <td class="text-center align-middle">${tratamiento.comentario}</td>
                            <td class="text-center align-middle">${valor} </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_tratamiento_max_inf(${tratamiento.id},'endo')"><i class="feather icon-x"></i></button>
                                ${tratamiento.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${tratamiento.id},'gral');"><i class="feather icon-shopping-cart"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${tratamiento.id},'gral', this);"><i class="fas fa-save"> </i> </button>`}
                            </td>
                        </tr>`;
                        $('#tbody_tratamientos_max_inf_endo').append(html);
                        $('#planificacion_max_inf_tratamientos_endo').append(`
                            <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Maxilar inferior</label>
                                        <input type="text" class="form-control form-control-sm" value="${tratamiento.especialidad_examen} ${tratamiento.diagnostico_tratamiento}">
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
                            </div>
                        `);
                        if(tratamiento.presupuesto == 1){
                            $('#contenedor_maxilar_inferior_endo_tratamientos_presupuesto').append(`
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

     function guardarDiagnosticoTratamientoInferior() {
        const fecha = $('#fecha_registro_inf').val();
        const diagnostico = $('#diagnostico_combo_inf').val();
        const tratamiento = $('#diag_seleccionado_max_inf_gral_autocomplete').val();
        const comentarios = $('#comentarios_max_inf').val();
        const terminado = $('#terminado_checkbox_inf').is(':checked') ? 1 : 0;
        const agendarControl = $('#control_checkbox_inf').is(':checked') ? 1 : 0;

        const id_ficha_atencion = $('#id_fc').val();
        const id_paciente = $('#id_paciente_fc').val();
        const id_profesional = $('#id_profesional_fc').val();
        const id_lugar_atencion = $('#id_lugar_atencion').val();
        const id_especialidad = $('#id_especialidad').val();
        const tipo_examen = 'maxilar_inferior';
        const localizacion_examen = 'Maxilar inferior';

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
            _token: CSRF_TOKEN // Asegúrate de tener definida esta variable
        };

        $.ajax({
            type: 'POST',
            url: "{{ route('profesional.guardar_examen_boca_general') }}", // Asegúrate de que este `route` esté bien definido
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
                $('#tbody_diagnosticos_tratamientos_inf').empty();
                $('#planificacion_max_sup_diagnosticos_gral').empty();
                $('#contenedor_maxilar_superior_gral_diagnosticos_presupuesto').empty();
                diagnosticos.forEach(diagnostico => {
                    if(diagnostico.localizacion == 'Maxilar inferior'){
                    let html = `<tr>
                                <td class="text-center align-middle">${diagnostico.fecha}</td>
                                <td class="text-center align-middle">${diagnostico.descripcion}</td>
                                <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                <td class="text-center align-middle">${diagnostico.comentario}</td>
                                <td class="text-center align-middle">${diagnostico.valor}</td>
                                <td class="text-center align-middle">
                                    <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico(${diagnostico.id},'gral')"><i class="feather icon-x"></i></button>
                                    ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral', this);"><i class="feather icon-shopping-cart"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral', this);"><i class="fas fa-save"> </i> </button>`}
                                </td>
                            </tr>`;
                    $('#tbody_diagnosticos_tratamientos_inf').append(html);
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

     function eliminar_diagnostico_tratamiento_inf(id, tipo_examen){
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
                        confirmar_eliminar_diagnostico_max_inf(id, tipo_examen);
                    }
                });
    }

    function confirmar_eliminar_diagnostico_max_inf(id, tipo_examen){
        let url = "{{ ROUTE('profesional.eliminar_diagnostico_dental') }}";
        let data = {
            'id': id,
            'id_paciente' : dame_id_paciente(),
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
                    $('#tbody_diagnosticos_tratamientos_inf').empty();
                    $('#planificacion_max_sup_diagnosticos_gral').empty();
                    $('#contenedor_maxilar_superior_gral_diagnosticos_presupuesto').empty();
                    diagnosticos.forEach(diagnostico => {
                        if(diagnostico.localizacion == 'Maxilar inferior'){
                        let html = `<tr>
                                    <td class="text-center align-middle">${diagnostico.fecha}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico}</td>
                                    <td class="text-center align-middle">${diagnostico.diagnostico_tratamiento}</td>
                                    <td class="text-center align-middle">${diagnostico.terminado == 1 ? 'TERMINADO' : 'PENDIENTE'}</td>
                                    <td class="text-center align-middle">${diagnostico.comentario}</td>
                                    <td class="text-center align-middle">${diagnostico.valor}</td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_diagnostico(${diagnostico.id},'gral')"><i class="feather icon-x"></i></button>
                                         ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral', this);"><i class="feather icon-shopping-cart"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral', this);"><i class="fas fa-save"> </i> </button>`}
                                    </td>
                                </tr>`;
                               $('#tbody_diagnosticos_tratamientos_inf').append(html);
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
                                    </div>`);
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
                                         ${diagnostico.presupuesto == 0 ? `<button type="button" class="btn btn-primary btn-sm btn-icon" onclick="cargar_a_presupuesto(${diagnostico.id},'gral', this);"><i class="feather icon-shopping-cart"> </i> </button>` : `<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="sacar_de_presupuesto(${diagnostico.id},'gral', this);"><i class="fas fa-save"> </i> </button>`}
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
</script>
