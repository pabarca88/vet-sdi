

       <!-- <div class="form-row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h6 class="t-aten">Enfermera de Urgencias Informe hospitalización</h6>
            </div>
        </div>-->
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
                <input type="text" class="form-control form-control-sm"name="inicio_hospitalizacion" id="inicio_hospitalizacion">
            </div>
            <div class="form-group col-md-3">
                <label class="floating-label-activo-sm">Ptos-Braden</label>
                <input type="text" class="form-control form-control-sm"name="inicio_hospitalizacion" id="inicio_hospitalizacion">
            </div>
            <div class="form-group col-md-3">
                <label class="floating-label-activo-sm">Ptos-Cudyr riesgo</label>
                <input type="text" class="form-control form-control-sm"name="total_cr" id="ptos_criesg">
            </div>
             <div class="form-group col-md-3">
                <label class="floating-label-activo-sm">Ptos-Cudyr Dependencia</label>
                <input type="text" class="form-control form-control-sm" style="color:red;font-weight:bold;"  name="total_g" id="total_g">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
               <label class="floating-label-activo-sm">Ptos-Riesgo de caídas</label>
                <input type="text" class="form-control form-control-sm"name="inicio_hospitalizacion" id="inicio_hospitalizacion">
            </div>
            <div class="form-group col-md-3">
               <label class="floating-label-activo-sm">Ptos-EVA</label>
               <input type="text" class="form-control form-control-sm" style="color:red;font-weight:bold;"  name="total_e" id="total_e">
            </div>
            <div class="form-group col-md-3">
                <label class="floating-label-activo-sm">Balance Hídrico</label>
                <input type="text" class="form-control form-control-sm" style="color:red;font-weight:bold;"  name="total_g" id="total_g">

            </div>
            <div class="form-group col-md-3">
                <label class="floating-label-activo-sm">Ptos-Glasgow</label>
                <input type="text" class="form-control form-control-sm" style="color:red;font-weight:bold;"  name="total_g" id="total_g">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <button type="button" class="btn btn-primary-light-c btn-sm btn-block" onclick="ingresohosp()";><i class="feather icon-check"></i> Orden de Hospitalización </button>
            </div>
            <div class="form-group col-md-4">
                <button type="button" class="btn btn-primary-light-c btn-sm btn-block" onclick="#";><i class="feather icon-check"></i> Generar Informe</button>
            </div>
            <div class="form-group col-md-4">
                <button type="button" class="btn btn-primary-light-c btn-sm btn-block" onclick="sol_pabellon()";><i class="feather icon-check"></i> Solicitar Pabellón</button>
            </div>
        </div>

        {{--  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Nombre de La institución</label>
                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="nom_inst" id="nom_inst"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Servicio</label>
                                <select name="hosp_enserv" id="hosp_enserv" data-titulo="Es Urgencia Qx.?" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('hosp_enserv','div_detalle_hosp_enserv','obs_hosp_enserv',4);">
                                    <option value="1" selected>Servicio Urgencia</option>
                                    <option value="2">Sala</option>
                                    <option value="3">UTI</option>
                                    <option value="4">Otro</option>
                                </select>
                            </div>
                            <div class="col-md-12" id="div_detalle_hosp_enserv" style="display:none">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Otro Servicio Describir</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs. Es Urgencia Qx.?" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_hosp_enserv" id="obs_hosp_enserv"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Motivo</label>
                                <select name="motivo_hosp" id="motivo_hosp" data-titulo="Otro Tratamiento" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('motivo_hosp','div_motivo_hosp','obs_motivo_hosp',5);">
                                    <option value="1" selected>Cirugía</option>
                                    <option value="2">Tratamiento Médico</option>
                                    <option value="3">Estudio Clínico</option>
                                    <option value="4">Observación</option>
                                    <option value="5">Otro</option>
                                </select>
                            </div>
                            <div class="col-md-12" id="div_motivo_hosp" style="display:none">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Otro Tratamiento Describir</label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Otro Tratamiento" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_motivo_hosp" id="obs_motivo_hosp"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Observaciones a la Hospitalización</label>
                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Hospitalizar" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_hospitalizar" id="obs_hospitalizar"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="ingresohosp()";<i class="feather icon-save"></i> Orden de Hospitalización </button>
                        </div>
                        <div class="form-group col-md-6">
                            <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="sol_pabellon()";<i class="feather icon-save"></i> Solicitar Pabellón</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>  --}}


{{--  @include('general.hospitalizacion.seccion_ficha_hospitalizacion.hospitalizar_enf_urgencia')  --}}

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

</script>

