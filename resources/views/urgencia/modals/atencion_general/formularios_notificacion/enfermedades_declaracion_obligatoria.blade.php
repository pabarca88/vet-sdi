<!---******* Modal Formulario enfermedades de declaración obligatoria ********-->
<div id="modal_enfermedades_declaracion_obligatoria" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal_enfermedades_declaracion_obligatoria" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Enfermedades de declaración obligatoria E.N.O</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form id="form_declaracion_eno" method="POST" action="{{ route('dental.registrar_declaracion_eno') }}">

                @csrf
                <input type="hidden" name="ficha_id_declaracion_eno" id="ficha_id_declaracion_eno"
                    value=" @if ($ficha != null) {{ $ficha->id }} @endif">

                <input type="hidden" name="paciente_declaracion_eno" id="paciente_declaracion_eno"
                    value="{{ $paciente->id }}">

                <input type="hidden" name="lugar_declaracion_eno" id="lugar_declaracion_eno"
                    value="{{ $lugar_atencion->id }}">

                <div class="modal-body">
                    <div class="bt-wizard" id="enfermedades_declaracion_obligatoria">
                        <ul class="nav nav-pills">
                            <li class="tab-wizard-formularios"><a href="#ident_establecimiento_eno"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Identificación del
                                    establecimiento</a></li>
                            <li class="tab-wizard-formularios"><a href="#ident_paciente_eno"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Identificación del paciente</a>
                            </li>
                            <li class="tab-wizard-formularios"><a href="#ident_clinica_paciente_eno"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Información clínica del
                                    paciente</a></li>
                            <li class="tab-wizard-formularios"><a href="#notificacion_eno"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Notificación</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane pt-4 active show" id="ident_establecimiento_eno">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Identificación del establecimiento</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">
                                            Nombre del establecimiento
                                        </label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_establecimiento" id="nombre_establecimiento">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">
                                            Código del establecimiento
                                        </label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="codigo_establecimiento" id="codigo_establecimiento">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">
                                            Nombre de oficina provincial
                                        </label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_oficina_provincial" id="nombre_oficina_provincial">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">
                                            Código de oficina provincial
                                        </label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="codigo_oficina_provincial" id="codigo_oficina_provincial">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">
                                            Nº de ficha clínica o código de control
                                        </label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="numero_ficha_control" id="numero_ficha_control">
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="ident_paciente_eno">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Identificación del Paciente</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Rut</label>
                                        <input type="person" class="form-control form-control-sm"
                                            name="rut_paciente_eno" id="rut_paciente_eno"
                                            value="{{ $paciente->rut }}">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre completo</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_paciente_eno" id="nombre_paciente_eno"
                                            value="{{ $paciente->nombre . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Sexo</label>
                                        <input type="text" class="form-control form-control-sm" name="sexo_paciente_eno"
                                            id="sexo_paciente_eno"
                                            value="@if ($paciente->sexo == 'M') Masculino @else Femenino @endif">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nacimiento</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="nacimiento_paciente_eno" id="nacimiento_paciente_eno"
                                            value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Dirección</label>
                                        <input type="address" class="form-control form-control-sm"
                                            name="direccion_paciente_eno" id="direccion_paciente_eno"
                                            value="{{ $paciente->Direccion()->first()->direccion .' ' .$paciente->Direccion()->first()->numero_dir .', ' .$paciente->Direccion()->first()->Ciudad()->first()->nombre .', Región de ' .$paciente->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}">

                                    </div>
                                    <div class="form-group col-sm-6 col-md-6" style="display: none">
                                        <label class="floating-label-activo-sm">Región / Comuna</label>
                                        <select id="" name="" class="form-control form-control-sm">
                                            <option selected value="0">Seleccione una opción </option>
                                            <optgroup label="Región de Valparaíso">
                                                <option value="1">Viña del Mar</option>
                                                <option value="2">Valparaíso</option>
                                                <option value="3">San Felipe</option>
                                                <option value="3">etc...</option>
                                            </optgroup>
                                            <optgroup label="Región Metropolitana">
                                                <option value="10">Santiago</option>
                                                <option value="11">Maipú</option>
                                                <option value="12">etc...</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Correo electrónico</label>
                                        <input type="email" class="form-control form-control-sm"
                                            name="email_paciente_eno" id="email_paciente_eno"
                                            value="{{ $paciente->email }}">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Teléfono</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            name="telefono_paciente_eno" id="telefono_paciente_eno"
                                            value="{{ $paciente->telefono_uno }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nacionalidad</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nacionalidad_paciente_eno" id="nacionalidad_paciente_eno">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Código de nacionalidad</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="cod_nacionalidad_paciente_eno" id="cod_nacionalidad_paciente_eno">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Seleccione pueblo
                                            originario</label>
                                        <select class="form-control form-control-sm" id="pueblo_originario_eno"
                                            name="pueblo_originario_eno">
                                            <option value="">Selecione una opción</option>
                                            <option value="1">Ninguna</option>
                                            <option value="2">Atacameño</option>
                                            <option value="3">Aimara</option>
                                            <option value="5">Colla</option>
                                            <option value="6">etc..</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Ocupación</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="ocupacion_paciente_eno" id="ocupacion_paciente_eno">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Condición</label>
                                        <select class="form-control form-control-sm" id="ocupacion_condicion_eno"
                                            name="ocupacion_condicion_eno">
                                            <option value="">Seleccione condición</option>
                                            <option value="1">Inactivo/a</option>
                                            <option value="2">Activo/a</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Categoría</label>
                                        <select class="form-control form-control-sm" id="ocupacion_categoria_eno"
                                            name="ocupacion_categoria_eno">
                                            <option value="">Seleccione categoría</option>
                                            <option value="1">Patrón / Empresario</option>
                                            <option value="2">Empleado</option>
                                            <option value="3">Obrero</option>
                                            <option value="4">Trabajador Independiente</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="ident_clinica_paciente_eno">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Información clínica del paciente</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Diagnósico Confirmado</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="diagnostico_confirmado_eno" id="diagnostico_confirmado_eno">
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">CIE-10</label>
                                        <input type="text" class="form-control form-control-sm" name="cie_10_eno"
                                            id="cie_10_eno">
                                        <input type="hidden" class="form-control form-control-sm" name="id_cie_10_eno"
                                            id="id_cie_10_eno">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label-activo-sm">Primeros síntomas</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_primeros_sintomas_eno" id="fecha_primeros_sintomas_eno">
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label-activo-sm">País de contagio</label>
                                        <select class="form-control form-control-sm" id="pais_contagio_eno"
                                            name="pais_contagio_eno">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Chile</option>
                                            <option value="2">Extranjero</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label-activo-sm">País</label>
                                        <input type="text" class="form-control form-control-sm" name="pais_eno"
                                            id="pais_eno">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Antecedentes de Vacunación</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label-activo-sm">Vacunación</label>
                                        <select class="form-control form-control-sm" id="vacunacion_eno"
                                            name="vacunacion_eno">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                            <option value="3">Ignorado</option>
                                            <option value="4">No corresponde</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label-activo-sm">Fecha última dosis</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_ultima_dosis_eno" id="fecha_ultima_dosis_eno">
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label-activo-sm">Nº última dosis</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="numero_ultima_dosis_eno" id="numero_ultima_dosis_eno">
                                    </div>
                                </div>
                                <div class="form-row mt-0 pt-0">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <p class="mb-0 pb-0">Completar solo si la declaración corresponde a
                                            TBC</p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Solo para
                                            TBC(NUEVO-RECAIDA)</label>
                                        <input type="text" class="form-control form-control-sm" name="nuevo_tbc_eno"
                                            id="nuevo_tbc_eno">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">RECAIDAS</label>
                                        <input type="text" class="form-control form-control-sm" name="recaidas_tbc_eno"
                                            id="recaidas_tbc_eno">
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="notificacion_eno">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Información del profesional que notifica</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Rut</label>
                                        <input type="person" class="form-control form-control-sm"
                                            name="rut_profesional_eno" id="rut_profesional_eno">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombres y Apellidos</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_apellidos_eno" id="nombre_apellidos_eno">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Teléfono</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            name="telefono_profesional_eno" id="telefono_profesional_eno">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Correo Electrónico</label>
                                        <input type="email" class="form-control form-control-sm"
                                            name="correo_profesional_eno" id="correo_profesional_eno">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Notificación</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_eno"
                                            id="fecha_eno">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Hora</label>
                                        <input type="time" class="form-control form-control-sm" name="hora_eno"
                                            id="hora_eno">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="text-c-blue text-center mt-3">Instructivo boletín notificación de
                                            enfermedades de declaración obligatoria (boletín E.N.O)</h5>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                            <ol class="px-2">
                                                <li value="1">
                                                    <p>Los Items <strong>Nombre;
                                                            Establecimiento</strong>;<strong>Oficina
                                                            Provincial</strong>;<strong>Codigos
                                                            Asignados</strong>;<strong>Seremi</strong>;<strong>Nacionalidad</strong>;<strong>Pueblo
                                                            originario declarado</strong>;<strong> Comuna de
                                                            residencia</strong>, etc. <a href="https://deis.minsal.cl"
                                                            class="link-negro"> Los puede consultar acá. </a></p>
                                                </li>
                                                <li>
                                                    <p>Para el(la) enfermo(a) que presente 2 o más afecciones de
                                                        declaración obligatoria, éstas deberán ser registradas en <span
                                                            class="auto-style1"><strong>FORMULARIOS
                                                                SEPARADOS</strong></span> para cada una. Sólo en caso de
                                                        Tuberculosis se registrará en la 2da. línea otro diagnóstico
                                                        relacionado con esta afección.</p>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en
                                            PDF</button>
                                    </div>
                                </div>

                            </div>
                            <div class="row justify-content-between mx-0 btn-page">
                                <div class="col-sm-6 pl-0">
                                    <a href="#!" class="btn btn-success btn-sm button-previous">Anterior</a>
                                </div>
                                <div class="col-sm-6 text-md-right pr-0">
                                    <a href="#!" class="btn btn-success btn-sm button-next">Siguente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="reset_form('form_declaracion_eno')" class="btn btn-danger"
                        data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
