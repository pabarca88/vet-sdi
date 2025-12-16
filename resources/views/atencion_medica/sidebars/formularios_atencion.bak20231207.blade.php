<div id="formularios_atencion" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg"
    data-width="350px" data-offset="true">
    <header class="bs-canvas-header p-3 bg-info overflow-auto">
        <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true"
                class="text-light">&times;</span></button>
        <h5 class="d-inline-block text-light mb-0 float-right mt-1">Formularios de atención</h5>
    </header>
    <div class="bs-canvas-content">
        <div class="accordion" id="accordion_formularios_atencion">
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_form_generales">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse"
                            data-target="#collapse_form_generales" aria-expanded="true"
                            aria-controls="collapse_form_generales"><i
                                class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            FORMULARIOS GENERALES
                        </button>
                    </h2>
                </div>
                <div id="collapse_form_generales" class="collapse" aria-labelledby="heading_form_generales"
                    data-parent="#accordion_formularios_atencion">
                    <div class="card-body-sidebar pt-3">
                        <!--Boton Modal Formulario certificado de reposo-->
                        @if (auth()->user()->can('profesional.premium.pacientes.reposo_medico'))
                            <button type="button" class="btn btn-sm btn-info btn-block text-left  mt-2 accion_modal_certificado_reposo">
                                + Certificado de reposo
                            </button>
                        @else
                            <button type="button" class="btn btn-sm btn-info btn-block text-left  accion_modal_certificado_reposo">
                                + Certificado de reposo
                            </button>
                        @endif

                        @if (auth()->user()->can('profesional.premium.pacientes.interconsulta'))
                            <!--Boton Modal Formulario de interconsulta-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_interconsulta">
                                + Crear Interconsulta
                            </button>
                        @else
                            <!--Boton Modal Formulario de interconsulta-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_interconsulta">
                                + Crear Interconsulta
                            </button>
                        @endif

                        @if (auth()->user()->can('profesional.premium.pacientes.interconsulta'))
                            <!--Boton Modal Formulario de interconsulta respuesta-->
                            @if($interconsulta)
                                <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_interconsulta_respuesta">
                                    + Responder Interconsulta
                                </button>
                            @else
                                <button type="button" class="btn btn-sm btn-info btn-block text-left  disabled" style="cursor: not-allowed;">
                                    + Responder Interconsulta
                                </button>
                            @endif
                        @else
                            <!--Boton Modal Formulario de interconsulta respuesta-->
                            @if($interconsulta)
                                <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_interconsulta_respuesta">
                                    + Responder Interconsulta
                                </button>
                            @else
                                <button type="button" class="btn btn-sm btn-info btn-block text-left  disabled" style="cursor: not-allowed;">
                                    + Responder Interconsulta
                                </button>
                            @endif
                        @endif

                        @if (auth()->user()->can('profesional.premium.pacientes.informe_medico'))
                            <!--Boton Modal Formulario de informe médico-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_inf_medico">
                                + Informe Médico
                            </button>
                        @else
                            <!--Boton Modal Formulario de informe médico-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_inf_medico">
                                + Informe Médico
                            </button>
                        @endif

                        @if (auth()->user()->can('profesional.premium.pacientes.uso_personal'))
                            <!--Boton Modal formulario uso personal-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_uso_personal">
                                + Uso Personal
                            </button>
                        @else
                            <!--Boton Modal formulario uso personal-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_uso_personal">
                                + Uso Personal
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_form_notificaciones">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapse_form_notificaciones" aria-expanded="false"
                            aria-controls="collapse_form_notificaciones"><i
                                class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            FORMULARIOS DE NOTIFICACIÓN
                        </button>
                    </h2>
                </div>
                <div id="collapse_form_notificaciones" class="collapse"
                    aria-labelledby="heading_form_notificaciones" data-parent="#accordion_formularios_atencion">
                    <div class="card-body-sidebar">
                        <!--Boton Modal Formulario Constancia Ges-->
                        <button type="button"
                            class="btn btn-sm btn-info btn-block text-left mt-2 accion_modal_constancia_ges">+ Constancia GES</button>

                        <!--Boton Modal Formulario Enfermedades de Declaración Obligatoria -->
                        <button type="button"
                            class="btn btn-sm btn-info btn-block text-left accion_modal_enfermedades_declaracion_obligatoria">+ Enf.Notificación.Obligatoria (ENO)</button>


                        <!--Boton Modal Formulario Reembolso Médico-->
                        <button type="button"
                            class="btn btn-sm btn-info btn-block text-left accion_modal_reembolso_medico">+ Reembolso Gastos
                            Médicos</button>

                        <!--Boton Modal Formulario Reembolso Dental
                        <button type="button"
                            class="btn btn-sm btn-info btn-block text-left accion_modal_reembolso_dental">+ Reembolso Gastos
                            Dentales</button>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
