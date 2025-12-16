
    {{--  </head>  --}}
    <style>
        #i46{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente46-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla5/periodontograma-dientes-arriba-46.png') }}');
            width:62px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i46b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente46b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla7/periodontograma-dientes-abajo-46b.png') }}');
            width:65px;
            background-position: 0 23px;
            background-repeat: no-repeat;
        }
        #d46,#i46,#i46b,#f46,,#ae46-a,#ae46-b:hover{
            background: #E6E6E6;
        }
        #i46-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f46{
            width: 95%;
            height: 18px;

            border: 1px solid #2cdcbf;
            background-repeat: no-repeat;
            float:left;
            display:inline;
        }
        #lineas-gr,#lineas-gr-inf{
            width: 100%;
            height: 460px;
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
        #pi46{
            width: 100%;
        }
        #furca46-a,#furca46-b{
            width: 46px;
            height: 46px;
            position: absolute;
        }
        #furca46-a{
            margin-top: 70px;
        }
        #furca46-b{
            margin-top: 80px;
            margin-left: 28px;
        }

        .f46,{
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
        $pieza46 = $piezas_periodonto->firstWhere('pieza', '46');
        $cuerpo46 = $pieza46 ? $pieza46->cuerpo : [];
        $pronostico46 = $cuerpo46['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl46.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau46.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-46b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-46b.png') }}"/>
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
                                Pieza 4.6
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

                                                <div id="visualization46a" style="width: 40px; height: 460px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente46-a"><div id="furca46"></div></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d46">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i46">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m46" name="m46" value="{{ $cuerpo46["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m46');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi46" id="pi46">
                                                    <option value="" {{ $pronostico46 == '' ? 'selected' : '' }}></option>
                                                    <option value="B" {{ $pronostico46 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico46 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico46 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico46 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Furca</label>
                                                <div class="border rounded input-dental pointer w-100" id="f46"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s46-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s46-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s46-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su46-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su46-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su46-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p46-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p46-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p46-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae46" name="ae46" value="{{ $cuerpo46["plataforma"] ?? 0 }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg46-a" name="mg46-a" value="{{ $cuerpo46["vest_altura_mg_a"] ?? 0 }}" onchange="cargar46a();getDefectos();rangoNumeroMargen('mg46-a');cargar46a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg46-b" name="mg46-b" value="{{ $cuerpo46["vest_altura_mg_b"] ?? 0 }}" onchange="cargar46a();getDefectos();rangoNumeroMargen('mg46-b');cargar46a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg46-c" name="mg46-c" value="{{ $cuerpo46["vest_altura_mg_c"] ?? 0 }}" onchange="cargar46a();getDefectos();rangoNumeroMargen('mg46-c');cargar46a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps46-a" name="ps46-a" value="{{ $cuerpo46["vest_psondaje_a"] ?? 0 }}" onchange="cargar46a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps46-b" name="ps46-b" value="{{ $cuerpo46["vest_psondaje_b"] ?? 0 }}" onchange="cargar46a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps46-c" name="ps46-c" value="{{ $cuerpo46["vest_psondaje_c"] ?? 0 }}" onchange="cargar46a();getDefectos();" tabindex="99"/>
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
                                                        <div id="visualization46b" style="width: 40px; height: 460px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente46b-a">
                                                            <div id="furca46-a"></div>
                                                            <div id="furca46-b"></div>
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
                                        <input class="form-control form-control-xs" type="number" id="ps46b-a" name="ps46b-a" value="{{ $cuerpo46["pala_psondaje_a"] ?? 0 }}" onchange="cargar46b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps46b-b" name="ps46b-a" value="{{ $cuerpo46["pala_psondaje_a"] ?? 0 }}" onchange="cargar46b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps46b-c" name="ps46b-a" value="{{ $cuerpo46["pala_psondaje_a"] ?? 0 }}" onchange="cargar46b();getDefectos();" tabindex="147"//>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg46b-a" name="mg46b-a" value="{{ $cuerpo46["pala_altura_mg_a"] ?? 0 }}" onchange="cargar46b();getDefectos();rangoNumeroMargen('mg46b-a');cargar46b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg46b-b" name="mg46b-b" value="{{ $cuerpo46["pala_altura_mg_b"] ?? 0 }}" onchange="cargar46b();getDefectos();rangoNumeroMargen('mg46b-b');cargar46b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg46b-c" name="mg46b-c" value="{{ $cuerpo46["pala_altura_mg_c"] ?? 0 }}" onchange="cargar46b();getDefectos();rangoNumeroMargen('mg46b-c');cargar46b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s46b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s46b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s46b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental" id="su46b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su46b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su46b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p46b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p46b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p46b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-2">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Furca 1</h6>
                                    </div>

                                    <div class="col-sm-12 col-md-2">
                                        <div class="border rounded input-dental pointer w-100" id="f46b-a"></div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Furca 2</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div class="border rounded input-dental pointer w-100" id="f46b-b"></div>
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
                <div class="form-group" id="obs_pieza4.6">
                    <label class="floating-label-activo-sm">Obs. Pieza 4.6</label>
                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 4.6" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_46" id="obs_46" placeholder="Describa observaciones">{{ $cuerpo46["observaciones"] ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza4.6">
                <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('46')"><i class="feather icon-save"></i>  Guardar evaluación 4.6</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar46a();
        cargar46b();

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

    function drawVisualization46a(data46a) {
        // Create and draw the visualization.
        var ac46a = new google.visualization.AreaChart(document.getElementById('visualization46a'));
        ac46a.draw(data46a, {
        isStacked: true,
        backgroundColor: 'transparent',
        legend: {position: 'none'},
        tooltip: {trigger:'none'},
        axisTitlesPosition: 'none',
        theme: {chartArea: {width: '100%', height: '100%'}},
        width: 40,
        height: 460,
        hAxis: {},
        vAxis: {gridlines: {color: 'transparent', count: 31},baseline:0,textPosition:'none',viewWindowMode: 'explicit',viewWindow: {max:19,min:-12}}
        });

        $('#visualization46a iframe').attr('allowTransparency', 'true');
        $('#visualization46a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar46a(){

        var datoae46=document.getElementById('ae46').value;

        var datomg46a=document.getElementById('mg46-a').value;
        var datomg46b=document.getElementById('mg46-b').value;
        var datomg46c=document.getElementById('mg46-c').value;

        var datops46a=document.getElementById('ps46-a').value;
        var datops46b=document.getElementById('ps46-b').value;
        var datops46c=document.getElementById('ps46-c').value;

        //alert(document.getElementById('ps46-a').value);

        if(datops46a>3){
            document.getElementById('ps46-a').style.color="red";
        }else{
            document.getElementById('ps46-a').style.color="black";
        }
        if(datops46b>3){
            document.getElementById('ps46-b').style.color="red";
        }else{
            document.getElementById('ps46-b').style.color="black";
        }
        if(datops46c>3){
            document.getElementById('ps46-c').style.color="red";
        }else{
            document.getElementById('ps46-c').style.color="black";
        }


        var data46a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg46a)+parseInt(datops46a)),      0-parseInt(datops46a), parseInt(datoae46)],
            ['',    0+(parseInt(datomg46b)+parseInt(datops46b)),      0-parseInt(datops46b), parseInt(datoae46)],
            ['',    0+(parseInt(datomg46c)+parseInt(datops46c)),      0-parseInt(datops46c), parseInt(datoae46)]
        ]);

        drawVisualization46a(data46a);

    }

    function drawVisualization46b(data46b) {

        // Create and draw the visualization.
        var ac46b = new google.visualization.AreaChart(document.getElementById('visualization46b'));
        ac46b.draw(data46b, {
        isStacked: true,
        backgroundColor: 'transparent',
        legend: {position: 'none'},
        tooltip: {trigger:'none'},
        axisTitlesPosition: 'none',
        theme: {chartArea: {width: '100%', height: '100%'}},
        width: 40,
        height: 460,
        hAxis: {},
        vAxis: {gridlines: {color: 'transparent', count: 31},baseline:0,textPosition:'none',viewWindowMode: 'explicit',viewWindow: {max:12,min:-19}}
        });
        $('#visualization46b iframe').attr('allowTransparency', 'true');
        $('#visualization46b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar46b(){

        var datomg46ba=document.getElementById('mg46b-a').value;
        var datomg46bb=document.getElementById('mg46b-b').value;
        var datomg46bc=document.getElementById('mg46b-c').value;

        var datops46ba=document.getElementById('ps46b-a').value;
        var datops46bb=document.getElementById('ps46b-b').value;
        var datops46bc=document.getElementById('ps46b-c').value;

        if(datops46ba>3){
            document.getElementById('ps46b-a').style.color="red";
        }else{
            document.getElementById('ps46b-a').style.color="black";
        }
        if(datops46bb>3){
            document.getElementById('ps46b-b').style.color="red";
        }else{
            document.getElementById('ps46b-b').style.color="black";
        }
        if(datops46bc>3){
            document.getElementById('ps46b-c').style.color="red";
        }else{
            document.getElementById('ps46b-c').style.color="black";
        }

        var data46b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg46ba)+parseInt(datops46ba)),      0+parseInt(datops46ba)],
            ['',    0-(parseInt(datomg46bb)+parseInt(datops46bb)),      0+parseInt(datops46bb)],
            ['',    0-(parseInt(datomg46bc)+parseInt(datops46bc)),      0+parseInt(datops46bc)]
        ]);

        drawVisualization46b(data46b);

    }

    arrstyle = ["i46","f46","f46b-a","f46b-b","s46-a","s46-b","s46-c","p46-a","p46-b","p46-c","s46b-a","s46b-b","s46b-c","p46b-a","p46b-b","p46b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae46').change(function() {
        if(parseInt(document.getElementById('ae46').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar46a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s46-a').toggle(
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
    $('#s46-b').toggle(
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
    $('#s46-c').toggle(
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

    $('#s46b-a').toggle(
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
    $('#s46b-b').toggle(
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
    $('#s46b-c').toggle(
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
    $('#su46-a').toggle(
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
    $('#su46-b').toggle(
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
    $('#su46-c').toggle(
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

    $('#su46b-a').toggle(
        function () {
            $(this).css({"background":"#f3e846"});
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
    $('#su46b-b').toggle(
        function () {
            $(this).css({"background":"#f3e846"});
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
    $('#su46b-c').toggle(
        function () {
            $(this).css({"background":"#f3e846"});
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
    $('#p46-a').toggle(
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
    $('#p46-b').toggle(
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
    $('#p46-c').toggle(
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
    $('#p46b-a').toggle(
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
    $('#p46b-b').toggle(
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
    $('#p46b-c').toggle(
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
	$('#d46').toggle(
        function () {
            $('#diente46-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau46.png') }}')");
            $('#diente46-a').css("background-position","-36px -13px");
            $('#diente46-a').css("background-repeat","no-repeat");
            $('#m46').prop('disabled', true); // Deshabilita el input con id 'm46'
            $('#i46').prop("disabled",true);
            $('#f46').prop("disabled",true);
            $('#s46-a').prop("disabled",true);
            $('#s46-b').prop("disabled",true);
            $('#s46-c').prop("disabled",true);
            $('#p46-a').prop("disabled",true);
            $('#p46-b').prop("disabled",true);
            $('#p46-c').prop("disabled",true);
            $('#mg46-a').prop("disabled",true);
            $('#mg46-b').prop("disabled",true);
            $('#mg46-c').prop("disabled",true);
            $('#ps46-a').prop("disabled",true);
            $('#ps46-b').prop("disabled",true);
            $('#ps46-c').prop("disabled",true);
            /*$('#furca46').css("background","none");*/
            $('#mg46-a').val('0');
            $('#mg46-b').val('0');
            $('#mg46-c').val('0');
            $('#ps46-a').val('0');
            $('#ps46-b').val('0');
            $('#ps46-c').val('0');

            $('#diente46b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-46b.png') }}')");
            $('#diente46b-a').css("background-position","0 23px");
            $('#diente46b-a').css("background-repeat","no-repeat");
            $('#m46b').prop("disabled",true);
            $('#i46b').prop("disabled",true);
            $('#f46b-a').prop("disabled",true);
            $('#f46b-b').prop("disabled",true);
            $('#s46b-a').prop("disabled",true);
            $('#s46b-b').prop("disabled",true);
            $('#s46b-c').prop("disabled",true);
            $('#p46b-a').prop("disabled",true);
            $('#p46b-b').prop("disabled",true);
            $('#p46b-c').prop("disabled",true);
            $('#mg46b-a').prop("disabled",true);
            $('#mg46b-b').prop("disabled",true);
            $('#mg46b-c').prop("disabled",true);
            $('#ps46b-a').prop("disabled",true);
            $('#ps46b-b').prop("disabled",true);
            $('#ps46b-c').prop("disabled",true);
            $('#mg46b-a').val('0');
            $('#mg46b-b').val('0');
            $('#mg46b-c').val('0');
            $('#ps46b-a').val('0');
            $('#ps46b-b').val('0');
            $('#ps46b-c').val('0');

            $('#furca46').prop("disabled",true);
            $('#furca46-a').prop("disabled",true);
            $('#furca46-b').prop("disabled",true);
            $('#ae46').prop("disabled",true);
            $('#pi46').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar46a();
            cargar46b();

            {{--  cargar17a();
            cargar46a();
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
            $('#diente46-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-46.png') }}')");
            $('#diente46-a').css("background-position","0 -2px");
            $('#diente46-a').css("background-repeat","no-repeat");
            $('#m46').prop("disabled",false);
            $('#i46').prop("disabled",false);
            $('#f46').prop("disabled",false);
            $('#s46-a').prop("disabled",false);
            $('#s46-b').prop("disabled",false);
            $('#s46-c').prop("disabled",false);
            $('#p46-a').prop("disabled",false);
            $('#p46-b').prop("disabled",false);
            $('#p46-c').prop("disabled",false);
            $('#mg46-a').prop("disabled",false);
            $('#mg46-b').prop("disabled",false);
            $('#mg46-c').prop("disabled",false);
            $('#ps46-a').prop("disabled",false);
            $('#ps46-b').prop("disabled",false);
            $('#ps46-c').prop("disabled",false);

            $('#diente46b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-46b.png') }}')");
            $('#diente46b-a').css("background-position","0 23px");
            $('#diente46b-a').css("background-repeat","no-repeat");
            $('#m46b').prop("disabled",false);
            $('#i46b').prop("disabled",false);
            $('#f46b-a').prop("disabled",false);
            $('#f46b-b').prop("disabled",false);
            $('#s46b-a').prop("disabled",false);
            $('#s46b-b').prop("disabled",false);
            $('#s46b-c').prop("disabled",false);
            $('#p46b-a').prop("disabled",false);
            $('#p46b-b').prop("disabled",false);
            $('#p46b-c').prop("disabled",false);
            $('#mg46b-a').prop("disabled",false);
            $('#mg46b-b').prop("disabled",false);
            $('#mg46b-c').prop("disabled",false);
            $('#ps46b-a').prop("disabled",false);
            $('#ps46b-b').prop("disabled",false);
            $('#ps46b-c').prop("disabled",false);

            $('#furca46').css("display","block");
            $('#furca46-a').css("display","block");
            $('#furca46-b').css("display","block");
            $('#ae46').prop("disabled",false);
            $('#pi46').prop("disabled",false);

            totalDientes++;

            {{--  cargar17a();
            cargar46a();
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
	$('#i46').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f46').css({"background":"#FFFFFF"});
            $('#diente46-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl46.png') }}')");
            $('#diente46-a').css("background-position","-38px -2px");
            $('#diente46-a').css("background-repeat","no-repeat");

            $('#diente46b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-46b.png') }}')");
            $('#diente46b-a').css("background-position","0 23px");
            $('#diente46b-a').css("background-repeat","no-repeat");

            $('#furca46').css("background","none");
            $('#furca46-a').css("background","none");
            $('#furca46-b').css("background","none");
            $('#f46').css("background","none");
            $('#f46b-a').css("background","none");
            $('#f46b-b').css("background","none");

            $("#f46").attr("id","f46desact");
            $("#f46b-a").attr("id","f46b-adesact");
            $("#f46b-b").attr("id","f46b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente46-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-46.png') }}')");
            $('#diente46-a').css("background-position","0 -2px");
            $('#diente46-a').css("background-repeat","no-repeat");

            $('#diente46b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-46b.png') }}')");
            $('#diente46b-a').css("background-position","0 23px");
            $('#diente46b-a').css("background-repeat","no-repeat");

            $('#f46').css("background","#FFFFFF");
            $('#f46b-a').css("background","#FFFFFF");
            $('#f46b-b').css("background","#FFFFFF");

            $("#f46desact").attr("id","f46");
            $("#f46b-adesact").attr("id","f46b-a");
            $("#f46b-bdesact").attr("id","f46b-b");
            $('#d46').trigger('click');
        }
	);

    //FURCA
	$('#f46').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i46').css({"background":"#FFFFFF"});
			$('#furca46').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca46').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca46').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca46').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f46b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca46-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca46-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca46-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca46-a').css("background","none");
        }
    );
    $('#f46b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca46-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca46-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca46-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca46-b').css("background","none");
        }
    );




</script>



