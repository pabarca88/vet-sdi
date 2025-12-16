<div id="glasgow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="glasgow" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Escala de Glasgow</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="fun-global" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="glasgow_adult_tab" data-toggle="tab" href="#glasgow_adult" role="tab" aria-controls="glasgow_adult" aria-selected="true">Adulto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="glasgow_nino_tab" data-toggle="tab" href="#glasgow_nino" role="tab" aria-controls="glasgow_nino" aria-selected="false">Niño</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="glasgow_lact_tab" data-toggle="tab" href="#glasgow_lact" role="tab" aria-controls="glasgow_lact" aria-selected="false">Lactante</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="form-group row">
                    <h6 class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-2">Fecha del examen</h6>
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-2">
                        <script>
                            var f = new Date();
                            document.write(f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear());
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
                        <form name="sumarglasgow">
                            <div class="tab-content" id="ex-inferior">
                                <div class="tab-pane fade show active" id="glasgow_adult" role="tabpanel" aria-labelledby="glasgow_adult_tab">
                                    <div id="contenedor_glasgow_adulto">
                                        <div id="glasgow_adulto">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Apertura Ocular</label>
                                                        <select name="g_ad_ao" id="g_ad_ao" class="form-control form-control-sm g_ad_ao" >
                                                            <option selected  value="4">Espontánea</option>
                                                            <option value="3">Al oir una voz</option>
                                                            <option value="2">En respuesta al dolor</option>
                                                            <option value="0">Ninguna</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Mejor respuesta Verbal</label>
                                                        <select name="g_ad_mrv" id="g_ad_mrv" class="form-control form-control-sm g_ad_mrv">
                                                            <option selected  value="5">Orientada</option>
                                                            <option value="4">Confusa</option>
                                                            <option value="3">Palabras Inapropiadas</option>
                                                            <option value="2">Sonidos incomprensibles</option>
                                                            <option value="1">Ninguna</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Mejor respuesta Motriz</label>
                                                        <select name="g_ad_mrm" id="g_ad_mrm" class="form-control form-control-sm g_ad_mrm">
                                                            <option selected  value="5">Obedece</option>
                                                            <option  value="3">Localiza</option>
                                                            <option value="4">Se retira</option>
                                                            <option value="3">Flexión anormal</option>
                                                            <option value="2">Respuesta del extensor</option>
                                                            <option value="1">Ninguna</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-group">
                                                        <h6> La severidad del traumatismo craneoencefálico se determina en función de puntuación total de la Escala de Glasgow:</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-group">
                                                        <p>
                                                            <strong>Leve:</strong> 14 a 15 puntos<br>
                                                            <strong>Moderado:</strong> 9 a 13 puntos<br>
                                                            <strong>Grave:</strong> Menor a 9 puntos<br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-group">
                                                        <h6> En cuanto al nivel de alteración de consciencia (estado de coma), el gradiente varía:</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="form-group">
                                                        <p>
                                                            <strong>Leve:</strong> > 13 puntos. La duración del coma suele ser menor a 20 minutos.<br>
                                                            <strong>Moderado: </strong>9 – 12 puntos. La duración del coma es mayor de 20 minutos y menor de 6 horas tras la admisión del paciente.<br>
                                                            <strong>Grave o severa:</strong> < 8 puntos. La duración del coma es mayor de 6 horas tras la admisión del paciente.<br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="glasgow_nino" role="tabpanel" aria-labelledby="glasgow_nino_tab">
                                    <div id="contenedor_glasgow_nino">
                                        <div id="glasgow_nino">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Apertura Ocular</label>
                                                        <select name="g_nin_ao" id="g_nin_ao" class="form-control form-control-sm g_nin_ao" >
                                                            <option selected  value="4">Espontánea</option>
                                                            <option value="3">Al oir una voz</option>
                                                            <option value="2">En respuesta al dolor</option>
                                                            <option value="0">Ninguna</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Mejor respuesta Verbal</label>
                                                        <select name="g_nin_mrv" id="g_nin_mrv" class="form-control form-control-sm g_nin_mrv">
                                                            <option selected  value="5">Orientada apropiada</option>
                                                            <option value="4">Confusa</option>
                                                            <option value="3">Palabras Inapropiadas</option>
                                                            <option value="2">Palabras incomprensibles Sonidos no específicos</option>
                                                            <option value="1">Ninguna</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Mejor respuesta Motriz</label>
                                                        <select name="g_nin_mrm" id="g_nin_mrm" class="form-control form-control-sm g_nin_mrm">
                                                            <option selected  value="5">Obedece órdenes</option>
                                                            <option  value="3">Localiza estimulos dolorosos</option>
                                                            <option value="4">Se retira en respuesta al dolor</option>
                                                            <option value="3">Flexión en respuesta al dolor</option>
                                                            <option value="2">Extensión en respuesta al dolor</option>
                                                            <option value="1">Ninguna</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Una puntuación <strong>Mayor o igual 12</strong> sugiere un traumatismo encefálico leve. <br> Una puntuación <strong>9-12 </strong>trauma moderado; sugiere la posible necesidad de intubación y ventilación.<br>  Una puntuación<strong> 3 a 8 </strong>indica trauma grave e indica la necesidad de controlar la presión intracraneal.</p>
                                            <p> *Una puntuación ≤ 12 sugiere un traumatismo encefálico grave. Una puntuación < 8 sugiere la posible necesidad de intubación y ventilación. Una puntuación ≤ 6 indica la necesidad de controlar la presión intracraneal.<br>

                                            †Si el paciente está intubado, inconsciente o no habla, la parte más importante de la escala es la respuesta motora. Esta sección debe valorarse con mucho cuidado.<p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="glasgow_lact" role="tabpanel" aria-labelledby="glasgow_lact_tab">
                                    <div id="contenedor_g_lactante">
                                        <div id="g_lactante">
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        {{--  <p type="text-align" name="etiqueta1" class="etiqueta1">  </p>  --}}
                                                        <label class="floating-label-activo-sm">Apertura Ocular</label>
                                                        <select name="glas_lact_ao" id="glas_lact_ao" class="form-control form-control-sm glas_lact_ao" >
                                                            <option selected  value="4">Espontánea</option>
                                                            <option value="3">Al oir una voz</option>
                                                            <option value="2">En respuesta al dolor</option>
                                                            <option value="0">Ninguna</option>
                                                            <option value="4">Otro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Mejor respuesta Verbal</label>
                                                        <select name="glas_lact_mrv" id="glas_lact_mrv" class="form-control form-control-sm glas_lact_mrv">
                                                            <option selected  value="5">Arrullos y balbuceos</option>
                                                            <option value="4">Irritable llanto</option>
                                                            <option value="3">llora en respuesta al dolor</option>
                                                            <option value="2">Gime en respuesta al dolor</option>
                                                            <option value="1">Ninguna</option>
                                                            <option value="4">Otro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                    <div class="form-group">
                                                        <label class="floating-label-activo-sm">Mejor respuesta Motriz</label>
                                                        <select name="glas_lact_mrm" id="glas_lact_mrm" class="form-control form-control-sm glas_lact_mrm">
                                                            <option selected  value="5">Se mueve espontáneamente</option>
                                                            <option  value="3">Se retrae en respuesta al tacto</option>
                                                            <option value="4">Se retira en respuesta al dolor</option>
                                                            <option value="3">Postura de decorticación(flexión anormal en resp al dolor)</option>
                                                            <option value="2">Postura de descerebración(extensión anormal en resp al dolor)</option>
                                                            <option value="1">Ninguna</option>
                                                            <option value="4">Otro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Una puntuación <strong>Mayor o igual 12</strong> sugiere un traumatismo encefálico leve. <br> Una puntuación <strong>9-12 </strong>trauma moderado; sugiere la posible necesidad de intubación y ventilación.<br>  Una puntuación<strong> 3 a 8 </strong>indica trauma grave e indica la necesidad de controlar la presión intracraneal.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row mt-7">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <div class="form-group ">
                                            <label class="floating-label-activo-sm">Puntos</label>
                                            <input type="text" class="form-control form-control-sm" style="color:red;font-weight:bold;" data-input_igual="total_g" name="total" id="total" onchange="cargarIgual('total');">
                                            {{--  <input type="text" class="form-control form-control-sm"style="color:red;" name="total" id="total">  --}}
                                        </div>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm" for="eval_est_mmgral">Observación y Recomendaciones</label>
                                            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=3;" name="rec_bart" id="rec_bart"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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

    var numero1 = 0, numero2 = 0, numero3 = 0 ,numero4 = 0, numero5 = 0, numero6 = 0, numero7 = 0, numero8 = 0, numero9 = 0;
    cajaglasgow = document.forms["sumarglasgow"].elements;

    /** lactancia */
    $(".glas_lact_ao").change(function() {
    numero1 = parseFloat(cajaglasgow["glas_lact_ao"].value);
    mostrarl();
    });

    $(".glas_lact_mrv").change(function() {
    numero2 = parseFloat(cajaglasgow["glas_lact_mrv"].value);
    mostrarl();
    });

    $(".glas_lact_mrm").change(function() {
    numero3 = parseFloat(cajaglasgow["glas_lact_mrm"].value);
    mostrarl();
    });

    /** niños */
    $(".g_nin_ao").change(function() {
    numero4 = parseFloat(cajaglasgow["g_nin_ao"].value);
    mostrarn();
    });

    $(".g_nin_mrv").change(function() {
    numero5 = parseFloat(cajaglasgow["g_nin_mrv"].value);
    mostrarn();
    });

    $(".g_nin_mrm").change(function() {
    numero6 = parseFloat(cajaglasgow["g_nin_mrm"].value);
    mostrarn();
    });

    /** adulto */
    $(".g_ad_ao").change(function() {
    numero7 = parseFloat(cajaglasgow["g_ad_ao"].value);
    mostrara();
    });

    $(".g_ad_mrv").change(function() {
    numero8 = parseFloat(cajaglasgow["g_ad_mrv"].value);
    mostrara();
    });

    $(".g_ad_mrm").change(function() {
    numero9 = parseFloat(cajaglasgow["g_ad_mrm"].value);
    mostrara();
    });



    function mostrarl() {
        {{--  console.log('mostrar');
        console.log('lactante');
        console.log('numero1: '+numero1);
        console.log('numero2: '+numero2);
        console.log('numero3: '+numero3);  --}}

        var resultado = 0;

        if (parseInt(numero1) >= 0 && parseInt(numero2) >= 0 && parseInt(numero3) >= 0 ) {
            resultado = (parseInt(numero1) + parseInt(numero2) + parseInt(numero3) );
        }

        cajaglasgow["total"].value = (resultado);
        cargarIgual('total');
    }

    function mostrarn() {
        {{--  console.log('mostrar');
        console.log('niños');
        console.log('numero4: '+numero4);
        console.log('numero5: '+numero5);
        console.log('numero6: '+numero6);  --}}

        var resultado = 0;

        if (parseInt(numero4) >= 0 && parseInt(numero5) >= 0 && parseInt(numero6) >= 0 ) {
            resultado = (parseInt(numero4) + parseInt(numero5) + parseInt(numero6) );
        }

        cajaglasgow["total"].value = (resultado);
        cargarIgual('total');
    }

    function mostrara() {
        {{--  console.log('mostrar');
        console.log('adulto');
        console.log('numero7: '+numero7);
        console.log('numero8: '+numero8);
        console.log('numero9: '+numero9);  --}}

        var resultado = 0;

        if (parseInt(numero7) >= 0 && parseInt(numero8) >= 0 && parseInt(numero9) >= 0 ) {
            resultado = (parseInt(numero7) + parseInt(numero8) + parseInt(numero9) );
        }

        cajaglasgow["total"].value = (resultado);
        cargarIgual('total');
    }



