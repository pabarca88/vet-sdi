<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row bg-white shadow-sm rounded mx-3 mt-4">
            <div class="col-md-12">
                <form id="form_ingreso_paciente_cirugia"
                    action="{{ route('dental.registrar_epicrisis_carnet_cirugia') }}" method="POST">

                    @csrf
                    <input type="hidden" name="ficha_id_ingreso_epicrisis_carnet_cirugia_dental"
                        id="ficha_id_ingreso_epicrisis_carnet_cirugia_dental"
                        value=" @if ($ficha != null) {{ $ficha->id }} @endif">
                    <input type="hidden" name="paciente_ingreso_epicrisis_carnet_cirugia_dental"
                        id="paciente_ingreso_epicrisis_carnet_cirugia_dental" value="{{ $paciente->id }}">

                    <div class="row">
                        <div class="col-md-12 mt-3 mb-0">
                            <h6 class="f-16 text-c-blue">Sala de recuperación</h6>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="form-row">
                                <h6 class="mb-3">I.- Datos de hospitalización</h6>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="floating-label-activo-sm">Desde</label>
                                    <input type="date" class="form-control form-control-sm"
                                        name="fecha_inicio_epicrisis_carnet_cirugia_dental"
                                        id="fecha_inicio_epicrisis_carnet_cirugia_dental">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label-activo-sm">Hasta</label>
                                    <input type="date" class="form-control form-control-sm"
                                        name="fecha_termino_epicrisis_carnet_cirugia_dental"
                                        id="fecha_termino_epicrisis_carnet_cirugia_dental">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Total de días</label>
                                    <input type="text" class="form-control form-control-sm" name="dias" id="dias">
                                </div>
                            </div>
                            <div class="form-row">
                                <h6 class="my-3">II.- Dignósticos</h6>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="floating-label">Diagnósticos de ingreso</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4"
                                        onblur="this.rows=2;" name="diagnostico_ingreso_epicrisis_carnet_cirugia_dental"
                                        id="diagnostico_ingreso_epicrisis_carnet_cirugia_dental"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="floating-label">Diagnósticos de alta</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4"
                                        onblur="this.rows=2;" name="diagnostico_alta_epicrisis_carnet_cirugia_dental"
                                        id="diagnostico_alta_epicrisis_carnet_cirugia_dental"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <h6 class="my-3">III.- Tratamientos y cirugías realizadas</h6>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Tratamientos</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4"
                                        onblur="this.rows=2;" name="tratamiento_cirugia_epicrisis_carnet_cirugia_dental"
                                        id="tratamiento_cirugia_epicrisis_carnet_cirugia_dental"></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Procedimientos quirúrgicos</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4"
                                        onblur="this.rows=2;"
                                        name="procedimiento_quirurgico_cirugia_epicrisis_carnet_cirugia_dental"
                                        id="procedimiento_quirurgico_cirugia_epicrisis_carnet_cirugia_dental"></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Otros procedimientos y/o tratamientos</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4"
                                        onblur="this.rows=2;"
                                        name="otro_procedimiento_tratamiento_cirugia_epicrisis_carnet_cirugia_dental"
                                        id="otro_procedimiento_tratamiento_cirugia_epicrisis_carnet_cirugia_dental"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <h6 class="my-3">IV.- Controles y evolución intrahospitalaria</h6>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="floating-label">Tratamientos</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4"
                                        onblur="this.rows=2;"
                                        name="tratamiento_control_cirugia_epicrisis_carnet_cirugia_dental"
                                        id="tratamiento_control_cirugia_epicrisis_carnet_cirugia_dental"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="floating-label">Procedimientos quirúrgicos</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4"
                                        onblur="this.rows=2;"
                                        name="procedimiento_control_cirugia_epicrisis_carnet_cirugia_dental"
                                        id="procedimiento_control_cirugia_epicrisis_carnet_cirugia_dental"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <h6 class="my-3">V.- Controles e indicaciones al alta</h6>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm"
                                        name="fecha_control_alta_epicrisis_carnet_cirugia_dental"
                                        id="fecha_control_alta_epicrisis_carnet_cirugia_dental">
                                </div>
                                <div class="form-group col-md-8">
                                    <label class="floating-label">Indicaciones al alta</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4"
                                        onblur="this.rows=2;" name="indicaciones_alta_epicrisis_carnet_cirugia_dental"
                                        id="indicaciones_alta_epicrisis_carnet_cirugia_dental"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-success" onclick="carnet_alta();">Carnet de
                                alta</button>
                            <button type="submit" class="btn btn-info">Guardar epicrisis</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
