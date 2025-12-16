<!--Sidebar 3 (psicologia)-->
<div class="position-fixed w-100 h-100"></div>
<div id="formularios_psicologia" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px" data-offset="true">
    <header class="bs-canvas-header p-3 bg-info overflow-auto d-flex justify-content-between">
        <button type="button" class="bs-canvas-close close" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
        <h5 class="d-inline-block text-light mb-0">Formularios Psicología</h5>
    </header>
    <div class="bs-canvas-content">
        <div class="accordion" id="accordion_side_bar">
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="heading_test">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse_test" aria-expanded="true" aria-controls="collapse_test"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        TEST PSICOLÓGICOS
                        </button>
                    </h2>
                </div>
                <div id="collapse_test" class="collapse" aria-labelledby="heading_test" data-parent="#accordion_side_bar">
                    <div class="card-body-sidebar">
                        {{--  <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="inst_eval();"><i class="fa fa-plus"></i> Instrumentos Evaluación</button>  --}}
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="psi_rorsch();"><i class="fa fa-plus"></i> Test de Rorschach</button>
                        <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="psi_ot_test();"><i class="fa fa-plus"></i> Otros Test Practicados</button>
                        @include("atencion_otros_prof.formularios.modal_atencion_especialidad.psicologia.test_rorschach")
                        @include("atencion_otros_prof.formularios.modal_atencion_especialidad.psicologia.test_otros")
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
        </div>
    </div>
</div>


