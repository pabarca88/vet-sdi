
    {{--  </head>  --}}
    <style>
        #i33{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente33-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla6/periodontograma-dientes-arriba-33.png') }}');
            width:54px;
            background-position: 1px 9px;
            background-repeat: no-repeat;
        }


        #i33b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente33b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla8/periodontograma-dientes-abajo-33b.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }
        #d33,#i33,#i33b,#f33,,#ae33-a,#ae33-b:hover{
            background: #E6E6E6;
        }
        #i33-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f33{
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
        #pi33{
            width: 100%;
        }


        .f33,{
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
        $pieza33 = $piezas_periodonto->firstWhere('pieza', '33');
        $cuerpo33 = $pieza33 ? $pieza33->cuerpo : [];
        $pronostico33 = $cuerpo33['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl33.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau33.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-33b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-33b.png') }}"/>
                </div>
            </div>

        </div>
    </div>

    <!--LADO IZQ-->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Vestibular (3.3)</h5>
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

                                                <div id="visualization33a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente33-a"></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d33">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i33">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m33" name="m33" value="{{ $cuerpo33["movilidadd"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m33');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi33" id="pi33">
                                                    <option value="B" {{ $pronostico33 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico33 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico33 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico33 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s33-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s33-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s33-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su33-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su33-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su33-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p33-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p33-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p33-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae33" name="ae33" value="{{ $cuerpo33["plataforma"] ?? 0 }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg33-a" name="mg33-a" value="{{ $cuerpo33["vest_altura_mg_a"] ?? 0 }}" onchange="cargar33a();getDefectos();rangoNumeroMargen('mg33-a');cargar33a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg33-b" name="mg33-b" value="{{ $cuerpo33["vest_altura_mg_b"] ?? 0 }}" onchange="cargar33a();getDefectos();rangoNumeroMargen('mg33-b');cargar33a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg33-c" name="mg33-c" value="{{ $cuerpo33["vest_altura_mg_c"] ?? 0 }}" onchange="cargar33a();getDefectos();rangoNumeroMargen('mg33-c');cargar33a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps33-a" name="ps33-a" value="{{ $cuerpo33["vest_psondaje_a"] ?? 0 }}" onchange="cargar33a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps33-b" name="ps33-b" value="{{ $cuerpo33["vest_psondaje_b"] ?? 0 }}" onchange="cargar33a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps33-c" name="ps33-c" value="{{ $cuerpo33["vest_psondaje_c"] ?? 0 }}" onchange="cargar33a();getDefectos();" tabindex="99"/>
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
                <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Palatino (3.3)</h5>
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
                                                        <div id="visualization33b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente33b-a">
                                                            <div id="furca33-a"></div>
                                                            <div id="furca33-b"></div>
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
                                            <input class="form-control form-control-xs" type="number" id="ps33b-a" name="ps33b-a" value="{{ $cuerpo33["pala_psondaje_a"] ?? 0 }}" onchange="cargar33b();getDefectos();" tabindex="145"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps33b-b" name="ps33b-a" value="{{ $cuerpo33["pala_psondaje_b"] ?? 0 }}" onchange="cargar33b();getDefectos();" tabindex="146"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps33b-c" name="ps33b-a" value="{{ $cuerpo33["pala_psondaje_c"] ?? 0 }}" onchange="cargar33b();getDefectos();" tabindex="147"//>
                                        </div>
                                    </div>
                                     <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg33b-a" name="mg33b-a" value="{{ $cuerpo33["pala_altura_mg_a"] ?? 0 }}" onchange="cargar33b();getDefectos();rangoNumeroMargen('mg33b-a');cargar33b();" tabindex="193"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg33b-b" name="mg33b-b" value="{{ $cuerpo33["pala_altura_mg_b"] ?? 0 }}" onchange="cargar33b();getDefectos();rangoNumeroMargen('mg33b-b');cargar33b();" tabindex="194"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg33b-c" name="mg33b-c" value="{{ $cuerpo33["pala_altura_mg_c"] ?? 0 }}" onchange="cargar33b();getDefectos();rangoNumeroMargen('mg33b-c');cargar33b();" tabindex="195"/>
                                        </div>
                                    </div>
                                     <div class="form-row mb-2">
                                            <div class="col-sm-12 col-md-4">
                                                <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                            </div>
                                            <div class="col">
                                                <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s33b-a"></div>
                                            </div>
                                            <div class="col">
                                                <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s33b-b" ></div>
                                            </div>
                                            <div class="col">
                                                <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s33b-c"></div>
                                            </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su33b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su33b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su33b-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p33b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p33b-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p33b-c"></div>
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
                        <div class="form-group" id="obs_pieza3.3">
                            <label class="floating-label-activo-sm">Obs. Pieza 3.3</label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 3.3" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_33" id="obs_33" placeholder="Describa observaciones">{{ $cuerpo33["observaciones"] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--BOTÓN GUARDAR-->
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza3.3">
                <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('33')"><i class="feather icon-save"></i>  Guardar evaluación 3.3</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar33a();
        cargar33b();

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

    function drawVisualization33a(data33a) {
        // Create and draw the visualization.
        var ac33a = new google.visualization.AreaChart(document.getElementById('visualization33a'));
        ac33a.draw(data33a, {
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

        $('#visualization33a iframe').attr('allowTransparency', 'true');
        $('#visualization33a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar33a(){

        var datoae33=document.getElementById('ae33').value;

        var datomg33a=document.getElementById('mg33-a').value;
        var datomg33b=document.getElementById('mg33-b').value;
        var datomg33c=document.getElementById('mg33-c').value;

        var datops33a=document.getElementById('ps33-a').value;
        var datops33b=document.getElementById('ps33-b').value;
        var datops33c=document.getElementById('ps33-c').value;

        //alert(document.getElementById('ps33-a').value);

        if(datops33a>3){
            document.getElementById('ps33-a').style.color="red";
        }else{
            document.getElementById('ps33-a').style.color="black";
        }
        if(datops33b>3){
            document.getElementById('ps33-b').style.color="red";
        }else{
            document.getElementById('ps33-b').style.color="black";
        }
        if(datops33c>3){
            document.getElementById('ps33-c').style.color="red";
        }else{
            document.getElementById('ps33-c').style.color="black";
        }


        var data33a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg33a)+parseInt(datops33a)),      0-parseInt(datops33a), parseInt(datoae33)],
            ['',    0+(parseInt(datomg33b)+parseInt(datops33b)),      0-parseInt(datops33b), parseInt(datoae33)],
            ['',    0+(parseInt(datomg33c)+parseInt(datops33c)),      0-parseInt(datops33c), parseInt(datoae33)]
        ]);

        drawVisualization33a(data33a);

    }

    function drawVisualization33b(data33b) {

        // Create and draw the visualization.
        var ac33b = new google.visualization.AreaChart(document.getElementById('visualization33b'));
        ac33b.draw(data33b, {
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
        $('#visualization33b iframe').attr('allowTransparency', 'true');
        $('#visualization33b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar33b(){

        var datomg33ba=document.getElementById('mg33b-a').value;
        var datomg33bb=document.getElementById('mg33b-b').value;
        var datomg33bc=document.getElementById('mg33b-c').value;

        var datops33ba=document.getElementById('ps33b-a').value;
        var datops33bb=document.getElementById('ps33b-b').value;
        var datops33bc=document.getElementById('ps33b-c').value;

        if(datops33ba>3){
            document.getElementById('ps33b-a').style.color="red";
        }else{
            document.getElementById('ps33b-a').style.color="black";
        }
        if(datops33bb>3){
            document.getElementById('ps33b-b').style.color="red";
        }else{
            document.getElementById('ps33b-b').style.color="black";
        }
        if(datops33bc>3){
            document.getElementById('ps33b-c').style.color="red";
        }else{
            document.getElementById('ps33b-c').style.color="black";
        }

        var data33b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg33ba)+parseInt(datops33ba)),      0+parseInt(datops33ba)],
            ['',    0-(parseInt(datomg33bb)+parseInt(datops33bb)),      0+parseInt(datops33bb)],
            ['',    0-(parseInt(datomg33bc)+parseInt(datops33bc)),      0+parseInt(datops33bc)]
        ]);

        drawVisualization33b(data33b);

    }

    arrstyle = ["i33","f33","f33b-a","f33b-b","s33-a","s33-b","s33-c","p33-a","p33-b","p33-c","s33b-a","s33b-b","s33b-c","p33b-a","p33b-b","p33b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae33').change(function() {
        if(parseInt(document.getElementById('ae33').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar33a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s33-a').toggle(
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
    $('#s33-b').toggle(
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
    $('#s33-c').toggle(
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

    $('#s33b-a').toggle(
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
    $('#s33b-b').toggle(
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
    $('#s33b-c').toggle(
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
    $('#su33-a').toggle(
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
    $('#su33-b').toggle(
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
    $('#su33-c').toggle(
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

    $('#su33b-a').toggle(
        function () {
            $(this).css({"background":"#f3e833"});
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
    $('#su33b-b').toggle(
        function () {
            $(this).css({"background":"#f3e833"});
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
    $('#su33b-c').toggle(
        function () {
            $(this).css({"background":"#f3e833"});
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
    $('#p33-a').toggle(
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
    $('#p33-b').toggle(
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
    $('#p33-c').toggle(
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
    $('#p33b-a').toggle(
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
    $('#p33b-b').toggle(
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
    $('#p33b-c').toggle(
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
	$('#d33').toggle(
        function () {
            $('#diente33-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau33.png') }}')");
            $('#diente33-a').css("background-position","1px 9px");
            $('#diente33-a').css("background-repeat","no-repeat");
            $('#m33').prop('disabled', true); // Deshabilita el input con id 'm33'
            $('#i33').prop("disabled",true);
            $('#f33').prop("disabled",true);
            $('#s33-a').prop("disabled",true);
            $('#s33-b').prop("disabled",true);
            $('#s33-c').prop("disabled",true);
            $('#p33-a').prop("disabled",true);
            $('#p33-b').prop("disabled",true);
            $('#p33-c').prop("disabled",true);
            $('#mg33-a').prop("disabled",true);
            $('#mg33-b').prop("disabled",true);
            $('#mg33-c').prop("disabled",true);
            $('#ps33-a').prop("disabled",true);
            $('#ps33-b').prop("disabled",true);
            $('#ps33-c').prop("disabled",true);
            /*$('#furca33').css("background","none");*/
            $('#mg33-a').val('0');
            $('#mg33-b').val('0');
            $('#mg33-c').val('0');
            $('#ps33-a').val('0');
            $('#ps33-b').val('0');
            $('#ps33-c').val('0');

            $('#diente33b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-33b.png') }}')");
            $('#diente33b-a').css("background-position","0 23px");
            $('#diente33b-a').css("background-repeat","no-repeat");
            $('#m33b').prop("disabled",true);
            $('#i33b').prop("disabled",true);
            $('#f33b-a').prop("disabled",true);
            $('#f33b-b').prop("disabled",true);
            $('#s33b-a').prop("disabled",true);
            $('#s33b-b').prop("disabled",true);
            $('#s33b-c').prop("disabled",true);
            $('#p33b-a').prop("disabled",true);
            $('#p33b-b').prop("disabled",true);
            $('#p33b-c').prop("disabled",true);
            $('#mg33b-a').prop("disabled",true);
            $('#mg33b-b').prop("disabled",true);
            $('#mg33b-c').prop("disabled",true);
            $('#ps33b-a').prop("disabled",true);
            $('#ps33b-b').prop("disabled",true);
            $('#ps33b-c').prop("disabled",true);
            $('#mg33b-a').val('0');
            $('#mg33b-b').val('0');
            $('#mg33b-c').val('0');
            $('#ps33b-a').val('0');
            $('#ps33b-b').val('0');
            $('#ps33b-c').val('0');

            $('#furca33').prop("disabled",true);
            $('#furca33-a').prop("disabled",true);
            $('#furca33-b').prop("disabled",true);
            $('#ae33').prop("disabled",true);
            $('#pi33').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar33a();
            cargar33b();

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar33a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getSupuracion();
            getPlaca();

        },
        function () {
            $('#diente33-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-33.png') }}')");
            $('#diente33-a').css("background-position","0 -2px");
            $('#diente33-a').css("background-repeat","no-repeat");
            $('#m33').prop("disabled",false);
            $('#i33').prop("disabled",false);
            $('#f33').prop("disabled",false);
            $('#s33-a').prop("disabled",false);
            $('#s33-b').prop("disabled",false);
            $('#s33-c').prop("disabled",false);
            $('#p33-a').prop("disabled",false);
            $('#p33-b').prop("disabled",false);
            $('#p33-c').prop("disabled",false);
            $('#mg33-a').prop("disabled",false);
            $('#mg33-b').prop("disabled",false);
            $('#mg33-c').prop("disabled",false);
            $('#ps33-a').prop("disabled",false);
            $('#ps33-b').prop("disabled",false);
            $('#ps33-c').prop("disabled",false);

            $('#diente33b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-33b.png') }}')");
            $('#diente33b-a').css("background-position","0 23px");
            $('#diente33b-a').css("background-repeat","no-repeat");
            $('#m33b').prop("disabled",false);
            $('#i33b').prop("disabled",false);
            $('#f33b-a').prop("disabled",false);
            $('#f33b-b').prop("disabled",false);
            $('#s33b-a').prop("disabled",false);
            $('#s33b-b').prop("disabled",false);
            $('#s33b-c').prop("disabled",false);
            $('#p33b-a').prop("disabled",false);
            $('#p33b-b').prop("disabled",false);
            $('#p33b-c').prop("disabled",false);
            $('#mg33b-a').prop("disabled",false);
            $('#mg33b-b').prop("disabled",false);
            $('#mg33b-c').prop("disabled",false);
            $('#ps33b-a').prop("disabled",false);
            $('#ps33b-b').prop("disabled",false);
            $('#ps33b-c').prop("disabled",false);

            $('#furca33').css("display","block");
            $('#furca33-a').css("display","block");
            $('#furca33-b').css("display","block");
            $('#ae33').prop("disabled",false);
            $('#pi33').prop("disabled",false);

            totalDientes++;

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar33a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getPlaca();
        }
    );

    //IMPLANTES
	$('#i33').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f33').css({"background":"#FFFFFF"});
            $('#diente33-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl33.png') }}')");
            $('#diente33-a').css("background-position","1px 9px");
            $('#diente33-a').css("background-repeat","no-repeat");

            $('#diente33b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-33b.png') }}')");
            $('#diente33b-a').css("background-position","0 23px");
            $('#diente33b-a').css("background-repeat","no-repeat");

            $('#furca33').css("background","none");
            $('#furca33-a').css("background","none");
            $('#furca33-b').css("background","none");
            $('#f33').css("background","none");
            $('#f33b-a').css("background","none");
            $('#f33b-b').css("background","none");

            $("#f33").attr("id","f33desact");
            $("#f33b-a").attr("id","f33b-adesact");
            $("#f33b-b").attr("id","f33b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente33-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-33.png') }}')");
            $('#diente33-a').css("background-position","0 -2px");
            $('#diente33-a').css("background-repeat","no-repeat");

            $('#diente33b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-33b.png') }}')");
            $('#diente33b-a').css("background-position","0 23px");
            $('#diente33b-a').css("background-repeat","no-repeat");

            $('#f33').css("background","#FFFFFF");
            $('#f33b-a').css("background","#FFFFFF");
            $('#f33b-b').css("background","#FFFFFF");

            $("#f33desact").attr("id","f33");
            $("#f33b-adesact").attr("id","f33b-a");
            $("#f33b-bdesact").attr("id","f33b-b");
            $('#d33').trigger('click');
        }
	);

    //FURCA
	$('#f33').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i33').css({"background":"#FFFFFF"});
			$('#furca33').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca33').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca33').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca33').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f33b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca33-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca33-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca33-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca33-a').css("background","none");
        }
    );
    $('#f33b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca33-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca33-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca33-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca33-b').css("background","none");
        }
    );




</script>
