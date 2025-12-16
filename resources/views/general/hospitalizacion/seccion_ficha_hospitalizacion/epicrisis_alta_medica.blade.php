

<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row bg-white shadow-sm rounded mx-3 mt-4">
            <div class="col-md-12">
                <form id="form_ingreso_paciente_cirugia"
                    {{-- action="@if (isset($epicrisis_alta_medica)) {{ route('cirugia.actualizar_epicrisis_alta_medica') }} @else {{ route('cirugia.registrar_epicrisis_alta_medica') }} @endif"
                    method="POST">

                    @csrf--}}


                    <input type="hidden" name="id_solicitud_pabellon" id="id_solicitud_pabellon"
                        value="">

                    <input type="hidden" name="tipo_cirugia" id="tipo_cirugia" value="quirurgica">
                    @if (isset($recuperacion))
                        <input type="hidden" name="id_epicrisis_alta_medica" id="id_epicrisis_alta_medica"
                            value="{{ $epicrisis_alta_medica->id }}">
                    @endif

                    <div class="row pt-2 mb-0">
                        <div class="col-md-6 pt-2">
                            <h6 class="text-c-blue mt-2 d-inline">Epicrisis</h6>
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

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="form-row">
                                <h6 class="mb-3">I.- Datos de hospitalización</h6>
                            </div>
                            <div class="form-row">

                                @if (isset($epicrisis_alta_medica->inicio_hospitalizacion))
                                    <div class="form-group col-md-4">
                                        <label class="floating-label-activo-sm">Ingreso</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="inicio_hospitalizacion" id="inicio_hospitalizacion"
                                            value="{{ $epicrisis_alta_medica->inicio_hospitalizacion }}">
                                    </div>
                                @else
                                    <div class="form-group col-md-4">
                                        <label class="floating-label-activo-sm">Egreso</label>
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
                                        <label class="floating-label-activo-sm">Total de días</label>
                                        <input type="text" class="form-control form-control-sm" name="dias"
                                            id="dias">
                                    </div>
                                @else
                                    <div class="form-group col-md-4">
                                        <label class="floating-label-activo-sm">Total de días</label>
                                        <input type="text" class="form-control form-control-sm" name="dias"
                                            id="dias">
                                    </div>
                                @endif


                            </div>
                            <div class="form-row">
                                <h6 class="my-3">II.- Dignósticos</h6>
                            </div>
                            <div class="form-row">
                                @if (isset($epicrisis_alta_medica))
                                    <div class="form-group col-md-6">
                                        <label class="floating-label-activo-sm">Diagnósticos de ingreso</label>
                                        <input class="form-control form-control-sm"
                                            name="diagnostico_ingreso_epicrisis_alta_medica"
                                            id="diagnostico_ingreso_epicrisis_alta_medica"
                                            value="@if (isset($epicrisis_alta_medica)) {{ $epicrisis_alta_medica->diagnostico_ingreso }} @endif">
                                    </div>
                                @else
                                    <div class="form-group col-md-6">
                                        <label class="floating-label-activo-sm">Diagnósticos de ingreso</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                            name="diagnostico_ingreso_epicrisis_alta_medica"
                                            id="diagnostico_ingreso_epicrisis_alta_medica"></textarea>
                                    </div>
                                @endif


                                @if (isset($epicrisis_alta_medica))
                                    <div class="form-group col-md-6">
                                        <label class="floating-label-activo-sm">Diagnósticos de alta</label>
                                        <input class="form-control form-control-sm"
                                            name="diagnostico_alta_epicrisis_alta_medica"
                                            id="diagnostico_alta_epicrisis_alta_medica"
                                            value="@if (isset($epicrisis_alta_medica)) {{ $epicrisis_alta_medica->diagnostico_alta }} @endif">
                                    </div>
                                @else
                                    <div class="form-group col-md-6">
                                        <label class="floating-label-activo-sm">Diagnósticos de alta</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                            name="diagnostico_alta_epicrisis_alta_medica"
                                            id="diagnostico_alta_epicrisis_alta_medica"></textarea>
                                    </div>
                                @endif

                            </div>
                            <div class="form-row">
                                <h6 class="my-3">III.- Tratamientos y cirugías realizadas</h6>
                            </div>
                            <div class="form-row">

                                @if (isset($epicrisis_alta_medica))
                                    <div class="form-group col-md-4">
                                        <label class="floating-label-activo-sm">Tratamientos</label>
                                        <input class="form-control form-control-sm"
                                            name="tratamiento_cirugia_epicrisis_alta_medica"
                                            id="tratamiento_cirugia_epicrisis_alta_medica"
                                            value="@if (isset($epicrisis_alta_medica)) {{ $epicrisis_alta_medica->tratamientos_cirugias }} @endif">
                                    </div>
                                @else
                                    <div class="form-group col-md-4">
                                        <label class="floating-label-activo-sm">Tratamientos</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                            name="tratamiento_cirugia_epicrisis_alta_medica"
                                            id="tratamiento_cirugia_epicrisis_alta_medica"></textarea>
                                    </div>
                                @endif

                                @if (isset($epicrisis_alta_medica))
                                    <div class="form-group col-md-4">
                                        <label class="floating-label-activo-sm">Procedimientos quirúrgicos</label>
                                        <input class="form-control form-control-sm"
                                            name="procedimiento_quirurgico_cirugia_epicrisis_alta_medica"
                                            id="procedimiento_quirurgico_cirugia_epicrisis_alta_medica"
                                            value="@if (isset($epicrisis_alta_medica)) {{ $epicrisis_alta_medica->procedimientos_quirurgicos_cirugia }} @endif">
                                    </div>
                                @else
                                    <div class="form-group col-md-4">
                                        <label class="floating-label-activo-sm">Procedimientos quirúrgicos</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                            name="procedimiento_quirurgico_cirugia_epicrisis_alta_medica"
                                            id="procedimiento_quirurgico_cirugia_epicrisis_alta_medica"></textarea>
                                    </div>
                                @endif


                                @if (isset($epicrisis_alta_medica))
                                    <div class="form-group col-md-4">
                                        <label class="floating-label-activo-sm">Otros procedimientos y/o
                                            tratamientos</label>
                                        <input class="form-control form-control-sm"
                                            name="otro_procedimiento_tratamiento_cirugia_epicrisis_alta_medica"
                                            id="otro_procedimiento_tratamiento_cirugia_epicrisis_alta_medica"
                                            value="@if (isset($epicrisis_alta_medica)) {{ $epicrisis_alta_medica->otros_tratamientos_procedimientos }} @endif">
                                    </div>
                                @else
                                    <div class="form-group col-md-4">
                                        <label class="floating-label-activo-sm">Otros procedimientos y/o
                                            tratamientos</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                            name="otro_procedimiento_tratamiento_cirugia_epicrisis_alta_medica"
                                            id="otro_procedimiento_tratamiento_cirugia_epicrisis_alta_medica"></textarea>
                                    </div>
                                @endif

                            </div>
                            <div class="form-row">
                                <h6 class="my-3">IV.- Controles y evolución intrahospitalaria</h6>
                            </div>
                            <div class="form-row">

                                @if (isset($epicrisis_alta_medica))
                                    <div class="form-group col-md-6">
                                        <label class="floating-label-activo-sm">Tratamientos</label>
                                        <input class="form-control form-control-sm"
                                            name="tratamiento_control_cirugia_epicrisis_alta_medica"
                                            id="tratamiento_control_cirugia_epicrisis_alta_medica"
                                            value="@if (isset($epicrisis_alta_medica)) {{ $epicrisis_alta_medica->tratamientos_controles }} @endif">
                                    </div>
                                @else
                                    <div class="form-group col-md-6">
                                        <label class="floating-label">Tratamientos</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                            name="tratamiento_control_cirugia_epicrisis_alta_medica"
                                            id="tratamiento_control_cirugia_epicrisis_alta_medica"></textarea>
                                    </div>
                                @endif


                                @if (isset($epicrisis_alta_medica))
                                    <div class="form-group col-md-6">
                                        <label class="floating-label-activo-sm">Procedimientos quirúrgicos</label>
                                        <input class="form-control form-control-sm"
                                            name="procedimiento_control_cirugia_epicrisis_alta_medica"
                                            id="procedimiento_control_cirugia_epicrisis_alta_medica"
                                            value="@if (isset($epicrisis_alta_medica)) {{ $epicrisis_alta_medica->procedimientos_quirurgicos_controles }} @endif">
                                    </div>
                                @else
                                    <div class="form-group col-md-6">
                                        <label class="floating-label-activo-sm">Procedimientos quirúrgicos</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                            name="procedimiento_control_cirugia_epicrisis_alta_medica"
                                            id="procedimiento_control_cirugia_epicrisis_alta_medica"></textarea>
                                    </div>
                                @endif

                            </div>
                            <div class="form-row">
                                <h6 class="my-3">V.- Controles e indicaciones al alta</h6>
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

                                @if (isset($epicrisis_alta_medica))
                                    <div class="form-group col-md-8">
                                        <label class="floating-label-activo-sm">Indicaciones al alta</label>
                                        <input class="form-control form-control-sm"
                                            name="indicaciones_alta_epicrisis_alta_medica"
                                            id="indicaciones_alta_epicrisis_alta_medica"
                                            value="@if (isset($epicrisis_alta_medica)) {{ $epicrisis_alta_medica->indicaciones_alta }} @endif">
                                    </div>
                                @else
                                    <div class="form-group col-md-8">
                                        <label class="floating-label-activo-sm">Indicaciones al alta</label>
                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                            name="indicaciones_alta_epicrisis_alta_medica"
                                            id="indicaciones_alta_epicrisis_alta_medica"></textarea>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 text-center">
                            <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
                                <button type="button" class=" btn_agregar_examen btn btn-info btn-sm mt-1" onclick="carnet_alta();">Carnet de  alta</button>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 text-center">
                            <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
                                <button type="button" class=" btn btn-outline-primary btn-sm mt-1" >Guardar epicrisis</button>
                            </div>
                        </div>
                        @include('general.hospitalizacion.modals.carne_alta')
                    </div>
                    <hr>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function carnet_alta(){
        $('#carne_alta').modal('show');
    }
</script>


