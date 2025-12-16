
    {{--  </head>  --}}
    <style>
        #i11{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente11-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-11.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }


        #i11b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente11b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-11b.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }
        #d11,#i11,#i11b,#f11,,#ae11-a,#ae11-b:hover{
            background: #E6E6E6;
        }
        #i11-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f11{
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
        #pi11{
            width: 100%;
        }


        .f11,{
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
        $pieza11 = $piezas_periodonto->firstWhere('pieza', '11');
        $cuerpo11 = $pieza11 ? $pieza11->cuerpo : [];
        $pronostico11 = $cuerpo11['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl11.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau11.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-11b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-11b.png') }}"/>
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
                                Pieza 1.1
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

                                                <div id="visualization11a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente11-a"></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d11">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i11">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m11" name="m11" value="{{ $cuerpo11["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m11');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi11" id="pi11">
                                                <option value="" {{ $pronostico11 == '' ? 'selected' : '' }}></option>
                                                <option value="B" {{ $pronostico11 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                <option value="D" {{ $pronostico11 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                <option value="M" {{ $pronostico11 == 'M' ? 'selected' : '' }}>Resrvado</option>
                                                <option value="I" {{ $pronostico11 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s11-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s11-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s11-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su11-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su11-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su11-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p11-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p11-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p11-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae11" name="ae11" value="0" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg11-a" name="mg11-a" value="{{ $cuerpo11["vest_altura_mg_a"] ?? 0 }}" onchange="cargar11a();getDefectos();rangoNumeroMargen('mg11-a');cargar11a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg11-b" name="mg11-b" value="{{ $cuerpo11["vest_altura_mg_b"] ?? 0 }}" onchange="cargar11a();getDefectos();rangoNumeroMargen('mg11-b');cargar11a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg11-c" name="mg11-c" value="{{ $cuerpo11["vest_altura_mg_c"] ?? 0 }}" onchange="cargar11a();getDefectos();rangoNumeroMargen('mg11-c');cargar11a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps11-a" name="ps11-a" value="{{ $cuerpo11["vest_psondaje_a"] ?? 0 }}" onchange="cargar11a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps11-b" name="ps11-b" value="{{ $cuerpo11["vest_psondaje_b"] ?? 0 }}" onchange="cargar11a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps11-c" name="ps11-c" value="{{ $cuerpo11["vest_psondaje_c"] ?? 0 }}" onchange="cargar11a();getDefectos();" tabindex="99"/>
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
                                                        <div id="visualization11b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente11b-a">
                                                            <div id="furca11-a"></div>
                                                            <div id="furca11-b"></div>
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
                                            <input class="form-control form-control-xs" type="number" id="ps11b-a" name="ps11b-a" value="{{ $cuerpo11["pala_psondaje_a"] ?? 0 }}" onchange="cargar11b();getDefectos();" tabindex="145"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps11b-b" name="ps11b-b" value="{{ $cuerpo11["pala_psondaje_b"] ?? 0 }}" onchange="cargar11b();getDefectos();" tabindex="146"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps11b-c" name="ps11b-c" value="{{ $cuerpo11["pala_psondaje_c"] ?? 0 }}" onchange="cargar11b();getDefectos();" tabindex="147"//>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg11b-a" name="mg11b-a" value="{{ $cuerpo11["pala_altura_mg_a"] ?? 0 }}" onchange="cargar11b();getDefectos();rangoNumeroMargen('mg11b-a');cargar11b();" tabindex="193"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg11b-b" name="mg11b-b" value="{{ $cuerpo11["pala_altura_mg_b"] ?? 0 }}" onchange="cargar11b();getDefectos();rangoNumeroMargen('mg11b-b');cargar11b();" tabindex="194"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg11b-c" name="mg11b-c" value="{{ $cuerpo11["pala_altura_mg_c"] ?? 0 }}" onchange="cargar11b();getDefectos();rangoNumeroMargen('mg11b-c');cargar11b();" tabindex="195"/>
                                        </div>
                                    </div>

                                    <div class="form-row mb-2">
                                            <div class="col-sm-12 col-md-4">
                                                <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                            </div>
                                            <div class="col">
                                                <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s11b-a"></div>
                                            </div>
                                            <div class="col">
                                                <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s11b-b" ></div>
                                            </div>
                                            <div class="col">
                                                <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s11b-c"></div>
                                            </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su11b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su11b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su11b-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p11b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p11b-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p11b-c"></div>
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
                <div class="form-group" id="obs_pieza1.1">
                    <label class="floating-label-activo-sm">Obs. Pieza 1.1</label>

                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 1.7" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_17" id="obs_17" placeholder="Describa observaciones">{{ $cuerpo11["observaciones"] ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza1.1">
                <button type="button" onclick="guardar_pieza('11')" class="btn btn-info text-center"><i class="feather icon-save"></i>  Guardar evaluación 1.1</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar11a();
        cargar11b();

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

    function drawVisualization11a(data11a) {
        // Create and draw the visualization.
        var ac11a = new google.visualization.AreaChart(document.getElementById('visualization11a'));
        ac11a.draw(data11a, {
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

        $('#visualization11a iframe').attr('allowTransparency', 'true');
        $('#visualization11a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar11a(){

        var datoae11=document.getElementById('ae11').value;

        var datomg11a=document.getElementById('mg11-a').value;
        var datomg11b=document.getElementById('mg11-b').value;
        var datomg11c=document.getElementById('mg11-c').value;

        var datops11a=document.getElementById('ps11-a').value;
        var datops11b=document.getElementById('ps11-b').value;
        var datops11c=document.getElementById('ps11-c').value;

        //alert(document.getElementById('ps11-a').value);

        if(datops11a>3){
            document.getElementById('ps11-a').style.color="red";
        }else{
            document.getElementById('ps11-a').style.color="black";
        }
        if(datops11b>3){
            document.getElementById('ps11-b').style.color="red";
        }else{
            document.getElementById('ps11-b').style.color="black";
        }
        if(datops11c>3){
            document.getElementById('ps11-c').style.color="red";
        }else{
            document.getElementById('ps11-c').style.color="black";
        }


        var data11a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg11a)+parseInt(datops11a)),      0-parseInt(datops11a), parseInt(datoae11)],
            ['',    0+(parseInt(datomg11b)+parseInt(datops11b)),      0-parseInt(datops11b), parseInt(datoae11)],
            ['',    0+(parseInt(datomg11c)+parseInt(datops11c)),      0-parseInt(datops11c), parseInt(datoae11)]
        ]);

        drawVisualization11a(data11a);

    }

    function drawVisualization11b(data11b) {

        // Create and draw the visualization.
        var ac11b = new google.visualization.AreaChart(document.getElementById('visualization11b'));
        ac11b.draw(data11b, {
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
        $('#visualization11b iframe').attr('allowTransparency', 'true');
        $('#visualization11b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar11b(){

        var datomg11ba=document.getElementById('mg11b-a').value;
        var datomg11bb=document.getElementById('mg11b-b').value;
        var datomg11bc=document.getElementById('mg11b-c').value;

        var datops11ba=document.getElementById('ps11b-a').value;
        var datops11bb=document.getElementById('ps11b-b').value;
        var datops11bc=document.getElementById('ps11b-c').value;

        if(datops11ba>3){
            document.getElementById('ps11b-a').style.color="red";
        }else{
            document.getElementById('ps11b-a').style.color="black";
        }
        if(datops11bb>3){
            document.getElementById('ps11b-b').style.color="red";
        }else{
            document.getElementById('ps11b-b').style.color="black";
        }
        if(datops11bc>3){
            document.getElementById('ps11b-c').style.color="red";
        }else{
            document.getElementById('ps11b-c').style.color="black";
        }

        var data11b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg11ba)+parseInt(datops11ba)),      0+parseInt(datops11ba)],
            ['',    0-(parseInt(datomg11bb)+parseInt(datops11bb)),      0+parseInt(datops11bb)],
            ['',    0-(parseInt(datomg11bc)+parseInt(datops11bc)),      0+parseInt(datops11bc)]
        ]);

        drawVisualization11b(data11b);

    }

    arrstyle = ["i11","f11","f11b-a","f11b-b","s11-a","s11-b","s11-c","p11-a","p11-b","p11-c","s11b-a","s11b-b","s11b-c","p11b-a","p11b-b","p11b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae11').change(function() {
        if(parseInt(document.getElementById('ae11').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar11a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s11-a').toggle(
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
    $('#s11-b').toggle(
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
    $('#s11-c').toggle(
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

    $('#s11b-a').toggle(
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
    $('#s11b-b').toggle(
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
    $('#s11b-c').toggle(
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
    $('#su11-a').toggle(
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
    $('#su11-b').toggle(
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
    $('#su11-c').toggle(
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

    $('#su11b-a').toggle(
        function () {
            $(this).css({"background":"#f3e811"});
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
    $('#su11b-b').toggle(
        function () {
            $(this).css({"background":"#f3e811"});
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
    $('#su11b-c').toggle(
        function () {
            $(this).css({"background":"#f3e811"});
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
    $('#p11-a').toggle(
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
    $('#p11-b').toggle(
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
    $('#p11-c').toggle(
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
    $('#p11b-a').toggle(
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
    $('#p11b-b').toggle(
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
    $('#p11b-c').toggle(
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
	$('#d11').toggle(
        function () {
            $('#diente11-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau11.png') }}')");
            $('#diente11-a').css("background-position","0px -2px");
            $('#diente11-a').css("background-repeat","no-repeat");
            $('#m11').prop('disabled', true); // Deshabilita el input con id 'm11'
            $('#i11').prop("disabled",true);
            $('#f11').prop("disabled",true);
            $('#s11-a').prop("disabled",true);
            $('#s11-b').prop("disabled",true);
            $('#s11-c').prop("disabled",true);
            $('#p11-a').prop("disabled",true);
            $('#p11-b').prop("disabled",true);
            $('#p11-c').prop("disabled",true);
            $('#mg11-a').prop("disabled",true);
            $('#mg11-b').prop("disabled",true);
            $('#mg11-c').prop("disabled",true);
            $('#ps11-a').prop("disabled",true);
            $('#ps11-b').prop("disabled",true);
            $('#ps11-c').prop("disabled",true);
            /*$('#furca11').css("background","none");*/
            $('#mg11-a').val('0');
            $('#mg11-b').val('0');
            $('#mg11-c').val('0');
            $('#ps11-a').val('0');
            $('#ps11-b').val('0');
            $('#ps11-c').val('0');

            $('#diente11b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-11b.png') }}')");
            $('#diente11b-a').css("background-position","0 23px");
            $('#diente11b-a').css("background-repeat","no-repeat");
            $('#m11b').prop("disabled",true);
            $('#i11b').prop("disabled",true);
            $('#f11b-a').prop("disabled",true);
            $('#f11b-b').prop("disabled",true);
            $('#s11b-a').prop("disabled",true);
            $('#s11b-b').prop("disabled",true);
            $('#s11b-c').prop("disabled",true);
            $('#p11b-a').prop("disabled",true);
            $('#p11b-b').prop("disabled",true);
            $('#p11b-c').prop("disabled",true);
            $('#mg11b-a').prop("disabled",true);
            $('#mg11b-b').prop("disabled",true);
            $('#mg11b-c').prop("disabled",true);
            $('#ps11b-a').prop("disabled",true);
            $('#ps11b-b').prop("disabled",true);
            $('#ps11b-c').prop("disabled",true);
            $('#mg11b-a').val('0');
            $('#mg11b-b').val('0');
            $('#mg11b-c').val('0');
            $('#ps11b-a').val('0');
            $('#ps11b-b').val('0');
            $('#ps11b-c').val('0');

            $('#furca11').prop("disabled",true);
            $('#furca11-a').prop("disabled",true);
            $('#furca11-b').prop("disabled",true);
            $('#ae11').prop("disabled",true);
            $('#pi11').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar11a();
            cargar11b();

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
            $('#diente11-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-11.png') }}')");
            $('#diente11-a').css("background-position","0 -2px");
            $('#diente11-a').css("background-repeat","no-repeat");
            $('#m11').prop("disabled",false);
            $('#i11').prop("disabled",false);
            $('#f11').prop("disabled",false);
            $('#s11-a').prop("disabled",false);
            $('#s11-b').prop("disabled",false);
            $('#s11-c').prop("disabled",false);
            $('#p11-a').prop("disabled",false);
            $('#p11-b').prop("disabled",false);
            $('#p11-c').prop("disabled",false);
            $('#mg11-a').prop("disabled",false);
            $('#mg11-b').prop("disabled",false);
            $('#mg11-c').prop("disabled",false);
            $('#ps11-a').prop("disabled",false);
            $('#ps11-b').prop("disabled",false);
            $('#ps11-c').prop("disabled",false);

            $('#diente11b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-11b.png') }}')");
            $('#diente11b-a').css("background-position","0 23px");
            $('#diente11b-a').css("background-repeat","no-repeat");
            $('#m11b').prop("disabled",false);
            $('#i11b').prop("disabled",false);
            $('#f11b-a').prop("disabled",false);
            $('#f11b-b').prop("disabled",false);
            $('#s11b-a').prop("disabled",false);
            $('#s11b-b').prop("disabled",false);
            $('#s11b-c').prop("disabled",false);
            $('#p11b-a').prop("disabled",false);
            $('#p11b-b').prop("disabled",false);
            $('#p11b-c').prop("disabled",false);
            $('#mg11b-a').prop("disabled",false);
            $('#mg11b-b').prop("disabled",false);
            $('#mg11b-c').prop("disabled",false);
            $('#ps11b-a').prop("disabled",false);
            $('#ps11b-b').prop("disabled",false);
            $('#ps11b-c').prop("disabled",false);

            $('#furca11').css("display","block");
            $('#furca11-a').css("display","block");
            $('#furca11-b').css("display","block");
            $('#ae11').prop("disabled",false);
            $('#pi11').prop("disabled",false);

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
	$('#i11').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f11').css({"background":"#FFFFFF"});
            $('#diente11-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl11.png') }}')");
            $('#diente11-a').css("background-position","1px -2px");
            $('#diente11-a').css("background-repeat","no-repeat");

            $('#diente11b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-11b.png') }}')");
            $('#diente11b-a').css("background-position","0 23px");
            $('#diente11b-a').css("background-repeat","no-repeat");

            $('#furca11').css("background","none");
            $('#furca11-a').css("background","none");
            $('#furca11-b').css("background","none");
            $('#f11').css("background","none");
            $('#f11b-a').css("background","none");
            $('#f11b-b').css("background","none");

            $("#f11").attr("id","f11desact");
            $("#f11b-a").attr("id","f11b-adesact");
            $("#f11b-b").attr("id","f11b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente11-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-11.png') }}')");
            $('#diente11-a').css("background-position","0 -2px");
            $('#diente11-a').css("background-repeat","no-repeat");

            $('#diente11b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-11b.png') }}')");
            $('#diente11b-a').css("background-position","0 23px");
            $('#diente11b-a').css("background-repeat","no-repeat");

            $('#f11').css("background","#FFFFFF");
            $('#f11b-a').css("background","#FFFFFF");
            $('#f11b-b').css("background","#FFFFFF");

            $("#f11desact").attr("id","f11");
            $("#f11b-adesact").attr("id","f11b-a");
            $("#f11b-bdesact").attr("id","f11b-b");
            $('#d11').trigger('click');
        }
	);

    //FURCA
	$('#f11').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i11').css({"background":"#FFFFFF"});
			$('#furca11').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca11').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca11').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca11').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f11b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca11-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca11-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca11-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca11-a').css("background","none");
        }
    );
    $('#f11b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca11-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca11-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca11-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca11-b').css("background","none");
        }
    );




</script>




