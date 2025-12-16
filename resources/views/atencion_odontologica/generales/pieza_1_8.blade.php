
    {{--  </head>  --}}
    <style>
        #i18{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente18-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-18.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;

        }


        #i18b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente18b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-18b.png') }}');
            width:54px;
            background-position: 0 23px;
            background-repeat: no-repeat;
        }
        #d18,#i18,#i18b,#f18,,#ae18-a,#ae18-b:hover{
            background: #E6E6E6;
        }
        #i18-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f18{
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
        #pi18{
            width: 100%;
        }
        #furca18-a,#furca18-b{
            width: 16px;
            height: 16px;
            position: absolute;
        }
        #furca18-a{
            margin-top: 70px;
        }
        #furca18-b{
            margin-top: 80px;
            margin-left: 28px;
        }

        .f18,{
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
        $pieza18 = $piezas_periodonto->firstWhere('pieza', '18');
        $cuerpo18 = $pieza18 ? $pieza18->cuerpo : [];
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl18.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau18.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-18b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-18b.png') }}"/>
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
                                Pieza 1.8
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

                                                <div id="visualization18a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente18-a"><div id="furca18"></div></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d18">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i18">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m18" name="m18" value="{{ $cuerpo18["movilidad"] ?? '' }}" tabindex="1" onchange="rangoNumero('m18');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                @php
                                                    $pronostico_18 = '';
                                                    foreach($piezas_periodonto as $p) {
                                                        if($p->pieza == '18') {
                                                            $pronostico_18 = $p->cuerpo["pronostico"];
                                                            break;
                                                        }
                                                    }
                                                @endphp

                                                <select class="form-control form-control-xs" name="pi18" id="pi18">
                                                    <option value="" {{ $pronostico_18 == '' ? 'selected' : '' }}></option>
                                                    <option value="B" {{ $pronostico_18 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico_18 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico_18 == 'M' ? 'selecteed' : '' }}>Resrvado</option>
                                                    <option value="I" {{ $pronostico_18 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Furca</label>
                                                <div class="border rounded input-dental pointer w-100" id="f18"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s18-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s18-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s18-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su18-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su18-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su18-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p18-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p18-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p18-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs"
                                                   type="number"
                                                   id="ae18"
                                                   name="ae18"
                                                   value="{{ $pieza18->cuerpo['plataforma_vestibular'] ?? '' }}"
                                                   tabindex="33" />
                                        </div>
                                    </div>

                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs"
                                                   type="number"
                                                   id="mg18-a"
                                                   name="mg18-a"
                                                   value="{{ $pieza18->cuerpo['vest_altura_mg_a'] ?? '' }}"
                                                   onchange="cargar18a();getDefectos();rangoNumeroMargen('mg18-a');cargar18a();"
                                                   tabindex="49" />
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs"
                                                   type="number"
                                                   id="mg18-b"
                                                   name="mg18-b"
                                                   value="{{ $pieza18->cuerpo['vest_altura_mg_b'] ?? '' }}"
                                                   onchange="cargar18a();getDefectos();rangoNumeroMargen('mg18-b');cargar18a();"
                                                   tabindex="50" />
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs"
                                                   type="number"
                                                   id="mg18-c"
                                                   name="mg18-c"
                                                   value="{{ $pieza18->cuerpo['vest_altura_mg_c'] ?? '' }}"
                                                   onchange="cargar18a();getDefectos();rangoNumeroMargen('mg18-c');cargar18a();"
                                                   tabindex="51" />
                                        </div>
                                    </div>

                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps18-a" name="ps18-a" value="{{ $cuerpo18['vest_psondaje_a'] ?? 0 }}" onchange="cargar18a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps18-b" name="ps18-b" value="{{ $cuerpo18['vest_psondaje_b'] ?? 0 }}" onchange="cargar18a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps18-c" name="ps18-c" value="{{ $cuerpo18['vest_psondaje_c'] ?? 0 }}" onchange="cargar18a();getDefectos();" tabindex="98"/>
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
                <div class="card mb-3">
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
                                                        <div id="visualization18b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente18b-a">
                                                            <div id="furca18-a"></div>
                                                            <div id="furca18-b"></div>
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
                                            <input class="form-control form-control-xs" type="number" id="ps18b-a" name="ps18b-a" value="{{ $pieza18->cuerpo['pala_psondaje_a'] ?? 0 }}" onchange="cargar18b();getDefectos();" tabindex="145"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps18b-b" name="ps18b-b" value="{{ $pieza18->cuerpo['pala_psondaje_b'] ?? 0 }}" onchange="cargar18b();getDefectos();" tabindex="146"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps18b-c" name="ps18b-c" value="{{ $pieza18->cuerpo['pala_psondaje_c'] ?? 0 }}" onchange="cargar18b();getDefectos();" tabindex="147"/>
                                        </div>
                                    </div>

                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg18b-a" name="mg18b-a"
                                                   value="{{ $pieza18->cuerpo['pala_altura_mg_a'] ?? '' }}"
                                                   onchange="cargar18b();getDefectos();rangoNumeroMargen('mg18b-a');cargar18b();" tabindex="193"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg18b-b" name="mg18b-b"
                                                   value="{{ $pieza18->cuerpo['pala_altura_mg_b'] ?? '' }}"
                                                   onchange="cargar18b();getDefectos();rangoNumeroMargen('mg18b-b');cargar18b();" tabindex="194"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg18b-c" name="mg18b-c"
                                                   value="{{ $pieza18->cuerpo['pala_altura_mg_c'] ?? '' }}"
                                                   onchange="cargar18b();getDefectos();rangoNumeroMargen('mg18b-c');cargar18b();" tabindex="195"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                            <div class="col-sm-12 col-md-4">
                                                <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                            </div>
                                            <div class="col">
                                                <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s18b-a"></div>
                                            </div>
                                            <div class="col">
                                                <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s18b-b" ></div>
                                            </div>
                                            <div class="col">
                                                <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s18b-c"></div>
                                            </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental" id="su18b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su18b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su18b-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p18b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p18b-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p18b-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mt-3">
                                        <div class="col-sm-12 col-md-4">
                                                <h6 class="font-weight-bold text-c-blue pt-2">Furcas</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <label class="floating-label-activo-sm">Furca 1</label>
                                            <div class="border rounded input-dental pointer w-100" id="f18b-a"></div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <label class="floating-label-activo-sm">Furca 2</label>
                                            <div class="border rounded input-dental pointer w-100" id="f18b-b"></div>
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
                        <div class="form-group" id="obs_pieza1.8">
                            <label class="floating-label-activo-sm">Obs. Pieza 1.8</label>
                                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 1.8" data-seccion="Eval_periimplantar"  rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_18" id="obs_18" placeholder="Describa observaciones">{{ $pieza18->cuerpo['observaciones'] ?? '' }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FORMULARIO DE OBS. Y BOTÓN GUARDAR-->

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza1.8">
                <button type="button" onclick="guardar_pieza('18')" class="btn btn-info text-center"><i class="feather icon-save"></i>  Guardar evaluación 1.8</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar18a();
        cargar18b();

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

    function drawVisualization18a(data18a) {
        // Create and draw the visualization.
        var ac18a = new google.visualization.AreaChart(document.getElementById('visualization18a'));
        ac18a.draw(data18a, {
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

        $('#visualization18a iframe').attr('allowTransparency', 'true');
        $('#visualization18a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar18a(){

        var datoae18=document.getElementById('ae18').value;

        var datomg18a=document.getElementById('mg18-a').value;
        var datomg18b=document.getElementById('mg18-b').value;
        var datomg18c=document.getElementById('mg18-c').value;

        var datops18a=document.getElementById('ps18-a').value;
        var datops18b=document.getElementById('ps18-b').value;
        var datops18c=document.getElementById('ps18-c').value;

        //alert(document.getElementById('ps18-a').value);

        if(datops18a>3){
            document.getElementById('ps18-a').style.color="red";
        }else{
            document.getElementById('ps18-a').style.color="black";
        }
        if(datops18b>3){
            document.getElementById('ps18-b').style.color="red";
        }else{
            document.getElementById('ps18-b').style.color="black";
        }
        if(datops18c>3){
            document.getElementById('ps18-c').style.color="red";
        }else{
            document.getElementById('ps18-c').style.color="black";
        }


        var data18a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg18a)+parseInt(datops18a)),      0-parseInt(datops18a), parseInt(datoae18)],
            ['',    0+(parseInt(datomg18b)+parseInt(datops18b)),      0-parseInt(datops18b), parseInt(datoae18)],
            ['',    0+(parseInt(datomg18c)+parseInt(datops18c)),      0-parseInt(datops18c), parseInt(datoae18)]
        ]);

        drawVisualization18a(data18a);

    }

    function drawVisualization18b(data18b) {

        // Create and draw the visualization.
        var ac18b = new google.visualization.AreaChart(document.getElementById('visualization18b'));
        ac18b.draw(data18b, {
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
        $('#visualization18b iframe').attr('allowTransparency', 'true');
        $('#visualization18b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar18b(){

        var datomg18ba=document.getElementById('mg18b-a').value;
        var datomg18bb=document.getElementById('mg18b-b').value;
        var datomg18bc=document.getElementById('mg18b-c').value;

        var datops18ba=document.getElementById('ps18b-a').value;
        var datops18bb=document.getElementById('ps18b-b').value;
        var datops18bc=document.getElementById('ps18b-c').value;

        if(datops18ba>3){
            document.getElementById('ps18b-a').style.color="red";
        }else{
            document.getElementById('ps18b-a').style.color="black";
        }
        if(datops18bb>3){
            document.getElementById('ps18b-b').style.color="red";
        }else{
            document.getElementById('ps18b-b').style.color="black";
        }
        if(datops18bc>3){
            document.getElementById('ps18b-c').style.color="red";
        }else{
            document.getElementById('ps18b-c').style.color="black";
        }

        var data18b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg18ba)+parseInt(datops18ba)),      0+parseInt(datops18ba)],
            ['',    0-(parseInt(datomg18bb)+parseInt(datops18bb)),      0+parseInt(datops18bb)],
            ['',    0-(parseInt(datomg18bc)+parseInt(datops18bc)),      0+parseInt(datops18bc)]
        ]);

        drawVisualization18b(data18b);

    }

    arrstyle = ["i18","f18","f18b-a","f18b-b","s18-a","s18-b","s18-c","p18-a","p18-b","p18-c","s18b-a","s18b-b","s18b-c","p18b-a","p18b-b","p18b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae18').change(function() {
        if(parseInt(document.getElementById('ae18').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar18a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s18-a').toggle(
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
    $('#s18-b').toggle(
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
    $('#s18-c').toggle(
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

    $('#s18b-a').toggle(
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
    $('#s18b-b').toggle(
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
    $('#s18b-c').toggle(
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
    $('#su18-a').toggle(
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
    $('#su18-b').toggle(
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
    $('#su18-c').toggle(
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

    $('#su18b-a').toggle(
        function () {
            $(this).css({"background":"#f3e818"});
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
    $('#su18b-b').toggle(
        function () {
            $(this).css({"background":"#f3e818"});
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
    $('#su18b-c').toggle(
        function () {
            $(this).css({"background":"#f3e818"});
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
    $('#p18-a').toggle(
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
    $('#p18-b').toggle(
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
    $('#p18-c').toggle(
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
    $('#p18b-a').toggle(
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
    $('#p18b-b').toggle(
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
    $('#p18b-c').toggle(
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
	$('#d18').toggle(
        function () {
            $('#diente18-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau18.png') }}')");
            $('#diente18-a').css("background-position","0px -2px");
            $('#diente18-a').css("background-repeat","no-repeat");
            $('#m18').prop('disabled', true); // Deshabilita el input con id 'm18'
            $('#i18').prop("disabled",true);
            $('#f18').prop("disabled",true);
            $('#s18-a').prop("disabled",true);
            $('#s18-b').prop("disabled",true);
            $('#s18-c').prop("disabled",true);
            $('#p18-a').prop("disabled",true);
            $('#p18-b').prop("disabled",true);
            $('#p18-c').prop("disabled",true);
            $('#mg18-a').prop("disabled",true);
            $('#mg18-b').prop("disabled",true);
            $('#mg18-c').prop("disabled",true);
            $('#ps18-a').prop("disabled",true);
            $('#ps18-b').prop("disabled",true);
            $('#ps18-c').prop("disabled",true);
            /*$('#furca18').css("background","none");*/
            $('#mg18-a').val('0');
            $('#mg18-b').val('0');
            $('#mg18-c').val('0');
            $('#ps18-a').val('0');
            $('#ps18-b').val('0');
            $('#ps18-c').val('0');

            $('#diente18b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-18b.png') }}')");
            $('#diente18b-a').css("background-position","0 23px");
            $('#diente18b-a').css("background-repeat","no-repeat");
            $('#m18b').prop("disabled",true);
            $('#i18b').prop("disabled",true);
            $('#f18b-a').prop("disabled",true);
            $('#f18b-b').prop("disabled",true);
            $('#s18b-a').prop("disabled",true);
            $('#s18b-b').prop("disabled",true);
            $('#s18b-c').prop("disabled",true);
            $('#p18b-a').prop("disabled",true);
            $('#p18b-b').prop("disabled",true);
            $('#p18b-c').prop("disabled",true);
            $('#mg18b-a').prop("disabled",true);
            $('#mg18b-b').prop("disabled",true);
            $('#mg18b-c').prop("disabled",true);
            $('#ps18b-a').prop("disabled",true);
            $('#ps18b-b').prop("disabled",true);
            $('#ps18b-c').prop("disabled",true);
            $('#mg18b-a').val('0');
            $('#mg18b-b').val('0');
            $('#mg18b-c').val('0');
            $('#ps18b-a').val('0');
            $('#ps18b-b').val('0');
            $('#ps18b-c').val('0');

            $('#furca18').prop("disabled",true);
            $('#furca18-a').prop("disabled",true);
            $('#furca18-b').prop("disabled",true);
            $('#ae18').prop("disabled",true);
            $('#pi18').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar18a();
            cargar18b();

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
            $('#diente18-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-18.png') }}')");
            $('#diente18-a').css("background-position","0 -2px");
            $('#diente18-a').css("background-repeat","no-repeat");
            $('#m18').prop("disabled",false);
            $('#i18').prop("disabled",false);
            $('#f18').prop("disabled",false);
            $('#s18-a').prop("disabled",false);
            $('#s18-b').prop("disabled",false);
            $('#s18-c').prop("disabled",false);
            $('#p18-a').prop("disabled",false);
            $('#p18-b').prop("disabled",false);
            $('#p18-c').prop("disabled",false);
            $('#mg18-a').prop("disabled",false);
            $('#mg18-b').prop("disabled",false);
            $('#mg18-c').prop("disabled",false);
            $('#ps18-a').prop("disabled",false);
            $('#ps18-b').prop("disabled",false);
            $('#ps18-c').prop("disabled",false);

            $('#diente18b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-18b.png') }}')");
            $('#diente18b-a').css("background-position","0 23px");
            $('#diente18b-a').css("background-repeat","no-repeat");
            $('#m18b').prop("disabled",false);
            $('#i18b').prop("disabled",false);
            $('#f18b-a').prop("disabled",false);
            $('#f18b-b').prop("disabled",false);
            $('#s18b-a').prop("disabled",false);
            $('#s18b-b').prop("disabled",false);
            $('#s18b-c').prop("disabled",false);
            $('#p18b-a').prop("disabled",false);
            $('#p18b-b').prop("disabled",false);
            $('#p18b-c').prop("disabled",false);
            $('#mg18b-a').prop("disabled",false);
            $('#mg18b-b').prop("disabled",false);
            $('#mg18b-c').prop("disabled",false);
            $('#ps18b-a').prop("disabled",false);
            $('#ps18b-b').prop("disabled",false);
            $('#ps18b-c').prop("disabled",false);

            $('#furca18').css("display","block");
            $('#furca18-a').css("display","block");
            $('#furca18-b').css("display","block");
            $('#ae18').prop("disabled",false);
            $('#pi18').prop("disabled",false);

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
	$('#i18').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f18').css({"background":"#FFFFFF"});
            $('#diente18-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl18.png') }}')");
            $('#diente18-a').css("background-position","1px -2px");
            $('#diente18-a').css("background-repeat","no-repeat");

            $('#diente18b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-18b.png') }}')");
            $('#diente18b-a').css("background-position","0 23px");
            $('#diente18b-a').css("background-repeat","no-repeat");

            $('#furca18').css("background","none");
            $('#furca18-a').css("background","none");
            $('#furca18-b').css("background","none");
            $('#f18').css("background","none");
            $('#f18b-a').css("background","none");
            $('#f18b-b').css("background","none");

            $("#f18").attr("id","f18desact");
            $("#f18b-a").attr("id","f18b-adesact");
            $("#f18b-b").attr("id","f18b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente18-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-18.png') }}')");
            $('#diente18-a').css("background-position","0 -2px");
            $('#diente18-a').css("background-repeat","no-repeat");

            $('#diente18b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-18b.png') }}')");
            $('#diente18b-a').css("background-position","0 23px");
            $('#diente18b-a').css("background-repeat","no-repeat");

            $('#f18').css("background","#FFFFFF");
            $('#f18b-a').css("background","#FFFFFF");
            $('#f18b-b').css("background","#FFFFFF");

            $("#f18desact").attr("id","f18");
            $("#f18b-adesact").attr("id","f18b-a");
            $("#f18b-bdesact").attr("id","f18b-b");
            $('#d18').trigger('click');
        }
	);

    //FURCA
	$('#f18').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i18').css({"background":"#FFFFFF"});
			$('#furca18').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca18').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca18').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca18').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f18b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca18-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca18-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca18-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca18-a').css("background","none");
        }
    );
    $('#f18b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca18-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca18-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca18-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca18-b').css("background","none");
        }
    );


</script>



