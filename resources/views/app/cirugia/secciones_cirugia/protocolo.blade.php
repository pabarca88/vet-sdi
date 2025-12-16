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
                        <h6 class="f-16 text-c-blue">Protocolo operatorio</h6>
                        <hr>
                    </div>
                </div>
                <form id="form_protocolo_operatorio" action="{{ route('dental.registrar_protocolo_operatorio') }}"
                    method="POST">

                    @csrf
                    <input type="hidden" name="ficha_id_protocolo_operatorio_dental"
                        id="ficha_id_protocolo_operatorio_dental"
                        value=" @if ($id_ficha_atencion != null) {{ $id_ficha_atencion }} @endif">
                    <input type="hidden" name="paciente_protocolo_operatorio_dental"
                        id="paciente_protocolo_operatorio_dental" value="{{ $paciente->id }}">

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
                                            <input type="text" class="form-control form-control-sm"
                                                name="rut_protocolo_operatorio_dental"
                                                id="rut_protocolo_operatorio_dental" value="{{ $paciente->rut }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Nombre completo</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="nombre_protocolo_operatorio_dental"
                                                id="nombre_protocolo_operatorio_dental"
                                                value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Edad</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="edad_protocolo_operatorio_dental"
                                                id="edad_protocolo_operatorio_dental"
                                                value="{{ $paciente->fecha_nac }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Previsión</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="prevision_protocolo_operatorio_dental"
                                                id="prevision_protocolo_operatorio_dental"
                                                value="{{ $paciente->Prevision()->first()->nombre }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Teléfono</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="telefono_protocolo_operatorio_dental"
                                                id="telefono_protocolo_operatorio_dental"
                                                value="{{ $paciente->telefono_uno }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Hospital / Clínica</label>
                                            <select class="form-control form-control-sm"
                                                name="lugar_atencion_protocolo_operatorio_dental"
                                                id="lugar_atencion_protocolo_operatorio_dental">

                                                <option value="0">Seleccione...</option>
                                                {{--  @foreach ($lugares_atencion as $lugares)
                                                    <option value="{{ $lugares->id }}">
                                                        {{ $lugares->nombre }}
                                                    </option>
                                                @endforeach  --}}
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label">Nº Pabellón</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="nro_pabellon_protocolo_operatorio_dental"
                                                id="nro_pabellon_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Inicio operación</label>
                                            <input type="time" class="form-control form-control-sm"
                                                name="inicio_operacion_protocolo_operatorio_dental"
                                                id="inicio_operacion_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Fin operación</label>
                                            <input type="time" class="form-control form-control-sm"
                                                name="fin_operacion_protocolo_operatorio_dental"
                                                id="fin_operacion_protocolo_operatorio_dental">
                                        </div>
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
                                                name="diag_preoperatorio_protocolo_operatorio_dental"
                                                id="diag_preoperatorio_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Diagnóstico post operatorio</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="diag_postoperatorio_protocolo_operatorio_dental"
                                                id="diag_postoperatorio_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Código cirugía</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="codigo_cirugia_protocolo_operatorio_dental"
                                                id="codigo_cirugia_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Anestesia</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="anestesia_protocolo_operatorio_dental"
                                                id="anestesia_protocolo_operatorio_dental">
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
                                                name="cirujano_protocolo_operatorio_dental"
                                                id="cirujano_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Ayudantes</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="ayudantes_protocolo_operatorio_dental"
                                                id="ayudantes_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Anestesistas y ayudantes de
                                                anestesia</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=2;"
                                                name="anestesias_ayudantes_protocolo_operatorio_dental"
                                                id="anestesias_ayudantes_protocolo_operatorio_dental"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Arsenalería</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=2;"
                                                name="arsenaleria_protocolo_operatorio_dental"
                                                id="arsenaleria_protocolo_operatorio_dental"></textarea>
                                        </div>
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
                                                name="biopsia_rapida_protocolo_operatorio_dental"
                                                id="biopsia_rapida_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Diferida</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="biopsia_diferida_protocolo_operatorio_dental"
                                                id="biopsia_diferida_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Nº de muestras</label>
                                            <input type="number" class="form-control form-control-sm"
                                                name="biopsia_nro_muestra_protocolo_operatorio_dental"
                                                id="biopsia_nro_muestra_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Patólogo</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="biopsia_patologo_protocolo_operatorio_dental"
                                                id="biopsia_patologo_protocolo_operatorio_dental">
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
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Operación</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                name="nombre_operacion_protocolo_operatorio_dental"
                                                id="nombre_operacion_protocolo_operatorio_dental"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Material de hemostasia</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                name="material_hemostasia_protocolo_operatorio_dental"
                                                id="material_hemostasia_protocolo_operatorio_dental"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Material de cierre</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                onfocus="this.rows=4" onblur="this.rows=2;"
                                                name="material_cierre_protocolo_operatorio_dental"
                                                id="material_cierre_protocolo_operatorio_dental"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Otros (implantes, aseo, etc.)</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                name="otros_materiales_protocolo_operatorio_dental"
                                                id="otros_materiales_protocolo_operatorio_dental"></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control form-control-sm" placeholder="Descripción de la cirugía" rows="1" onfocus="this.rows=4"
                                                onblur="this.rows=2;"
                                                name="descripcion_cirugia_protocolo_operatorio_dental"
                                                id="descripcion_cirugia_protocolo_operatorio_dental"></textarea>
                                        </div>
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
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Fármacos</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                name="farmacos_protocolo_operatorio_dental"
                                                id="farmacos_protocolo_operatorio_dental"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Pulso y presión arterial</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;"
                                                name="pulso_presion_protocolo_operatorio_dental"
                                                id="pulso_presion_protocolo_operatorio_dental"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Incidentes</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                name="incidentes_protocolo_operatorio_dental"
                                                id="incidentes_protocolo_operatorio_dental"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Recuperación anestesia</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"
                                                name="recuperacion_anestesia_protocolo_operatorio_dental"
                                                id="recuperacion_anestesia_protocolo_operatorio_dental"></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control form-control-sm" placeholder="Descripción de anestesia"
                                                name="descripcion_anestesia_protocolo_operatorio_dental"
                                                id="descripcion_anestesia_protocolo_operatorio_dental"></textarea>
                                        </div>
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

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control form-control-sm" placeholder="Descripción de incidencias de la cirugía" rows="1"
                                                onfocus="this.rows=4" onblur="this.rows=2;"
                                                name="descripcion_incidencia_protocolo_operatorio_dental"
                                                id="descripcion_incidencia_protocolo_operatorio_dental"></textarea>
                                        </div>
                                    </div>

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
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm">Destino del
                                                paciente</label>
                                            <textarea class="form-control form-control-sm" placeholder="Sala UTI, Recuperación alta, etc." rows="1"
                                                onfocus="this.rows=2" onblur="this.rows=1;"
                                                name="destino_protocolo_operatorio_dental"
                                                id="destino_protocolo_operatorio_dental"></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm">Indicaciones post
                                                operatorias</label>
                                            <textarea class="form-control form-control-sm" placeholder="Indicaciones post-operatorias" rows="1"
                                                onfocus="this.rows=4" onblur="this.rows=2;"
                                                name="indicaciones_postoperacion_protocolo_operatorio_dental"
                                                id="indicaciones_postoperacion_protocolo_operatorio_dental"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-info">Enviar formulario</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
