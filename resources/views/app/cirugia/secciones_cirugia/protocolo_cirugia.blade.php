@extends('template.dental.template')

@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline ml-2 f-16 mt-1"><strong>Registro de atención hospitalizado
                                        quirúrgico</strong></h5>
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
                                action="@if (isset($protocolo)) {{ route('cirugia.actualizar_protocolo_cirugia') }} @else {{ route('cirugia.registrar_protocolo_cirugia') }} @endif"
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

                                <div class="row pt-2 mb-0">
                                    <div class="col-md-6 pt-2">
                                        <h6 class="text-c-blue mt-2 d-inline">Protocolo operatorio</h6>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <script>
                                            var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                                "Octubre", "Noviembre", "Diciembre");
                                            var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                            var f = new Date();

                                            document.write("<b>" + diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                                .getFullYear() + "</b>");
                                        </script>
                                    </div>
                                    <div class="col-md-6 float-right">
                                        <div class="btn-toolbar d-flex justify-content-end" role="toolbar"
                                            aria-label="Toolbar with button groups">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="First group">
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
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="{{ ROUTE('cirugia.index_cirugia_quirurgica') }}"
                                                    class="btn btn-info btn-block btn-sm mt-1" data-toggle="tooltip"
                                                    data-placement="top" title="Volver"><i
                                                        class=""></i>VOLVER</a>

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
                                                <h6 class="float-left d-inline">Información de cirugía</h6>
                                            </div>
                                            <div class="card-body shadow-none">

                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Diagnóstico pre operatorio</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="diag_preoperatorio_protocolo_operatorio"
                                                            id="diag_preoperatorio_protocolo_operatorio"
                                                            value="@if (isset($protocolo)) {{ $protocolo->diagnostico_preoperatorio }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Diagnóstico post operatorio</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="diag_postoperatorio_protocolo_operatorio"
                                                            id="diag_postoperatorio_protocolo_operatorio"
                                                            value="@if (isset($protocolo)) {{ $protocolo->diagnostico_postoperatorio }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Código cirugía</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="codigo_cirugia_protocolo_operatorio"
                                                            id="codigo_cirugia_protocolo_operatorio"
                                                            value="@if (isset($protocolo)) {{ $protocolo->codigo_cirugia }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Anestesia</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="anestesia_protocolo_operatorio"
                                                            id="anestesia_protocolo_operatorio"
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
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Cirujano</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="cirujano_protocolo_operatorio"
                                                            id="cirujano_protocolo_operatorio"
                                                            value="@if (isset($protocolo)) {{ $protocolo->cirujano }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Ayudantes</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="ayudantes_protocolo_operatorio"
                                                            id="ayudantes_protocolo_operatorio"
                                                            value="@if (isset($protocolo)) {{ $protocolo->ayudantes }} @endif">
                                                    </div>

                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Anestesistas y ayudantes de
                                                                anestesia</label>
                                                            <input class="form-control form-control-sm"
                                                                name="anestesias_ayudantes_protocolo_operatorio"
                                                                id="anestesias_ayudantes_protocolo_operatorio"
                                                                value="{{ $protocolo->anestesistas_ayudantes_anestesia }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Anestesistas y ayudantes de
                                                                anestesia</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=2;"
                                                                name="anestesias_ayudantes_protocolo_operatorio"
                                                                id="anestesias_ayudantes_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif


                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Arsenalería</label>
                                                            <input class="form-control form-control-sm"
                                                                name="arsenaleria_protocolo_operatorio"
                                                                id="arsenaleria_protocolo_operatorio"
                                                                value="{{ $protocolo->arsenaleria }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label">Arsenalería</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=2;"
                                                                name="arsenaleria_protocolo_operatorio"
                                                                id="arsenaleria_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--Biopsia-->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Biopsia</h6>
                                                <i id="biopsia_1" class="float-right f-18 d-inline fas fa-angle-down mb-0"
                                                    style="cursor:pointer;"></i>
                                            </div>
                                            <div class="card-body shadow-none" id="formulario_5" style="display:none;">

                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Rápida</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="biopsia_rapida_protocolo_operatorio"
                                                            id="biopsia_rapida_protocolo_operatorio"
                                                            value="@if (isset($protocolo)) {{ $protocolo->biopsia_rapida }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Diferida</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="biopsia_diferida_protocolo_operatorio"
                                                            id="biopsia_diferida_protocolo_operatorio"
                                                            value="@if (isset($protocolo)) {{ $protocolo->biopsia_diferida }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Nº de muestras</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="biopsia_nro_muestra_protocolo_operatorio"
                                                            id="biopsia_nro_muestra_protocolo_operatorio"
                                                            value="@if (isset($protocolo)) {{ $protocolo->biopsia_nro_muestras }} @endif">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Patólogo</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="biopsia_patologo_protocolo_operatorio"
                                                            id="biopsia_patologo_protocolo_operatorio"
                                                            value="@if (isset($protocolo)) {{ $protocolo->biopsia_patologo }} @endif">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--Cirugía-->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="card-header bg-info align-middle">
                                                <h6 class="float-left d-inline">Operación</h6>
                                            </div>
                                            <div class="card-body shadow-none">

                                                <div class="form-row">

                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Operación</label>
                                                            <input class="form-control form-control-sm"
                                                                name="nombre_operacion_protocolo_operatorio"
                                                                id="nombre_operacion_protocolo_operatorio"
                                                                value="{{ $protocolo->nombre_operacion }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Operación</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                                name="nombre_operacion_protocolo_operatorio"
                                                                id="nombre_operacion_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif


                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Material de hemostasia</label>
                                                            <input class="form-control form-control-sm"
                                                                name="material_hemostasia_protocolo_operatorio"
                                                                id="material_hemostasia_protocolo_operatorio"
                                                                value="{{ $protocolo->material_hemostasia }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Material de hemostasia</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                                name="material_hemostasia_protocolo_operatorio"
                                                                id="material_hemostasia_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif

                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Material de cierre</label>
                                                            <input class="form-control form-control-sm"
                                                                onfocus="this.rows=4" onblur="this.rows=2;"
                                                                name="material_cierre_protocolo_operatorio"
                                                                id="material_cierre_protocolo_operatorio"
                                                                value="{{ $protocolo->material_cierre }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Material de cierre</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                                onfocus="this.rows=4" onblur="this.rows=2;"
                                                                name="material_cierre_protocolo_operatorio"
                                                                id="material_cierre_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif

                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Otros (implantes, aseo,
                                                                etc.)</label>
                                                            <input class="form-control form-control-sm"
                                                                name="otros_materiales_protocolo_operatorio"
                                                                id="otros_materiales_protocolo_operatorio"
                                                                value="{{ $protocolo->otros_implantes }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Otros (implantes, aseo,
                                                                etc.)</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                                name="otros_materiales_protocolo_operatorio"
                                                                id="otros_materiales_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif

                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label">Descripción de la cirugía</label>
                                                            <input class="form-control form-control-sm"
                                                                placeholder="Descripción de la cirugía"
                                                                name="descripcion_cirugia_protocolo_operatorio"
                                                                id="descripcion_cirugia_protocolo_operatorio"
                                                                value="{{ $protocolo->descripcion_cirugia }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-12">
                                                            <textarea class="form-control form-control-sm" placeholder="Descripción de la cirugía" rows="1" onfocus="this.rows=4"
                                                                onblur="this.rows=2;"
                                                                name="descripcion_cirugia_protocolo_operatorio"
                                                                id="descripcion_cirugia_protocolo_operatorio"></textarea>
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

                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Fármacos</label>
                                                            <input class="form-control form-control-sm"
                                                                name="farmacos_protocolo_operatorio"
                                                                id="farmacos_protocolo_operatorio"
                                                                value="{{ $protocolo->farmacos }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Fármacos</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                                name="farmacos_protocolo_operatorio"
                                                                id="farmacos_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif


                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Pulso y presión arterial</label>
                                                            <input class="form-control form-control-sm"
                                                                name="pulso_presion_protocolo_operatorio"
                                                                id="pulso_presion_protocolo_operatorio"
                                                                value="{{ $protocolo->pulso_presion_arterial }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Pulso y presión arterial</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                                name="pulso_presion_protocolo_operatorio"
                                                                id="pulso_presion_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif


                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Incidentes</label>
                                                            <input class="form-control form-control-sm"
                                                                name="incidentes_protocolo_operatorio"
                                                                id="incidentes_protocolo_operatorio"
                                                                value="{{ $protocolo->incidentes }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Incidentes</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                                name="incidentes_protocolo_operatorio"
                                                                id="incidentes_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif


                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Recuperación anestesia</label>
                                                            <input class="form-control form-control-sm"
                                                                name="recuperacion_anestesia_protocolo_operatorio"
                                                                id="recuperacion_anestesia_protocolo_operatorio"
                                                                value="{{ $protocolo->recuperacion_anestesia }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label">Recuperación anestesia</label>
                                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                                name="recuperacion_anestesia_protocolo_operatorio"
                                                                id="recuperacion_anestesia_protocolo_operatorio"></textarea>
                                                        </div>
                                                    @endif


                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-12">
                                                            <input class="form-control form-control-sm"
                                                                placeholder="Descripción de anestesia"
                                                                name="descripcion_anestesia_protocolo_operatorio"
                                                                id="descripcion_anestesia_protocolo_operatorio"
                                                                value="{{ $protocolo->descripcion_anestesia }}">
                                                        </div>
                                                    @else
                                                        <div class="form-group col-md-12">
                                                            <textarea class="form-control form-control-sm" placeholder="Descripción de anestesia"
                                                                name="descripcion_anestesia_protocolo_operatorio"
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

                                                @if (isset($protocolo))
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <input class="form-control form-control-sm"
                                                                placeholder="Descripción de incidencias de la cirugía"
                                                                name="descripcion_incidencia_protocolo_operatorio"
                                                                id="descripcion_incidencia_protocolo_operatorio"
                                                                value="{{ $protocolo->incidencias }}">
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <textarea class="form-control form-control-sm" placeholder="Descripción de incidencias de la cirugía" rows="1"
                                                                onfocus="this.rows=4" onblur="this.rows=2;"
                                                                name="descripcion_incidencia_protocolo_operatorio"
                                                                id="descripcion_incidencia_protocolo_operatorio"></textarea>
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

                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label-activo-sm">Destino del
                                                                paciente</label>
                                                            <input class="form-control form-control-sm"
                                                                placeholder="Sala UTI, Recuperación alta, etc."
                                                                name="destino_protocolo_operatorio"
                                                                id="destino_protocolo_operatorio"
                                                                value="{{ $protocolo->incidencias }}">
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

                                                    @if (isset($protocolo))
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label-activo-sm">Indicaciones post
                                                                operatorias</label>
                                                            <input class="form-control form-control-sm"
                                                                placeholder="Indicaciones post-operatorias"
                                                                name="indicaciones_postoperacion_protocolo_operatorio"
                                                                id="indicaciones_postoperacion_protocolo_operatorio"
                                                                value="{{ $protocolo->incidencias }}">
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
        @include(
            'app.cirugia.modals.modals_cesarea.modal_indicar_examenes'
        )
        @include(
            'app.cirugia.modals.modals_cesarea.modal_indicar_medicamentos'
        )
        @include('app.cirugia.modals.modals_cesarea.m_exbiopsia')
    </div>
@endsection
