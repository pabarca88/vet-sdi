@extends('template.dental.template')

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
                                <h5 class="text-white d-inline ml-2 f-16 mt-1"><strong>Registro de atención parto
                                        normal</strong></h5>
                                <!--Fecha del día-->
                                <button type="button"
                                    class="btn btn-outline-light btn-sm d-inline float-right mr-4 mb-1">Finalizar
                                    atención</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
                <div class="col-md-12 py-0 px-2 shadow-none">
                    <div class="row mx-0">
                        <div class="col-md-12">
                        </div>
                    </div>
                    <div class="row bg-white shadow-sm rounded mx-3 mt-4">
                        <div class="col-md-12">
                            <form id="form_ingreso_paciente"
                                action="@if (isset($ingreso_paciente)) {{ route('cirugia.actualizar_ingreso_paciente_obstetrico') }} @else {{ route('cirugia.registrar_ingreso_paciente_obstetrico') }} @endif"
                                method="POST">

                                @csrf

                                <input type="hidden" name="id_solicitud_pabellon" id="id_solicitud_pabellon"
                                    value="{{ $id_solicitud_pabellon }}">

                                <input type="hidden" name="tipo_cirugia" id="tipo_cirugia" value="obstetrica">
                                @if (isset($ingreso_paciente))
                                    <input type="hidden" name="id_ingreso_paciente" id="id_ingreso_paciente"
                                        value="{{ $ingreso_paciente->id }}">
                                @endif

                                <input type="hidden" name="medicamentos_cirugia" id="medicamentos_cirugia">
                                <input type="hidden" name="examenes_cirugia" id="examenes_cirugia">
                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-1">
                                        <div class="form-row">
                                            <div class="form-group col-md-3 ">
                                                <h6 class="f-16 text-c-blue">Ingreso del paciente</h6>
                                            </div>

                                            <div class="form-group col-md-8">
                                                <script>
                                                    var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                                        "Octubre", "Noviembre", "Diciembre");
                                                    var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                                    var f = new Date();

                                                    document.write("<b>" + diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                                        .getFullYear() + "</b>");
                                                </script>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <a href="{{ ROUTE('cirugia.index_cirugia_obstetricia') }}"
                                                    class="btn btn-info btn-block btn-sm mt-1" data-toggle="tooltip"
                                                    data-placement="top" title="Volver"><i
                                                        class=""></i>VOLVER</a>
                                            </div>
                                        </div>

                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--Anamnesis-->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Anamnesis</h6>
                                            </div>
                                            <div class="card-body shadow-none">

                                                @if (isset($ingreso_paciente))
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <input class="form-control form-control-sm" name="anamnesis"
                                                                id="anamnesis" value="{{ $ingreso_paciente->anamnesis }}">
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <textarea class="form-control form-control-sm" name="anamnesis" id="anamnesis" rows="2" onfocus="this.rows=4"
                                                                onblur="this.rows=2;"></textarea>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <!--Antecedetes y examen físico materno-->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Antecedetes y examen físico materno</h6>
                                            </div>
                                            <div class="card-body shadow-none">

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Patología del embarazo</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="patologia_embarazo" id="patologia_embarazo"
                                                            value="@if (isset($ingreso_paciente->patologia_embarazo)) {{ $ingreso_paciente->patologia_embarazo }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Patologías crónicas</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="patologia_cronica" id="patologia_cronica"
                                                            value="@if (isset($ingreso_paciente->patologia_cronica)) {{ $ingreso_paciente->patologia_cronica }} @endif">
                                                    </div>
                                                </div>
                                                <div class="form-row">

                                                    @if (isset($ingreso_paciente))
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Describir otro antecedente</label>
                                                            <input class="form-control form-control-sm"
                                                                name="otros_antecedentes" id="otros_antecedentes"
                                                                value="{{ $ingreso_paciente->otros_antecedentes }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Describir otro antecedente</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                name="otros_antecedentes"
                                                                id="otros_antecedentes"></textarea>
                                                        </div>
                                                    @endif
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!--Antecedetes y examen físico fetal-->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Antecedetes y examen físico fetal</h6>
                                            </div>
                                            <div class="card-body shadow-none">

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Patología fetal</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="patologia" id="patologia"
                                                            value="@if (isset($ingreso_paciente->patologia)) {{ $ingreso_paciente->patologia }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Semanas de gestación</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="semanas_gestacion" id="semanas_gestacion"
                                                            value="@if (isset($ingreso_paciente->semanas_gestacion)) {{ $ingreso_paciente->semanas_gestacion }} @endif">
                                                    </div>
                                                </div>
                                                @if (isset($ingreso_paciente))
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Describir otro antecedente</label>
                                                            <input class="form-control form-control-sm"
                                                                name="otros_antecedentes_fetal"
                                                                id="otros_antecedentes_fetal"
                                                                value="{{ $ingreso_paciente->otros_antecedentes_fetal }}">
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Describir otro antecedente</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                name="otros_antecedentes_fetal"
                                                                id="otros_antecedentes_fetal"></textarea>
                                                        </div>
                                                    </div>
                                                @endif


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
                                                            name="hipotesis_diagnostica" id="hipotesis_diagnostica"
                                                            value="@if (isset($ingreso_paciente->hipotesis_diagnostica)) {{ $ingreso_paciente->hipotesis_diagnostica }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Diagnóstico CIE-10</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="diagnostico_cie10" id="diagnostico_cie10"
                                                            value="@if (isset($ingreso_paciente->diagnostico_cie10)) {{ $ingreso_paciente->diagnostico_cie10 }} @endif">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Indicaciones de inducción</h6>
                                                <i id="induccion" class="float-right f-18 d-inline fas fa-angle-down mb-0"
                                                    style="cursor:pointer;" onclick="abrir_toogle_indicaciones();"></i>
                                            </div>
                                            <div class="card-body shadow-none" id="induc_1" style="display: none;">

                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="floating-label">Indicaciones de inducción</label>
                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                            name="indidaciones_induccion"
                                                            id="indidaciones_induccion"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label-activo-sm">Hora comienzo</label>
                                                        <input type="time" class="form-control form-control-sm"
                                                            name="hora_comienzo_induccion" id="hora_comienzo_induccion">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Dilatación</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="dilatacion" id="dilatacion">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Hora esperada de parto</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="hora_parto" id="hora_parto">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <label class="floating-label">Indicaciones de control fetal</label>
                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                            name="indicacion_control_fetal"
                                                            id="indicacion_control_fetal"></textarea>
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

                                                @if (isset($ingreso_paciente))
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Indicaciones de ingreso</label>
                                                            <input class="form-control form-control-sm"
                                                                name="indicaciones_ingreso" id="indicaciones_ingreso"
                                                                value="{{ $ingreso_paciente->indicaciones_ingreso }}">
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Indicaciones de ingreso</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                name="indicaciones_ingreso"
                                                                id="indicaciones_ingreso"></textarea>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="form-row">
                                                    @if (isset($ingreso_paciente->hora_operacion))
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label-activo-sm">hora probable de
                                                                parto</label>
                                                            <input type="time" class="form-control form-control-sm"
                                                                name="hora_operacion" id="hora_operacion"
                                                                value="{{ $ingreso_paciente->hora_operacion }}">
                                                        </div>
                                                    @endif
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Hospitalizar en</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="hospitalizar_en" id="hospitalizar_en"
                                                            value="@if (isset($ingreso_paciente->hospitalizar_en)) {{ $ingreso_paciente->hospitalizar_en }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Tipo de sala</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="tipo_sala" id="tipo_sala"
                                                            value="@if (isset($ingreso_paciente->tipo_sala)) {{ $ingreso_paciente->tipo_sala }} @endif">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">

                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Medicamentos</h6>
                                            </div>
                                            <div class="card-body shadow-none">
                                                @if (isset($medicamentos_ingreso_paciente))
                                                    @foreach ($medicamentos_ingreso_paciente as $med_ip)
                                                        <div class="col-md-12">
                                                            <span>{{ $med_ip->producto }}</span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Examenes</h6>
                                            </div>


                                            <div class="card-body shadow-none">
                                                @if (isset($examenes_ingreso_paciente))
                                                    @foreach ($examenes_ingreso_paciente as $exa_ip)
                                                        <div class="col-md-12">

                                                            <span>{{ $exa_ip->examen . ' - ' . $exa_ip->tipo_examen }}</span>
                                                        </div>
                                                    @endforeach
                                                @endif
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
                                                    onclick="mostrar_modal_examen_cirguria();"><i
                                                        class="fa fa-plus"></i> Indicar
                                                    examen</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <button type="reset" class="btn btn-danger">Borrar</button>
                                        <button type="submit"
                                            onclick="agregar_medicamentos_cirugia(); agregar_examenes_cirugia();"
                                            class="btn btn-info">
                                            @if (isset($ingreso_paciente))
                                                Actualizar Ingreso
                                            @else
                                                Enviar ingreso
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include(
            'app.cirugia.modals.modals_cesarea.modal_indicar_examenes'
        )
        @include(
            'app.cirugia.modals.modals_cesarea.modal_indicar_medicamentos'
        )
    </div>
@endsection
