<!-- FICHA ATENCION tecn orl -->
<style type="text/css">
    .ng_esp {
        /* Common */
    font : 13px 'Wingdings 3';
        color : #0000ff;
        width: 60px; background-color: #f6faf9; color: #FF0000;text-align:center; font-weight: bold; font-size: x-large;
        background-color: #f6faf9;
        text-align:center;
        font-weight: bold;
        display: block;
        width: 100%;
        padding: 0.4rem 0.5rem 0.3rem 0.5rem!important;
        font-size: 1.0rem;
        font-weight: 400;
        line-height: 1.5;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 3px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    @font-face {
        font-family: 'Wingdings 3';

    }
</style>
<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 ">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 px-2 pt-1 mt-2">
                <div class="alert-atencion alert alert-warning-b alert-dismissible fade show" role="alert" id="mensaje_ficha"></div>
            </div>
            <div class="col-sm-12 col-md-12">
                <form action="{{ route('fichaAtencion.registrar_ficha') }}" method="POST">
                    <div class="col-sm-12 col-md-12">
                        {{--  <input type="hidden" name="examenes" id="examenes" value="{!! old('examenes') !!}">
                        <input type="hidden" name="examenes_esp" id="examenes_esp" value="{!! old('examenes_esp') !!}">
                        <input type="hidden" name="medicamentos" id="medicamentos" value="{!! old('medicamentos') !!}">
                        <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                        <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                        <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                        <input type="hidden" name="rut_paciente_fc" value="{{ $paciente->rut }}" id="rut_paciente_fc">
                        <input type="hidden" name="prevision_paciente_fc" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc">
                        <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                        <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                        <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                        <input type="hidden" name="input_lista_imagenes" id="input_lista_imagenes" value="">
                        @csrf  --}}

                        <div class="tab-content" id="med-contenido">
                            <!--ATENCIÓN ESPECIALIDAD GENERAL-->
                            <div class="tab-pane fade show active" id="atencion_cirugia_gen" role="tabpanel" aria-labelledby="atencion_cirugia_gen-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <!--Formulario / Menor de edad-->
											{{--  @include('general.secciones_ficha.seccion_menor', ['tipo_ficha' => "1"])  --}}
											<!--Cierre: Formulario / Menor de edad-->

                                            <!--Motivo consulta-->
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-a">
                                                    <div class="card-header-a" id="id_general">
                                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#id_general_c" aria-expanded="false" aria-controls="id_general_c">
                                                            Identificación del paciente
                                                        </button>
                                                    </div>
                                                    <div id="id_general_c" class="collapse show" aria-labelledby="id_general" data-parent="#id_general">
                                                        <div class="card-body-aten-a">
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                                                    <label class="floating-label-activo-sm">Fecha de examen</label>
                                                                    <input type="date" class="form-control form-control-sm" name="fecha_ex" id="fecha_ex">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Examinador</label>
                                                                    <input type="text" class="form-control form-control-sm" name="profesional" id="profesional">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Derivado por:</label>
                                                                    <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                                                    <label class="floating-label-activo-sm">Listado Examenes solicitados:</label>
                                                                    <input type="text" class="form-control form-control-sm" name="listado_ex_pcte" id="listado_ex_pcte">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">Nombre paciente</label>
                                                                    <input type="text" class="form-control form-control-sm" name="Nombre_pcte" id="Nombre_pcte">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Edad</label>
                                                                    <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                                                                </div>
                                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                    <label class="floating-label-activo-sm">Rut</label>
                                                                    <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                </div>
                                                                <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">Dirección</label>
                                                                    <input type="text" class="form-control form-control-sm" name="direccion" id="direccion">
                                                                </div>
                                                                <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                    <label class="floating-label-activo-sm">Email</label>
                                                                    <input type="text" class="form-control form-control-sm" name="email" id="email">
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                                    <label class="floating-label-activo-sm">Antecedentes Especialidad</label>
                                                                    <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ant_especialidad" id="ant_especialidad" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                                </div>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Cierre: Formulario /Motivo de la Consulta-->

                                            <!--Formulario / Signos vitales y otros-->
                                            {{--  @include('general.secciones_ficha.signos_vitales')  --}}
                                            <!--Cierre: Formulario / Signos vitales y otros-->

                                            <!-- hospitalizacion -->
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-a">
                                                    <div class="card-header-a" id="ocho_par">
                                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed card-act-open " type="button" data-toggle="collapse" data-target="#ocho_par-c" aria-expanded="false" aria-controls="ocho_par-c">
                                                            Examen Funcional 8° par craneáno
                                                        </button>
                                                    </div>
                                                    <div id="ocho_par-c" class="collapse" aria-labelledby="ocho_par" data-parent="#ocho_par">
                                                        <div class="card-body-aten-a">
                                                            <div class="row div_form_examen_ocho_par">
                                                                {{--  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="card-a">
                                                                        <div class="card-header-a" id="id_general">
                                                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#id_general_c" aria-expanded="false" aria-controls="id_general_c">
                                                                                Identificación del paciente
                                                                            </button>
                                                                        </div>
                                                                        <div id="id_general_c" class="collapse show" aria-labelledby="id_general" data-parent="#id_general">
                                                                            <div class="card-body-aten-a">
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                                                                        <label class="floating-label-activo-sm">Fecha de examen</label>
                                                                                        <input type="date" class="form-control form-control-sm" name="fecha_ex" id="fecha_ex">
                                                                                    </div>
                                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                                                                        <label class="floating-label-activo-sm">Examinador</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="profesional" id="profesional">
                                                                                    </div>
                                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                                                                        <label class="floating-label-activo-sm">Derivado por:</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por">
                                                                                    </div>
                                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                                                        <label class="floating-label-activo-sm">Nombre paciente</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="Nombre_pcte" id="Nombre_pcte">
                                                                                    </div>
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                        <label class="floating-label-activo-sm">Edad</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                                                                                    </div>
                                                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                                                        <label class="floating-label-activo-sm">Rut</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="rut" id="rut">
                                                                                    </div>
                                                                                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label class="floating-label-activo-sm">Dirección</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="direccion" id="direccion">
                                                                                    </div>
                                                                                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                                                        <label class="floating-label-activo-sm">Email</label>
                                                                                        <input type="text" class="form-control form-control-sm" name="email" id="email">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                                                        <label class="floating-label-activo-sm">Antecedentes Especialidad</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ant_especialidad" id="ant_especialidad" placeholder="Diagnóstico, sintomatología, uso de audífonos, cirugías examen fisico relevante patologías crónicas, etc."></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>  --}}
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="card-a">
                                                                        <div class="card-header-a" id="ex_equilibrio">
                                                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ex_equilibrio_c" aria-expanded="false" aria-controls="ex_equilibrio_c">
                                                                                Examen del equilibrio
                                                                            </button>
                                                                        </div>
                                                                        <div id="ex_equilibrio_c" class="collapse show" aria-labelledby="ex_equilibrio" data-parent="#ex_equilibrio">
                                                                            <div class="card-body-aten-a">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <!--Equilibrio estático-->
                                                                                        <div class="card-informacion">
                                                                                            <div class="card-body">
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                                                        <h6 class="t-aten">Equilibrio estático</h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="form-group col-md-6">
                                                                                                        <label class="floating-label-activo-sm">Prueba de Romberg</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="romberg" id="romberg">
                                                                                                    </div>
                                                                                                    <div class="form-group col-md-6">
                                                                                                        <label class="floating-label-activo-sm">Prueba de Romberg Sensibilizada</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="romberg_sens" id="romberg_sens">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--Equilibrio cinético-->
                                                                                        <div class="card-informacion">
                                                                                            <div class="card-body">
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                                                        <h6 class="t-aten">Equilibrio Cinético</h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="form-group col-md-3">
                                                                                                        <label class="floating-label-activo-sm">Marcha con ojos abiertos</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="marcha_ojo_ab" id="marcha_ojo_ab">
                                                                                                    </div>
                                                                                                    <div class="form-group col-md-3">
                                                                                                        <label class="floating-label-activo-sm">Prueba de Babinsky-weil </label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="babinsky" id="babinsky">
                                                                                                    </div>
                                                                                                    <div class="form-group col-md-3">
                                                                                                        <label class="floating-label-activo-sm">Prueba de Romberg Barre</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="romberg_barre" id="romberg_barre">
                                                                                                    </div>
                                                                                                    <div class="form-group col-md-3">
                                                                                                        <label class="floating-label-activo-sm">Prueba de Untenberg-Fakuda</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="untenberg_fak" id="untenberg_fak">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--Equilibrio segmentario-->
                                                                                        <div class="card-informacion">
                                                                                            <div class="card-body">
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                                                        <h6 class="t-aten">Equilibrio Segmentário</h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                                        <label class="floating-label-activo-sm">Prueba de la Indicación</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="indicacion" id="indicacion">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--Equilibrio cerebelo-->
                                                                                        <div class="card-informacion">
                                                                                            <div class="card-body">
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                                                        <h6 class="t-aten">Cerebelo</h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="form-group col-md-4">
                                                                                                        <label class="floating-label-activo-sm">Temblor intencional</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="temblor" id="temblor">
                                                                                                    </div>
                                                                                                    <div class="form-group col-md-4">
                                                                                                        <label class="floating-label-activo-sm">Dismetría</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="dismetria" id="dismetria">
                                                                                                    </div>
                                                                                                    <div class="form-group col-md-4">
                                                                                                        <label class="floating-label-activo-sm">Disinergia</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="discinergia" id="discinergia">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="form-group col-md-4">
                                                                                                        <label class="floating-label-activo-sm">Disdiadococinesia</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="disdiadoco" id="disdiadoco">
                                                                                                    </div>
                                                                                                    <div class="form-group col-md-4">
                                                                                                        <label class="floating-label-activo-sm">Hipotonía</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="hipotonia" id="hipotonia">
                                                                                                    </div>
                                                                                                    <div class="form-group col-md-4">
                                                                                                        <label class="floating-label-activo-sm">Otras pruebas</label>
                                                                                                        <input type="text" class="form-control form-control-sm" name="otras_pruebas" id="otras_pruebas">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                                                                        <label class="floating-label-activo-sm">Observaciones a las pruebas de equilibrio</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="observaciones_equilibrio" id="observaciones_equilibrio" placeholder="OBSERVACIONES GENERALES, SINTOMATOLOGIA REACCIONES, ETC."></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--Nistagmo espontáneo-->
                                                                                        <div class="card-informacion">
                                                                                            <div class="card-body">
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                                                        <h6 class="t-aten">Nistagmo espontáneo</h6>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row mb-2">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                                                                                        <table class="rounded" style="border: 1px solid #ced4da; width:100%; padding-bottom: 10px;">
                                                                                                            <tr>
                                                                                                                <td class="text_center" colspan="3">Sin Fijación Ocular</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td></td>
                                                                                                                <td class="text_center">
                                                                                                                    <select id="ng_1" class="ng_esp" size="1" name="ng_1">
                                                                                                                        <option value="1"> p</option>
                                                                                                                        <option value="2"> g</option>
                                                                                                                        <option value="3"> f</option>
                                                                                                                        <option value="4"> i</option>
                                                                                                                        <option value="5"> h</option>
                                                                                                                        <option value="6"> j</option>
                                                                                                                        <option value="7"> k</option>
                                                                                                                        <option value="8"> m</option>
                                                                                                                        <option value="9"> l</option>
                                                                                                                        <option value="10"> n</option>
                                                                                                                    </select>
                                                                                                                </td>
                                                                                                                <td></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <select id="ng_2" class="ng_esp" size="1" name="ng_2">
                                                                                                                        <option value="1"> t</option>
                                                                                                                        <option value="2"> g</option>
                                                                                                                        <option value="3"> f</option>
                                                                                                                        <option value="4"> i</option>
                                                                                                                        <option value="5"> h</option>
                                                                                                                        <option value="6"> j</option>
                                                                                                                        <option value="7"> k</option>
                                                                                                                        <option value="8"> m</option>
                                                                                                                        <option value="9"> l</option>
                                                                                                                        <option value="10"> n</option>
                                                                                                                    </select>
                                                                                                                </td>
                                                                                                                <td class="text_center">
                                                                                                                    <select id="ng_3" class="ng_esp" size="1" name="ng_3">
                                                                                                                        <option value="1"> </option>
                                                                                                                        <option value="2"> g</option>
                                                                                                                        <option value="3"> f</option>
                                                                                                                        <option value="4"> i</option>
                                                                                                                        <option value="5"> h</option>
                                                                                                                        <option value="6"> j</option>
                                                                                                                        <option value="7"> k</option>
                                                                                                                        <option value="8"> m</option>
                                                                                                                        <option value="9"> l</option>
                                                                                                                        <option value="10"> n</option>
                                                                                                                    </select>
                                                                                                                </td>
                                                                                                                <td class="text_left">
                                                                                                                    <select id="ng_4" class="ng_esp" size="1" name="ng_4">
                                                                                                                        <option value="1"> u</option>
                                                                                                                        <option value="2"> g</option>
                                                                                                                        <option value="3"> f</option>
                                                                                                                        <option value="4"> i</option>
                                                                                                                        <option value="5"> h</option>
                                                                                                                        <option value="6"> j</option>
                                                                                                                        <option value="7"> k</option>
                                                                                                                        <option value="8"> m</option>
                                                                                                                        <option value="9"> l</option>
                                                                                                                        <option value="10"> n</option>
                                                                                                                    </select>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td class="text_center">
                                                                                                                    <select id="ng_5" class="ng_esp" size="1" name="ng_5">
                                                                                                                        <option value="1"> q</option>
                                                                                                                        <option value="2"> g</option>
                                                                                                                        <option value="3"> f</option>
                                                                                                                        <option value="4"> i</option>
                                                                                                                        <option value="5"> h</option>
                                                                                                                        <option value="6">j</option>
                                                                                                                        <option value="7"> k</option>
                                                                                                                        <option value="8"> m</option>
                                                                                                                        <option value="9"> l</option>
                                                                                                                        <option value="10"> n</option>
                                                                                                                    </select>
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                                                                                        <table class="pb-2 rounded" style="border: 1px solid  #ced4da; width:100%">
                                                                                                            <tr>
                                                                                                                <td class="text_center" colspan="3">Con fijación Ocular</td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td></td>
                                                                                                                <td class="text_center">
                                                                                                                    <select id="ng_6" class="ng_esp" size="1" name="ng_6">
                                                                                                                        <option value="1"> p</option>
                                                                                                                        <option value="2"> g</option>
                                                                                                                        <option value="3"> f</option>
                                                                                                                        <option value="4"> i</option>
                                                                                                                        <option value="5"> h</option>
                                                                                                                        <option value="6"> j</option>
                                                                                                                        <option value="7"> k</option>
                                                                                                                        <option value="8"> m</option>
                                                                                                                        <option value="9">l</option>
                                                                                                                        <option value="10"> n</option>
                                                                                                                    </select>
                                                                                                                </td>
                                                                                                                <td></td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>
                                                                                                                    <select id="ng_7" class="ng_esp" size="1" name="ng_7">
                                                                                                                       <option value="1">t</option>
                                                                                                                       <option value="2"> g</option>
                                                                                                                       <option value="3"> f</option>
                                                                                                                       <option value="4"> i</option>
                                                                                                                       <option value="5"> h</option>
                                                                                                                       <option value="6"> j</option>
                                                                                                                       <option value="7"> k</option>
                                                                                                                       <option value="8"> m</option>
                                                                                                                       <option value="9"> l</option>
                                                                                                                       <option value="10"> n</option>
                                                                                                                    </select>
                                                                                                                </td>
                                                                                                                <td class="text_center">
                                                                                                                    <select id="ng_8" class="ng_esp" size="1" name="ng_8">
                                                                                                                        <option value="1"> </option>
                                                                                                                        <option value="2"> g</option>
                                                                                                                        <option value="3"> f</option>
                                                                                                                        <option value="4">i</option>
                                                                                                                        <option value="5"> h</option>
                                                                                                                        <option value="6"> j</option>
                                                                                                                        <option value="7"> k</option>
                                                                                                                        <option value="8"> m</option>
                                                                                                                        <option value="9"> l</option>
                                                                                                                        <option value="10"> n</option>
                                                                                                                    </select>
                                                                                                                </td>
                                                                                                                <td class="tib_left">
                                                                                                                    <select id="ng_9" class="ng_esp" size="1" name="ng_9">
                                                                                                                        <option value="1"> u</option>
                                                                                                                        <option value="2"> g</option>
                                                                                                                        <option value="3"> f</option>
                                                                                                                        <option value="4"> i</option>
                                                                                                                        <option value="5"> h</option>
                                                                                                                        <option value="6"> j</option>
                                                                                                                        <option value="7"> k</option>
                                                                                                                        <option value="8"> m</option>
                                                                                                                        <option value="9"> l</option>
                                                                                                                        <option value="10"> n</option>
                                                                                                                    </select>
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr>
                                                                                                                <td>&nbsp;</td>
                                                                                                                <td class="text_center">
                                                                                                                    <select id="ng_10" class="ng_esp" size="1" name="ng_10">
                                                                                                                        <option value="1"> q</option>
                                                                                                                        <option value="2"> g</option>
                                                                                                                        <option value="3"> f</option>
                                                                                                                        <option value="4"> i</option>
                                                                                                                        <option value="5"> h</option>
                                                                                                                        <option value="6"> j</option>
                                                                                                                        <option value="7"> k</option>
                                                                                                                        <option value="8"> m</option>
                                                                                                                        <option value="9"> l</option>
                                                                                                                        <option value="10"> n</option>
                                                                                                                    </select>
                                                                                                                </td>
                                                                                                                <td>&nbsp;</td>
                                                                                                            </tr>
                                                                                                        </table>
                                                                                                    </div>
                                                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                                                                                        <label class="floating-label-activo-sm">Mov. oculares involuntarios y persecución</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="6"  name="mov_oculares" id="mov_oculares" placeholder="Obs. generales, sintomatologia reacciones, etc."></textarea>
                                                                                                    </div>
                                                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                                                                                        <label class="floating-label-activo-sm">Dismetría Ocular</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="6"  name="dismetria_ocular" id="dismetria_ocular" placeholder="Obs. generales, sintomatologia reacciones, etc."></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-row">
                                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                                                                        <label class="floating-label-activo-sm">Comentarios</label>
                                                                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_comentarios" id="obs_comentarios" placeholder="Obs. generales, sintomatologia reacciones, etc."></textarea>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="card-a">
                                                                        <div class="card-header-a" id="ex_ng_provocado">
                                                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ex_ng_provocado_c" aria-expanded="false" aria-controls="ex_ng_provocado_c">
                                                                                NISTAGMO PROVOCADO
                                                                            </button>
                                                                        </div>
                                                                        <div id="ex_ng_provocado_c" class="collapse show" aria-labelledby="ex_ng_provocado" data-parent="#ex_ng_provocado">
                                                                            <div class="card-body-aten-a">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div style="overflow-x:auto;">
                                                                                            <div class="table-responsive">
                                                                                                <table id="tabla_registros_ng" class="table table-striped table-xs table-bordered">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                        <th>POSICIÓN</th>
                                                                                                        <th>DIRECCIÓN</th>
                                                                                                        <th>LATENCIA</th>
                                                                                                        <th>PAROXISMO</th>
                                                                                                        <th>FATIGA</th>
                                                                                                        <th>DURACIÓN</th>
                                                                                                        <th>VÉRTIGO</th>
                                                                                                        <th>NAUSEAS</th>
                                                                                                        <th>VÓMITO</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td>EaS</td>
                                                                                                            <td>
                                                                                                                <select id="EaS" class="ng_esp" size="1" name="EaS" title="EaS">
                                                                                                                    <option value="1"> 0 </option>
                                                                                                                    <option value="2"> g</option>
                                                                                                                    <option value="3"> f</option>
                                                                                                                    <option value="4"> i</option>
                                                                                                                    <option value="5"> h</option>
                                                                                                                    <option value="6"> j</option>
                                                                                                                    <option value="7"> k</option>
                                                                                                                    <option value="8"> m</option>
                                                                                                                    <option value="9"> l</option>
                                                                                                                    <option value="10"> n</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="LatEaS" class="form-control form-control-sm" type="text" name="LatEaS" title="LatEaS" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="e415" class="form-control form-control-sm" size="1" name="par1" title="par1">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="e308" class="form-control form-control-sm" size="1" name="fat1" title="fat1">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="DurEaS" class="form-control form-control-sm" type="text" name="DurEaS" title="DurEaS" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="verEaS" class="form-control form-control-sm" name="verEaS" size="1" title="verEaS">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="NauEaS" class="form-control form-control-sm" name="NauEaS" size="1" title="NAUSEAS">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="VomEaS" class="form-control form-control-sm" name="VomEaS" size="1" title="VOMITOS">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>SaD</td>
                                                                                                            <td>
                                                                                                                <select id="SaD" class="ng_esp" size="1" name="SaD" title="SaD">
                                                                                                                <option value="1"> 0 </option>
                                                                                                                <option value="2"> G</option>
                                                                                                                <option value="3"> F</option>
                                                                                                                <option value="4"> I</option>
                                                                                                                <option value="5"> H</option>
                                                                                                                <option value="6"> J</option>
                                                                                                                <option value="7"> K</option>
                                                                                                                <option value="8"> M</option>
                                                                                                                <option value="9"> L</option>
                                                                                                                <option value="10"> N</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td class="text-center">
                                                                                                                <input id="LatSaD" class="form-control form-control-sm" type="text" name="LatSaD" title="LatSaD" size="9">
                                                                                                            </td>
                                                                                                            <td class="text-center">
                                                                                                                <select id="sad_1" class="form-control form-control-sm" size="1" name="sad_1" title="par2">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td class="text-center">
                                                                                                                <select id="sad_2" class="form-control form-control-sm" size="1" name="sad_2" title="fat2">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="DurSaD" class="form-control form-control-sm" type="text" name="DurSaD" title="DurSaD" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="sad_3" class="form-control form-control-sm" name="sad_3" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="sad_4" class="form-control form-control-sm" name="sad_4" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="sad_5" class="form-control form-control-sm" name="sad_5" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>DaS</td>
                                                                                                            <td>
                                                                                                                <select id="DaS" class="ng_esp" size="1" name="DaS" title="DaS">
                                                                                                                    <option value="1"> 0 </option>
                                                                                                                    <option value="2"> g</option>
                                                                                                                    <option value="3"> f</option>
                                                                                                                    <option value="4"> i</option>
                                                                                                                    <option value="5"> h</option>
                                                                                                                    <option value="6"> j</option>
                                                                                                                    <option value="7"> k</option>
                                                                                                                    <option value="8"> m</option>
                                                                                                                    <option value="9"> l</option>
                                                                                                                    <option value="10"> n</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="LatDaS" class="form-control form-control-sm" type="text" name="LatDaS" title="LatDaS" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="DaS_1" class="form-control form-control-sm" size="1" name="DaS_1" title="par3">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="DaS_2" class="form-control form-control-sm" size="1" name="DaS_2" title="fat3">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="DurDaS" class="form-control form-control-sm" type="text" name="DurDaS" title="DurDaS" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="DaS_3" class="form-control form-control-sm" name="DaS_3" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="DaS_4" class="form-control form-control-sm" name="DaS_4" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="DaS_5" class="form-control form-control-sm" name="DaS_5" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>SaL</td>
                                                                                                            <td>
                                                                                                                <select id="SaL" class="ng_esp" size="1" name="SaL" title="SaL">
                                                                                                                    <option value="1"> 0 </option>
                                                                                                                    <option value="2"> g</option>
                                                                                                                    <option value="3"> f</option>
                                                                                                                    <option value="4"> i</option>
                                                                                                                    <option value="5"> h</option>
                                                                                                                    <option value="6"> j</option>
                                                                                                                    <option value="7"> k</option>
                                                                                                                    <option value="8"> m</option>
                                                                                                                    <option value="9"> l</option>
                                                                                                                    <option value="10"> n</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="LatSal" class="form-control form-control-sm" type="text" name="LatSal" title="LatSal" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="SaL_1" class="form-control form-control-sm" size="1" name="SaL_1" title="par4">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="SaL_2" class="form-control form-control-sm" size="1" name="SaL_2" title="fat4">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="DurSal" class="form-control form-control-sm" type="text" name="DurSal" title="DurSal" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="SaL_3" class="form-control form-control-sm" name="SaL_3" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select></td>
                                                                                                            <td>
                                                                                                                <select id="SaL_4" class="form-control form-control-sm" name="SaL_4" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="SaL_5" class="form-control form-control-sm" name="SaL_5" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td> LaS</td>
                                                                                                            <td>
                                                                                                                <select id="LaS" class="ng_esp" size="1" name="LaS" title="LaS">
                                                                                                                    <option value="1"> 0 </option>
                                                                                                                    <option value="2"> g</option>
                                                                                                                    <option value="3"> f</option>
                                                                                                                    <option value="4"> i</option>
                                                                                                                    <option value="5"> h</option>
                                                                                                                    <option value="6"> j</option>
                                                                                                                    <option value="7"> k</option>
                                                                                                                    <option value="8"> m</option>
                                                                                                                    <option value="9"> l</option>
                                                                                                                    <option value="10"> n</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="LatLas" class="form-control form-control-sm" type="text" name="LatLas" title="LatLas" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="LaS_1" class="form-control form-control-sm" size="1" name="LaS_1" title="par5">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="LaS_2" class="form-control form-control-sm" size="1" name="LaS_2" title="fat5">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="DurLaS" class="form-control form-control-sm" type="text" name="DurLaS" title="DurLaS" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="LaS_3" class="form-control form-control-sm" name="LaS_3" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="LaS_4" class="form-control form-control-sm" name="LaS_4" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="LaS_5" class="form-control form-control-sm" name="LaS_5" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                SaE
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="SaE" class="ng_esp" size="1" name="SaE" title="SaE">
                                                                                                                    <option value="1"> 0 </option>
                                                                                                                    <option value="2"> g</option>
                                                                                                                    <option value="3"> f</option>
                                                                                                                    <option value="4">i</option>
                                                                                                                    <option value="5"> h</option>
                                                                                                                    <option value="6"> j</option>
                                                                                                                    <option value="7"> k</option>
                                                                                                                    <option value="8"> m</option>
                                                                                                                    <option value="9"> l</option>
                                                                                                                    <option value="10"> n</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="LatSaE" class="form-control form-control-sm" type="text" name="LatSaE" title="LatSaE" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="SaE_1" class="form-control form-control-sm" size="1" name="SaE_1" title="par6">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="SaE_2" class="form-control form-control-sm" size="1" name="SaE_2" title="fat6">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="DurSaE" class="form-control form-control-sm" type="text" name="DurSaE" title="DurSaE" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="SaE_3" class="form-control form-control-sm" name="SaE_3" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="SaE_4" class="form-control form-control-sm" name="SaE_4" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="SaE_5" class="form-control form-control-sm" name="SaE_5" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                EaCC
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCC" class="ng_esp" size="1" name="EaCC" title="EaCC">
                                                                                                                    <option value="1"> 0 </option>
                                                                                                                    <option value="2"> g</option>
                                                                                                                    <option value="3"> f</option>
                                                                                                                    <option value="4"> i</option>
                                                                                                                    <option value="5"> h</option>
                                                                                                                    <option value="6"> j</option>
                                                                                                                    <option value="7"> k</option>
                                                                                                                    <option value="8"> m</option>
                                                                                                                    <option value="9"> l</option>
                                                                                                                    <option value="10"> n</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="LatEaCC" class="form-control form-control-sm" type="text" name="LatEaCC" title="LatEaCC" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCC_1" class="form-control form-control-sm" size="1" name="EaCC_1" title="par7">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCC_2" class="form-control form-control-sm" size="1" name="EaCC_2" title="fat7">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="DurEaCC" class="form-control form-control-sm" type="text" name="DurEaCC" title="DurEaCC" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCC_3" class="form-control form-control-sm" name="EaCC_3" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCC_4" class="form-control form-control-sm" name="EaCC_4" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCC_5" class="form-control form-control-sm" name="EaCC_5" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                CCaE
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCaE" class="ng_esp" size="1" name="CCaE" title="CCaE">
                                                                                                                    <option value="1"> 0 </option>
                                                                                                                    <option value="2"> g</option>
                                                                                                                    <option value="3"> f</option>
                                                                                                                    <option value="4"> i</option>
                                                                                                                    <option value="5"> h</option>
                                                                                                                    <option value="6"> j</option>
                                                                                                                    <option value="7"> k</option>
                                                                                                                    <option value="8"> m</option>
                                                                                                                    <option value="9"> l</option>
                                                                                                                    <option value="10"> n</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="LatCCaE" class="form-control form-control-sm" type="text" name="LatCCaE" title="LatCCaE" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCaE_1" class="form-control form-control-sm" size="1" name="CCaE_1" title="par8">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCaE_2" class="form-control form-control-sm" size="1" name="CCaE_2" title="fat8">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="DurCCaE" class="form-control form-control-sm" type="text" name="DurCCaE" title="DurCCaE" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCaE_3" class="form-control form-control-sm" name="CCaE_3" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCaE_4" class="form-control form-control-sm" name="CCaE_4" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCaE_5" class="form-control form-control-sm" name="CCaE_5" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                EaCCd
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCCd" class="ng_esp" size="1" name="EaCCd" title="EaCCd">
                                                                                                                    <option value="1"> 0 </option>
                                                                                                                    <option value="2"> g</option>
                                                                                                                    <option value="3"> f</option>
                                                                                                                    <option value="4"> i</option>
                                                                                                                    <option value="5"> h</option>
                                                                                                                    <option value="6"> j</option>
                                                                                                                    <option value="7"> k</option>
                                                                                                                    <option value="8"> m</option>
                                                                                                                    <option value="9"> l</option>
                                                                                                                    <option value="10"> n</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="LatEaCCd" class="form-control form-control-sm" type="text" name="LatEaCCd" title="LatEaCCd" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCCd_1" class="form-control form-control-sm" size="1" name="EaCCd_1" title="par9">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCCd_2" class="form-control form-control-sm" size="1" name="EaCCd_2" title="fat9">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="DurEaCCd" class="form-control form-control-sm" type="text" name="DurEaCCd" title="DurEaCCd" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCCd_3" class="form-control form-control-sm" name="EaCCd_3" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCCd_4" class="form-control form-control-sm" name="EaCCd_4" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCCd_5" class="form-control form-control-sm" name="EaCCd_55" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                CCdaE
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCdaE" class="ng_esp" size="1" name="CCdaE" title="CCdaE">
                                                                                                                    <option value="1"> 0 </option>
                                                                                                                    <option value="2"> g</option>
                                                                                                                    <option value="3"> f</option>
                                                                                                                    <option value="4"> i</option>
                                                                                                                    <option value="5"> h</option>
                                                                                                                    <option value="6"> j</option>
                                                                                                                    <option value="7"> k</option>
                                                                                                                    <option value="8"> m</option>
                                                                                                                    <option value="9"> l</option>
                                                                                                                    <option value="10"> n</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="LatCCdaE" class="form-control form-control-sm" type="text" name="LatCCdaE" title="LatCCdaE" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCdaE_1" class="form-control form-control-sm" size="1" name="CCdaE_1" title="par10">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCdaE_2" class="form-control form-control-sm" size="1" name="CCdaE_2" title="fat10">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="DurCCdaE" class="form-control form-control-sm" type="text" name="DurCCdaE" title="DurCCdaE" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCdaE_3" class="form-control form-control-sm" name="CCdaE_3" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCdaE_4" class="form-control form-control-sm" name="CCdaE_42" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCdaE_5" class="form-control form-control-sm" name="CCdaE_5" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>
                                                                                                                EaCCi</td>
                                                                                                            <td>
                                                                                                                <select id="EaCCi" class="ng_esp" size="1" name="EaCCi" title="EaCCi">
                                                                                                                    <option value="1"> 0 </option>
                                                                                                                    <option value="2"> g</option>
                                                                                                                    <option value="3"> f</option>
                                                                                                                    <option value="4"> i</option>
                                                                                                                    <option value="5"> h</option>
                                                                                                                    <option value="6"> j</option>
                                                                                                                    <option value="7"> k</option>
                                                                                                                    <option value="8"> m</option>
                                                                                                                    <option value="9"> l</option>
                                                                                                                    <option value="10"> n</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="LatEaCCi" class="form-control form-control-sm" type="text" name="LatEaCCi" title="LatEaCCi" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCCi_1" class="form-control form-control-sm" size="1" name="EaCCi_1" title="par11">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCCi_2" class="form-control form-control-sm" size="1" name="EaCCi_2" title="fat11">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="DurEaCCi" class="form-control form-control-sm" type="text" name="DurEaCCi" title="DurEaCCi" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCCi_3" class="form-control form-control-sm" name="EaCCi_3" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCCi_4" class="form-control form-control-sm" name="EaCCi_4" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="EaCCi_5" class="form-control form-control-sm" name="EaCCi_5" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td>CCiaE</td>
                                                                                                            <td>
                                                                                                                <select id="CCiaE" class="ng_esp" size="1" name="CCiaE" title="CCiaE">
                                                                                                                    <option value="1"> 0 </option>
                                                                                                                    <option value="2"> g</option>
                                                                                                                    <option value="3"> f</option>
                                                                                                                    <option value="4"> i</option>
                                                                                                                    <option value="5"> h</option>
                                                                                                                    <option value="6"> j</option>
                                                                                                                    <option value="7"> k</option>
                                                                                                                    <option value="8"> m</option>
                                                                                                                    <option value="9"> l</option>
                                                                                                                    <option value="10"> n</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="LatCCiaE" class="form-control form-control-sm" type="text" name="LatCCiaE" title="LatCCiaE" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCiaE_1" class="form-control form-control-sm" size="1" name="CCiaE_1" title="par12">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCiaE_2" class="form-control form-control-sm" size="1" name="CCiaE_2" title="fat12">
                                                                                                                    <option value="1"> Si</option>
                                                                                                                    <option selected value="2"> No</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <input id="DurCCiaE" class="form-control form-control-sm" type="text" name="DurCCiaE" title="DurCCiaE" size="9">
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCiaE_3" class="form-control form-control-sm" name="CCiaE_3" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCiaE_4" class="form-control form-control-sm" name="CCiaE_4" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <select id="CCiaE_5" class="form-control form-control-sm" name="CCiaE_5" size="1" title="VOM">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                    <div class="card-a">
                                                                        <div class="card-header-a" id="ex_p_calorica">
                                                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ex_p_calorica_c" aria-expanded="false" aria-controls="ex_p_calorica_c">
                                                                                PRUEBA CALÓRICA
                                                                            </button>
                                                                        </div>
                                                                        <div id="ex_p_calorica_c" class="collapse show" aria-labelledby="ex_p_calorica" data-parent="#ex_p_calorica">
                                                                            <div class="card-body-aten-a">
                                                                                <div class="row">
                                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                        <div style="overflow-x:auto;">
                                                                                            <div class="table-responsive">
                                                                                                <table id="tabla_registros_pc" class="display table table-striped  table-bordered dt-responsive nowrap table-xs">
                                                                                                    <thead>
                                                                                                        <tr>
                                                                                                          <th scope="col"></th>
                                                                                                          <th scope="col">DURACIÓN</th>
                                                                                                          <th scope="col">FRECUENCIA</th>
                                                                                                          <th scope="col">AMPLITUD</th>
                                                                                                          <th scope="col">VÉRTIGO</th>
                                                                                                          <th scope="col">NAUSEAS</th>
                                                                                                          <th scope="col">VÓMITO</th>
                                                                                                          <th scope="col">VCL</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td class="text-c-blue font-weight-bold">
                                                                                                                OI a 30°C
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="DUR_30OI" class="form-control form-control-sm text-c-blue" type="text" name="DUR_30OI" title="OIa30°C" size="9" style="color: #1a49a3;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="FR_30OI" class="form-control form-control-sm"  type="text" name="FR_30OI" title="Nombre" size="9" style="color: #1a49a3;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="AM_30OI" class="form-control form-control-sm" type="text" name="AM_30OI" title="Nombre" size="9" style="color: #1a49a3;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <select id="30OI_1" class="form-control form-control-sm"  name="30OI_1" size="1" title="VERT" style="color: #1a49a3;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <select id="30OI_2" class="form-control form-control-sm" name="30OI_2" size="1" title="NAUSEAS" style="color: #1a49a3;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <select id="30OI_3" class="form-control form-control-sm"  name="30OI_3" size="1" title="VOM" style="color: #1a49a3;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="VCL_30OI" class="form-control form-control-sm"  type="text" name="VCL_30OI" title="VCL" size="9" style="color: #1a49a3;">
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td class="text-danger font-weight-bold">
                                                                                                                OD a 30°C
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="DUR_30OD" class="form-control form-control-sm"  type="text" name="DUR_30OD"  size="9"style="color: #FF0000;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="FR_30OD" class="form-control form-control-sm"  type="text" name="FR_30OD"  size="9"style="color: #FF0000;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="AM_30OD" class="form-control form-control-sm"  type="text" name="AM_30OD"  size="9"style="color: #FF0000;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <select id="30OD_1" class="form-control form-control-sm"   name="30OD_1" size="1" style="color: #FF0000;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <select id="30OD_2" class="form-control form-control-sm" name="30OD_2" size="1" style="color: #FF0000;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <select id="30OD_3" class="form-control form-control-sm" name="30OD_3" size="1" style="color: #FF0000;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="VCL_30OD"class="form-control form-control-sm"type="text" name="VCL_30OD"  size="9"style="color: #FF0000;">
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td class="text-c-blue font-weight-bold">
                                                                                                                OI a 44°C
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="DUR_44OI"class="form-control form-control-sm"type="text" name="DUR_44OI"  size="9" style="color: #1a49a3;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="FR_44OI"class="form-control form-control-sm"type="text" name="FR_44OI"  size="9" style="color: #1a49a3;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="AM_44OI"class="form-control form-control-sm"type="text" name="AM_44OI"  size="9" style="color: #1a49a3;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <select id="44OI_1" class="form-control form-control-sm"name="44OI_1" size="1"  style="color: #1a49a3;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select></td>
                                                                                                            <td class="#">
                                                                                                                <select id="44OI_2" class="form-control form-control-sm" name="44OI_2" size="1"  style="color: #1a49a3;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <select id="44OI_3" class="form-control form-control-sm" name="44OI_3" size="1" style="color: #1a49a3;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="VCL_44OI"class="form-control form-control-sm"type="text" name="VCL_44OI" t size="9" style="color: #1a49a3;">
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td class="text-danger font-weight-bold">
                                                                                                                OD a 44°C</td>
                                                                                                            <td class="#">
                                                                                                                <input id="DUR_44OD" class="form-control form-control-sm" type="text" name="DUR_44OD"  size="9"style="color: #FF0000;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="FR_44OD" class="form-control form-control-sm" type="text" name="FR_44OD"  size="9"style="color: #FF0000;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="AM_44OD" class="form-control form-control-sm" type="text" name="AM_44OD"  size="9"style="color: #FF0000;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <select id="44OD_1" class="form-control form-control-sm"  name="44OD_1" size="1" style="color: #FF0000;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select></td>
                                                                                                            <td class="#">
                                                                                                                <select id="44OD_2" class="form-control form-control-sm"  name="44OD_2" size="1" style="color: #FF0000;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select></td>
                                                                                                            <td class="#">
                                                                                                                <select id="44OD_3" class="form-control form-control-sm"  name="44OD_3" size="1"  style="color: #FF0000;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select></td>
                                                                                                            <td class="#">
                                                                                                                <input id="VCL_44OD" class="form-control form-control-sm" type="text" name="VCL_44OD"  size="9"style="color: #FF0000;">
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td class="text-c-blue font-weight-bold">
                                                                                                                OI a 18°C</td>
                                                                                                            <td class="#">
                                                                                                                <input id="DUR_18OI" class="form-control form-control-sm" type="text" name="DUR_18OI"  size="9" style="color: #1a49a3;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="FR_18OI" class="form-control form-control-sm" type="text" name="FR_18OI"  size="9" style="color: #1a49a3;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="AM_18OI" class="form-control form-control-sm" type="text" name="AM_18OI" size="9" style="color: #1a49a3;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <select id="18OI_1" class="form-control form-control-sm" name="18OI_1" size="1"  style="color: #1a49a3;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select></td>
                                                                                                            <td class="#">
                                                                                                                <select id="18OI_2" class="form-control form-control-sm" name="18OI_2" size="1" style="color: #1a49a3;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <select id="18OI_3" class="form-control form-control-sm" name="18OI_3" size="1"  style="color: #1a49a3;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="VCL_18OI"class="form-control form-control-sm"type="text" name="VCL_18OI" size="9" style="color:#1a49a3;">
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td class="text-danger font-weight-bold">
                                                                                                                OD a 18°C</td>
                                                                                                            <td class="#">
                                                                                                                <input id="DUR_18OD"class="form-control form-control-sm"type="text" name="DUR_18OD"  size="9"style="color: #FF0000;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="FR_18OD"class="form-control form-control-sm"type="text" name="FR_18OD"  size="9"style="color: #FF0000;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="AM_18OD"class="form-control form-control-sm"type="text" name="AM_18OD"  size="9"style="color: #FF0000;">
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <select id="18OD_1" class="form-control form-control-sm" name="18OD_1" size="1" style="color: #FF0000;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <select id="18OD_2" class="form-control form-control-sm" name="18OD_2" size="1" style="color: #FF0000;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <select id="18OD_3" class="form-control form-control-sm"name="18OD_3" size="1" style="color: #FF0000;">
                                                                                                                    <option value="1">+</option>
                                                                                                                    <option value="2">++</option>
                                                                                                                    <option selected value="3">0</option>
                                                                                                                </select>
                                                                                                            </td>
                                                                                                            <td class="#">
                                                                                                                <input id="VCL_18OD"class="form-control form-control-sm"type="text" name="VCL_18OD"  size="9"style="color: #FF0000;">
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                                                        <label class="floating-label-activo-sm">Comentarios</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="comentarios_pc" id="comentarios_pc" placeholder="Observaciones generales, sintomatologia reacciones, etc."></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-row">
                                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                                                        <label class="floating-label-activo-sm">Conclusiones Examen</label>
                                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="concluciones_examen" id="concluciones_examen" placeholder="Observaciones generales, sintomatologia reacciones, etc."></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- cierre hospitalizacion -->

                                            <!-- ges -->
                                            {{--  @include('general.secciones_ficha.seccion_cronicos_ges_confidencial')  --}}
                                            <!-- cierre ges -->

                                            <hr>

                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-a">
                                                    <div class="card-header-a " id="diagnostico">
                                                        <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico_c" aria-expanded="false" aria-controls="diagnostico_c">
                                                            Subir Examenes
                                                        </button>
                                                    </div>
                                                    <div id="diagnostico_c" class="collapse show" aria-labelledby="diagnostico" data-parent="#diagnostico">
                                                        <div class="card-body-aten-a  shadow-none">
                                                            <div class="form-row">
                                                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">


                                                                    <div class="jumbotron text-center" style="padding: 2rem 2rem;">
                                                                      <h5>Cargar  Exámenes de Paciente </h5>
                                                                    </div>

                                                                    <div class="container">
                                                                        <form id="submitForm">
                                                                            <div class="row">
                                                                                  <div class="col-md-6">
                                                                                      <div class="input-group">
                                                                                          <div class="custom-file mb-3">
                                                                                            <input type="file" class="custom-file-input" name="multipleFile[]" id="multipleFile" required="" multiple>
                                                                                            <label class="custom-file-label" for="multipleFile">Elija los exámenes a cargar</label>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>
                                                                                  <div class="col-md-2">
                                                                                  <button type="submit" name="upload" class="btn btn-primary">Cargar Archivos</button>
                                                                                  </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="alert alert-success alert-dismissible" id="success" style="display: none;">
                                                                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                                                        Los Exámenes  se han cargado correctamente
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                      <!-- view of uploaded images -->
                                                                    <div class="container" id="gallery"></div>

                                                                    <!--Edit Multiple image form -->
                                                                    <div class='modal' id='exampleModal'>
                                                                        <div class='modal-dialog'>
                                                                            <div class='modal-content'>
                                                                                <div class='modal-header'>
                                                                                  <h4 class='modal-title'>Actualizar imagen</h4>
                                                                                  <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                                                </div>
                                                                                <div id="editForm">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <iframe class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12" >
                                                                            <div style="widh:100%"></div>
                                                                           </iframe>
                                                                    </div>



                                                                    <script type="text/javascript">
                                                                        $(document).ready(function(){
                                                                            $("#submitForm").on("submit", function(e){
                                                                            e.preventDefault();
                                                                            $.ajax({
                                                                              url  :"upload.php",
                                                                              type :"POST",
                                                                              cache:false,
                                                                              contentType : false, // you can also use multipart/form-data replace of false
                                                                              processData : false,
                                                                              data: new FormData(this),
                                                                              success:function(response){
                                                                                $("#success").show();
                                                                                $("#multipleFile").val("");
                                                                                fetchData();
                                                                              }
                                                                            });
                                                                            });

                                                                          // Fetch Data from Database
                                                                          function fetchData(){
                                                                            $.ajax({
                                                                              url  : "fetch_data.php",
                                                                              type : "POST",
                                                                              cache: false,
                                                                              success:function(data){
                                                                                $("#gallery").html(data);
                                                                              }
                                                                            });
                                                                          }
                                                                          fetchData();

                                                                          // Edit Data from Database
                                                                          $(document).on("click",".btn-success", function(){
                                                                            var editId = $(this).data('id');
                                                                            $.ajax({
                                                                              url : "edit.php",
                                                                              type : "POST",
                                                                              cache: false,
                                                                              data : {editId:editId},
                                                                              success:function(data){
                                                                                $("#editForm").html(data);
                                                                              }
                                                                            });
                                                                          });

                                                                          // Delete Data from database

                                                                          $(document).on('click','.delete-btn', function(){
                                                                            var deleteId = $(this).data('id');
                                                                            if (confirm("¿Está seguro de que desea eliminar esta imagen?")) {
                                                                              $.ajax({
                                                                                url  : "delete.php",
                                                                                type : "POST",
                                                                                cache:false,
                                                                                data:{deleteId:deleteId},
                                                                                success:function(data){
                                                                                    $("#success").show();
                                                                                  fetchData();
                                                                                  //alert("La imagen eliminada correctamente");
                                                                                }
                                                                              });
                                                                            }
                                                                          });

                                                                          // Update Data from database
                                                                          $(document).on("submit", "#editForm", function(e){
                                                                          e.preventDefault();
                                                                          var formData = new FormData(this);
                                                                          $.ajax({
                                                                              url  : "update.php",
                                                                              type : "POST",
                                                                              cache: false,
                                                                              contentType : false, // you can also use multipart/form-data replace of false
                                                                              processData : false,
                                                                              data: formData,
                                                                              success:function(response){
                                                                                $("#exampleModal").modal('hide');
                                                                                alert("Imagen actualizada correctamente");
                                                                                fetchData();
                                                                              }
                                                                            });
                                                                          });
                                                                        });

                                                                    </script>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!--GUARDAR O IMPRIMIR FICHA-->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-info-light-c mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Atención y Finalizar sus exámenes">
                                <input type="submit" class="btn btn-success-light-c mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar atención e ir a su Agenda">
                            </div>
                        </div>
                    </div>
                    <!--CIERRE: ATENCIÓN ESPECIALIDAD GENERAL-->
                </form>
            </div>
        </div>
    </div>
</div>
<!--CIERRE: FICHA ATENCION GENERAL-->

@section('page-script-ficha-atencion')
    <script>
         /** MENSAJE*/
        /** CARGAR mensaje */
        $('#mensaje_ficha').html('<strong>Solo el campo Hipótesis diagnóstica es obligatorio el resto es opcional</strong>');
        $('#mensaje_ficha').show();
        setTimeout(function(){
            $('#mensaje_ficha').hide();
        }, 5000);

        $(document).ready(function() {
            $("#descripcion_cie").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });
        });

        function cargarIgual(input){

            let actual = $('#'+input);
            let equivalentes = $('#'+input).attr('data-input_igual').split(',');
            $.each(equivalentes, function( index, value ) {
                var equivalente = $('#'+value);
                equivalente.val(actual.val());
            });
            {{--
            let actual = $('#'+input);
            let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

            equivalente.val(actual.val());
            --}}
        }


        function evaluar_para_carga_detalle(select, div, input, valor)
        {
            var valor_select = $('#'+select+'').val();
            if(valor_select == valor) $('#'+div+'').show();
            else {
                $('#'+div+'').hide();
                $('#'+input+'').val('');
            }
        }

    </script>
@endsection
