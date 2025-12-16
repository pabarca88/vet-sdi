<!--Ficha Atención General-->

<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="col-sm-12">
        <h5 class="text-c-blue mt-5 mb-4" style="font-size: 1.1rem;">
            Ficha de Atención General
        </h5>
    </div>


    <div class="row" style="padding-left: 30px;">
        <span id="mensaje" class="alert alert-success" style="display:none"></span>

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

        <!--Formulario / Menor de edad-->

        @if (\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
            <div class="col-sm-12 mt-3">
                <div class="card">
                    <div class="card-header bg-info">
                        <h6>Paciente Menor de Edad</h6>
                    </div>
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="floating-label-activo-sm">Nombre del acompañante</label>
                                <input type="text" class="form-control form-control-sm" name="nombre_acompanante" id="nombre_acompanante" value="{!! old('nombre_acompanante') !!}">
                            </div>
                            <div class="form-group col-md-6" id="form_0">
                                <label class="floating-label-activo-sm">Relaci&oacute;n</label>
                                <input type="text" class="form-control form-control-sm" name="relacion_acompanante" id="relacion_acompanante" value="{!! old('relacion_acompanante') !!}">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif
        <!--Cierre: Formulario / Menor de edad-->

        <!--Formulario / Motivo de la Consulta-->
        <div class="col-sm-12">
            <div class="card mb-3">
                <div class="card-header bg-info">
                    <h6>Motivo de la Consulta</h6>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-8">

                            @if (isset($fichaAtencion) && $fichaAtencion->motivo != null))
                                <label class="floating-label-activo-sm">Descripción</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="descripcion_consulta" id="descripcion_consulta">{{ $fichaAtencion->motivo }}</textarea>
                            @else
                                <label class="floating-label-activo-sm">Descripción</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="descripcion_consulta" id="descripcion_consulta">{!! old('descripcion_consulta') !!}</textarea>
                            @endif

                        </div>
                        <div class="form-group col-md-4">

                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Seleccione Consulta Control</label>
                                <select class="form-control form-control-sm" id="id_consulta_control" name="id_consulta_control">
                                    <option>Seleccione</option>
                                </select>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--Cierre: Formulario /Motivo de la Consulta-->
        <!--Formulario / Antecedentes-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h6>Antecedentes</h6>
                </div>
                <div class="card-body">

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
        <!--Cierre: Formulario / Antecedentes-->
        <!--Formulario / Examen Físico-->
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-header bg-info">
                    <h6>Examen Físico</h6>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        @if (isset($fichaAtencion) && $fichaAtencion->examen_fisico != null)
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
        <!--Cierre: Formulario / Examen Físico-->
        <!--Formulario / Signos vitales y otros-->
        <div class="col-sm-12">
            <div class="card mb-3">
                <div class="card-header bg-info align-middle">
                    <h6 class="float-left d-inline">Signos vitales y Otros</h6>
                    <i id="signos_vitales" class="float-right f-18 d-inline fas fa-angle-down  mb-0"
                        style="cursor:pointer"></i>
                </div>
                <div class="card-body" id="form_3" style="display:none">

                    <div class="form-row">
                        <div class="form-group col-md-1">
                            @if (isset($fichaAtencion) && $fichaAtencion->temperatura != null)
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
                            @if (isset($fichaAtencion) && $fichaAtencion->frecuencia_reposo != null)
                                <label class="floating-label-activo-sm">Frec. Reposo</label>
                                <input type="text" class="form-control form-control-sm" name="frecuencia_reposo" id="frecuencia_reposo" value="{{ $fichaAtencion->frecuencia_reposo }}">
                            @else
                                <label class="floating-label-activo-sm">Frec. Reposo</label>
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

                            @if (isset($fichaAtencion) && $fichaAtencion->estado_nutricional != null)
                                <label class="floating-label-activo-sm">Estado Nutricional</label>
                                <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">
                            @else
                                <label class="floating-label-activo-sm">Estado Nutricional</label>
                                <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{!! old('estado_nutricional') !!}">
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group mb-1">
                            <label><strong>Presión Arterial</strong></label>
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="p_arterial"  value="{!! old('p_arterial') !!}">
                                <label for="p_arterial" class="cr"></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row" id="form_1" style="display:none">
                        <div class="form-group col-md-3">
                            @if (isset($fichaAtencion) && $fichaAtencion->presion_bi != null)
                                <label class="floating-label-activo-sm">BI</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{{ $fichaAtencion->presion_bi }}">
                            @else
                                <label class="floating-label-activo-sm">BI</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{!! old('presion_bi') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            @if (isset($fichaAtencion) && $fichaAtencion->presion_bd != null)
                                <label class="floating-label-activo-sm">BD</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bd" id="presion_bd" value="{{ $fichaAtencion->presion_bd }}">
                            @else
                                <label class="floating-label-activo-sm">BD</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bd" id="presion_bd" value="{!! old('presion_bd') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            @if (isset($fichaAtencion) && $fichaAtencion->presion_de_pie != null)
                                <label class="floating-label-activo-sm">De pié</label>
                                <input type="text" class="form-control form-control-sm" name="presion_de_pie" id="presion_de_pie" value="{{ $fichaAtencion->presion_de_pie }}">
                            @else
                                <label class="floating-label-activo-sm">De pié</label>
                                <input type="text" class="form-control form-control-sm" name="presion_de_pie" id="presion_de_pie" value="{!! old('presion_de_pie') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            @if (isset($fichaAtencion) && $fichaAtencion->presion_sentado != null)
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
                            @if (isset($fichaAtencion) && $fichaAtencion->ct_estado_conciencia != null)
                                <label class="floating-label-activo-sm">Estado de conciencia</label>
                                <input type="text" class="form-control form-control-sm" name="ct_estado_conciencia" id="ct_estado_conciencia" value="{{ $fichaAtencion->ct_estado_conciencia }}">
                            @else
                                <label class="floating-label-activo-sm">Estado de conciencia</label>
                                <input type="text" class="form-control form-control-sm" name="ct_estado_conciencia" id="ct_estado_conciencia" value="{!! old('ct_estado_conciencia') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            @if (isset($fichaAtencion) && $fichaAtencion->ct_lenguaje != null)
                                <label class="floating-label-activo-sm">Lenguaje</label>
                                <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{{ $fichaAtencion->ct_lenguaje }}">
                            @else
                                <label class="floating-label-activo-sm">Lenguaje</label>
                                <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{!! old('ct_lenguaje') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            @if (isset($fichaAtencion) && $fichaAtencion->ct_traslado != null)
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
        <!--Cierre: Formulario / Signos vitales y otros-->
        <!--Formulario / Diagnóstico-->
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-header bg-info">
                    <h6>Diagnóstico</h6>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            @if (isset($fichaAtencion) && $fichaAtencion->hipotesis_diagnostico != null)
                                <label class="floating-label-activo-sm">Hipótesis Diagnóstica</label>
                                <input type="text" class="form-control form-control-sm" name="descripcion_hipotesis" id="descripcion_hipotesis" value="{{ $fichaAtencion->hipotesis_diagnostico }}">
                            @else
                                <label class="floating-label-activo-sm">Hipótesis Diagnóstica</label>
                                <input type="text" class="form-control form-control-sm" name="descripcion_hipotesis" id="descripcion_hipotesis" value="{!! old('descripcion_hipotesis') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            @if (isset($fichaAtencion) && $fichaAtencion->diagnostico_ce10 != null)
                                <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                <input type="text" class="form-control form-control-sm" name="descripcion_cie" id="descripcion_cie" value="{{ $fichaAtencion->diagnostico_ce10 }}">
                                <input type="hidden" class="form-control form-control-sm" name="id_descripcion_cie" id="id_descripcion_cie" value="{{ $fichaAtencion->diagnostico_ce10 }}">
                            @else
                                <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                <input type="text" class="form-control form-control-sm" name="descripcion_cie" id="descripcion_cie" value="{!! old('descripcion_cie') !!}">
                                <input type="hidden" class="form-control form-control-sm" name="id_descripcion_cie" id="id_descripcion_cie" value="{!! old('id_descripcion_cie') !!}">
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--Cierre: Formulario / Diagnóstico-->
        <!--Otros Formularios-->
        <div class="col-sm-12 mt-1">
            <div class="row">
                <div class="form-group col-md-6">
                    <span class="">Para activar Botones debe llenar el diagnóstico</span>
                </div>
            </div>
            <div class="row">

                @if (isset($fichaAtencion) && $fichaAtencion->hipotesis_diagnostico != null)
                    <div class="form-group col-md-4 p-r-0">
                        <button type="button" id="btn_agregar_medicamento" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i  class="fa fa-plus"></i> Indicar medicamento</button>
                    </div>
                    <div class="form-group col-md-2 p-l-0">
                        <button type="button" onclick="ver_pdf_receta($('#id_fc').val());" class="btn btn-warning btn-block btn-sm mt-1" id="btn_medicamento_pdf">Ver PDF</button>
                    </div>
                    <div class="form-group col-md-4 p-r-0">
                        <button type="button" id="btn_agregar_examen" class="btn btn-success btn-block btn-sm mt-1" onclick="mostrar_modal_examen_cirguria();"><i class="fa fa-plus"></i> Indicar examen</button>
                    </div>
                    <div class="form-group col-md-2 p-l-0">
                        <button type="button" onclick="ver_pdf_orden_examenes($('#id_fc').val());" class="btn btn-warning btn-block btn-sm mt-1" id ="btn_examenes_pdf">Ver PDF</button>
                    </div>
                @else
                    <div class="form-group col-md-4 p-r-0">
                        <button type="button" disabled="disabled" id="btn_agregar_medicamento" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i  class="fa fa-plus"></i> Indicar medicamento</button>
                    </div>
                    <div class="form-group col-md-2 p-l-0">
                        <button type="button" onclick="ver_pdf_receta($('#id_fc').val());" class="btn btn-warning btn-block btn-sm mt-1" id="btn_medicamento_pdf">Ver PDF</button>
                    </div>
                    <div class="form-group col-md-4 p-r-0">
                        <button type="button" disabled="disabled" id="btn_agregar_examen" class="btn btn-success btn-block btn-sm mt-1" onclick="mostrar_modal_examen_cirguria();"><i class="fa fa-plus"></i> Indicar examen</button>
                    </div>
                    <div class="form-group col-md-2 p-l-0">
                        <button type="button" onclick="ver_pdf_orden_examenes($('#id_fc').val());" class="btn btn-warning btn-block btn-sm mt-1" id ="btn_examenes_pdf">Ver PDF</button>
                    </div>
                @endif

                @include(
                    'app.cirugia.modals.modals_cesarea.modal_indicar_examenes'
                )
                @include(
                    'app.cirugia.modals.modals_cesarea.modal_indicar_medicamentos'
                )
            </div>
        </div>
        <div class="row px-3 mt-3 mb-3">
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
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="modal_ges" name="modal_ges" value="{!! old('modal_ges') !!}">
                                {{--  <label for="modal_ges" class="cr" data-toggle="modal" data-target="#form_ges"></label>  --}}
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
                                    <td class="align-middle pb-1 pt-1">Paciente GES<br>PS.02</td>
                                    <td class="align-middle pb-1 pt-1">
                                        <button type="button" class="btn  btn-icon btn-danger" data-toggle="tooltip"
                                            data-placement="top" title="Quitar">
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
                            <input type="checkbox" id="confidencial" name="confidencial"  value="{!! old('confidencial') !!}"/>
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
        <div class="row">
            {{-- agregar_examenes_ficha(); --}}
            <div class="form-group col-md-6">
                {{--  <button type="button" class="btn btn-success" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha();$('#cerrarsession').val('1')">Guardar Ficha y Finalizar su Consulta</button>  --}}
                <input type="submit" class="btn btn-success " onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
            </div>
            <div class="form-group col-md-6">
                <input type="submit" class="btn btn-info float-right d-inline " onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
            </div>
            {{--  <button type="button" class="btn btn-success">Imprimir</button>  --}}
        </div>
    </form>

</div>
<!--Cierre: Ficha Atención General-->

<!--MODALES-->
@include(
    'atencion_medica.formularios.modal_atencion_general.modal_enfermedades_cronicas'
)
