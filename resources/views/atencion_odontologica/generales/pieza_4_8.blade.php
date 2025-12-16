
    {{--  </head>  --}}
    <style>
        #i48{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:48px;
        }
        #diente48-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla5/periodontograma-dientes-arriba-48.png') }}');
            width:75px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i48b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:48px;
        }
        #diente48b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla7/periodontograma-dientes-abajo-48b.png') }}');
            width:75px;
            background-position: 0 23px;
            background-repeat: no-repeat;
        }
        #d48,#i48,#i48b,#f48,,#ae48-a,#ae48-b:hover{
            background: #E6E6E6;
        }
        #i48-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f48{
            width: 95%;
            height: 48px;

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
        #pi48{
            width: 100%;
        }
        #furca48-a,#furca48-b{
            width: 16px;
            height: 16px;
            position: absolute;
        }
        #furca48-a{
            margin-top: 70px;
        }
        #furca48-b{
            margin-top: 80px;
            margin-left: 28px;
        }

        .f48,{
            width: 100%;
            height: 48px;
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
        $pieza48 = $piezas_periodonto->firstWhere('pieza', '48');
        $cuerpo48 = $pieza48 ? $pieza48->cuerpo : [];
        $pronostico48 = $cuerpo48['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl48.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl48b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau48.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla7/implantes/periodontograma-dientes-arriba-tornillo-48b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla7/tachados/periodontograma-dientes-arriba-tachados-48b.png') }}"/>
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
                                Pieza 4.8
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

                                                <div id="visualization48a" style="width: 57px; height: 160px; position: absolute; margin: auto !important; left: 51%; transform: translateX(-51%);"></div>
                                                <div id="diente48-a"><div id="furca48"></div></div>
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
                                                <div class="py-2 border input-dental rounded" id="i48">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m48" name="m48" value="{{ $cuerpo48["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m48');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi48" id="pi48">
                                                    <option value="" {{ $pronostico48 == '' ? 'selected' : '' }}></option>
                                                    <option value="B" {{ $pronostico48 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico48 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico48 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico48 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Furca</label>
                                                <div class="border rounded input-dental pointer w-100" id="f48"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s48-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s48-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s48-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su48-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su48-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su48-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p48-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p48-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p48-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae48" name="ae48" value="{{ $cuerpo48["plataforma"] ?? 0 }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg48-a" name="mg48-a" value="{{ $cuerpo48["vest_altura_mg_a"] ?? 0 }}" onchange="cargar48a();getDefectos();rangoNumeroMargen('mg48-a');cargar48a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg48-b" name="mg48-b" value="{{ $cuerpo48["vest_altura_mg_b"] ?? 0 }}" onchange="cargar48a();getDefectos();rangoNumeroMargen('mg48-b');cargar48a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg48-c" name="mg48-c" value="{{ $cuerpo48["vest_altura_mg_c"] ?? 0 }}" onchange="cargar48a();getDefectos();rangoNumeroMargen('mg48-c');cargar48a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps48-a" name="ps48-a" value="{{ $cuerpo48["vest_psondaje_a"] ?? 0 }}" onchange="cargar48a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps48-b" name="ps48-b" value="{{ $cuerpo48["vest_psondaje_b"] ?? 0 }}" onchange="cargar48a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps48-c" name="ps48-c" value="{{ $cuerpo48["vest_psondaje_c"] ?? 0 }}" onchange="cargar48a();getDefectos();" tabindex="99"/>
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
                                                        <div id="visualization48b" style="width: 63px; height: 160px; position: absolute; margin: auto !important; left: 51%; transform: translateX(-52%);"></div>
                                                        <div id="diente48b-a">
                                                            <div id="furca48-a"></div>
                                                            <div id="furca48-b"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                               <!-- <tr>
                                                    <td class="titulo">P. sondaje</td>
                                                    <td class="borde">
                                                        <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps48b-a" name="ps48b-a" value="0" onchange="cargar48b();getDefectos();" tabindex="145"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps48b-b" name="ps48b-b" value="0" onchange="cargar48b();getDefectos();" tabindex="146"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps48b-c" name="ps48b-c" value="0" onchange="cargar48b();getDefectos();" tabindex="147"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Altura MG</td>
                                                    <td class="borde">
                                                        <div class="row">
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg48b-a" name="mg48b-a" value="0" onchange="cargar48b();getDefectos();rangoNumeroMargen('mg48b-a');cargar48b();" tabindex="193"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  type="number" id="mg48b-b" name="mg48b-b" value="0" onchange="cargar48b();getDefectos();rangoNumeroMargen('mg48b-b');cargar48b();" tabindex="194"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg48b-c" name="mg48b-c" value="0" onchange="cargar48b();getDefectos();rangoNumeroMargen('mg48b-c');cargar48b();" tabindex="195"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Sangrado </td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="s48b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="s48b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="s48b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Supuraci&oacute;n</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="su48b-a"></div>
                                                        <div style="width: 30%;height: 20px;"id="su48b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="su48b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Higiene</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="p48b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="p48b-b"></div>
                                                        <div style="width: 30%;height: 20px;" id="p48b-c"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Furca</td>
                                                    <td class="borde"style="text-align:center">
                                                        <div style="width: 20%;height: 25px;margin-left: 7px" id="f48b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f48b-b">F-2</div>

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
                                        <input class="form-control form-control-xs" type="number" id="ps48b-a" name="ps48b-a" value="{{ $cuerpo48["pala_psondaje_a"] ?? 0 }}" onchange="cargar48b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps48b-b" name="ps48b-a" value="{{ $cuerpo48["pala_psondaje_b"] ?? 0 }}" onchange="cargar48b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps48b-c" name="ps48b-a" value="{{ $cuerpo48["pala_psondaje_c"] ?? 0 }}" onchange="cargar48b();getDefectos();" tabindex="147"//>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg48b-a" name="mg48b-a" value="{{ $cuerpo48["pala_altura_mg_a"] ?? 0 }}" onchange="cargar48b();getDefectos();rangoNumeroMargen('mg48b-a');cargar48b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg48b-b" name="mg48b-b" value="{{ $cuerpo48["pala_altura_mg_b"] ?? 0 }}" onchange="cargar48b();getDefectos();rangoNumeroMargen('mg48b-b');cargar48b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg48b-c" name="mg48b-c" value="{{ $cuerpo48["pala_altura_mg_c"] ?? 0 }}" onchange="cargar48b();getDefectos();rangoNumeroMargen('mg48b-c');cargar48b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s48b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s48b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s48b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental" id="su48b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su48b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su48b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p48b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p48b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p48b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Furca</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <div class="border rounded input-dental pointer w-100" id="f48b-a"></div>
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
                <div class="form-group" id="obs_pieza4.8">
                    <label class="floating-label-activo-sm">Obs. Pieza 4.8</label>
                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 4.8" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_48" id="obs_48" placeholder="Describa observaciones">{{ $cuerpo48["observaciones"] ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza4.8">
                <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('48')"><i class="feather icon-save"></i>  Guardar evaluación 4.8</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar48a();
        cargar48b();

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

    function drawVisualization48a(data48a) {
        // Create and draw the visualization.
        var ac48a = new google.visualization.AreaChart(document.getElementById('visualization48a'));
        ac48a.draw(data48a, {
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

        $('#visualization48a iframe').attr('allowTransparency', 'true');
        $('#visualization48a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar48a(){

        var datoae48=document.getElementById('ae48').value;

        var datomg48a=document.getElementById('mg48-a').value;
        var datomg48b=document.getElementById('mg48-b').value;
        var datomg48c=document.getElementById('mg48-c').value;

        var datops48a=document.getElementById('ps48-a').value;
        var datops48b=document.getElementById('ps48-b').value;
        var datops48c=document.getElementById('ps48-c').value;

        //alert(document.getElementById('ps48-a').value);

        if(datops48a>3){
            document.getElementById('ps48-a').style.color="red";
        }else{
            document.getElementById('ps48-a').style.color="black";
        }
        if(datops48b>3){
            document.getElementById('ps48-b').style.color="red";
        }else{
            document.getElementById('ps48-b').style.color="black";
        }
        if(datops48c>3){
            document.getElementById('ps48-c').style.color="red";
        }else{
            document.getElementById('ps48-c').style.color="black";
        }


        var data48a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg48a)+parseInt(datops48a)),      0-parseInt(datops48a), parseInt(datoae48)],
            ['',    0+(parseInt(datomg48b)+parseInt(datops48b)),      0-parseInt(datops48b), parseInt(datoae48)],
            ['',    0+(parseInt(datomg48c)+parseInt(datops48c)),      0-parseInt(datops48c), parseInt(datoae48)]
        ]);

        drawVisualization48a(data48a);

    }

    function drawVisualization48b(data48b) {

        // Create and draw the visualization.
        var ac48b = new google.visualization.AreaChart(document.getElementById('visualization48b'));
        ac48b.draw(data48b, {
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
        $('#visualization48b iframe').attr('allowTransparency', 'true');
        $('#visualization48b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar48b(){

        var datomg48ba=document.getElementById('mg48b-a').value;
        var datomg48bb=document.getElementById('mg48b-b').value;
        var datomg48bc=document.getElementById('mg48b-c').value;

        var datops48ba=document.getElementById('ps48b-a').value;
        var datops48bb=document.getElementById('ps48b-b').value;
        var datops48bc=document.getElementById('ps48b-c').value;

        if(datops48ba>3){
            document.getElementById('ps48b-a').style.color="red";
        }else{
            document.getElementById('ps48b-a').style.color="black";
        }
        if(datops48bb>3){
            document.getElementById('ps48b-b').style.color="red";
        }else{
            document.getElementById('ps48b-b').style.color="black";
        }
        if(datops48bc>3){
            document.getElementById('ps48b-c').style.color="red";
        }else{
            document.getElementById('ps48b-c').style.color="black";
        }

        var data48b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg48ba)+parseInt(datops48ba)),      0+parseInt(datops48ba)],
            ['',    0-(parseInt(datomg48bb)+parseInt(datops48bb)),      0+parseInt(datops48bb)],
            ['',    0-(parseInt(datomg48bc)+parseInt(datops48bc)),      0+parseInt(datops48bc)]
        ]);

        drawVisualization48b(data48b);

    }

    arrstyle = ["i48","f48","f48b-a","f48b-b","s48-a","s48-b","s48-c","p48-a","p48-b","p48-c","s48b-a","s48b-b","s48b-c","p48b-a","p48b-b","p48b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae48').change(function() {
        if(parseInt(document.getElementById('ae48').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar48a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s48-a').toggle(
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
    $('#s48-b').toggle(
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
    $('#s48-c').toggle(
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

    $('#s48b-a').toggle(
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
    $('#s48b-b').toggle(
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
    $('#s48b-c').toggle(
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
    $('#su48-a').toggle(
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
    $('#su48-b').toggle(
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
    $('#su48-c').toggle(
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

    $('#su48b-a').toggle(
        function () {
            $(this).css({"background":"#f3e848"});
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
    $('#su48b-b').toggle(
        function () {
            $(this).css({"background":"#f3e848"});
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
    $('#su48b-c').toggle(
        function () {
            $(this).css({"background":"#f3e848"});
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
    $('#p48-a').toggle(
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
    $('#p48-b').toggle(
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
    $('#p48-c').toggle(
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
    $('#p48b-a').toggle(
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
    $('#p48b-b').toggle(
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
    $('#p48b-c').toggle(
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
	$('#d48').toggle(
        function () {
            $('#diente48-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau48.png') }}')");
            $('#diente48-a').css("background-position","-36px -13px");
            $('#diente48-a').css("background-repeat","no-repeat");
            $('#m48').prop('disabled', true); // Deshabilita el input con id 'm48'
            $('#i48').prop("disabled",true);
            $('#f48').prop("disabled",true);
            $('#s48-a').prop("disabled",true);
            $('#s48-b').prop("disabled",true);
            $('#s48-c').prop("disabled",true);
            $('#p48-a').prop("disabled",true);
            $('#p48-b').prop("disabled",true);
            $('#p48-c').prop("disabled",true);
            $('#mg48-a').prop("disabled",true);
            $('#mg48-b').prop("disabled",true);
            $('#mg48-c').prop("disabled",true);
            $('#ps48-a').prop("disabled",true);
            $('#ps48-b').prop("disabled",true);
            $('#ps48-c').prop("disabled",true);
            /*$('#furca48').css("background","none");*/
            $('#mg48-a').val('0');
            $('#mg48-b').val('0');
            $('#mg48-c').val('0');
            $('#ps48-a').val('0');
            $('#ps48-b').val('0');
            $('#ps48-c').val('0');

            $('#diente48b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-48b.png') }}')");
            $('#diente48b-a').css("background-position","0 23px");
            $('#diente48b-a').css("background-repeat","no-repeat");
            $('#m48b').prop("disabled",true);
            $('#i48b').prop("disabled",true);
            $('#f48b-a').prop("disabled",true);
            $('#f48b-b').prop("disabled",true);
            $('#s48b-a').prop("disabled",true);
            $('#s48b-b').prop("disabled",true);
            $('#s48b-c').prop("disabled",true);
            $('#p48b-a').prop("disabled",true);
            $('#p48b-b').prop("disabled",true);
            $('#p48b-c').prop("disabled",true);
            $('#mg48b-a').prop("disabled",true);
            $('#mg48b-b').prop("disabled",true);
            $('#mg48b-c').prop("disabled",true);
            $('#ps48b-a').prop("disabled",true);
            $('#ps48b-b').prop("disabled",true);
            $('#ps48b-c').prop("disabled",true);
            $('#mg48b-a').val('0');
            $('#mg48b-b').val('0');
            $('#mg48b-c').val('0');
            $('#ps48b-a').val('0');
            $('#ps48b-b').val('0');
            $('#ps48b-c').val('0');

            $('#furca48').prop("disabled",true);
            $('#furca48-a').prop("disabled",true);
            $('#furca48-b').prop("disabled",true);
            $('#ae48').prop("disabled",true);
            $('#pi48').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar48a();
            cargar48b();

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
            $('#diente48-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-48.png') }}')");
            $('#diente48-a').css("background-position","0 -2px");
            $('#diente48-a').css("background-repeat","no-repeat");
            $('#m48').prop("disabled",false);
            $('#i48').prop("disabled",false);
            $('#f48').prop("disabled",false);
            $('#s48-a').prop("disabled",false);
            $('#s48-b').prop("disabled",false);
            $('#s48-c').prop("disabled",false);
            $('#p48-a').prop("disabled",false);
            $('#p48-b').prop("disabled",false);
            $('#p48-c').prop("disabled",false);
            $('#mg48-a').prop("disabled",false);
            $('#mg48-b').prop("disabled",false);
            $('#mg48-c').prop("disabled",false);
            $('#ps48-a').prop("disabled",false);
            $('#ps48-b').prop("disabled",false);
            $('#ps48-c').prop("disabled",false);

            $('#diente48b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-48b.png') }}')");
            $('#diente48b-a').css("background-position","0 23px");
            $('#diente48b-a').css("background-repeat","no-repeat");
            $('#m48b').prop("disabled",false);
            $('#i48b').prop("disabled",false);
            $('#f48b-a').prop("disabled",false);
            $('#f48b-b').prop("disabled",false);
            $('#s48b-a').prop("disabled",false);
            $('#s48b-b').prop("disabled",false);
            $('#s48b-c').prop("disabled",false);
            $('#p48b-a').prop("disabled",false);
            $('#p48b-b').prop("disabled",false);
            $('#p48b-c').prop("disabled",false);
            $('#mg48b-a').prop("disabled",false);
            $('#mg48b-b').prop("disabled",false);
            $('#mg48b-c').prop("disabled",false);
            $('#ps48b-a').prop("disabled",false);
            $('#ps48b-b').prop("disabled",false);
            $('#ps48b-c').prop("disabled",false);

            $('#furca48').css("display","block");
            $('#furca48-a').css("display","block");
            $('#furca48-b').css("display","block");
            $('#ae48').prop("disabled",false);
            $('#pi48').prop("disabled",false);

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
	$('#i48').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f48').css({"background":"#FFFFFF"});
            $('#diente48-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl48.png') }}')");
            $('#diente48-a').css("background-position","-38px -2px");
            $('#diente48-a').css("background-repeat","no-repeat");

            $('#diente48b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-48b.png') }}')");
            $('#diente48b-a').css("background-position","0 23px");
            $('#diente48b-a').css("background-repeat","no-repeat");

            $('#furca48').css("background","none");
            $('#furca48-a').css("background","none");
            $('#furca48-b').css("background","none");
            $('#f48').css("background","none");
            $('#f48b-a').css("background","none");
            $('#f48b-b').css("background","none");

            $("#f48").attr("id","f48desact");
            $("#f48b-a").attr("id","f48b-adesact");
            $("#f48b-b").attr("id","f48b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente48-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-48.png') }}')");
            $('#diente48-a').css("background-position","0 -2px");
            $('#diente48-a').css("background-repeat","no-repeat");

            $('#diente48b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-48b.png') }}')");
            $('#diente48b-a').css("background-position","0 23px");
            $('#diente48b-a').css("background-repeat","no-repeat");

            $('#f48').css("background","#FFFFFF");
            $('#f48b-a').css("background","#FFFFFF");
            $('#f48b-b').css("background","#FFFFFF");

            $("#f48desact").attr("id","f48");
            $("#f48b-adesact").attr("id","f48b-a");
            $("#f48b-bdesact").attr("id","f48b-b");
            $('#d48').trigger('click');
        }
	);

    //FURCA
	$('#f48').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i48').css({"background":"#FFFFFF"});
			$('#furca48').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca48').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca48').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca48').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f48b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca48-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca48-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca48-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca48-a').css("background","none");
        }
    );
    $('#f48b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca48-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca48-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca48-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca48-b').css("background","none");
        }
    );




</script>



