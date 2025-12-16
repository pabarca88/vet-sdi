<!---******* Modal Formulario Reembolso gastos dentales ********-->
<div id="modal_reembolso_dental" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal_reembolso_dental" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Reembolso de gastos dentales</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="bt-wizard" id="reembolso_gastos_dentales">
                    <ul class="nav nav-pills">
                        <li class="tab-wizard-formularios"><a href="#ident_asegurado_carga_dental"
                                class="nav-link-wizard rounded-0" data-toggle="tab">Identificacion del asegurado o
                                carga</a></li>
                        <li class="tab-wizard-formularios"><a href="#ident_causa_solicitud_dental"
                                class="nav-link-wizard rounded-0" data-toggle="tab">Causa de la solicitud</a></li>
                        <li class="tab-wizard-formularios"><a href="#ant_reembolso_dental"
                                class="nav-link-wizard rounded-0" data-toggle="tab">Antecedentes del reembolso</a></li>
                        <li class="tab-wizard-formularios"><a href="#informe_medico_dental"
                                class="nav-link-wizard rounded-0" data-toggle="tab">Informe médico</a></li>
                        <li class="tab-wizard-formularios"><a href="#tratamientos_dentales"
                                class="nav-link-wizard rounded-0" data-toggle="tab">Tratamientos dentales</a></li>
                        <li class="tab-wizard-formularios"><a href="#ortodoncia" class="nav-link-wizard rounded-0"
                                data-toggle="tab">Ortodoncia</a></li>
                        <li class="tab-wizard-formularios"><a href="#info_profesional_tratante_dental"
                                class="nav-link-wizard rounded-0" data-toggle="tab">Profesional tratante</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane pt-4 active show" id="ident_asegurado_carga_dental">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Identificacion del asegurado o carga</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Aseguradora</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="aseguradora_dental" id="aseguradora_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nº Poliza</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="num_poliza_dental" id="num_poliza_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Empresa asociada</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="empresa_asociada_dental" id="empresa_asociada_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre Asegurado</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_asegurado_dental" id="nombre_asegurado_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Rut asegurado</label>
                                        <input type="person" class="form-control form-control-sm"
                                            type="rut_asegurado_dental" name="rut_asegurado_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Previsión</label>
                                        <select id="prevision" name="prevision" class="form-control form-control-sm">
                                            <option value="0">Selecione una opción</option>
                                            <option value="particular">Particular</option>
                                            <option value="fonasa">Fonasa</option>
                                            <option value="banmedica">Banmedica</option>
                                            <option value="colmena">Colmena</option>
                                            <option value="cruz verde">Cruz Verde</option>
                                            <option value="nueva masvida">Nueva MasVida</option>
                                            <option value="consalud">Consalud</option>
                                            <option value="control sin costo">Control sin costo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre del paciente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_paciente_dental" id="nombre_paciente_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Tipo de carga</label>
                                        <input type="text" class="form-control form-control-sm" name="tipo_carga_dental"
                                            id="tipo_carga_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Edad</label>
                                        <input type="number" class="form-control form-control-sm" name="edad" id="edad">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nº de carga</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="numero_carga_dental" id="numero_carga_dental">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pt-4" id="ident_causa_solicitud_dental">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Causa de la solicitud</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Causa</label>
                                        <select class="form-control form-control-sm" id="causa_dental"
                                            name="causa_dental">
                                            <option>Accidente</option>
                                            <option>Continuidad de tratamiento</option>
                                            <option>Enfermedad</option>
                                            <option>Embarazo</option>
                                            <option>Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Especifique otro</label>
                                        <input type="text" class="form-control form-control-sm" type="causa_otro_dental"
                                            name="causa_otro_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Diagnóstico</label>
                                        <input type="text" class="form-control form-control-sm"
                                            type="diagnostico_causa_dental" name="diagnostico_causa_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Continuidad de tratamiento?</label>
                                        <select class="form-control form-control-sm" id="causa_dental"
                                            name="causa_dental">
                                            <option>Seleccione una opción</option>
                                            <option>Si</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de accidente</label>
                                        <input type="date" class="form-control form-control-sm"
                                            type="fecha_accidente_dental" name="fecha_accidente_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Lugar del accidente</label>
                                        <select class="form-control form-control-sm " id="lugar_accidente_dental"
                                            name="lugar_accidente_dental">
                                            <option>Seleccione una opción</option>
                                            <option>Vía Pública</option>
                                            <option>Hogar</option>
                                            <option>Trayecto al trabajo</option>
                                            <option>Trayecto al hogar</option>
                                            <option>Trabajo</option>
                                            <option>Tránsito</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                            <p>Por este medio certifico que los datos aportados son verdaderos y
                                                autorizo al médico tratante hospitales o cualquier otra institución de
                                                salud , para que suministre la información requerida de mi persona o
                                                beneficiario, conforme lo dispone la LEY Nº 19.628 y el artículo 127 del
                                                código Sanitario declaro también conocer y autorizar a que todos los
                                                antecedentes en esta solicitud de reembolso serán del conocimiento de
                                                las diferentes personas que participan en la evaluación, liquidación y
                                                traslado de la misma , por lo que libero a la compañía aseguradora de
                                                toda responsabilidad en el manejo de la misma. En el caso de requerir
                                                confidencialidad, rogamos enviar en sobre cerrado al departamento de
                                                salud con el rotulo de confidencial. Recuerde que en el caso de
                                                accidente del tránsito, <strong>deberá presentar la liquidación del
                                                    seguro obligatorio de accidentes personales.</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pt-4" id="ant_reembolso_dental">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Antecedentes del reembolso</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de prestación</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_prestación_dental" id="fecha_prestación_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Bonos</label>
                                        <input type="text" class="form-control form-control-sm" name="bonos_dental"
                                            id="bonos_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Total de documentos</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="total_documentos_dental" id="total_documentos_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Boletas</label>
                                        <input type="text" class="form-control form-control-sm" name="boletas_dental"
                                            id="boletas_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Recetas</label>
                                        <input type="text" class="form-control form-control-sm" name="recetas_dental"
                                            id="recetas_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Diferencia reclamada</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="diferencia_reclamada_dental" id="diferencia_reclamada_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Otros</label>
                                        <input type="text" class="form-control form-control-sm" name="otros_dental"
                                            id="otros_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nº de reclamos</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="numero_reclamos_dental" id="numero_reclamos_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de ingresos</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_ingreso_dental" id="fecha_ingreso_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Otros</label>
                                        <input type="text" class="form-control form-control-sm" name="otros_dental"
                                            id="otros_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Reclamo anterior</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="reclamo_anterior_dental" id="reclamo_anterior_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Autorización del usuario</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="autorizacion_usuario_dental" id="autorizacion_usuario_dental">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pt-4" id="informe_medico_dental">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Informe médico tratante</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de inicio de enfermedad</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_inicio_enfermedad_dental" id="fecha_inicio_enfermedad_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha primera consulta médica</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_primera_consulta_dental" id="fecha_primera_consulta_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de consulta</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_consulta_dental" id="fecha_consulta_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre del paciente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_paciente_dental" id="nombre_paciente_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Edad</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="edad_paciente_dental" id="edad_paciente_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Dirección</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="direccion_paciente_dental" id="direccion_paciente_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Diagnóstico</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="diagnostico_dental" id="diagnostico_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Control?</label>
                                        <select class="form-control form-control-sm" id="control_dental"
                                            name="control_dental">
                                            <option>Seleccione una opción</option>
                                            <option>Si</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Accidente?</label>
                                        <select class="form-control form-control-sm" id="accidente_dental"
                                            name="accidente_dental">
                                            <option>Seleccione una opción</option>
                                            <option>Si</option>
                                            <option>No</option>
                                            <option>Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de accidente</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_accidente_dental" id="fecha_accidente_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Tipo de accidente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="tipo_accidente_dental" id="tipo_accidente_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Lugar de accidente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="lugar_accidente_dental" id="lugar_accidente_dental">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pt-4" id="tratamientos_dentales">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Tratamientos dentales</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label class="floating-label-activo-sm">Prestación</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="presntación_dental" id="presntación_dental">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label class="floating-label-activo-sm">Nº</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="numero_prestacion_dental" id="numero_prestacion_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Cantidad</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="cantidad_dental" id="cantidad_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_dental"
                                            id="fecha_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Valor unitario</label>
                                        <input type="number" class="form-control form-control-sm" name="valor_dental"
                                            id="valor_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Total</label>
                                        <input type="number" class="form-control form-control-sm" name="total_dental"
                                            id="total_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label class="floating-label-activo-sm">Prestación</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="presntación_dental" id="presntación_dental">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label class="floating-label-activo-sm">Nº</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="numero_prestacion_dental" id="numero_prestacion_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Cantidad</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="cantidad_dental" id="cantidad_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_dental"
                                            id="fecha_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Valor unitario</label>
                                        <input type="number" class="form-control form-control-sm" name="valor_dental"
                                            id="valor_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Total</label>
                                        <input type="number" class="form-control form-control-sm" name="total_dental"
                                            id="total_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Laboratorio</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="laboratorio_dental" id="laboratorio_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Valor total reclamo</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="valor_reclamo_dental" id="valor_reclamo_dental">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pt-4" id="ortodoncia">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Ortodoncia</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Tipo de aparato</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="aparato_dental_ortodoncia" id="aparato_dental_ortodoncia">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de instalación</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_instalacion_ortodoncia" id="fecha_instalacion_ortodoncia">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de primer control</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_primer_control_ortodoncia" id="fecha_primer_control_ortodoncia">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Duración del tratamiento</label>
                                        <input type="texto" class="form-control form-control-sm"
                                            name="duracion_ortodoncia" id="duracion_ortodoncia">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Valor clínico del aparato</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="valor_aparato_ortodoncia" id="valor_aparato_ortodoncia">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Valor de controles clínicos</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="valor_clinico_ortodoncia" id="valor_clinico_ortodoncia">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pt-4" id="info_profesional_tratante_dental">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Profesional tratante</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Rut</label>
                                        <input type="person" class="form-control form-control-sm"
                                            name="rut_profesional" id="rut_profesional">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_profesional" id="nombre_profesional">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Teléfono</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            name="telefono_profesional_dental" id="telefono_profesional_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Email</label>
                                        <input type="email" class="form-control form-control-sm"
                                            name="email_profesional_dental" id="email_profesional_dental">
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
                                            name="fecha_informe_dental" id="fecha_informe_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en
                                            PDF</button>
                                    </div>
                                </div>
                            </form>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>
