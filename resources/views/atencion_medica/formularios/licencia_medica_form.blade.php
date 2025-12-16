<div class="tab-pane fade" id="pills-formularios-atencion" role="tabpanel"
    aria-labelledby="pills-formularios-atencion-tab">
    <div class="row pl-2 pr-4">
        <div class="col-md-12 mx-auto">
            <h5 class="text-c-blue mt-5 mb-4" style="font-size: 1.1rem;">Formulario de Licencias Médicas</h5>
            <span id="paciente" name="nombre_trabajador"></span>
            @if (isset($mensajeLicencia))
                <span id="mensaje_licencia" name="mensaje_licencia">{{ $mensajeLicencia }}</span>
            @endif
        </div>
    </div>
    <form method="post" action="{{ route('crear.licencia') }}" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id_paciente_li" value="{{ $paciente->id }}" id="id_paciente_fc">
        <input type="hidden" name="id_profesional_li" value="{{ $profesional->id }}" id="id_profesional_fc">



        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="switch switch-success d-inline m-r-10">
                        <input type="checkbox" id="enfermedad_comun_maternal" checked>
                        <label for="enfermedad_comun_maternal" class="cr"></label>
                    </div>
                    <label>Enfermedad común o maternal</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="switch switch-success d-inline m-r-10">
                        <input type="checkbox" id="laboral">
                        <label for="laboral" class="cr"></label>
                    </div>
                    <label>Laboral</label>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h6>Información del trabajador</h6>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group fill col-md-4">
                            <label class="floating-label">
                                Previsión
                            </label>
                            <select class="form-control form-control-sm" name="prevision" id="prevision">
                                <option value="0">Seleccione</option>
                                @foreach ($prevision as $p)
                                    <option value="{{ $p->id }}">{{ $p->nombre }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Rut</label>
                            <input type="text" class="form-control form-control-sm" name="rut_paciente_li"
                                id="rut_paciente_li">
                        </div>
                        <div class="form-group col-md-4">
                            <button type="button" id="buscar_btn" class="btn btn-sm btn-success btn-block"
                                onclick="buscarpaciente()">Verificar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h6>Empleador</h6>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="floating-label">Nombre</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_empleador"
                                id="nombre_empleador">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="floating-label">Rut</label>
                            <input type="text" class="form-control form-control-sm" name="rut_empleador"
                                id="rut_empleador">

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h6>Reposo</h6>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="floating-label-activo-sm">Desde</label>
                            <input type="date" name="reposo_inicio" id="reposo_inicio"
                                class="form-control form-control-sm" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label-activo-sm">Hasta</label>
                            <input type="date" name="reposo_fin" id="reposo_fin" class="form-control form-control-sm" />
                        </div>
                        <div class="form-group fill col-md-4">
                            <label class="floating-label">
                                Tipo de reposo
                            </label>
                            <select class="form-control form-control-sm" name="tipo_reposo" id="tipo_reposo">
                                <option>Seleccione una opción</option>
                                <option>Total</option>
                                <option>Mañana</option>
                                <option>Tarde</option>
                                <option>Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group fill col-md-4">
                            <label class="floating-label">
                                Lugar de reposo
                            </label>
                            <select class="form-control form-control-sm" name="lugar_reposo" id="lugar_reposo">
                                <option>Seleccione una opción</option>
                                <option>Domicilio personal</option>
                                <option>Domicilio de familiar</option>
                                <option>Otro</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Dirección</label>
                            <input type="text" class="form-control form-control-sm" name="direccion_reposo"
                                id="direccion_reposo">
                        </div>
                        <div class="form-group col-sm-4 col-md-4">
                            <label class="floating-label">Región / Comuna</label>
                            <select id="region_reposo" name="region_reposo" class="form-control form-control-sm">
                                <option selected value="0">Seleccione una opción</option>
                                <optgroup label="Región de Valparaíso">
                                    <option>Viña del Mar</option>
                                    <option>Valparaíso</option>
                                    <option>San Felipe</option>
                                    <option>etc...</option>
                                </optgroup>
                                <optgroup label="Región Metropolitana">
                                    <option>Santiago</option>
                                    <option>Maipú</option>
                                    <option>etc...</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h6>Información de licencia</h6>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group fill col-md-4 mt-2">
                            <label class="floating-label">
                                Tipo de Licencia
                            </label>
                            <select class="form-control d-inline form-control-sm" name="tipo_licencia"
                                id="tipo_licencia">
                                <option>Seleccione</option>
                                <option>..</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="switch switch-success d-inline m-r-2">
                                <input type="checkbox" id="recuperabilidad_laboral" name="recuperabilidad_laboral">
                                <label for="recuperabilidad_laboral" class="cr"></label>
                            </div>
                            <label>Recuperabilidad Laboral</label>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="switch switch-success d-inline m-r-2">
                                <input type="checkbox" id="tramite_invalidez" name="tramite_invalidez">
                                <label for="tramite_invalidez" class="cr"></label>
                            </div>
                            <label>Inicio Trámite de Invalidez</label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h6>Diagnóstico principal</h6>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group fill col-sm-6 col-md-6">
                            <label class="floating-label">
                                CIE-10
                            </label>
                            <input type="text" class="form-control form-control-sm" name="diagnostico_c10"
                                id="diagnostico_c10">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label">Diagnóstico</label>
                            <input type="text" class="form-control form-control-sm" name="diagnostico" id="diagnostico">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h6>Otros antecedentes</h6>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label">Descripción</label>
                            <input type="text" class="form-control form-control-sm" name="antecedentes"
                                id="antecedentes">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h6>Examenes de apoyo</h6>
                </div>
                <div class="card-body">

                    <input type="file" class="form-control-file pb-3" id="examen_apoyo" name="examen_apoyo">

                </div>
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-info">Guardar Licencia</button>
                <button type="button" class="btn btn-success">Imprimir</button>
            </div>
        </div>
    </form>
</div>
