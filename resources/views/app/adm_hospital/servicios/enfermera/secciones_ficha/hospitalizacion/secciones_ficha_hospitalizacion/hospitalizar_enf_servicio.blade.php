




            <div class="form-row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h6 class="text-c-blue">INFORMACION DE INGRESO</h6>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="floating-label-activo-sm">Médico tratante</label>
                    <input type="text" class="form-control form-control-sm" name="med_tratante" id="med_tratante">
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="floating-label-activo-sm">Urgencia</label>
                    <input type="text" class="form-control form-control-sm" id="hosp_en" name="hosp_en">
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <label class="floating-label-activo-sm">Diagnósticos</label>
                    <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=8" onblur="this.rows=1;"name="dg_ingreso" id="dg_ingreso"></textarea>
                </div>
                <div class="form-group col-sm-12 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Motivo de Hospitalizaciòn</label>
                        <input type="text" class="form-control form-control-sm" name="serv_hosp" id="serv_hosp">
                    </div>
                </div>

            </div>

            @if($ultimo_control_ciclo)
            <div class="form-row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h6 class="t-aten"> Ultimo control </h6>
                </div>
            </div>
            <div class=" border  px-2 pt-3 pb-1 rounded shadow mb-3">
                <div class="form-row">
                    <div class="col-sm-1 col-md col-lg col-xl">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tº</label>
                            <input type="text" class="form-control form-control-sm" name="temperatura"
                                id="temperatura" value="{{ $ultimo_control_ciclo->datos_evolucion->temperatura }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md col-lg col-xl">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Pulso</label>
                            <input type="text" class="form-control form-control-sm" name="pulso" id="pulso"
                                value="{{ $ultimo_control_ciclo->datos_evolucion->pulso }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md-col-lg-col-xl">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">PAS</label>
                            <input type="text" class="form-control form-control-sm" name="pas" id="pas"
                                value="{{ $ultimo_control_ciclo->datos_evolucion->pas }}" oninput="calcularPAM()" readonly>
                        </div>
                    </div>
                    <div class="col-sm-1 col-md col-lg col-xl">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">PAD</label>
                            <input type="text" class="form-control form-control-sm" name="presion_bi" id="pad"
                                value="{{ $ultimo_control_ciclo->datos_evolucion->pad }}" oninput="calcularPAM()" readonly>
                        </div>
                    </div>
                    <!--el PAM esla presion arterial media hay una formula-->
                    <div class="col-sm-1 col-md col-lg col-xl">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">PAM</label>
                            <input type="text" class="form-control form-control-sm" name="presion_bi" id="pam"
                                value="{{ $ultimo_control_ciclo->datos_evolucion->pam }}" readonly>
                        </div>
                    </div>

                    <div class="col-sm-2 col-md col-lg col-xl">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Peso</label>
                            <input type="text" class="form-control form-control-sm" name="peso" id="peso"
                                value="{{ $ultimo_control_ciclo->datos_evolucion->peso }}" oninput="calcularIMC()">

                        </div>
                    </div>
                    <div class="col-sm-1 col-md col-lg col-xl">
                        <div class="form-group">

                            <label class="floating-label-activo-sm">Talla</label>
                            <input type="text" class="form-control form-control-sm" name="talla" id="talla"
                                value="{{ $ultimo_control_ciclo->datos_evolucion->talla }}" oninput="calcularIMC()" readonly>

                        </div>
                    </div>
                    <div class="col-sm-1 col-md col-lg col-xl">
                        <div class="form-group">
                            <!--el IMC es el indice de masa corporal hay una formula-->
                            <label class="floating-label-activo-sm">IMC</label>
                            <input type="text" class="form-control form-control-sm" name="imc" id="imc"
                                value="{{ $ultimo_control_ciclo->datos_evolucion->imc }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tipo de Respiracion</label>
                            <select name="tipo_respiracion_servicio" id="tipo_respiracion_servicio" class="form-control form-control-sm" disabled readonly>
                                <option value="0" @php if($ultimo_control_ciclo->datos_evolucion->tipo_respiracion == '') echo 'selected' @endphp>Seleccione</option>
                                <option value="Normal" @php if($ultimo_control_ciclo->datos_evolucion->tipo_respiracion == "Normal") echo 'selected' @endphp>Normal</option>
                                <option value="Agitada" @php if($ultimo_control_ciclo->datos_evolucion->tipo_respiracion == "Agitada") echo 'selected' @endphp>Agitada</option>
                                <option value="Dificultosa" @php if($ultimo_control_ciclo->datos_evolucion->tipo_respiracion == "Dificultosa") echo 'selected' @endphp>Dificultosa</option>
                                <option value="Signos de hipoxia" @php if($ultimo_control_ciclo->datos_evolucion->tipo_respiracion == "Signos de hipoxia") echo 'selected' @endphp>Signos de hipoxia</option>
                            </select>

                        </div>
                    </div>
                    @php if($ultimo_control_ciclo->datos_evolucion->tipo_respiracion == '') $clase = 'd-none'; else $clase ='' @endphp
                    <div class="col-sm-9 {{ $clase }}" id="select_info_respiracion_servicio">
                        <div class="row">
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="floating-label-activo-sm">F/R</label>
                                    <input type="text" class="form-control form-control-sm" name="fr" id="fr"
                                        value="{{ $ultimo_control_ciclo->datos_evolucion->fr }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label for="" class="floating-label-activo-sm">Sat (%)</label>
                                    <input type="text" class="form-control form-control-sm" name="saturacion_fio2" id="saturacion_fio2"
                                        value="{{ $ultimo_control_ciclo->datos_evolucion->sat_fio2 }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <div class="form-group">
                                    <label for="" class="floating-label-activo-sm">FI O2 (%)</label>
                                    <input type="text" class="form-control form-control-sm" name="saturacion_oxigeno" id="saturacion_oxigeno"
                                        value="{{ $ultimo_control_ciclo->datos_evolucion->sat_o2 }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label for="dispositivo_servicio" class="floating-label-activo-sm">Dispositivo</label>
                                    <select name="dispositivo_servicio" id="dispositivo_servicio" class="form-control form-control-sm" disabled readonly>
                                        <option value="0">Seleccione</option>
                                        <option value="Naricera" @php if($ultimo_control_ciclo->datos_evolucion->dispositivo_servicio == 'Naricera') echo 'selected' @endphp>Naricera</option>
                                        <option value="Mascarilla simple" @php if($ultimo_control_ciclo->datos_evolucion->dispositivo_servicio == 'Mascarilla simple') echo 'selected' @endphp>Mascarilla simple</option>
                                        <option value="Mascarilla C/reservorio" @php if($ultimo_control_ciclo->datos_evolucion->dispositivo_servicio == 'Mascarilla C/reservorio') echo 'selected' @endphp>Mascarilla C/reservorio</option>
                                        <option value="Tubo nasotraqueal" @php if($ultimo_control_ciclo->datos_evolucion->dispositivo_servicio == 'Tubo nasotraqueal') echo 'selected' @endphp>Tubo nasotraqueal</option>
                                        <option value="Tubo orotraqueal" @php if($ultimo_control_ciclo->datos_evolucion->dispositivo_servicio == 'Tubo orotraqueal') echo 'selected' @endphp>Tubo orotraqueal</option>
                                        <option value="Traqueostoma" @php if($ultimo_control_ciclo->datos_evolucion->dispositivo_servicio == 'Traqueostoma') echo 'selected' @endphp>Traqueostoma</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                {{-- <button type="button" class="btn btn-outline-info btn-sm w-100" data-target="#modalInfoRespiracionServicio" data-toggle="modal">Info</button> --}}
                            </div>
                        </div>

                    </div>

                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">HGT</label>
                            <input type="text" class="form-control form-control-sm" name="hemoglucotest"
                                id="hemoglucotest" value="{{ $ultimo_control_ciclo->datos_evolucion->hemoglucotest }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                        <div class="form-group">

                            <label class="floating-label-activo-sm">Glasgow</label>
                            <input type="text" class="form-control form-control-sm" name="glasgow" id="glasgow"
                                value="{{ $ultimo_control_ciclo->datos_evolucion->glasgow }}" readonly>

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-1">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">EVA</label>
                            <input type="text" class="form-control form-control-sm" name="c_eva" id="c_eva"
                                value="{{ $ultimo_control_ciclo->datos_evolucion->eva }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Otras Pruebas</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                                name="otras_pruebas" id="otras_pruebas" readonly>{{ $ultimo_control_ciclo->datos_evolucion->otras_pruebas }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-3">
                        <label class="floating-label-activo-sm">Gravedad/Estado de consciencia</label>
                        <input type="text" class="form-control form-control-sm" name="gravedad_e_conc"
                            id="gravedad_e_conc" value="{{ $ultimo_control_ciclo->datos_evolucion->gravedad }}" readonly>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        {{-- <button type="button" class="btn btn-icon btn-danger-light-c"><i class="feather icon-x"></i>
                        </button> --}}
                        {{-- <button type="button" class="btn btn-icon btn-success-light-c" onclick="agregarEvolucionPaciente()"><i class="feather icon-save"></i> </button> --}}
                    </div>
                </div>
            </div>
            @endif

            <div class="form-row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h6 class="t-aten"> Informe </h6>
                </div>
            </div>

            <div class="form-row">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <button type="button" class="btn btn-outline-primary btn-block btn-xxs mb-2"  onclick="i_barthel();">Barthel</button>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <button type="button" class="btn btn-outline-primary btn-block btn-xxs mb-2"  onclick="i_braden();">Braden</button>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <button type="button" class="btn btn-outline-primary btn-block btn-xxs mb-2"  onclick="i_cudyr();">Cudyr</button>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <button type="button" class="btn btn-outline-primary btn-block btn-xxs mb-2"  onclick="i_glasgow();">Glasgow</button>
                </div>
            </div>
            <div class="form-row mb-2">
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <button type="button" class="btn btn-outline-primary btn-block btn-xxs mb-2"  onclick="i_caidas();">Riesgo de caídas</button>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <button type="button" class="btn btn-outline-primary btn-block btn-xxs mb-2"  onclick="i_eva();">EVA</button>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <button type="button" class="btn btn-outline-primary btn-block btn-xxs mb-2"  onclick="i_b_hidrico();">Balance Hídrico</button>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                    <button type="button" class="btn btn-outline-primary btn-block btn-xxs mb-2"  onclick="">Hacer Informe</button>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label class="floating-label-activo-sm">Ptos-Barthel</label>
                    <input type="text" class="form-control form-control-sm"name="puntos_barthel" id="puntos_barthel">
                </div>
                <div class="form-group col-md-3">
                    <label class="floating-label-activo-sm">Ptos-Braden</label>
                    <input type="text" class="form-control form-control-sm"name="puntos_braden" id="puntos_braden">
                </div>
                <div class="form-group col-md-3">
                    <label class="floating-label-activo-sm">Ptos-Cudyr riesgo</label>
                    <input type="text" class="form-control form-control-sm" name="ptos_criesg_" id="ptos_criesg_">
                </div>
                <div class="form-group col-md-3">
                    <label class="floating-label-activo-sm">Ptos-Cudyr Dependencia</label>
                    <input type="text" class="form-control form-control-sm" style="color:red;font-weight:bold;"  name="puntos_cdep" id="puntos_cdep">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                <label class="floating-label-activo-sm">Ptos-Riesgo de caídas</label>
                    <input type="text" class="form-control form-control-sm"name="puntos_riesgo_caida" id="puntos_riesgo_caida">
                </div>
                <div class="form-group col-md-3">
                <label class="floating-label-activo-sm">Ptos-EVA</label>
                <input type="text" class="form-control form-control-sm" style="color:red;font-weight:bold;"  name="puntos_eva" id="puntos_eva">
                </div>
                <div class="form-group col-md-3">
                    <label class="floating-label-activo-sm">Balance Hídrico</label>
                    <input type="text" class="form-control form-control-sm" style="color:red;font-weight:bold;"  name="puntos_balance" id="puntos_balance">

                </div>
                <div class="form-group col-md-3">
                    <label class="floating-label-activo-sm">Ptos-Glasgow</label>
                    <input type="text" class="form-control form-control-sm" style="color:red;font-weight:bold;"  name="puntos_glasgow" id="puntos_glasgow">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <button type="button" class="btn btn-primary-light-c btn-sm btn-block" onclick="ingresohosp()";><i class="feather icon-check"></i> Orden de Hospitalización </button>
                </div>
                <div class="form-group col-md-3">
                    <button type="button" class="btn btn-primary-light-c btn-sm btn-block" onclick="#";><i class="feather icon-check"></i> Generar Informe</button>
                </div>
                <div class="form-group col-md-3">
                    <button type="button" class="btn btn-primary-light-c btn-sm btn-block" onclick="sol_pabellon()";><i class="feather icon-check"></i> Solicitar Pabellón</button>
                </div>
                <div class="form-group col-md-3">
                    <button type="button" class="btn btn-primary-light-c btn-sm btn-block" onclick="guardar_informes()";><i class="feather icon-save"></i> Guardar</button>
                </div>
            </div>




