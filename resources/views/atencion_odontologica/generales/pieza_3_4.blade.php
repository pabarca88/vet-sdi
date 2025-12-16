
    {{--  </head>  --}}
    <style>
        #i34{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente34-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla6/periodontograma-dientes-arriba-34.png') }}');
            width:60px;
            background-position: 1px 7px;
            background-repeat: no-repeat;
        }


        #i34b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente34b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla8/periodontograma-dientes-abajo-34b.png') }}');
            width:60px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }
        #d34,#i34,#i34b,#f34,,#ae34-a,#ae34-b:hover{
            background: #E6E6E6;
        }
        #i34-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f34{
            width: 95%;
            height: 18px;

            border: 1px solid #2cdcbf;
            background-repeat: no-repeat;
            float:left;
            display:inline;
        }
        #lineas-gr,#lineas-gr-inf{
            width: 100%;
            height: 160px;
            position:absolute;

            background: url('{{ asset('images/dental/periodontograma/img/fondo-grafico.png') }}') repeat-x;
        }
        #lineas-gr{
            background: url('{{ asset('images/dental/periodontograma/img/fondo-grafico.png') }}') repeat-x;
        }
        #lineas-gr-inf{
            background: url('{{ asset('images/dental/periodontograma/img/fondo-grafico-inf.png') }}') repeat-x;
            margin: 0px 0 0;
        }
        #pi34{
            width: 100%;
        }


        .f34,{
            width: 100%;
            height: 18px;
            background: #f5c6c6;
            border: 1px solid #2cdcbf;
            background-repeat: no-repeat;
            float:left;
            display:inline;
        }
        .titulo{
            text-align: left;
            padding-right: 5px;
            font-weight:bold;
            color:rgb(39, 41, 47);
        }
        .borde{
                border: 1px solid #a4a4a4;
                padding: 1px;
                text-align: center;
            }
        .noborde{



        }

    </style>
     @php
        $pieza34 = $piezas_periodonto->firstWhere('pieza', '34');
        $cuerpo34 = $pieza34 ? $pieza34->cuerpo : [];
        $pronostico34 = $cuerpo34['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl34.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau34.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-34b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-34b.png') }}"/>
                </div>
            </div>

        </div>
    </div>

    <!--LADO IZQ-->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Vestibular (3.4)</h5>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-4">
                                <form name ="grafico1" id="grafico1" action="#">
                                    <table id="tabla" style="width: 100%">
                                        <tbody>
                                            <tr>
                                                <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                                <td colspan="2" class="noborde formulario" style="position: relative;" >
                                                <div id="lineas-gr"></div>

                                                <div id="visualization34a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente34-a"></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>

                            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">

                                <form name ="grafico1" id="grafico1" action="#">
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-6 my-2">
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d34">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i34">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m34" name="m34" value="{{ $cuerpo34["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m34');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi34" id="pi34">
                                                    <option value="B" {{ $pronostico34 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico34 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico34 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico34 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s34-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s34-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s34-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su34-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su34-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su34-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p34-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p34-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p34-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae34" name="ae34" value="{{ $cuerpo34["plataforma"] ?? 0 }}" tabindex="34"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg34-a" name="mg34-a" value="{{ $cuerpo34["vest_altura_mg_a"] ?? 0 }}" onchange="cargar34a();getDefectos();rangoNumeroMargen('mg34-a');cargar34a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg34-b" name="mg34-b" value="{{ $cuerpo34["vest_altura_mg_b"] ?? 0 }}" onchange="cargar34a();getDefectos();rangoNumeroMargen('mg34-b');cargar34a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg34-c" name="mg34-c" value="{{ $cuerpo34["vest_altura_mg_c"] ?? 0 }}" onchange="cargar34a();getDefectos();rangoNumeroMargen('mg34-c');cargar34a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps34-a" name="ps34-a" value="{{ $cuerpo34["vest_psondaje_a"] ?? 0 }}" onchange="cargar34a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps34-b" name="ps34-b" value="{{ $cuerpo34["vest_psondaje_b"] ?? 0 }}" onchange="cargar34a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps34-c" name="ps34-c" value="{{ $cuerpo34["vest_psondaje_c"] ?? 0 }}" onchange="cargar34a();getDefectos();" tabindex="99"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Palatino (3.4)</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-4">
                                <form name ="grafico3" id="grafico3" action="#">
                                    <table id="tabla" style="width: 100%">
                                        <tbody>
                                                <tr>
                                                    <!--<td class="titulo" style="color:#565A5D">Palatino</td>-->
                                                    <td colspan="2" class="noborde">
                                                        <div id="lineas-gr-inf"></div>
                                                        <div id="visualization34b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente34b-a">
                                                            <div id="furca34-a"></div>
                                                            <div id="furca34-b"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                <form class="pl-2" name ="grafico3" id="grafico3" action="#">
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps34b-a" name="ps34b-a" value="{{ $cuerpo34["pala_psondaje_a"] ?? 0 }}" onchange="cargar34b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps34b-b" name="ps34b-a" value="{{ $cuerpo34["pala_psondaje_b"] ?? 0 }}" onchange="cargar34b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps34b-c" name="ps34b-a" value="{{ $cuerpo34["pala_psondaje_c"] ?? 0 }}" onchange="cargar34b();getDefectos();" tabindex="147"//>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg34b-a" name="mg34b-a" value="{{ $cuerpo34["pala_altura_mg_a"] ?? 0 }}" onchange="cargar34b();getDefectos();rangoNumeroMargen('mg34b-a');cargar34b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg34b-b" name="mg34b-b" value="{{ $cuerpo34["pala_altura_mg_b"] ?? 0 }}" onchange="cargar34b();getDefectos();rangoNumeroMargen('mg34b-b');cargar34b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg34b-c" name="mg34b-c" value="{{ $cuerpo34["pala_altura_mg_c"] ?? 0 }}" onchange="cargar34b();getDefectos();rangoNumeroMargen('mg34b-c');cargar34b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s34b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s34b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s34b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su34b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su34b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su34b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p34b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p34b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p34b-c"></div>
                                    </div>
                                </div>

                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group" id="obs_pieza3.4">
                            <label class="floating-label-activo-sm">Obs. Pieza 3.4</label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 3.1" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_34" id="obs_34" placeholder="Describa observaciones">{{ $cuerpo34["observaciones"] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--BOTÓN GUARDAR-->

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza3.4">
                <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('34')"><i class="feather icon-save"></i>  Guardar evaluación 3.4</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar34a();
        cargar34b();

    });
    function rangoNumero(campo){
        var dato=document.getElementById(campo).value;
        dato= parseInt(dato);
        //alert(dato);
        if(dato<(-3) || dato>3){
            alert("El dato de movilidad debe estar comprendido entre -3 y +3");
            document.getElementById(campo).value='0';
        }
    }

    function rangoNumeroMargen(campo){
        var dato=document.getElementById(campo).value;
        dato= parseInt(dato);
        //alert(dato);
        if(dato<(-9) || dato>9){
            alert("El dato de margen gingival debe estar comprendido entre -9 y +9");
            document.getElementById(campo).value='0';
        }

    }

    function drawVisualization34a(data34a) {
        // Create and draw the visualization.
        var ac34a = new google.visualization.AreaChart(document.getElementById('visualization34a'));
        ac34a.draw(data34a, {
        isStacked: true,
        backgroundColor: 'transparent',
        legend: {position: 'none'},
        tooltip: {trigger:'none'},
        axisTitlesPosition: 'none',
        theme: {chartArea: {width: '100%', height: '100%'}},
        width: 40,
        height: 160,
        hAxis: {},
        vAxis: {gridlines: {color: 'transparent', count: 31},baseline:0,textPosition:'none',viewWindowMode: 'explicit',viewWindow: {max:19,min:-12}}
        });

        $('#visualization34a iframe').attr('allowTransparency', 'true');
        $('#visualization34a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar34a(){

        var datoae34=document.getElementById('ae34').value;

        var datomg34a=document.getElementById('mg34-a').value;
        var datomg34b=document.getElementById('mg34-b').value;
        var datomg34c=document.getElementById('mg34-c').value;

        var datops34a=document.getElementById('ps34-a').value;
        var datops34b=document.getElementById('ps34-b').value;
        var datops34c=document.getElementById('ps34-c').value;

        //alert(document.getElementById('ps34-a').value);

        if(datops34a>3){
            document.getElementById('ps34-a').style.color="red";
        }else{
            document.getElementById('ps34-a').style.color="black";
        }
        if(datops34b>3){
            document.getElementById('ps34-b').style.color="red";
        }else{
            document.getElementById('ps34-b').style.color="black";
        }
        if(datops34c>3){
            document.getElementById('ps34-c').style.color="red";
        }else{
            document.getElementById('ps34-c').style.color="black";
        }


        var data34a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg34a)+parseInt(datops34a)),      0-parseInt(datops34a), parseInt(datoae34)],
            ['',    0+(parseInt(datomg34b)+parseInt(datops34b)),      0-parseInt(datops34b), parseInt(datoae34)],
            ['',    0+(parseInt(datomg34c)+parseInt(datops34c)),      0-parseInt(datops34c), parseInt(datoae34)]
        ]);

        drawVisualization34a(data34a);

    }

    function drawVisualization34b(data34b) {

        // Create and draw the visualization.
        var ac34b = new google.visualization.AreaChart(document.getElementById('visualization34b'));
        ac34b.draw(data34b, {
        isStacked: true,
        backgroundColor: 'transparent',
        legend: {position: 'none'},
        tooltip: {trigger:'none'},
        axisTitlesPosition: 'none',
        theme: {chartArea: {width: '100%', height: '100%'}},
        width: 40,
        height: 160,
        hAxis: {},
        vAxis: {gridlines: {color: 'transparent', count: 31},baseline:0,textPosition:'none',viewWindowMode: 'explicit',viewWindow: {max:12,min:-19}}
        });
        $('#visualization34b iframe').attr('allowTransparency', 'true');
        $('#visualization34b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar34b(){

        var datomg34ba=document.getElementById('mg34b-a').value;
        var datomg34bb=document.getElementById('mg34b-b').value;
        var datomg34bc=document.getElementById('mg34b-c').value;

        var datops34ba=document.getElementById('ps34b-a').value;
        var datops34bb=document.getElementById('ps34b-b').value;
        var datops34bc=document.getElementById('ps34b-c').value;

        if(datops34ba>3){
            document.getElementById('ps34b-a').style.color="red";
        }else{
            document.getElementById('ps34b-a').style.color="black";
        }
        if(datops34bb>3){
            document.getElementById('ps34b-b').style.color="red";
        }else{
            document.getElementById('ps34b-b').style.color="black";
        }
        if(datops34bc>3){
            document.getElementById('ps34b-c').style.color="red";
        }else{
            document.getElementById('ps34b-c').style.color="black";
        }

        var data34b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg34ba)+parseInt(datops34ba)),      0+parseInt(datops34ba)],
            ['',    0-(parseInt(datomg34bb)+parseInt(datops34bb)),      0+parseInt(datops34bb)],
            ['',    0-(parseInt(datomg34bc)+parseInt(datops34bc)),      0+parseInt(datops34bc)]
        ]);

        drawVisualization34b(data34b);

    }

    arrstyle = ["i34","f34","f34b-a","f34b-b","s34-a","s34-b","s34-c","p34-a","p34-b","p34-c","s34b-a","s34b-b","s34b-c","p34b-a","p34b-b","p34b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae34').change(function() {
        if(parseInt(document.getElementById('ae34').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar34a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s34-a').toggle(
        function () {
            $(this).css({"background":"#FA5858"});
            totalSangrado++;
            getSangrado();
        },
        function () {
            $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }}')"});
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalSangrado--;
            getSangrado();
        }
    );
    $('#s34-b').toggle(
        function () {
            $(this).css({"background":"#FA5858"});
            totalSangrado++;
            getSangrado();
        },
        function () {
            $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }}')"});
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalSangrado--;
            getSangrado();
        }
    );
    $('#s34-c').toggle(
        function () {
            $(this).css({"background":"#FA5858"});
            totalSangrado++;
            getSangrado();
        },
        function () {
            $(this).css({"background":"url({{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }})"});
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalSangrado--;
            getSangrado();
        }
    );

    $('#s34b-a').toggle(
        function () {
            $(this).css({"background":"#FA5858"});
            totalSangrado++;
            getSangrado();
        },
        function () {
            $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }}')"});
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalSangrado--;
            getSangrado();
        }
    );
    $('#s34b-b').toggle(
        function () {
            $(this).css({"background":"#FA5858"});
            totalSangrado++;
            getSangrado();
        },
        function () {
            $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }}')"});
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalSangrado--;
            getSangrado();
        }
    );
    $('#s34b-c').toggle(
        function () {
            $(this).css({"background":"#FA5858"});
            totalSangrado++;
            getSangrado();
        },
        function () {
            $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }}')"});
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalSangrado--;
            getSangrado();
        }
    );

    //FUNCIONES PARA SUPURACION
    $('#su34-a').toggle(
        function () {
            $(this).css({"background":"#ffba57"});
            totalSupuracion++;
            getSupuracion();
        },
        function () {
            $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/supuracion.png') }}')"});
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalSupuracion--;
            getSupuracion();
        }
    );
    $('#su34-b').toggle(
        function () {
            $(this).css({"background":"#ffba57"});
            totalSupuracion++;
            getSupuracion();
        },
        function () {
            $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/supuracion.png') }}')"});
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalSupuracion--;
            getSupuracion();
        }
    );
    $('#su34-c').toggle(
        function () {
            $(this).css({"background":"#ffba57"});
            totalSupuracion++;
            getSupuracion();
        },
        function () {
            $(this).css({"background":"url({{ asset('images/dental/periodontograma/img/supuracion.png') }})"});
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalSupuracion--;
            getSupuracion();
        }
    );

    $('#su34b-a').toggle(
        function () {
            $(this).css({"background":"#f3e834"});
            totalSupuracion++;
            getSupuracion();
        },
        function () {
            $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/supuracion.png') }}')"});
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalSupuracion--;
            getSupuracion();
        }
    );
    $('#su34b-b').toggle(
        function () {
            $(this).css({"background":"#f3e834"});
            totalSupuracion++;
            getSupuracion();
        },
        function () {
            $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/supuracion.png') }}')"});
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalSupuracion--;
            getSupuracion();
        }
    );
    $('#su34b-c').toggle(
        function () {
            $(this).css({"background":"#f3e834"});
            totalSupuracion++;
            getSupuracion();
        },
        function () {
            $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/supuracion.png') }}')"});
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalSupuracion--;
            getSupuracion();
        }
    );

    //PLACA
    $('#p34-a').toggle(
        function () {
            $(this).css({"background":"#58ACFA"});
            totalPlaca++;
            getPlaca();
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalPlaca--;
            getPlaca();
        }
    );
    $('#p34-b').toggle(
        function () {
            $(this).css({"background":"#58ACFA"});
            totalPlaca++;
            getPlaca();
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalPlaca--;
            getPlaca();
        }
    );
    $('#p34-c').toggle(
        function () {
            $(this).css({"background":"#58ACFA"});
            totalPlaca++;
            getPlaca();
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalPlaca--;
            getPlaca();
        }
    );
    $('#p34b-a').toggle(
        function () {
            $(this).css({"background":"#58ACFA"});
            totalPlaca++;
            getPlaca();
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalPlaca--;
            getPlaca();
        }
    );
    $('#p34b-b').toggle(
        function () {
            $(this).css({"background":"#58ACFA"});
            totalPlaca++;
            getPlaca();
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalPlaca--;
            getPlaca();
        }
    );
    $('#p34b-c').toggle(
        function () {
            $(this).css({"background":"#58ACFA"});
            totalPlaca++;
            getPlaca();
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            totalPlaca--;
            getPlaca();
        }
    );

    //TACHADOS
	$('#d34').toggle(
        function () {
            $('#diente34-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau34.png') }}')");
            $('#diente34-a').css("background-position","1px 7px");
            $('#diente34-a').css("background-repeat","no-repeat");
            $('#m34').prop('disabled', true); // Deshabilita el input con id 'm34'
            $('#i34').prop("disabled",true);
            $('#f34').prop("disabled",true);
            $('#s34-a').prop("disabled",true);
            $('#s34-b').prop("disabled",true);
            $('#s34-c').prop("disabled",true);
            $('#p34-a').prop("disabled",true);
            $('#p34-b').prop("disabled",true);
            $('#p34-c').prop("disabled",true);
            $('#mg34-a').prop("disabled",true);
            $('#mg34-b').prop("disabled",true);
            $('#mg34-c').prop("disabled",true);
            $('#ps34-a').prop("disabled",true);
            $('#ps34-b').prop("disabled",true);
            $('#ps34-c').prop("disabled",true);
            /*$('#furca34').css("background","none");*/
            $('#mg34-a').val('0');
            $('#mg34-b').val('0');
            $('#mg34-c').val('0');
            $('#ps34-a').val('0');
            $('#ps34-b').val('0');
            $('#ps34-c').val('0');

            $('#diente34b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-34b.png') }}')");
            $('#diente34b-a').css("background-position","0 23px");
            $('#diente34b-a').css("background-repeat","no-repeat");
            $('#m34b').prop("disabled",true);
            $('#i34b').prop("disabled",true);
            $('#f34b-a').prop("disabled",true);
            $('#f34b-b').prop("disabled",true);
            $('#s34b-a').prop("disabled",true);
            $('#s34b-b').prop("disabled",true);
            $('#s34b-c').prop("disabled",true);
            $('#p34b-a').prop("disabled",true);
            $('#p34b-b').prop("disabled",true);
            $('#p34b-c').prop("disabled",true);
            $('#mg34b-a').prop("disabled",true);
            $('#mg34b-b').prop("disabled",true);
            $('#mg34b-c').prop("disabled",true);
            $('#ps34b-a').prop("disabled",true);
            $('#ps34b-b').prop("disabled",true);
            $('#ps34b-c').prop("disabled",true);
            $('#mg34b-a').val('0');
            $('#mg34b-b').val('0');
            $('#mg34b-c').val('0');
            $('#ps34b-a').val('0');
            $('#ps34b-b').val('0');
            $('#ps34b-c').val('0');

            $('#furca34').prop("disabled",true);
            $('#furca34-a').prop("disabled",true);
            $('#furca34-b').prop("disabled",true);
            $('#ae34').prop("disabled",true);
            $('#pi34').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar34a();
            cargar34b();

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar34a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getSupuracion();
            getPlaca();

        },
        function () {
            $('#diente34-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-34.png') }}')");
            $('#diente34-a').css("background-position","0 -2px");
            $('#diente34-a').css("background-repeat","no-repeat");
            $('#m34').prop("disabled",false);
            $('#i34').prop("disabled",false);
            $('#f34').prop("disabled",false);
            $('#s34-a').prop("disabled",false);
            $('#s34-b').prop("disabled",false);
            $('#s34-c').prop("disabled",false);
            $('#p34-a').prop("disabled",false);
            $('#p34-b').prop("disabled",false);
            $('#p34-c').prop("disabled",false);
            $('#mg34-a').prop("disabled",false);
            $('#mg34-b').prop("disabled",false);
            $('#mg34-c').prop("disabled",false);
            $('#ps34-a').prop("disabled",false);
            $('#ps34-b').prop("disabled",false);
            $('#ps34-c').prop("disabled",false);

            $('#diente34b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-34b.png') }}')");
            $('#diente34b-a').css("background-position","0 23px");
            $('#diente34b-a').css("background-repeat","no-repeat");
            $('#m34b').prop("disabled",false);
            $('#i34b').prop("disabled",false);
            $('#f34b-a').prop("disabled",false);
            $('#f34b-b').prop("disabled",false);
            $('#s34b-a').prop("disabled",false);
            $('#s34b-b').prop("disabled",false);
            $('#s34b-c').prop("disabled",false);
            $('#p34b-a').prop("disabled",false);
            $('#p34b-b').prop("disabled",false);
            $('#p34b-c').prop("disabled",false);
            $('#mg34b-a').prop("disabled",false);
            $('#mg34b-b').prop("disabled",false);
            $('#mg34b-c').prop("disabled",false);
            $('#ps34b-a').prop("disabled",false);
            $('#ps34b-b').prop("disabled",false);
            $('#ps34b-c').prop("disabled",false);

            $('#furca34').css("display","block");
            $('#furca34-a').css("display","block");
            $('#furca34-b').css("display","block");
            $('#ae34').prop("disabled",false);
            $('#pi34').prop("disabled",false);

            totalDientes++;

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar34a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getPlaca();
        }
    );

    //IMPLANTES
	$('#i34').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f34').css({"background":"#FFFFFF"});
            $('#diente34-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl34.png') }}')");
            $('#diente34-a').css("background-position","1px 7px");
            $('#diente34-a').css("background-repeat","no-repeat");

            $('#diente34b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-34b.png') }}')");
            $('#diente34b-a').css("background-position","0 23px");
            $('#diente34b-a').css("background-repeat","no-repeat");

            $('#furca34').css("background","none");
            $('#furca34-a').css("background","none");
            $('#furca34-b').css("background","none");
            $('#f34').css("background","none");
            $('#f34b-a').css("background","none");
            $('#f34b-b').css("background","none");

            $("#f34").attr("id","f34desact");
            $("#f34b-a").attr("id","f34b-adesact");
            $("#f34b-b").attr("id","f34b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente34-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-34.png') }}')");
            $('#diente34-a').css("background-position","0 -2px");
            $('#diente34-a').css("background-repeat","no-repeat");

            $('#diente34b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-34b.png') }}')");
            $('#diente34b-a').css("background-position","0 23px");
            $('#diente34b-a').css("background-repeat","no-repeat");

            $('#f34').css("background","#FFFFFF");
            $('#f34b-a').css("background","#FFFFFF");
            $('#f34b-b').css("background","#FFFFFF");

            $("#f34desact").attr("id","f34");
            $("#f34b-adesact").attr("id","f34b-a");
            $("#f34b-bdesact").attr("id","f34b-b");
            $('#d34').trigger('click');
        }
	);

    //FURCA
	$('#f34').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i34').css({"background":"#FFFFFF"});
			$('#furca34').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca34').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca34').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca34').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f34b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca34-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca34-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca34-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca34-a').css("background","none");
        }
    );
    $('#f34b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca34-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca34-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca34-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca34-b').css("background","none");
        }
    );




</script>
