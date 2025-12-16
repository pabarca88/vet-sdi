<div id="cudyr" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cudyr" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Riesgo Dependencia CUDYR </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="fun-global" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="cudyr_dep_tab" data-toggle="tab" href="#cudyr_dep" role="tab" aria-controls="cudyr_dep" aria-selected="true">Dependencia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="cudyr_riesgo_tab" data-toggle="tab" href="#cudyr_riesgo" role="tab" aria-controls="cudyr_riesgo" aria-selected="false">Riesgo</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="form-group row">
                    <h6 class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-2">Fecha del examen</h6>
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-2">
                        <script>
                            var f = new Date();
                            document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear() + " "+" " + f.getHours() + " Hrs." +" "+ f.getMinutes() + " Min." );
                         </script>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group ">
                            <label class="floating-label-activo-sm">Evaluado por:</label>
                            <input type="text" class="form-control form-control-sm" name="resp_cudyr" id="resp_cudyr" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ex-inferior">
                            <div class="tab-pane fade show active" id="cudyr_dep" role="tabpanel" aria-labelledby="cudyr_dep_tab">
                                <div id="contenedor_grupo_musc">
                                    <div id="cudyr">
                                        <form name="sumarcuddependencia">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-6">
                                                    <h6>CUIDADOS DEPENDENCIA</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm cud_dep_conf " for="cud_dep_conf" >Confort y Bienestar cambio de ropa pañales etc</label>
                                                        <select name="cud_dep_conf" id="cud_dep_conf" class="form-control form-control-sm">
                                                            <option selected  value="0">seleccione</option>
                                                            <option value="3">Requiere 3 veces/día</option>
                                                            <option value="2">Requiere 2 veces/día</option>
                                                            <option value="1">Usuario y fmlia realiza el proc. con supervisión</option>
                                                            <option value="0">Usuario  realiza solo el autocuidado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm cud_dep_conmov" for="cud_dep_conmov" >Confort Movilizacion y transporte</label>
                                                        <select name="cud_dep_conmov" id="cud_dep_conmov" class="form-control form-control-sm">
                                                            <option selected  value="0">seleccione</option>
                                                            <option value="3">Requiere cambio de posición en cama 10/día o mayor de 3 veces</option>
                                                            <option value="2">Es levantado a silla y requiere cambio de posición 4 a 9 veces</option>
                                                            <option selected  value="1">Se levanta y deambula con ayuda</option>
                                                            <option value="0">Deambula sin ayuda, se moviliza solo en cama</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm cud_dep_al" for="cud_dep_al" >Alimentación</label>
                                                        <select name="cud_dep_al" id="cud_dep_al" class="form-control form-control-sm">
                                                            <option selected  value="0">seleccione</option>
                                                            <option value="3">Recibe alimentación y/o hidratación parenteral</option>
                                                            <option value="3">Recibe alimentación enteral permanente o discontinua</option>
                                                            <option value="2">Requiere se le administere alimentación oral</option>
                                                            <option value="1">Se alimenta por vía enteral con ayuda o supervisión</option>
                                                            <option value="0">Se alimenta sin ayuda</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm cud_dep_evac" for="cud_dep_evac" >Evacuaciones</label>
                                                        <select name="cud_dep_evac" id="cud_dep_evac" class="form-control form-control-sm">
                                                            <option selected  value="0">seleccione</option>
                                                            <option value="3">Elimina egresos por sonda, prótesis dialisis etc.</option>
                                                            <option value="2">Elimina por vía natural pero se le entrgan chata pato etc.</option>
                                                            <option value="1">Usuario y familia realizan recolección con supervisión</option>
                                                            <option value="0">Uso de colectores y/o wc sin ayuda</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                 <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm cud_dep_emoc" for="cud_dep_emoc" >Apoyo emocional</label>
                                                        <select name="cud_dep_emoc" id="cud_dep_emoc" class="form-control form-control-sm">
                                                            <option selected  value="0">seleccione</option>
                                                            <option value="3">Recibe mas de 30 min. apoyo en el turno</option>
                                                            <option value="2">Recibe entre 15- 30 min. apoyo en el turno</option>
                                                            <option value="1">Recibe entre 5- 14 min. apoyo en el turno</option>
                                                            <option value="0">Recibe menos de 5 min. apoyo en el turno</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm cud_dep_rc" for="cud_dep_rc" >Riesgo de caída o Incidente</label>
                                                        <select name="cud_dep_rc" id="cud_dep_rc" class="form-control form-control-sm">
                                                            <option selected  value="0">seleccione</option>
                                                            <option value="3">Alteración de consciencia o conducta insegura</option>
                                                            <option value="3">Riesgo de caída o incidentes(limitación física o cognitiva > de 70 a o < de 2)</option>
                                                            <option value="2">Pcte conscientye pero intranquilo(fármacos o invasivos)</option>
                                                            <option value="1">Consciente con inestabilidad en la marcha</option>
                                                            <option value="0">Consciente autónomo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row mt-7">
                                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="form-group ">
                                                        <label class="floating-label-activo-sm">Puntos Dependencia</label>
                                                        <input type="number" class="form-control form-control-sm" style="font-weight:bold;text-align:center" name="ptos_cdep" id="ptos_cdep">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm" for="eval_est_mmgral">Observación y Recomendaciones</label>
                                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="rec_bart" id="rec_bart"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group fill">
                                                    <img src="{{ asset('images/img_urgencia/e_cudyr.png') }}" style="width:80%">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="cudyr_riesgo" role="tabpanel" aria-labelledby="cudyr_riesgo_tab">
                                <div id="contenedor_grupo_musc">
                                    <div id="cudyr">
                                        <form name="sumarcudriesgo">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-6">
                                                    <h6>CUIDADOS RIESGO</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm cud_riesg_sv" for="cud_riesg_sv" >Medición diaria de s. vitales</label>
                                                        <select name="cud_riesg_sv" id="cud_riesg_sv" class="form-control form-control-sm">
                                                            <option selected  value="3">Control 8 veces/día o más</option>
                                                            <option value="2">Control 4-7 veces/día </option>
                                                            <option value="1">Control 2-3 veces/día </option>
                                                            <option value="0">Control 1 vez/día</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm cud_riesg_bh" for="cud_riesg_bh" >Balance Hídrico</label>
                                                        <select name="cud_riesg_bh" id="cud_riesg_bh" class="form-control form-control-sm">
                                                            <option selected  value="3">Balance 6 o mayor/día</option>
                                                            <option value="2">Balance 2-5 veces/día</option>
                                                            <option value="1">Balance 1 vez/día</option>
                                                            <option value="0">No requiere balance hídrico</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm cud_riesg_ox" for="cud_riesg_ox" >Oxigenoterápia (cualquier vía)</label>
                                                        <select name="cud_riesg_ox" id="cud_riesg_ox" class="form-control form-control-sm">
                                                            <option selected  value="3">Administración de Oxigeno por tubo o cánula endotraqueal</option>
                                                            <option  value="2">Administración de Oxigeno por halo máscara, cámara, incubadora</option>
                                                            <option value="1">Administración de Oxigeno por bigotera/option>
                                                            <option value="0">Sin Oxigenoterápia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm cud_riesg_cva" for="cud_riesg_cva" >Cuidados diarios de la vía aérea</label>
                                                        <select name="cud_riesg_cva" id="cud_riesg_cva" class="form-control form-control-sm">
                                                            <option selected  value="3">Paciente con vía aérea artificial</option>
                                                            <option  value="3">Paciente con vía aérea artificial o natural con > de 4 aspiraciones/día</option>
                                                            <option value="2">Paciente con vía aérea  natural con 1-3 aspiraciones/día</option>
                                                            <option value="1">Paciente con vía aérea  natural con 1 apoyo Kinésico/día</option>
                                                            <option value="0">Paciente no requiere apoyo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                 <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm cud_riesg_ip" for="cud_riesg_ip" >Intervenciónes Profesionales</label>
                                                        <select name="cud_riesg_ip" id="cud_riesg_ip" class="form-control form-control-sm">
                                                            <option selected  value="3">1 o más proc. invasivos por médicos en últimas 24 hrs.</option>
                                                            <option value="3">3 o más proc. invasivos por enfermeras en últimas 24 hrs.</option>
                                                            <option value="2">1-2 proc. invasivos por enfermeras en últimas 24 hrs.</option>
                                                            <option value="2">1- o más proc. invasivos por otros profesionales en últimas 24 hrs.</option>
                                                            <option value="0">Sin proc. invasivos en últimas 24 hrs.o</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm cud_riesg_cup " for="cud_riesg_cup" >Cuidados de piél y curaciones </label>
                                                        <select name="cud_riesg_cup" id="cud_riesg_cup" class="form-control form-control-sm">
                                                            <option selected  value="3">Curación o refuerzo de apósitos 3 veces o más/día</option>
                                                            <option value="2">Curación o refuerzo de apósitos 1-2 veces o más/día</option>
                                                            <option value="2">Prevención compleja de lesiones de piél(colchón antiescaras)</option>
                                                            <option value="1">Prevención corriente de lesiones</option>
                                                            <option value="0">No requiere</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                   <div class="form-group">
                                                       <label class="floating-label-activo-sm cud_riesg_far" for="cud_riesg_far" >Administración de Fármacos</label>
                                                       <select name="cud_riesg_far" id="cud_riesg_far" class="form-control form-control-sm">
                                                           <option selected  value="3">Tto intratecal iyectable ev directo o en fleboclisis</option>
                                                           <option value="3">Tto diario con 5 o más por vía inyectable</option>
                                                           <option value="2">Tto no endovenoso(IM SC ID)</option>
                                                           <option value="2">Tto diario 2-4 fármacos por vía no inyectable</option>
                                                           <option value="1">Tto diario 1 fármaco por vía no inyectable</option>
                                                           <option value="0">Sin Tto farmacológico</option>
                                                       </select>
                                                   </div>
                                               </div>
                                               <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                   <div class="form-group">
                                                       <label class="floating-label-activo-sm cud_riesg_einv" for="cud_riesg_einv" >Elementos invasivos </label>
                                                       <select name="cud_riesg_einv" id="cud_riesg_einv" class="form-control form-control-sm">
                                                           <option selected  value="3">3 o más elementos invasivos</option>
                                                           <option value="2">1-2 elementos invasivos</option>
                                                           <option value="2">2 o más vías venosas periféricas</option>
                                                           <option value="0">Sin elementos invasivos</option>
                                                       </select>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="form-row mt-7">
                                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                <div class="form-group ">
                                                    <label class="floating-label-activo-sm">Puntos Riesgo</label>
                                                    {{--  <input type="number" class="form-control form-control-sm" style="font-weight:bold;text-align:center"  name="ptos_criesg" id="ptos_criesg">  --}}
                                                    <input type="text" class="form-control form-control-sm" style="color:red;font-weight:bold;" data-input_igual="ptos_criesg" name="ptos_criesg" id="ptos_criesg" onchange="cargarIgual('ptos_criesg');">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="eval_est_mmgral">Observación y Recomendaciones</label>
                                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="rec_bart" id="rec_bart"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-row">
                                                <div class="form-group fill">
                                                    <img src="{{ asset('images/img_urgencia/e_cudyr.png') }}" style="width:80%;margin-left:15%">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-row mt-7">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm" for="eval_est_mmgral">Observación y Recomendaciones</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="rec_bart" id="rec_bart"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function i_cudyr() {
        $('#cudyr').modal('show');
    }
     /** cudyr dependencia*/
    $("#cud_dep_conf").change(function() {
    cud_depen();
    });

    $("#cud_dep_conmov").change(function() {
    cud_depen();
    });

    $("#cud_dep_al").change(function() {
    cud_depen();
    });

    $("#cud_dep_evac").change(function() {
    cud_depen();
    });

    $("#cud_dep_emoc").change(function() {
    cud_depen();
    });

    $("#cud_dep_rc").change(function() {
    cud_depen();
    });



    function cud_depen() {
        var numero1 = 0, numero2 = 0, numero3 = 0 ,numero4 = 0, numero5 = 0, numero6 = 0;

        caja_cudyr_d = document.forms["sumarcuddependencia"].elements;
        numero1 = parseFloat(caja_cudyr_d["cud_dep_conf"].value);
        numero2 = parseFloat(caja_cudyr_d["cud_dep_conmov"].value);
        numero3 = parseFloat(caja_cudyr_d["cud_dep_al"].value);
        numero4 = parseFloat(caja_cudyr_d["cud_dep_evac"].value);
        numero5 = parseFloat(caja_cudyr_d["cud_dep_emoc"].value);
        numero6 = parseFloat(caja_cudyr_d["cud_dep_rc"].value);

        {{--  console.log('mostrar');
        console.log('barthel');
        console.log('numero1: '+numero1);
        console.log('numero7: '+numero7);
        console.log('numero8: '+numero8);
        console.log('numero9: '+numero9);
        console.log('numero10: '+numero10);
        console.log('numero11: '+numero11);
        console.log('numero12: '+numero12);  --}}

        var resultado = 0;

        if (parseFloat(numero1) >= 0 && parseFloat(numero2) >= 0 && parseFloat(numero3) >= 0 && parseFloat(numero4) >= 0 && parseFloat(numero5) >= 0 && parseFloat(numero6) >= 0) {
            resultado = (parseFloat(numero1) + parseFloat(numero2) + parseFloat(numero3)+ parseFloat(numero4) + parseFloat(numero5) + parseFloat(numero6));
        }
        caja_cudyr_d["ptos_cdep"].value = (resultado);
        $('#puntos_cdep').val(resultado);
            //cargarIgual('ptos_cdep');
        if($('#ptos_cdep').val()<12)
        {
            $('#ptos_cdep').css('color', 'blue');
        }
        else
        {
            $('#ptos_cdep').css('color', 'red');
        }



    }


