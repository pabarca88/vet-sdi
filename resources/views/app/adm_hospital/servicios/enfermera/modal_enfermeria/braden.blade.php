<div id="braden" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="braden" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Escala de Braden </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <h6 class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-2">Fecha del examen</h6>
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-2">
                        <script>
                            var f = new Date();
                            document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear() + " "+" " + f.getHours() + "Hrs." +" "+ f.getMinutes() + "Min." );
                         </script>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group ">
                            <label class="floating-label-activo-sm">Evaluado por:</label>
                            <input type="text" class="form-control form-control-sm" name="resp_braden" id="resp_braden" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div id="barthel">
                            <form name="sumarbraden">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm brad_com " for="brad_com" >Percepción Sensorial</label>
                                            <select name="brad_com" id="brad_com" class="form-control form-control-sm ">
                                                <option selected  value="1">Completamente limitada</option>
                                                <option value="2">Muy limitada</option>
                                                <option value="3">Ligeramente limitada</option>
                                                <option value="4">sin limitaciones</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm brad_hum " for="brad_hum" >Exposición a la humedad</label>
                                            <select name="brad_hum" id="brad_hum" class="form-control form-control-sm ">
                                                <option selected  value="1">Constantemente húmeda</option>
                                                <option value="1">Húmeda con frecuencia</option>
                                                <option value="2">Ocacionalmente húmeda</option>
                                                <option value="3">Raramente húmeda</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm brad_act" for="brad_act" >Actividad</label>
                                            <select name="brad_act" id="brad_act" class="form-control form-control-sm ">
                                                <option selected  value="1">Encamado</option>
                                                <option value="2">En silla</option>
                                                <option value="3">Deambula ocacionalmente</option>
                                                <option value="4">Deambula frecuentemente</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm brad_mot" for="brad_mot" >Movilidad</label>
                                            <select name="brad_mot" id="brad_mot" class="form-control form-control-sm">
                                                <option selected  value="1">Completamente inmovil</option>
                                                <option value="2">Muy limitada</option>
                                                <option value="3">Ligeramente limitada</option>
                                                <option value="4">Sin limitaciones</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm brad_nut" for="brad_nut">Nutrición</label>
                                            <select name="brad_nut" id="brad_nut" class="form-control form-control-sm ">
                                                <option selected  value="1">Muy pobre</option>
                                                <option value="2">Probablemente inadecuada</option>
                                                <option value="3">Adecuada</option>
                                                <option value="4">Excelente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm brad_lc" for="brad_lc" >Riesgo de lesiones cutáneas</label>
                                            <select name="brad_lc" id="brad_lc" class="form-control form-control-sm brad_lc">
                                                <option selected  value="1">Problema</option>
                                                <option value="2">Problema potencial</option>
                                                <option value="3">-No existe problema aparente</option>
                                                <option value="3">-No existe problema </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group ">
                                            <label class="floating-label-activo-sm">Puntaje Braden</label>
                                            <input type="number" class="form-control form-control-sm"style="font-weight:bold;text-align:center" name="total_braden" id="total_braden">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg4 col-xl-4">
                                        <div class="form-group ">

                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <img src="{{ asset('images/img_urgencia/e_braden.png') }}" style="width:80%">
                                        </div>
                                    </div>
                                </div>
                            </form>
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
    function i_braden() {
        $('#braden').modal('show');
    }

     /** Barthel */
    $("#brad_com").change(function() {
    ps_braden();
    });

    $("#brad_hum").change(function() {
    ps_braden();
    });

    $("#brad_act").change(function() {
    ps_braden();
    });

    $("#brad_mot").change(function() {
    ps_braden();
    });

    $("#brad_nut").change(function() {
    ps_braden();
    });

    $("#brad_lc").change(function() {
    ps_braden();
    });



    function ps_braden() {
        var numero1 = 0, numero2 = 0, numero3 = 0 ,numero4 = 0, numero5 = 0, numero6 = 0;

        caja_braden = document.forms["sumarbraden"].elements;
        numero1 = parseFloat(caja_braden["brad_com"].value);
        numero2 = parseFloat(caja_braden["brad_hum"].value);
        numero3 = parseFloat(caja_braden["brad_act"].value);
        numero4 = parseFloat(caja_braden["brad_mot"].value);
        numero5 = parseFloat(caja_braden["brad_nut"].value);
        numero6 = parseFloat(caja_braden["brad_lc"].value);

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
        caja_braden["total_braden"].value = (resultado);
        $('#puntos_braden').val(resultado);
            {{--  cargarIgual('total_bart');  --}}
        if($('#total_braden').val()<12)
        {
            $('#total_braden').css('color', 'red');
        }
        else
        {
            $('#total_braden').css('color', 'blue');
        }
    }

</script>