{{--  @include('general.hospitalizacion.seccion_ficha_hospitalizacion.hospitalizar_enf_urgencia')  --}}
<script>
    function IsNumeric(valor) {
        var log = valor.length;
        var sw = "S";
        for (x = 0; x < log; x++) {
            v1 = valor.substr(x, 1);
            v2 = parseInt(v1);
            //Compruebo si es un valor numérico
            if (isNaN(v2)) {
                sw = "N";
            }
        }
        if (sw == "S") {
            return true;
        } else {
            return false;
        }
    }

    var primerslap = false;
    var segundoslap = false;

    function formateafecha(fecha) {
        var long = fecha.length;
        var dia;
        var mes;
        var ano;

        if ((long >= 2) && (primerslap == false)) {
            dia = fecha.substr(0, 2);
            if ((IsNumeric(dia) == true) && (dia <= 31) && (dia != "00")) {
                fecha = fecha.substr(0, 2) + "/" + fecha.substr(3, 7);
                primerslap = true;
            } else {
                fecha = "";
                primerslap = false;
            }
        } else {
            dia = fecha.substr(0, 1);
            if (IsNumeric(dia) == false) {
                fecha = "";
            }
            if ((long <= 2) && (primerslap = true)) {
                fecha = fecha.substr(0, 1);
                primerslap = false;
            }
        }
        if ((long >= 5) && (segundoslap == false)) {
            mes = fecha.substr(3, 2);
            if ((IsNumeric(mes) == true) && (mes <= 12) && (mes != "00")) {
                fecha = fecha.substr(0, 5) + "/" + fecha.substr(6, 4);
                segundoslap = true;
            } else {
                fecha = fecha.substr(0, 3);;
                segundoslap = false;
            }
        } else {
            if ((long <= 5) && (segundoslap = true)) {
                fecha = fecha.substr(0, 4);
                segundoslap = false;
            }
        }
        if (long >= 7) {
            ano = fecha.substr(6, 4);
            if (IsNumeric(ano) == false) {
                fecha = fecha.substr(0, 6);
            } else {
                if (long == 10) {
                    if ((ano == 0) || (ano < 1900) || (ano > 2100)) {
                        fecha = fecha.substr(0, 6);
                    }
                }
            }
        }

        if (long >= 10) {
            fecha = fecha.substr(0, 10);
            dia = fecha.substr(0, 2);
            mes = fecha.substr(3, 2);
            ano = fecha.substr(6, 4);
            // Año no viciesto y es febrero y el dia es mayor a 28
            if ((ano % 4 != 0) && (mes == 02) && (dia > 28)) {
                fecha = fecha.substr(0, 2) + "/";
            }
        }
        return (fecha);
    }
