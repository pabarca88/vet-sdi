{{-- FORMULARIO DE ATENCION MEDICA --}}
<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row bg-white shadow-sm rounded mx-3 mt-4">
            <div class="col-sm-12 col-md-12 px-0">
                <div class="tab-content" id="pediat-contenido">
                    <!--FICHA DE ATENCIÓN GENERAL-->
                    {{--  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">  --}}
                        <div class="col-md-12">
                            {{-- TITULO --}}
                            <div class="row">
                                <div class="col-md-12 mt-3 mb-0">
                                    <h6 class="f-16 text-c-blue">Ficha de atención general</h6>
                                    <hr>
                                </div>
                            </div>
                            <!--FORMULARIOS-->

                            <div class="row" style="padding-left: 30px;">
                                @if(isset($interconsulta) )
                                    @if($interconsulta->estado == 1)
                                        <span id="mensaje" class="alert alert-success" style="">INTERCONSULTA PENDIENTE POR EVALUAR <button class="btn btn-primary accion_modal_interconsulta_respuesta ">Abrir</button></span>
                                    @else
                                        <span id="mensaje" class="alert alert-success" style="display:none"></span>
                                    @endif
                                @else
                                <span id="mensaje" class="alert alert-success" style="display:none"></span>
                                @endif
                            </div>
                            <form action="{{ route('fichaAtencion.registrar_ficha') }}" method="POST">
                                @csrf

                                <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                                <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                                <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                                <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                                <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                                <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                                <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                                <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">

                                <div class="row">
                                    <!--Formulario / Menor de edad-->
                                    @include('atencion_medica.generales.seccion_menor')
                                    <!--Cierre: Formulario / Menor de edad-->

                                    <!--Formulario / Motivo de la Consulta-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="mot-consulta">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#mot-consulta-c" aria-expanded="false" aria-controls="mot-consulta-c">
                                                    Motivo de la consulta
                                                </button>
                                            </div>
                                            <div id="mot-consulta-c" class="collapse show" aria-labelledby="mot-consulta" data-parent="#mot-consulta">
                                                <div class="card-body-aten shadow-none">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-8">

                                                            @if (isset($fichaAtencion) && $fichaAtencion->motivo != null)
                                                            )
                                                            <label class="floating-label-activo-sm">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="descripcion_consulta" id="descripcion_consulta">{{ $fichaAtencion->motivo }}</textarea>
                                                            @else
                                                            <label class="floating-label-activo-sm">Descripción</label>
                                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="descripcion_consulta" id="descripcion_consulta">{!! old('descripcion_consulta') !!}</textarea>
                                                            @endif

                                                        </div>
                                                        <div class="form-group col-md-4">

                                                            <div class="form-group fill">
                                                                <label class="floating-label-activo-sm">Seleccione
                                                                    Consulta Control</label>
                                                                <select class="form-control form-control-sm" id="id_consulta_control" name="id_consulta_control">
                                                                    <option>Seleccione</option>
                                                                </select>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Cierre: Formulario /Motivo de la Consulta-->

                                    <!--Formulario / Antecedentes-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="antecedentes">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#antecedentes-c" aria-expanded="false" aria-controls="antecedentes-c">
                                                    Antecedentes
                                                </button>
                                            </div>
                                            <div id="antecedentes-c" class="collapse show" aria-labelledby="antecedentes" data-parent="#antecedentes">
                                                <div class="card-body-aten shadow-none">
                                                    <div class="form-row">
                                                        @if (isset($fichaAtencion) && $fichaAtencion->antecedentes != null)
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm">Antecedentes</label>
                                                            <input type="text" class="form-control form-control-sm" name="descripcion_antecedentes" id="descripcion_antecedentes" value="{{ $fichaAtencion->antecedentes }}">
                                                        </div>
                                                        @else
                                                        <div class="form-group col-md-12">
                                                            <label class="floating-label-activo-sm">Antecedentes</label>
                                                            <textarea class="form-control form-control-sm" name="descripcion_antecedentes" id="descripcion_antecedentes">{!! old('descripcion_antecedentes') !!}</textarea>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Cierre: Formulario / Antecedentes-->

                                    <!--Formulario / Examen Físico-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card">
                                                <div class="card-header" id="examen-fisico">
                                                    <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#examen-fisico-c" aria-expanded="false" aria-controls="examen-fisico-c">
                                                        Examen físico
                                                    </button>
                                                </div>
                                                <div id="examen-fisico-c" class="collapse show" aria-labelledby="examen-fisico" data-parent="#examen-fisico">
                                                    <div class="card-body-aten shadow-none">
                                                        <div class="form-row">
                                                            @if (isset($fichaAtencion) && $fichaAtencion->examen_fisico !=
                                                            null)
                                                            <div class="form-group col-md-12">
                                                                <label class="floating-label-activo-sm">Descripción</label>
                                                                <input class="form-control caja-texto form-control-sm" name="descripcion_examen_fisico" id="descripcion_examen_fisico" value="{{ $fichaAtencion->examen_fisico }}">
                                                            </div>
                                                            @else
                                                            <div class="form-group col-md-12">
                                                                <label class="floating-label-activo-sm">Descripción</label>
                                                                <textarea class="form-control form-control-sm" name="descripcion_examen_fisico" id="descripcion_examen_fisico">{!! old('descripcion_examen_fisico') !!}</textarea>
                                                            </div>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Cierre: Formulario / Examen Físico-->

                                    <!--Formulario / Signos vitales y otros-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="signosvit-otros">
                                                <button class="accor-open btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#signosvit-otros-c" aria-expanded="false" aria-controls="signosvit-otros-c">
                                                    Signos vitales y otros
                                                </button>
                                            </div>
                                            <div id="signosvit-otros-c" class="collapse" aria-labelledby="signosvit-otros" data-parent="#signosvit-otros">
                                                <div class="card-body-aten shadow-none">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-1">
                                                            @if (isset($fichaAtencion) && $fichaAtencion->temperatura !=
                                                            null)
                                                            <label class="floating-label-activo-sm">Tº</label>
                                                            <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="{{ $fichaAtencion->temperatura }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">Tº</label>
                                                            <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="{!! old('temperatura') !!}">
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-1">
                                                            @if (isset($fichaAtencion) && $fichaAtencion->pulso != null)
                                                            <label class="floating-label-activo-sm">Pulso</label>
                                                            <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{{ $fichaAtencion->pulso }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">Pulso</label>
                                                            <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{!! old('pulso') !!}">
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            @if (isset($fichaAtencion) && $fichaAtencion->frecuencia_reposo
                                                            != null)
                                                            <label class="floating-label-activo-sm">Frec.
                                                                Reposo</label>
                                                            <input type="text" class="form-control form-control-sm" name="frecuencia_reposo" id="frecuencia_reposo" value="{{ $fichaAtencion->frecuencia_reposo }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">Frec.
                                                                Reposo</label>
                                                            <input type="text" class="form-control form-control-sm" name="frecuencia_reposo" id="frecuencia_reposo" value="{!! old('frecuencia_reposo') !!}">
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            @if (isset($fichaAtencion) && $fichaAtencion->peso != null)
                                                            <label class="floating-label-activo-sm">Peso</label>
                                                            <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="{{ $fichaAtencion->peso }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">Peso</label>
                                                            <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="{!! old('peso') !!}">
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            @if (isset($fichaAtencion) && $fichaAtencion->talla != null)
                                                            <label class="floating-label-activo-sm">Talla</label>
                                                            <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="{{ $fichaAtencion->talla }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">Talla</label>
                                                            <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="{!! old('talla') !!}">
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            @if (isset($fichaAtencion) && $fichaAtencion->imc != null)
                                                            <label class="floating-label-activo-sm">IMC</label>
                                                            <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="{{ $fichaAtencion->imc }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">IMC</label>
                                                            <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="{!! old('imc') !!}">
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            @if (isset($fichaAtencion) && $fichaAtencion->estado_nutricional
                                                            != null)
                                                            <label class="floating-label-activo-sm">Estado
                                                                Nutricional</label>
                                                            <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">Estado
                                                                Nutricional</label>
                                                            <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{!! old('estado_nutricional') !!}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group mb-1">
                                                            <label><strong>Presión Arterial</strong></label>
                                                            <div class="switch switch-success d-inline m-r-10">
                                                                <input type="checkbox" id="p_arterial" value="{!! old('p_arterial') !!}">
                                                                <label for="p_arterial" class="cr"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row" id="form_1" style="display:none">
                                                        <div class="form-group col-md-3">
                                                            @if (isset($fichaAtencion) && $fichaAtencion->presion_bi !=
                                                            null)
                                                            <label class="floating-label-activo-sm">BI</label>
                                                            <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{{ $fichaAtencion->presion_bi }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">BI</label>
                                                            <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{!! old('presion_bi') !!}">
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            @if (isset($fichaAtencion) && $fichaAtencion->presion_bd !=
                                                            null)
                                                            <label class="floating-label-activo-sm">BD</label>
                                                            <input type="text" class="form-control form-control-sm" name="presion_bd" id="presion_bd" value="{{ $fichaAtencion->presion_bd }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">BD</label>
                                                            <input type="text" class="form-control form-control-sm" name="presion_bd" id="presion_bd" value="{!! old('presion_bd') !!}">
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            @if (isset($fichaAtencion) && $fichaAtencion->presion_de_pie !=
                                                            null)
                                                            <label class="floating-label-activo-sm">De pié</label>
                                                            <input type="text" class="form-control form-control-sm" name="presion_de_pie" id="presion_de_pie" value="{{ $fichaAtencion->presion_de_pie }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">De pié</label>
                                                            <input type="text" class="form-control form-control-sm" name="presion_de_pie" id="presion_de_pie" value="{!! old('presion_de_pie') !!}">
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            @if (isset($fichaAtencion) && $fichaAtencion->presion_sentado !=
                                                            null)
                                                            <label class="floating-label-activo-sm">Sentado</label>
                                                            <input type="text" class="form-control form-control-sm" name="presion_sentado" id="presion_sentado" value="{{ $fichaAtencion->presion_sentado }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">Sentado</label>
                                                            <input type="text" class="form-control form-control-sm" name="presion_sentado" id="presion_sentado" value="{!! old('presion_sentado') !!}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group mb-1">
                                                            <label><strong>Comunicación y traslado</strong></label>
                                                            <div class="switch switch-success d-inline m-r-10">
                                                                <input type="checkbox" id="com_trasl" value="{!! old('com_trasl') !!}">
                                                                <label for="com_trasl" class="cr"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row" id="form_2" style="display:none">
                                                        <div class="form-group col-md-4">
                                                            @if (isset($fichaAtencion) &&
                                                            $fichaAtencion->ct_estado_conciencia != null)
                                                            <label class="floating-label-activo-sm">Estado de
                                                                conciencia</label>
                                                            <input type="text" class="form-control form-control-sm" name="ct_estado_conciencia" id="ct_estado_conciencia" value="{{ $fichaAtencion->ct_estado_conciencia }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">Estado de
                                                                conciencia</label>
                                                            <input type="text" class="form-control form-control-sm" name="ct_estado_conciencia" id="ct_estado_conciencia" value="{!! old('ct_estado_conciencia') !!}">
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            @if (isset($fichaAtencion) && $fichaAtencion->ct_lenguaje !=
                                                            null)
                                                            <label class="floating-label-activo-sm">Lenguaje</label>
                                                            <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{{ $fichaAtencion->ct_lenguaje }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">Lenguaje</label>
                                                            <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{!! old('ct_lenguaje') !!}">
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            @if (isset($fichaAtencion) && $fichaAtencion->ct_traslado !=
                                                            null)
                                                            <label class="floating-label-activo-sm">Traslado</label>
                                                            <input type="text" class="form-control form-control-sm" name="ct_traslado" id="ct_traslado" value="{{ $fichaAtencion->ct_traslado }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">Traslado</label>
                                                            <input type="text" class="form-control form-control-sm" name="ct_traslado" id="ct_traslado" value="{!! old('ct_traslado') !!}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Cierre: Formulario / Signos vitales y otros-->

                                    <!--Formulario / Diagnóstico-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">
                                            <div class="card-header" id="diagnostico">
                                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico-c" aria-expanded="false" aria-controls="diagnostico-c">
                                                    Diagnóstico
                                                </button>
                                            </div>
                                            <div id="diagnostico-c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                <div class="card-body-aten shadow-none">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            @if (isset($fichaAtencion) &&
                                                            $fichaAtencion->hipotesis_diagnostico != null)
                                                            <label class="floating-label-activo-sm">Hipótesis
                                                                Diagnóstica</label>
                                                            <input type="text" class="form-control form-control-sm" name="descripcion_hipotesis" id="descripcion_hipotesis" value="{{ $fichaAtencion->hipotesis_diagnostico }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">Hipótesis
                                                                Diagnóstica</label>
                                                            <input type="text" class="form-control form-control-sm" name="descripcion_hipotesis" id="descripcion_hipotesis" value="{!! old('descripcion_hipotesis') !!}">
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            @if (isset($fichaAtencion) && $fichaAtencion->diagnostico_ce10
                                                            != null)
                                                            <label class="floating-label-activo-sm">Diagnóstico
                                                                CIE-10</label>
                                                            <input type="text" class="form-control form-control-sm" name="descripcion_cie" id="descripcion_cie" value="{{ $fichaAtencion->diagnostico_ce10 }}">
                                                            <input type="hidden" class="form-control form-control-sm" name="id_descripcion_cie" id="id_descripcion_cie" value="{{ $fichaAtencion->diagnostico_ce10 }}">
                                                            @else
                                                            <label class="floating-label-activo-sm">Diagnóstico
                                                                CIE-10</label>
                                                            <input type="text" class="form-control form-control-sm" name="descripcion_cie" id="descripcion_cie" value="{!! old('descripcion_cie') !!}">
                                                            <input type="hidden" class="form-control form-control-sm" name="id_descripcion_cie" id="id_descripcion_cie" value="{!! old('id_descripcion_cie') !!}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Cierre: Formulario / Diagnóstico-->
                                </div>

                                <!--Otros Formularios-->

                                <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES -->
                                @include('atencion_medica.generales.seccion_receta_examen_comunes')
                                <!--SECCION DE MEDICAMENTOS Y EXAMENES GENERALES FIN  -->

                                <!--ENFERMO CRÓNICO O GES-->
                                <div class="row px-3 mt-3 mb-3">
                                    {{-- CRONICO --}}
                                    <div class="col-md-4 mx-auto">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" onchange="es_cronico();" id="enf_cronico" name="enf_cronico" data-toggle="modal" data-target="#form_enfermo_cronico" value="{!! old('enf_cronico') !!}">
                                                        <label for="enf_cronico" class="cr"></label>
                                                    </div>
                                                    <label>¿Es enfermo crónico?</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row " hidden>
                                            <div class="col-sm-12">
                                                <div class="alert alert-warning mx-auto" role="alert">
                                                    <table class="table table-borderless mt-0 mb-0">
                                                        <tbody>
                                                            <tr id="tr_obesidad">
                                                                <td class="align-middle pb-1 pt-1">Obesidad</td>
                                                                <td class="align-middle pb-1 pt-1">
                                                                    <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                                        <i class="feather icon-x"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <tr id="tr_diabetes">
                                                                <td class="align-middle pb-1 pt-1">Diabetes</td>
                                                                <td class="align-middle pb-1 pt-1">
                                                                    <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                                        <i class="feather icon-x"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <tr id="tr_hipertesion">
                                                                <td class="align-middle pb-1 pt-1">Hipertensión</td>
                                                                <td class="align-middle pb-1 pt-1">
                                                                    <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                                        <i class="feather icon-x"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- GES --}}
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="switch switch-success d-inline m-r-10">
                                                        <input type="checkbox" id="modal_ges" name="modal_ges" value="{!! old('modal_ges') !!}">
                                                        {{-- <label for="modal_ges" class="cr" data-toggle="modal"
                                                                data-target="#form_ges"></label> --}}
                                                        <label for="modal_ges" class="cr"></label>
                                                    </div>
                                                    <label>Ges</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" hidden>
                                            <div class="alert alert-warning mx-auto my-0" role="alert">
                                                <table class="table table-borderless mt-0 mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle pb-1 pt-1">Paciente GES<br>PS.02
                                                            </td>
                                                            <td class="align-middle pb-1 pt-1">
                                                                <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="Quitar">
                                                                    <i class="feather icon-x"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="switch switch-success d-inline m-r-10">
                                                    <input type="checkbox" id="confidencial" name="confidencial" value="{!! old('confidencial') !!}" />
                                                    <label for="confidencial" class="cr"></label>
                                                </div>
                                                <label>Confidencial</label>
                                            </div>
                                        </div>
                                        <div class="row" id="confidencial_descripcion" style="display: none">
                                            <div class="col-sm-12">
                                                <div class="alert alert-warning mx-auto" role="alert">
                                                    <p class="text-dark f-14 pb-1 pt-1 mt-0 mb-0">Este registro
                                                        de atención médica es confidencial
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!--GUARDAR O IMPRIMIR FICHA-->
                                <div class="row mb-3">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-info mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                        <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                                    </div>
                                </div>
                            </form>
                        </div>
                    {{--  </div>  --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!--Cierre: Ficha Atención General-->

<!--MODALES-->
@include('atencion_medica.formularios.modal_atencion_general.modal_enfermedades_cronicas')

