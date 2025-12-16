    {{--  </head>  --}}
    <style>
        #i22{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente22-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla2/periodontograma-dientes-arriba-22.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }


        #i22b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente22b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla4/periodontograma-dientes-abajo-22b.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }
        #d22,#i22,#i22b,#f22,,#ae22-a,#ae22-b:hover{
            background: #E6E6E6;
        }
        #i22-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f22{
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
        #pi22{
            width: 100%;
        }


        .f22,{
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
        $pieza22 = $piezas_periodonto->firstWhere('pieza', '22');
        $cuerpo22 = $pieza22 ? $pieza22->cuerpo : [];
        $pronostico22 = $cuerpo22['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl22.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau22.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-22b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-22b.png') }}"/>
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
                                Pieza 2.2
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

                                                <div id="visualization22a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente22-a"></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d22">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i22">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m22" name="m22" value="{{ $cuerpo22["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m22');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi22" id="pi22">
                                                    <option value="" {{ $pronostico22 == '' ? 'selected' : '' }}></option>
                                                    <option value="B" {{ $pronostico22 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico22 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico22 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico22 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s22-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s22-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s22-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su22-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su22-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su22-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p22-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p22-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p22-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae22" name="ae22" value="{{ $cuerpo22["plataforma"] ?? 0 }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg22-a" name="mg22-a" value="{{ $cuerpo22["vest_altura_mg_a"] ?? 0 }}" onchange="cargar22a();getDefectos();rangoNumeroMargen('mg22-a');cargar22a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg22-b" name="mg22-b" value="{{ $cuerpo22["vest_altura_mg_b"] ?? 0 }}" onchange="cargar22a();getDefectos();rangoNumeroMargen('mg22-b');cargar22a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg22-c" name="mg22-c" value="{{ $cuerpo22["vest_altura_mg_c"] ?? 0 }}" onchange="cargar22a();getDefectos();rangoNumeroMargen('mg22-c');cargar22a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps22-a" name="ps22-a" value="{{ $cuerpo22["vest_psondaje_a"] ?? 0 }}" onchange="cargar22a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps22-b" name="ps22-b" value="{{ $cuerpo22["vest_psondaje_b"] ?? 0 }}" onchange="cargar22a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps22-c" name="ps22-c" value="{{ $cuerpo22["vest_psondaje_c"] ?? 0 }}" onchange="cargar22a();getDefectos();" tabindex="99"/>
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
                                                        <div id="visualization22b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente22b-a">
                                                            <div id="furca22-a"></div>
                                                            <div id="furca22-b"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                               <!-- <tr>
                                                    <td class="titulo">P. sondaje</td>
                                                    <td class="borde">
                                                        <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps22b-a" name="ps22b-a" value="0" onchange="cargar22b();getDefectos();" tabindex="145"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps22b-b" name="ps22b-b" value="0" onchange="cargar22b();getDefectos();" tabindex="146"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps22b-c" name="ps22b-c" value="0" onchange="cargar22b();getDefectos();" tabindex="147"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Altura MG</td>
                                                    <td class="borde">
                                                        <div class="row">
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg22b-a" name="mg22b-a" value="0" onchange="cargar22b();getDefectos();rangoNumeroMargen('mg22b-a');cargar22b();" tabindex="193"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  type="number" id="mg22b-b" name="mg22b-b" value="0" onchange="cargar22b();getDefectos();rangoNumeroMargen('mg22b-b');cargar22b();" tabindex="194"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg22b-c" name="mg22b-c" value="0" onchange="cargar22b();getDefectos();rangoNumeroMargen('mg22b-c');cargar22b();" tabindex="195"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Sangrado </td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="s22b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="s22b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="s22b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Supuraci&oacute;n</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="su22b-a"></div>
                                                        <div style="width: 30%;height: 20px;"id="su22b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="su22b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Higiene</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="p22b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="p22b-b"></div>
                                                        <div style="width: 30%;height: 20px;" id="p22b-c"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Furca</td>
                                                    <td class="borde"style="text-align:center">
                                                        <div style="width: 20%;height: 25px;margin-left: 7px" id="f22b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f22b-b">F-2</div>

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
                                        <input class="form-control form-control-xs" type="number" id="ps22b-a" name="ps22b-a" value="{{ $cuerpo22["pala_psondaje_a"] ?? 0 }}" onchange="cargar22b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps22b-b" name="ps22b-a" value="{{ $cuerpo22["pala_psondaje_b"] ?? 0 }}" onchange="cargar22b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps22b-c" name="ps22b-a" value="{{ $cuerpo22["pala_psondaje_c"] ?? 0 }}" onchange="cargar22b();getDefectos();" tabindex="147"//>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg22b-a" name="mg22b-a" value="{{ $cuerpo22["pala_altura_mg_a"] ?? 0 }}" onchange="cargar22b();getDefectos();rangoNumeroMargen('mg22b-a');cargar22b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg22b-b" name="mg22b-b" value="{{ $cuerpo22["pala_altura_mg_b"] ?? 0 }}" onchange="cargar22b();getDefectos();rangoNumeroMargen('mg22b-b');cargar22b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg22b-c" name="mg22b-c" value="{{ $cuerpo22["pala_altura_mg_c"] ?? 0 }}" onchange="cargar22b();getDefectos();rangoNumeroMargen('mg22b-c');cargar22b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s22b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s22b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s22b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su22b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su22b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su22b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p22b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p22b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p22b-c"></div>
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
                <div class="form-group" id="obs_pieza2.2">
                    <label class="floating-label-activo-sm">Obs. Pieza 2.2</label>
                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 2.2" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_22" id="obs_22" placeholder="Describa observaciones">{{ $cuerpo22["observaciones"] ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza2.2">
                <button type="button" onclick="guardar_pieza('22')" class="btn btn-info text-center"><i class="feather icon-save"></i>  Guardar evaluación 2.2</button>
        </div>
    </div>
    <script>

        $(document).ready(function() {
            // Handler for .ready() called.
            //anchuraValor();
            cargar22a();
            cargar22b();

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

        function drawVisualization22a(data22a) {
            // Create and draw the visualization.
            var ac22a = new google.visualization.AreaChart(document.getElementById('visualization22a'));
            ac22a.draw(data22a, {
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

            $('#visualization22a iframe').attr('allowTransparency', 'true');
            $('#visualization22a iframe').contents().find('body').css('background', 'transparent');

        }

        function cargar22a(){

            var datoae22=document.getElementById('ae22').value;

            var datomg22a=document.getElementById('mg22-a').value;
            var datomg22b=document.getElementById('mg22-b').value;
            var datomg22c=document.getElementById('mg22-c').value;

            var datops22a=document.getElementById('ps22-a').value;
            var datops22b=document.getElementById('ps22-b').value;
            var datops22c=document.getElementById('ps22-c').value;

            //alert(document.getElementById('ps22-a').value);

            if(datops22a>3){
                document.getElementById('ps22-a').style.color="red";
            }else{
                document.getElementById('ps22-a').style.color="black";
            }
            if(datops22b>3){
                document.getElementById('ps22-b').style.color="red";
            }else{
                document.getElementById('ps22-b').style.color="black";
            }
            if(datops22c>3){
                document.getElementById('ps22-c').style.color="red";
            }else{
                document.getElementById('ps22-c').style.color="black";
            }


            var data22a=google.visualization.arrayToDataTable([
                ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
                ['',    0+(parseInt(datomg22a)+parseInt(datops22a)),      0-parseInt(datops22a), parseInt(datoae22)],
                ['',    0+(parseInt(datomg22b)+parseInt(datops22b)),      0-parseInt(datops22b), parseInt(datoae22)],
                ['',    0+(parseInt(datomg22c)+parseInt(datops22c)),      0-parseInt(datops22c), parseInt(datoae22)]
            ]);

            drawVisualization22a(data22a);

        }

        function drawVisualization22b(data22b) {

            // Create and draw the visualization.
            var ac22b = new google.visualization.AreaChart(document.getElementById('visualization22b'));
            ac22b.draw(data22b, {
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
            $('#visualization22b iframe').attr('allowTransparency', 'true');
            $('#visualization22b iframe').contents().find('body').css('background', 'transparent');
        }

        function cargar22b(){

            var datomg22ba=document.getElementById('mg22b-a').value;
            var datomg22bb=document.getElementById('mg22b-b').value;
            var datomg22bc=document.getElementById('mg22b-c').value;

            var datops22ba=document.getElementById('ps22b-a').value;
            var datops22bb=document.getElementById('ps22b-b').value;
            var datops22bc=document.getElementById('ps22b-c').value;

            if(datops22ba>3){
                document.getElementById('ps22b-a').style.color="red";
            }else{
                document.getElementById('ps22b-a').style.color="black";
            }
            if(datops22bb>3){
                document.getElementById('ps22b-b').style.color="red";
            }else{
                document.getElementById('ps22b-b').style.color="black";
            }
            if(datops22bc>3){
                document.getElementById('ps22b-c').style.color="red";
            }else{
                document.getElementById('ps22b-c').style.color="black";
            }

            var data22b=google.visualization.arrayToDataTable([
                ['',   'Margen Gingival', 'Profundidad de sondaje'],
                ['',    0-(parseInt(datomg22ba)+parseInt(datops22ba)),      0+parseInt(datops22ba)],
                ['',    0-(parseInt(datomg22bb)+parseInt(datops22bb)),      0+parseInt(datops22bb)],
                ['',    0-(parseInt(datomg22bc)+parseInt(datops22bc)),      0+parseInt(datops22bc)]
            ]);

            drawVisualization22b(data22b);

        }

        arrstyle = ["i22","f22","f22b-a","f22b-b","s22-a","s22-b","s22-c","p22-a","p22-b","p22-c","s22b-a","s22b-b","s22b-c","p22b-a","p22b-b","p22b-c"];

        //FUNCIONES PARA ANCHURA ENCÍA
        $('#ae22').change(function() {
            if(parseInt(document.getElementById('ae22').value)<3){
                $(this).css("color","red");
            }else{
                $(this).css("color","black");
            }
            cargar22a();
        });

        //FUNCIONES PARA SANGRADO
        $('#s22-a').toggle(
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
        $('#s22-b').toggle(
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
        $('#s22-c').toggle(
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

        $('#s22b-a').toggle(
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
        $('#s22b-b').toggle(
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
        $('#s22b-c').toggle(
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
        $('#su22-a').toggle(
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
        $('#su22-b').toggle(
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
        $('#su22-c').toggle(
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

        $('#su22b-a').toggle(
            function () {
                $(this).css({"background":"#f3e822"});
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
        $('#su22b-b').toggle(
            function () {
                $(this).css({"background":"#f3e822"});
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
        $('#su22b-c').toggle(
            function () {
                $(this).css({"background":"#f3e822"});
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
        $('#p22-a').toggle(
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
        $('#p22-b').toggle(
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
        $('#p22-c').toggle(
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
        $('#p22b-a').toggle(
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
        $('#p22b-b').toggle(
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
        $('#p22b-c').toggle(
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
        $('#d22').toggle(
            function () {
                $('#diente22-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau22.png') }}')");
                $('#diente22-a').css("background-position","-36px -13px");
                $('#diente22-a').css("background-repeat","no-repeat");
                $('#m22').prop('disabled', true); // Deshabilita el input con id 'm22'
                $('#i22').prop("disabled",true);
                $('#f22').prop("disabled",true);
                $('#s22-a').prop("disabled",true);
                $('#s22-b').prop("disabled",true);
                $('#s22-c').prop("disabled",true);
                $('#p22-a').prop("disabled",true);
                $('#p22-b').prop("disabled",true);
                $('#p22-c').prop("disabled",true);
                $('#mg22-a').prop("disabled",true);
                $('#mg22-b').prop("disabled",true);
                $('#mg22-c').prop("disabled",true);
                $('#ps22-a').prop("disabled",true);
                $('#ps22-b').prop("disabled",true);
                $('#ps22-c').prop("disabled",true);
                /*$('#furca22').css("background","none");*/
                $('#mg22-a').val('0');
                $('#mg22-b').val('0');
                $('#mg22-c').val('0');
                $('#ps22-a').val('0');
                $('#ps22-b').val('0');
                $('#ps22-c').val('0');

                $('#diente22b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-22b.png') }}')");
                $('#diente22b-a').css("background-position","0 23px");
                $('#diente22b-a').css("background-repeat","no-repeat");
                $('#m22b').prop("disabled",true);
                $('#i22b').prop("disabled",true);
                $('#f22b-a').prop("disabled",true);
                $('#f22b-b').prop("disabled",true);
                $('#s22b-a').prop("disabled",true);
                $('#s22b-b').prop("disabled",true);
                $('#s22b-c').prop("disabled",true);
                $('#p22b-a').prop("disabled",true);
                $('#p22b-b').prop("disabled",true);
                $('#p22b-c').prop("disabled",true);
                $('#mg22b-a').prop("disabled",true);
                $('#mg22b-b').prop("disabled",true);
                $('#mg22b-c').prop("disabled",true);
                $('#ps22b-a').prop("disabled",true);
                $('#ps22b-b').prop("disabled",true);
                $('#ps22b-c').prop("disabled",true);
                $('#mg22b-a').val('0');
                $('#mg22b-b').val('0');
                $('#mg22b-c').val('0');
                $('#ps22b-a').val('0');
                $('#ps22b-b').val('0');
                $('#ps22b-c').val('0');

                $('#furca22').prop("disabled",true);
                $('#furca22-a').prop("disabled",true);
                $('#furca22-b').prop("disabled",true);
                $('#ae22').prop("disabled",true);
                $('#pi22').prop("disabled",true);

                totalDientes--;
                getDefectos();
                cargar22a();
                cargar22b();

                {{--  cargar17a();
                cargar16a();
                cargar15a();
                cargar14a();
                cargar13a();
                cargar12a();
                cargar22a();;
                cargar2();
                cargar3();
                cargar4();  --}}
                getSangrado();
                getSupuracion();
                getPlaca();

            },
            function () {
                $('#diente22-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-22.png') }}')");
                $('#diente22-a').css("background-position","0 -2px");
                $('#diente22-a').css("background-repeat","no-repeat");
                $('#m22').prop("disabled",false);
                $('#i22').prop("disabled",false);
                $('#f22').prop("disabled",false);
                $('#s22-a').prop("disabled",false);
                $('#s22-b').prop("disabled",false);
                $('#s22-c').prop("disabled",false);
                $('#p22-a').prop("disabled",false);
                $('#p22-b').prop("disabled",false);
                $('#p22-c').prop("disabled",false);
                $('#mg22-a').prop("disabled",false);
                $('#mg22-b').prop("disabled",false);
                $('#mg22-c').prop("disabled",false);
                $('#ps22-a').prop("disabled",false);
                $('#ps22-b').prop("disabled",false);
                $('#ps22-c').prop("disabled",false);

                $('#diente22b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-22b.png') }}')");
                $('#diente22b-a').css("background-position","0 23px");
                $('#diente22b-a').css("background-repeat","no-repeat");
                $('#m22b').prop("disabled",false);
                $('#i22b').prop("disabled",false);
                $('#f22b-a').prop("disabled",false);
                $('#f22b-b').prop("disabled",false);
                $('#s22b-a').prop("disabled",false);
                $('#s22b-b').prop("disabled",false);
                $('#s22b-c').prop("disabled",false);
                $('#p22b-a').prop("disabled",false);
                $('#p22b-b').prop("disabled",false);
                $('#p22b-c').prop("disabled",false);
                $('#mg22b-a').prop("disabled",false);
                $('#mg22b-b').prop("disabled",false);
                $('#mg22b-c').prop("disabled",false);
                $('#ps22b-a').prop("disabled",false);
                $('#ps22b-b').prop("disabled",false);
                $('#ps22b-c').prop("disabled",false);

                $('#furca22').css("display","block");
                $('#furca22-a').css("display","block");
                $('#furca22-b').css("display","block");
                $('#ae22').prop("disabled",false);
                $('#pi22').prop("disabled",false);

                totalDientes++;

                {{--  cargar17a();
                cargar16a();
                cargar15a();
                cargar14a();
                cargar13a();
                cargar12a();
                cargar22a();;
                cargar2();
                cargar3();
                cargar4();  --}}
                getSangrado();
                getPlaca();
            }
        );

        //IMPLANTES
        $('#i22').toggle(
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
                $('#f22').css({"background":"#FFFFFF"});
                $('#diente22-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl22.png') }}')");
                $('#diente22-a').css("background-position","-38px -2px");
                $('#diente22-a').css("background-repeat","no-repeat");

                $('#diente22b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-22b.png') }}')");
                $('#diente22b-a').css("background-position","0 23px");
                $('#diente22b-a').css("background-repeat","no-repeat");

                $('#furca22').css("background","none");
                $('#furca22-a').css("background","none");
                $('#furca22-b').css("background","none");
                $('#f22').css("background","none");
                $('#f22b-a').css("background","none");
                $('#f22b-b').css("background","none");

                $("#f22").attr("id","f22desact");
                $("#f22b-a").attr("id","f22b-adesact");
                $("#f22b-b").attr("id","f22b-bdesact");

            },
            function () {
                $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
                $('#diente22-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-22.png') }}')");
                $('#diente22-a').css("background-position","0 -2px");
                $('#diente22-a').css("background-repeat","no-repeat");

                $('#diente22b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-22b.png') }}')");
                $('#diente22b-a').css("background-position","0 23px");
                $('#diente22b-a').css("background-repeat","no-repeat");

                $('#f22').css("background","#FFFFFF");
                $('#f22b-a').css("background","#FFFFFF");
                $('#f22b-b').css("background","#FFFFFF");

                $("#f22desact").attr("id","f22");
                $("#f22b-adesact").attr("id","f22b-a");
                $("#f22b-bdesact").attr("id","f22b-b");
                $('#d22').trigger('click');
            }
        );

        //FURCA
        $('#f22').toggle(
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
                $('#i22').css({"background":"#FFFFFF"});
                $('#furca22').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
            },
            function () {

                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
                $('#furca22').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
                $('#furca22').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF"});
                $('#furca22').css("background","none");
            }
        );

        //FURCAS TABLA 3
        $('#f22b-a').toggle(
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
                $('#furca22-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
                $('#furca22-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
                $('#furca22-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF"});
                $('#furca22-a').css("background","none");
            }
        );
        $('#f22b-b').toggle(
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
                $('#furca22-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
                $('#furca22-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
                $('#furca22-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF"});
                $('#furca22-b').css("background","none");
            }
        );




    </script>
