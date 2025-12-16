<div id="caidas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="caidas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Escala de Riesgo de caídas J.H.DOWNTON </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
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
                            <input type="text" class="form-control form-control-sm" name="resp_cai" id="resp_cai" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div id="caidas">
                            <form name="sumarcaidas">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm caid_prev" for="caid_prev" >Caídas previas</label>
                                            <select name="caid_prev" id="caid_prev" class="form-control form-control-sm">
                                                <option selected  value="0">No</option>
                                                <option value="1">Si</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm caid_med" for="caid_med" >Medicamentos</label>
                                            <select name="caid_med" id="caid_med" class="form-control form-control-sm">
                                                <option selected  value="0">Ninguno</option>
                                                <option value="1">Tranquilizantes-sedantes antidepresivos diuréticos antiparkinson</option>
                                                <option value="1">Anestésia</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm caid_sm" for="caid_sm" >Deficits sensitivo-motor</label>
                                            <select name="caid_sm" id="caid_sm" class="form-control form-control-sm">
                                                <option selected  value="0">Ninguno</option>
                                                <option value="1">Alteraciones visuales</option>
                                                <option value="1">Alteraciones auditívas</option>
                                                <option value="1">Alt extremidades paresia paralisis</option>
                                                <option value="5">Otro</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm caid_em" for="caid_em" >Estado mental</label>
                                            <select name="caid_em" id="caid_em" class="form-control form-control-sm">
                                                <option selected  value="0">Orientado</option>
                                                <option value="1">Confuso</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm caid_deam" for="caid_deam" >Deambulación</label>
                                            <select name="caid_deam" id="caid_deam" class="form-control form-control-sm">
                                                <option selected  value="0">Deambulación normal</option>
                                                <option value="1">Segura con ayuda</option>
                                                <option value="1">Insegura con o sin ayuda</option>
                                                <option value="1">Imposible</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm caid_ed" for="caid_ed" >Edad</label>
                                            <select name="caid_ed" id="caid_ed" class="form-control form-control-sm">
                                                <option selected  value="0">< 70 años</option>
                                                <option value="1"> > de 70 años</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group ">
                                            <label class="floating-label-activo-sm">Puntos riesgo caída</label>
                                            <input type="number" class="form-control form-control-sm" style="font-weight:bold;text-align:center" name="total_caid" id="total_caid">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg2 col-xl-2">
                                        <div class="form-group ">

                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                           <h6>ALTO RIESGO MAYOR A 2 PUNTOS</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm" for="eval_est_mmgral">Observación y Recomendaciones</label>
                                            <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="rec_bart" id="rec_bart"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
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
    function i_caidas() {
        $('#caidas').modal('show');
    }

     /** Barthel */
    $("#caid_prev").change(function() {
    ps_caidas();
    });

    $("#caid_med").change(function() {
    ps_caidas();
    });

    $("#caid_sm").change(function() {
    ps_caidas();
    });

    $("#caid_em").change(function() {
    ps_caidas();
    });

    $("#caid_deam").change(function() {
    ps_caidas();
    });

    $("#caid_ed").change(function() {
    ps_caidas();
    });



    function ps_caidas() {
        var numero1 = 0, numero2 = 0, numero3 = 0 ,numero4 = 0, numero5 = 0, numero6 = 0;

        caja_caid = document.forms["sumarcaidas"].elements;
        numero1 = parseFloat(caja_caid["caid_prev"].value);
        numero2 = parseFloat(caja_caid["caid_med"].value);
        numero3 = parseFloat(caja_caid["caid_sm"].value);
        numero4 = parseFloat(caja_caid["caid_em"].value);
        numero5 = parseFloat(caja_caid["caid_deam"].value);
        numero6 = parseFloat(caja_caid["caid_ed"].value);

        console.log('mostrar');
        console.log('barthel');
        console.log('numero1: '+numero1);
        console.log('numero7: '+numero7);

        var resultado = 0;

        if (parseFloat(numero1) >= 0 && parseFloat(numero2) >= 0 && parseFloat(numero3) >= 0 && parseFloat(numero4) >= 0 && parseFloat(numero5) >= 0 && parseFloat(numero6) >= 0) {
            resultado = (parseFloat(numero1) + parseFloat(numero2) + parseFloat(numero3)+ parseFloat(numero4) + parseFloat(numero5) + parseFloat(numero6));
        }
        caja_caid["total_caid"].value = (resultado);
        $('#puntos_riesgo_caida').val(resultado);
        cargarIgual('total_bart');  


        if($('#total_caid').val()<2)
        {
            $('#total_caid').css('color', 'blue');
        }
        else
        {
            $('#total_caid').css('color', 'red');
        }
    }

</script>
