    <!--Sidebar 3 (formularios_terapia)--> <!--Sidebar 3 (formularios_terapia)-->
<div class="position-fixed w-100 h-100"></div>
<div id="formularios_terapia_ocup" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px" data-offset="true">
    <header class="bs-canvas-header p-3 bg-info overflow-auto">
        <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
        <h5 class="d-inline-block text-light mb-0 float-right">Formularios Terapia Ocupacional</h5>
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
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="dieta_diab()";>+ Dieta tipo diabéticos</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="raciones()";>+ Tamaño Raciones</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ilactan()";>+ Indicaciones  acerca de lactancia</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="tlactan()";>+ Técnica de lactancia</button>

                    </div>
                    {{--  @include("atencion_otros_prof.formularios.modal_atencion_especialidad.nutricion.recom_diabetico")
                    @include("atencion_otros_prof.formularios.modal_atencion_especialidad.nutricion.raciones")
                    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.modal_prev_accidentes")
                    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.m_ilactancia")
                    @include("atencion_pediatrica.sidebars.modals_especialidad.pediatria.m_tlactancia")  --}}


                </div>

            </div>
        </div>
    </div>
</div>


