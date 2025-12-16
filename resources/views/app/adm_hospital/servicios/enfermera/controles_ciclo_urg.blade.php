@if (count($controles_ciclo) > 0)
    @foreach ($controles_ciclo as $cc)
        <div class="col-sm-12 pb-0 mb-2 d-inline">
            <p class="pt-3 d-inline">
                {{ $cc->created_at->format('d/m/Y H:i') }} {{ $cc->nombre }}
            </p>
        </div>
        <div class=" border  px-2 pt-3 pb-1 rounded shadow mb-3">
            <div class="form-row">
                {{-- <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                            <!--datos se sacan del personal de tens y enfermeria de turno-->
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Responsable</label>
                                <select name="resp_control"  id="resp_control" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('resp_control','div_resp_control','nom_resp_control',4);">
                                    <option  value="0">{{ $cc->nombre }}</option>

                                </select>
                            </div>
                            <div class="form-group" id="div_resp_control" style="display:none;">
                                <label class="floating-label-activo-sm t-red" for="nom_resp_control">Nombre/Rut <i>(Anotar)</i></label>
                                <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="nom_resp_control" id="nom_resp_control"></textarea>
                            </div>
                        </div> --}}
                <div class="col-sm-1 col-md col-lg col-xl">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Tº</label>
                        <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura"
                            value="{{ $cc->datos_evolucion->temperatura }}" required>
                    </div>
                </div>
                <div class="col-sm-1 col-md col-lg col-xl">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Pulso</label>
                        <input type="text" class="form-control form-control-sm" name="pulso" id="pulso"
                            value="{{ $cc->datos_evolucion->pulso }}" required>
                    </div>
                </div>
                <div class="col-sm-1 col-md-col-lg-col-xl">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">PAS</label>
                        <input type="text" class="form-control form-control-sm" name="pas" id="pas"
                            value="{{ $cc->datos_evolucion->pas }}" oninput="calcularPAM()">
                    </div>
                </div>
                <div class="col-sm-1 col-md col-lg col-xl">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">PAD</label>
                        <input type="text" class="form-control form-control-sm" name="presion_bi" id="pad"
                            value="{{ $cc->datos_evolucion->pad }}" oninput="calcularPAM()">
                    </div>
                </div>
                <!--el PAM esla presion arterial media hay una formula-->
                <div class="col-sm-1 col-md col-lg col-xl">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">PAM</label>
                        <input type="text" class="form-control form-control-sm" name="presion_bi" id="pam"
                            value="{{ $cc->datos_evolucion->pam }}" readonly>
                    </div>
                </div>
                <div class="col-sm-1 col-md col-lg col-xl">
                    <div class="form-group">

                        <label class="floating-label-activo-sm">F/R</label>
                        <input type="text" class="form-control form-control-sm" name="frec_resp" id="frec_resp"
                            value="{{ $cc->datos_evolucion->fr }}">

                    </div>
                </div>
                <div class="col-sm-1 col-md col-lg col-xl">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Peso</label>
                        <input type="text" class="form-control form-control-sm" name="peso" id="peso"
                            value="{{ $cc->datos_evolucion->peso }}" oninput="calcularIMC()">

                    </div>
                </div>
                <div class="col-sm-1 col-md col-lg col-xl">
                    <div class="form-group">

                        <label class="floating-label-activo-sm">Talla</label>
                        <input type="text" class="form-control form-control-sm" name="talla" id="talla"
                            value="{{ $cc->datos_evolucion->talla }}" oninput="calcularIMC()">

                    </div>
                </div>
                <div class="col-sm-1 col-md col-lg col-xl">
                    <div class="form-group">
                        <!--el IMC es el indice de masa corporal hay una formula-->
                        <label class="floating-label-activo-sm">IMC</label>
                        <input type="text" class="form-control form-control-sm" name="imc" id="imc"
                            value="{{ $cc->datos_evolucion->imc }}" readonly>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Tipo de Respiracion</label>
                        <select name="tipo_respiracion_servicio" id="tipo_respiracion_servicio" class="form-control form-control-sm" onchange="mostrarDatosRespiracion(event, )">
                            <option value="0" @php if($cc->datos_evolucion->tipo_respiracion == '') echo 'selected' @endphp>Seleccione</option>
                            <option value="Normal" @php if($cc->datos_evolucion->tipo_respiracion == "Normal") echo 'selected' @endphp>Normal</option>
                            <option value="Agitada" @php if($cc->datos_evolucion->tipo_respiracion == "Agitada") echo 'selected' @endphp>Agitada</option>
                            <option value="Dificultosa" @php if($cc->datos_evolucion->tipo_respiracion == "Dificultosa") echo 'selected' @endphp>Dificultosa</option>
                            <option value="Signos de hipoxia" @php if($cc->datos_evolucion->tipo_respiracion == "Signos de hipoxia") echo 'selected' @endphp>Signos de hipoxia</option>
                        </select>

                    </div>
                </div>
                @php if($cc->datos_evolucion->tipo_respiracion == '') $clase = 'd-none'; else $clase ='' @endphp
                <div class="col-sm-9 {{ $clase }}" id="select_info_respiracion_servicio">
                    <div class="row">
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label for="" class="floating-label-activo-sm">F/R</label>
                                <input type="text" class="form-control form-control-sm" name="fr" id="fr"
                                    value="{{ $cc->datos_evolucion->fr }}" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                                <label for="" class="floating-label-activo-sm">Sat (%)</label>
                                <input type="text" class="form-control form-control-sm" name="saturacion_fio2" id="saturacion_fio2"
                                    value="{{ $cc->datos_evolucion->sat_fio2 }}" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                <label for="" class="floating-label-activo-sm">FI O2 (%)</label>
                                <input type="text" class="form-control form-control-sm" name="saturacion_oxigeno" id="saturacion_oxigeno"
                                    value="{{ $cc->datos_evolucion->sat_o2 }}" >
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                                <label for="dispositivo_servicio" class="floating-label-activo-sm">Dispositivo</label>
                                <select name="dispositivo_servicio" id="dispositivo_servicio" class="form-control form-control-sm">
                                    <option value="0">Seleccione</option>
                                    <option value="Naricera" @php if($cc->datos_evolucion->dispositivo_servicio == 'Naricera') echo 'selected' @endphp>Naricera</option>
                                    <option value="Mascarilla simple" @php if($cc->datos_evolucion->dispositivo_servicio == 'Mascarilla simple') echo 'selected' @endphp>Mascarilla simple</option>
                                    <option value="Mascarilla C/reservorio" @php if($cc->datos_evolucion->dispositivo_servicio == 'Mascarilla C/reservorio') echo 'selected' @endphp>Mascarilla C/reservorio</option>
                                    <option value="Tubo nasotraqueal" @php if($cc->datos_evolucion->dispositivo_servicio == 'Tubo nasotraqueal') echo 'selected' @endphp>Tubo nasotraqueal</option>
                                    <option value="Tubo orotraqueal" @php if($cc->datos_evolucion->dispositivo_servicio == 'Tubo orotraqueal') echo 'selected' @endphp>Tubo orotraqueal</option>
                                    <option value="Traqueostoma" @php if($cc->datos_evolucion->dispositivo_servicio == 'Traqueostoma') echo 'selected' @endphp>Traqueostoma</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <button type="button" class="btn btn-outline-info btn-sm w-100" data-target="#modalInfoRespiracionServicio" data-toggle="modal">Info</button>
                        </div>
                    </div>

                </div>

            </div>
            <div class="form-row">
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">HGT</label>
                        <input type="text" class="form-control form-control-sm" name="hemoglucotest"
                            id="hemoglucotest" value="{{ $cc->datos_evolucion->hemoglucotest }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                    <div class="form-group">

                        <label class="floating-label-activo-sm">Glasgow</label>
                        <input type="text" class="form-control form-control-sm" name="glasgow" id="glasgow"
                            value="{{ $cc->datos_evolucion->glasgow }}" required>

                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">EVA</label>
                        <input type="text" class="form-control form-control-sm" name="c_eva" id="c_eva"
                            value="{{ $cc->datos_evolucion->eva }}" required>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-4">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Otras Pruebas</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                            name="otras_pruebas" id="otras_pruebas">{{ $cc->datos_evolucion->otras_pruebas }}</textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-5 col-xl-3">
                    <label class="floating-label-activo-sm">Gravedad/Estado de consciencia</label>
                    <input type="text" class="form-control form-control-sm" name="gravedad_e_conc"
                        id="gravedad_e_conc" value="{{ $cc->datos_evolucion->gravedad }}" required>
                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <button type="button" class="btn btn-icon btn-danger-light-c"
                        onclick="eliminarEvolucionAgregada({{ $cc->id }})" disabled><i class="feather icon-x"></i>
                    </button>
                    {{-- <button type="button" class="btn btn-icon btn-success-light-c" onclick="agregarEvolucionPaciente()"><i class="feather icon-save"></i> </button> --}}
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class=" border  px-2 pt-3 pb-1 rounded shadow mb-3">
        <div class="form-row">
            {{-- <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                        <!--datos se sacan del personal de tens y enfermeria de turno-->
                        <div class="form-group">
                            <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Responsable</label>
                            <select name="resp_control"  id="resp_control" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('resp_control','div_resp_control','nom_resp_control',4);">
                                <option  value="0">Seleccione</option>
                                @foreach ($responsables as $responsable)
                                    <option value="{{$responsable->id}}">{{$responsable->nombre}} {{$responsable->apellido}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="div_resp_control" style="display:none;">
                            <label class="floating-label-activo-sm t-red" for="nom_resp_control">Nombre/Rut <i>(Anotar)</i></label>
                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="nom_resp_control" id="nom_resp_control"></textarea>
                        </div>
                    </div> --}}
            <div class="col-sm-1 col-md col-lg col-xl">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Tº</label>
                    <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura"
                        value="" required>
                </div>
            </div>
            <div class="col-sm-1 col-md col-lg col-xl">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Pulso</label>
                    <input type="text" class="form-control form-control-sm" name="pulso" id="pulso"
                        value="{!! old('pulso') !!}" required>
                </div>
            </div>
            <div class="col-sm-1 col-md-col-lg-col-xl">
                <div class="form-group">
                    <label class="floating-label-activo-sm">PAS</label>
                    <input type="text" class="form-control form-control-sm" name="pas" id="pas"
                        value="{!! old('presion_pas') !!}" oninput="calcularPAM()">
                </div>
            </div>
            <div class="col-sm-1 col-md col-lg col-xl">
                <div class="form-group">
                    <label class="floating-label-activo-sm">PAD</label>
                    <input type="text" class="form-control form-control-sm" name="presion_bi" id="pad"
                        value="{!! old('presion_pad') !!}" oninput="calcularPAM()">
                </div>
            </div>
            <!--el PAM esla presion arterial media hay una formula-->
            <div class="col-sm-1 col-md col-lg col-xl">
                <div class="form-group">
                    <label class="floating-label-activo-sm">PAM</label>
                    <input type="text" class="form-control form-control-sm" name="presion_bi" id="pam"
                        value="{!! old('presion_pam') !!}" readonly>
                </div>
            </div>
            <div class="col-sm-1 col-md col-lg col-xl">
                <div class="form-group">

                    <label class="floating-label-activo-sm">F/R</label>
                    <input type="text" class="form-control form-control-sm" name="frec_resp" id="frec_resp"
                        value="{!! old('frec_resp') !!}">

                </div>
            </div>
            <div class="col-sm-1 col-md col-lg col-xl">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Peso</label>
                    <input type="text" class="form-control form-control-sm" name="peso" id="peso"
                        value="{!! old('peso') !!}" oninput="calcularIMC()">

                </div>
            </div>
            <div class="col-sm-1 col-md col-lg col-xl">
                <div class="form-group">

                    <label class="floating-label-activo-sm">Talla</label>
                    <input type="text" class="form-control form-control-sm" name="talla" id="talla"
                        value="{!! old('talla') !!}" oninput="calcularIMC()">

                </div>
            </div>
            <div class="col-sm-1 col-md col-lg col-xl">
                <div class="form-group">
                    <!--el IMC es el indice de masa corporal hay una formula-->
                    <label class="floating-label-activo-sm">IMC</label>
                    <input type="text" class="form-control form-control-sm" name="imc" id="imc"
                        value="{!! old('imc') !!}" readonly>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Hemoglucotest</label>
                    <input type="text" class="form-control form-control-sm" name="hemoglucotest"
                        id="hemoglucotest" value="{!! old('hemoglucotest') !!}" required>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">

                    <label class="floating-label-activo-sm">Glasgow</label>
                    <input type="text" class="form-control form-control-sm" name="glasgow" id="glasgow"
                        value="{!! old('glasgow') !!}" required>

                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="form-group">
                    <label class="floating-label-activo-sm">EVA</label>
                    <input type="text" class="form-control form-control-sm" name="c_eva" id="c_eva"
                        value="{!! old('c_eva') !!}" required>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Otras Pruebas</label>
                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                        name="otras_pruebas" id="otras_pruebas"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                <label class="floating-label-activo-sm">Gravedad/Estado de consciencia</label>
                <input type="text" class="form-control form-control-sm" name="gravedad_e_conc"
                    id="gravedad_e_conc" value="{!! old('gravedad_e_conc') !!}" required>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                <button type="button" class="btn btn-icon btn-danger-light-c"><i class="feather icon-x"></i>
                </button>
                <button type="button" class="btn btn-icon btn-success-light-c"
                    onclick="agregarEvolucionPaciente()"><i class="feather icon-save"></i> </button>
            </div>
        </div>
    </div>
@endif
