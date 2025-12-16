<!---******* Modal Formulario Reembolso gastos médicos ********-->
<div id="modal_reembolso_medico" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal_reembolso_medico" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Reembolso de gastos médicos</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>

            <form id="form_gastos_medicos" method="POST" action="{{ route('dental.registrar_gastos') }}">
                @csrf

                <input type="hidden" name="ficha_id_gastos" id="ficha_id_gastos"
                    value=" @if ($ficha != null) {{ $ficha->id }} @endif">

                <input type="hidden" name="paciente_gastos" id="paciente_gastos" value="{{ $paciente->id }}">

                <input type="hidden" name="lugar_gastos" id="lugar_gastos" value="{{ $lugar_atencion->id }}">

                <div class="modal-body">
                    <div class="bt-wizard" id="reembolso_gastos_medicos">
                        <ul class="nav nav-pills">
                            <li class="tab-wizard-formularios"><a href="#ident_asegurado_carga"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Identificacion del asegurado o
                                    carga</a></li>
                            <li class="tab-wizard-formularios"><a href="#ident_causa_solicitud"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Causa de la solicitud</a></li>
                            <li class="tab-wizard-formularios"><a href="#ant_reembolso"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Antecedentes del reembolso</a>
                            </li>
                            <li class="tab-wizard-formularios"><a href="#informe_medico"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Informe médico</a></li>
                            <li class="tab-wizard-formularios"><a href="#info_personal_tratante"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Profesional tratante</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane pt-4 active show" id="ident_asegurado_carga">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Identificacion del asegurado o carga</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Aseguradora</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="aseguradora_gastos_medicos" id="aseguradora_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nº Poliza</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="num_poliza_gastos_medicos" id="num_poliza_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Empresa asociada</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="empresa_asociada_gastos_medicos" id="empresa_asociada_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre Asegurado</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_asegurado_gastos_medicos" id="nombre_asegurado_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Rut asegurado</label>
                                        <input type="person" class="form-control form-control-sm"
                                            type="rut_asegurado_gastos_medicos" name="rut_asegurado_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Previsión</label>
                                        <select id="prevision_gastos_medicos" name="prevision_gastos_medicos"
                                            class="form-control form-control-sm">
                                            <option value="0">Selecione una opción</option>
                                            @foreach ($prevision as $prev)
                                                <option value="{{ $prev->id }}">{{ $prev->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre del paciente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_paciente_asegurado_gastos_medicos"
                                            id="nombre_paciente_asegurado_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Tipo de carga</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="tipo_carga_gastos_medicos" id="tipo_carga_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Edad</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="edad_gastos_medicos" id="edad_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nº de carga</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="numero_carga_gastos_medicos" id="numero_carga_gastos_medicos">
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="ident_causa_solicitud">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Causa de la solicitud</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Causa</label>
                                        <select class="form-control form-control-sm" id="causa_gastos_medicos"
                                            name="causa_gastos_medicos">
                                            <option value="">Seleccione</option>
                                            <option value="1">Accidente</option>
                                            <option value="2">Continuidad de tratamiento</option>
                                            <option value="3">Enfermedad</option>
                                            <option value="4">Embarazo</option>
                                            <option value="5">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Especifique otro</label>
                                        <input type="text" class="form-control form-control-sm"
                                            type="especifique_otro_gastos_medicos"
                                            name="especifique_otro_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Diagnóstico</label>
                                        <input type="text" class="form-control form-control-sm"
                                            type="diagnostico_causa_gastos_medicos"
                                            name="diagnostico_causa_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Continuidad de tratamiento?</label>
                                        <select class="form-control form-control-sm" id="continuidad_gastos_medicos"
                                            name="continuidad_gastos_medicos">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de accidente</label>
                                        <input type="date" class="form-control form-control-sm"
                                            type="fecha_accidente_gastos_medicos" name="fecha_accidente_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Lugar del accidente</label>
                                        <select class="form-control form-control-sm " id="tipo_accidente_gastos_medicos"
                                            name="tipo_accidente_gastos_medicos">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Vía Pública</option>
                                            <option value="2">Hogar</option>
                                            <option value="3">Trayecto al trabajo</option>
                                            <option value="4">Trayecto al hogar</option>
                                            <option value="5">Trabajo</option>
                                            <option value="6">Tránsito</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                            <p>Por este medio certifico que los datos aportados son verdaderos y
                                                autorizo al médico tratante hospitales o cualquier otra institución
                                                de
                                                salud , para que suministre la información requerida de mi persona o
                                                beneficiario, conforme lo dispone la LEY Nº 19.628 y el artículo 127
                                                del
                                                código Sanitario declaro también conocer y autorizar a que todos los
                                                antecedentes en esta solicitud de reembolso serán del conocimiento
                                                de
                                                las diferentes personas que participan en la evaluación, liquidación
                                                y
                                                traslado de la misma , por lo que libero a la compañía aseguradora
                                                de
                                                toda responsabilidad en el manejo de la misma. En el caso de
                                                requerir
                                                confidencialidad, rogamos enviar en sobre cerrado al departamento de
                                                salud con el rotulo de confidencial. Recuerde que en el caso de
                                                accidente del tránsito, <strong>deberá presentar la liquidación del
                                                    seguro obligatorio de accidentes personales.</strong></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="ant_reembolso">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Antecedentes del reembolso</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de prestación</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_prestación_gastos_medicos" id="fecha_prestación_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Bonos</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="bonos_gastos_medicos" id="bonos_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Total de documentos</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="total_documentos_gastos_medicos" id="total_documentos_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Boletas</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="boletas_gastos_medicos" id="boletas_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Recetas</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="recetas_gastos_medicos" id="recetas_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Diferencia reclamada</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="diferencia_reclamada_gastos_medicos"
                                            id="diferencia_reclamada_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Otros</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="otros_gastos_medicos" id="otros_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nº de reclamos</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="numero_reclamos_gastos_medicos" id="numero_reclamos_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de ingresos</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_ingreso_gastos_medicos" id="fecha_ingreso_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Otros</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="otros1_gastos_medicos" id="otros1_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Reclamo anterior</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="reclamo_anterior_gastos_medicos" id="reclamo_anterior_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Autorización del usuario</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="autorizacion_usuario_gastos_medicos"
                                            id="autorizacion_usuario_gastos_medicos">
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="informe_medico">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Informe médico tratante</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de inicio de
                                            enfermedad</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_inicio_enfermedad_gastos_medicos"
                                            id="fecha_inicio_enfermedad_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha primera consulta
                                            médica</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_primera_consulta_gastos_medicos"
                                            id="fecha_primera_consulta_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de consulta</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_consulta_gastos_medicos" id="fecha_consulta_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre del paciente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_paciente_gastos_medicos" id="nombre_paciente_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Edad</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="edad_paciente_gastos_medicos" id="edad_paciente_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Dirección</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="direccion_paciente" id="direccion_paciente">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Diagnóstico</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="diagnostico_gastos_medicos" id="diagnostico_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Control?</label>
                                        <select class="form-control form-control-sm" id="control_gastos_medicos"
                                            name="control_gastos_medicos">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Embarazo?</label>
                                        <select class="form-control form-control-sm" id="embarazo_gastos_medicos"
                                            name="embarazo_gastos_medicos">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                            <option value="3">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nº de semanas</label>
                                        <select class="form-control form-control-sm" id="num_semanas_gastos_medicos"
                                            name="num_semanas_gastos_medicos">
                                            <option>Seleccione una opción</option>

                                            @for ($i = 0; $i < 52; $i++)
                                                <option value="{{ $i + 1 }}">{{ $i + 1 }}</option>
                                            @endfor

                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fur</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_fur_gastos_medicos" id="fecha_fur_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Complicación en el
                                            embarazo?</label>
                                        <select class="form-control form-control-sm"
                                            id="complicacion_embarazo_gastos_medicos"
                                            name="complicacion_embarazo_gastos_medicos">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                            <option value="3">Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Accidente?</label>
                                        <select class="form-control form-control-sm" id="accidente_gastos_medicos"
                                            name="accidente_gastos_medicos">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                            <option value="3">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de accidente</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_accidente1_gastos_medicos" id="fecha_accidente1_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Tipo de accidente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="tipo_accidente1_gastos_medicos" id="tipo_accidente1_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Lugar de accidente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="lugar_accidente_gastos_medicos" id="lugar_accidente_gastos_medicos">
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="info_personal_tratante">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Profesional tratante</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Rut</label>
                                        <input type="person" class="form-control form-control-sm"
                                            name="rut_profesional" id="rut_profesional"
                                            value="{{ $profesional->rut }}">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_profesional" id="nombre_profesional"
                                            value="{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Teléfono</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            name="telefono_profesional" id="telefono_profesional"
                                            value="{{ $profesional->telefono_uno }}">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Email</label>
                                        <input type="email" class="form-control form-control-sm"
                                            name="email_profesional" id="email_profesional"
                                            value="{{ $profesional->email }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Fecha del informe</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_informe_gastos_medicos" id="fecha_informe_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver
                                            documento en
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
                    <button type="button" onclick="reset_form('form_gastos_medicos')" class="btn btn-danger"
                        data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </form>

        </div>
    </div>
</div>
