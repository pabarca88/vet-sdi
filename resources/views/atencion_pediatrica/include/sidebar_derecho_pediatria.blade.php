    <!--Sidebar 3 (pediatria)-->
    <div class="position-fixed w-100 h-100"></div>
    <div id="formularios_pediatria" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px" data-offset="true">
        <header class="bs-canvas-header p-3 bg-info overflow-auto">
            <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
            <h5 class="d-inline-block text-light mb-0 float-right">Formularios Especialidad Pediatría</h5>
        </header>
        <div class="bs-canvas-content">
            <div class="accordion" id="accordion_side_bar">
                 {{-- <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_solicitud_examenes">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_solicitud_examenes" aria-expanded="true" aria-controls="collapse_solicitud_examenes"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            SOLICITAR EXÁMENES ESPECÍFICOS
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_solicitud_examenes" class="collapse" aria-labelledby="heading_solicitud_examenes" data-parent="#accordion_side_bar">
                        <div class="card-body-sidebar">


                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="examenes_ped()";>+ Exámenes de Nutrición</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="interped()";>+ Interconsultas</button>
                        </div>
                    </div>
                </div> --}}
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_test">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_test" aria-expanded="true" aria-controls="collapse_test"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            TEST PEDIÀTRICOS
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_test" class="collapse" aria-labelledby="heading_test" data-parent="#accordion_side_bar">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="test_edimburgo();"><i class="fa fa-plus"></i> Test de Edimburgo</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="inst_eval();"><i class="fa fa-plus"></i> Instrumentos Evaluación</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="adams();"><i class="fa fa-plus"></i> Test de Adams</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="eval_dent();"><i class="fa fa-plus"></i> Pautas de evaluación Dental</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="perimetro();"><i class="fa fa-plus"></i> Pautas de Perimetros cef. Cintura</button>
                        </div>
                    </div>
                </div>

                <div class="card-sidebar" id="varones">
                    <div class="card-header-sidebar" id="heading_ref_varon">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_ref_varon" aria-expanded="true" aria-controls="collapse_ref_varon"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            VALORES REFERENCIALES MASCULINOS
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_ref_varon" class="collapse" aria-labelledby="heading_ref_varon" data-parent="#accordion_side_bar">
                        <div class="card-body-sidebar">

                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="imc519();"><i class="fa fa-plus"></i> IMC 5 a 19 años varones</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="presion_v();"><i class="fa fa-plus"></i> Presión Arterial varones</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="per_cef_v();"><i class="fa fa-plus"></i> Perimetro Cefálico varones</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="talla_edad_v();"><i class="fa fa-plus"></i> Talla edad varones 5 a 19 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="talla_25_v();"><i class="fa fa-plus"></i> Talla edad varones 2 a 5 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="talla_02_v();"><i class="fa fa-plus"></i> Talla edad varones 0 a 2 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="percint_v();"><i class="fa fa-plus"></i> Perimetro cintura Varones 5-19 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="pesoedad_v();"><i class="fa fa-plus"></i> Peso Edad varones 0 a 2 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="pesoedad_25_v();"><i class="fa fa-plus"></i> Peso Edad varones 2 a 5 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="pesoedad_510_v() ;"><i class="fa fa-plus"></i> Peso Edad varones 5 a 10 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="pesotalla_02_v();"><i class="fa fa-plus"></i> Peso Talla varones 0 a 2 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="pesotalla_25_v();"><i class="fa fa-plus"></i> Peso Talla varones 2 a 5 años</button>

                        </div>
                    </div>

                </div>
                <div class="card-sidebar" id="femeninos">
                    <div class="card-header-sidebar" id="heading_ref_mujer">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_ref_mujer" aria-expanded="true" aria-controls="collapse_ref_mujer"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            VALORES REFERENCIALES FEMENINOS
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_ref_mujer" class="collapse" aria-labelledby="heading_ref_mujer" data-parent="#accordion_side_bar">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="presion_f();"><i class="fa fa-plus"></i> Presión Arterial mujer</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="imc_519f();"><i class="fa fa-plus"></i> IMC 5 a 19 años mujer</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="per_cef_f();"><i class="fa fa-plus"></i> Perimetro Cefálico mujer</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="talla_edad_f519();"><i class="fa fa-plus"></i> Talla edad mujer 5 a 19 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="talla_25_f();"><i class="fa fa-plus"></i> Talla edad mujer 2 a 5 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="talla_02_f();"><i class="fa fa-plus"></i> Talla edad mujer 0 a 2 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="percint_f();"><i class="fa fa-plus"></i> Perimetro cintura mujer 5-19 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="pesoedad_f02();"><i class="fa fa-plus"></i> Peso Edad mujer 0 a 2 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="pesoedad_25_f();"><i class="fa fa-plus"></i> Peso Edad mujer 2 a 5 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="pesoedad_510_f() ;"><i class="fa fa-plus"></i> Peso Edad mujer 5 a 10 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="pesotalla_02_f();"><i class="fa fa-plus"></i> Peso Talla mujer 0 a 2 años</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="pesotalla_25_f();"><i class="fa fa-plus"></i> Peso Talla mujer 2 a 5 años</button>

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
                             <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ucalcimc()";>+ Calculadora de IMC</button>
                             <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="apgar();"><i class="fa fa-plus"></i> APGAR</button>
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
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="prev_acc()";>+ Prevension de Accidentes</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ipostparto()";>+ Cuidados Post Parto</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ilactan()";>+ Indicaciones  acerca de lactancia</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="tlactan()";>+ Técnica de lactancia</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="icirugia()";>+ Indicaciones post cirugía</button>
                        </div>
                        @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.m_ipostparto")
                        @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.modal_prev_accidentes")
                        @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.m_ilactancia")
                        @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.m_tlactancia")
						@include("general.modal.m_cuidados_cirugia")
                    </div>

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
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.perimetros")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.eval_dental")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.adams")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.per_cef_v")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.modal_edimburgo")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.apgar")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.imc_5_19v")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.instrumentos_eval")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.talla_edad_v519")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.talla_edad_v25")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.talla_edad0_2_v")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.per_cintura_v519")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.peso_edad_v")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.peso_edad_v25")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.peso_edad_v510")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.peso_talla_v02")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.peso_talla_v25")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.presion_v")

    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.per_cef_f02")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.imc_5_19_f")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.talla_edad_f519")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.talla_edad_f25")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.talla_edad_f024")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.per_cintura_f519")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.peso_edad_f24_meses")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.peso_edad_f25")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.peso_edad_f510")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.peso_talla_f024")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.peso_talla_f25")
    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.presion_f")

