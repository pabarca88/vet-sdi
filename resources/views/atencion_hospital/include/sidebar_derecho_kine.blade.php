    <!--Sidebar 3 (KINESIOLOGIA)-->
    <div class="position-fixed w-100 h-100"></div>
    <div id="formularios_kine" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px" data-offset="true">
        <header class="bs-canvas-header p-3 bg-info overflow-auto">
            <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
            <h5 class="d-inline-block text-light mb-0 float-right">Formularios Kinesiológicos</h5>
        </header>
        <div class="bs-canvas-content">
            <div class="accordion" id="accordion_kine">
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_solicitud_examenes">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_solicitud_examenes" aria-expanded="true" aria-controls="collapse_solicitud_examenes"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            SOLICITAR EXÁMENES ESPECÍFICOS
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_solicitud_examenes" class="collapse" aria-labelledby="heading_solicitud_examenes" data-parent="#accordion_kine">
                         <div class="card-body-sidebar">


                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="examenes_kine()";>+ Exámenes de Kinesiología</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="interkine()";>+ Interconsultas</button>
                         </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_evaluaciones">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_evaluaciones" aria-expanded="true" aria-controls="collapse_evaluaciones"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            EVALUACIONES KINESIOLÓGICAS
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_evaluaciones" class="collapse" aria-labelledby="heading_evaluaciones" data-parent="#accordion_kine">
                         <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="pares();"><i class="fa fa-plus"></i> Pares Craneanos</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="postura();"><i class="fa fa-plus"></i> Examen Motor Postura</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="metria();"><i class="fa fa-plus"></i> Metría</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="fuerza_sup();"><i class="fa fa-plus"></i> Examen Fuerza Extremidad Superior</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="fuerza_inf();"><i class="fa fa-plus"></i> Examen Fuerza Extremidad Inferior</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="tono_sup() ;"><i class="fa fa-plus"></i> Examen Tono Extremidad Superior</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="tono_inf();"><i class="fa fa-plus"></i> Examen Tono Extremidad Inferior</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="reflejos();"><i class="fa fa-plus"></i> Reflejos</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="sensibilidad();"><i class="fa fa-plus"></i> Sensibilidad</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="func_global();"><i class="fa fa-plus"></i> Funcionalidad Global</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="informekine();"><i class="fa fa-plus"></i> Informe Kinesiología</button>
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
                    <div id="collapse_consentimientos_informados" class="collapse" aria-labelledby="heading_consentimientos_informados" data-parent="#accordion_kine">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="cons_tto()";>+ Para tratamiento</button>
                            @include("atencion_medica.sidebars.modals_generales.m_acprocedimientos")
                        </div>
                    </div>
                </div>

                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_utilidades">
                        <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_utilidades" aria-expanded="false" aria-controls="collapse_utilidades"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            UTILIDADES
                        </button>
                        </h2>
                    </div>
                    <div id="collapse_utilidades" class="collapse" aria-labelledby="heading_utilidades" data-parent="#accordion_kine">
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
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="voz ()";>+ Indicaciones Cuidados de la Voz</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="voz_eje()";>+ Ejercicios Cuidado de la Voz</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="voz_disf()";>+ Ejercicios Disfonía Disfuncional </button>

                        </div>
                    </div>
                    <?php
                    include("modals_sidebar_fono/recom_cuidados_voz.php");
                    include("modals_sidebar_fono/recom_disf_disf.php");
                    include("modals_sidebar_fono/recom_ejerc_vocales.php");
                    ?>
                </div>
            </div>
        </div>
    </div>

