    <!--Sidebar 3 (FONOAUDIOLOGIA)-->
    <div class="position-fixed w-100 h-100"></div>
    <div id="formularios_fonoaudiologia" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px" data-offset="true">
        <header class="bs-canvas-header p-3 bg-info overflow-auto">
            <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
            <h5 class="d-inline-block text-light mb-0 float-right">Formularios Fonoaudiológicos</h5>
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


                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="examenes_fono()";>+ Exámenes de Especialidad</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="interfono()";>+ Interconsultas</button>
                         </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_evaluaciones">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_evaluaciones" aria-expanded="true" aria-controls="collapse_evaluaciones"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            EVALUACIONES FONOAUDIOLÓGICAS
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_evaluaciones" class="collapse" aria-labelledby="heading_evaluaciones" data-parent="#accordion_side_bar">
                         <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="est_ofa();"><i class="fa fa-plus"></i> OFA</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="est_hpa();"><i class="fa fa-plus"></i> Habilidades Prearticulatorias</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="habla();"><i class="fa fa-plus"></i> Habla y Lenguaje
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="e_voz();"><i class="fa fa-plus"></i> VOZ</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="e_espasmo();"><i class="fa fa-plus"></i> Espasmofémia</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="l_praxias() ;"><i class="fa fa-plus"></i> Laminas Praxias</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="l_ling() ;"><i class="fa fa-plus"></i> Test de Ling</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="tede();"><i class="fa fa-plus"></i> Test TEDE</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="pragma();"><i class="fa fa-plus"></i> Habilidades Pragmáticas</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="informefono() ;"><i class="fa fa-plus"></i> Informe Fonoaudiología</button>
                         </div>
                    </div>
                </div>
                {{--  <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_consentimientos_informados">
                        <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_consentimientos_informados" aria-expanded="false" aria-controls="collapse_consentimientos_informados"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            CONSENTIMIENTOS INFORMADOS
                        </button>
                        </h2>
                    </div>
                    <div id="collapse_consentimientos_informados" class="collapse" aria-labelledby="heading_consentimientos_informados" data-parent="#accordion_fono">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="cons_tto()";>+ Para tratamiento</button>

                        </div>
                    </div>
                    @include("atencion_medica.sidebars.modals_generales.m_acprocedimientos")
                </div>  --}}
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
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="voz ();">+ Indicaciones Cuidados de la Voz</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="voz_eje();">+ Ejercicios  de Voz</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="voz_disf();">+ Ejercicios Disfonía Disfuncional </button>
                            @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.recom_cuidados_voz")
                            @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.recom_disf_disf")
                            @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.recom_ejerc_vocales")
                        </div>
                    </div>

                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.informe_fono")
                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.eval_hab_pre")
                    {{-- @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.evaluacion_espasmofemia") --}}
                    {{-- @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.evaluacion_voz") --}}
                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.fonema_p")
                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.fonema_r")
                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.habilidades_pragmaticas")
                    {{-- @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.habla_leng") --}}
                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.indicar_examen_esp")
                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.interconsulta_fono")
                    {{-- @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.ofa") --}}
                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.planificacion")
                    {{-- @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.praxias") --}}
                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.praxias_lam")

                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.sopaletras")
                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.tede_1")
                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.tede")
                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.fono.test_ling")
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

