<!--Botón Flotante-->
<div class="row">
    <div class="col-sm-12">
        <div class="boton-formularios">
            <input type="checkbox" id="btn-mas">
            <div class="redes">
                <a id="boton_1" class="fas fa-notes-medical fa-2x" data-toggle="canvas" data-target="#formularios_utilidades" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios_Utilidades Enfermería" data-placement="left" style="cursor:pointer;"> </a>
                <a id="boton_2" class="fas fa-user-injured fa-2x" data-toggle="canvas" data-target="#side_sala_espera" aria-expanded="false" aria-controls="bs-canvas-right" title="Sala Espera" data-placement="left" style="cursor:pointer;"></a>
                <a id="boton_3" class="fas fa-boxes fa-2x" data-toggle="canvas" data-target="#side_box_atencion" aria-expanded="false" aria-controls="bs-canvas-right" title="Box Atención" data-placement="left" style="cursor:pointer;"></a>
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
        <h5 class="d-inline-block text-light mb-0 float-right mt-1">FORMULARIOS Y UTILIDADES</h5>
    </header>
    <div class="bs-canvas-content">
        <div class="accordion" id="accordion_side_bar">
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_solicitud_examenes">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_solicitud_examenes" aria-expanded="true" aria-controls="collapse_solicitud_examenes"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        FORMULARIOS URGENCIA
                        </button>
                    </h2>
                </div>
                <div id="collapse_solicitud_examenes" class="collapse" aria-labelledby="heading_solicitud_examenes" data-parent="#accordion_side_bar">
                    <div class="card-body-sidebar">
                        <button type="button" class="btn btn-sm {{ isset($boleta_alcoholemia_paciente->datos_paciente_alcoholemia) ? 'btn-warning' : 'btn-info' }} btn-block text-left" id="btn_alcoholemia_paciente" onclick="test_alcohol()";>+ Exámen alcoholemia</button>
                        <button type="button" class="btn btn-sm {{ isset($examen_drogas) ? 'btn-warning' : 'btn-info' }} btn-block text-left" id="btn_drogas_paciente" onclick="test_drogas()";>+ Test de Drogas</button>
                        <button type="button" class="btn btn-sm {{ isset($examen_sad_person) ? 'btn-warning' : 'btn-info' }} btn-block text-left" id="btn_sad_person" onclick="sad_persons()";>+ SAD-PERSONS</button>
						<button type="button" class="btn btn-sm {{ isset($rescate_paciente) ? 'btn-warning' : 'btn-info' }} btn-block text-left" id="btn_rescate_paciente" onclick="Cert_rescate()";>+ Rescate</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="cert_defuncion()";>+ Certificado de Defunción</button>
                    </div>
                </div>
                {{--  @include('page.general.sidebar.modal_form_generales.m_alcoholemia')
                @include('page.general.sidebar.modal_form_generales.m_adrogas')
                @include('page.general.sidebar.modal_form_generales.m_persons')
				@include('page.general.sidebar.modal_form_generales.m_cert_defuncion')
                @include('page.general.sidebar.modal_form_generales.m_rescate')  --}}
            </div>



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
                {{--  @include("page.general.modal.m_ucodigofonasa")
                @include("page.general.modal.m_uimc")  --}}
            </div>
            {{--  @include('page.general.sidebar.seccion_consentimientos')  --}}
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
                {{--  @include("page.general.modal.m_form_faltante")
                @include("page.general.modal.m_sugerencias")
                @include("page.general.modal.m_consent_faltante")  --}}
            </div>
        </div>
    </div>

</div>
