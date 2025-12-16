    <!--Sidebar 3 (KINESIOLOGIA)-->
    <div class="position-fixed w-100 h-100"></div>
    <div id="formularios_kine" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px" data-offset="true">
        <header class="bs-canvas-header p-3 bg-info overflow-auto">
            <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
            <h5 class="d-inline-block text-light mb-0 float-right">Formularios Kinesiológicos</h5>
        </header>
        <div class="bs-canvas-content">
            <div class="accordion" id="accordion_side_bar">
                {{--  <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_solicitud_examenes">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_solicitud_examenes" aria-expanded="true" aria-controls="collapse_solicitud_examenes"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            SOLICITAR EXÁMENES ESPECÍFICOS
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_solicitud_examenes" class="collapse" aria-labelledby="heading_solicitud_examenes" data-parent="#accordion_side_bar">
                         <div class="card-body-sidebar">


                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="examenes_kine()";>+ Exámenes de Kinesiología</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="interkine()";>+ Interconsultas</button>
                         </div>
                    </div>
                </div>  --}}
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_evaluaciones">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_evaluaciones" aria-expanded="true" aria-controls="collapse_evaluaciones"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            EVALUACIONES KINESIOLÓGICAS
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_evaluaciones" class="collapse" aria-labelledby="heading_evaluaciones" data-parent="#accordion_side_bar">
                         <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="pares();"><i class="fa fa-plus"></i> Pares Craneanos</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="postura();"><i class="fa fa-plus"></i> Examen Motor Postura</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="metria();"><i class="fa fa-plus"></i> Metría</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="fuerza_sup();"><i class="fa fa-plus"></i> Examen Fuerza Extremidad Superior</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="fuerza_inf();"><i class="fa fa-plus"></i> Examen Fuerza Extremidad Inferior</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="tono() ;"><i class="fa fa-plus"></i> Examen Nervios Motores</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="reflejos();"><i class="fa fa-plus"></i> Reflejos</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="sensibilidad();"><i class="fa fa-plus"></i> Sensibilidad</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="func_global();"><i class="fa fa-plus"></i> Funcionalidad Global</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="informekine();"><i class="fa fa-plus"></i> Informe Kinesiología</button>
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
                    <div class="card-header-sidebar" id="heading_recom">
                        <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse_recom" aria-expanded="false" aria-controls="collapse_recom"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        INDICACIONES A PACIENTES
                        </button>
                        </h2>
                    </div>
                    <div id="collapse_recom" class="collapse" aria-labelledby="heading_recom" data-parent="#accordion_side_bar">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="kegel_f()";>+ Kegel Femenino</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="kegel_m()";>+ Kegel Masculino</button>
                            {{--  <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="voz_disf()";>+  </button>  --}}
                        </div>
                    </div>
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
                        </div>
                    </div>
                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.kine.kegel_fem")
                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.kine.kegel_masc")
                    @include("general.modal.m_form_faltante")
                    @include("general.modal.m_sugerencias")
                    @include("general.modal.m_consent_faltante")
                </div>
            </div>
        </div>
    </div>

