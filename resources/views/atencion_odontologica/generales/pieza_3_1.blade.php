
    {{--  </head>  --}}
    <style>
        #i31{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente31-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla6/periodontograma-dientes-arriba-31.png') }}');
            width:54px;
            background-position: 1px 9px;
            background-repeat: no-repeat;
        }


        #i31b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente31b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla8/periodontograma-dientes-abajo-31b.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }
        #d31,#i31,#i31b,#f31,,#ae31-a,#ae31-b:hover{
            background: #E6E6E6;
        }
        #i31-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f31{
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
        #pi31{
            width: 100%;
        }


        .f31,{
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
        $pieza31 = $piezas_periodonto->firstWhere('pieza', '31');
        $cuerpo31 = $pieza31 ? $pieza31->cuerpo : [];
        $pronostico31 = $cuerpo31['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">
                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl31.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau31.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-31b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-31b.png') }}"/>
                </div>
            </div>

        </div>
    </div>

    <!--LADO IZQ-->
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Vestibular (3.1)</h5>
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

                                                <div id="visualization31a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente31-a"></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d31">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i31">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m31" name="m31" value="0" tabindex="1" onchange="rangoNumero('m31');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi31" id="pi31">
                                                    <option value="B" {{ $pronostico31 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico31 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico31 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico31 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s31-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s31-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s31-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su31-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su31-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su31-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p31-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p31-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p31-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae31" name="ae31" value="0" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg31-a" name="mg31-a" value="{{ $cuerpo31["vest_altura_mg_a"] ?? 0 }}" onchange="cargar31a();getDefectos();rangoNumeroMargen('mg31-a');cargar31a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg31-b" name="mg31-b" value="{{ $cuerpo31["vest_altura_mg_b"] ?? 0 }}" onchange="cargar31a();getDefectos();rangoNumeroMargen('mg31-b');cargar31a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg31-c" name="mg31-c" value="{{ $cuerpo31["vest_altura_mg_c"] ?? 0 }}" onchange="cargar31a();getDefectos();rangoNumeroMargen('mg31-c');cargar31a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps31-a" name="ps31-a" value="{{ $cuerpo31["vest_psondaje_a"] ?? 0 }}" onchange="cargar31a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps31-b" name="ps31-b" value="{{ $cuerpo31["vest_psondaje_b"] ?? 0 }}" onchange="cargar31a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps31-c" name="ps31-c" value="{{ $cuerpo31["vest_psondaje_c"] ?? 0 }}" onchange="cargar31a();getDefectos();" tabindex="99"/>
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
                <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Palatino (3.1)</h5>
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
                                                        <div id="visualization31b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente31b-a">
                                                            <div id="furca31-a"></div>
                                                            <div id="furca31-b"></div>
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
                                        <input class="form-control form-control-xs" type="number" id="ps31b-a" name="ps31b-a" value="{{ $cuerpo31["pala_psondaje_a"] ?? 0 }}" onchange="cargar31b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps31b-b" name="ps31b-a" value="{{ $cuerpo31["pala_psondaje_b"] ?? 0 }}" onchange="cargar31b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps31b-c" name="ps31b-a" value="{{ $cuerpo31["pala_psondaje_c"] ?? 0 }}" onchange="cargar31b();getDefectos();" tabindex="147"//>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg31b-a" name="mg31b-a" value="{{ $cuerpo31["pala_altura_mg_a"] ?? 0 }}" onchange="cargar31b();getDefectos();rangoNumeroMargen('mg31b-a');cargar31b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg31b-b" name="mg31b-b" value="{{ $cuerpo31["pala_altura_mg_b"] ?? 0 }}" onchange="cargar31b();getDefectos();rangoNumeroMargen('mg31b-b');cargar31b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg31b-c" name="mg31b-c" value="{{ $cuerpo31["pala_altura_mg_c"] ?? 0 }}" onchange="cargar31b();getDefectos();rangoNumeroMargen('mg31b-c');cargar31b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s31b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s31b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s31b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su31b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su31b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su31b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p31b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p31b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p31b-c"></div>
                                    </div>
                                </div>
                                </form>
                            </div>
                             <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group" id="obs_pieza3.1">
                                            <label class="floating-label-activo-sm">Obs. Pieza 3.1</label>
                                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 3.1" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_31" id="obs_31" placeholder="Describa observaciones">{{ $cuerpo31["observaciones"] ?? '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BOTÓN GUARDAR-->
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza3.1">
                <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('31')"><i class="feather icon-save"></i>  Guardar evaluación 3.1</button>
        </div>
    </div>


<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar31a();
        cargar31b();

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

    function drawVisualization31a(data31a) {
        // Create and draw the visualization.
        var ac31a = new google.visualization.AreaChart(document.getElementById('visualization31a'));
        ac31a.draw(data31a, {
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

        $('#visualization31a iframe').attr('allowTransparency', 'true');
        $('#visualization31a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar31a(){

        var datoae31=document.getElementById('ae31').value;

        var datomg31a=document.getElementById('mg31-a').value;
        var datomg31b=document.getElementById('mg31-b').value;
        var datomg31c=document.getElementById('mg31-c').value;

        var datops31a=document.getElementById('ps31-a').value;
        var datops31b=document.getElementById('ps31-b').value;
        var datops31c=document.getElementById('ps31-c').value;

        //alert(document.getElementById('ps31-a').value);

        if(datops31a>3){
            document.getElementById('ps31-a').style.color="red";
        }else{
            document.getElementById('ps31-a').style.color="black";
        }
        if(datops31b>3){
            document.getElementById('ps31-b').style.color="red";
        }else{
            document.getElementById('ps31-b').style.color="black";
        }
        if(datops31c>3){
            document.getElementById('ps31-c').style.color="red";
        }else{
            document.getElementById('ps31-c').style.color="black";
        }


        var data31a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg31a)+parseInt(datops31a)),      0-parseInt(datops31a), parseInt(datoae31)],
            ['',    0+(parseInt(datomg31b)+parseInt(datops31b)),      0-parseInt(datops31b), parseInt(datoae31)],
            ['',    0+(parseInt(datomg31c)+parseInt(datops31c)),      0-parseInt(datops31c), parseInt(datoae31)]
        ]);

        drawVisualization31a(data31a);

    }

    function drawVisualization31b(data31b) {

        // Create and draw the visualization.
        var ac31b = new google.visualization.AreaChart(document.getElementById('visualization31b'));
        ac31b.draw(data31b, {
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
        $('#visualization31b iframe').attr('allowTransparency', 'true');
        $('#visualization31b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar31b(){

        var datomg31ba=document.getElementById('mg31b-a').value;
        var datomg31bb=document.getElementById('mg31b-b').value;
        var datomg31bc=document.getElementById('mg31b-c').value;

        var datops31ba=document.getElementById('ps31b-a').value;
        var datops31bb=document.getElementById('ps31b-b').value;
        var datops31bc=document.getElementById('ps31b-c').value;

        if(datops31ba>3){
            document.getElementById('ps31b-a').style.color="red";
        }else{
            document.getElementById('ps31b-a').style.color="black";
        }
        if(datops31bb>3){
            document.getElementById('ps31b-b').style.color="red";
        }else{
            document.getElementById('ps31b-b').style.color="black";
        }
        if(datops31bc>3){
            document.getElementById('ps31b-c').style.color="red";
        }else{
            document.getElementById('ps31b-c').style.color="black";
        }

        var data31b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg31ba)+parseInt(datops31ba)),      0+parseInt(datops31ba)],
            ['',    0-(parseInt(datomg31bb)+parseInt(datops31bb)),      0+parseInt(datops31bb)],
            ['',    0-(parseInt(datomg31bc)+parseInt(datops31bc)),      0+parseInt(datops31bc)]
        ]);

        drawVisualization31b(data31b);

    }

    arrstyle = ["i31","f31","f31b-a","f31b-b","s31-a","s31-b","s31-c","p31-a","p31-b","p31-c","s31b-a","s31b-b","s31b-c","p31b-a","p31b-b","p31b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae31').change(function() {
        if(parseInt(document.getElementById('ae31').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar31a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s31-a').toggle(
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
    $('#s31-b').toggle(
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
    $('#s31-c').toggle(
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

    $('#s31b-a').toggle(
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
    $('#s31b-b').toggle(
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
    $('#s31b-c').toggle(
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
    $('#su31-a').toggle(
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
    $('#su31-b').toggle(
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
    $('#su31-c').toggle(
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

    $('#su31b-a').toggle(
        function () {
            $(this).css({"background":"#f3e831"});
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
    $('#su31b-b').toggle(
        function () {
            $(this).css({"background":"#f3e831"});
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
    $('#su31b-c').toggle(
        function () {
            $(this).css({"background":"#f3e831"});
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
    $('#p31-a').toggle(
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
    $('#p31-b').toggle(
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
    $('#p31-c').toggle(
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
    $('#p31b-a').toggle(
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
    $('#p31b-b').toggle(
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
    $('#p31b-c').toggle(
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
	$('#d31').toggle(
        function () {
            $('#diente31-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau31.png') }}')");
            $('#diente31-a').css("background-position","1px 9px");
            $('#diente31-a').css("background-repeat","no-repeat");
            $('#m31').prop('disabled', true); // Deshabilita el input con id 'm31'
            $('#i31').prop("disabled",true);
            $('#f31').prop("disabled",true);
            $('#s31-a').prop("disabled",true);
            $('#s31-b').prop("disabled",true);
            $('#s31-c').prop("disabled",true);
            $('#p31-a').prop("disabled",true);
            $('#p31-b').prop("disabled",true);
            $('#p31-c').prop("disabled",true);
            $('#mg31-a').prop("disabled",true);
            $('#mg31-b').prop("disabled",true);
            $('#mg31-c').prop("disabled",true);
            $('#ps31-a').prop("disabled",true);
            $('#ps31-b').prop("disabled",true);
            $('#ps31-c').prop("disabled",true);
            /*$('#furca31').css("background","none");*/
            $('#mg31-a').val('0');
            $('#mg31-b').val('0');
            $('#mg31-c').val('0');
            $('#ps31-a').val('0');
            $('#ps31-b').val('0');
            $('#ps31-c').val('0');

            $('#diente31b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-31b.png') }}')");
            $('#diente31b-a').css("background-position","0 23px");
            $('#diente31b-a').css("background-repeat","no-repeat");
            $('#m31b').prop("disabled",true);
            $('#i31b').prop("disabled",true);
            $('#f31b-a').prop("disabled",true);
            $('#f31b-b').prop("disabled",true);
            $('#s31b-a').prop("disabled",true);
            $('#s31b-b').prop("disabled",true);
            $('#s31b-c').prop("disabled",true);
            $('#p31b-a').prop("disabled",true);
            $('#p31b-b').prop("disabled",true);
            $('#p31b-c').prop("disabled",true);
            $('#mg31b-a').prop("disabled",true);
            $('#mg31b-b').prop("disabled",true);
            $('#mg31b-c').prop("disabled",true);
            $('#ps31b-a').prop("disabled",true);
            $('#ps31b-b').prop("disabled",true);
            $('#ps31b-c').prop("disabled",true);
            $('#mg31b-a').val('0');
            $('#mg31b-b').val('0');
            $('#mg31b-c').val('0');
            $('#ps31b-a').val('0');
            $('#ps31b-b').val('0');
            $('#ps31b-c').val('0');

            $('#furca31').prop("disabled",true);
            $('#furca31-a').prop("disabled",true);
            $('#furca31-b').prop("disabled",true);
            $('#ae31').prop("disabled",true);
            $('#pi31').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar31a();
            cargar31b();

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar31a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getSupuracion();
            getPlaca();

        },
        function () {
            $('#diente31-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-31.png') }}')");
            $('#diente31-a').css("background-position","0 -2px");
            $('#diente31-a').css("background-repeat","no-repeat");
            $('#m31').prop("disabled",false);
            $('#i31').prop("disabled",false);
            $('#f31').prop("disabled",false);
            $('#s31-a').prop("disabled",false);
            $('#s31-b').prop("disabled",false);
            $('#s31-c').prop("disabled",false);
            $('#p31-a').prop("disabled",false);
            $('#p31-b').prop("disabled",false);
            $('#p31-c').prop("disabled",false);
            $('#mg31-a').prop("disabled",false);
            $('#mg31-b').prop("disabled",false);
            $('#mg31-c').prop("disabled",false);
            $('#ps31-a').prop("disabled",false);
            $('#ps31-b').prop("disabled",false);
            $('#ps31-c').prop("disabled",false);

            $('#diente31b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-31b.png') }}')");
            $('#diente31b-a').css("background-position","0 23px");
            $('#diente31b-a').css("background-repeat","no-repeat");
            $('#m31b').prop("disabled",false);
            $('#i31b').prop("disabled",false);
            $('#f31b-a').prop("disabled",false);
            $('#f31b-b').prop("disabled",false);
            $('#s31b-a').prop("disabled",false);
            $('#s31b-b').prop("disabled",false);
            $('#s31b-c').prop("disabled",false);
            $('#p31b-a').prop("disabled",false);
            $('#p31b-b').prop("disabled",false);
            $('#p31b-c').prop("disabled",false);
            $('#mg31b-a').prop("disabled",false);
            $('#mg31b-b').prop("disabled",false);
            $('#mg31b-c').prop("disabled",false);
            $('#ps31b-a').prop("disabled",false);
            $('#ps31b-b').prop("disabled",false);
            $('#ps31b-c').prop("disabled",false);

            $('#furca31').css("display","block");
            $('#furca31-a').css("display","block");
            $('#furca31-b').css("display","block");
            $('#ae31').prop("disabled",false);
            $('#pi31').prop("disabled",false);

            totalDientes++;

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar31a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getPlaca();
        }
    );

    //IMPLANTES
	$('#i31').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f31').css({"background":"#FFFFFF"});
            $('#diente31-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl31.png') }}')");
            $('#diente31-a').css("background-position","1px 9px");
            $('#diente31-a').css("background-repeat","no-repeat");

            $('#diente31b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-31b.png') }}')");
            $('#diente31b-a').css("background-position","0 23px");
            $('#diente31b-a').css("background-repeat","no-repeat");

            $('#furca31').css("background","none");
            $('#furca31-a').css("background","none");
            $('#furca31-b').css("background","none");
            $('#f31').css("background","none");
            $('#f31b-a').css("background","none");
            $('#f31b-b').css("background","none");

            $("#f31").attr("id","f31desact");
            $("#f31b-a").attr("id","f31b-adesact");
            $("#f31b-b").attr("id","f31b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente31-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-31.png') }}')");
            $('#diente31-a').css("background-position","0 -2px");
            $('#diente31-a').css("background-repeat","no-repeat");

            $('#diente31b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-31b.png') }}')");
            $('#diente31b-a').css("background-position","0 23px");
            $('#diente31b-a').css("background-repeat","no-repeat");

            $('#f31').css("background","#FFFFFF");
            $('#f31b-a').css("background","#FFFFFF");
            $('#f31b-b').css("background","#FFFFFF");

            $("#f31desact").attr("id","f31");
            $("#f31b-adesact").attr("id","f31b-a");
            $("#f31b-bdesact").attr("id","f31b-b");
            $('#d31').trigger('click');
        }
	);

    //FURCA
	$('#f31').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i31').css({"background":"#FFFFFF"});
			$('#furca31').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca31').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca31').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca31').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f31b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca31-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca31-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca31-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca31-a').css("background","none");
        }
    );
    $('#f31b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca31-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca31-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca31-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca31-b').css("background","none");
        }
    );




</script>
