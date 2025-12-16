@extends('template.otros_profesionales.template_fono')

@section('page-style')
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
@endsection

@section('Content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center pb-2">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN FONOAUDIOLÓGICA</strong></h5>
                                <p class="font-italic mt-0 mb-0 text-white">
                                    @php
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        $fecha = \Carbon\Carbon::parse(now());
                                        $mes = $meses[($fecha->format('n')) - 1];
                                        $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                    @endphp
                                    {{ $fecha }}
                                </p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            {{--  <div class="page-header-title">
                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-md-right mr-4 mb-1">Finalizar atención</button>
                            </div>  --}}
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!-- TAB ATENCIÓN -->
            <div class="user-profile user-card pt-0">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab" href="#atender" role="tab" aria-controls="atender" aria-selected="true">Atender paciente</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu" role="tab" aria-controls="fmu" aria-selected="false">FMU</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de consultas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="hospitalizacion-tab" data-toggle="tab" href="#hospitalizacion" role="tab" aria-controls="Paciente hospitalizado" aria-selected="false">Hospitalización</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tab general-->
            <!--Contenido de tab-->
            <form action="{{ route('ficha.otro.prof.registrar_octavo_par') }}" method="POST">
                <input type="hidden" name="id_fc" value="{{ $id_ficha_atencion }}" id="id_fc">
                <input type="hidden" name="hora_medica" id="hora_medica" value="{{ $hora_medica->id }}">
                <input type="hidden" name="id_examen" value="{{ $id_ficha_atencion }}" id="id_examen">
                <input type="hidden" name="id_paciente_fc" value="{{ $paciente->id }}" id="id_paciente_fc">
                <input type="hidden" name="id_profesional_fc" value="{{ $profesional->id }}" id="id_profesional_fc">
                <input type="hidden" name="id_lugar_atencion" id="id_lugar_atencion" value="{{ $id_lugar_atencion }}">
                <input type="hidden" name="cerrarsession" id="cerrarsession" value="0">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="at-oftalmo">
                            <!--Atender paciente-->
                            <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                                <!--INFORME EXAMEN DEL 8° PAR CRANEANO-->
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="f-18 text-c-blue mb-2">Informe examen del 8° par craneano</h6>
                                    </div>
                                </div>
                                <div class="row div_form_examen_ocho_par">
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
                                                            <input type="date" class="form-control form-control-sm" name="fecha_ex" id="fecha_ex" value="{{ date('Y-m-d') }}" readonly>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                            <label class="floating-label-activo-sm">Examinador</label>
                                                            <input type="text" class="form-control form-control-sm" name="profesional" id="profesional" value="Dr. {{ $profesional->apellido_uno }}" readonly>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-7 col-xl-7">
                                                            {{-- <label class="floating-label-activo-sm">Derivado por:</label> --}}
                                                            {{-- <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value=""> --}}
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <input type="hidden" name="solicitado_id_profesional_oct_par" id="solicitado_id_profesional_oct_par" value="">
                                                                    <label class="floating-label-activo-sm">Derivado por RUT:</label>
                                                                    <input type="text" class="form-control form-control-sm" name="derivado_por_rut" id="derivado_por_rut" value=""
                                                                        onblur="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional_oct_par', 'div_profesional_no_inscrito');"
                                                                        onkeyup="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional_oct_par', 'div_profesional_no_inscrito');"
                                                                        oninput="formatoRut(this);"
                                                                    >

                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="floating-label-activo-sm">Nombre:</label>
                                                                    <input type="text" class="form-control form-control-sm" name="derivado_por" id="derivado_por" value="">
                                                                </div>
                                                                <div class="form-group col-md-12" id="div_mensaje"  style="display: none;">
                                                                    <span style="font-size: 10px;color: #ff0808;" id="mensaje_solicitado_por"></span>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-3" id="div_profesional_no_inscrito" style="display: none;">

                                                                <div class="form-group col-md-3">
                                                                    <label class="floating-label-activo-sm">Nombre</label>
                                                                    <input type="text" class="form-control form-control-sm"  name="solicitado_nombre_oct_par" id="solicitado_nombre_oct_par" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre_oct_par', 'solicitado_apellido_oct_par');">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label class="floating-label-activo-sm">Apellido</label>
                                                                    <input type="text" class="form-control form-control-sm"  name="solicitado_apellido_oct_par" id="solicitado_apellido_oct_par" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre_oct_par', 'solicitado_apellido_oct_par');">
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label class="floating-label-activo-sm">Telefono</label>
                                                                    <input type="text" class="form-control form-control-sm"  name="solicitado_telefono_oct_par" id="solicitado_telefono_oct_par" >
                                                                </div>
                                                                <div class="form-group col-md-3">
                                                                    <label class="floating-label-activo-sm">Email</label>
                                                                    <input type="text" class="form-control form-control-sm"  name="solicitado_email_oct_par" id="solicitado_email_oct_par" >
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Nombre paciente</label>
                                                            <input type="text" class="form-control form-control-sm" name="nombre_pcte" id="nombre_pcte" value="{{ $paciente->nombres.' '.$paciente->apellido_uno.' '.$paciente->apellido_dos }}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Edad</label>
                                                            <input type="text" class="form-control form-control-sm" name="edad" id="edad" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->age }}" readonly>
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                            <label class="floating-label-activo-sm">Rut</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut" id="rut" value="{{ $paciente->rut }}">
                                                        </div>
                                                        <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Dirección</label>
                                                            <input type="text" class="form-control form-control-sm" name="direccion" id="direccion"
                                                            @if (isset($paciente))
                                                                @if ($paciente->Direccion()->first() != null)
                                                                    value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}"
                                                                @else
                                                                    value="NO HA REGISTRADO DIRECCIÓN !"
                                                                @endif
                                                            @else
                                                                value="NO HA REGISTRADO DIRECCIÓN !"
                                                            @endif
                                                             readonly>
                                                        </div>
                                                        <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Email</label>
                                                            <input type="text" class="form-control form-control-sm" name="email" id="email" value="{{ $paciente->email }}" readonly>
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
                                                                                    <select id="par1" class="form-control form-control-sm" size="1" name="par1" title="par1">
                                                                                        <option value="1"> Si</option>
                                                                                        <option selected value="2"> No</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <select id="fat1" class="form-control form-control-sm" size="1" name="fat1" title="fat1">
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
                                                                                    <input id="DUR_IO30" class="form-control form-control-sm text-c-blue" type="text" name="DUR_IO30" title="OIa30°C" size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="FR_IO30" class="form-control form-control-sm"  type="text" name="FR_IO30" title="Nombre" size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="AM_IO30" class="form-control form-control-sm" type="text" name="AM_IO30" title="Nombre" size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="IO30_1" class="form-control form-control-sm"  name="IO30_1" size="1" title="VERT" style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="IO30_2" class="form-control form-control-sm" name="IO30_2" size="1" title="NAUSEAS" style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="IO30_3" class="form-control form-control-sm"  name="IO30_3" size="1" title="VOM" style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="VCL_IO30" class="form-control form-control-sm"  type="text" name="VCL_IO30" title="VCL" size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-danger font-weight-bold">
                                                                                    OD a 30°C
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="DUR_OD30" class="form-control form-control-sm"  type="text" name="DUR_OD30"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="FR_OD30" class="form-control form-control-sm"  type="text" name="FR_OD30"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="AM_OD30" class="form-control form-control-sm"  type="text" name="AM_OD30"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="OD30_1" class="form-control form-control-sm"   name="OD30_1" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="OD30_2" class="form-control form-control-sm" name="OD30_2" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="OD30_3" class="form-control form-control-sm" name="OD30_3" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="VCL_OD30"class="form-control form-control-sm"type="text" name="VCL_OD30"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-c-blue font-weight-bold">
                                                                                    OI a 44°C
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="DUR_IO44"class="form-control form-control-sm"type="text" name="DUR_IO44"  size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="FR_IO44"class="form-control form-control-sm"type="text" name="FR_IO44"  size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="AM_IO44"class="form-control form-control-sm"type="text" name="AM_IO44"  size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="IO44_1" class="form-control form-control-sm"name="IO44_1" size="1"  style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select></td>
                                                                                <td class="#">
                                                                                    <select id="IO44_2" class="form-control form-control-sm" name="IO44_2" size="1"  style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="IO44_3" class="form-control form-control-sm" name="IO44_3" size="1" style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="VCL_IO44"class="form-control form-control-sm"type="text" name="VCL_IO44" t size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-danger font-weight-bold">
                                                                                    OD a 44°C</td>
                                                                                <td class="#">
                                                                                    <input id="DUR_OD44" class="form-control form-control-sm" type="text" name="DUR_OD44"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="FR_OD44" class="form-control form-control-sm" type="text" name="FR_OD44"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="AM_OD44" class="form-control form-control-sm" type="text" name="AM_OD44"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="OD44_1" class="form-control form-control-sm"  name="OD44_1" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select></td>
                                                                                <td class="#">
                                                                                    <select id="OD44_2" class="form-control form-control-sm"  name="OD44_2" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select></td>
                                                                                <td class="#">
                                                                                    <select id="OD44_3" class="form-control form-control-sm"  name="OD44_3" size="1"  style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select></td>
                                                                                <td class="#">
                                                                                    <input id="VCL_OD44" class="form-control form-control-sm" type="text" name="VCL_OD44"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-c-blue font-weight-bold">
                                                                                    OI a 18°C</td>
                                                                                <td class="#">
                                                                                    <input id="DUR_OI18" class="form-control form-control-sm" type="text" name="DUR_OI18"  size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="FR_OI18" class="form-control form-control-sm" type="text" name="FR_OI18"  size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="AM_OI18" class="form-control form-control-sm" type="text" name="AM_OI18" size="9" style="color: #1a49a3;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="OI18_1" class="form-control form-control-sm" name="OI18_1" size="1"  style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select></td>
                                                                                <td class="#">
                                                                                    <select id="OI18_2" class="form-control form-control-sm" name="OI18_2" size="1" style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="OI18_3" class="form-control form-control-sm" name="OI18_3" size="1"  style="color: #1a49a3;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="VCL_OI18"class="form-control form-control-sm"type="text" name="VCL_OI18" size="9" style="color:#1a49a3;">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="text-danger font-weight-bold">
                                                                                    OD a 18°C</td>
                                                                                <td class="#">
                                                                                    <input id="DUR_OD18"class="form-control form-control-sm"type="text" name="DUR_OD18"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="FR_OD18"class="form-control form-control-sm"type="text" name="FR_OD18"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="AM_OD18"class="form-control form-control-sm"type="text" name="AM_OD18"  size="9"style="color: #FF0000;">
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="OD18_1" class="form-control form-control-sm" name="OD18_1" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="OD18_2" class="form-control form-control-sm" name="OD18_2" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <select id="OD18_3" class="form-control form-control-sm"name="OD18_3" size="1" style="color: #FF0000;">
                                                                                        <option value="1">+</option>
                                                                                        <option value="2">++</option>
                                                                                        <option selected value="3">0</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="#">
                                                                                    <input id="VCL_OD18"class="form-control form-control-sm"type="text" name="VCL_OD18"  size="9"style="color: #FF0000;">
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

                <div class="row">
                    <!--GUARDAR O IMPRIMIR FICHA-->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-purple mt-1" onclick="$('#cerrarsession').val('1');agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha y Finalizar su Consulta">
                                <input type="submit" class="btn btn-success mt-1" onclick="agregar_medicamentos_ficha(); agregar_examenes_ficha(); " value="Guardar Ficha e ir a su Agenda">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- SIDE BAR FONO -->
    @include("atencion_otros_prof.modales"){{-- base de botones de sidebar --}}
    @include("atencion_otros_prof.include.sidebar_derecho_fono"){{-- modales y data de sidebar especialidad --}}