</script>
<script>
    function cargarIgual(input)
    {

        let actual = $('#'+input);
        let equivalentes = $('#'+input).attr('data-input_igual').split(',');
        $.each(equivalentes, function( index, value ) {
            var equivalente = $('#'+value);
            equivalente.val(actual.val());
        });

        // let actual = $('#'+input);
        // let equivalente = $('#'+$('#'+input).attr('data-input_igual'));

        // equivalente.val(actual.val());

    }

    function guardar_informacion_ingreso_urgencia(){
        let med_tratante = $('#med_tratante').val();
        let hosp_en = $('#hosp_en').val();
        let dg_ingreso = $('#dg_ingreso').val();
        let serv_hosp = $('#serv_hosp').val();

        let valido = 1;
        let mensaje = '';

        if(med_tratante == ''){
            valido = 0;
            mensaje += 'Debe ingresar el médico tratante\n';
        }
        if(hosp_en == ''){
            valido = 0;
            mensaje += 'Debe ingresar la urgencia\n';
        }
        if(dg_ingreso == ''){
            valido = 0;
            mensaje += 'Debe ingresar los diagnósticos\n';
        }
        if(serv_hosp == ''){
            valido = 0;
            mensaje += 'Debe ingresar el motivo de hospitalización\n';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content:{
                    element: 'p',
                    attributes:{
                        innerHTML: mensaje
                    }
                },
                icon: 'error'
            })
            return;
        }

        let data = {
            med_tratante: med_tratante,
            hosp_en: hosp_en,
            dg_ingreso: dg_ingreso,
            serv_hosp: serv_hosp,
            id_paciente: $('#id_paciente').val()
        }

        $.ajax({
            type: 'POST',
            url: "{{ route('enfermeria.guardar_informacion_ingreso') }}",
            data: data,
            success: function(data){
                console.log(data);
            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }

    function guardar_informes(){
        let puntos_barthel = $('#puntos_barthel').val();
        let puntos_braden = $('#puntos_braden').val();
        let ptos_criesg_ = $('#ptos_criesg_').val();
        let puntos_cdep = $('#puntos_cdep').val();
        let puntos_riesgo_caida = $('#puntos_riesgo_caida').val();
        let puntos_eva = $('#puntos_eva').val();
        let puntos_balance = $('#puntos_balance').val();
        let puntos_glasgow = $('#puntos_glasgow').val();

        let valido = 1;
        let mensaje = '';

        if(puntos_barthel == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar los puntos de Barthel</li>';
        }
        if(puntos_braden == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar los puntos de Braden</li>';
        }
        if(ptos_criesg_ == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar los puntos de Cudyr riesgo</li>';
        }
        if(puntos_cdep == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar los puntos de Cudyr dependencia</li>';
        }
        if(puntos_riesgo_caida == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar los puntos de Riesgo de caídas</li>';
        }
        if(puntos_eva == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar los puntos de EVA</li>';
        }
        if(puntos_balance == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar los puntos de Balance Hídrico</li>';
        }
        if(puntos_glasgow == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar los puntos de Glasgow</li>';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content:{
                    element: 'p',
                    attributes:{
                        innerHTML: mensaje
                    }
                },
                icon: 'error'
            })
            return;
        }

        let data = {
            puntos_barthel: puntos_barthel,
            puntos_braden: puntos_braden,
            ptos_criesg_: ptos_criesg_,
            puntos_cdep: puntos_cdep,
            puntos_riesgo_caida: puntos_riesgo_caida,
            puntos_eva: puntos_eva,
            puntos_balance: puntos_balance,
            puntos_glasgow: puntos_glasgow,
            id_paciente: dame_id_paciente(),
            id_ficha_atencion : $('#id_fc').val(),
            id_lugar_atencion: $('#id_lugar_atencion').val(),
            _token: "{{ csrf_token() }}"
        }

        $.ajax({
            type: 'POST',
            url: "{{ route('enfermeria.guardar_informes') }}",
            data: data,
            success: function(data){
                console.log(data);
                if(data.estado == 1){
                    swal({
                        title: 'Información',
                        text: data.mensaje,
                        icon: 'success'
                    });
                }else{
                    swal({
                        title: 'Error',
                        text: data.mensaje,
                        icon: 'error'
                    });
                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        });
    }

</script>

