
    {{--  </head>  --}}
    <style>
        #i21{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente21-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla2/periodontograma-dientes-arriba-21.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }


        #i21b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente21b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla4/periodontograma-dientes-abajo-21b.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }
        #d21,#i21,#i21b,#f21,,#ae21-a,#ae21-b:hover{
            background: #E6E6E6;
        }
        #i21-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f21{
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
        #pi21{
            width: 100%;
        }


        .f21,{
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
            $pieza21 = $piezas_periodonto->firstWhere('pieza', '21');
            $cuerpo21 = $pieza21 ? $pieza21->cuerpo : [];
            $pronostico21 = $cuerpo21['pronostico'] ?? '';
        @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl21.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau21.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-21b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-21b.png') }}"/>
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
                                Pieza 2.1
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

                                                <div id="visualization21a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente21-a"></div>
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
                                                <div class="py-2 border input-dental rounded" id="i21">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m21" name="m21" value="{{ $cuerpo21["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m21');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi21" id="pi21">
                                                    <option value="" {{ $pronostico21 == '' ? 'selected' : '' }}></option>
                                                    <option value="B" {{ $pronostico21 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico21 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico21 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico21 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s21-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s21-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s21-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su21-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su21-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su21-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p21-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p21-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p21-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae21" name="ae21" value="{{ $cuerpo21["plataforma"] ?? 0 }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg21-a" name="mg21-a" value="{{ $cuerpo21["vest_altura_mg_a"] ?? 0 }}" onchange="cargar21a();getDefectos();rangoNumeroMargen('mg21-a');cargar21a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg21-b" name="mg21-b" value="{{ $cuerpo21["vest_altura_mg_b"] ?? 0 }}" onchange="cargar21a();getDefectos();rangoNumeroMargen('mg21-b');cargar21a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg21-c" name="mg21-c" value="{{ $cuerpo21["vest_altura_mg_c"] ?? 0 }}" onchange="cargar21a();getDefectos();rangoNumeroMargen('mg21-c');cargar21a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps21-a" name="ps21-a" value="{{ $cuerpo21["vest_psondaje_a"] ?? 0 }}" onchange="cargar21a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps21-b" name="ps21-b" value="{{ $cuerpo21["vest_psondaje_b"] ?? 0 }}" onchange="cargar21a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps21-c" name="ps21-c" value="{{ $cuerpo21["vest_psondaje_c"] ?? 0 }}" onchange="cargar21a();getDefectos();" tabindex="99"/>
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
                                                        <div id="visualization21b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente21b-a">
                                                            <div id="furca21-a"></div>
                                                            <div id="furca21-b"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                               <!-- <tr>
                                                    <td class="titulo">P. sondaje</td>
                                                    <td class="borde">
                                                        <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps21b-a" name="ps21b-a" value="0" onchange="cargar21b();getDefectos();" tabindex="145"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps21b-b" name="ps21b-b" value="0" onchange="cargar21b();getDefectos();" tabindex="146"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps21b-c" name="ps21b-c" value="0" onchange="cargar21b();getDefectos();" tabindex="147"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Altura MG</td>
                                                    <td class="borde">
                                                        <div class="row">
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg21b-a" name="mg21b-a" value="0" onchange="cargar21b();getDefectos();rangoNumeroMargen('mg21b-a');cargar21b();" tabindex="193"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  type="number" id="mg21b-b" name="mg21b-b" value="0" onchange="cargar21b();getDefectos();rangoNumeroMargen('mg21b-b');cargar21b();" tabindex="194"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg21b-c" name="mg21b-c" value="0" onchange="cargar21b();getDefectos();rangoNumeroMargen('mg21b-c');cargar21b();" tabindex="195"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Sangrado </td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="s21b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="s21b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="s21b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Supuraci&oacute;n</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="su21b-a"></div>
                                                        <div style="width: 30%;height: 20px;"id="su21b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="su21b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Higiene</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="p21b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="p21b-b"></div>
                                                        <div style="width: 30%;height: 20px;" id="p21b-c"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Furca</td>
                                                    <td class="borde"style="text-align:center">
                                                        <div style="width: 20%;height: 25px;margin-left: 7px" id="f21b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f21b-b">F-2</div>

                                                    </td>
                                                </tr>-->

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
                                        <input class="form-control form-control-xs" type="number" id="ps21b-a" name="ps21b-a" value="{{ $cuerpo21["pala_psondaje_a"] ?? 0 }}" onchange="cargar21b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps21b-b" name="ps21b-b" value="{{ $cuerpo21["pala_psondaje_b"] ?? 0 }}" onchange="cargar21b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps21b-c" name="ps21b-c" value="{{ $cuerpo21["pala_psondaje_c"] ?? 0 }}" onchange="cargar21b();getDefectos();" tabindex="147"//>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg21b-a" name="mg21b-a" value="{{ $cuerpo21["pala_altura_mg_a"] ?? 0 }}" onchange="cargar21b();getDefectos();rangoNumeroMargen('mg21b-a');cargar21b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg21b-b" name="mg21b-b" value="{{ $cuerpo21["pala_altura_mg_b"] ?? 0 }}" onchange="cargar21b();getDefectos();rangoNumeroMargen('mg21b-b');cargar21b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg21b-c" name="mg21b-c" value="{{ $cuerpo21["pala_altura_mg_c"] ?? 0 }}" onchange="cargar21b();getDefectos();rangoNumeroMargen('mg21b-c');cargar21b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s21b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s21b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s21b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su21b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su21b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su21b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p21b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p21b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p21b-c"></div>
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
                <div class="form-group" id="obs_pieza2.1">
                    <label class="floating-label-activo-sm">Obs. Pieza 2.1</label>
                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 2.1" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_21" id="obs_21" placeholder="Describa observaciones">{{ $cuerpo21["observaciones"] ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza2.1">
                <button type="button" onclick="guardar_pieza('21')" class="btn btn-info text-center"><i class="feather icon-save"></i>  Guardar evaluación 2.1</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar21a();
        cargar21b();

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

    function drawVisualization21a(data21a) {
        // Create and draw the visualization.
        var ac21a = new google.visualization.AreaChart(document.getElementById('visualization21a'));
        ac21a.draw(data21a, {
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

        $('#visualization21a iframe').attr('allowTransparency', 'true');
        $('#visualization21a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar21a(){

        var datoae21=document.getElementById('ae21').value;

        var datomg21a=document.getElementById('mg21-a').value;
        var datomg21b=document.getElementById('mg21-b').value;
        var datomg21c=document.getElementById('mg21-c').value;

        var datops21a=document.getElementById('ps21-a').value;
        var datops21b=document.getElementById('ps21-b').value;
        var datops21c=document.getElementById('ps21-c').value;

        //alert(document.getElementById('ps21-a').value);

        if(datops21a>3){
            document.getElementById('ps21-a').style.color="red";
        }else{
            document.getElementById('ps21-a').style.color="black";
        }
        if(datops21b>3){
            document.getElementById('ps21-b').style.color="red";
        }else{
            document.getElementById('ps21-b').style.color="black";
        }
        if(datops21c>3){
            document.getElementById('ps21-c').style.color="red";
        }else{
            document.getElementById('ps21-c').style.color="black";
        }


        var data21a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg21a)+parseInt(datops21a)),      0-parseInt(datops21a), parseInt(datoae21)],
            ['',    0+(parseInt(datomg21b)+parseInt(datops21b)),      0-parseInt(datops21b), parseInt(datoae21)],
            ['',    0+(parseInt(datomg21c)+parseInt(datops21c)),      0-parseInt(datops21c), parseInt(datoae21)]
        ]);

        drawVisualization21a(data21a);

    }

    function drawVisualization21b(data21b) {

        // Create and draw the visualization.
        var ac21b = new google.visualization.AreaChart(document.getElementById('visualization21b'));
        ac21b.draw(data21b, {
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
        $('#visualization21b iframe').attr('allowTransparency', 'true');
        $('#visualization21b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar21b(){

        var datomg21ba=document.getElementById('mg21b-a').value;
        var datomg21bb=document.getElementById('mg21b-b').value;
        var datomg21bc=document.getElementById('mg21b-c').value;

        var datops21ba=document.getElementById('ps21b-a').value;
        var datops21bb=document.getElementById('ps21b-b').value;
        var datops21bc=document.getElementById('ps21b-c').value;

        if(datops21ba>3){
            document.getElementById('ps21b-a').style.color="red";
        }else{
            document.getElementById('ps21b-a').style.color="black";
        }
        if(datops21bb>3){
            document.getElementById('ps21b-b').style.color="red";
        }else{
            document.getElementById('ps21b-b').style.color="black";
        }
        if(datops21bc>3){
            document.getElementById('ps21b-c').style.color="red";
        }else{
            document.getElementById('ps21b-c').style.color="black";
        }

        var data21b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg21ba)+parseInt(datops21ba)),      0+parseInt(datops21ba)],
            ['',    0-(parseInt(datomg21bb)+parseInt(datops21bb)),      0+parseInt(datops21bb)],
            ['',    0-(parseInt(datomg21bc)+parseInt(datops21bc)),      0+parseInt(datops21bc)]
        ]);

        drawVisualization21b(data21b);

    }

    arrstyle = ["i21","f21","f21b-a","f21b-b","s21-a","s21-b","s21-c","p21-a","p21-b","p21-c","s21b-a","s21b-b","s21b-c","p21b-a","p21b-b","p21b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae21').change(function() {
        if(parseInt(document.getElementById('ae21').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar21a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s21-a').toggle(
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
    $('#s21-b').toggle(
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
    $('#s21-c').toggle(
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

    $('#s21b-a').toggle(
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
    $('#s21b-b').toggle(
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
    $('#s21b-c').toggle(
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
    $('#su21-a').toggle(
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
    $('#su21-b').toggle(
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
    $('#su21-c').toggle(
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

    $('#su21b-a').toggle(
        function () {
            $(this).css({"background":"#f3e821"});
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
    $('#su21b-b').toggle(
        function () {
            $(this).css({"background":"#f3e821"});
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
    $('#su21b-c').toggle(
        function () {
            $(this).css({"background":"#f3e821"});
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
    $('#p21-a').toggle(
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
    $('#p21-b').toggle(
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
    $('#p21-c').toggle(
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
    $('#p21b-a').toggle(
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
    $('#p21b-b').toggle(
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
    $('#p21b-c').toggle(
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
	$('#d21').toggle(
        function () {
            $('#diente21-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau21.png') }}')");
            $('#diente21-a').css("background-position","-36px -13px");
            $('#diente21-a').css("background-repeat","no-repeat");
            $('#m21').prop('disabled', true); // Deshabilita el input con id 'm21'
            $('#i21').prop("disabled",true);
            $('#f21').prop("disabled",true);
            $('#s21-a').prop("disabled",true);
            $('#s21-b').prop("disabled",true);
            $('#s21-c').prop("disabled",true);
            $('#p21-a').prop("disabled",true);
            $('#p21-b').prop("disabled",true);
            $('#p21-c').prop("disabled",true);
            $('#mg21-a').prop("disabled",true);
            $('#mg21-b').prop("disabled",true);
            $('#mg21-c').prop("disabled",true);
            $('#ps21-a').prop("disabled",true);
            $('#ps21-b').prop("disabled",true);
            $('#ps21-c').prop("disabled",true);
            /*$('#furca21').css("background","none");*/
            $('#mg21-a').val('0');
            $('#mg21-b').val('0');
            $('#mg21-c').val('0');
            $('#ps21-a').val('0');
            $('#ps21-b').val('0');
            $('#ps21-c').val('0');

            $('#diente21b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-21b.png') }}')");
            $('#diente21b-a').css("background-position","0 23px");
            $('#diente21b-a').css("background-repeat","no-repeat");
            $('#m21b').prop("disabled",true);
            $('#i21b').prop("disabled",true);
            $('#f21b-a').prop("disabled",true);
            $('#f21b-b').prop("disabled",true);
            $('#s21b-a').prop("disabled",true);
            $('#s21b-b').prop("disabled",true);
            $('#s21b-c').prop("disabled",true);
            $('#p21b-a').prop("disabled",true);
            $('#p21b-b').prop("disabled",true);
            $('#p21b-c').prop("disabled",true);
            $('#mg21b-a').prop("disabled",true);
            $('#mg21b-b').prop("disabled",true);
            $('#mg21b-c').prop("disabled",true);
            $('#ps21b-a').prop("disabled",true);
            $('#ps21b-b').prop("disabled",true);
            $('#ps21b-c').prop("disabled",true);
            $('#mg21b-a').val('0');
            $('#mg21b-b').val('0');
            $('#mg21b-c').val('0');
            $('#ps21b-a').val('0');
            $('#ps21b-b').val('0');
            $('#ps21b-c').val('0');

            $('#furca21').prop("disabled",true);
            $('#furca21-a').prop("disabled",true);
            $('#furca21-b').prop("disabled",true);
            $('#ae21').prop("disabled",true);
            $('#pi21').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar21a();
            cargar21b();

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar21a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getSupuracion();
            getPlaca();

        },
        function () {
            $('#diente21-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-21.png') }}')");
            $('#diente21-a').css("background-position","0 -2px");
            $('#diente21-a').css("background-repeat","no-repeat");
            $('#m21').prop("disabled",false);
            $('#i21').prop("disabled",false);
            $('#f21').prop("disabled",false);
            $('#s21-a').prop("disabled",false);
            $('#s21-b').prop("disabled",false);
            $('#s21-c').prop("disabled",false);
            $('#p21-a').prop("disabled",false);
            $('#p21-b').prop("disabled",false);
            $('#p21-c').prop("disabled",false);
            $('#mg21-a').prop("disabled",false);
            $('#mg21-b').prop("disabled",false);
            $('#mg21-c').prop("disabled",false);
            $('#ps21-a').prop("disabled",false);
            $('#ps21-b').prop("disabled",false);
            $('#ps21-c').prop("disabled",false);

            $('#diente21b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-21b.png') }}')");
            $('#diente21b-a').css("background-position","0 23px");
            $('#diente21b-a').css("background-repeat","no-repeat");
            $('#m21b').prop("disabled",false);
            $('#i21b').prop("disabled",false);
            $('#f21b-a').prop("disabled",false);
            $('#f21b-b').prop("disabled",false);
            $('#s21b-a').prop("disabled",false);
            $('#s21b-b').prop("disabled",false);
            $('#s21b-c').prop("disabled",false);
            $('#p21b-a').prop("disabled",false);
            $('#p21b-b').prop("disabled",false);
            $('#p21b-c').prop("disabled",false);
            $('#mg21b-a').prop("disabled",false);
            $('#mg21b-b').prop("disabled",false);
            $('#mg21b-c').prop("disabled",false);
            $('#ps21b-a').prop("disabled",false);
            $('#ps21b-b').prop("disabled",false);
            $('#ps21b-c').prop("disabled",false);

            $('#furca21').css("display","block");
            $('#furca21-a').css("display","block");
            $('#furca21-b').css("display","block");
            $('#ae21').prop("disabled",false);
            $('#pi21').prop("disabled",false);

            totalDientes++;

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar21a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getPlaca();
        }
    );

    //IMPLANTES
	$('#i21').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f21').css({"background":"#FFFFFF"});
            $('#diente21-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl21.png') }}')");
            $('#diente21-a').css("background-position","-38px -2px");
            $('#diente21-a').css("background-repeat","no-repeat");

            $('#diente21b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-21b.png') }}')");
            $('#diente21b-a').css("background-position","0 23px");
            $('#diente21b-a').css("background-repeat","no-repeat");

            $('#furca21').css("background","none");
            $('#furca21-a').css("background","none");
            $('#furca21-b').css("background","none");
            $('#f21').css("background","none");
            $('#f21b-a').css("background","none");
            $('#f21b-b').css("background","none");

            $("#f21").attr("id","f21desact");
            $("#f21b-a").attr("id","f21b-adesact");
            $("#f21b-b").attr("id","f21b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente21-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-21.png') }}')");
            $('#diente21-a').css("background-position","0 -2px");
            $('#diente21-a').css("background-repeat","no-repeat");

            $('#diente21b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-21b.png') }}')");
            $('#diente21b-a').css("background-position","0 23px");
            $('#diente21b-a').css("background-repeat","no-repeat");

            $('#f21').css("background","#FFFFFF");
            $('#f21b-a').css("background","#FFFFFF");
            $('#f21b-b').css("background","#FFFFFF");

            $("#f21desact").attr("id","f21");
            $("#f21b-adesact").attr("id","f21b-a");
            $("#f21b-bdesact").attr("id","f21b-b");
            $('#d21').trigger('click');
        }
	);

    //FURCA
	$('#f21').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i21').css({"background":"#FFFFFF"});
			$('#furca21').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca21').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca21').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca21').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f21b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca21-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca21-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca21-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca21-a').css("background","none");
        }
    );
    $('#f21b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca21-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca21-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca21-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca21-b').css("background","none");
        }
    );




</script>
