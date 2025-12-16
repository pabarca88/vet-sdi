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
                        <h6 class="f-16 text-c-blue">Ingreso del paciente</h6>
                        <hr>
                    </div>
                </div>
                <form id="form_ingreso_paciente_cirugia"
                    action="{{ route('dental.registrar_ingreso_paciente_cirugia') }}" method="POST">

                    @csrf
                    <input type="hidden" name="ficha_id_ingreso_cirugia_dental" id="ficha_id_ingreso_cirugia_dental"
                        value=" @if ($ficha != null) {{ $ficha->id }} @endif">
                    <input type="hidden" name="paciente_ingreso_cirugia_dental" id="paciente_ingreso_cirugia_dental"
                        value="{{ $paciente->id }}">

                    <div class="row">
                        <div class="form-group col-md-12">
                            <script>
                                var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                    "Octubre", "Noviembre", "Diciembre");
                                var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                var f = new Date();
                                document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                    .getFullYear());
                            </script>
                        </div>
                        <!--Anamnesis-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Anamnesis</h6>
                                </div>
                                <div class="card-body shadow-none">

                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <textarea class="form-control form-control-sm" rows="2"
                                                onfocus="this.rows=5" onblur="this.rows=3;"
                                                id="anamnesis_ingreso_cirugia_dental"
                                                name="anamnesis_ingreso_cirugia_dental"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Antecedetes y examen físico-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Antecedetes y examen físico</h6>
                                </div>
                                <div class="card-body shadow-none">

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control form-control-sm"
                                                placeholder="Describir antecedentes y examen físico" rows="2"
                                                onfocus="this.rows=5" onblur="this.rows=3;"
                                                id="antecedentes_examenes_ingreso_cirugia_dental"
                                                name="antecedentes_examenes_ingreso_cirugia_dental"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Diagnóstico-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Diagnóstico</h6>
                                </div>
                                <div class="card-body shadow-none">

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Hipótesis diagnóstica</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="hipotesis_diagnostica_ingreso_cirugia_dental"
                                                id="hipotesis_diagnostica_ingreso_cirugia_dental">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Diagnóstico CIE-10</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="diagnostico_cie_ingreso_cirugia_dental"
                                                id="diagnostico_cie_ingreso_cirugia_dental">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Indicaciones de ingreso-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Indicaciones de ingreso</h6>
                                </div>
                                <div class="card-body shadow-none">

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control form-control-sm"
                                                placeholder="Indicaciones de ingreso" rows="2" onfocus="this.rows=5"
                                                onblur="this.rows=3;" name="indicaciones_ingreso_cirugia_dental"
                                                id="indicaciones_ingreso_cirugia_dental">></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="floating-label-activo-sm">Preparar para operar a las</label>
                                            <input type="time" class="form-control form-control-sm"
                                                name="hora_ingreso_cirugia_dental"
                                                id="hora_ingreso_cirugia_dentalhora_ingreso_cirugia_dental">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Hospitalizar en</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="hospitalizar_en_cirugia_dental"
                                                id="hospitalizar_en_cirugia_dental">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Tipo de sala</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="tipo_sala_cirugia_dental" id="tipo_sala_cirugia_dental">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Indicaciones-->
                        <div class="col-sm-12 mt-1">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1"
                                        onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar
                                        medicamento</button>
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1"
                                        onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <button type="reset" class="btn btn-danger">Borrar</button>
                            <button type="submit" class="btn btn-info">Enviar ingreso</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
