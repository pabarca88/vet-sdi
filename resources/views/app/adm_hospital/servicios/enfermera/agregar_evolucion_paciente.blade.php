<div id="contenedor_evolucion_{{ $idCounter }}">
    <div class="col-sm-12 pb-0 mb-2 d-inline">
        <p class="pt-3 d-inline">
            @php
            //imprimir la fecha y la hora actual
            $fecha = \Carbon\Carbon::parse(now());
            $fecha = $fecha->format('d-m-Y H:i');
            echo $fecha.' '.\Auth::user()->name;
            @endphp
        </p>
    </div>

    <div class=" border  px-2 pt-3 pb-1 rounded shadow mb-3" >

        <div class="form-row">
            {{-- <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                <!--datos se sacan del personal de tens y enfermeria de turno-->


                <div class="form-group" id="div_resp_control" style="display:none;">
                    <label class="floating-label-activo-sm t-red" for="nom_resp_control">Nombre/Rut <i>(Anotar)</i></label>
                    <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="nom_resp_control" id="nom_resp_control"></textarea>
                </div>
            </div> --}}
            <div class="col-sm-1 col-md col-lg col-xl">
                <div class="form-group">
                     <label class="floating-label-activo-sm">Tº</label>
                     <input type="text" class="form-control form-control-sm" name="temperatura{{ $idCounter }}" id="temperatura{{ $idCounter }}" value="" required>
                </div>
            </div>
            <div class="col-sm-1 col-md col-lg col-xl">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Pulso</label>
                    <input type="text" class="form-control form-control-sm" name="pulso{{ $idCounter }}" id="pulso{{ $idCounter }}" value="{!! old('pulso') !!}" required>
                </div>
            </div>
            <div class="col-sm-1 col-md-col-lg-col-xl">
                <div class="form-group">
                    <label class="floating-label-activo-sm">PAS</label>
                    <input type="text" class="form-control form-control-sm" name="pas{{ $idCounter }}" id="pas{{ $idCounter }}" value="{!! old('presion_pas') !!}" oninput="calcularPAM({{ $idCounter }})">
                </div>
            </div>
            <div class="col-sm-1 col-md col-lg col-xl">
                <div class="form-group">
                    <label class="floating-label-activo-sm">PAD</label>
                    <input type="text" class="form-control form-control-sm" name="presion_bi{{ $idCounter }}" id="pad{{ $idCounter }}" value="{!! old('presion_pad') !!}" oninput="calcularPAM({{ $idCounter }})">
                </div>
            </div>
            <!--el PAM esla presion arterial media hay una formula-->
            <div class="col-sm-1 col-md col-lg col-xl">
                <div class="form-group">
                    <label class="floating-label-activo-sm">PAM</label>
                    <input type="text" class="form-control form-control-sm" name="presion_bi{{ $idCounter }}" id="pam{{ $idCounter }}" value="{!! old('presion_pam') !!}" readonly>
                </div>
            </div>

             <div class="col-sm-2 col-md col-lg col-xl">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Peso</label>
                    <input type="text" class="form-control form-control-sm" name="peso{{ $idCounter }}" id="peso{{ $idCounter }}" value="{!! old('peso') !!}" oninput="calcularIMC({{ $idCounter }})">

                </div>
            </div>
            <div class="col-sm-1 col-md col-lg col-xl">
                <div class="form-group">

                    <label class="floating-label-activo-sm">Talla</label>
                    <input type="text" class="form-control form-control-sm" name="talla{{ $idCounter }}" id="talla{{ $idCounter }}" value="{!! old('talla') !!}" oninput="calcularIMC({{ $idCounter }})">

                </div>
            </div>
            <div class="col-sm-1 col-md col-lg col-xl">
                <div class="form-group">
                    <!--el IMC es el indice de masa corporal hay una formula-->
                    <label class="floating-label-activo-sm">IMC</label>
                    <input type="text" class="form-control form-control-sm" name="imc{{ $idCounter }}" id="imc{{ $idCounter }}" value="{!! old('imc') !!}" readonly>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Tipo de Respiracion</label>
                    <select name="tipo_respiracion_servicio{{ $idCounter }}" id="tipo_respiracion_servicio{{ $idCounter }}" class="form-control form-control-sm" onchange="mostrarDatosRespiracion(event,{{ $idCounter }})">
                        <option value="0">Seleccione</option>
                        <option value="Normal">Normal</option>
                        <option value="Agitada">Agitada</option>
                        <option value="Dificultosa">Dificultosa</option>
                        <option value="Signos de hipoxia">Signos de hipoxia</option>
                    </select>

                </div>
            </div>
            <div class="col-sm-9 d-none" id="select_info_respiracion_servicio{{ $idCounter }}">
                <div class="row">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">F/R</label>
                            <input type="text" class="form-control form-control-sm" name="fr" id="fr"
                                value="{!! old('fr') !!}" >
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Sat FI O2</label>
                            <input type="text" class="form-control form-control-sm" name="saturacion_fio2{{ $idCounter }}" id="saturacion_fio2{{ $idCounter }}"
                                value="{!! old('saturacion') !!}" >
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label for="" class="floating-label-activo-sm">Sat C/O2</label>
                            <input type="text" class="form-control form-control-sm" name="saturacion_oxigeno{{ $idCounter }}" id="saturacion_oxigeno{{ $idCounter }}"
                                value="{!! old('saturacion_oxigeno') !!}" >
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label for="dispositivo_servicio" class="floating-label-activo-sm">Dispositivo</label>
                            <select name="dispositivo_servicio{{ $idCounter }}" id="dispositivo_servicio{{ $idCounter }}" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                <option value="Naricera">Naricera</option>
                                <option value="Mascarilla simple">Mascarilla simple</option>
                                <option value="Mascarilla C/reservorio">Mascarilla C/reservorio</option>
                                <option value="Tubo nasotraqueal">Tubo nasotraqueal</option>
                                <option value="Tubo orotraqueal">Tubo orotraqueal</option>
                                <option value="Traqueostoma">Traqueostoma</option>
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
                     <input type="text" class="form-control form-control-sm" name="hemoglucotest{{ $idCounter }}" id="hemoglucotest{{ $idCounter }}" value="{!! old('hemoglucotest') !!}" required>
                </div>
            </div>
             <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                <div class="form-group">

                    <label class="floating-label-activo-sm">Glasgow</label>
                    <input type="text" class="form-control form-control-sm" name="glasgow{{ $idCounter }}" id="glasgow{{ $idCounter }}" value="{!! old('glasgow') !!}" required>

                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                <div class="form-group">
                    <label class="floating-label-activo-sm">EVA</label>
                    <input type="text" class="form-control form-control-sm" name="c_eva{{ $idCounter }}" id="c_eva{{ $idCounter }}" value="{!! old('c_eva') !!}" required>
                </div>
            </div>
             <div class="col-sm-12 col-md-5 col-lg-5 col-xl-4">
                <div class="form-group">
                    <label class="floating-label-activo-sm">Otras Pruebas</label>
                    <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="otras_pruebas{{ $idCounter }}" id="otras_pruebas{{ $idCounter }}"></textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-3">
                <label class="floating-label-activo-sm">Gravedad/Estado de consciencia</label>
                <input type="text" class="form-control form-control-sm" name="gravedad_e_conc{{ $idCounter }}" id="gravedad_e_conc{{ $idCounter }}" value="{!! old('gravedad_e_conc') !!}" required>
            </div>
            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 d-flex justify-content-between">
                <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminarEvolucionPaciente({{ $idCounter }})"><i class="feather icon-x"></i> </button>
                <button type="button" class="btn btn-icon btn-success-light-c" onclick="agregarEvolucionPaciente({{ $idCounter }})"><i class="feather icon-save"></i> </button>
            </div>
        </div>
    </div>
</div>



<!-- DATOS DE VITAL IMPORTANCIA -->
<input type="hidden" name="evolucion{{ $idCounter }}" id="evolucion{{ $idCounter }}" value="">
