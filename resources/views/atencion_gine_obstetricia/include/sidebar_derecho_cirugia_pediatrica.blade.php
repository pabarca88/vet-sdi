    <!--Sidebar 3 (otorrino)-->
    <div class="position-fixed w-100 h-100"></div>
    <div id="formularios_orl" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px" data-offset="true">
        <header class="bs-canvas-header p-3 bg-info overflow-auto">
            <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
            <h5 class="d-inline-block text-light mb-0 float-right">Formularios Otorrinolaringología</h5>
        </header>
        <div class="bs-canvas-content">
            <div class="accordion" id="accordion_gineco_obst">
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_solicitud_examenes">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_solicitud_examenes" aria-expanded="true" aria-controls="collapse_solicitud_examenes"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            SOLICITAR EXÁMENES ESPECÍFICOS
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_solicitud_examenes" class="collapse" aria-labelledby="heading_solicitud_examenes" data-parent="#accordion_gineco_obst">
                        <div class="card-body-sidebar">

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="i_examen_esporl()";>+ Exámenes Otorrinolaringológicos</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="i_examen_rxorl()";>+ Orden radiología</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="i_biopsiaorl()";>+ Biopsias Otorrinolaringología</button>
                        </div>
                    </div>
                </div>

                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_consentimientos_informados">
                        <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_consentimientos_informados" aria-expanded="false" aria-controls="collapse_consentimientos_informados"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            CONSENTIMIENTOS INFORMADOS
                        </button>
                        </h2>
                    </div>
                    <div id="collapse_consentimientos_informados" class="collapse" aria-labelledby="heading_consentimientos_informados" data-parent="#accordion_gineco_obst">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="cons_anest()";>+ Anestesia</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="concir_menor()";>+ Cirugía menor</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="concir_mayor()";>+ Cirugía mayor</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="conprocedim()";>+ Procedimientos en general</button>
                        </div>
                    </div>
                    @include("atencion_medica.sidebars.modals_generales.m_aconsentcir")
                    @include("atencion_medica.sidebars.modals_generales.m_aconsentcirm")
                    @include("atencion_medica.sidebars.modals_generales.m_acprocedimientos")
                    @include("atencion_medica.sidebars.modals_generales.m_acanestesia")
                </div>

                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_utilidades">
                        <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_utilidades" aria-expanded="false" aria-controls="collapse_utilidades"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            UTILIDADES
                        </button>
                        </h2>
                    </div>
                    <div id="collapse_utilidades" class="collapse" aria-labelledby="heading_utilidades" data-parent="#accordion_gineco_obst">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ufonasa()";>+ Buscador código FONASA</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ucalcimc()";>+ Calculadora de IMC</button>
                        </div>
                    </div>
                    @include("atencion_medica.sidebars.modals_generales.m_ucodigofonasa")
                    @include("atencion_medica.sidebars.modals_generales.m_uimc")
                </div>

                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_recom">
                        <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_recom" aria-expanded="false" aria-controls="collapse_recom"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        INDICACIONES A PACIENTES
                        </button>
                        </h2>
                    </div>
                    <div id="collapse_recom" class="collapse" aria-labelledby="heading_recom" data-parent="#accordion_formularios_atencion">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ind_amig()";>+ Indicaciones Cuidados Post Amigdalectomía</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ind_timp()";>+ Indicaciones Cuidados Post Timpanoplastias</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ind_rino()";>+ Indicaciones Cuidados Post Rinoseptoplastias</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ingreso()";>+ Orden de Hospitalización</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="r_ingreso()";>+ Requisitos de ingreso</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="icirugia()";>+ Indicaciones post cirugía En General</button>
                        </div>
                    </div>

                    @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.recom_amig")
                    @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.recom_rino")
                    @include("atencion_medica.sidebars.modals_generales.ingreso")
                    @include("atencion_medica.sidebars.modals_generales.m_cuidados_cirugia")
                    @include("atencion_medica.sidebars.modals_generales.m_req_ingreso")
                    @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.recom_timp")

                </div>
            </div>
        </div>
    </div>
    <!--SIDEBAR 3 (Otorrino)-->

    <!--MODALS SIDE BAR GENERALES-->
    @include('atencion_medica.modales')


    @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_exbiopsia_orl")

    @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_exradiologico_orl")


