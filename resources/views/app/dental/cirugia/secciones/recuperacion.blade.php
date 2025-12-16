<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row bg-white shadow-sm rounded mx-3 mt-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3 mb-0">
                        <h6 class="f-16 text-c-blue">Sala de recuperación</h6>
                        <hr>
                    </div>
                </div>
                <div class="row pt-0 mb-3">
                    <div class="col-md-2">
                        <h6 class="text-c-blue">Evoluciones</h6>
                    </div>
                    <div class="col-md-10 float-right">
                        <div class="btn-toolbar d-flex justify-content-end" role="toolbar"
                            aria-label="Toolbar with button groups">
                            <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                                <button type="button" class="btn btn-outline-success"
                                    onclick="indicar_medicamentos_cirugia();"><i
                                        class="feather icon-file-plus"></i>Recetario</button>
                                <button type="button" class="btn btn-outline-success" onclick="i_examen();"><i
                                        class="feather icon-file-plus"></i>Examen</button>
                                <button type="button" class="btn btn-outline-success accion_modal_interconsulta"><i
                                        class="feather icon-user"></i>
                                    Interconsulta
                                </button>

                                <button type="button" class="btn btn-primary"><i class="feather icon-plus"></i>Nueva
                                    evolución</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table class="table table-bordered table-xs">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Descripci&oacute;n Evoluci&oacute;n</th>
                                        <th class="text-center align-middle">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">02/12/2021</td>
                                        <td class="text-center align-middle">blanqueamiento</td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-danger btn-sm btn-icon"><i
                                                    class="feather icon-x"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                        <form id="form_recuperacion_cirugia"
                            action="{{ route('dental.registrar_evolucion_recuperacion_cirugia') }}" method="POST">

                            @csrf
                            <input type="hidden" name="ficha_id_ingreso_cirugia_dental"
                                id="ficha_id_ingreso_cirugia_dental"
                                value=" @if ($ficha != null) {{ $ficha->id }} @endif">
                            <input type="hidden" name="paciente_ingreso_cirugia_dental"
                                id="paciente_ingreso_cirugia_dental" value="{{ $paciente->id }}">

                            <input type="hidden" name="medicamentos_recuperacion_cirugia_dental"
                                id="medicamentos_recuperacion_cirugia_dental">

                            <input type="hidden" name="examenes_cirugia_dental" id="examenes_cirugia_dental">

                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label class="floating-label">Evoluci&oacute;n</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=5"
                                        onblur="this.rows=1;"></textarea>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <h6 class="text-c-blue">Resumen de evoluciones</h6>
                                </div>
                                <div class="form-group col-md-9">
                                    <textarea class="form-control form-control-sm" rows="3" onfocus="this.rows=5"
                                        onblur="this.rows=4;"></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info">Guardar formulario</button>
                                </div>
                            </div>

                        </form>
                        <!--Cierre: Tabla-->
                    </div>
                </div>
                <div class="row">
                    <!--Evoluciones-->
                    <div class="col-sm-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <h6>15 de Febrero de 2022 <br>20:10</h6>
                                </div>
                                <div class="form-group col-md-9">
                                    <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=5"
                                        onblur="this.rows=3;"></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <h6>15 de Febrero de 2022 <br>20:10</h6>
                                </div>
                                <div class="form-group col-md-9">
                                    <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=5"
                                        onblur="this.rows=3;"></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <h6 class="text-c-blue">Resumen de evoluciones</h6>
                                </div>
                                <div class="form-group col-md-9">
                                    <textarea class="form-control form-control-sm" rows="3" onfocus="this.rows=5"
                                        onblur="this.rows=4;"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-md-12 text-center">
                        <button type="submit" onclick="registrar_cirugia_dental()" class="btn btn-info">Guardar
                            formulario</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Ficha Dental Indicaciones-->
@include(
    'app.dental.cirugia.modals.modal_indicar_medicamentos_cirugia'
)
@include('app.dental.modals.ficha.modal_indicar_examenes')
@include('app.dental.modals.ficha.modal_enfermedades_cronicas')
@include(
    'app.dental.modals.atencion_general.formularios_generales.interconsulta'
);
