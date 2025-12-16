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
                        <h6 class="f-16 text-c-blue">Solicitud de pabellón quirúrgico</h6>
                        <hr>
                    </div>
                </div>
                <form id="form_solicitud_pabellon_quirurgico_dental"
                    action="{{ route('dental.registrar_solicitud_pabellon_quirurgico') }}" method="POST">

                    @csrf
                    <input type="hidden" name="ficha_id_quirurgico_dental" id="ficha_id_quirurgico_dental"
                        value=" @if ($ficha != null) {{ $ficha->id }} @endif">
                    <input type="hidden" name="paciente_quirurgico_dental" id="paciente_quirurgico_dental"
                        value="{{ $paciente->id }}">

                    <div class="row">
                        <!--Información general-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Información general</h6>
                                </div>

                                <div class="card-body shadow-none">

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Clínica / Hospital</label>
                                            <select class="form-control form-control-sm" name="lugar_atencion_pabellon"
                                                id="lugar_atencion_pabellon">
                                                <option value="0">Seleccione...</option>
                                                @foreach ($lugares_atenciones as $lugares)
                                                    <option value="{{ $lugares->id }}"> {{ $lugares->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Nombre completo</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="nombre_paciente_pabellon" id="nombre_paciente_pabellon"
                                                value="{{ $paciente->nombres }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Edad</label>
                                            <input type="text" class="form-control form-control-sm" name="edad_pabellon"
                                                id="edad_pabellon" value="{{ $paciente->fecha_nac }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Previsión</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="prevision_pabellon" id="prevision_pabellon"
                                                value="{{ $paciente->Prevision()->first()->nombre }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Email</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="email_pabellon" id="email_pabellon"
                                                value="{{ $paciente->email }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Teléfono</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="telefono_uno_pabellon" id="telefono_uno_pabellon"
                                                value="{{ $paciente->telefono_uno }}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Patologías crónicas</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="patologias_cronicas_pabellon" id="patologias_cronicas_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Diagnóstico Pre-Operatorio</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="diagnositco_preoperatorio_pabellon"
                                                id="diagnositco_preoperatorio_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Operación</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="operacion_pabellon" id="operacion_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Código de cirugía</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="codigo_cirugia_pabellon" id="codigo_cirugia_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Anestesia</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="anestesia_pabellon" id="anestesia_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Tipo de hospitalización</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="tipo_hospitalizacion_pabellon" id="tipo_hospitalizacion_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Grado de urgencia</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="grado_urgencia_pabellon" id="grado_urgencia_pabellon">
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
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Cirujano</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="cirujano_pabellon" id="cirujano_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Ayudante 1</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="ayudante_uno_pabellon" id="ayudante_uno_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Ayudante 2</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="ayudante_dos_pabellon" id="ayudante_dos_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Anestesista</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="anestesista_pabellon" id="anestesista_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Arsenalería</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="arsenaleria_pabellon" id="arsenaleria_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Equipamiento especial</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="equipamiento_especial_pabellon"
                                                id="equipamiento_especial_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Instrumental especial</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="instrumental_especial_pabellon"
                                                id="instrumental_especial_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Insumos especiales</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="insumos_especial_pabellon" id="insumos_especial_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Código de cirugía</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="codigo_cirugia_dos_pabellon" id="codigo_cirugia_dos_pabellon">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Anestesia</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="anestesia_dos_pabellon" id="anestesia_dos_pabellon">
                                        </div>
                                        <div class="form-group col-md-3" id="form_0">
                                            <label class="floating-label">Tipo de hospitalización</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="tipo_hospitalizacion_dos_pabellon"
                                                id="tipo_hospitalizacion_dos_pabellon">
                                        </div>
                                        <div class="form-group col-md-3" id="form_0">
                                            <label class="floating-label">Grado de urgencia</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="grado_cirugia_dos_pabellon" id="grado_cirugia_dos_pabellon">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Otros profesionales-->
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Otros profesionales</h6>
                                </div>
                                <div class="card-body shadow-none">

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Especialidad 1</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="especialidad_uno_pabellon" id="especialidad_uno_pabellon">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label">Especialidad 2</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="especialidad_dos_pabellon" id="especialidad_dos_pabellon">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Comentarios</label>
                                            <textarea class="form-control form-control-sm" rows="2"
                                                name="comentarios_pabellon" id="comentarios_pabellon"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <button type="reset" class="btn btn-danger">Borrar formulario</button>
                            <button type="submit" class="btn btn-info">Enviar formulario</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
