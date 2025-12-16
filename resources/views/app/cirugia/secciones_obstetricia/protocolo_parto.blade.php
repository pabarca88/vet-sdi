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
                    <div class="row">

                        @if (isset($mensaje))
                            <span class="alert alert-warning"> {{ $mensaje }}</span>
                        @endif

                    </div>
                    <div class="row bg-white shadow-sm rounded mx-3 mt-4">
                        <div class="col-md-12">
                            <form id="form_ingreso_paciente"
                                action="@if (isset($protocolo)) {{ route('cirugia.actualizar_protocolo_obstetrico') }} @else {{ route('cirugia.registrar_protocolo_obstetrico') }} @endif"
                                method="POST">

                                @csrf

                                <input type="hidden" name="id_solicitud_pabellon" id="id_solicitud_pabellon"
                                    value="{{ $id_solicitud_pabellon }}">

                                <input type="hidden" name="tipo_cirugia" id="tipo_cirugia" value="quirurgica">

                                <input type="hidden" name="medicamentos_cirugia" id="medicamentos_cirugia">
                                <input type="hidden" name="examenes_cirugia" id="examenes_cirugia">
                                <input type="hidden" name="biopsias" id="biopsias">

                                @if (isset($protocolo))
                                    <input type="hidden" name="id_protocolo" id="id_protocolo"
                                        value="{{ $protocolo->id }}">
                                @endif

                                @if (isset($biopsia))
                                    <input type="hidden" name="id_biopsia" id="id_biopsia" value="{{ $biopsia->id }}">
                                @endif

                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-1">
                                        <div class="form-row">
                                            <div class="form-group col-md-3 ">
                                                <h6 class="text-c-blue mt-2 d-inline mr-3">Protocolo parto</h6>
                                            </div>

                                            <div class="form-group col-md-3">
                                                <script>
                                                    var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                                        "Octubre", "Noviembre", "Diciembre");
                                                    var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                                    var f = new Date();

                                                    document.write("<b>" + diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                                        .getFullYear() + "</b>");
                                                </script>
                                            </div>
                                            <div class="col-md-6 float-right pt-1">
                                                <div class="btn-toolbar d-flex justify-content-end" role="toolbar"
                                                    aria-label="Toolbar with button groups">
                                                    <div class="btn-group btn-group-sm" role="group"
                                                        aria-label="First group">
                                                        <button type="button" class="btn btn-outline-success"
                                                            onclick="i_medicamento();"><i
                                                                class="feather icon-file-plus"></i>Recetario</button>
                                                        <button type="button" class="btn btn-outline-success"
                                                            onclick="mostrar_modal_examen_cirguria();"><i
                                                                class="feather icon-file-plus"></i>Examen</button>


                                                        @if (isset($protocolo))
                                                            <button type="button" class="btn btn-outline-success"
                                                                onclick="modal_biopsia();"><i
                                                                    class="feather icon-file-plus"></i>Biopsia</button>
                                                        @else
                                                            <button type="button" class="btn btn-outline-success"
                                                                onclick="modal_biopsia();" disabled><i
                                                                    class="feather icon-file-plus"></i>Biopsia</button>
                                                        @endif
                                                        <button type="button" class="btn btn-outline-success"
                                                            onclick="m_ev_neo();"><i
                                                                class="feather icon-user"></i>Neonatología</button>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                        <a href="{{ ROUTE('cirugia.index_cirugia_obstetricia') }}"
                                                            class="btn btn-info btn-block btn-sm mt-1" data-toggle="tooltip"
                                                            data-placement="top" title="Volver"><i
                                                                class=""></i>VOLVER</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <!--Información general-->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Información general</h6>
                                            </div>
                                            <div class="card-body shadow-none">

                                                <div class="form-row">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Rut</label>
                                                        <input type="text" class="form-control form-control-sm" name="rut"
                                                            id="rut" value="{{ $paciente->rut }}">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Nombre completo</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="nombre" id="nombre"
                                                            value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Edad</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="nombre_acompañante" id="nombre_acompañante"
                                                            value="{{ $paciente->fecha_nac }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Previsión</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="prevision" id="prevision"
                                                            value="{{ $paciente->Prevision()->first()->nombre }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Teléfono</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="telefono_uno" id="telefono_uno"
                                                            value="{{ $paciente->telefono_uno }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Hospital / Clínica</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="lugar_atencion" id="lugar_atencion"
                                                            value="{{ $lugar_atencion->nombre }}">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Nº Pabellón</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="nro_pabellon_protocolo_operatorio"
                                                            id="nro_pabellon_protocolo_operatorio"
                                                            value="@if (isset($protocolo)) {{ $protocolo->nro_pabellon }} @endif">
                                                    </div>
                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-2">
                                                            <label class="floating-label-activo-sm">Inicio operación</label>
                                                            <input type="time" class="form-control form-control-sm"
                                                                name="inicio_operacion_protocolo_operatorio"
                                                                id="inicio_operacion_protocolo_operatorio"
                                                                value="{{ $protocolo->inicio_operacion }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-2">
                                                            <label class="floating-label-activo-sm">Inicio operación</label>
                                                            <input type="time" class="form-control form-control-sm"
                                                                name="inicio_operacion_protocolo_operatorio"
                                                                id="inicio_operacion_protocolo_operatorio">
                                                        </div>
                                                    @endif

                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-2">
                                                            <label class="floating-label-activo-sm">Fin operación</label>
                                                            <input type="time" class="form-control form-control-sm"
                                                                name="fin_operacion_protocolo_operatorio"
                                                                id="fin_operacion_protocolo_operatorio"
                                                                value="{{ $protocolo->fin_operacion }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-2">
                                                            <label class="floating-label-activo-sm">Fin operación</label>
                                                            <input type="time" class="form-control form-control-sm"
                                                                name="fin_operacion_protocolo_operatorio"
                                                                id="fin_operacion_protocolo_operatorio">
                                                        </div>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--Información de cirugía-->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Información de embarazo</h6>
                                            </div>
                                            <div class="card-body shadow-none">

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Semanas de gestación</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="semanas_gestacion" id="semanas_gestacion"
                                                            value="@if (isset($protocolo)) {{ $protocolo->semanas_gestacion }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Tipo de embarazo</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="tipo_embarazo" id="tipo_embarazo"
                                                            value="@if (isset($protocolo)) {{ $protocolo->tipo_embarazo }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Sufrimiento fetal</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="sufrimiento_fetal" id="sufrimiento_fetal"
                                                            value="@if (isset($protocolo)) {{ $protocolo->sufrimiento_fetal }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Inducción parto</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="induccion_parto" id="induccion_parto"
                                                            value="@if (isset($protocolo)) {{ $protocolo->induccion_parto }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Presentación fetal</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="presentacion_fetal" id="presentacion_fetal"
                                                            value="@if (isset($protocolo)) {{ $protocolo->presentacion_fetal }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Anestesia</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="anestesia" id="anestesia"
                                                            value="@if (isset($protocolo)) {{ $protocolo->anestesia }} @endif">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Equipo-->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Equipo</h6>
                                            </div>
                                            <div class="card-body shadow-none">

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Obstetra</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="nombre_cirujano" id="nombre_cirujano"
                                                            value="@if (isset($protocolo)) {{ $protocolo->cirujano }} @endif">

                                                    </div>

                                                    @if (isset($protocolo->ayudantes))
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Ayudantes</label>
                                                            <input class="form-control form-control-sm"
                                                                name="ayudantes_cirujano" id="ayudantes_cirujano"
                                                                value="@if (isset($protocolo)) {{ $protocolo->ayudantes }} @endif">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Ayudantes</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                name="ayudantes_cirujano"
                                                                id="ayudantes_cirujano"></textarea>
                                                        </div>
                                                    @endif

                                                    @if (isset($protocolo->anestesistas_ayudantes_anestesia))
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Anestesista</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="anestesista"
                                                                value="@if (isset($protocolo)) {{ $protocolo->anestesistas_ayudantes_anestesia }} @endif">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Anestesista</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="anestesista"
                                                                id="anestesista"></textarea>
                                                        </div>
                                                    @endif

                                                    @if (isset($protocolo->arsenaleria))
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Arsenalería</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="arsenaleria" name="arsenaleria"
                                                                value="@if (isset($protocolo)) {{ $protocolo->arsenaleria }} @endif">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Arsenalería</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="arsenaleria"
                                                                id="arsenaleria"></textarea>
                                                        </div>
                                                    @endif

                                                    @if (isset($protocolo->neonatologo))
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Neonatólogo/a</label>
                                                            <input class="form-control form-control-sm" name="neonatologo"
                                                                id="neonatologo"
                                                                value="@if (isset($protocolo)) {{ $protocolo->neonatologo }} @endif">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Neonatólogo/a</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="neonatologo"
                                                                id="neonatologo"></textarea>
                                                        </div>
                                                    @endif

                                                    @if (isset($protocolo->matron))
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Matron/a</label>
                                                            <input class="form-control form-control-sm" name="matron"
                                                                id="matronmatron"
                                                                value="@if (isset($protocolo)) {{ $protocolo->matron }} @endif">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Matron/a</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="matron"
                                                                id="matron"></textarea>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Cirugía-->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Parto</h6>
                                            </div>
                                            <div class="card-body shadow-none">

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Presentación tipo de parto
                                                            (describir)</label>
                                                        @if (isset($protocolo->presentacion_tipo_parto))
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="presentacion_tipo_parto" id="presentacion_tipo_parto"
                                                                value="{{ $protocolo->presentacion_tipo_parto }}">
                                                        @else
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                name="presentacion_tipo_parto"
                                                                id="presentacion_tipo_parto"></textarea>
                                                        @endif
                                                    </div>

                                                    @if (isset($protocolo->placenta))
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Placenta</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="placenta" id="placenta"
                                                                value="{{ $protocolo->placenta }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Placenta</label>
                                                            <textarea class="form-control form-control-sm" name="placenta" id="placenta"></textarea>
                                                        </div>
                                                    @endif

                                                    @if (isset($protocolo->recien_nacido))
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Recién nacido</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="recien_nacido" id="recien_nacido"
                                                                value="{{ $protocolo->recien_nacido }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Recién nacido</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                name="recien_nacido" id="recien_nacido"></textarea>
                                                        </div>
                                                    @endif


                                                    @if (isset($protocolo->episiotomia))
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Episiotomía (describir)</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="episiotomia" id="episiotomia"
                                                                value="{{ $protocolo->episiotomia }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Episiotomía (describir)</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="episiotomia"
                                                                id="episiotomia"></textarea>
                                                        </div>
                                                    @endif


                                                    @if (isset($protocolo->material_cierre))
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Material de cierre</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="material_cierre" id="material_cierre"
                                                                value="{{ $protocolo->material_cierre }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Material de cierre</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                name="material_cierre" id="material_cierre"></textarea>
                                                        </div>
                                                    @endif


                                                    @if (isset($protocolo->incidencias_parto))
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Incidentes (describir)</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="incidencias_parto" id="incidencias_parto"
                                                                value="{{ $protocolo->incidencias_parto }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Incidentes (describir)</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                name="incidencias_parto"
                                                                id="incidencias_parto"></textarea>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Anestesia-->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Anestesia</h6>
                                            </div>
                                            <div class="card-body shadow-none">


                                                <div class="form-row">

                                                    @if (isset($protocolo->farmacos))
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Fármacos</label>
                                                            <input class="form-control form-control-sm" name="farmacos"
                                                                id="farmacos"
                                                                value="@if (isset($protocolo)) {{ $protocolo->farmacos }} @endif">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Fármacos</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="farmacos"
                                                                id="farmacos"></textarea>
                                                        </div>
                                                    @endif

                                                    @if (isset($protocolo->pulso_presion_arterial))
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Pulso y presión arterial</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="pulso_presion_protocolo_operatorio"
                                                                id="pulso_presion_protocolo_operatorio"
                                                                value="@if (isset($protocolo)) {{ $protocolo->pulso_presion_arterial }} @endif">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Pulso y presión arterial</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                name="pulso_presion_protocolo_operatorio"
                                                                id="pulso_presion_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif

                                                    @if (isset($protocolo->incidentes))
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Incidentes</label>
                                                            <input class="form-control form-control-sm"
                                                                name="incidentes_protocolo_operatorio"
                                                                id="incidentes_protocolo_operatorio"
                                                                value="@if (isset($protocolo)) {{ $protocolo->incidentes }} @endif">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Incidentes</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                name="incidentes_protocolo_operatorio"
                                                                id="incidentes_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif

                                                    @if (isset($protocolo->recuperacion_anestesia))
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Recuperación anestesia</label>
                                                            <input class="form-control form-control-sm"
                                                                name="recuperacion_anestesia_protocolo_operatorio"
                                                                id="recuperacion_anestesia_protocolo_operatorio"
                                                                value="@if (isset($protocolo)) {{ $protocolo->recuperacion_anestesia }} @endif">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Recuperación anestesia</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                name="recuperacion_anestesia_protocolo_operatorio"
                                                                id="recuperacion_anestesia_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif

                                                    @if (isset($protocolo->descripcion_anestesia))
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Descripción anestésia</label>
                                                            <input class="form-control form-control-sm"
                                                                name="descripcion_anestesia_protocolo_operatorio"
                                                                id="descripcion_anestesia_protocolo_operatorio"
                                                                value="@if (isset($protocolo)) {{ $protocolo->descripcion_anestesia }} @endif">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Descripción anestésia</label>
                                                            <textarea class="form-control form-control-sm" name="descripcion_anestesia_protocolo_operatorio"
                                                                id="descripcion_anestesia_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Incidencias-->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Incidencias</h6>
                                            </div>
                                            <div class="card-body shadow-none">

                                                @if (isset($protocolo->incidencias))
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Incidencias</label>
                                                            <input class="form-control form-control-sm"
                                                                name="descripcion_incidencia_protocolo_operatorio"
                                                                id="incidescripcion_incidencia_protocolo_operatoriodencias"
                                                                value="@if (isset($protocolo)) {{ $protocolo->incidencias }} @endif">
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Incidencias</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"
                                                                name="descripcion_incidencia_protocolo_operatorio"
                                                                id="incidescripcion_incidencia_protocolo_operatoriodencias"></textarea>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!--Destino post operatorio-->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Destino post operatorio</h6>
                                            </div>
                                            <div class="card-body shadow-none">

                                                <div class="form-row">
                                                    @if (isset($protocolo->destino_paciente))
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label-activo-sm">Destino del
                                                                paciente</label>
                                                            <input class="form-control form-control-sm"
                                                                placeholder="Sala UTI, Recuperación alta, etc."
                                                                name="destino_protocolo_operatorio"
                                                                id="destino_protocolo_operatorio"
                                                                value="@if (isset($protocolo)) {{ $protocolo->destino_paciente }} @endif">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label-activo-sm">Destino del
                                                                paciente</label>
                                                            <textarea class="form-control form-control-sm" placeholder="Sala UTI, Recuperación alta, etc." rows="1"
                                                                onfocus="this.rows=2" onblur="this.rows=1;"
                                                                name="destino_protocolo_operatorio"
                                                                id="destino_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif

                                                    @if (isset($protocolo->indicaciones_postoperacion))
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label-activo-sm">Indicaciones post
                                                                operatorias</label>
                                                            <input class="form-control form-control-sm"
                                                                placeholder="Indicaciones post-operatorias"
                                                                name="indicaciones_postoperacion_protocolo_operatorio"
                                                                id="indicaciones_postoperacion_protocolo_operatorio"
                                                                value="@if (isset($protocolo)) {{ $protocolo->indicaciones_postoperacion }} @endif">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label-activo-sm">Indicaciones post
                                                                operatorias</label>
                                                            <textarea class="form-control form-control-sm" placeholder="Indicaciones post-operatorias" rows="1"
                                                                onfocus="this.rows=4" onblur="this.rows=2;"
                                                                name="indicaciones_postoperacion_protocolo_operatorio"
                                                                id="indicaciones_postoperacion_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif

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
                                                @if (isset($medicamentos_protocolo))
                                                    @foreach ($medicamentos_protocolo as $med_prot)
                                                        <div class="col-md-12">
                                                            <span>{{ $med_prot->producto }}</span>
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
                                                @if (isset($examenes_protocolo))
                                                    @foreach ($examenes_protocolo as $exa_prot)
                                                        <div class="col-md-12">

                                                            <span>{{ $exa_prot->examen . ' - ' . $exa_prot->tipo_examen }}</span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Biopsias</h6>
                                            </div>


                                            <div class="card-body shadow-none">
                                                @if (isset($biopsia))
                                                    <span><b>Laboratorio:
                                                        </b>{{ $biopsia->laboratorio_patologia . ' - ' }}
                                                        <br><b>Diagnostico
                                                            pre-operatorio: </b>{{ $biopsia->diagnostico_pre }} </span>
                                                    <br><b>Diagnostico
                                                        post-operatorio: </b>{{ $biopsia->diagnostico_post }} </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <button
                                            onclick="agregar_medicamentos_cirugia(); agregar_examenes_cirugia(); agregar_biopsias_cirugia();"
                                            type="submit" class="btn btn-info">
                                            @if (isset($protocolo))
                                                Actualizar Formulario
                                            @else
                                                Enviar formulario
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
    </div>

    @include('app.cirugia.modals.modals_obstetrico.neonatologia')
    @include(
        'app.cirugia.modals.modals_cesarea.modal_indicar_examenes'
    )
    @include(
        'app.cirugia.modals.modals_cesarea.modal_indicar_medicamentos'
    )
    @include('app.cirugia.modals.modals_cesarea.m_exbiopsia')
@endsection
