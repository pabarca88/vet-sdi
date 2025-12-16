<div id="m_barthel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_barthel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Indice de Barthel </h5>
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
                            <input type="text" class="form-control form-control-sm" name="resp_bart" id="resp_bart">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div id="barthel">
                            <form name="sumarbarthel">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm bart_com" for="bart_com" >Comer</label>
                                            <select name="bart_com" id="bart_com" class="form-control form-control-sm">
                                                <option selected  value="10">Independiente</option>
                                                <option value="5">Necesita ayuda para cortar carne pan etc.</option>
                                                <option value="0">Dependiente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm bart_lav" for="bart_lav" >Lavarse</label>
                                            <select name="bart_lav" id="bart_lav" class="form-control form-control-sm">
                                                <option selected  value="5">Independiente entra y sale del baño</option>
                                                <option value="0">Dependiente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm bart_vest" for="bart_vest" >Vestirse</label>
                                            <select name="bart_vest" id="bart_vest" class="form-control form-control-sm">
                                                <option selected  value="10">Independiente capaz de ponerse y quitarse la ropa abotonarse atar sus zapatos</option>
                                                <option value="5">Necesita Ayuda </option>
                                                <option value="0">Dependiente</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm bart_arr " for="bart_arr" >Arreglarse</label>
                                            <select name="bart_arr" id="bart_arr" class="form-control form-control-sm">
                                                <option selected  value="5">-Independiente para lavarse las manos peinarse afeitarse etc.</option>
                                                <option value="0">Dependiente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm" for="bart_dep" >Deposiciones</label>
                                            <select name="bart_dep" id="bart_dep" class="form-control form-control-sm">
                                                <option selected  value="10">Continente</option>
                                                <option value="5">Incontinencia ocacionnal Necesita Ayuda para para adm sup o lavados</option>
                                                <option value="0">Incontinente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm bart_micc" for="bart_micc" >Micción</label>
                                            <select name="bart_micc" id="bart_micc" class="form-control form-control-sm">
                                                <option selected  value="10">-Continente o es capaz de cuidarse la sonda</option>
                                                <option value="5">-Ocacionalmente (máx 1 episodio incontinencia en 24 hrs.)necesita ayuda para cuidar sonda</option>
                                                <option value="0">-Dependiente</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm bart_retr" for="bart_retr" >Usar Retrete</label>
                                            <select name="bart_retr" id="bart_retr" class="form-control form-control-sm">
                                                <option selected  value="10">Independiente para ir al wc quitarse y ponerse la ropa</option>
                                                <option value="5">Necesita Ayuda para ir al wc pero se limpia solo</option>
                                                <option value="0">Dependiente</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm bart_trasl" for="bart_trasl" >Trasladarse</label>
                                            <select name="bart_trasl" id="bart_trasl" class="form-control form-control-sm">
                                                <option selected  value="15">Independiente para ir del sillón a la cama</option>
                                                <option value="10">M{inima ayuda física o supervisión}</option>
                                                <option value="5">Gran ayuda pero es capaz de mantenerse sentado sin ayuda</option>
                                                <option value="0">Dependiente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm bart_deamb" for="bart_deamb" >Deambular</label>
                                            <select name="bart_deamb" id="bart_deamb" class="form-control form-control-sm">
                                                <option selected  value="15">Independiente camina solo 50 mts</option>
                                                <option value="10">Necesita Ayuda física o supervisión caminar solo 50 mts</option>
                                                <option value="5">Independiente en silla ruedas sin ayuda</option>
                                                <option value="0">Dependiente</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm bart_esc" for="bart_esc" >Escalones</label>
                                            <select name="bart_esc" id="bart_esc" class="form-control form-control-sm">
                                                <option selected  value="10">Independiente para subir y bajar escaleras</option>
                                                <option value="5">Necesita Ayuda física o supervisión</option>
                                                <option value="0">Dependiente</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group ">
                                            <label class="floating-label-activo-sm">Puntaje Barthel</label>
                                            <input type="number" class="form-control form-control-sm" style="font-weight:bold;text-align:center" name="total_bart" id="total_bart">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group fill">
                                        <img src="{{ asset('images/img_urgencia/e_barthel.png') }}" style="width:80%">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
                <button type="button" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function i_barthel(){
        $('#m_barthel').modal('show');
    }

     /** Barthel */
    $("#bart_com").change(function() {
    ps_barthel();
    });

    $("#bart_lav").change(function() {
    ps_barthel();
    });

    $("#bart_vest").change(function() {
    ps_barthel();
    });

    $("#bart_ar").change(function() {
    ps_barthel();
    });

    $("#bart_dep").change(function() {
    ps_barthel();
    });

    $("#bart_micc").change(function() {
    ps_barthel();
    });

    $("#bart_retr").change(function() {
    ps_barthel();
    });

    $("#bart_trasl").change(function() {
    ps_barthel();
    });

    $("#bart_deamb").change(function() {
    ps_barthel();
    });

    $("#bart_esc").change(function() {
    ps_barthel();
    });

    function ps_barthel() {
        var numero1 = 0, numero2 = 0, numero3 = 0 ,numero4 = 0, numero5 = 0, numero6 = 0,
        numero7 = 0, numero8 = 0, numero9 = 0 ,numero10 = 0;
        caja_barthel = document.forms["sumarbarthel"].elements;
        numero1 = parseFloat(caja_barthel["bart_com"].value);
        numero2 = parseFloat(caja_barthel["bart_lav"].value);
        numero3 = parseFloat(caja_barthel["bart_vest"].value);
        numero4 = parseFloat(caja_barthel["bart_arr"].value);
        numero5 = parseFloat(caja_barthel["bart_dep"].value);
        numero6 = parseFloat(caja_barthel["bart_micc"].value);
        numero7= parseFloat(caja_barthel["bart_retr"].value);
        numero8 = parseFloat(caja_barthel["bart_trasl"].value);
        numero9 = parseFloat(caja_barthel["bart_deamb"].value);
        numero10 = parseFloat(caja_barthel["bart_esc"].value);
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

        if (parseFloat(numero1) >= 0 && parseFloat(numero2) >= 0 && parseFloat(numero3) >= 0 && parseFloat(numero4) >= 0 && parseFloat(numero5) >= 0 && parseFloat(numero6) >= 0 && parseFloat(numero7) >= 0 && parseFloat(numero8) >= 0 && parseFloat(numero9) >= 0 && parseFloat(numero10) >= 0) {
            resultado = (parseFloat(numero1) + parseFloat(numero2) + parseFloat(numero3)+ parseFloat(numero4) + parseFloat(numero5) + parseFloat(numero6) + parseFloat(numero7) + parseFloat(numero8) + parseFloat(numero9) + parseFloat(numero10));
        }
        caja_barthel["total_bart"].value = (resultado);
            {{--  cargarIgual('total_bart');  --}}
        if($('#total_bart').val()>60)
        {
            $('#total_bart').css('color', 'blue');
        }
        else
        {
            $('#total_bart').css('color', 'red');
        }
    }

</script>
