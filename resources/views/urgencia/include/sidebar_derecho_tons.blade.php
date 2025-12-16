    <!--Sidebar 3 (dental_implanto)-->
    <div class="position-fixed w-100 h-100"></div>
    <div id="tons" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px" data-offset="true">
        <header class="bs-canvas-header p-3 bg-info overflow-auto">
            <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true" class="text-white">&times;</span></button>
            <h5 class="d-inline-block text-light mb-0 float-right">Formularios Técnico Odontología </h5>
        </header>
        <div class="bs-canvas-content">
            <div class="accordion" id="accordion_side_bar">
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_nom_od">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapse_nom_odonto" aria-expanded="false"
                                aria-controls="collapse_nom_odonto"><i
                                    class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                    NOMENCLATURA ODONTOGRAMA
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_nom_odonto" class="collapse" aria-labelledby="heading_nom_od"
                        data-parent="#accordion_formularios_atencion">
                        <div class="card-body-sidebar">
                            <img src="{{ asset('img_dental/sano.png') }}">
                             Diente Sano
                            <hr class="mt-1 mb-1">
                            <img src="{{ asset('img_dental/ausente.png') }}">
                             Diente Ausente
                            <hr class="mt-1 mb-1">
                            <img src="{{ asset('img_dental/carie.png') }}">
                             Caries
                            <hr class="mt-1 mb-1">
                            <img src="{{ asset('img_dental/composite.png') }}">
                             Composite
                            <hr class="mt-1 mb-1">
                            <img src="{{ asset('img_dental/sellante.png') }}">
                            Sellante
                            <hr class="mt-1 mb-1">
                            <img src="{{ asset('img_dental/mantenedor_espacio.png') }}">
                            Mantenedor de Espacio
                            <hr class="mt-1 mb-1">
                            <img src="{{ asset('img_dental/pulpotomia.png') }}">
                            Pulpotomía
                            <hr class="mt-1 mb-1">
                            <img src="{{ asset('img_dental/pulpectomia.png') }}">
                            Pulpectomía
                            <hr class="mt-1 mb-1">
                            <img src="{{ asset('img_dental/corona.png') }}">
                             Corona
                            <hr class="mt-1 mb-1">
                            <img src="{{ asset('img_dental/surco.png') }}">
                            Surco
                            <hr class="mt-1 mb-1">
                            <img src="{{ asset('img_dental/obturacion.png') }}">
                            Obturación
                            <hr class="mt-1 mb-1">
                            <img src="{{ asset('img_dental/fractura.png') }}">
                            Fractura
                            <hr class="mt-1 mb-1">

                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_examenes_dentales">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapse_examenes_dentales"
                                aria-expanded="false" aria-controls="collapse_examenes_dentales"><i
                                    class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                ORDENES DE EXÁMENES DENTALES
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_examenes_dentales" class="collapse"
                        aria-labelledby="heading_examenes_dentales"
                        data-parent="#accordion_formularios_atencion">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ex_dent_rx()";>+ Orden Radiología</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ex_dent_bp()";>+ Biopsia</button>
                        </div>

                    </div>
                </div
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_lab_dental">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapse_lab_dental"
                                aria-expanded="false" aria-controls="collapse_lab_dental"><i
                                    class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                LABORATORIO DENTAL
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_lab_dental" class="collapse"
                        aria-labelledby="heading_lab_dental"
                        data-parent="#accordion_formularios_atencion">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="lab_dent_menor()";>+ ORDEN DE TRABAJO  MENOR</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="lab_dent_mayor()";>+ ORDEN DE TRABAJO MAYOR</button>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_materiales">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapse_materiales" aria-expanded="false" aria-controls="collapse_materiales"><iclass="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                PEDIDOS MATERIAL DE TRABAJO
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_materiales" class="collapse" aria-labelledby="heading_materiales"  data-parent="#accordion_formularios_atencion">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ped_insumos()";>+ PEDIDO INSUMOS</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ped_materiales()";>+ PEDIDO MATERIALES</button>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_ayudante">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapse_ayudante" aria-expanded="false"  aria-controls="collapse_ayudante"><i  class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                AYUDANTE DENTAL
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_ayudante" class="collapse" aria-labelledby="heading_ayudante"
                        data-parent="#accordion_formularios_atencion">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="gasto_material()";>+ GASTO MATERIALES</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="control_trab()";>+ CONTROL DE ENVIOS A LABORATORIO</button>
                        </div>
                    </div>
                </div>

                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_recom">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapse_recom" aria-expanded="false"
                                aria-controls="collapse_recom"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i> RECOMENDACIONES A PACIENTES</button>
                        </h2>
                    </div>
                    <div id="collapse_recom" class="collapse" aria-labelledby="heading_recom"  data-parent="#accordion_formularios_atencion">

                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="dent_inf()";>+ La Dentición Temporal</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ind_od_ped()";>+ La Dentición Temporal y sus Cuidados</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ind_od_higiene()";>+ Higene y Cuidados</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ges_dental()";>+ Ges Dental</button>
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
                    <div id="collapse_utilidades" class="collapse" aria-labelledby="heading_utilidades" data-parent="#accordion_side_bar">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="ufonasa()";>+ Buscador código FONASA</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="imc()";>+ Calculadora de IMC</button>
                        </div>
                    </div>
                    {{--  @include("general.modal.m_ucodigofonasa")
                    @include("general.modal.m_uimc")  --}}
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


                    {{--  @include("general.modal.m_req_ingreso")  --}}
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

                </div>
            </div>
        </div>
    </div>


    <!--MODALS SIDE BAR GENERALES-->

    {{--  @include('atencion_odontologica.modals.formularios_dentales.laboratorio_dental.m_trabajo')
    @include('atencion_odontologica.modals.formularios_dentales.laboratorio_dental.m_trabajoM')
    @include('atencion_odontologica\modals.formularios_dentales.pedido_material_trabajo.m_pmateriales')
    @include('atencion_odontologica\modals.formularios_dentales.pedido_material_trabajo.pedido_insumos_materiales')
    @include('atencion_odontologica.modals.formularios_dentales.ayudante_dental.modal_control_trabajo')
    @include('atencion_odontologica.modals.formularios_dentales.ayudante_dental.modal_gastosmaterial_gen')
    @include('atencion_odontologica.modals.formularios_dentales.recomendaciones.recom_od_ped')
    @include('atencion_odontologica.modals.formularios_dentales.recomendaciones.recom_higiene')
    @include('atencion_odontologica.modals.formularios_dentales.recomendaciones.recom_od_ges')
    @include('atencion_odontologica.modals.formularios_dentales.recomendaciones.recom_dent_inf')  --}}
