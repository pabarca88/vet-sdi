
    {{--  </head>  --}}
    <style>
        #i17{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente17-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-17.png') }}');
            width:62px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i17b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente17b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-17b.png') }}');
            width:62px;
            background-position: 0 23px;
            background-repeat: no-repeat;
        }
        #d17,#i17,#i17b,#f17,,#ae17-a,#ae17-b:hover{
            background: #E6E6E6;
        }
        #i17-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f17{
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
        #pi17{
            width: 100%;
        }
        #furca17-a,#furca17-b{
            width: 16px;
            height: 16px;
            position: absolute;
        }
        #furca17-a{
            margin-top: 80px;
        }
        #furca17-b{
            margin-top: 80px;
            margin-left: 28px;
        }

        .f17,{
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
        $pieza17 = $piezas_periodonto->firstWhere('pieza', '17');
        $cuerpo17 = $pieza17 ? $pieza17->cuerpo : [];
        $pronostico_17 = $cuerpo17['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl17.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau17.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-17b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-17b.png') }}"/>
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
                                Pieza 1.7
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

                                                <div id="visualization17a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente17-a"><div id="furca17"></div></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d17">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i17">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m17" name="m17" value="0" tabindex="1" onchange="rangoNumero('m17');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi17" id="pi17">
                                                    <option value="" {{ $pronostico_17 == '' ? 'selected' : '' }}></option>
                                                    <option value="B" {{ $pronostico_17 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico_17 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico_17 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico_17 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Furca</label>
                                                <div class="border rounded input-dental pointer w-100" id="f17"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s17-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s17-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s17-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su17-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su17-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su17-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p17-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p17-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p17-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae17" name="ae17" value="{{ $pieza17->cuerpo['plataforma_vestibular'] ?? '' }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg17-a" name="mg17-a" value="{{ $cuerpo17['vest_altura_mg_a'] ?? 0 }}" onchange="cargar17a();getDefectos();rangoNumeroMargen('mg17-a');cargar17a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg17-b" name="mg17-b" value="{{ $cuerpo17['vest_altura_mg_b'] ?? 0 }}" onchange="cargar17a();getDefectos();rangoNumeroMargen('mg17-b');cargar17a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg17-c" name="mg17-c" value="{{ $cuerpo17['vest_altura_mg_c'] ?? 0 }}" onchange="cargar17a();getDefectos();rangoNumeroMargen('mg17-c');cargar17a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps17-a" name="ps17-a" value="{{ $cuerpo17['vest_psondaje_a'] ?? 0 }}" onchange="cargar17a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps17-b" name="ps17-b" value="{{ $cuerpo17['vest_psondaje_b'] ?? 0 }}" onchange="cargar17a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps17-c" name="ps17-c" value="{{ $cuerpo17['vest_psondaje_c'] ?? 0 }}" onchange="cargar17a();getDefectos();" tabindex="99"/>
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
                                                        <div id="visualization17b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente17b-a">
                                                            <div id="furca17-a"></div>
                                                            <div id="furca17-b"></div>
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
                                        <input class="form-control form-control-xs" type="number" id="ps17b-a" name="ps17b-a" value="{{ $cuerpo17['pala_psondaje_a'] ?? 0 }}" onchange="cargar17b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps17b-b" name="ps17b-a" value="{{ $cuerpo17['pala_psondaje_b'] ?? 0 }}" onchange="cargar17b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps17b-c" name="ps17b-c" value="{{ $cuerpo17['pala_psondaje_c'] ?? 0 }}" onchange="cargar17b();getDefectos();" tabindex="147">
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg17b-a" name="mg17b-a" value="{{ $cuerpo17['pala_altura_mg_a'] ?? 0 }}" onchange="cargar17b();getDefectos();rangoNumeroMargen('mg17b-a');cargar17b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg17b-b" name="mg17b-b" value="{{ $cuerpo17['pala_altura_mg_b'] ?? 0 }}" onchange="cargar17b();getDefectos();rangoNumeroMargen('mg17b-b');cargar17b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg17b-c" name="mg17b-c" value="{{ $cuerpo17['pala_altura_mg_c'] ?? 0 }}" onchange="cargar17b();getDefectos();rangoNumeroMargen('mg17b-c');cargar17b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s17b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s17b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s17b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su17b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su17b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su17b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p17b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p17b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p17b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mt-3">
                                    <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Furcas</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label class="floating-label-activo-sm">Furca 1</label>
                                        <div class="border rounded input-dental pointer w-100" id="f17b-a"></div>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <label class="floating-label-activo-sm">Furca 2</label>
                                        <div class="border rounded input-dental pointer w-100" id="f17b-b"></div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group" id="obs_pieza1.7">
                            <label class="floating-label-activo-sm">Obs. Pieza 1.7</label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 1.7" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_17" id="obs_17" placeholder="Describa observaciones">{{ $cuerpo17["observaciones"] ?? 0 }}</textarea>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza1.7">
                <button type="button" onclick="guardar_pieza('17')" class="btn btn-info text-center"><i class="feather icon-save"></i>  Guardar evaluación 1.7</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar17a();
        cargar17b();

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

    function drawVisualization17a(data17a) {
        // Create and draw the visualization.
        var ac17a = new google.visualization.AreaChart(document.getElementById('visualization17a'));
        ac17a.draw(data17a, {
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

        $('#visualization17a iframe').attr('allowTransparency', 'true');
        $('#visualization17a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar17a(){

        var datoae17=document.getElementById('ae17').value;

        var datomg17a=document.getElementById('mg17-a').value;
        var datomg17b=document.getElementById('mg17-b').value;
        var datomg17c=document.getElementById('mg17-c').value;

        var datops17a=document.getElementById('ps17-a').value;
        var datops17b=document.getElementById('ps17-b').value;
        var datops17c=document.getElementById('ps17-c').value;

        //alert(document.getElementById('ps17-a').value);

        if(datops17a>3){
            document.getElementById('ps17-a').style.color="red";
        }else{
            document.getElementById('ps17-a').style.color="black";
        }
        if(datops17b>3){
            document.getElementById('ps17-b').style.color="red";
        }else{
            document.getElementById('ps17-b').style.color="black";
        }
        if(datops17c>3){
            document.getElementById('ps17-c').style.color="red";
        }else{
            document.getElementById('ps17-c').style.color="black";
        }


        var data17a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg17a)+parseInt(datops17a)),      0-parseInt(datops17a), parseInt(datoae17)],
            ['',    0+(parseInt(datomg17b)+parseInt(datops17b)),      0-parseInt(datops17b), parseInt(datoae17)],
            ['',    0+(parseInt(datomg17c)+parseInt(datops17c)),      0-parseInt(datops17c), parseInt(datoae17)]
        ]);

        drawVisualization17a(data17a);

    }

    function drawVisualization17b(data17b) {

        // Create and draw the visualization.
        var ac17b = new google.visualization.AreaChart(document.getElementById('visualization17b'));
        ac17b.draw(data17b, {
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
        $('#visualization17b iframe').attr('allowTransparency', 'true');
        $('#visualization17b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar17b(){

        var datomg17ba=document.getElementById('mg17b-a').value;
        var datomg17bb=document.getElementById('mg17b-b').value;
        var datomg17bc=document.getElementById('mg17b-c').value;

        var datops17ba=document.getElementById('ps17b-a').value;
        var datops17bb=document.getElementById('ps17b-b').value;
        var datops17bc=document.getElementById('ps17b-c').value;

        if(datops17ba>3){
            document.getElementById('ps17b-a').style.color="red";
        }else{
            document.getElementById('ps17b-a').style.color="black";
        }
        if(datops17bb>3){
            document.getElementById('ps17b-b').style.color="red";
        }else{
            document.getElementById('ps17b-b').style.color="black";
        }
        if(datops17bc>3){
            document.getElementById('ps17b-c').style.color="red";
        }else{
            document.getElementById('ps17b-c').style.color="black";
        }

        var data17b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg17ba)+parseInt(datops17ba)),      0+parseInt(datops17ba)],
            ['',    0-(parseInt(datomg17bb)+parseInt(datops17bb)),      0+parseInt(datops17bb)],
            ['',    0-(parseInt(datomg17bc)+parseInt(datops17bc)),      0+parseInt(datops17bc)]
        ]);

        drawVisualization17b(data17b);

    }

    arrstyle = ["i17","f17","f17b-a","f17b-b","s17-a","s17-b","s17-c","p17-a","p17-b","p17-c","s17b-a","s17b-b","s17b-c","p17b-a","p17b-b","p17b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae17').change(function() {
        if(parseInt(document.getElementById('ae17').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar17a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s17-a').toggle(
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
    $('#s17-b').toggle(
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
    $('#s17-c').toggle(
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

    $('#s17b-a').toggle(
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
    $('#s17b-b').toggle(
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
    $('#s17b-c').toggle(
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
    $('#su17-a').toggle(
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
    $('#su17-b').toggle(
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
    $('#su17-c').toggle(
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

    $('#su17b-a').toggle(
        function () {
            $(this).css({"background":"#f3e817"});
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
    $('#su17b-b').toggle(
        function () {
            $(this).css({"background":"#f3e817"});
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
    $('#su17b-c').toggle(
        function () {
            $(this).css({"background":"#f3e817"});
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
    $('#p17-a').toggle(
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
    $('#p17-b').toggle(
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
    $('#p17-c').toggle(
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
    $('#p17b-a').toggle(
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
    $('#p17b-b').toggle(
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
    $('#p17b-c').toggle(
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
	$('#d17').toggle(
        function () {
            $('#diente17-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau17.png') }}')");
            $('#diente17-a').css("background-position","0px -2px");
            $('#diente17-a').css("background-repeat","no-repeat");
            $('#m17').prop('disabled', true); // Deshabilita el input con id 'm17'
            $('#i17').prop("disabled",true);
            $('#f17').prop("disabled",true);
            $('#s17-a').prop("disabled",true);
            $('#s17-b').prop("disabled",true);
            $('#s17-c').prop("disabled",true);
            $('#p17-a').prop("disabled",true);
            $('#p17-b').prop("disabled",true);
            $('#p17-c').prop("disabled",true);
            $('#mg17-a').prop("disabled",true);
            $('#mg17-b').prop("disabled",true);
            $('#mg17-c').prop("disabled",true);
            $('#ps17-a').prop("disabled",true);
            $('#ps17-b').prop("disabled",true);
            $('#ps17-c').prop("disabled",true);
            /*$('#furca17').css("background","none");*/
            $('#mg17-a').val('0');
            $('#mg17-b').val('0');
            $('#mg17-c').val('0');
            $('#ps17-a').val('0');
            $('#ps17-b').val('0');
            $('#ps17-c').val('0');

            $('#diente17b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-17b.png') }}')");
            $('#diente17b-a').css("background-position","0 23px");
            $('#diente17b-a').css("background-repeat","no-repeat");
            $('#m17b').prop("disabled",true);
            $('#i17b').prop("disabled",true);
            $('#f17b-a').prop("disabled",true);
            $('#f17b-b').prop("disabled",true);
            $('#s17b-a').prop("disabled",true);
            $('#s17b-b').prop("disabled",true);
            $('#s17b-c').prop("disabled",true);
            $('#p17b-a').prop("disabled",true);
            $('#p17b-b').prop("disabled",true);
            $('#p17b-c').prop("disabled",true);
            $('#mg17b-a').prop("disabled",true);
            $('#mg17b-b').prop("disabled",true);
            $('#mg17b-c').prop("disabled",true);
            $('#ps17b-a').prop("disabled",true);
            $('#ps17b-b').prop("disabled",true);
            $('#ps17b-c').prop("disabled",true);
            $('#mg17b-a').val('0');
            $('#mg17b-b').val('0');
            $('#mg17b-c').val('0');
            $('#ps17b-a').val('0');
            $('#ps17b-b').val('0');
            $('#ps17b-c').val('0');

            $('#furca17').prop("disabled",true);
            $('#furca17-a').prop("disabled",true);
            $('#furca17-b').prop("disabled",true);
            $('#ae17').prop("disabled",true);
            $('#pi17').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar17a();
            cargar17b();

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
            $('#diente17-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-17.png') }}')");
            $('#diente17-a').css("background-position","0 -2px");
            $('#diente17-a').css("background-repeat","no-repeat");
            $('#m17').prop("disabled",false);
            $('#i17').prop("disabled",false);
            $('#f17').prop("disabled",false);
            $('#s17-a').prop("disabled",false);
            $('#s17-b').prop("disabled",false);
            $('#s17-c').prop("disabled",false);
            $('#p17-a').prop("disabled",false);
            $('#p17-b').prop("disabled",false);
            $('#p17-c').prop("disabled",false);
            $('#mg17-a').prop("disabled",false);
            $('#mg17-b').prop("disabled",false);
            $('#mg17-c').prop("disabled",false);
            $('#ps17-a').prop("disabled",false);
            $('#ps17-b').prop("disabled",false);
            $('#ps17-c').prop("disabled",false);

            $('#diente17b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-17b.png') }}')");
            $('#diente17b-a').css("background-position","0 23px");
            $('#diente17b-a').css("background-repeat","no-repeat");
            $('#m17b').prop("disabled",false);
            $('#i17b').prop("disabled",false);
            $('#f17b-a').prop("disabled",false);
            $('#f17b-b').prop("disabled",false);
            $('#s17b-a').prop("disabled",false);
            $('#s17b-b').prop("disabled",false);
            $('#s17b-c').prop("disabled",false);
            $('#p17b-a').prop("disabled",false);
            $('#p17b-b').prop("disabled",false);
            $('#p17b-c').prop("disabled",false);
            $('#mg17b-a').prop("disabled",false);
            $('#mg17b-b').prop("disabled",false);
            $('#mg17b-c').prop("disabled",false);
            $('#ps17b-a').prop("disabled",false);
            $('#ps17b-b').prop("disabled",false);
            $('#ps17b-c').prop("disabled",false);

            $('#furca17').css("display","block");
            $('#furca17-a').css("display","block");
            $('#furca17-b').css("display","block");
            $('#ae17').prop("disabled",false);
            $('#pi17').prop("disabled",false);

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
	$('#i17').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f17').css({"background":"#FFFFFF"});
            $('#diente17-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl17.png') }}')");
            $('#diente17-a').css("background-position","1px -2px");
            $('#diente17-a').css("background-repeat","no-repeat");

            $('#diente17b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-17b.png') }}')");
            $('#diente17b-a').css("background-position","0 23px");
            $('#diente17b-a').css("background-repeat","no-repeat");

            $('#furca17').css("background","none");
            $('#furca17-a').css("background","none");
            $('#furca17-b').css("background","none");
            $('#f17').css("background","none");
            $('#f17b-a').css("background","none");
            $('#f17b-b').css("background","none");

            $("#f17").attr("id","f17desact");
            $("#f17b-a").attr("id","f17b-adesact");
            $("#f17b-b").attr("id","f17b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente17-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-17.png') }}')");
            $('#diente17-a').css("background-position","0 -2px");
            $('#diente17-a').css("background-repeat","no-repeat");

            $('#diente17b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-17b.png') }}')");
            $('#diente17b-a').css("background-position","0 23px");
            $('#diente17b-a').css("background-repeat","no-repeat");

            $('#f17').css("background","#FFFFFF");
            $('#f17b-a').css("background","#FFFFFF");
            $('#f17b-b').css("background","#FFFFFF");

            $("#f17desact").attr("id","f17");
            $("#f17b-adesact").attr("id","f17b-a");
            $("#f17b-bdesact").attr("id","f17b-b");
            $('#d17').trigger('click');
        }
	);

    //FURCA
	$('#f17').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i17').css({"background":"#FFFFFF"});
			$('#furca17').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca17').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca17').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca17').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f17b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca17-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca17-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca17-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca17-a').css("background","none");
        }
    );
    $('#f17b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca17-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca17-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca17-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca17-b').css("background","none");
        }
    );




</script>