</script>
 {{--  <script>
                                                     //Este método hace que al estar listo el documento se ejecuten los métodos
                                                        function ready(fn) {
                                                            if (document.readyState != 'loading'){
                                                            fn();
                                                            } else {
                                                            document.addEventListener('DOMContentLoaded', fn);
                                                            }
                                                        }
                                                        // En esta variable se guardaran todos los elegidos
                                                        var valores = {};
                                                        var sumaTotal = 0;

                                                        // Metodo para agregar el "onchange" y hacer la magia
                                                        function agregarListeners(){
                                                                var listas = document.getElementsByTagName("select");

                                                            //Activar RecolectarElegidos cada que se detecte un cambio
                                                            for (var i = 0; i < listas.length; i++) {
                                                                listas[i].addEventListener("change", RecolectarElegidos, false);
                                                            }
                                                        }

                                                        // Método que busca en todas las listas los elementos Elegidos
                                                        function RecolectarElegidos(elemento){
                                                            var _listaQueSeCambio = elemento.target;
                                                            var _seleccionados = _listaQueSeCambio.selectedOptions;
                                                            var _nombreLista = _listaQueSeCambio.name;
                                                            var _temporal = [];

                                                            for(var i = 0; i < _seleccionados.length; i++){
                                                            var _valorSeleccionado = _seleccionados[i].value;
                                                            var _valorCantidad = 0;
                                                            console.warn(_seleccionados[i].value);

                                                            if(_valorSeleccionado == 'A'){
                                                                _valorCantidad = 5;
                                                            } else if(_valorSeleccionado == 'B'){
                                                                _valorCantidad = 10;
                                                            } else if(_valorSeleccionado == 'C'){
                                                                _valorCantidad = 7;
                                                            }

                                                            var _temp = {
                                                                valorLetra: _valorSeleccionado,
                                                                valorCantidad: _valorCantidad
                                                            }

                                                            _temporal.push(_temp);
                                                            }

                                                            //Guardamos los valores recolectados
                                                            valores[_nombreLista] = _temporal;

                                                            // Una vez que tenemos todo recolectado, hay que ir a sumarlos
                                                            calcularSuma(valores);
                                                        }

                                                        // Dados valores recolectados los recorre y suma
                                                        function calcularSuma(valores){
                                                            var _cantidad = 0

                                                            for(var indice in valores){
                                                            for(var i = 0; i < valores[indice].length; i++){
                                                                _cantidad += valores[indice][i].valorCantidad;
                                                            }
                                                            }

                                                            // Guardar la suma en nuestra variable global
                                                            sumaTotal = _cantidad;

                                                            //Opcional mostrarlos en pantalla
                                                            mostrarElegidos();
                                                        }

                                                        //Este método es para mostrar que valores se elegieron y la suma, aunque realmente no es necesario solo para la demostraión
                                                        function mostrarElegidos(){
                                                            var _divResultados = document.getElementById('resultados');
                                                            _divResultados.innerHTML = '<strong>Suma Total: </strong> ' + sumaTotal +
                                                                                        '<hr>' +
                                                                                        '<pre>' + JSON.stringify(valores, null, 2) + '</pre>';

                                                        }
                                                  </script>  --}}
<script>
    function i_glasgow(){
        $('#glasgow').modal('show');
    }

</script>
