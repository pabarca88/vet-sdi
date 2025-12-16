
    {{--  </head>  --}}
    <style>
        #i24{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente24-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla2/periodontograma-dientes-arriba-24.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }


        #i24b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente24b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla4/periodontograma-dientes-abajo-24b.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }
        #d24,#i24,#i24b,#f24,,#ae24-a,#ae24-b:hover{
            background: #E6E6E6;
        }
        #i24-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f24{
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
        #pi24{
            width: 100%;
        }


        .f24,{
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
        $pieza24 = $piezas_periodonto->firstWhere('pieza', '24');
        $cuerpo24 = $pieza24 ? $pieza24->cuerpo : [];
        $pronostico24 = $cuerpo24['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl24.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau24.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-24b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-24b.png') }}"/>
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
                                Pieza 2.4
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

                                                <div id="visualization24a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente24-a"></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d24">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i24">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m24" name="m24" value="{{ $cuerpo24["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m24');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi24" id="pi24">
                                                     <option value="" {{ $pronostico24 == '' ? 'selected' : '' }}></option>
                                                    <option value="B" {{ $pronostico24 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico24 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico24 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico24 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s24-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s24-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s24-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su24-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su24-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su24-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p24-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p24-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p24-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae24" name="ae24" value="{{ $cuerpo24["plataforma"] ?? 0 }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg24-a" name="mg24-a" value="{{ $cuerpo24["vest_altura_mg_a"] ?? 0 }}" onchange="cargar24a();getDefectos();rangoNumeroMargen('mg24-a');cargar24a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg24-b" name="mg24-b" value="{{ $cuerpo24["vest_altura_mg_b"] ?? 0 }}" onchange="cargar24a();getDefectos();rangoNumeroMargen('mg24-b');cargar24a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg24-c" name="mg24-c" value="{{ $cuerpo24["vest_altura_mg_c"] ?? 0 }}" onchange="cargar24a();getDefectos();rangoNumeroMargen('mg24-c');cargar24a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps24-a" name="ps24-a" value="{{ $cuerpo24["vest_psondaje_a"] ?? 0 }}" onchange="cargar24a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps24-b" name="ps24-b" value="{{ $cuerpo24["vest_psondaje_b"] ?? 0 }}" onchange="cargar24a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps24-c" name="ps24-c" value="{{ $cuerpo24["vest_psondaje_c"] ?? 0 }}" onchange="cargar24a();getDefectos();" tabindex="99"/>
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
                                                        <div id="visualization24b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente24b-a">
                                                            <div id="furca24-a"></div>
                                                            <div id="furca24-b"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                               <!-- <tr>
                                                    <td class="titulo">P. sondaje</td>
                                                    <td class="borde">
                                                        <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps24b-a" name="ps24b-a" value="0" onchange="cargar24b();getDefectos();" tabindex="145"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps24b-b" name="ps24b-b" value="0" onchange="cargar24b();getDefectos();" tabindex="146"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps24b-c" name="ps24b-c" value="0" onchange="cargar24b();getDefectos();" tabindex="147"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Altura MG</td>
                                                    <td class="borde">
                                                        <div class="row">
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg24b-a" name="mg24b-a" value="0" onchange="cargar24b();getDefectos();rangoNumeroMargen('mg24b-a');cargar24b();" tabindex="193"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  type="number" id="mg24b-b" name="mg24b-b" value="0" onchange="cargar24b();getDefectos();rangoNumeroMargen('mg24b-b');cargar24b();" tabindex="194"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg24b-c" name="mg24b-c" value="0" onchange="cargar24b();getDefectos();rangoNumeroMargen('mg24b-c');cargar24b();" tabindex="195"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Sangrado </td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="s24b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="s24b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="s24b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Supuraci&oacute;n</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="su24b-a"></div>
                                                        <div style="width: 30%;height: 20px;"id="su24b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="su24b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Higiene</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="p24b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="p24b-b"></div>
                                                        <div style="width: 30%;height: 20px;" id="p24b-c"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Furca</td>
                                                    <td class="borde"style="text-align:center">
                                                        <div style="width: 20%;height: 25px;margin-left: 7px" id="f24b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f24b-b">F-2</div>

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
                                        <input class="form-control form-control-xs" type="number" id="ps24b-a" name="ps24b-a" value="{{ $cuerpo24["pala_psondaje_a"] ?? 0 }}" onchange="cargar24b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps24b-b" name="ps24b-b" value="{{ $cuerpo24["pala_psondaje_b"] ?? 0 }}" onchange="cargar24b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps24b-c" name="ps24b-c" value="{{ $cuerpo24["pala_psondaje_c"] ?? 0 }}" onchange="cargar24b();getDefectos();" tabindex="147"//>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg24b-a" name="mg24b-a" value="{{ $cuerpo24["pala_altura_mg_a"] ?? 0 }}" onchange="cargar24b();getDefectos();rangoNumeroMargen('mg24b-a');cargar24b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg24b-b" name="mg24b-b" value="{{ $cuerpo24["pala_altura_mg_b"] ?? 0 }}" onchange="cargar24b();getDefectos();rangoNumeroMargen('mg24b-b');cargar24b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg24b-c" name="mg24b-c" value="{{ $cuerpo24["pala_altura_mg_c"] ?? 0 }}" onchange="cargar24b();getDefectos();rangoNumeroMargen('mg24b-c');cargar24b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s24b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s24b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s24b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su24b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su24b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su24b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p24b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p24b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p24b-c"></div>
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
                <div class="form-group" id="obs_pieza2.4">
                    <label class="floating-label-activo-sm">Obs. Pieza 2.4</label>
                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 2.4" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_24" id="obs_24" placeholder="Describa observaciones">{{ $cuerpo24["observaciones"] ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza2.4">
                <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('24')"><i class="feather icon-save"></i>  Guardar evaluación 2.4</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar24a();
        cargar24b();

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

    function drawVisualization24a(data24a) {
        // Create and draw the visualization.
        var ac24a = new google.visualization.AreaChart(document.getElementById('visualization24a'));
        ac24a.draw(data24a, {
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

        $('#visualization24a iframe').attr('allowTransparency', 'true');
        $('#visualization24a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar24a(){

        var datoae24=document.getElementById('ae24').value;

        var datomg24a=document.getElementById('mg24-a').value;
        var datomg24b=document.getElementById('mg24-b').value;
        var datomg24c=document.getElementById('mg24-c').value;

        var datops24a=document.getElementById('ps24-a').value;
        var datops24b=document.getElementById('ps24-b').value;
        var datops24c=document.getElementById('ps24-c').value;

        //alert(document.getElementById('ps24-a').value);

        if(datops24a>3){
            document.getElementById('ps24-a').style.color="red";
        }else{
            document.getElementById('ps24-a').style.color="black";
        }
        if(datops24b>3){
            document.getElementById('ps24-b').style.color="red";
        }else{
            document.getElementById('ps24-b').style.color="black";
        }
        if(datops24c>3){
            document.getElementById('ps24-c').style.color="red";
        }else{
            document.getElementById('ps24-c').style.color="black";
        }


        var data24a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg24a)+parseInt(datops24a)),      0-parseInt(datops24a), parseInt(datoae24)],
            ['',    0+(parseInt(datomg24b)+parseInt(datops24b)),      0-parseInt(datops24b), parseInt(datoae24)],
            ['',    0+(parseInt(datomg24c)+parseInt(datops24c)),      0-parseInt(datops24c), parseInt(datoae24)]
        ]);

        drawVisualization24a(data24a);

    }

    function drawVisualization24b(data24b) {

        // Create and draw the visualization.
        var ac24b = new google.visualization.AreaChart(document.getElementById('visualization24b'));
        ac24b.draw(data24b, {
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
        $('#visualization24b iframe').attr('allowTransparency', 'true');
        $('#visualization24b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar24b(){

        var datomg24ba=document.getElementById('mg24b-a').value;
        var datomg24bb=document.getElementById('mg24b-b').value;
        var datomg24bc=document.getElementById('mg24b-c').value;

        var datops24ba=document.getElementById('ps24b-a').value;
        var datops24bb=document.getElementById('ps24b-b').value;
        var datops24bc=document.getElementById('ps24b-c').value;

        if(datops24ba>3){
            document.getElementById('ps24b-a').style.color="red";
        }else{
            document.getElementById('ps24b-a').style.color="black";
        }
        if(datops24bb>3){
            document.getElementById('ps24b-b').style.color="red";
        }else{
            document.getElementById('ps24b-b').style.color="black";
        }
        if(datops24bc>3){
            document.getElementById('ps24b-c').style.color="red";
        }else{
            document.getElementById('ps24b-c').style.color="black";
        }

        var data24b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg24ba)+parseInt(datops24ba)),      0+parseInt(datops24ba)],
            ['',    0-(parseInt(datomg24bb)+parseInt(datops24bb)),      0+parseInt(datops24bb)],
            ['',    0-(parseInt(datomg24bc)+parseInt(datops24bc)),      0+parseInt(datops24bc)]
        ]);

        drawVisualization24b(data24b);

    }

    arrstyle = ["i24","f24","f24b-a","f24b-b","s24-a","s24-b","s24-c","p24-a","p24-b","p24-c","s24b-a","s24b-b","s24b-c","p24b-a","p24b-b","p24b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae24').change(function() {
        if(parseInt(document.getElementById('ae24').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar24a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s24-a').toggle(
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
    $('#s24-b').toggle(
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
    $('#s24-c').toggle(
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

    $('#s24b-a').toggle(
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
    $('#s24b-b').toggle(
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
    $('#s24b-c').toggle(
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
    $('#su24-a').toggle(
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
    $('#su24-b').toggle(
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
    $('#su24-c').toggle(
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

    $('#su24b-a').toggle(
        function () {
            $(this).css({"background":"#f3e824"});
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
    $('#su24b-b').toggle(
        function () {
            $(this).css({"background":"#f3e824"});
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
    $('#su24b-c').toggle(
        function () {
            $(this).css({"background":"#f3e824"});
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
    $('#p24-a').toggle(
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
    $('#p24-b').toggle(
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
    $('#p24-c').toggle(
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
    $('#p24b-a').toggle(
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
    $('#p24b-b').toggle(
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
    $('#p24b-c').toggle(
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
	$('#d24').toggle(
        function () {
            $('#diente24-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau24.png') }}')");
            $('#diente24-a').css("background-position","-36px -13px");
            $('#diente24-a').css("background-repeat","no-repeat");
            $('#m24').prop('disabled', true); // Deshabilita el input con id 'm24'
            $('#i24').prop("disabled",true);
            $('#f24').prop("disabled",true);
            $('#s24-a').prop("disabled",true);
            $('#s24-b').prop("disabled",true);
            $('#s24-c').prop("disabled",true);
            $('#p24-a').prop("disabled",true);
            $('#p24-b').prop("disabled",true);
            $('#p24-c').prop("disabled",true);
            $('#mg24-a').prop("disabled",true);
            $('#mg24-b').prop("disabled",true);
            $('#mg24-c').prop("disabled",true);
            $('#ps24-a').prop("disabled",true);
            $('#ps24-b').prop("disabled",true);
            $('#ps24-c').prop("disabled",true);
            /*$('#furca24').css("background","none");*/
            $('#mg24-a').val('0');
            $('#mg24-b').val('0');
            $('#mg24-c').val('0');
            $('#ps24-a').val('0');
            $('#ps24-b').val('0');
            $('#ps24-c').val('0');

            $('#diente24b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-24b.png') }}')");
            $('#diente24b-a').css("background-position","0 23px");
            $('#diente24b-a').css("background-repeat","no-repeat");
            $('#m24b').prop("disabled",true);
            $('#i24b').prop("disabled",true);
            $('#f24b-a').prop("disabled",true);
            $('#f24b-b').prop("disabled",true);
            $('#s24b-a').prop("disabled",true);
            $('#s24b-b').prop("disabled",true);
            $('#s24b-c').prop("disabled",true);
            $('#p24b-a').prop("disabled",true);
            $('#p24b-b').prop("disabled",true);
            $('#p24b-c').prop("disabled",true);
            $('#mg24b-a').prop("disabled",true);
            $('#mg24b-b').prop("disabled",true);
            $('#mg24b-c').prop("disabled",true);
            $('#ps24b-a').prop("disabled",true);
            $('#ps24b-b').prop("disabled",true);
            $('#ps24b-c').prop("disabled",true);
            $('#mg24b-a').val('0');
            $('#mg24b-b').val('0');
            $('#mg24b-c').val('0');
            $('#ps24b-a').val('0');
            $('#ps24b-b').val('0');
            $('#ps24b-c').val('0');

            $('#furca24').prop("disabled",true);
            $('#furca24-a').prop("disabled",true);
            $('#furca24-b').prop("disabled",true);
            $('#ae24').prop("disabled",true);
            $('#pi24').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar24a();
            cargar24b();

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar24a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getSupuracion();
            getPlaca();

        },
        function () {
            $('#diente24-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-24.png') }}')");
            $('#diente24-a').css("background-position","0 -2px");
            $('#diente24-a').css("background-repeat","no-repeat");
            $('#m24').prop("disabled",false);
            $('#i24').prop("disabled",false);
            $('#f24').prop("disabled",false);
            $('#s24-a').prop("disabled",false);
            $('#s24-b').prop("disabled",false);
            $('#s24-c').prop("disabled",false);
            $('#p24-a').prop("disabled",false);
            $('#p24-b').prop("disabled",false);
            $('#p24-c').prop("disabled",false);
            $('#mg24-a').prop("disabled",false);
            $('#mg24-b').prop("disabled",false);
            $('#mg24-c').prop("disabled",false);
            $('#ps24-a').prop("disabled",false);
            $('#ps24-b').prop("disabled",false);
            $('#ps24-c').prop("disabled",false);

            $('#diente24b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-24b.png') }}')");
            $('#diente24b-a').css("background-position","0 23px");
            $('#diente24b-a').css("background-repeat","no-repeat");
            $('#m24b').prop("disabled",false);
            $('#i24b').prop("disabled",false);
            $('#f24b-a').prop("disabled",false);
            $('#f24b-b').prop("disabled",false);
            $('#s24b-a').prop("disabled",false);
            $('#s24b-b').prop("disabled",false);
            $('#s24b-c').prop("disabled",false);
            $('#p24b-a').prop("disabled",false);
            $('#p24b-b').prop("disabled",false);
            $('#p24b-c').prop("disabled",false);
            $('#mg24b-a').prop("disabled",false);
            $('#mg24b-b').prop("disabled",false);
            $('#mg24b-c').prop("disabled",false);
            $('#ps24b-a').prop("disabled",false);
            $('#ps24b-b').prop("disabled",false);
            $('#ps24b-c').prop("disabled",false);

            $('#furca24').css("display","block");
            $('#furca24-a').css("display","block");
            $('#furca24-b').css("display","block");
            $('#ae24').prop("disabled",false);
            $('#pi24').prop("disabled",false);

            totalDientes++;

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar24a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getPlaca();
        }
    );

    //IMPLANTES
	$('#i24').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f24').css({"background":"#FFFFFF"});
            $('#diente24-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl24.png') }}')");
            $('#diente24-a').css("background-position","-38px -2px");
            $('#diente24-a').css("background-repeat","no-repeat");

            $('#diente24b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-24b.png') }}')");
            $('#diente24b-a').css("background-position","0 23px");
            $('#diente24b-a').css("background-repeat","no-repeat");

            $('#furca24').css("background","none");
            $('#furca24-a').css("background","none");
            $('#furca24-b').css("background","none");
            $('#f24').css("background","none");
            $('#f24b-a').css("background","none");
            $('#f24b-b').css("background","none");

            $("#f24").attr("id","f24desact");
            $("#f24b-a").attr("id","f24b-adesact");
            $("#f24b-b").attr("id","f24b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente24-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-24.png') }}')");
            $('#diente24-a').css("background-position","0 -2px");
            $('#diente24-a').css("background-repeat","no-repeat");

            $('#diente24b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-24b.png') }}')");
            $('#diente24b-a').css("background-position","0 23px");
            $('#diente24b-a').css("background-repeat","no-repeat");

            $('#f24').css("background","#FFFFFF");
            $('#f24b-a').css("background","#FFFFFF");
            $('#f24b-b').css("background","#FFFFFF");

            $("#f24desact").attr("id","f24");
            $("#f24b-adesact").attr("id","f24b-a");
            $("#f24b-bdesact").attr("id","f24b-b");
            $('#d24').trigger('click');
        }
	);

    //FURCA
	$('#f24').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i24').css({"background":"#FFFFFF"});
			$('#furca24').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca24').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca24').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca24').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f24b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca24-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca24-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca24-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca24-a').css("background","none");
        }
    );
    $('#f24b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca24-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca24-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca24-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca24-b').css("background","none");
        }
    );




</script>
