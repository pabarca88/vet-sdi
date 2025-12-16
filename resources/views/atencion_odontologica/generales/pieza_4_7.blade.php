
    {{--  </head>  --}}
    <style>
        #i47{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente47-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla5/periodontograma-dientes-arriba-47.png') }}');
            width:62px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i47b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente47b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla7/periodontograma-dientes-abajo-47b.png') }}');
            width:65px;
            background-position: 0 23px;
            background-repeat: no-repeat;
        }
        #d47,#i47,#i47b,#f47,,#ae47-a,#ae47-b:hover{
            background: #E6E6E6;
        }
        #i47-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f47{
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
        #pi47{
            width: 100%;
        }
        #furca47-a,#furca47-b{
            width: 16px;
            height: 16px;
            position: absolute;
        }
        #furca47-a{
            margin-top: 70px;
        }
        #furca47-b{
            margin-top: 80px;
            margin-left: 28px;
        }

        .f47,{
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
        $pieza47 = $piezas_periodonto->firstWhere('pieza', '47');
        $cuerpo47 = $pieza47 ? $pieza47->cuerpo : [];
        $pronostico47 = $cuerpo47['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl47.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau47.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-47b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-47b.png') }}"/>
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
                                Pieza 4.7
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

                                                <div id="visualization47a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente47-a"><div id="furca47"></div></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d47">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i47">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m47" name="m47" value="{{ $cuerpo47["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m47');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi47" id="pi47">
                                                    <option value="" {{ $pronostico47 == '' ? 'selected' : '' }}></option>
                                                    <option value="B" {{ $pronostico47 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico47 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico47 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico47 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Furca</label>
                                                <div class="border rounded input-dental pointer w-100" id="f47"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s47-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s47-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s47-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su47-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su47-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su47-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p47-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p47-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p47-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae47" name="ae47" value="{{ $cuerpo47["plataforma"] ?? 0 }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg47-a" name="mg47-a" value="{{ $cuerpo47["vest_altura_mg_a"] ?? 0 }}" onchange="cargar47a();getDefectos();rangoNumeroMargen('mg47-a');cargar47a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg47-b" name="mg47-b" value="{{ $cuerpo47["vest_altura_mg_b"] ?? 0 }}" onchange="cargar47a();getDefectos();rangoNumeroMargen('mg47-b');cargar47a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg47-c" name="mg47-c" value="{{ $cuerpo47["vest_altura_mg_c"] ?? 0 }}" onchange="cargar47a();getDefectos();rangoNumeroMargen('mg47-c');cargar47a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps47-a" name="ps47-a" value="{{ $cuerpo47["vest_psondaje_a"] ?? 0 }}" onchange="cargar47a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps47-b" name="ps47-b" value="{{ $cuerpo47["vest_psondaje_b"] ?? 0 }}" onchange="cargar47a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps47-c" name="ps47-c" value="{{ $cuerpo47["vest_psondaje_c"] ?? 0 }}" onchange="cargar47a();getDefectos();" tabindex="99"/>
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
                                                        <div id="visualization47b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente47b-a">
                                                            <div id="furca47-a"></div>
                                                            <div id="furca47-b"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                               <!-- <tr>
                                                    <td class="titulo">P. sondaje</td>
                                                    <td class="borde">
                                                        <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps47b-a" name="ps47b-a" value="0" onchange="cargar47b();getDefectos();" tabindex="145"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps47b-b" name="ps47b-b" value="0" onchange="cargar47b();getDefectos();" tabindex="146"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps47b-c" name="ps47b-c" value="0" onchange="cargar47b();getDefectos();" tabindex="147"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Altura MG</td>
                                                    <td class="borde">
                                                        <div class="row">
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg47b-a" name="mg47b-a" value="0" onchange="cargar47b();getDefectos();rangoNumeroMargen('mg47b-a');cargar47b();" tabindex="193"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  type="number" id="mg47b-b" name="mg47b-b" value="0" onchange="cargar47b();getDefectos();rangoNumeroMargen('mg47b-b');cargar47b();" tabindex="194"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg47b-c" name="mg47b-c" value="0" onchange="cargar47b();getDefectos();rangoNumeroMargen('mg47b-c');cargar47b();" tabindex="195"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Sangrado </td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="s47b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="s47b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="s47b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Supuraci&oacute;n</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="su47b-a"></div>
                                                        <div style="width: 30%;height: 20px;"id="su47b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="su47b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Higiene</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="p47b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="p47b-b"></div>
                                                        <div style="width: 30%;height: 20px;" id="p47b-c"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Furca123</td>
                                                    <td class="borde"style="text-align:center">
                                                        <div style="width: 20%;height: 25px;margin-left: 7px" id="f47b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f47b-b">F-2</div>

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
                                        <input class="form-control form-control-xs" type="number" id="ps47b-a" name="ps47b-a" value="{{ $cuerpo47["pala_psondaje_a"] ?? 0 }}" onchange="cargar47b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps47b-b" name="ps47b-a" value="{{ $cuerpo47["pala_psondaje_b"] ?? 0 }}" onchange="cargar47b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps47b-c" name="ps47b-a" value="{{ $cuerpo47["pala_psondaje_c"] ?? 0 }}" onchange="cargar47b();getDefectos();" tabindex="147"//>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg47b-a" name="mg47b-a" value="{{ $cuerpo47["pala_altura_mg_a"] ?? 0 }}" onchange="cargar47b();getDefectos();rangoNumeroMargen('mg47b-a');cargar47b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg47b-b" name="mg47b-b" value="{{ $cuerpo47["pala_altura_mg_b"] ?? 0 }}" onchange="cargar47b();getDefectos();rangoNumeroMargen('mg47b-b');cargar47b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg47b-c" name="mg47b-c" value="{{ $cuerpo47["pala_altura_mg_c"] ?? 0 }}" onchange="cargar47b();getDefectos();rangoNumeroMargen('mg47b-c');cargar47b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s47b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s47b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s47b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental" id="su47b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su47b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su47b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p47b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p47b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p47b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-2">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Furca 1</h6>
                                    </div>

                                    <div class="col-sm-12 col-md-2">
                                        <div class="border rounded input-dental pointer w-100" id="f47b-a"></div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Furca 2</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <div class="border rounded input-dental pointer w-100" id="f47b-b"></div>
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
                <div class="form-group" id="obs_pieza4.7">
                    <label class="floating-label-activo-sm">Obs. Pieza 4.7</label>
                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 4.7" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_47" id="obs_47" placeholder="Describa observaciones">{{ $cuerpo47["observaciones"] ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza4.7">
                <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('47')"><i class="feather icon-save"></i>  Guardar evaluación 4.7</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar47a();
        cargar47b();

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

    function drawVisualization47a(data47a) {
        // Create and draw the visualization.
        var ac47a = new google.visualization.AreaChart(document.getElementById('visualization47a'));
        ac47a.draw(data47a, {
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

        $('#visualization47a iframe').attr('allowTransparency', 'true');
        $('#visualization47a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar47a(){

        var datoae47=document.getElementById('ae47').value;

        var datomg47a=document.getElementById('mg47-a').value;
        var datomg47b=document.getElementById('mg47-b').value;
        var datomg47c=document.getElementById('mg47-c').value;

        var datops47a=document.getElementById('ps47-a').value;
        var datops47b=document.getElementById('ps47-b').value;
        var datops47c=document.getElementById('ps47-c').value;

        //alert(document.getElementById('ps47-a').value);

        if(datops47a>3){
            document.getElementById('ps47-a').style.color="red";
        }else{
            document.getElementById('ps47-a').style.color="black";
        }
        if(datops47b>3){
            document.getElementById('ps47-b').style.color="red";
        }else{
            document.getElementById('ps47-b').style.color="black";
        }
        if(datops47c>3){
            document.getElementById('ps47-c').style.color="red";
        }else{
            document.getElementById('ps47-c').style.color="black";
        }


        var data47a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg47a)+parseInt(datops47a)),      0-parseInt(datops47a), parseInt(datoae47)],
            ['',    0+(parseInt(datomg47b)+parseInt(datops47b)),      0-parseInt(datops47b), parseInt(datoae47)],
            ['',    0+(parseInt(datomg47c)+parseInt(datops47c)),      0-parseInt(datops47c), parseInt(datoae47)]
        ]);

        drawVisualization47a(data47a);

    }

    function drawVisualization47b(data47b) {

        // Create and draw the visualization.
        var ac47b = new google.visualization.AreaChart(document.getElementById('visualization47b'));
        ac47b.draw(data47b, {
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
        $('#visualization47b iframe').attr('allowTransparency', 'true');
        $('#visualization47b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar47b(){

        var datomg47ba=document.getElementById('mg47b-a').value;
        var datomg47bb=document.getElementById('mg47b-b').value;
        var datomg47bc=document.getElementById('mg47b-c').value;

        var datops47ba=document.getElementById('ps47b-a').value;
        var datops47bb=document.getElementById('ps47b-b').value;
        var datops47bc=document.getElementById('ps47b-c').value;

        if(datops47ba>3){
            document.getElementById('ps47b-a').style.color="red";
        }else{
            document.getElementById('ps47b-a').style.color="black";
        }
        if(datops47bb>3){
            document.getElementById('ps47b-b').style.color="red";
        }else{
            document.getElementById('ps47b-b').style.color="black";
        }
        if(datops47bc>3){
            document.getElementById('ps47b-c').style.color="red";
        }else{
            document.getElementById('ps47b-c').style.color="black";
        }

        var data47b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg47ba)+parseInt(datops47ba)),      0+parseInt(datops47ba)],
            ['',    0-(parseInt(datomg47bb)+parseInt(datops47bb)),      0+parseInt(datops47bb)],
            ['',    0-(parseInt(datomg47bc)+parseInt(datops47bc)),      0+parseInt(datops47bc)]
        ]);

        drawVisualization47b(data47b);

    }

    arrstyle = ["i47","f47","f47b-a","f47b-b","s47-a","s47-b","s47-c","p47-a","p47-b","p47-c","s47b-a","s47b-b","s47b-c","p47b-a","p47b-b","p47b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae47').change(function() {
        if(parseInt(document.getElementById('ae47').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar47a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s47-a').toggle(
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
    $('#s47-b').toggle(
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
    $('#s47-c').toggle(
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

    $('#s47b-a').toggle(
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
    $('#s47b-b').toggle(
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
    $('#s47b-c').toggle(
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
    $('#su47-a').toggle(
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
    $('#su47-b').toggle(
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
    $('#su47-c').toggle(
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

    $('#su47b-a').toggle(
        function () {
            $(this).css({"background":"#f3e847"});
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
    $('#su47b-b').toggle(
        function () {
            $(this).css({"background":"#f3e847"});
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
    $('#su47b-c').toggle(
        function () {
            $(this).css({"background":"#f3e847"});
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
    $('#p47-a').toggle(
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
    $('#p47-b').toggle(
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
    $('#p47-c').toggle(
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
    $('#p47b-a').toggle(
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
    $('#p47b-b').toggle(
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
    $('#p47b-c').toggle(
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
	$('#d47').toggle(
        function () {
            $('#diente47-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau47.png') }}')");
            $('#diente47-a').css("background-position","-36px -13px");
            $('#diente47-a').css("background-repeat","no-repeat");
            $('#m47').prop('disabled', true); // Deshabilita el input con id 'm47'
            $('#i47').prop("disabled",true);
            $('#f47').prop("disabled",true);
            $('#s47-a').prop("disabled",true);
            $('#s47-b').prop("disabled",true);
            $('#s47-c').prop("disabled",true);
            $('#p47-a').prop("disabled",true);
            $('#p47-b').prop("disabled",true);
            $('#p47-c').prop("disabled",true);
            $('#mg47-a').prop("disabled",true);
            $('#mg47-b').prop("disabled",true);
            $('#mg47-c').prop("disabled",true);
            $('#ps47-a').prop("disabled",true);
            $('#ps47-b').prop("disabled",true);
            $('#ps47-c').prop("disabled",true);
            /*$('#furca47').css("background","none");*/
            $('#mg47-a').val('0');
            $('#mg47-b').val('0');
            $('#mg47-c').val('0');
            $('#ps47-a').val('0');
            $('#ps47-b').val('0');
            $('#ps47-c').val('0');

            $('#diente47b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-47b.png') }}')");
            $('#diente47b-a').css("background-position","0 23px");
            $('#diente47b-a').css("background-repeat","no-repeat");
            $('#m47b').prop("disabled",true);
            $('#i47b').prop("disabled",true);
            $('#f47b-a').prop("disabled",true);
            $('#f47b-b').prop("disabled",true);
            $('#s47b-a').prop("disabled",true);
            $('#s47b-b').prop("disabled",true);
            $('#s47b-c').prop("disabled",true);
            $('#p47b-a').prop("disabled",true);
            $('#p47b-b').prop("disabled",true);
            $('#p47b-c').prop("disabled",true);
            $('#mg47b-a').prop("disabled",true);
            $('#mg47b-b').prop("disabled",true);
            $('#mg47b-c').prop("disabled",true);
            $('#ps47b-a').prop("disabled",true);
            $('#ps47b-b').prop("disabled",true);
            $('#ps47b-c').prop("disabled",true);
            $('#mg47b-a').val('0');
            $('#mg47b-b').val('0');
            $('#mg47b-c').val('0');
            $('#ps47b-a').val('0');
            $('#ps47b-b').val('0');
            $('#ps47b-c').val('0');

            $('#furca47').prop("disabled",true);
            $('#furca47-a').prop("disabled",true);
            $('#furca47-b').prop("disabled",true);
            $('#ae47').prop("disabled",true);
            $('#pi47').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar47a();
            cargar47b();

            {{--  cargar47a();
            cargar47a();
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
            $('#diente47-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-47.png') }}')");
            $('#diente47-a').css("background-position","0 -2px");
            $('#diente47-a').css("background-repeat","no-repeat");
            $('#m47').prop("disabled",false);
            $('#i47').prop("disabled",false);
            $('#f47').prop("disabled",false);
            $('#s47-a').prop("disabled",false);
            $('#s47-b').prop("disabled",false);
            $('#s47-c').prop("disabled",false);
            $('#p47-a').prop("disabled",false);
            $('#p47-b').prop("disabled",false);
            $('#p47-c').prop("disabled",false);
            $('#mg47-a').prop("disabled",false);
            $('#mg47-b').prop("disabled",false);
            $('#mg47-c').prop("disabled",false);
            $('#ps47-a').prop("disabled",false);
            $('#ps47-b').prop("disabled",false);
            $('#ps47-c').prop("disabled",false);

            $('#diente47b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-47b.png') }}')");
            $('#diente47b-a').css("background-position","0 23px");
            $('#diente47b-a').css("background-repeat","no-repeat");
            $('#m47b').prop("disabled",false);
            $('#i47b').prop("disabled",false);
            $('#f47b-a').prop("disabled",false);
            $('#f47b-b').prop("disabled",false);
            $('#s47b-a').prop("disabled",false);
            $('#s47b-b').prop("disabled",false);
            $('#s47b-c').prop("disabled",false);
            $('#p47b-a').prop("disabled",false);
            $('#p47b-b').prop("disabled",false);
            $('#p47b-c').prop("disabled",false);
            $('#mg47b-a').prop("disabled",false);
            $('#mg47b-b').prop("disabled",false);
            $('#mg47b-c').prop("disabled",false);
            $('#ps47b-a').prop("disabled",false);
            $('#ps47b-b').prop("disabled",false);
            $('#ps47b-c').prop("disabled",false);

            $('#furca47').css("display","block");
            $('#furca47-a').css("display","block");
            $('#furca47-b').css("display","block");
            $('#ae47').prop("disabled",false);
            $('#pi47').prop("disabled",false);

            totalDientes++;

            {{--  cargar47a();
            cargar47a();
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
	$('#i47').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f47').css({"background":"#FFFFFF"});
            $('#diente47-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl47.png') }}')");
            $('#diente47-a').css("background-position","-38px -2px");
            $('#diente47-a').css("background-repeat","no-repeat");

            $('#diente47b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-47b.png') }}')");
            $('#diente47b-a').css("background-position","0 23px");
            $('#diente47b-a').css("background-repeat","no-repeat");

            $('#furca47').css("background","none");
            $('#furca47-a').css("background","none");
            $('#furca47-b').css("background","none");
            $('#f47').css("background","none");
            $('#f47b-a').css("background","none");
            $('#f47b-b').css("background","none");

            $("#f47").attr("id","f47desact");
            $("#f47b-a").attr("id","f47b-adesact");
            $("#f47b-b").attr("id","f47b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente47-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-47.png') }}')");
            $('#diente47-a').css("background-position","0 -2px");
            $('#diente47-a').css("background-repeat","no-repeat");

            $('#diente47b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-47b.png') }}')");
            $('#diente47b-a').css("background-position","0 23px");
            $('#diente47b-a').css("background-repeat","no-repeat");

            $('#f47').css("background","#FFFFFF");
            $('#f47b-a').css("background","#FFFFFF");
            $('#f47b-b').css("background","#FFFFFF");

            $("#f47desact").attr("id","f47");
            $("#f47b-adesact").attr("id","f47b-a");
            $("#f47b-bdesact").attr("id","f47b-b");
            $('#d47').trigger('click');
        }
	);

    //FURCA
	$('#f47').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i47').css({"background":"#FFFFFF"});
			$('#furca47').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca47').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca47').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca47').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f47b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca47-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca47-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca47-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca47-a').css("background","none");
        }
    );
    $('#f47b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca47-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca47-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca47-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca47-b').css("background","none");
        }
    );




</script>



