<!--Botón Flotante-->
<div class="row">
    <div class="col-sm-12">
        <div class="boton-formularios">
            <input type="checkbox" id="btn-mas">
            <div class="redes">
                <a id="boton_1" class="fas fa-notes-medical fa-2x" data-toggle="canvas" data-target="#formularios_utilidades" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios_Utilidades Médicos" data-placement="left" style="cursor:pointer;"> </a>
                <a id="boton_2" class="fas fa-user-injured fa-2x" data-toggle="canvas" data-target="#antecedentes_paciente" aria-expanded="false" aria-controls="bs-canvas-right" title="Antecedentes rápidos del paciente" data-placement="left" style="cursor:pointer;"></a>
                <a id="boton_3" class="fas fa-boxes fa-2x" data-toggle="canvas" data-target="#formularios_atencion" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Atención" data-placement="left" style="cursor:pointer;"></a>
            </div>
            <div class="btn-mas">
                <label for="btn-mas" class="fa fa-plus"></label>
            </div>
        </div>
    </div>
</div>
<!-- MODAL FORMULARIO -->
<div id="formularios_utilidades" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg"
    data-width="370px" data-offset="true">
    <header class="bs-canvas-header p-3 bg-info overflow-auto">
        <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true"
                class="text-light">&times;</span></button>
        <h5 class="d-inline-block text-light mb-0 float-right mt-1">FORMULARIOS Y UTILIDADES MÉDICOS</h5>
    </header>
    <div class="bs-canvas-content">
        <div class="accordion" id="accordion_side_bar">
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
                    <div class="card-body-sidebar">
                        @if(!empty(session('lic_token')) && session('lic_estado') == 1)
                            <!--Boton Modal Formulario certificado de reposo-->
                           
                                <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_certificado_reposo">
                                    + Certificado de reposo
                                </button>
                        
                                <!--Boton Modal Formulario de interconsulta-->
                                <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_interconsulta">
                                    + Crear Interconsulta
                                </button>
                  

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
                        @else
                            <!--Boton Modal Formulario certificado de reposo-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_certificado_reposo" >
                                + Certificado de reposo
                            </button>
                            <!--Boton Modal Formulario de interconsulta-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_interconsulta" >
                                + Crear Interconsulta
                            </button>
                            <!--Boton Modal Formulario de interconsulta respuesta-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_interconsulta_respuesta" >
                                    + Responder Interconsulta
                            </button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_inf_medico" >
                                + Informe Médico
                            </button>
                            <!--Boton Modal formulario uso personal-->
                            <button type="button" class="btn btn-sm btn-info btn-block text-left accion_modal_uso_personal" >
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
                            class="btn btn-sm btn-info btn-block text-left accion_modal_constancia_ges">+ Constancia GES</button>

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
			 <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_form_consultasbd">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapse_cons_bd" aria-expanded="false"
                            aria-controls="collapse_cons_bd"><i
                                class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            CONSULTAR BASES DE DATOS <br>DEL MINSAL
                        </button>
                    </h2>
                </div>
                <div id="collapse_cons_bd" class="collapse"
                    aria-labelledby="heading_form_consultasbd" data-parent="#accordion_formularios_atencion">
                    <div class="card-body-sidebar">
                        <!--Boton Modal consulta a b d-->
                        <button type="button"class="btn btn-sm btn-info btn-block text-left accion_modal_constancia_ges">+ Consulta</button>
                    </div>
                </div>
            </div>
           

            @include('general.sidebar.seccion_consentimientos')

            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_utilidades">
                    <h2 class="mb-0">
                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_utilidades" aria-expanded="false" aria-controls="collapse_utilidades"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        UTILIDADES
                    </button>
                    </h2>
                </div>
                <div id="collapse_utilidades" class="collapse" aria-labelledby="heading_utilidades" data-parent="#accordion_side_bar">
                    <div class="card-body-sidebar">
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ufonasa()";>+ Buscador código FONASA</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="imc()";>+ Calculadora de IMC</button>

                    </div>
                </div>
                @include("general.modal.m_ucodigofonasa")
                    @include("general.modal.m_uimc")
            </div>
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_hosp">
                    <h2 class="mb-0">
                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_hosp" aria-expanded="false" aria-controls="collapse_hosp"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                    FORMULARIOS DE HOSPITALIZACIÓN
                    </button>
                    </h2>
                </div>
                <div id="collapse_hosp" class="collapse" aria-labelledby="headinghospm" data-parent="#accordion_side_bar">
                    <div class="card-body-sidebar">
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="sol_pabellon()";>+ Solicitud Pabellón</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ingresohosp()";>+ Hospitalización </button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="r_ingreso()";>+ Requisitos de ingreso</button>
                    </div>
                </div>
                @include("general.hospitalizacion.modals.in_solic_pabellon")
                @include("general.hospitalizacion.modals.ingreso_hosp")
                @include("general.modal.m_req_ingreso")
            </div>
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_recom">
                    <h2 class="mb-0">
                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_recom" aria-expanded="false" aria-controls="collapse_recom"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                    INDICACIONES A PACIENTES
                    </button>
                    </h2>
                </div>
                <div id="collapse_recom" class="collapse" aria-labelledby="heading_recom" data-parent="#accordion_side_bar">

                    <div class="card-body-sidebar">
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="clexane()";>+ Indicaciones Uso de Clexane</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="insulina()";>+ Indicaciones Uso de Insulina</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ind_timp()";>+ Indicaciones de Dieta</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="prevencion_upp()";>+ Indicaciones Prevencion UPP</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="sondas_vesicales()";>+ Indicaciones Cuidados Sondas Vesicales (Folley)</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="sonda_nasog()";>+ Indicaciones Cuidados Sonda Nasogástrica</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="tec_adulto()";>+ Indicaciones Alertas Post Caídas Adultos</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="tec_ninos()";>+ Indicaciones Alertas Post Caídas Niños</button>
                        <h6 class="text-center mb-2">Pacientes Diabéticos</h6>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="diab_med_gen()";>+ Medidas y recomendaciones generales</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="diab_act_fis()";>+ Medidas y recomendaciones actividad física</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="diab_dieta()";>+ Cuidados alimentación del paciente diabetico</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="diab_cuid_pies_hdas()";>+ Cuidados píes y heridas en el diabetico</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="diab_hipogic()";>+ Medidas y recomendaciones sobre la Hipoglicémia</button>
                    </div>
                </div>
                {{--  @include('page.general.modal_enfermeria.indicaciones_pctes.prevencionupp')
                 @include('page.general.modal_enfermeria.indicaciones_pctes.clexane')
                 @include('page.general.modal_enfermeria.indicaciones_pctes.indicaciones_timp')
                 @include('page.general.modal_enfermeria.indicaciones_pctes.insulinoterapia')
                 @include('page.general.modal_enfermeria.indicaciones_pctes.sonda_folley')
                 @include('page.general.modal_enfermeria.indicaciones_pctes.sonda_nasogastrica')
                 @include('page.general.modal_enfermeria.indicaciones_pctes.tec_adulto')
                 @include('page.general.modal_enfermeria.indicaciones_pctes.tec_ped')
                  {{--  PACIENTES DIABETICOS  --}}
                 {{--  @include('page.general.modal_enfermeria.indicaciones_pctes.diab_medidas_generales')
                 @include('page.general.modal_enfermeria.indicaciones_pctes.diab_actividad_fisica')
                 @include('page.general.modal_enfermeria.indicaciones_pctes.diab_dieta')
                 @include('page.general.modal_enfermeria.indicaciones_pctes.diab_cuidado_pies_heridas')
                 @include('page.general.modal_enfermeria.indicaciones_pctes.diab_crisis_hipoglicemica')   --}}





            </div>
             <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_hosp">
                    <h2 class="mb-0">
                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_hosp" aria-expanded="false" aria-controls="collapse_hosp"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                    FORMULARIOS DE HOSPITALIZACIÓN
                    </button>
                    </h2>
                </div>
                <div id="collapse_hosp" class="collapse" aria-labelledby="headinghospm" data-parent="#accordion_side_bar">
                    <div class="card-body-sidebar">
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="sol_pabellon()";>+ Solicitud Pabellón</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ingresohosp()";>+ Hospitalización </button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="r_ingreso()";>+ Trámites de ingreso</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="utiles_hosp()";>+ Ropa y utiles de ingreso</button>
                        {{--  <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="r_ingreso()";>+ Recomendaciones de ingreso</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="r_ingreso()";>+ Horarios de Visitas</button>  --}}
                    </div>
                </div>
                {{--  @include("page.general.hospitalizacion.modals.in_solic_pabellon")  --}}
                {{--  @include("page.general.hospitalizacion.modals.ingreso_hosp")
                @include("page.general.modal.m_req_ingreso")
                @include(" page.general.modal_enfermeria.indicaciones_pctes.lista_utiles")  --}}

            </div>
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_sugerencias">
                    <h2 class="mb-0">
                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_sugerencias" aria-expanded="false" aria-controls="collapse_sugerencias"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        AYUDENOS A MEJORAR
                    </button>
                    </h2>
                </div>
                <div id="collapse_sugerencias" class="collapse" aria-labelledby="heading_sugerencias" data-parent="#accordion_side_bar">
                    <div class="card-body-sidebar">
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="c_faltante()";>+ Consentimiento  faltante</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="f_faltante()";>+ formulario faltante</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="sugerencias()";>+ Sugerencias</button>
                    </div>
                </div>
                @include("app.adm_hospital.sidebars.modals_generales.m_form_faltante")
                @include("app.adm_hospital.sidebars.modals_generales.m_sugerencias")
                @include("app.adm_hospital.sidebars.modals_generales.m_consent_faltante")
            </div>
        </div>
    </div>

</div>
