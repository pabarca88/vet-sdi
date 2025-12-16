    <!--Sidebar 3 (gine_obstetricia)-->
<div class="position-fixed w-100 h-100"></div>
<div id="formularios_gine_obstetricia" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px" data-offset="true">
    <header class="bs-canvas-header p-3 bg-info overflow-auto">
        <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
        <h5 class="d-inline-block text-light mb-0 float-right">Formularios  Gineco_obstetricia</h5>
    </header>
    <div class="bs-canvas-content">
        <div class="accordion" id="accordion_side_bar">
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
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="apgar();">+ APGAR</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="edad_gest()";>+ Cálculo Edad Gestacional</button>
                    </div>
                </div>
                @include("general.modal.m_ucodigofonasa")
                @include("general.modal.m_uimc")
                @include('atencion_gine_obstetricia.formularios.modal_atencion_especialidad.gineco_obst.apgar')
                @include('atencion_gine_obstetricia.formularios.modal_atencion_especialidad.gineco_obst.m_ucalculoedadgest')
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
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="rec_puerperio()";>+ Indicaciones Cuidados Puerperio</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="rec_cir_go()";>+ Indicaciones Post Cirugía gineco-Obstétrica</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="rec_lactancia()";>+ Indicaciones Cuidados Lactancia</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="tec_lactancia()";>+ Técnica de lactancia</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="rec_cuid_mamas()";>+ Cuidado de las mamas</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="rec_reemp_horm()";>+ Terápia Hormonal Climaterio</button>
                        {{--  <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ilactan()";>+ Terapia Anticonceptivas</button>

                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="icirugia()";>+ Cuidados Aparato Genito-Urinario</button>

                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ind_amig()";>+ Terápia Hormonal Climaterio</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ind_timp()";>+ Cuidado de las mamas</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ind_rino()";>+ Orden de vacunación VPH</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ilactan()";>+ Control Prenatal</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="tlactan()";>+ Preparandose para el parto</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="icirugia()";>+ Otro</button>  --}}
                    </div>
                </div>

                @include("atencion_gine_obstetricia.sidebars.modals_especialidad.gine_obstetricia.recom_cir_gine")
                @include("atencion_gine_obstetricia.sidebars.modals_especialidad.gine_obstetricia.recom_puerperio")
                @include("atencion_gine_obstetricia.sidebars.modals_especialidad.gine_obstetricia.recom_lactancia")
                @include("atencion_gine_obstetricia.sidebars.modals_especialidad.gine_obstetricia.recom_tlactancia")
                @include("atencion_gine_obstetricia.sidebars.modals_especialidad.gine_obstetricia.recom_cuidado_mamas")
                @include("atencion_gine_obstetricia.sidebars.modals_especialidad.gine_obstetricia.recom_reemplazo_horm")

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

@include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.presion_f")

