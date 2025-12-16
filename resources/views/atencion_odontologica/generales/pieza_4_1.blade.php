
    {{--  </head>  --}}
    <style>
        #i41{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente41-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla5/periodontograma-dientes-arriba-41.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }


        #i41b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente41b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla7/periodontograma-dientes-abajo-41b.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }
        #d41,#i41,#i41b,#f41,,#ae41-a,#ae41-b:hover{
            background: #E6E6E6;
        }
        #i41-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f41{
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
        #pi41{
            width: 100%;
        }


        .f41,{
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
        $pieza41 = $piezas_periodonto->firstWhere('pieza', '41');
        $cuerpo41 = $pieza41 ? $pieza41->cuerpo : [];
        $pronostico41 = $cuerpo41['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl41.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau41.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-41b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-41b.png') }}"/>
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
                                Pieza 4.1
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

                                                <div id="visualization41a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente41-a"></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d41">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i41">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m41" name="m41" value="{{ $cuerpo41["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m41');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi41" id="pi41">
                                                    <option value="" {{ $pronostico41 == '' ? 'selected' : '' }}></option>
                                                    <option value="B" {{ $pronostico41 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico41 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico41 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico41 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                            </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s41-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s41-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s41-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su41-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su41-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su41-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p41-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p41-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p41-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae41" name="ae41" value="{{ $cuerpo41["plataforma"] ?? 0 }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg41-a" name="mg41-a" value="{{ $cuerpo41["vest_altura_mg_a"] ?? 0 }}" onchange="cargar41a();getDefectos();rangoNumeroMargen('mg41-a');cargar41a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg41-b" name="mg41-b" value="{{ $cuerpo41["vest_altura_mg_b"] ?? 0 }}" onchange="cargar41a();getDefectos();rangoNumeroMargen('mg41-b');cargar41a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg41-c" name="mg41-c" value="{{ $cuerpo41["vest_altura_mg_c"] ?? 0 }}" onchange="cargar41a();getDefectos();rangoNumeroMargen('mg41-c');cargar41a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps41-a" name="ps41-a" value="{{ $cuerpo41["vest_psondaje_a"] ?? 0 }}" onchange="cargar41a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps41-b" name="ps41-b" value="{{ $cuerpo41["vest_psondaje_b"] ?? 0 }}" onchange="cargar41a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps41-c" name="ps41-c" value="{{ $cuerpo41["vest_psondaje_c"] ?? 0 }}" onchange="cargar41a();getDefectos();" tabindex="99"/>
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
                                                        <div id="visualization41b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente41b-a">
                                                            <div id="furca41-a"></div>
                                                            <div id="furca41-b"></div>
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
                                            <input class="form-control form-control-xs" type="number" id="ps41b-a" name="ps41b-a" value="{{ $cuerpo41["pala_psondaje_a"] ?? 0 }}" onchange="cargar41b();getDefectos();" tabindex="145"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps41b-b" name="ps41b-a" value="{{ $cuerpo41["pala_psondaje_b"] ?? 0 }}" onchange="cargar41b();getDefectos();" tabindex="146"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps41b-c" name="ps41b-a" value="{{ $cuerpo41["pala_psondaje_c"] ?? 0 }}" onchange="cargar41b();getDefectos();" tabindex="147"//>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg41b-a" name="mg41b-a" value="{{ $cuerpo41["pala_altura_mg_a"] ?? 0 }}" onchange="cargar41b();getDefectos();rangoNumeroMargen('mg41b-a');cargar41b();" tabindex="193"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg41b-b" name="mg41b-b" value="{{ $cuerpo41["pala_altura_mg_b"] ?? 0 }}" onchange="cargar41b();getDefectos();rangoNumeroMargen('mg41b-b');cargar41b();" tabindex="194"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg41b-c" name="mg41b-c" value="{{ $cuerpo41["pala_altura_mg_c"] ?? 0 }}" onchange="cargar41b();getDefectos();rangoNumeroMargen('mg41b-c');cargar41b();" tabindex="195"/>
                                        </div>
                                    </div>

                                    <div class="form-row mb-2">
                                            <div class="col-sm-12 col-md-4">
                                                <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                            </div>
                                            <div class="col">
                                                <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s41b-a"></div>
                                            </div>
                                            <div class="col">
                                                <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s41b-b" ></div>
                                            </div>
                                            <div class="col">
                                                <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s41b-c"></div>
                                            </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su41b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su41b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su41b-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p41b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p41b-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p41b-c"></div>
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
                <div class="form-group" id="obs_pieza4.1">
                    <label class="floating-label-activo-sm">Obs. Pieza 4.1</label>
                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 4.1" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_41" id="obs_41" placeholder="Describa observaciones">{{ $cuerpo41["observaciones"] ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza4.1">
                <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('41')"><i class="feather icon-save"></i>  Guardar evaluación 4.1</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar41a();
        cargar41b();

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

    function drawVisualization41a(data41a) {
        // Create and draw the visualization.
        var ac41a = new google.visualization.AreaChart(document.getElementById('visualization41a'));
        ac41a.draw(data41a, {
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

        $('#visualization41a iframe').attr('allowTransparency', 'true');
        $('#visualization41a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar41a(){

        var datoae41=document.getElementById('ae41').value;

        var datomg41a=document.getElementById('mg41-a').value;
        var datomg41b=document.getElementById('mg41-b').value;
        var datomg41c=document.getElementById('mg41-c').value;

        var datops41a=document.getElementById('ps41-a').value;
        var datops41b=document.getElementById('ps41-b').value;
        var datops41c=document.getElementById('ps41-c').value;

        //alert(document.getElementById('ps41-a').value);

        if(datops41a>3){
            document.getElementById('ps41-a').style.color="red";
        }else{
            document.getElementById('ps41-a').style.color="black";
        }
        if(datops41b>3){
            document.getElementById('ps41-b').style.color="red";
        }else{
            document.getElementById('ps41-b').style.color="black";
        }
        if(datops41c>3){
            document.getElementById('ps41-c').style.color="red";
        }else{
            document.getElementById('ps41-c').style.color="black";
        }


        var data41a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg41a)+parseInt(datops41a)),      0-parseInt(datops41a), parseInt(datoae41)],
            ['',    0+(parseInt(datomg41b)+parseInt(datops41b)),      0-parseInt(datops41b), parseInt(datoae41)],
            ['',    0+(parseInt(datomg41c)+parseInt(datops41c)),      0-parseInt(datops41c), parseInt(datoae41)]
        ]);

        drawVisualization41a(data41a);

    }

    function drawVisualization41b(data41b) {

        // Create and draw the visualization.
        var ac41b = new google.visualization.AreaChart(document.getElementById('visualization41b'));
        ac41b.draw(data41b, {
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
        $('#visualization41b iframe').attr('allowTransparency', 'true');
        $('#visualization41b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar41b(){

        var datomg41ba=document.getElementById('mg41b-a').value;
        var datomg41bb=document.getElementById('mg41b-b').value;
        var datomg41bc=document.getElementById('mg41b-c').value;

        var datops41ba=document.getElementById('ps41b-a').value;
        var datops41bb=document.getElementById('ps41b-b').value;
        var datops41bc=document.getElementById('ps41b-c').value;

        if(datops41ba>3){
            document.getElementById('ps41b-a').style.color="red";
        }else{
            document.getElementById('ps41b-a').style.color="black";
        }
        if(datops41bb>3){
            document.getElementById('ps41b-b').style.color="red";
        }else{
            document.getElementById('ps41b-b').style.color="black";
        }
        if(datops41bc>3){
            document.getElementById('ps41b-c').style.color="red";
        }else{
            document.getElementById('ps41b-c').style.color="black";
        }

        var data41b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg41ba)+parseInt(datops41ba)),      0+parseInt(datops41ba)],
            ['',    0-(parseInt(datomg41bb)+parseInt(datops41bb)),      0+parseInt(datops41bb)],
            ['',    0-(parseInt(datomg41bc)+parseInt(datops41bc)),      0+parseInt(datops41bc)]
        ]);

        drawVisualization41b(data41b);

    }

    arrstyle = ["i41","f41","f41b-a","f41b-b","s41-a","s41-b","s41-c","p41-a","p41-b","p41-c","s41b-a","s41b-b","s41b-c","p41b-a","p41b-b","p41b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae41').change(function() {
        if(parseInt(document.getElementById('ae41').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar41a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s41-a').toggle(
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
    $('#s41-b').toggle(
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
    $('#s41-c').toggle(
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

    $('#s41b-a').toggle(
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
    $('#s41b-b').toggle(
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
    $('#s41b-c').toggle(
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
    $('#su41-a').toggle(
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
    $('#su41-b').toggle(
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
    $('#su41-c').toggle(
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

    $('#su41b-a').toggle(
        function () {
            $(this).css({"background":"#f3e841"});
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
    $('#su41b-b').toggle(
        function () {
            $(this).css({"background":"#f3e841"});
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
    $('#su41b-c').toggle(
        function () {
            $(this).css({"background":"#f3e841"});
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
    $('#p41-a').toggle(
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
    $('#p41-b').toggle(
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
    $('#p41-c').toggle(
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
    $('#p41b-a').toggle(
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
    $('#p41b-b').toggle(
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
    $('#p41b-c').toggle(
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
	$('#d41').toggle(
        function () {
            $('#diente41-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau41.png') }}')");
            $('#diente41-a').css("background-position","-36px -13px");
            $('#diente41-a').css("background-repeat","no-repeat");
            $('#m41').prop('disabled', true); // Deshabilita el input con id 'm41'
            $('#i41').prop("disabled",true);
            $('#f41').prop("disabled",true);
            $('#s41-a').prop("disabled",true);
            $('#s41-b').prop("disabled",true);
            $('#s41-c').prop("disabled",true);
            $('#p41-a').prop("disabled",true);
            $('#p41-b').prop("disabled",true);
            $('#p41-c').prop("disabled",true);
            $('#mg41-a').prop("disabled",true);
            $('#mg41-b').prop("disabled",true);
            $('#mg41-c').prop("disabled",true);
            $('#ps41-a').prop("disabled",true);
            $('#ps41-b').prop("disabled",true);
            $('#ps41-c').prop("disabled",true);
            /*$('#furca41').css("background","none");*/
            $('#mg41-a').val('0');
            $('#mg41-b').val('0');
            $('#mg41-c').val('0');
            $('#ps41-a').val('0');
            $('#ps41-b').val('0');
            $('#ps41-c').val('0');

            $('#diente41b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-41b.png') }}')");
            $('#diente41b-a').css("background-position","0 23px");
            $('#diente41b-a').css("background-repeat","no-repeat");
            $('#m41b').prop("disabled",true);
            $('#i41b').prop("disabled",true);
            $('#f41b-a').prop("disabled",true);
            $('#f41b-b').prop("disabled",true);
            $('#s41b-a').prop("disabled",true);
            $('#s41b-b').prop("disabled",true);
            $('#s41b-c').prop("disabled",true);
            $('#p41b-a').prop("disabled",true);
            $('#p41b-b').prop("disabled",true);
            $('#p41b-c').prop("disabled",true);
            $('#mg41b-a').prop("disabled",true);
            $('#mg41b-b').prop("disabled",true);
            $('#mg41b-c').prop("disabled",true);
            $('#ps41b-a').prop("disabled",true);
            $('#ps41b-b').prop("disabled",true);
            $('#ps41b-c').prop("disabled",true);
            $('#mg41b-a').val('0');
            $('#mg41b-b').val('0');
            $('#mg41b-c').val('0');
            $('#ps41b-a').val('0');
            $('#ps41b-b').val('0');
            $('#ps41b-c').val('0');

            $('#furca41').prop("disabled",true);
            $('#furca41-a').prop("disabled",true);
            $('#furca41-b').prop("disabled",true);
            $('#ae41').prop("disabled",true);
            $('#pi41').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar41a();
            cargar41b();

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar41a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getSupuracion();
            getPlaca();

        },
        function () {
            $('#diente41-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-41.png') }}')");
            $('#diente41-a').css("background-position","0 -2px");
            $('#diente41-a').css("background-repeat","no-repeat");
            $('#m41').prop("disabled",false);
            $('#i41').prop("disabled",false);
            $('#f41').prop("disabled",false);
            $('#s41-a').prop("disabled",false);
            $('#s41-b').prop("disabled",false);
            $('#s41-c').prop("disabled",false);
            $('#p41-a').prop("disabled",false);
            $('#p41-b').prop("disabled",false);
            $('#p41-c').prop("disabled",false);
            $('#mg41-a').prop("disabled",false);
            $('#mg41-b').prop("disabled",false);
            $('#mg41-c').prop("disabled",false);
            $('#ps41-a').prop("disabled",false);
            $('#ps41-b').prop("disabled",false);
            $('#ps41-c').prop("disabled",false);

            $('#diente41b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-41b.png') }}')");
            $('#diente41b-a').css("background-position","0 23px");
            $('#diente41b-a').css("background-repeat","no-repeat");
            $('#m41b').prop("disabled",false);
            $('#i41b').prop("disabled",false);
            $('#f41b-a').prop("disabled",false);
            $('#f41b-b').prop("disabled",false);
            $('#s41b-a').prop("disabled",false);
            $('#s41b-b').prop("disabled",false);
            $('#s41b-c').prop("disabled",false);
            $('#p41b-a').prop("disabled",false);
            $('#p41b-b').prop("disabled",false);
            $('#p41b-c').prop("disabled",false);
            $('#mg41b-a').prop("disabled",false);
            $('#mg41b-b').prop("disabled",false);
            $('#mg41b-c').prop("disabled",false);
            $('#ps41b-a').prop("disabled",false);
            $('#ps41b-b').prop("disabled",false);
            $('#ps41b-c').prop("disabled",false);

            $('#furca41').css("display","block");
            $('#furca41-a').css("display","block");
            $('#furca41-b').css("display","block");
            $('#ae41').prop("disabled",false);
            $('#pi41').prop("disabled",false);

            totalDientes++;

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar41a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getPlaca();
        }
    );

    //IMPLANTES
	$('#i41').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f41').css({"background":"#FFFFFF"});
            $('#diente41-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl41.png') }}')");
            $('#diente41-a').css("background-position","-38px -2px");
            $('#diente41-a').css("background-repeat","no-repeat");

            $('#diente41b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-41b.png') }}')");
            $('#diente41b-a').css("background-position","0 23px");
            $('#diente41b-a').css("background-repeat","no-repeat");

            $('#furca41').css("background","none");
            $('#furca41-a').css("background","none");
            $('#furca41-b').css("background","none");
            $('#f41').css("background","none");
            $('#f41b-a').css("background","none");
            $('#f41b-b').css("background","none");

            $("#f41").attr("id","f41desact");
            $("#f41b-a").attr("id","f41b-adesact");
            $("#f41b-b").attr("id","f41b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente41-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-41.png') }}')");
            $('#diente41-a').css("background-position","0 -2px");
            $('#diente41-a').css("background-repeat","no-repeat");

            $('#diente41b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-41b.png') }}')");
            $('#diente41b-a').css("background-position","0 23px");
            $('#diente41b-a').css("background-repeat","no-repeat");

            $('#f41').css("background","#FFFFFF");
            $('#f41b-a').css("background","#FFFFFF");
            $('#f41b-b').css("background","#FFFFFF");

            $("#f41desact").attr("id","f41");
            $("#f41b-adesact").attr("id","f41b-a");
            $("#f41b-bdesact").attr("id","f41b-b");
            $('#d41').trigger('click');
        }
	);

    //FURCA
	$('#f41').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i41').css({"background":"#FFFFFF"});
			$('#furca41').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca41').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca41').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca41').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f41b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca41-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca41-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca41-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca41-a').css("background","none");
        }
    );
    $('#f41b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca41-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca41-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca41-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca41-b').css("background","none");
        }
    );




</script>




