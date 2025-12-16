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
                                <h5 class="text-white d-inline ml-2 f-16 mt-1"><strong>Registro de atención hospitalizada
                                        cesárea</strong></h5>
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
                            <div class="row mt-3 mb-0">
                                <div class="col-md-8 d-inline float-left mt-0 mb-1 pb-0">
                                    <h6 class="f-16 text-c-blue">Sala de hospitalización</h6>
                                </div>
                                <div class="col-md-4 float-right d-inline">
                                    <div class="alert alert-primary my-0 py-0 px-0" role="alert">
                                        <p class="p-10 d-inline font-weight-bolder">Servicio: </p>
                                        <p class="p-10 d-inline">Nombre del servicio</p>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <!--Evoluciones-->
                                <div class="col-md-12">
                                    <form id="form_ingreso_paciente"
                                        action="{{ ROUTE('cirugia.registrar_sala_parto_cesarea') }}" method="POST">

                                        @csrf

                                        <input type="hidden" name="id_solicitud_pabellon" id="id_solicitud_pabellon"
                                            value="{{ $id_solicitud_pabellon }}">
                                        <input type="hidden" name="medicamentos_cirugia" id="medicamentos_cirugia">
                                        <input type="hidden" name="examenes_cirugia" id="examenes_cirugia">
                                        <input type="hidden" name="interconsultas_cirugia" id="interconsultas_cirugia">
                                        <input type="hidden" name="evolucion_neonatologia" id="evolucion_neonatologia">
                                        <input type="hidden" name="tipo_cirugia" id="tipo_cirugia" value="cesarea">
                                        @if (isset($sala_hospitalizacion))
                                            <input type="hidden" name="id_sala_hospitalizacion" id="id_sala_hospitalizacion"
                                                value="{{ $sala_hospitalizacion->id }}">
                                        @endif
                                        <div class="row pt-0 mb-3">
                                            <div class="col-md-2">
                                                <h6 class="text-c-blue">Evoluciones</h6>
                                            </div>
                                            <div class="col-md-10 float-right">
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
                                                        <button type="button" class="btn btn-outline-success"
                                                            onclick="modal_interconsulta();"><i
                                                                class="feather icon-user"></i>Interconsulta</button>
                                                        <button type="button" class="btn btn-outline-success"
                                                            onclick="modal_evolucion_neonatologia();"><i
                                                                class="feather icon-user"></i>Evaluación
                                                            neonatólogo</button>

                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <a href="{{ ROUTE('cirugia.index_cirugia_obstetricia_cesarea') }}"
                                                            class="btn btn-info btn-block btn-sm mt-1" data-toggle="tooltip"
                                                            data-placement="top" title="Volver"><i
                                                                class=""></i>VOLVER</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!--Evoluciones-->
                                            <div class="col-sm-12">

                                                @if (isset($sala_hospitalizaciones))
                                                    {{-- {{ dd($sala_hospperacion) }} --}}
                                                    @foreach ($sala_hospitalizaciones as $sala_hosp)
                                                        <div class="form-row">
                                                            <div class="form-group col-md-2">
                                                                <h6 class="text-secondary"></h6>
                                                                <h6 class="text-secondary">{{ $sala_hosp->created_at }}
                                                                </h6>
                                                            </div>
                                                            @if ($sala_hosp->evolucion != '')
                                                                <div class="form-group col-md-5">
                                                                    <label class="floating-label">Madre</label>
                                                                    <input class="form-control form-control-sm"
                                                                        name="madre{{ $sala_hosp->id }}"
                                                                        id="madre{{ $sala_hosp->id }}"
                                                                        value="{{ $sala_hosp->evolucion }}" disabled>

                                                                </div>
                                                                <div class="form-group col-md-5">
                                                                    <label class="floating-label">Recién nacido</label>
                                                                    <input class="form-control form-control-sm"
                                                                        id="recien_nacido{{ $sala_hosp->id }}"
                                                                        name="recien_nacido{{ $sala_hosp->id }}"
                                                                        value="{{ $sala_hosp->recien_nacido }}" disabled>
                                                                </div>

                                                                @if (isset($sala_hosp->medicamentos) && $sala_hosp->medicamentos != null && $sala_hosp->medicamentos != '' && $sala_hosp->medicamentos != '[]')
                                                                    <div class="form-group col-md-6">

                                                                        <div class="card">
                                                                            <div class="card-header bg-info align-middle">
                                                                                <h6 class="float-left d-inline">Medicamentos
                                                                                </h6>
                                                                            </div>
                                                                            @foreach ($sala_hosp->medicamentos as $medicamento)
                                                                                <div class="card-body shadow-none">
                                                                                    <div class="col-md-12">
                                                                                        <span>{{ $medicamento->producto }}</span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                    </div>
                                                                @else
                                                                @endif
                                                                @if (isset($sala_hosp->examenes) && $sala_hosp->examenes != null && $sala_hosp->examenes != '' && $sala_hosp->examenes != '[]')
                                                                    <div class="form-group col-md-6">

                                                                        <div class="card">
                                                                            <div class="card-header bg-info align-middle">
                                                                                <h6 class="float-left d-inline">Examenes
                                                                                </h6>
                                                                            </div>
                                                                            @foreach ($sala_hosp->examenes as $examen)
                                                                                <div class="card-body shadow-none">
                                                                                    <div class="col-md-12">
                                                                                        <span>
                                                                                            {{ $examen->tipo_examen . ' - ' . $examen->examen }}
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                    </div>
                                                                @else
                                                                @endif

                                                                @if (isset($sala_hosp->interconsultas) && $sala_hosp->interconsultas != null && $sala_hosp->interconsultas != '' && $sala_hosp->interconsultas != '[]')
                                                                    <div class="form-group col-md-6">

                                                                        <div class="card">
                                                                            <div class="card-header bg-info align-middle">
                                                                                <h6 class="float-left d-inline">
                                                                                    Interconsulta/s</h6>
                                                                            </div>
                                                                            @foreach ($sala_hosp->interconsultas as $interconsulta)
                                                                                <div class="card-body shadow-none">
                                                                                    <div class="col-md-12">
                                                                                        <span>
                                                                                            {{ $interconsulta->nombre_esp . ' - ' . $interconsulta->hipotesis }}
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>

                                                                    </div>
                                                                @else
                                                                @endif
                                                            @else
                                                                <div class="form-group col-md-5">
                                                                    <label class="floating-label">Madre</label>
                                                                    <textarea class="form-control form-control-sm" id="madre" name="madre" rows="2" onfocus="this.rows=4"
                                                                        onblur="this.rows=3;"></textarea>
                                                                </div>
                                                                <div class="form-group col-md-5">
                                                                    <label class="floating-label">Recién nacido</label>
                                                                    <textarea class="form-control form-control-sm" id="recien_nacido" name="recien_nacido" rows="2" onfocus="this.rows=4"
                                                                        onblur="this.rows=3;"></textarea>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    <div class="form-row">
                                                        <div class="form-group col-md-2">
                                                            <script>
                                                                var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                                                    "Octubre", "Noviembre", "Diciembre");
                                                                var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                                                var f = new Date();

                                                                document.write("<b>" + diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                                                    .getFullYear() + "</b>");
                                                            </script>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label class="floating-label">Madre</label>
                                                            <textarea class="form-control form-control-sm" id="madre" name="madre" rows="2" onfocus="this.rows=4"
                                                                onblur="this.rows=3;"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label class="floating-label">Recién nacido</label>
                                                            <textarea class="form-control form-control-sm" id="recien_nacido" name="recien_nacido" rows="2" onfocus="this.rows=4"
                                                                onblur="this.rows=3;"></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <h6 class="text-c-blue">Resumen de evoluciones</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <textarea class="form-control form-control-sm" name="resumen_evolucion" id="resumen_evolucion" rows="3"
                                                                onfocus="this.rows=5" onblur="this.rows=4;"></textarea>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="form-row">
                                                        <div class="form-group col-md-2">
                                                            <script>
                                                                var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                                                    "Octubre", "Noviembre", "Diciembre");
                                                                var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                                                var f = new Date();

                                                                document.write("<b>" + diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                                                    .getFullYear() + "</b>");
                                                            </script>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label class="floating-label">Madre</label>
                                                            <textarea class="form-control form-control-sm" id="madre" name="madre" rows="2" onfocus="this.rows=4"
                                                                onblur="this.rows=3;"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label class="floating-label">Recién nacido</label>
                                                            <textarea class="form-control form-control-sm" id="recien_nacido" name="recien_nacido" rows="2" onfocus="this.rows=4"
                                                                onblur="this.rows=3;"></textarea>
                                                        </div>
                                                        <hr>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <h6 class="text-c-blue">Resumen de evoluciones</h6>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <textarea class="form-control form-control-sm" name="resumen_evolucion" id="resumen_evolucion" rows="3"
                                                                onfocus="this.rows=5" onblur="this.rows=4;"></textarea>
                                                        </div>
                                                    </div>
                                                @endif


                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-md-12 text-center">
                                                <button type="submit"
                                                    onclick="agregar_medicamentos_cirugia(); agregar_interconsulta_cirugia(); agregar_examenes_cirugia(); agregar_biopsias_cirugia();"
                                                    class="btn btn-info">Guardar formulario</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

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
        @include('app.cirugia.modals.modals_cesarea.interconsulta')
        @include(
            'app.cirugia.modals.modals_cesarea.evolucion_neonatologia'
        )

    </div>

@endsection
