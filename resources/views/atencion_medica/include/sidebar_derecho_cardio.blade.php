    <!--Sidebar 3 cardio)-->
    <div class="position-fixed w-100 h-100"></div>
    <div id="formularios_cardiologicos" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px" data-offset="true">
        <header class="bs-canvas-header p-3 bg-info overflow-auto">
            <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
            <h5 class="d-inline-block text-light mb-0 float-right">Formularios Especialidad Cardiología</h5>
        </header>
        <div class="bs-canvas-content">
            <div class="accordion" id="accordion_side_bar">
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_solicitud_examenes">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_solicitud_examenes" aria-expanded="true" aria-controls="collapse_solicitud_examenes"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            SOLICITAR EXÁMENES ESPECÍFICOS
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_solicitud_examenes" class="collapse" aria-labelledby="heading_solicitud_examenes" data-parent="#accordion_side_bar">
                        <div class="card-body-sidebar">

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="i_examen_esporl()";>+ Exámenes Específicos</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="i_examen_rxorl()";>+ Orden radiología</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="i_biopsiaorl()";>+ Biopsias </button>
                        </div>
                    </div>
                </div>

                 <!-- SECCION CONSENTIMIENTOS -->
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
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="recom_baja()";>+ Indicaciones Cuidados Post Endoscopia Baja</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="recom_alta()";>+ Indicaciones Cuidados Post Endoscopia Alta</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="recom_end_general()";>+ Indicaciones Cuidados Post Endoscopia en general</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="r_ingreso()";>+ Requisitos de ingreso</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="icirugia()";>+ Indicaciones post cirugía En General</button>
                        </div>
                    </div>

                    @include("atencion_medica.formularios.modal_atencion_especialidad.cirugia.recom_endoscopia_baja")
                    @include('atencion_medica.formularios.modal_atencion_especialidad.cirugia.recom_endoscopia_alta')
                    @include('atencion_medica.formularios.modal_atencion_especialidad.cirugia.recom_endoscopia_general')

                    @include("general.modal.m_cuidados_cirugia")

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
                    @include("general.modal.m_form_faltante")
                    @include("general.modal.m_sugerencias")
                    @include("general.modal.m_consent_faltante")
                </div>
            </div>
        </div>
    </div>
    <!--SIDEBAR 3 (cda)-->

    <!--MODALS SIDE BAR GENERALES-->
    {{-- @include('atencion_medica.modales') --}}


    <script>
        /** recom pacientes**/
        function recom_alta() {
            $('#m_ind_endosc_alta').modal('show');
        }
        function recom_baja() {
            $('#m_ind_endosc_baja').modal('show');
        }
        function recom_end_general() {
            $('#ind_endoscopia_modal').modal('show');
        }

    </script>

