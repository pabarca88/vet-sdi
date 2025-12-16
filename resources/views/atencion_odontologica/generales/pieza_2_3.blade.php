
    {{--  </head>  --}}
    <style>
        #i23{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente23-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla2/periodontograma-dientes-arriba-23.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }


        #i23b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente23b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla4/periodontograma-dientes-abajo-23b.png') }}');
            width:54px;
            background-position: 0 13px;
            background-repeat: no-repeat;
        }
        #d23,#i23,#i23b,#f23,,#ae23-a,#ae23-b:hover{
            background: #E6E6E6;
        }
        #i23-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f23{
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
        #pi23{
            width: 100%;
        }


        .f23,{
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
        $pieza23 = $piezas_periodonto->firstWhere('pieza', '23');
        $cuerpo23 = $pieza23 ? $pieza23->cuerpo : [];
        $pronostico23 = $cuerpo23['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl23.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau23.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-23b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-23b.png') }}"/>
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
                                Pieza 2.3
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

                                                <div id="visualization23a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente23-a"></div>
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
                                                <div class="py-2 border input-dental rounded" id="i23">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m23" name="m23" value="{{ $cuerpo23["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m23');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-9">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi23" id="pi23">
                                                    <option value="" {{ $pronostico23 == '' ? 'selected' : '' }}></option>
                                                    <option value="B" {{ $pronostico23 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico23 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico23 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico23 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s23-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s23-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s23-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su23-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su23-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su23-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p23-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p23-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p23-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae23" name="ae23" value="{{ $cuerpo23["plataforma"] ?? 0 }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg23-a" name="mg23-a" value="{{ $cuerpo23["vest_altura_mg_a"] ?? 0 }}" onchange="cargar23a();getDefectos();rangoNumeroMargen('mg23-a');cargar23a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg23-b" name="mg23-b" value="{{ $cuerpo23["vest_altura_mg_b"] ?? 0 }}" onchange="cargar23a();getDefectos();rangoNumeroMargen('mg23-b');cargar23a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg23-c" name="mg23-c" value="{{ $cuerpo23["vest_altura_mg_c"] ?? 0 }}" onchange="cargar23a();getDefectos();rangoNumeroMargen('mg23-c');cargar23a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps23-a" name="ps23-a" value="{{ $cuerpo23["vest_psondaje_a"] ?? 0 }}" onchange="cargar23a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps23-b" name="ps23-b" value="{{ $cuerpo23["vest_psondaje_b"] ?? 0 }}" onchange="cargar23a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps23-c" name="ps23-c" value="{{ $cuerpo23["vest_psondaje_c"] ?? 0 }}" onchange="cargar23a();getDefectos();" tabindex="99"/>
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
                                                        <div id="visualization23b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente23b-a">
                                                            <div id="furca23-a"></div>
                                                            <div id="furca23-b"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                               <!-- <tr>
                                                    <td class="titulo">P. sondaje</td>
                                                    <td class="borde">
                                                        <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps23b-a" name="ps23b-a" value="0" onchange="cargar23b();getDefectos();" tabindex="145"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps23b-b" name="ps23b-b" value="0" onchange="cargar23b();getDefectos();" tabindex="146"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps23b-c" name="ps23b-c" value="0" onchange="cargar23b();getDefectos();" tabindex="147"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Altura MG</td>
                                                    <td class="borde">
                                                        <div class="row">
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg23b-a" name="mg23b-a" value="0" onchange="cargar23b();getDefectos();rangoNumeroMargen('mg23b-a');cargar23b();" tabindex="193"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  type="number" id="mg23b-b" name="mg23b-b" value="0" onchange="cargar23b();getDefectos();rangoNumeroMargen('mg23b-b');cargar23b();" tabindex="194"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg23b-c" name="mg23b-c" value="0" onchange="cargar23b();getDefectos();rangoNumeroMargen('mg23b-c');cargar23b();" tabindex="195"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Sangrado </td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="s23b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="s23b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="s23b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Supuraci&oacute;n</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="su23b-a"></div>
                                                        <div style="width: 30%;height: 20px;"id="su23b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="su23b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Higiene</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="p23b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="p23b-b"></div>
                                                        <div style="width: 30%;height: 20px;" id="p23b-c"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Furca</td>
                                                    <td class="borde"style="text-align:center">
                                                        <div style="width: 20%;height: 25px;margin-left: 7px" id="f23b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f23b-b">F-2</div>

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
                                        <input class="form-control form-control-xs" type="number" id="ps23b-a" name="ps23b-a" value="{{ $cuerpo23["pala_psondaje_a"] ?? 0 }}" onchange="cargar23b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps23b-b" name="ps23b-b" value="{{ $cuerpo23["pala_psondaje_b"] ?? 0 }}" onchange="cargar23b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps23b-c" name="ps23b-c" value="{{ $cuerpo23["pala_psondaje_c"] ?? 0 }}" onchange="cargar23b();getDefectos();" tabindex="147"//>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg23b-a" name="mg23b-a" value="{{ $cuerpo23["pala_altura_mg_a"] ?? 0 }}" onchange="cargar23b();getDefectos();rangoNumeroMargen('mg23b-a');cargar23b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg23b-b" name="mg23b-b" value="{{ $cuerpo23["pala_altura_mg_b"] ?? 0 }}" onchange="cargar23b();getDefectos();rangoNumeroMargen('mg23b-b');cargar23b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg23b-c" name="mg23b-c" value="{{ $cuerpo23["pala_altura_mg_c"] ?? 0 }}" onchange="cargar23b();getDefectos();rangoNumeroMargen('mg23b-c');cargar23b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s23b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s23b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s23b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su23b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su23b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su23b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p23b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p23b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p23b-c"></div>
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
                <div class="form-group" id="obs_pieza2.3">
                    <label class="floating-label-activo-sm">Obs. Pieza 2.3</label>
                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 2.3" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_23" id="obs_23" placeholder="Describa observaciones">{{ $cuerpo23["observaciones"] ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza2.3">
                <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('23')"><i class="feather icon-save"></i>  Guardar evaluación 2.3</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar23a();
        cargar23b();

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

    function drawVisualization23a(data23a) {
        // Create and draw the visualization.
        var ac23a = new google.visualization.AreaChart(document.getElementById('visualization23a'));
        ac23a.draw(data23a, {
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

        $('#visualization23a iframe').attr('allowTransparency', 'true');
        $('#visualization23a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar23a(){

        var datoae23=document.getElementById('ae23').value;

        var datomg23a=document.getElementById('mg23-a').value;
        var datomg23b=document.getElementById('mg23-b').value;
        var datomg23c=document.getElementById('mg23-c').value;

        var datops23a=document.getElementById('ps23-a').value;
        var datops23b=document.getElementById('ps23-b').value;
        var datops23c=document.getElementById('ps23-c').value;

        //alert(document.getElementById('ps23-a').value);

        if(datops23a>3){
            document.getElementById('ps23-a').style.color="red";
        }else{
            document.getElementById('ps23-a').style.color="black";
        }
        if(datops23b>3){
            document.getElementById('ps23-b').style.color="red";
        }else{
            document.getElementById('ps23-b').style.color="black";
        }
        if(datops23c>3){
            document.getElementById('ps23-c').style.color="red";
        }else{
            document.getElementById('ps23-c').style.color="black";
        }


        var data23a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg23a)+parseInt(datops23a)),      0-parseInt(datops23a), parseInt(datoae23)],
            ['',    0+(parseInt(datomg23b)+parseInt(datops23b)),      0-parseInt(datops23b), parseInt(datoae23)],
            ['',    0+(parseInt(datomg23c)+parseInt(datops23c)),      0-parseInt(datops23c), parseInt(datoae23)]
        ]);

        drawVisualization23a(data23a);

    }

    function drawVisualization23b(data23b) {

        // Create and draw the visualization.
        var ac23b = new google.visualization.AreaChart(document.getElementById('visualization23b'));
        ac23b.draw(data23b, {
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
        $('#visualization23b iframe').attr('allowTransparency', 'true');
        $('#visualization23b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar23b(){

        var datomg23ba=document.getElementById('mg23b-a').value;
        var datomg23bb=document.getElementById('mg23b-b').value;
        var datomg23bc=document.getElementById('mg23b-c').value;

        var datops23ba=document.getElementById('ps23b-a').value;
        var datops23bb=document.getElementById('ps23b-b').value;
        var datops23bc=document.getElementById('ps23b-c').value;

        if(datops23ba>3){
            document.getElementById('ps23b-a').style.color="red";
        }else{
            document.getElementById('ps23b-a').style.color="black";
        }
        if(datops23bb>3){
            document.getElementById('ps23b-b').style.color="red";
        }else{
            document.getElementById('ps23b-b').style.color="black";
        }
        if(datops23bc>3){
            document.getElementById('ps23b-c').style.color="red";
        }else{
            document.getElementById('ps23b-c').style.color="black";
        }

        var data23b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg23ba)+parseInt(datops23ba)),      0+parseInt(datops23ba)],
            ['',    0-(parseInt(datomg23bb)+parseInt(datops23bb)),      0+parseInt(datops23bb)],
            ['',    0-(parseInt(datomg23bc)+parseInt(datops23bc)),      0+parseInt(datops23bc)]
        ]);

        drawVisualization23b(data23b);

    }

    arrstyle = ["i23","f23","f23b-a","f23b-b","s23-a","s23-b","s23-c","p23-a","p23-b","p23-c","s23b-a","s23b-b","s23b-c","p23b-a","p23b-b","p23b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae23').change(function() {
        if(parseInt(document.getElementById('ae23').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar23a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s23-a').toggle(
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
    $('#s23-b').toggle(
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
    $('#s23-c').toggle(
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

    $('#s23b-a').toggle(
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
    $('#s23b-b').toggle(
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
    $('#s23b-c').toggle(
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
    $('#su23-a').toggle(
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
    $('#su23-b').toggle(
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
    $('#su23-c').toggle(
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

    $('#su23b-a').toggle(
        function () {
            $(this).css({"background":"#f3e823"});
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
    $('#su23b-b').toggle(
        function () {
            $(this).css({"background":"#f3e823"});
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
    $('#su23b-c').toggle(
        function () {
            $(this).css({"background":"#f3e823"});
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
    $('#p23-a').toggle(
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
    $('#p23-b').toggle(
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
    $('#p23-c').toggle(
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
    $('#p23b-a').toggle(
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
    $('#p23b-b').toggle(
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
    $('#p23b-c').toggle(
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
	$('#d23').toggle(
        function () {
            $('#diente23-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau23.png') }}')");
            $('#diente23-a').css("background-position","-36px -13px");
            $('#diente23-a').css("background-repeat","no-repeat");
            $('#m23').prop('disabled', true); // Deshabilita el input con id 'm23'
            $('#i23').prop("disabled",true);
            $('#f23').prop("disabled",true);
            $('#s23-a').prop("disabled",true);
            $('#s23-b').prop("disabled",true);
            $('#s23-c').prop("disabled",true);
            $('#p23-a').prop("disabled",true);
            $('#p23-b').prop("disabled",true);
            $('#p23-c').prop("disabled",true);
            $('#mg23-a').prop("disabled",true);
            $('#mg23-b').prop("disabled",true);
            $('#mg23-c').prop("disabled",true);
            $('#ps23-a').prop("disabled",true);
            $('#ps23-b').prop("disabled",true);
            $('#ps23-c').prop("disabled",true);
            /*$('#furca23').css("background","none");*/
            $('#mg23-a').val('0');
            $('#mg23-b').val('0');
            $('#mg23-c').val('0');
            $('#ps23-a').val('0');
            $('#ps23-b').val('0');
            $('#ps23-c').val('0');

            $('#diente23b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-23b.png') }}')");
            $('#diente23b-a').css("background-position","0 23px");
            $('#diente23b-a').css("background-repeat","no-repeat");
            $('#m23b').prop("disabled",true);
            $('#i23b').prop("disabled",true);
            $('#f23b-a').prop("disabled",true);
            $('#f23b-b').prop("disabled",true);
            $('#s23b-a').prop("disabled",true);
            $('#s23b-b').prop("disabled",true);
            $('#s23b-c').prop("disabled",true);
            $('#p23b-a').prop("disabled",true);
            $('#p23b-b').prop("disabled",true);
            $('#p23b-c').prop("disabled",true);
            $('#mg23b-a').prop("disabled",true);
            $('#mg23b-b').prop("disabled",true);
            $('#mg23b-c').prop("disabled",true);
            $('#ps23b-a').prop("disabled",true);
            $('#ps23b-b').prop("disabled",true);
            $('#ps23b-c').prop("disabled",true);
            $('#mg23b-a').val('0');
            $('#mg23b-b').val('0');
            $('#mg23b-c').val('0');
            $('#ps23b-a').val('0');
            $('#ps23b-b').val('0');
            $('#ps23b-c').val('0');

            $('#furca23').prop("disabled",true);
            $('#furca23-a').prop("disabled",true);
            $('#furca23-b').prop("disabled",true);
            $('#ae23').prop("disabled",true);
            $('#pi23').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar23a();
            cargar23b();

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar23a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getSupuracion();
            getPlaca();

        },
        function () {
            $('#diente23-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-23.png') }}')");
            $('#diente23-a').css("background-position","0 -2px");
            $('#diente23-a').css("background-repeat","no-repeat");
            $('#m23').prop("disabled",false);
            $('#i23').prop("disabled",false);
            $('#f23').prop("disabled",false);
            $('#s23-a').prop("disabled",false);
            $('#s23-b').prop("disabled",false);
            $('#s23-c').prop("disabled",false);
            $('#p23-a').prop("disabled",false);
            $('#p23-b').prop("disabled",false);
            $('#p23-c').prop("disabled",false);
            $('#mg23-a').prop("disabled",false);
            $('#mg23-b').prop("disabled",false);
            $('#mg23-c').prop("disabled",false);
            $('#ps23-a').prop("disabled",false);
            $('#ps23-b').prop("disabled",false);
            $('#ps23-c').prop("disabled",false);

            $('#diente23b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-23b.png') }}')");
            $('#diente23b-a').css("background-position","0 23px");
            $('#diente23b-a').css("background-repeat","no-repeat");
            $('#m23b').prop("disabled",false);
            $('#i23b').prop("disabled",false);
            $('#f23b-a').prop("disabled",false);
            $('#f23b-b').prop("disabled",false);
            $('#s23b-a').prop("disabled",false);
            $('#s23b-b').prop("disabled",false);
            $('#s23b-c').prop("disabled",false);
            $('#p23b-a').prop("disabled",false);
            $('#p23b-b').prop("disabled",false);
            $('#p23b-c').prop("disabled",false);
            $('#mg23b-a').prop("disabled",false);
            $('#mg23b-b').prop("disabled",false);
            $('#mg23b-c').prop("disabled",false);
            $('#ps23b-a').prop("disabled",false);
            $('#ps23b-b').prop("disabled",false);
            $('#ps23b-c').prop("disabled",false);

            $('#furca23').css("display","block");
            $('#furca23-a').css("display","block");
            $('#furca23-b').css("display","block");
            $('#ae23').prop("disabled",false);
            $('#pi23').prop("disabled",false);

            totalDientes++;

            {{--  cargar17a();
            cargar16a();
            cargar15a();
            cargar14a();
            cargar13a();
            cargar12a();
            cargar23a();;
            cargar2();
            cargar3();
            cargar4();  --}}
            getSangrado();
            getPlaca();
        }
    );

    //IMPLANTES
	$('#i23').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f23').css({"background":"#FFFFFF"});
            $('#diente23-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl23.png') }}')");
            $('#diente23-a').css("background-position","-38px -2px");
            $('#diente23-a').css("background-repeat","no-repeat");

            $('#diente23b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-23b.png') }}')");
            $('#diente23b-a').css("background-position","0 23px");
            $('#diente23b-a').css("background-repeat","no-repeat");

            $('#furca23').css("background","none");
            $('#furca23-a').css("background","none");
            $('#furca23-b').css("background","none");
            $('#f23').css("background","none");
            $('#f23b-a').css("background","none");
            $('#f23b-b').css("background","none");

            $("#f23").attr("id","f23desact");
            $("#f23b-a").attr("id","f23b-adesact");
            $("#f23b-b").attr("id","f23b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente23-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-23.png') }}')");
            $('#diente23-a').css("background-position","0 -2px");
            $('#diente23-a').css("background-repeat","no-repeat");

            $('#diente23b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-23b.png') }}')");
            $('#diente23b-a').css("background-position","0 23px");
            $('#diente23b-a').css("background-repeat","no-repeat");

            $('#f23').css("background","#FFFFFF");
            $('#f23b-a').css("background","#FFFFFF");
            $('#f23b-b').css("background","#FFFFFF");

            $("#f23desact").attr("id","f23");
            $("#f23b-adesact").attr("id","f23b-a");
            $("#f23b-bdesact").attr("id","f23b-b");
            $('#d23').trigger('click');
        }
	);

    //FURCA
	$('#f23').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i23').css({"background":"#FFFFFF"});
			$('#furca23').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca23').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca23').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca23').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f23b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca23-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca23-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca23-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca23-a').css("background","none");
        }
    );
    $('#f23b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca23-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca23-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca23-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca23-b').css("background","none");
        }
    );




</script>
