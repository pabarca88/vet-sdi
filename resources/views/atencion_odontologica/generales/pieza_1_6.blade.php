
    {{--  </head>  --}}
    <style>
        #i16{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente16-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-16.png') }}');
            width:62px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i16b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente16b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-16b.png') }}');
            width:65px;
            background-position: 0 23px;
            background-repeat: no-repeat;
        }
        #d16,#i16,#i16b,#f16,,#ae16-a,#ae16-b:hover{
            background: #E6E6E6;
        }
        #i16-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f16{
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
        #pi16{
            width: 100%;
        }
        #furca16-a,#furca16-b{
            width: 16px;
            height: 16px;
            position: absolute;
        }
        #furca16-a{
            margin-top: 70px;
        }
        #furca16-b{
            margin-top: 80px;
            margin-left: 28px;
        }

        .f16,{
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
        $pieza16 = $piezas_periodonto->firstWhere('pieza', '16');
        $cuerpo16 = $pieza16 ? $pieza16->cuerpo : [];
        $pronostico16 = $cuerpo16['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl16.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau16.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-16b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-16b.png') }}"/>
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
                                Pieza 1.6
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

                                                <div id="visualization16a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente16-a"><div id="furca16"></div></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d16">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i16">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m16" name="m16" value="0" tabindex="1" onchange="rangoNumero('m16');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>

                                                <select class="form-control form-control-xs" name="pi16" id="pi16">
                                                    <option value="" {{ $pronostico16 == '' ? 'selected' : '' }}></option>
                                                    <option value="B" {{ $pronostico16 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico16 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico16 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico16 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Furca</label>
                                                <div class="border rounded input-dental pointer w-100" id="f16"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s16-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s16-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s16-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su16-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su16-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su16-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p16-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p16-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p16-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae16" name="ae16" value="{{ $cuerpo16["plataforma"] ?? 0 }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg16-a" name="mg16-a" value="{{ $cuerpo16["vest_altura_mg_a"] ?? 0 }}" onchange="cargar16a();getDefectos();rangoNumeroMargen('mg16-a');cargar16a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg16-b" name="mg16-b" value="{{ $cuerpo16["vest_altura_mg_b"] ?? 0 }}" onchange="cargar16a();getDefectos();rangoNumeroMargen('mg16-b');cargar16a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg16-c" name="mg16-c" value="{{ $cuerpo16["vest_altura_mg_c"] ?? 0 }}" onchange="cargar16a();getDefectos();rangoNumeroMargen('mg16-c');cargar16a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps16-a" name="ps16-a" value="{{ $cuerpo16["vest_psondaje_a"] ?? 0 }}" onchange="cargar16a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps16-b" name="ps16-b" value="{{ $cuerpo16["vest_psondaje_b"] ?? 0 }}" onchange="cargar16a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps16-c" name="ps16-c" value="{{ $cuerpo16["vest_psondaje_c"] ?? 0 }}" onchange="cargar16a();getDefectos();" tabindex="99"/>
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
                                                        <div id="visualization16b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente16b-a">
                                                            <div id="furca16-a"></div>
                                                            <div id="furca16-b"></div>
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
                                        <input class="form-control form-control-xs" type="number" id="ps16b-a" name="ps16b-a" value="{{ $cuerpo16["pala_psondaje_a"] ?? 0 }}" onchange="cargar16b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps16b-b" name="ps16b-b" value="{{ $cuerpo16["pala_psondaje_b"] ?? 0 }}" onchange="cargar16b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps16b-c" name="ps16b-c" value="{{ $cuerpo16["pala_psondaje_c"] ?? 0 }}" onchange="cargar16b();getDefectos();" tabindex="147">
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg16b-a" name="mg16b-a" value="{{ $cuerpo16["pala_altura_mg_a"] ?? 0 }}" onchange="cargar16b();getDefectos();rangoNumeroMargen('mg16b-a');cargar16b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg16b-b" name="mg16b-b" value="{{ $cuerpo16["pala_altura_mg_b"] ?? 0 }}" onchange="cargar16b();getDefectos();rangoNumeroMargen('mg16b-b');cargar16b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg16b-c" name="mg16b-c" value="{{ $cuerpo16["pala_altura_mg_c"] ?? 0 }}" onchange="cargar16b();getDefectos();rangoNumeroMargen('mg16b-c');cargar16b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s16b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s16b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s16b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental" id="su16b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su16b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su16b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p16b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p16b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p16b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-2">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Furca 1</h6>
                                    </div>

                                    <div class="col-sm-12 col-md-2">
                                        <div class="border rounded input-dental pointer w-100" id="f16b-a"></div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Furca 2</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div class="border rounded input-dental pointer w-100" id="f16b-b"></div>
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
    <!--FORMULARIO DE OBS. Y BOTÓN GUARDAR-->
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group" id="obs_pieza1.6">
                    <label class="floating-label-activo-sm">Obs. Pieza 1.6</label>
                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 1.6" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_16" id="obs_16" placeholder="Describa observaciones">{{ $cuerpo16["observaciones"] ?? '' }}</textarea>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza1.6">
                <button type="button" onclick="guardar_pieza('16')" class="btn btn-info text-center"><i class="feather icon-save"></i>  Guardar evaluación 1.6</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar16a();
        cargar16b();

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

    function drawVisualization16a(data16a) {
        // Create and draw the visualization.
        var ac16a = new google.visualization.AreaChart(document.getElementById('visualization16a'));
        ac16a.draw(data16a, {
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

        $('#visualization16a iframe').attr('allowTransparency', 'true');
        $('#visualization16a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar16a(){

        var datoae16=document.getElementById('ae16').value;

        var datomg16a=document.getElementById('mg16-a').value;
        var datomg16b=document.getElementById('mg16-b').value;
        var datomg16c=document.getElementById('mg16-c').value;

        var datops16a=document.getElementById('ps16-a').value;
        var datops16b=document.getElementById('ps16-b').value;
        var datops16c=document.getElementById('ps16-c').value;

        //alert(document.getElementById('ps16-a').value);

        if(datops16a>3){
            document.getElementById('ps16-a').style.color="red";
        }else{
            document.getElementById('ps16-a').style.color="black";
        }
        if(datops16b>3){
            document.getElementById('ps16-b').style.color="red";
        }else{
            document.getElementById('ps16-b').style.color="black";
        }
        if(datops16c>3){
            document.getElementById('ps16-c').style.color="red";
        }else{
            document.getElementById('ps16-c').style.color="black";
        }


        var data16a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg16a)+parseInt(datops16a)),      0-parseInt(datops16a), parseInt(datoae16)],
            ['',    0+(parseInt(datomg16b)+parseInt(datops16b)),      0-parseInt(datops16b), parseInt(datoae16)],
            ['',    0+(parseInt(datomg16c)+parseInt(datops16c)),      0-parseInt(datops16c), parseInt(datoae16)]
        ]);

        drawVisualization16a(data16a);

    }

    function drawVisualization16b(data16b) {

        // Create and draw the visualization.
        var ac16b = new google.visualization.AreaChart(document.getElementById('visualization16b'));
        ac16b.draw(data16b, {
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
        $('#visualization16b iframe').attr('allowTransparency', 'true');
        $('#visualization16b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar16b(){

        var datomg16ba=document.getElementById('mg16b-a').value;
        var datomg16bb=document.getElementById('mg16b-b').value;
        var datomg16bc=document.getElementById('mg16b-c').value;

        var datops16ba=document.getElementById('ps16b-a').value;
        var datops16bb=document.getElementById('ps16b-b').value;
        var datops16bc=document.getElementById('ps16b-c').value;

        if(datops16ba>3){
            document.getElementById('ps16b-a').style.color="red";
        }else{
            document.getElementById('ps16b-a').style.color="black";
        }
        if(datops16bb>3){
            document.getElementById('ps16b-b').style.color="red";
        }else{
            document.getElementById('ps16b-b').style.color="black";
        }
        if(datops16bc>3){
            document.getElementById('ps16b-c').style.color="red";
        }else{
            document.getElementById('ps16b-c').style.color="black";
        }

        var data16b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg16ba)+parseInt(datops16ba)),      0+parseInt(datops16ba)],
            ['',    0-(parseInt(datomg16bb)+parseInt(datops16bb)),      0+parseInt(datops16bb)],
            ['',    0-(parseInt(datomg16bc)+parseInt(datops16bc)),      0+parseInt(datops16bc)]
        ]);

        drawVisualization16b(data16b);

    }

    arrstyle = ["i16","f16","f16b-a","f16b-b","s16-a","s16-b","s16-c","p16-a","p16-b","p16-c","s16b-a","s16b-b","s16b-c","p16b-a","p16b-b","p16b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae16').change(function() {
        if(parseInt(document.getElementById('ae16').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar16a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s16-a').toggle(
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
    $('#s16-b').toggle(
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
    $('#s16-c').toggle(
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

    $('#s16b-a').toggle(
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
    $('#s16b-b').toggle(
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
    $('#s16b-c').toggle(
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
    $('#su16-a').toggle(
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
    $('#su16-b').toggle(
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
    $('#su16-c').toggle(
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

    $('#su16b-a').toggle(
        function () {
            $(this).css({"background":"#f3e816"});
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
    $('#su16b-b').toggle(
        function () {
            $(this).css({"background":"#f3e816"});
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
    $('#su16b-c').toggle(
        function () {
            $(this).css({"background":"#f3e816"});
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
    $('#p16-a').toggle(
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
    $('#p16-b').toggle(
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
    $('#p16-c').toggle(
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
    $('#p16b-a').toggle(
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
    $('#p16b-b').toggle(
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
    $('#p16b-c').toggle(
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
	$('#d16').toggle(
        function () {
            $('#diente16-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau16.png') }}')");
            $('#diente16-a').css("background-position","0px -2px");
            $('#diente16-a').css("background-repeat","no-repeat");
            $('#m16').prop('disabled', true); // Deshabilita el input con id 'm16'
            $('#i16').prop("disabled",true);
            $('#f16').prop("disabled",true);
            $('#s16-a').prop("disabled",true);
            $('#s16-b').prop("disabled",true);
            $('#s16-c').prop("disabled",true);
            $('#p16-a').prop("disabled",true);
            $('#p16-b').prop("disabled",true);
            $('#p16-c').prop("disabled",true);
            $('#mg16-a').prop("disabled",true);
            $('#mg16-b').prop("disabled",true);
            $('#mg16-c').prop("disabled",true);
            $('#ps16-a').prop("disabled",true);
            $('#ps16-b').prop("disabled",true);
            $('#ps16-c').prop("disabled",true);
            /*$('#furca16').css("background","none");*/
            $('#mg16-a').val('0');
            $('#mg16-b').val('0');
            $('#mg16-c').val('0');
            $('#ps16-a').val('0');
            $('#ps16-b').val('0');
            $('#ps16-c').val('0');

            $('#diente16b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-16b.png') }}')");
            $('#diente16b-a').css("background-position","0 23px");
            $('#diente16b-a').css("background-repeat","no-repeat");
            $('#m16b').prop("disabled",true);
            $('#i16b').prop("disabled",true);
            $('#f16b-a').prop("disabled",true);
            $('#f16b-b').prop("disabled",true);
            $('#s16b-a').prop("disabled",true);
            $('#s16b-b').prop("disabled",true);
            $('#s16b-c').prop("disabled",true);
            $('#p16b-a').prop("disabled",true);
            $('#p16b-b').prop("disabled",true);
            $('#p16b-c').prop("disabled",true);
            $('#mg16b-a').prop("disabled",true);
            $('#mg16b-b').prop("disabled",true);
            $('#mg16b-c').prop("disabled",true);
            $('#ps16b-a').prop("disabled",true);
            $('#ps16b-b').prop("disabled",true);
            $('#ps16b-c').prop("disabled",true);
            $('#mg16b-a').val('0');
            $('#mg16b-b').val('0');
            $('#mg16b-c').val('0');
            $('#ps16b-a').val('0');
            $('#ps16b-b').val('0');
            $('#ps16b-c').val('0');

            $('#furca16').prop("disabled",true);
            $('#furca16-a').prop("disabled",true);
            $('#furca16-b').prop("disabled",true);
            $('#ae16').prop("disabled",true);
            $('#pi16').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar16a();
            cargar16b();

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar11a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getSupuracion();
            getPlaca();

        },
        function () {
            $('#diente16-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-16.png') }}')");
            $('#diente16-a').css("background-position","0 -2px");
            $('#diente16-a').css("background-repeat","no-repeat");
            $('#m16').prop("disabled",false);
            $('#i16').prop("disabled",false);
            $('#f16').prop("disabled",false);
            $('#s16-a').prop("disabled",false);
            $('#s16-b').prop("disabled",false);
            $('#s16-c').prop("disabled",false);
            $('#p16-a').prop("disabled",false);
            $('#p16-b').prop("disabled",false);
            $('#p16-c').prop("disabled",false);
            $('#mg16-a').prop("disabled",false);
            $('#mg16-b').prop("disabled",false);
            $('#mg16-c').prop("disabled",false);
            $('#ps16-a').prop("disabled",false);
            $('#ps16-b').prop("disabled",false);
            $('#ps16-c').prop("disabled",false);

            $('#diente16b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-16b.png') }}')");
            $('#diente16b-a').css("background-position","0 23px");
            $('#diente16b-a').css("background-repeat","no-repeat");
            $('#m16b').prop("disabled",false);
            $('#i16b').prop("disabled",false);
            $('#f16b-a').prop("disabled",false);
            $('#f16b-b').prop("disabled",false);
            $('#s16b-a').prop("disabled",false);
            $('#s16b-b').prop("disabled",false);
            $('#s16b-c').prop("disabled",false);
            $('#p16b-a').prop("disabled",false);
            $('#p16b-b').prop("disabled",false);
            $('#p16b-c').prop("disabled",false);
            $('#mg16b-a').prop("disabled",false);
            $('#mg16b-b').prop("disabled",false);
            $('#mg16b-c').prop("disabled",false);
            $('#ps16b-a').prop("disabled",false);
            $('#ps16b-b').prop("disabled",false);
            $('#ps16b-c').prop("disabled",false);

            $('#furca16').css("display","block");
            $('#furca16-a').css("display","block");
            $('#furca16-b').css("display","block");
            $('#ae16').prop("disabled",false);
            $('#pi16').prop("disabled",false);

            totalDientes++;

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar11a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getPlaca();
        }
    );

    //IMPLANTES
	$('#i16').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f16').css({"background":"#FFFFFF"});
            $('#diente16-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl16.png') }}')");
            $('#diente16-a').css("background-position","1px -2px");
            $('#diente16-a').css("background-repeat","no-repeat");

            $('#diente16b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-16b.png') }}')");
            $('#diente16b-a').css("background-position","0 23px");
            $('#diente16b-a').css("background-repeat","no-repeat");

            $('#furca16').css("background","none");
            $('#furca16-a').css("background","none");
            $('#furca16-b').css("background","none");
            $('#f16').css("background","none");
            $('#f16b-a').css("background","none");
            $('#f16b-b').css("background","none");

            $("#f16").attr("id","f16desact");
            $("#f16b-a").attr("id","f16b-adesact");
            $("#f16b-b").attr("id","f16b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente16-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-16.png') }}')");
            $('#diente16-a').css("background-position","0 -2px");
            $('#diente16-a').css("background-repeat","no-repeat");

            $('#diente16b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-16b.png') }}')");
            $('#diente16b-a').css("background-position","0 23px");
            $('#diente16b-a').css("background-repeat","no-repeat");

            $('#f16').css("background","#FFFFFF");
            $('#f16b-a').css("background","#FFFFFF");
            $('#f16b-b').css("background","#FFFFFF");

            $("#f16desact").attr("id","f16");
            $("#f16b-adesact").attr("id","f16b-a");
            $("#f16b-bdesact").attr("id","f16b-b");
            $('#d16').trigger('click');
        }
	);

    //FURCA
	$('#f16').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i16').css({"background":"#FFFFFF"});
			$('#furca16').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca16').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca16').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca16').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f16b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca16-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca16-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca16-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca16-a').css("background","none");
        }
    );
    $('#f16b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca16-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca16-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca16-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca16-b').css("background","none");
        }
    );




</script>



