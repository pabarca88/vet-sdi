    {{--  </head>  --}}
    <style>
        #i32{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente32-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla6/periodontograma-dientes-arriba-32.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }


        #i32b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente32b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla8/periodontograma-dientes-abajo-32b.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }
        #d32,#i32,#i32b,#f32,,#ae32-a,#ae32-b:hover{
            background: #E6E6E6;
        }
        #i32-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f32{
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
        #pi32{
            width: 100%;
        }


        .f32,{
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
            $pieza32 = $piezas_periodonto->firstWhere('pieza', '32');
            $cuerpo32 = $pieza32 ? $pieza32->cuerpo : [];
            $pronostico32 = $cuerpo32['pronostico'] ?? '';
        @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl32.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau32.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-32b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-32b.png') }}"/>
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
                                Pieza 3.2
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

                                                <div id="visualization32a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente32-a"></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d32">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i32">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m32" name="m32" value="{{ $cuerpo32["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m32');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi32" id="pi32">
                                                    <option value="B" {{ $pronostico32 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico32 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico32 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico32 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s32b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s32-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s32-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su32-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su32-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su32-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p32-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p32-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p32-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae32" name="ae32" value="{{ $cuerpo32["plataforma"] ?? 0 }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg32-a" name="mg32-a" value="{{ $cuerpo32["vest_altura_mg_a"] ?? 0 }}" onchange="cargar32a();getDefectos();rangoNumeroMargen('mg32-a');cargar32a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg32-b" name="mg32-b" value="{{ $cuerpo32["vest_altura_mg_b"] ?? 0 }}" onchange="cargar32a();getDefectos();rangoNumeroMargen('mg32-b');cargar32a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg32-c" name="mg32-c" value="{{ $cuerpo32["vest_altura_mg_c"] ?? 0 }}" onchange="cargar32a();getDefectos();rangoNumeroMargen('mg32-c');cargar32a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps32-a" name="ps32-a" value="{{ $cuerpo32["vest_psondaje_a"] ?? 0 }}" onchange="cargar32a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps32-b" name="ps32-b" value="{{ $cuerpo32["vest_psondaje_b"] ?? 0 }}" onchange="cargar32a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps32-c" name="ps32-c" value="{{ $cuerpo32["vest_psondaje_c"] ?? 0 }}" onchange="cargar32a();getDefectos();" tabindex="99"/>
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
                                                        <div id="visualization32b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente32b-a">
                                                            <div id="furca32-a"></div>
                                                            <div id="furca32-b"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                               <!-- <tr>
                                                    <td class="titulo">P. sondaje</td>
                                                    <td class="borde">
                                                        <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps32b-a" name="ps32b-a" value="0" onchange="cargar32b();getDefectos();" tabindex="145"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps32b-b" name="ps32b-b" value="0" onchange="cargar32b();getDefectos();" tabindex="146"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps32b-c" name="ps32b-c" value="0" onchange="cargar32b();getDefectos();" tabindex="147"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Altura MG</td>
                                                    <td class="borde">
                                                        <div class="row">
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg32b-a" name="mg32b-a" value="0" onchange="cargar32b();getDefectos();rangoNumeroMargen('mg32b-a');cargar32b();" tabindex="193"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  type="number" id="mg32b-b" name="mg32b-b" value="0" onchange="cargar32b();getDefectos();rangoNumeroMargen('mg32b-b');cargar32b();" tabindex="194"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg32b-c" name="mg32b-c" value="0" onchange="cargar32b();getDefectos();rangoNumeroMargen('mg32b-c');cargar32b();" tabindex="195"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Sangrado </td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="s32b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="s32b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="s32b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Supuraci&oacute;n</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="su32b-a"></div>
                                                        <div style="width: 30%;height: 20px;"id="su32b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="su32b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Higiene</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="p32b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="p32b-b"></div>
                                                        <div style="width: 30%;height: 20px;" id="p32b-c"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Furca</td>
                                                    <td class="borde"style="text-align:center">
                                                        <div style="width: 20%;height: 25px;margin-left: 7px" id="f32b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f32b-b">F-2</div>

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
                                        <input class="form-control form-control-xs" type="number" id="ps32b-a" name="ps32b-a" value="{{ $cuerpo32["pala_psondaje_a"] ?? 0 }}" onchange="cargar32b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps32b-b" name="ps32b-a" value="{{ $cuerpo32["pala_psondaje_b"] ?? 0 }}" onchange="cargar32b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps32b-c" name="ps32b-a" value="{{ $cuerpo32["pala_psondaje_c"] ?? 0 }}" onchange="cargar32b();getDefectos();" tabindex="147"//>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg32b-a" name="mg32b-a" value="{{ $cuerpo32["pala_altura_mg_a"] ?? 0 }}" onchange="cargar32b();getDefectos();rangoNumeroMargen('mg32b-a');cargar32b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg32b-b" name="mg32b-b" value="{{ $cuerpo32["pala_altura_mg_b"] ?? 0 }}" onchange="cargar32b();getDefectos();rangoNumeroMargen('mg32b-b');cargar32b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg32b-c" name="mg32b-c" value="{{ $cuerpo32["pala_altura_mg_c"] ?? 0 }}" onchange="cargar32b();getDefectos();rangoNumeroMargen('mg32b-c');cargar32b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s32b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s32b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s32b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su32b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su32b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su32b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p32b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p32b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p32b-c"></div>
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
                <div class="form-group" id="obs_pieza3.2">
                    <label class="floating-label-activo-sm">Obs. Pieza 3.2</label>
                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 3.2" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_32" id="obs_32" placeholder="Describa observaciones">{{ $cuerpo32["observaciones"] ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza3.2">
                <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('32')"><i class="feather icon-save"></i>  Guardar evaluación 3.2</button>
        </div>
    </div>
    <script>

        $(document).ready(function() {
            // Handler for .ready() called.
            //anchuraValor();
            cargar32a();
            cargar32b();

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

        function drawVisualization32a(data32a) {
            // Create and draw the visualization.
            var ac32a = new google.visualization.AreaChart(document.getElementById('visualization32a'));
            ac32a.draw(data32a, {
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

            $('#visualization32a iframe').attr('allowTransparency', 'true');
            $('#visualization32a iframe').contents().find('body').css('background', 'transparent');

        }

        function cargar32a(){

            var datoae32=document.getElementById('ae32').value;

            var datomg32a=document.getElementById('mg32-a').value;
            var datomg32b=document.getElementById('mg32-b').value;
            var datomg32c=document.getElementById('mg32-c').value;

            var datops32a=document.getElementById('ps32-a').value;
            var datops32b=document.getElementById('ps32-b').value;
            var datops32c=document.getElementById('ps32-c').value;

            //alert(document.getElementById('ps32-a').value);

            if(datops32a>3){
                document.getElementById('ps32-a').style.color="red";
            }else{
                document.getElementById('ps32-a').style.color="black";
            }
            if(datops32b>3){
                document.getElementById('ps32-b').style.color="red";
            }else{
                document.getElementById('ps32-b').style.color="black";
            }
            if(datops32c>3){
                document.getElementById('ps32-c').style.color="red";
            }else{
                document.getElementById('ps32-c').style.color="black";
            }


            var data32a=google.visualization.arrayToDataTable([
                ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
                ['',    0+(parseInt(datomg32a)+parseInt(datops32a)),      0-parseInt(datops32a), parseInt(datoae32)],
                ['',    0+(parseInt(datomg32b)+parseInt(datops32b)),      0-parseInt(datops32b), parseInt(datoae32)],
                ['',    0+(parseInt(datomg32c)+parseInt(datops32c)),      0-parseInt(datops32c), parseInt(datoae32)]
            ]);

            drawVisualization32a(data32a);

        }

        function drawVisualization32b(data32b) {

            // Create and draw the visualization.
            var ac32b = new google.visualization.AreaChart(document.getElementById('visualization32b'));
            ac32b.draw(data32b, {
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
            $('#visualization32b iframe').attr('allowTransparency', 'true');
            $('#visualization32b iframe').contents().find('body').css('background', 'transparent');
        }

        function cargar32b(){

            var datomg32ba=document.getElementById('mg32b-a').value;
            var datomg32bb=document.getElementById('mg32b-b').value;
            var datomg32bc=document.getElementById('mg32b-c').value;

            var datops32ba=document.getElementById('ps32b-a').value;
            var datops32bb=document.getElementById('ps32b-b').value;
            var datops32bc=document.getElementById('ps32b-c').value;

            if(datops32ba>3){
                document.getElementById('ps32b-a').style.color="red";
            }else{
                document.getElementById('ps32b-a').style.color="black";
            }
            if(datops32bb>3){
                document.getElementById('ps32b-b').style.color="red";
            }else{
                document.getElementById('ps32b-b').style.color="black";
            }
            if(datops32bc>3){
                document.getElementById('ps32b-c').style.color="red";
            }else{
                document.getElementById('ps32b-c').style.color="black";
            }

            var data32b=google.visualization.arrayToDataTable([
                ['',   'Margen Gingival', 'Profundidad de sondaje'],
                ['',    0-(parseInt(datomg32ba)+parseInt(datops32ba)),      0+parseInt(datops32ba)],
                ['',    0-(parseInt(datomg32bb)+parseInt(datops32bb)),      0+parseInt(datops32bb)],
                ['',    0-(parseInt(datomg32bc)+parseInt(datops32bc)),      0+parseInt(datops32bc)]
            ]);

            drawVisualization32b(data32b);

        }

        arrstyle = ["i32","f32","f32b-a","f32b-b","s32-a","s32-b","s32-c","p32-a","p32-b","p32-c","s32b-a","s32b-b","s32b-c","p32b-a","p32b-b","p32b-c"];

        //FUNCIONES PARA ANCHURA ENCÍA
        $('#ae32').change(function() {
            if(parseInt(document.getElementById('ae32').value)<3){
                $(this).css("color","red");
            }else{
                $(this).css("color","black");
            }
            cargar32a();
        });

        //FUNCIONES PARA SANGRADO
        $('#s32-a').toggle(
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
        $('#s32-b').toggle(
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
        $('#s32-c').toggle(
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

        $('#s32b-a').toggle(
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
        $('#s32b-b').toggle(
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
        $('#s32b-c').toggle(
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
        $('#su32-a').toggle(
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
        $('#su32-b').toggle(
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
        $('#su32-c').toggle(
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

        $('#su32b-a').toggle(
            function () {
                $(this).css({"background":"#f3e832"});
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
        $('#su32b-b').toggle(
            function () {
                $(this).css({"background":"#f3e832"});
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
        $('#su32b-c').toggle(
            function () {
                $(this).css({"background":"#f3e832"});
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
        $('#p32-a').toggle(
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
        $('#p32-b').toggle(
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
        $('#p32-c').toggle(
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
        $('#p32b-a').toggle(
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
        $('#p32b-b').toggle(
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
        $('#p32b-c').toggle(
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
        $('#d32').toggle(
            function () {
                $('#diente32-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau32.png') }}')");
                $('#diente32-a').css("background-position","-36px -13px");
                $('#diente32-a').css("background-repeat","no-repeat");
                $('#m32').prop('disabled', true); // Deshabilita el input con id 'm32'
                $('#i32').prop("disabled",true);
                $('#f32').prop("disabled",true);
                $('#s32-a').prop("disabled",true);
                $('#s32-b').prop("disabled",true);
                $('#s32-c').prop("disabled",true);
                $('#p32-a').prop("disabled",true);
                $('#p32-b').prop("disabled",true);
                $('#p32-c').prop("disabled",true);
                $('#mg32-a').prop("disabled",true);
                $('#mg32-b').prop("disabled",true);
                $('#mg32-c').prop("disabled",true);
                $('#ps32-a').prop("disabled",true);
                $('#ps32-b').prop("disabled",true);
                $('#ps32-c').prop("disabled",true);
                /*$('#furca32').css("background","none");*/
                $('#mg32-a').val('0');
                $('#mg32-b').val('0');
                $('#mg32-c').val('0');
                $('#ps32-a').val('0');
                $('#ps32-b').val('0');
                $('#ps32-c').val('0');

                $('#diente32b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-32b.png') }}')");
                $('#diente32b-a').css("background-position","0 23px");
                $('#diente32b-a').css("background-repeat","no-repeat");
                $('#m32b').prop("disabled",true);
                $('#i32b').prop("disabled",true);
                $('#f32b-a').prop("disabled",true);
                $('#f32b-b').prop("disabled",true);
                $('#s32b-a').prop("disabled",true);
                $('#s32b-b').prop("disabled",true);
                $('#s32b-c').prop("disabled",true);
                $('#p32b-a').prop("disabled",true);
                $('#p32b-b').prop("disabled",true);
                $('#p32b-c').prop("disabled",true);
                $('#mg32b-a').prop("disabled",true);
                $('#mg32b-b').prop("disabled",true);
                $('#mg32b-c').prop("disabled",true);
                $('#ps32b-a').prop("disabled",true);
                $('#ps32b-b').prop("disabled",true);
                $('#ps32b-c').prop("disabled",true);
                $('#mg32b-a').val('0');
                $('#mg32b-b').val('0');
                $('#mg32b-c').val('0');
                $('#ps32b-a').val('0');
                $('#ps32b-b').val('0');
                $('#ps32b-c').val('0');

                $('#furca32').prop("disabled",true);
                $('#furca32-a').prop("disabled",true);
                $('#furca32-b').prop("disabled",true);
                $('#ae32').prop("disabled",true);
                $('#pi32').prop("disabled",true);

                totalDientes--;
                getDefectos();
                cargar32a();
                cargar32b();

                {{--  cargar17a();
                cargar16a();
                cargar15a();
                cargar14a();
                cargar13a();
                cargar12a();
                cargar32a();;
                cargar2();
                cargar3();
                cargar4();  --}}
                getSangrado();
                getSupuracion();
                getPlaca();

            },
            function () {
                $('#diente32-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-32.png') }}')");
                $('#diente32-a').css("background-position","0 -2px");
                $('#diente32-a').css("background-repeat","no-repeat");
                $('#m32').prop("disabled",false);
                $('#i32').prop("disabled",false);
                $('#f32').prop("disabled",false);
                $('#s32-a').prop("disabled",false);
                $('#s32-b').prop("disabled",false);
                $('#s32-c').prop("disabled",false);
                $('#p32-a').prop("disabled",false);
                $('#p32-b').prop("disabled",false);
                $('#p32-c').prop("disabled",false);
                $('#mg32-a').prop("disabled",false);
                $('#mg32-b').prop("disabled",false);
                $('#mg32-c').prop("disabled",false);
                $('#ps32-a').prop("disabled",false);
                $('#ps32-b').prop("disabled",false);
                $('#ps32-c').prop("disabled",false);

                $('#diente32b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-32b.png') }}')");
                $('#diente32b-a').css("background-position","0 23px");
                $('#diente32b-a').css("background-repeat","no-repeat");
                $('#m32b').prop("disabled",false);
                $('#i32b').prop("disabled",false);
                $('#f32b-a').prop("disabled",false);
                $('#f32b-b').prop("disabled",false);
                $('#s32b-a').prop("disabled",false);
                $('#s32b-b').prop("disabled",false);
                $('#s32b-c').prop("disabled",false);
                $('#p32b-a').prop("disabled",false);
                $('#p32b-b').prop("disabled",false);
                $('#p32b-c').prop("disabled",false);
                $('#mg32b-a').prop("disabled",false);
                $('#mg32b-b').prop("disabled",false);
                $('#mg32b-c').prop("disabled",false);
                $('#ps32b-a').prop("disabled",false);
                $('#ps32b-b').prop("disabled",false);
                $('#ps32b-c').prop("disabled",false);

                $('#furca32').css("display","block");
                $('#furca32-a').css("display","block");
                $('#furca32-b').css("display","block");
                $('#ae32').prop("disabled",false);
                $('#pi32').prop("disabled",false);

                totalDientes++;

                {{--  cargar17a();
                cargar16a();
                cargar15a();
                cargar14a();
                cargar13a();
                cargar12a();
                cargar32a();;
                cargar2();
                cargar3();
                cargar4();  --}}
                getSangrado();
                getPlaca();
            }
        );

        //IMPLANTES
        $('#i32').toggle(
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
                $('#f32').css({"background":"#FFFFFF"});
                $('#diente32-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl32.png') }}')");
                $('#diente32-a').css("background-position","-38px -2px");
                $('#diente32-a').css("background-repeat","no-repeat");

                $('#diente32b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-32b.png') }}')");
                $('#diente32b-a').css("background-position","0 23px");
                $('#diente32b-a').css("background-repeat","no-repeat");

                $('#furca32').css("background","none");
                $('#furca32-a').css("background","none");
                $('#furca32-b').css("background","none");
                $('#f32').css("background","none");
                $('#f32b-a').css("background","none");
                $('#f32b-b').css("background","none");

                $("#f32").attr("id","f32desact");
                $("#f32b-a").attr("id","f32b-adesact");
                $("#f32b-b").attr("id","f32b-bdesact");

            },
            function () {
                $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
                $('#diente32-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-32.png') }}')");
                $('#diente32-a').css("background-position","0 -2px");
                $('#diente32-a').css("background-repeat","no-repeat");

                $('#diente32b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-32b.png') }}')");
                $('#diente32b-a').css("background-position","0 23px");
                $('#diente32b-a').css("background-repeat","no-repeat");

                $('#f32').css("background","#FFFFFF");
                $('#f32b-a').css("background","#FFFFFF");
                $('#f32b-b').css("background","#FFFFFF");

                $("#f32desact").attr("id","f32");
                $("#f32b-adesact").attr("id","f32b-a");
                $("#f32b-bdesact").attr("id","f32b-b");
                $('#d32').trigger('click');
            }
        );

        //FURCA
        $('#f32').toggle(
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
                $('#i32').css({"background":"#FFFFFF"});
                $('#furca32').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
            },
            function () {

                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
                $('#furca32').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
                $('#furca32').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF"});
                $('#furca32').css("background","none");
            }
        );

        //FURCAS TABLA 3
        $('#f32b-a').toggle(
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
                $('#furca32-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
                $('#furca32-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
                $('#furca32-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF"});
                $('#furca32-a').css("background","none");
            }
        );
        $('#f32b-b').toggle(
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
                $('#furca32-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
                $('#furca32-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
                $('#furca32-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
            },
            function () {
                $(this).css({"background":"#FFFFFF"});
                $('#furca32-b').css("background","none");
            }
        );




    </script>
