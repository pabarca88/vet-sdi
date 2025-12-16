
    {{--  </head>  --}}
    <style>
        #i25{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente25-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla2/periodontograma-dientes-arriba-25.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }


        #i25b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente25b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla4/periodontograma-dientes-abajo-25b.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }
        #d25,#i25,#i25b,#f25,,#ae25-a,#ae25-b:hover{
            background: #E6E6E6;
        }
        #i25-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f25{
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
        #pi25{
            width: 100%;
        }


        .f25,{
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
        $pieza25 = $piezas_periodonto->firstWhere('pieza', '25');
        $cuerpo25 = $pieza25 ? $pieza25->cuerpo : [];
        $pronostico25 = $cuerpo25['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl25.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau25.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-25b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-25b.png') }}"/>
                </div>
            </div>

        </div>
    </div>

    <!--LADO IZQ-->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Vestibular</h5>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <!--NUEVO FORM-->
                        <div class="row">
                            <div class="col-12 text-center">
                                Pieza 2.5
                            </div>
                        </div>
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

                                                <div id="visualization25a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente25-a"></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d25">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i25">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m25" name="m25" value="{{ $cuerpo25["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m25');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi25" id="pi25">
                                                    <option value="" {{ $pronostico25 == '' ? 'selected' : '' }}></option>
                                                    <option value="B" {{ $pronostico25 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico25 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico25 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico25 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s25-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s25-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s25-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su25-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su25-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su25-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p25-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p25-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p25-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae25" name="ae25" value="{{ $cuerpo25["plataforma"] ?? 0 }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg25-a" name="mg25-a" value="{{ $cuerpo25["vest_altura_mg_a"] ?? 0 }}" onchange="cargar25a();getDefectos();rangoNumeroMargen('mg25-a');cargar25a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg25-b" name="mg25-b" value="{{ $cuerpo25["vest_altura_mg_b"] ?? 0 }}" onchange="cargar25a();getDefectos();rangoNumeroMargen('mg25-b');cargar25a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg25-c" name="mg25-c" value="{{ $cuerpo25["vest_altura_mg_c"] ?? 0 }}" onchange="cargar25a();getDefectos();rangoNumeroMargen('mg25-c');cargar25a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps25-a" name="ps25-a" value="{{ $cuerpo25["vest_psondaje_a"] ?? 0 }}" onchange="cargar25a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps25-b" name="ps25-b" value="{{ $cuerpo25["vest_psondaje_b"] ?? 0 }}" onchange="cargar25a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps25-c" name="ps25-c" value="{{ $cuerpo25["vest_psondaje_c"] ?? 0 }}" onchange="cargar25a();getDefectos();" tabindex="99"/>
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
                <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Palatino</h5>
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
                                                        <div id="visualization25b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente25b-a">
                                                            <div id="furca25-a"></div>
                                                            <div id="furca25-b"></div>
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
                                        <input class="form-control form-control-xs" type="number" id="ps25b-a" name="ps25b-a" value="{{ $cuerpo25["pala_psondaje_a"] ?? 0 }}" onchange="cargar25b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps25b-b" name="ps25b-b" value="{{ $cuerpo25["pala_psondaje_b"] ?? 0 }}" onchange="cargar25b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps25b-c" name="ps25b-c" value="{{ $cuerpo25["pala_psondaje_c"] ?? 0 }}" onchange="cargar25b();getDefectos();" tabindex="147"//>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg25b-a" name="mg25b-a" value="{{ $cuerpo25["pala_altura_mg_a"] ?? 0 }}" onchange="cargar25b();getDefectos();rangoNumeroMargen('mg25b-a');cargar25b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg25b-b" name="mg25b-b" value="{{ $cuerpo25["pala_altura_mg_b"] ?? 0 }}" onchange="cargar25b();getDefectos();rangoNumeroMargen('mg25b-b');cargar25b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg25b-c" name="mg25b-c" value="{{ $cuerpo25["pala_altura_mg_"] ?? 0 }}" onchange="cargar25b();getDefectos();rangoNumeroMargen('mg25b-c');cargar25b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s25b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s25b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s25b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su25b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su25b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su25b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p25b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p25b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p25b-c"></div>
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
        </div>
    </div>
    <!--FORMULARIO DE OBS. Y BOTÓN GUARDAR-->
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group" id="obs_pieza2.5">
                    <label class="floating-label-activo-sm">Obs. Pieza 2.5</label>
                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 2.5" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_25" id="obs_25" placeholder="Describa observaciones">{{ $cuerpo["observaciones"] ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza2.5">
                <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('26')"><i class="feather icon-save"></i>  Guardar evaluación 2.5</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar25a();
        cargar25b();

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

    function drawVisualization25a(data25a) {
        // Create and draw the visualization.
        var ac25a = new google.visualization.AreaChart(document.getElementById('visualization25a'));
        ac25a.draw(data25a, {
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

        $('#visualization25a iframe').attr('allowTransparency', 'true');
        $('#visualization25a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar25a(){

        var datoae25=document.getElementById('ae25').value;

        var datomg25a=document.getElementById('mg25-a').value;
        var datomg25b=document.getElementById('mg25-b').value;
        var datomg25c=document.getElementById('mg25-c').value;

        var datops25a=document.getElementById('ps25-a').value;
        var datops25b=document.getElementById('ps25-b').value;
        var datops25c=document.getElementById('ps25-c').value;

        //alert(document.getElementById('ps25-a').value);

        if(datops25a>3){
            document.getElementById('ps25-a').style.color="red";
        }else{
            document.getElementById('ps25-a').style.color="black";
        }
        if(datops25b>3){
            document.getElementById('ps25-b').style.color="red";
        }else{
            document.getElementById('ps25-b').style.color="black";
        }
        if(datops25c>3){
            document.getElementById('ps25-c').style.color="red";
        }else{
            document.getElementById('ps25-c').style.color="black";
        }


        var data25a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg25a)+parseInt(datops25a)),      0-parseInt(datops25a), parseInt(datoae25)],
            ['',    0+(parseInt(datomg25b)+parseInt(datops25b)),      0-parseInt(datops25b), parseInt(datoae25)],
            ['',    0+(parseInt(datomg25c)+parseInt(datops25c)),      0-parseInt(datops25c), parseInt(datoae25)]
        ]);

        drawVisualization25a(data25a);

    }

    function drawVisualization25b(data25b) {

        // Create and draw the visualization.
        var ac25b = new google.visualization.AreaChart(document.getElementById('visualization25b'));
        ac25b.draw(data25b, {
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
        $('#visualization25b iframe').attr('allowTransparency', 'true');
        $('#visualization25b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar25b(){

        var datomg25ba=document.getElementById('mg25b-a').value;
        var datomg25bb=document.getElementById('mg25b-b').value;
        var datomg25bc=document.getElementById('mg25b-c').value;

        var datops25ba=document.getElementById('ps25b-a').value;
        var datops25bb=document.getElementById('ps25b-b').value;
        var datops25bc=document.getElementById('ps25b-c').value;

        if(datops25ba>3){
            document.getElementById('ps25b-a').style.color="red";
        }else{
            document.getElementById('ps25b-a').style.color="black";
        }
        if(datops25bb>3){
            document.getElementById('ps25b-b').style.color="red";
        }else{
            document.getElementById('ps25b-b').style.color="black";
        }
        if(datops25bc>3){
            document.getElementById('ps25b-c').style.color="red";
        }else{
            document.getElementById('ps25b-c').style.color="black";
        }

        var data25b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg25ba)+parseInt(datops25ba)),      0+parseInt(datops25ba)],
            ['',    0-(parseInt(datomg25bb)+parseInt(datops25bb)),      0+parseInt(datops25bb)],
            ['',    0-(parseInt(datomg25bc)+parseInt(datops25bc)),      0+parseInt(datops25bc)]
        ]);

        drawVisualization25b(data25b);

    }

    arrstyle = ["i25","f25","f25b-a","f25b-b","s25-a","s25-b","s25-c","p25-a","p25-b","p25-c","s25b-a","s25b-b","s25b-c","p25b-a","p25b-b","p25b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae25').change(function() {
        if(parseInt(document.getElementById('ae25').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar25a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s25-a').toggle(
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
    $('#s25-b').toggle(
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
    $('#s25-c').toggle(
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

    $('#s25b-a').toggle(
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
    $('#s25b-b').toggle(
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
    $('#s25b-c').toggle(
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
    $('#su25-a').toggle(
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
    $('#su25-b').toggle(
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
    $('#su25-c').toggle(
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

    $('#su25b-a').toggle(
        function () {
            $(this).css({"background":"#f3e825"});
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
    $('#su25b-b').toggle(
        function () {
            $(this).css({"background":"#f3e825"});
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
    $('#su25b-c').toggle(
        function () {
            $(this).css({"background":"#f3e825"});
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
    $('#p25-a').toggle(
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
    $('#p25-b').toggle(
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
    $('#p25-c').toggle(
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
    $('#p25b-a').toggle(
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
    $('#p25b-b').toggle(
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
    $('#p25b-c').toggle(
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
	$('#d25').toggle(
        function () {
            $('#diente25-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau25.png') }}')");
            $('#diente25-a').css("background-position","-36px -13px");
            $('#diente25-a').css("background-repeat","no-repeat");
            $('#m25').prop('disabled', true); // Deshabilita el input con id 'm25'
            $('#i25').prop("disabled",true);
            $('#f25').prop("disabled",true);
            $('#s25-a').prop("disabled",true);
            $('#s25-b').prop("disabled",true);
            $('#s25-c').prop("disabled",true);
            $('#p25-a').prop("disabled",true);
            $('#p25-b').prop("disabled",true);
            $('#p25-c').prop("disabled",true);
            $('#mg25-a').prop("disabled",true);
            $('#mg25-b').prop("disabled",true);
            $('#mg25-c').prop("disabled",true);
            $('#ps25-a').prop("disabled",true);
            $('#ps25-b').prop("disabled",true);
            $('#ps25-c').prop("disabled",true);
            /*$('#furca25').css("background","none");*/
            $('#mg25-a').val('0');
            $('#mg25-b').val('0');
            $('#mg25-c').val('0');
            $('#ps25-a').val('0');
            $('#ps25-b').val('0');
            $('#ps25-c').val('0');

            $('#diente25b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-25b.png') }}')");
            $('#diente25b-a').css("background-position","0 23px");
            $('#diente25b-a').css("background-repeat","no-repeat");
            $('#m25b').prop("disabled",true);
            $('#i25b').prop("disabled",true);
            $('#f25b-a').prop("disabled",true);
            $('#f25b-b').prop("disabled",true);
            $('#s25b-a').prop("disabled",true);
            $('#s25b-b').prop("disabled",true);
            $('#s25b-c').prop("disabled",true);
            $('#p25b-a').prop("disabled",true);
            $('#p25b-b').prop("disabled",true);
            $('#p25b-c').prop("disabled",true);
            $('#mg25b-a').prop("disabled",true);
            $('#mg25b-b').prop("disabled",true);
            $('#mg25b-c').prop("disabled",true);
            $('#ps25b-a').prop("disabled",true);
            $('#ps25b-b').prop("disabled",true);
            $('#ps25b-c').prop("disabled",true);
            $('#mg25b-a').val('0');
            $('#mg25b-b').val('0');
            $('#mg25b-c').val('0');
            $('#ps25b-a').val('0');
            $('#ps25b-b').val('0');
            $('#ps25b-c').val('0');

            $('#furca25').prop("disabled",true);
            $('#furca25-a').prop("disabled",true);
            $('#furca25-b').prop("disabled",true);
            $('#ae25').prop("disabled",true);
            $('#pi25').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar25a();
            cargar25b();

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar25a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getSupuracion();
            getPlaca();

        },
        function () {
            $('#diente25-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-25.png') }}')");
            $('#diente25-a').css("background-position","0 -2px");
            $('#diente25-a').css("background-repeat","no-repeat");
            $('#m25').prop("disabled",false);
            $('#i25').prop("disabled",false);
            $('#f25').prop("disabled",false);
            $('#s25-a').prop("disabled",false);
            $('#s25-b').prop("disabled",false);
            $('#s25-c').prop("disabled",false);
            $('#p25-a').prop("disabled",false);
            $('#p25-b').prop("disabled",false);
            $('#p25-c').prop("disabled",false);
            $('#mg25-a').prop("disabled",false);
            $('#mg25-b').prop("disabled",false);
            $('#mg25-c').prop("disabled",false);
            $('#ps25-a').prop("disabled",false);
            $('#ps25-b').prop("disabled",false);
            $('#ps25-c').prop("disabled",false);

            $('#diente25b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-25b.png') }}')");
            $('#diente25b-a').css("background-position","0 23px");
            $('#diente25b-a').css("background-repeat","no-repeat");
            $('#m25b').prop("disabled",false);
            $('#i25b').prop("disabled",false);
            $('#f25b-a').prop("disabled",false);
            $('#f25b-b').prop("disabled",false);
            $('#s25b-a').prop("disabled",false);
            $('#s25b-b').prop("disabled",false);
            $('#s25b-c').prop("disabled",false);
            $('#p25b-a').prop("disabled",false);
            $('#p25b-b').prop("disabled",false);
            $('#p25b-c').prop("disabled",false);
            $('#mg25b-a').prop("disabled",false);
            $('#mg25b-b').prop("disabled",false);
            $('#mg25b-c').prop("disabled",false);
            $('#ps25b-a').prop("disabled",false);
            $('#ps25b-b').prop("disabled",false);
            $('#ps25b-c').prop("disabled",false);

            $('#furca25').css("display","block");
            $('#furca25-a').css("display","block");
            $('#furca25-b').css("display","block");
            $('#ae25').prop("disabled",false);
            $('#pi25').prop("disabled",false);

            totalDientes++;

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar25a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getPlaca();
        }
    );

    //IMPLANTES
	$('#i25').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f25').css({"background":"#FFFFFF"});
            $('#diente25-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl25.png') }}')");
            $('#diente25-a').css("background-position","-38px -2px");
            $('#diente25-a').css("background-repeat","no-repeat");

            $('#diente25b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-25b.png') }}')");
            $('#diente25b-a').css("background-position","0 23px");
            $('#diente25b-a').css("background-repeat","no-repeat");

            $('#furca25').css("background","none");
            $('#furca25-a').css("background","none");
            $('#furca25-b').css("background","none");
            $('#f25').css("background","none");
            $('#f25b-a').css("background","none");
            $('#f25b-b').css("background","none");

            $("#f25").attr("id","f25desact");
            $("#f25b-a").attr("id","f25b-adesact");
            $("#f25b-b").attr("id","f25b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente25-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-25.png') }}')");
            $('#diente25-a').css("background-position","0 -2px");
            $('#diente25-a').css("background-repeat","no-repeat");

            $('#diente25b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-25b.png') }}')");
            $('#diente25b-a').css("background-position","0 23px");
            $('#diente25b-a').css("background-repeat","no-repeat");

            $('#f25').css("background","#FFFFFF");
            $('#f25b-a').css("background","#FFFFFF");
            $('#f25b-b').css("background","#FFFFFF");

            $("#f25desact").attr("id","f25");
            $("#f25b-adesact").attr("id","f25b-a");
            $("#f25b-bdesact").attr("id","f25b-b");
            $('#d25').trigger('click');
        }
	);

    //FURCA
	$('#f25').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i25').css({"background":"#FFFFFF"});
			$('#furca25').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca25').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca25').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca25').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f25b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca25-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca25-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca25-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca25-a').css("background","none");
        }
    );
    $('#f25b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca25-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca25-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca25-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca25-b').css("background","none");
        }
    );




</script>
