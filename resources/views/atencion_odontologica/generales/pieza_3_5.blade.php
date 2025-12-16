
    {{--  </head>  --}}
    <style>
        #i35{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente35-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla6/periodontograma-dientes-arriba-35.png') }}');
            width:54px;
            background-position: 1px 3px;
            background-repeat: no-repeat;
        }


        #i35b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente35b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla8/periodontograma-dientes-abajo-35b.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }
        #d35,#i35,#i35b,#f35,,#ae35-a,#ae35-b:hover{
            background: #E6E6E6;
        }
        #i35-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f35{
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
        #pi35{
            width: 100%;
        }


        .f35,{
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
        $pieza35 = $piezas_periodonto->firstWhere('pieza', '35');
        $cuerpo35 = $pieza35 ? $pieza35->cuerpo : [];
        $pronostico35 = $cuerpo35['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl35.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau35.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-35b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-35b.png') }}"/>
                </div>
            </div>

        </div>
    </div>

    <!--LADO IZQ-->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Vestibular (3.5)</h5>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <!--FORMULARIO ANTIGUO-->
                        <div class="form-row">
                            <div class="col-md-4">
                                <form name ="grafico1" id="grafico1" action="#">
                                    <table id="tabla" style="width: 100%">
                                        <tbody>
                                            <tr>
                                                <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                                <td colspan="2" class="noborde formulario" style="position: relative;" >
                                                <div id="lineas-gr"></div>

                                                <div id="visualization35a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente35-a"></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d35">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i35">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m35" name="m35" value="{{ $cuerpo35["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m35');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi35" id="pi35">
                                                    <option value="B" {{ $pronostico35 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico35 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico35 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico35 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s35-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s35-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s35-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su35-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su35-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su35-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p35-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p35-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p35-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae35" name="ae35" value="{{ $cuerpo35["plataforma"] ?? 0 }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg35-a" name="mg35-a" value="{{ $cuerpo35["vest_altura_mg_a"] ?? 0 }}" onchange="cargar35a();getDefectos();rangoNumeroMargen('mg35-a');cargar35a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg35-b" name="mg35-b" value="{{ $cuerpo35["vest_altura_mg_b"] ?? 0 }}" onchange="cargar35a();getDefectos();rangoNumeroMargen('mg35-b');cargar35a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg35-c" name="mg35-c" value="{{ $cuerpo35["vest_altura_mg_c"] ?? 0 }}" onchange="cargar35a();getDefectos();rangoNumeroMargen('mg35-c');cargar35a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps35-a" name="ps35-a" value="{{ $cuerpo35["vest_psondaje_a"] ?? 0 }}" onchange="cargar35a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps35-b" name="ps35-b" value="{{ $cuerpo35["vest_psondaje_b"] ?? 0 }}" onchange="cargar35a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps35-c" name="ps35-c" value="{{ $cuerpo35["vest_psondaje_c"] ?? 0 }}" onchange="cargar35a();getDefectos();" tabindex="99"/>
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
                <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Palatino (3.5)</h5>
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
                                                        <div id="visualization35b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente35b-a">
                                                            <div id="furca35-a"></div>
                                                            <div id="furca35-b"></div>
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
                                        <input class="form-control form-control-xs" type="number" id="ps35b-a" name="ps35b-a" value="{{ $cuerpo35["pala_psondaje_a"] ?? 0 }}" onchange="cargar35b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps35b-b" name="ps35b-a" value="{{ $cuerpo35["pala_psondaje_b"] ?? 0 }}" onchange="cargar35b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps35b-c" name="ps35b-a" value="{{ $cuerpo35["pala_psondaje_c"] ?? 0 }}" onchange="cargar35b();getDefectos();" tabindex="147"//>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg35b-a" name="mg35b-a" value="{{ $cuerpo35["pala_altura_mg_a"] ?? 0 }}" onchange="cargar35b();getDefectos();rangoNumeroMargen('mg35b-a');cargar35b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg35b-b" name="mg35b-b" value="{{ $cuerpo35["pala_altura_mg_b"] ?? 0 }}" onchange="cargar35b();getDefectos();rangoNumeroMargen('mg35b-b');cargar35b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg35b-c" name="mg35b-c" value="{{ $cuerpo35["pala_altura_mg_c"] ?? 0 }}" onchange="cargar35b();getDefectos();rangoNumeroMargen('mg35b-c');cargar35b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s35b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s35b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s35b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su35b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su35b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su35b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p35b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p35b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p35b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row">


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
                        <div class="form-group" id="obs_pieza3.5">
                            <label class="floating-label-activo-sm">Obs. Pieza 3.5</label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 3.5" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_35" id="obs_35" placeholder="Describa observaciones">{{ $cuerpo35["observaciones"] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FORMULARIO DE OBS. Y BOTÓN GUARDAR-->

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza3.5">
                <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('35')"><i class="feather icon-save"></i>  Guardar evaluación 3.5</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar35a();
        cargar35b();

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

    function drawVisualization35a(data35a) {
        // Create and draw the visualization.
        var ac35a = new google.visualization.AreaChart(document.getElementById('visualization35a'));
        ac35a.draw(data35a, {
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

        $('#visualization35a iframe').attr('allowTransparency', 'true');
        $('#visualization35a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar35a(){

        var datoae35=document.getElementById('ae35').value;

        var datomg35a=document.getElementById('mg35-a').value;
        var datomg35b=document.getElementById('mg35-b').value;
        var datomg35c=document.getElementById('mg35-c').value;

        var datops35a=document.getElementById('ps35-a').value;
        var datops35b=document.getElementById('ps35-b').value;
        var datops35c=document.getElementById('ps35-c').value;

        //alert(document.getElementById('ps35-a').value);

        if(datops35a>3){
            document.getElementById('ps35-a').style.color="red";
        }else{
            document.getElementById('ps35-a').style.color="black";
        }
        if(datops35b>3){
            document.getElementById('ps35-b').style.color="red";
        }else{
            document.getElementById('ps35-b').style.color="black";
        }
        if(datops35c>3){
            document.getElementById('ps35-c').style.color="red";
        }else{
            document.getElementById('ps35-c').style.color="black";
        }


        var data35a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg35a)+parseInt(datops35a)),      0-parseInt(datops35a), parseInt(datoae35)],
            ['',    0+(parseInt(datomg35b)+parseInt(datops35b)),      0-parseInt(datops35b), parseInt(datoae35)],
            ['',    0+(parseInt(datomg35c)+parseInt(datops35c)),      0-parseInt(datops35c), parseInt(datoae35)]
        ]);

        drawVisualization35a(data35a);

    }

    function drawVisualization35b(data35b) {

        // Create and draw the visualization.
        var ac35b = new google.visualization.AreaChart(document.getElementById('visualization35b'));
        ac35b.draw(data35b, {
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
        $('#visualization35b iframe').attr('allowTransparency', 'true');
        $('#visualization35b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar35b(){

        var datomg35ba=document.getElementById('mg35b-a').value;
        var datomg35bb=document.getElementById('mg35b-b').value;
        var datomg35bc=document.getElementById('mg35b-c').value;

        var datops35ba=document.getElementById('ps35b-a').value;
        var datops35bb=document.getElementById('ps35b-b').value;
        var datops35bc=document.getElementById('ps35b-c').value;

        if(datops35ba>3){
            document.getElementById('ps35b-a').style.color="red";
        }else{
            document.getElementById('ps35b-a').style.color="black";
        }
        if(datops35bb>3){
            document.getElementById('ps35b-b').style.color="red";
        }else{
            document.getElementById('ps35b-b').style.color="black";
        }
        if(datops35bc>3){
            document.getElementById('ps35b-c').style.color="red";
        }else{
            document.getElementById('ps35b-c').style.color="black";
        }

        var data35b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg35ba)+parseInt(datops35ba)),      0+parseInt(datops35ba)],
            ['',    0-(parseInt(datomg35bb)+parseInt(datops35bb)),      0+parseInt(datops35bb)],
            ['',    0-(parseInt(datomg35bc)+parseInt(datops35bc)),      0+parseInt(datops35bc)]
        ]);

        drawVisualization35b(data35b);

    }

    arrstyle = ["i35","f35","f35b-a","f35b-b","s35-a","s35-b","s35-c","p35-a","p35-b","p35-c","s35b-a","s35b-b","s35b-c","p35b-a","p35b-b","p35b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae35').change(function() {
        if(parseInt(document.getElementById('ae35').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar35a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s35-a').toggle(
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
    $('#s35-b').toggle(
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
    $('#s35-c').toggle(
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

    $('#s35b-a').toggle(
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
    $('#s35b-b').toggle(
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
    $('#s35b-c').toggle(
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
    $('#su35-a').toggle(
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
    $('#su35-b').toggle(
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
    $('#su35-c').toggle(
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

    $('#su35b-a').toggle(
        function () {
            $(this).css({"background":"#f3e835"});
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
    $('#su35b-b').toggle(
        function () {
            $(this).css({"background":"#f3e835"});
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
    $('#su35b-c').toggle(
        function () {
            $(this).css({"background":"#f3e835"});
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
    $('#p35-a').toggle(
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
    $('#p35-b').toggle(
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
    $('#p35-c').toggle(
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
    $('#p35b-a').toggle(
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
    $('#p35b-b').toggle(
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
    $('#p35b-c').toggle(
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
	$('#d35').toggle(
        function () {
            $('#diente35-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau35.png') }}')");
            $('#diente35-a').css("background-position","1px 3px");
            $('#diente35-a').css("background-repeat","no-repeat");
            $('#m35').prop('disabled', true); // Deshabilita el input con id 'm35'
            $('#i35').prop("disabled",true);
            $('#f35').prop("disabled",true);
            $('#s35-a').prop("disabled",true);
            $('#s35-b').prop("disabled",true);
            $('#s35-c').prop("disabled",true);
            $('#p35-a').prop("disabled",true);
            $('#p35-b').prop("disabled",true);
            $('#p35-c').prop("disabled",true);
            $('#mg35-a').prop("disabled",true);
            $('#mg35-b').prop("disabled",true);
            $('#mg35-c').prop("disabled",true);
            $('#ps35-a').prop("disabled",true);
            $('#ps35-b').prop("disabled",true);
            $('#ps35-c').prop("disabled",true);
            /*$('#furca35').css("background","none");*/
            $('#mg35-a').val('0');
            $('#mg35-b').val('0');
            $('#mg35-c').val('0');
            $('#ps35-a').val('0');
            $('#ps35-b').val('0');
            $('#ps35-c').val('0');

            $('#diente35b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-35b.png') }}')");
            $('#diente35b-a').css("background-position","0 23px");
            $('#diente35b-a').css("background-repeat","no-repeat");
            $('#m35b').prop("disabled",true);
            $('#i35b').prop("disabled",true);
            $('#f35b-a').prop("disabled",true);
            $('#f35b-b').prop("disabled",true);
            $('#s35b-a').prop("disabled",true);
            $('#s35b-b').prop("disabled",true);
            $('#s35b-c').prop("disabled",true);
            $('#p35b-a').prop("disabled",true);
            $('#p35b-b').prop("disabled",true);
            $('#p35b-c').prop("disabled",true);
            $('#mg35b-a').prop("disabled",true);
            $('#mg35b-b').prop("disabled",true);
            $('#mg35b-c').prop("disabled",true);
            $('#ps35b-a').prop("disabled",true);
            $('#ps35b-b').prop("disabled",true);
            $('#ps35b-c').prop("disabled",true);
            $('#mg35b-a').val('0');
            $('#mg35b-b').val('0');
            $('#mg35b-c').val('0');
            $('#ps35b-a').val('0');
            $('#ps35b-b').val('0');
            $('#ps35b-c').val('0');

            $('#furca35').prop("disabled",true);
            $('#furca35-a').prop("disabled",true);
            $('#furca35-b').prop("disabled",true);
            $('#ae35').prop("disabled",true);
            $('#pi35').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar35a();
            cargar35b();

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar35a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getSupuracion();
            getPlaca();

        },
        function () {
            $('#diente35-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-35.png') }}')");
            $('#diente35-a').css("background-position","0 -2px");
            $('#diente35-a').css("background-repeat","no-repeat");
            $('#m35').prop("disabled",false);
            $('#i35').prop("disabled",false);
            $('#f35').prop("disabled",false);
            $('#s35-a').prop("disabled",false);
            $('#s35-b').prop("disabled",false);
            $('#s35-c').prop("disabled",false);
            $('#p35-a').prop("disabled",false);
            $('#p35-b').prop("disabled",false);
            $('#p35-c').prop("disabled",false);
            $('#mg35-a').prop("disabled",false);
            $('#mg35-b').prop("disabled",false);
            $('#mg35-c').prop("disabled",false);
            $('#ps35-a').prop("disabled",false);
            $('#ps35-b').prop("disabled",false);
            $('#ps35-c').prop("disabled",false);

            $('#diente35b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-35b.png') }}')");
            $('#diente35b-a').css("background-position","0 23px");
            $('#diente35b-a').css("background-repeat","no-repeat");
            $('#m35b').prop("disabled",false);
            $('#i35b').prop("disabled",false);
            $('#f35b-a').prop("disabled",false);
            $('#f35b-b').prop("disabled",false);
            $('#s35b-a').prop("disabled",false);
            $('#s35b-b').prop("disabled",false);
            $('#s35b-c').prop("disabled",false);
            $('#p35b-a').prop("disabled",false);
            $('#p35b-b').prop("disabled",false);
            $('#p35b-c').prop("disabled",false);
            $('#mg35b-a').prop("disabled",false);
            $('#mg35b-b').prop("disabled",false);
            $('#mg35b-c').prop("disabled",false);
            $('#ps35b-a').prop("disabled",false);
            $('#ps35b-b').prop("disabled",false);
            $('#ps35b-c').prop("disabled",false);

            $('#furca35').css("display","block");
            $('#furca35-a').css("display","block");
            $('#furca35-b').css("display","block");
            $('#ae35').prop("disabled",false);
            $('#pi35').prop("disabled",false);

            totalDientes++;

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar35a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getPlaca();
        }
    );

    //IMPLANTES
	$('#i35').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f35').css({"background":"#FFFFFF"});
            $('#diente35-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl35.png') }}')");
            $('#diente35-a').css("background-position","1px 3px");
            $('#diente35-a').css("background-repeat","no-repeat");

            $('#diente35b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-35b.png') }}')");
            $('#diente35b-a').css("background-position","0 23px");
            $('#diente35b-a').css("background-repeat","no-repeat");

            $('#furca35').css("background","none");
            $('#furca35-a').css("background","none");
            $('#furca35-b').css("background","none");
            $('#f35').css("background","none");
            $('#f35b-a').css("background","none");
            $('#f35b-b').css("background","none");

            $("#f35").attr("id","f35desact");
            $("#f35b-a").attr("id","f35b-adesact");
            $("#f35b-b").attr("id","f35b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente35-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-35.png') }}')");
            $('#diente35-a').css("background-position","0 -2px");
            $('#diente35-a').css("background-repeat","no-repeat");

            $('#diente35b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-35b.png') }}')");
            $('#diente35b-a').css("background-position","0 23px");
            $('#diente35b-a').css("background-repeat","no-repeat");

            $('#f35').css("background","#FFFFFF");
            $('#f35b-a').css("background","#FFFFFF");
            $('#f35b-b').css("background","#FFFFFF");

            $("#f35desact").attr("id","f35");
            $("#f35b-adesact").attr("id","f35b-a");
            $("#f35b-bdesact").attr("id","f35b-b");
            $('#d35').trigger('click');
        }
	);

    //FURCA
	$('#f35').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i35').css({"background":"#FFFFFF"});
			$('#furca35').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca35').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca35').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca35').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f35b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca35-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca35-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca35-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca35-a').css("background","none");
        }
    );
    $('#f35b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca35-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca35-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca35-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca35-b').css("background","none");
        }
    );




</script>