</script>
<script>

     /** cudyr riesgo*/
    $("#cud_riesg_sv").change(function() {
    cud_riesgo();
    });

    $("#cud_riesg_bh").change(function() {
    cud_riesgo();
    });

    $("#cud_riesg_ox").change(function() {
    cud_riesgo();
    });

    $("#cud_riesg_cva").change(function() {
    cud_riesgo();
    });

    $("#cud_riesg_ip").change(function() {
    cud_riesgo();
    });

    $("#cud_riesg_cup").change(function() {
    cud_riesgo();
    });
    $("#cud_riesg_far").change(function() {
    cud_riesgo();
    });

    $("#cud_riesg_einv").change(function() {
    cud_riesgo();
    });


    function cud_riesgo() {
        var numero1 = 0, numero2 = 0, numero3 = 0 ,numero4 = 0, numero5 = 0, numero6 = 0, numero7 = 0, numero8 = 0;

        caja_cudyr_r = document.forms["sumarcudriesgo"].elements;
        numero1 = parseFloat(caja_cudyr_r["cud_riesg_sv"].value);
        numero2 = parseFloat(caja_cudyr_r["cud_riesg_bh"].value);
        numero3 = parseFloat(caja_cudyr_r["cud_riesg_ox"].value);
        numero4 = parseFloat(caja_cudyr_r["cud_riesg_cva"].value);
        numero5 = parseFloat(caja_cudyr_r["cud_riesg_ip"].value);
        numero6 = parseFloat(caja_cudyr_r["cud_riesg_cup"].value);
        numero5 = parseFloat(caja_cudyr_r["cud_riesg_far"].value);
        numero6 = parseFloat(caja_cudyr_r["cud_riesg_einv"].value);

        {{--  console.log('mostrar');
        console.log('barthel');
        console.log('numero1: '+numero1);
        console.log('numero7: '+numero7);
        console.log('numero8: '+numero8);
        console.log('numero9: '+numero9);
        console.log('numero10: '+numero10);
        console.log('numero11: '+numero11);
        console.log('numero12: '+numero12);  --}}

        var resultado = 0;

        if (parseFloat(numero1) >= 0 && parseFloat(numero2) >= 0 && parseFloat(numero3) >= 0 && parseFloat(numero4) >= 0 && parseFloat(numero5) >= 0&& parseFloat(numero6) >= 0&& parseFloat(numero7) >= 0 && parseFloat(numero8) >= 0) {
            resultado = (parseFloat(numero1) + parseFloat(numero2) + parseFloat(numero3)+ parseFloat(numero4) + parseFloat(numero5) + parseFloat(numero6) + parseFloat(numero7) + parseFloat(numero8));
        }
        caja_cudyr_r["ptos_criesg"].value = (resultado);
        $('#ptos_criesg_').val(resultado);
            {{--  cargarIgual('total_bart');  --}}
        if($('#ptos_criesg_').val()<12)
        {
            $('#ptos_criesg_').css('color', 'blue');
        }
        else
        {
            $('#ptos_criesg_').css('color', 'red');
        }



    }


</script>
