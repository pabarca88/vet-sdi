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
                            <div class="row">
                                <div class="col-md-10 mt-3 mb-0">
                                    <h6 class="f-16 text-c-blue">Epicrisis</h6>


                                </div>
                                <div class="col-md-2">
                                    <a href="{{ ROUTE('cirugia.index_cirugia_obstetricia') }}"
                                        class="btn btn-info btn-block btn-sm mt-1" data-toggle="tooltip"
                                        data-placement="top" title="Volver"><i class=""></i>VOLVER</a>
                                    <hr>
                                </div>

                            </div>
                            <form id="form_ingreso_paciente"
                                action="@if (isset($epicrisis_alta_medica)) {{ route('cirugia.actualizar_epicrisis_alta_medica_obstetrico') }} @else {{ route('cirugia.registrar_epicrisis_alta_medica_obstetrico') }} @endif"
                                method="POST">

                                @csrf

                                <input type="hidden" name="id_solicitud_pabellon" id="id_solicitud_pabellon"
                                    value="{{ $id_solicitud_pabellon }}">


                                <input type="hidden" name="tipo_cirugia" id="tipo_cirugia" value="obstetrico">
                                @if (isset($epicrisis_alta_medica))
                                    <input type="hidden" name="id_epicrisis_alta_medica" id="id_epicrisis_alta_medica"
                                        value="{{ $epicrisis_alta_medica->id }}">
                                @endif
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

                                            @if (isset($epicrisis_alta_medica->inicio_hospitalizacion))
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Desde</label>
                                                    <input type="date" class="form-control form-control-sm"
                                                        name="inicio_hospitalizacion" id="inicio_hospitalizacion"
                                                        value="{{ $epicrisis_alta_medica->inicio_hospitalizacion }}">
                                                </div>
                                            @else
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Desde</label>
                                                    <input type="date" class="form-control form-control-sm"
                                                        name="inicio_hospitalizacion" id="inicio_hospitalizacion">
                                                </div>
                                            @endif
                                            @if (isset($epicrisis_alta_medica->fin_hospitalizacion))
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Hasta</label>
                                                    <input type="date" class="form-control form-control-sm"
                                                        name="fin_hospitalizacion" id="fin_hospitalizacion"
                                                        value="{{ $epicrisis_alta_medica->fin_hospitalizacion }}">
                                                </div>
                                            @else
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Hasta</label>
                                                    <input type="date" class="form-control form-control-sm"
                                                        name="fin_hospitalizacion" id="fin_hospitalizacion">
                                                </div>
                                            @endif


                                            @if (isset($epicrisis_alta_medica->inicio_hospitalizacion))
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Total de días</label>
                                                    <input type="text" class="form-control form-control-sm" name="dias"
                                                        id="dias">
                                                </div>
                                            @else
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Total de días</label>
                                                    <input type="text" class="form-control form-control-sm" name="dias"
                                                        id="dias">
                                                </div>
                                            @endif


                                        </div>
                                        <div class="form-row">
                                            <h6 class="my-3">II.- Dignósticos</h6>
                                        </div>
                                        <div class="form-row">
                                            @if (isset($epicrisis_alta_medica->diagnostico_ingreso))
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Diagnósticos de ingreso</label>
                                                    <input class="form-control form-control-sm" type="text"
                                                        name="diagnostico_ingreso" id="diagnostico_ingreso"
                                                        value="{{ $epicrisis_alta_medica->diagnostico_ingreso }}">
                                                </div>
                                            @else
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Diagnósticos de ingreso</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                        name="diagnostico_ingreso" id="diagnostico_ingreso"></textarea>
                                                </div>
                                            @endif

                                            @if (isset($epicrisis_alta_medica->diagnostico_alta))
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Diagnósticos de alta</label>
                                                    <input class="form-control form-control-sm" type="text"
                                                        name="diagnostico_alta" id="diagnostico_alta"
                                                        value="{{ $epicrisis_alta_medica->diagnostico_alta }}">
                                                </div>
                                            @else
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Diagnósticos de alta</label>
                                                    <textarea class="form-control form-control-sm" name="diagnostico_alta" id="diagnostico_alta" rows="1"
                                                        onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                </div>
                                            @endif


                                        </div>
                                        <div class="form-row">
                                            @if (isset($epicrisis_alta_medica->diagnostico_ingreso))
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Diagnósticos de ingreso</label>
                                                    <input class="form-control form-control-sm" type="text"
                                                        name="diagnostico_ingreso" id="diagnostico_ingreso"
                                                        value="{{ $epicrisis_alta_medica->diagnostico_ingreso }}">
                                                </div>
                                            @else
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Diagnósticos de ingreso</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                        name="diagnostico_ingreso" id="diagnostico_ingreso"></textarea>
                                                </div>
                                            @endif

                                            @if (isset($epicrisis_alta_medica->diagnostico_alta))
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Diagnósticos de alta</label>
                                                    <input class="form-control form-control-sm" type="text"
                                                        name="diagnostico_alta" id="diagnostico_alta"
                                                        value="{{ $epicrisis_alta_medica->diagnostico_alta }}">
                                                </div>
                                            @else
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Diagnósticos de alta</label>
                                                    <textarea class="form-control form-control-sm" name="diagnostico_alta" id="diagnostico_alta" rows="1"
                                                        onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                </div>
                                            @endif


                                        </div>
                                        <div class="form-row">
                                            <h6 class="my-3">III.- Tratamientos y cirugías realizadas</h6>
                                        </div>
                                        <div class="form-row">
                                            @if (isset($epicrisis_alta_medica->tratamientos_cirugias))
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Tratamientos</label>
                                                    <input class="form-control form-control-sm" name="tratamientos_cirugias"
                                                        id="tratamientos_cirugias" type="text"
                                                        value="{{ $epicrisis_alta_medica->tratamientos_cirugias }}">
                                                </div>
                                            @else
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Tratamientos</label>
                                                    <textarea class="form-control form-control-sm" name="tratamientos_cirugias" id="tratamientos_cirugias" rows="1"
                                                        onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                </div>
                                            @endif

                                            @if (isset($epicrisis_alta_medica->procedimientos_quirurgicos_cirugia))
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Procedimientos quirúrgicos</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="procedimientos_quirurgicos_cirugia"
                                                        id="procedimientos_quirurgicos_cirugia"
                                                        value="{{ $epicrisis_alta_medica->procedimientos_quirurgicos_cirugia }}">
                                                </div>
                                            @else
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Procedimientos quirúrgicos</label>
                                                    <textarea class="form-control form-control-sm" name="procedimientos_quirurgicos_cirugia"
                                                        id="procedimientos_quirurgicos_cirugia" rows="1"
                                                        onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                </div>
                                            @endif



                                            @if (isset($epicrisis_alta_medica->otros_tratamientos_procedimientos))
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Otros procedimientos y/o
                                                        tratamientos</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        id="otros_tratamientos_procedimientos"
                                                        name="otros_tratamientos_procedimientos"
                                                        value="{{ $epicrisis_alta_medica->otros_tratamientos_procedimientos }}">
                                                </div>
                                            @else
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Otros procedimientos y/o
                                                        tratamientos</label>
                                                    <textarea class="form-control form-control-sm" id="otros_tratamientos_procedimientos"
                                                        name="otros_tratamientos_procedimientos" rows="1"
                                                        onfocus="this.rows=2" onblur="this.rows=2;"></textarea>
                                                </div>
                                            @endif


                                        </div>
                                        <div class="form-row">
                                            <h6 class="my-3">IV.- Condiciones de herida operatoria lactancia</h6>
                                        </div>
                                        <div class="form-row">

                                            @if (isset($epicrisis_alta_medica->herida_operatoria))
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Herida operatoria</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="herida_operatoria" id="herida_operatoria"
                                                        value="{{ $epicrisis_alta_medica->herida_operatoria }}">
                                                </div>
                                            @else
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Herida operatoria</label>
                                                    <textarea class="form-control form-control-sm" name="herida_operatoria" id="herida_operatoria" rows="1"
                                                        onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                                </div>
                                            @endif


                                            @if (isset($epicrisis_alta_medica->pezones))
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Pezones</label>
                                                    <input type="text" class="form-control form-control-sm" name="pezones"
                                                        id="pezones" value="{{ $epicrisis_alta_medica->pezones }}">
                                                </div>
                                            @else
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Pezones</label>
                                                    <textarea class="form-control form-control-sm" name="pezones" id="pezones" rows="1" onfocus="this.rows=3"
                                                        onblur="this.rows=1;"></textarea>
                                                </div>
                                            @endif


                                            @if (isset($epicrisis_alta_medica->lactancia))
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Lactancia</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="lactancia" id="lactancia"
                                                        value="{{ $epicrisis_alta_medica->pezones }}">
                                                </div>
                                            @else
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Lactancia</label>
                                                    <textarea class="form-control form-control-sm" name="lactancia" id="lactancia" rows="1" onfocus="this.rows=3"
                                                        onblur="this.rows=1;"></textarea>
                                                </div>
                                            @endif


                                            <div class="form-group col-md-4">
                                                <label class="floating-label" id="fecha_alta" name="fecha_alta">Fecha de
                                                    alta: 00/00/0000</label>
                                            </div>

                                            @if (isset($epicrisis_alta_medica->condicion_salud))
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Condición de salud</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="condicion_salud" id="condicion_salud"
                                                        value="{{ $epicrisis_alta_medica->condicion_salud }}">
                                                </div>
                                            @else
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Condición de salud</label>
                                                    <textarea class="form-control form-control-sm" name="condicion_salud" id="condicion_salud" rows="1"
                                                        onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                                </div>
                                            @endif


                                            @if (isset($epicrisis_alta_medica->indicaciones_alta))
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Indicaciones</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="indicaciones_alta" id="indicaciones_alta"
                                                        value="{{ $epicrisis_alta_medica->indicaciones_alta }}">
                                                </div>
                                            @else
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Indicaciones</label>
                                                    <textarea class="form-control form-control-sm" name="indicaciones_alta" id="indicaciones_alta" rows="1"
                                                        onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                                </div>
                                            @endif

                                        </div>
                                        <div class="form-row">
                                            @if (isset($epicrisis_alta_medica->fecha_control))
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Fecha de control</label>
                                                    <input type="date" class="form-control form-control-sm"
                                                        name="fecha_control" id="fecha_control"
                                                        value="{{ $epicrisis_alta_medica->fecha_control }}">
                                                </div>
                                            @else
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label-activo-sm">Fecha de control</label>
                                                    <input type="date" class="form-control form-control-sm"
                                                        name="fecha_control" id="fecha_control">
                                                </div>
                                            @endif



                                            <div class="form-group col-md-4">
                                                <label class="floating-label">Lugar</label>
                                                <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion"
                                                    value="{{ $lugar_atencion->id }}">
                                                <input type="text" class="form-control form-control-sm"
                                                    name="lugar_atencion" id="lugar_atencion"
                                                    value="{{ $lugar_atencion->nombre }}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="floating-label">Profesional</label>
                                                <input type="text" class="form-control form-control-sm" name="profesional"
                                                    id="profesional"
                                                    value="{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-warning" onclick=" m_rc();">Carnet de recién
                                            nacido</button>
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
        </div>
        @if (isset($epicrisis_alta_medica))
            @include(
                'app.cirugia.modals.modals_obstetrico.carnet_alta_obstetrico'
            )
        @endif

        @if (isset($ficha_neonatologica))
            @include(
                'app.cirugia.modals.modals_obstetrico.carnet_recien_nacido_obstetrico'
            )
        @endif
    </div>
@endsection
