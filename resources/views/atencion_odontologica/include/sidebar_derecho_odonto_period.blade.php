    <!--Sidebar 3 (dental_periodoncia)-->
    <div class="position-fixed w-100 h-100"></div>
    <div id="formularios_periodoncia" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg" data-width="370px" data-offset="true">
        <header class="bs-canvas-header p-3 bg-info overflow-auto d-flex justify-content-between">
             <button type="button" class="bs-canvas-close close" onclick="$('#formularios_periodoncia').modal('hide')" aria-label="Close" data-dismiss="modal"> <span aria-hidden="true" class="text-white">&times;</span></button>
             <h5 class="d-inline-block text-light mb-0 float-right">Formularios Periodoncia</h5>
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
                        data-parent="#accordion_side_bar">
                         <div class="card-body-sidebar">
                            <div class="row">
                                    <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/diente-sano/diente-sano15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Diente sano</h6>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/diente-ausente/dau15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Diente ausente</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                    <div class="media align-items-center">
                                      <img src="{{ asset('images/dental/dientes/extraccion/porhacer/extraccion_15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                      <div class="media-body">
                                        <h6>Extracción</h6>
                                      </div>
                                    </div>
                                </div>
                                 <div class="col-6 mb-5">
                                    <div class="media align-items-center">
                                      <img src="{{ asset('images/dental/dientes/fractura/fractura_15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                      <div class="media-body">
                                        <h6>Fractura</h6>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/impactado/impactado_15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Diente Impactado</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/carie/carie15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Caries</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/endodoncia/endo15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Endodoncia</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/pulpotomia/pulpotomia15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Pulpotomía</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/pulpectomia/pulpectomia_15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Pulpectomía</h6>
                                          </div>
                                    </div>
                                </div>
                                 <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/implante/impl15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Implante</h6>
                                          </div>
                                    </div>
                                </div>   
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/movilidad/movilidad_15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Movilidad</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/perno-munon/hecho/perno_munon_15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Perno muñón</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/corona/hecho/corona_15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Corona</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/corona-provisoria/hecho/cp_hecho_15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Corona provisoria</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/corona_mal_estado/c_malestado15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Corona en mal estado</h6>
                                          </div>
                                    </div>
                                </div> 
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/protesis-removible/p_removible15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Prótesis removible</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/residuo-radicular/hecho/rr_15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Resto radicular</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/ribbond/hecho/ribbond_15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Ribbond</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/sellante/sellante_15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Sellante</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/surco/surco_15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Surco</h6>
                                          </div>
                                    </div>
                                </div>
                                 <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/atricion/atricion15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Atrición</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/abrasion/abrasion15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Abrasión</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/abfraccion/abfraccion15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Abfracción</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/erosion/erosion15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Erosión</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/obturacion/obturacion15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Obturación</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/ortodoncia/ortodoncia15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Ortodoncia</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                           <img src="{{ asset('images/dental/odontopediatria/sin-erupcionar/sin-erupcionar53.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Diente sin erupción</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                        <img src="{{ asset('images/dental/odontopediatria/diente-erupcion/en-erupcion53.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Diente en erupción</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/fluor/fluor15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Fluor</h6>
                                          </div>
                                    </div>
                                </div>
                                <div class="col-6 mb-5">
                                        <div class="media align-items-center">
                                          <img src="{{ asset('images/dental/dientes/otro-tto/otro-tto15.png') }}" class="align-self-center wid-35 mr-1" alt="...">
                                          <div class="media-body">
                                            <h6>Otro Tratamiento</h6>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_consentimientos_informados1">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapse_consentimientos_informados1"
                                aria-expanded="false" aria-controls="collapse_consentimientos_informados1"><i
                                    class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                ORDENES DE EXÁMENES DENTALES
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_consentimientos_informados1" class="collapse"
                        aria-labelledby="heading_consentimientos_informados1"
                        data-parent="#accordion_side_bar">
                        <div class="card-body-sidebar">
                            <button type="button"
                                class="btn btn-sm btn-info btn-block accion_modal_examenradiologico">Orden
                                Radiología</button>
                            <button type="button"
                                class="btn btn-sm btn-info btn-block accion_modal_examenbiopsia">Biopsia</button>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_consentimientos_informados2">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapse_consentimientos_informados2"
                                aria-expanded="false" aria-controls="collapse_consentimientos_informados2"><i
                                    class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                LABORATORIO DENTAL
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_consentimientos_informados2" class="collapse"
                        aria-labelledby="heading_consentimientos_informados2"
                        data-parent="#accordion_side_bar">
                        <div class="card-body-sidebar">
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="lab_dent_menor();dame_correlativo('Orden Trabajo Menor');">+ ORDEN DE TRABAJO  MENOR</button>
                            <button type="button" class="btn btn-sm btn-info btn-block text-left" onclick="lab_dent_mayor();dame_correlativo('Orden Trabajo Mayor');">+ ORDEN DE TRABAJO MAYOR</button>
                        </div>
                    </div>
                </div>
                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_materiales">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapse_materiales" aria-expanded="false" aria-controls="collapse_materiales"><i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                PEDIDOS MATERIAL DE TRABAJO
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_materiales" class="collapse" aria-labelledby="heading_materiales"  data-parent="#accordion_side_bar">

                        <div class="card-body-sidebar">
                            <button type="button"
                                class="btn btn-sm btn-info btn-block accion_modal_pedido_insumos" onclick="$('#modal_pedido_insumos').modal();">PEDIDO MATERIAL/INSUMOS</button>
                        </div>
                    </div>
                </div>
                @php
                    $clase = collect($tons_dental)->contains('estado', 2) ? '' : 'disabled';
                @endphp
                <div class="card-sidebar" id="card_sidebar_tons">
                    <div class="card-header-sidebar" id="heading_ayudante">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed {{ $clase }}" type="button"
                            @if($clase == 'desactivado') disabled @endif
                            data-toggle="collapse" data-target="#collapse_ayudante"
                            aria-expanded="false" aria-controls="collapse_ayudante">
                            <i class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            AYUDANTE DENTAL
                        </button>
                        </h2>
                    </div>
                    <div id="collapse_ayudante" class="collapse" aria-labelledby="heading_ayudante"
                        data-parent="#accordion_side_bar">
                        <div class="card-body-sidebar">
                            <button type="button"
                                class="btn btn-sm btn-info btn-block accion_modal_gastosmaterial_gen {{ $clase }}">GASTO
                                MATERIALES</button>
                            <button type="button"
                                class="btn btn-sm btn-info btn-block accion_modal_control_trabajo {{ $clase }}">CONTROL DE ENVIOS A
                                LABORATORIO</button>
                                <button type="button"
                                class="btn btn-sm btn-info btn-block accion_modal_pedido_insumos {{ $clase }}">PEDIDO
                                INSUMOS</button>
                            <button type="button"
                                class="btn btn-sm btn-info btn-block accion_modal_pedido_materiales {{ $clase }}">PEDIDO
                                MATERIALES</button>
                        </div>
                    </div>
                </div>

                <div class="card-sidebar">
                    <div class="card-header-sidebar" id="heading_recom">
                        <h2 class="mb-0">
                            <button class="btn btn-light btn-block text-left collapsed" type="button"
                                data-toggle="collapse" data-target="#collapse_recom" aria-expanded="false"
                                aria-controls="collapse_recom"><i
                                    class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                                RECOMENDACIONES A PACIENTES
                            </button>
                        </h2>
                    </div>
                    <div id="collapse_recom" class="collapse" aria-labelledby="heading_recom"
                        data-parent="#accordion_side_bar">
                        <div class="card-body-sidebar">
                            <a href="documentos/consejosodontopediatría.pdf" target="_blank"><button type="button"
                                    class="btn btn-sm btn-info btn-block " style="margin-bottom:5px">La Dentición
                                    Temporal y sus Cuidados</button></a>
                            <a href="documentos/Higiene y controles odontopediatra.pdf" target="_blank">
                                <button type="button"
                                    class="btn btn-sm btn-info btn-block accion_m_aconsentcirm">Higiene y Control
                                </button></a>
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


    <!--MODALS SIDE BAR GENERALES-->
    {{-- @include('atencion_medica.modales') --}}

 {{--
    @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_exbiopsia_orl")

    @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_exradiologico_orl")--}}