@endsection

@section('page-script')
    <script>

        $(document).ready(function() {

        });

        function cargar_profesional(rut, input_nombre, input_id, div_solicitar)
        {
            rut = $(rut).val();

            // console.log('------------------------------------');
            // console.log(rut.length);
            // console.log(rut);
            // console.log('------------------------------------');

            if(rut.length>5)
            {
                url = "{{ route('profesional.buscar') }}";
                $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        rut : rut,
                    },
                })
                .done(function(data)
                {
                    // console.log('-----------------------');
                    // console.log(data);
                    // console.log('-----------------------');
                    if(data.estado == 1)
                    {

                        if(data.registros.length>0)
                        {
                            var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
                            var id = data.registros[0].id;
                            // $('#'+input_nombre).attr('readonly', true);
                            $('#'+input_nombre).val(nombre);
                            $('#'+input_id).val(id);
                            $('#'+div_solicitar).hide();
                            mensaje = '';
                            $('#div_mensaje').hide();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_nombre_oct_par').val('');
                            $('#solicitado_apellido_oct_par').val('');
                            $('#solicitado_telefono_oct_par').val('');
                            $('#solicitado_email_oct_par').val('');
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#div_mensaje').show();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_nombre_oct_par').val('');
                            $('#solicitado_apellido_oct_par').val('');
                            $('#solicitado_telefono_oct_par').val('');
                            $('#solicitado_email_oct_par').val('');
                            $('#'+input_nombre).attr('readonly', true);
                        }
                    }
                    else
                    {
                        mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                        $('#div_mensaje').show();
                        $('#mensaje_solicitado_por').html(mensaje);
                        $('#'+input_nombre).attr('readonly', false);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else if(rut.length==0)
            {
                $('#'+input_nombre).val('');
                // $('#'+input_nombre).attr('readonly', true);
                $('#'+input_id).val('');
                $('#'+div_solicitar).hide();
                $('#div_mensaje').hide();
                $('#mensaje_solicitado_por').html('');
            }
        }

        function actualizar_solicitado_por(input_solitado_por, input_nombre, input_apellido)
        {
            var nombre = $('#'+input_nombre).val();
            var apellido = $('#'+input_apellido).val();
            if(nombre != '' || apellido != '')
            {
                // $('#'+input_solitado_por).attr('readonly', true);
                $('#'+input_solitado_por).val($('#'+input_nombre).val()+' '+$('#'+input_apellido).val());
            }
            else
            {
                // $('#'+input_solitado_por).attr('readonly', false);
                $('#'+input_solitado_por).val();
            }
        }
    </script>
@endsection

{{-- @include('app.profesional.modales.boton_flotante_agenda_autorizacion') --}}
