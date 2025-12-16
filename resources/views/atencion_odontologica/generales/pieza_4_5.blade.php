
    {{--  </head>  --}}
    <style>
        #i45{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente45-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla5/periodontograma-dientes-arriba-45.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i45b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente45b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla7/periodontograma-dientes-abajo-45b.png') }}');
            width:54px;
            background-position: 0 23px;
            background-repeat: no-repeat;
        }
        #d45,#i45,#i45b,#f45,,#ae45-a,#ae45-b:hover{
            background: #E6E6E6;
        }
        #i45-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f45{
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
        #pi45{
            width: 100%;
        }
        #furca45-a,#furca45-b{
            width: 16px;
            height: 16px;
            position: absolute;
        }
        #furca45-a{
            margin-top: 70px;
        }
        #furca45-b{
            margin-top: 80px;
            margin-left: 28px;
        }

        .f45,{
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
        $pieza45 = $piezas_periodonto->firstWhere('pieza', '45');
        $cuerpo45 = $pieza45 ? $pieza45->cuerpo : [];
        $pronostico45 = $cuerpo45['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl45.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau45.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-45b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-45b.png') }}"/>
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
                                Pieza 4.5
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

                                                <div id="visualization45a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente45-a"><div id="furca45"></div></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d45">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i45">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m45" name="m45" value="{{ $cuerpo44["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m45');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi45" id="pi45">
                                                    <option value="" {{ $pronostico45 == '' ? 'selected' : '' }}></option>
                                                    <option value="B" {{ $pronostico45 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico45 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico45 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico45 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Furca</label>
                                                <div class="border rounded input-dental pointer w-100" id="f45"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s45-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s45-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s45-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su45-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su45-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su45-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p45-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p45-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p45-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae45" name="ae45" value="{{ $cuerpo45["plataforma"] ?? 0 }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg45-a" name="mg45-a" value="{{ $cuerpo45["vest_altura_mg_a"] ?? 0 }}" onchange="cargar45a();getDefectos();rangoNumeroMargen('mg45-a');cargar45a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg45-b" name="mg45-b" value="{{ $cuerpo45["vest_altura_mg_b"] ?? 0 }}" onchange="cargar45a();getDefectos();rangoNumeroMargen('mg45-b');cargar45a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg45-c" name="mg45-c" value="{{ $cuerpo45["vest_altura_mg_c"] ?? 0 }}" onchange="cargar45a();getDefectos();rangoNumeroMargen('mg45-c');cargar45a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps45-a" name="ps45-a" value="{{ $cuerpo45["vest_psondaje_a"] ?? 0 }}" onchange="cargar45a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps45-b" name="ps45-b" value="{{ $cuerpo45["vest_psondaje_b"] ?? 0 }}" onchange="cargar45a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps45-c" name="ps45-c" value="{{ $cuerpo45["vest_psondaje_c"] ?? 0 }}" onchange="cargar45a();getDefectos();" tabindex="99"/>
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
                                                        <div id="visualization45b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente45b-a">
                                                            <div id="furca45-a"></div>
                                                            <div id="furca45-b"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                               <!-- <tr>
                                                    <td class="titulo">P. sondaje</td>
                                                    <td class="borde">
                                                        <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps45b-a" name="ps45b-a" value="0" onchange="cargar45b();getDefectos();" tabindex="145"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps45b-b" name="ps45b-b" value="0" onchange="cargar45b();getDefectos();" tabindex="146"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps45b-c" name="ps45b-c" value="0" onchange="cargar45b();getDefectos();" tabindex="147"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Altura MG</td>
                                                    <td class="borde">
                                                        <div class="row">
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg45b-a" name="mg45b-a" value="0" onchange="cargar45b();getDefectos();rangoNumeroMargen('mg45b-a');cargar45b();" tabindex="193"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  type="number" id="mg45b-b" name="mg45b-b" value="0" onchange="cargar45b();getDefectos();rangoNumeroMargen('mg45b-b');cargar45b();" tabindex="194"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg45b-c" name="mg45b-c" value="0" onchange="cargar45b();getDefectos();rangoNumeroMargen('mg45b-c');cargar45b();" tabindex="195"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Sangrado </td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="s45b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="s45b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="s45b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Supuraci&oacute;n</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="su45b-a"></div>
                                                        <div style="width: 30%;height: 20px;"id="su45b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="su45b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Higiene</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="p45b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="p45b-b"></div>
                                                        <div style="width: 30%;height: 20px;" id="p45b-c"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Furca</td>
                                                    <td class="borde"style="text-align:center">
                                                        <div style="width: 20%;height: 25px;margin-left: 7px" id="f45b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f45b-b">F-2</div>

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
                                        <input class="form-control form-control-xs" type="number" id="ps45b-a" name="ps45b-a" value="{{ $cuerpo45["pala_psondaje_a"] ?? 0 }}" onchange="cargar45b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps45b-b" name="ps45b-a" value="{{ $cuerpo45["pala_psondaje_b"] ?? 0 }}" onchange="cargar45b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps45b-c" name="ps45b-a" value="{{ $cuerpo45["pala_psondaje_c"] ?? 0 }}" onchange="cargar45b();getDefectos();" tabindex="147"//>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg45b-a" name="mg45b-a" value="{{ $cuerpo45["pala_altura_mg_a"] ?? 0 }}" onchange="cargar45b();getDefectos();rangoNumeroMargen('mg45b-a');cargar45b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg45b-b" name="mg45b-b" value="{{ $cuerpo45["pala_altura_mg_b"] ?? 0 }}" onchange="cargar45b();getDefectos();rangoNumeroMargen('mg45b-b');cargar45b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg45b-c" name="mg45b-c" value="{{ $cuerpo45["pala_altura_mg_c"] ?? 0 }}" onchange="cargar45b();getDefectos();rangoNumeroMargen('mg45b-c');cargar45b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s45b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s45b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s45b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental" id="su45b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su45b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su45b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p45b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p45b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p45b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Furca</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <div class="border rounded input-dental pointer w-100" id="f45b-a"></div>
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
                <div class="form-group" id="obs_pieza4.5">
                    <label class="floating-label-activo-sm">Obs. Pieza 4.5</label>
                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 4.5" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_45" id="obs_45" placeholder="Describa observaciones">{{ $cuerpo45["observaciones"] ?? '' }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza4.5">
                <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('45')"><i class="feather icon-save"></i>  Guardar evaluación 4.5</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar45a();
        cargar45b();

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

    function drawVisualization45a(data45a) {
        // Create and draw the visualization.
        var ac45a = new google.visualization.AreaChart(document.getElementById('visualization45a'));
        ac45a.draw(data45a, {
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

        $('#visualization45a iframe').attr('allowTransparency', 'true');
        $('#visualization45a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar45a(){

        var datoae45=document.getElementById('ae45').value;

        var datomg45a=document.getElementById('mg45-a').value;
        var datomg45b=document.getElementById('mg45-b').value;
        var datomg45c=document.getElementById('mg45-c').value;

        var datops45a=document.getElementById('ps45-a').value;
        var datops45b=document.getElementById('ps45-b').value;
        var datops45c=document.getElementById('ps45-c').value;

        //alert(document.getElementById('ps45-a').value);

        if(datops45a>3){
            document.getElementById('ps45-a').style.color="red";
        }else{
            document.getElementById('ps45-a').style.color="black";
        }
        if(datops45b>3){
            document.getElementById('ps45-b').style.color="red";
        }else{
            document.getElementById('ps45-b').style.color="black";
        }
        if(datops45c>3){
            document.getElementById('ps45-c').style.color="red";
        }else{
            document.getElementById('ps45-c').style.color="black";
        }


        var data45a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg45a)+parseInt(datops45a)),      0-parseInt(datops45a), parseInt(datoae45)],
            ['',    0+(parseInt(datomg45b)+parseInt(datops45b)),      0-parseInt(datops45b), parseInt(datoae45)],
            ['',    0+(parseInt(datomg45c)+parseInt(datops45c)),      0-parseInt(datops45c), parseInt(datoae45)]
        ]);

        drawVisualization45a(data45a);

    }

    function drawVisualization45b(data45b) {

        // Create and draw the visualization.
        var ac45b = new google.visualization.AreaChart(document.getElementById('visualization45b'));
        ac45b.draw(data45b, {
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
        $('#visualization45b iframe').attr('allowTransparency', 'true');
        $('#visualization45b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar45b(){

        var datomg45ba=document.getElementById('mg45b-a').value;
        var datomg45bb=document.getElementById('mg45b-b').value;
        var datomg45bc=document.getElementById('mg45b-c').value;

        var datops45ba=document.getElementById('ps45b-a').value;
        var datops45bb=document.getElementById('ps45b-b').value;
        var datops45bc=document.getElementById('ps45b-c').value;

        if(datops45ba>3){
            document.getElementById('ps45b-a').style.color="red";
        }else{
            document.getElementById('ps45b-a').style.color="black";
        }
        if(datops45bb>3){
            document.getElementById('ps45b-b').style.color="red";
        }else{
            document.getElementById('ps45b-b').style.color="black";
        }
        if(datops45bc>3){
            document.getElementById('ps45b-c').style.color="red";
        }else{
            document.getElementById('ps45b-c').style.color="black";
        }

        var data45b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg45ba)+parseInt(datops45ba)),      0+parseInt(datops45ba)],
            ['',    0-(parseInt(datomg45bb)+parseInt(datops45bb)),      0+parseInt(datops45bb)],
            ['',    0-(parseInt(datomg45bc)+parseInt(datops45bc)),      0+parseInt(datops45bc)]
        ]);

        drawVisualization45b(data45b);

    }

    arrstyle = ["i45","f45","f45b-a","f45b-b","s45-a","s45-b","s45-c","p45-a","p45-b","p45-c","s45b-a","s45b-b","s45b-c","p45b-a","p45b-b","p45b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae45').change(function() {
        if(parseInt(document.getElementById('ae45').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar45a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s45-a').toggle(
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
    $('#s45-b').toggle(
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
    $('#s45-c').toggle(
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

    $('#s45b-a').toggle(
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
    $('#s45b-b').toggle(
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
    $('#s45b-c').toggle(
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
    $('#su45-a').toggle(
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
    $('#su45-b').toggle(
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
    $('#su45-c').toggle(
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

    $('#su45b-a').toggle(
        function () {
            $(this).css({"background":"#f3e845"});
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
    $('#su45b-b').toggle(
        function () {
            $(this).css({"background":"#f3e845"});
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
    $('#su45b-c').toggle(
        function () {
            $(this).css({"background":"#f3e845"});
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
    $('#p45-a').toggle(
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
    $('#p45-b').toggle(
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
    $('#p45-c').toggle(
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
    $('#p45b-a').toggle(
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
    $('#p45b-b').toggle(
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
    $('#p45b-c').toggle(
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
	$('#d45').toggle(
        function () {
            $('#diente45-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau45.png') }}')");
            $('#diente45-a').css("background-position","-36px -13px");
            $('#diente45-a').css("background-repeat","no-repeat");
            $('#m45').prop('disabled', true); // Deshabilita el input con id 'm45'
            $('#i45').prop("disabled",true);
            $('#f45').prop("disabled",true);
            $('#s45-a').prop("disabled",true);
            $('#s45-b').prop("disabled",true);
            $('#s45-c').prop("disabled",true);
            $('#p45-a').prop("disabled",true);
            $('#p45-b').prop("disabled",true);
            $('#p45-c').prop("disabled",true);
            $('#mg45-a').prop("disabled",true);
            $('#mg45-b').prop("disabled",true);
            $('#mg45-c').prop("disabled",true);
            $('#ps45-a').prop("disabled",true);
            $('#ps45-b').prop("disabled",true);
            $('#ps45-c').prop("disabled",true);
            /*$('#furca45').css("background","none");*/
            $('#mg45-a').val('0');
            $('#mg45-b').val('0');
            $('#mg45-c').val('0');
            $('#ps45-a').val('0');
            $('#ps45-b').val('0');
            $('#ps45-c').val('0');

            $('#diente45b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-45b.png') }}')");
            $('#diente45b-a').css("background-position","0 23px");
            $('#diente45b-a').css("background-repeat","no-repeat");
            $('#m45b').prop("disabled",true);
            $('#i45b').prop("disabled",true);
            $('#f45b-a').prop("disabled",true);
            $('#f45b-b').prop("disabled",true);
            $('#s45b-a').prop("disabled",true);
            $('#s45b-b').prop("disabled",true);
            $('#s45b-c').prop("disabled",true);
            $('#p45b-a').prop("disabled",true);
            $('#p45b-b').prop("disabled",true);
            $('#p45b-c').prop("disabled",true);
            $('#mg45b-a').prop("disabled",true);
            $('#mg45b-b').prop("disabled",true);
            $('#mg45b-c').prop("disabled",true);
            $('#ps45b-a').prop("disabled",true);
            $('#ps45b-b').prop("disabled",true);
            $('#ps45b-c').prop("disabled",true);
            $('#mg45b-a').val('0');
            $('#mg45b-b').val('0');
            $('#mg45b-c').val('0');
            $('#ps45b-a').val('0');
            $('#ps45b-b').val('0');
            $('#ps45b-c').val('0');

            $('#furca45').prop("disabled",true);
            $('#furca45-a').prop("disabled",true);
            $('#furca45-b').prop("disabled",true);
            $('#ae45').prop("disabled",true);
            $('#pi45').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar45a();
            cargar45b();

            {{--  cargar17a();
            cargar16a();
            cargar45a();
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
            $('#diente45-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-45.png') }}')");
            $('#diente45-a').css("background-position","0 -2px");
            $('#diente45-a').css("background-repeat","no-repeat");
            $('#m45').prop("disabled",false);
            $('#i45').prop("disabled",false);
            $('#f45').prop("disabled",false);
            $('#s45-a').prop("disabled",false);
            $('#s45-b').prop("disabled",false);
            $('#s45-c').prop("disabled",false);
            $('#p45-a').prop("disabled",false);
            $('#p45-b').prop("disabled",false);
            $('#p45-c').prop("disabled",false);
            $('#mg45-a').prop("disabled",false);
            $('#mg45-b').prop("disabled",false);
            $('#mg45-c').prop("disabled",false);
            $('#ps45-a').prop("disabled",false);
            $('#ps45-b').prop("disabled",false);
            $('#ps45-c').prop("disabled",false);

            $('#diente45b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-45b.png') }}')");
            $('#diente45b-a').css("background-position","0 23px");
            $('#diente45b-a').css("background-repeat","no-repeat");
            $('#m45b').prop("disabled",false);
            $('#i45b').prop("disabled",false);
            $('#f45b-a').prop("disabled",false);
            $('#f45b-b').prop("disabled",false);
            $('#s45b-a').prop("disabled",false);
            $('#s45b-b').prop("disabled",false);
            $('#s45b-c').prop("disabled",false);
            $('#p45b-a').prop("disabled",false);
            $('#p45b-b').prop("disabled",false);
            $('#p45b-c').prop("disabled",false);
            $('#mg45b-a').prop("disabled",false);
            $('#mg45b-b').prop("disabled",false);
            $('#mg45b-c').prop("disabled",false);
            $('#ps45b-a').prop("disabled",false);
            $('#ps45b-b').prop("disabled",false);
            $('#ps45b-c').prop("disabled",false);

            $('#furca45').css("display","block");
            $('#furca45-a').css("display","block");
            $('#furca45-b').css("display","block");
            $('#ae45').prop("disabled",false);
            $('#pi45').prop("disabled",false);

            totalDientes++;

            {{--  cargar17a();
            cargar16a();
            cargar45a();
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
	$('#i45').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f45').css({"background":"#FFFFFF"});
            $('#diente45-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl45.png') }}')");
            $('#diente45-a').css("background-position","-38px -2px");
            $('#diente45-a').css("background-repeat","no-repeat");

            $('#diente45b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-45b.png') }}')");
            $('#diente45b-a').css("background-position","0 23px");
            $('#diente45b-a').css("background-repeat","no-repeat");

            $('#furca45').css("background","none");
            $('#furca45-a').css("background","none");
            $('#furca45-b').css("background","none");
            $('#f45').css("background","none");
            $('#f45b-a').css("background","none");
            $('#f45b-b').css("background","none");

            $("#f45").attr("id","f45desact");
            $("#f45b-a").attr("id","f45b-adesact");
            $("#f45b-b").attr("id","f45b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente45-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-45.png') }}')");
            $('#diente45-a').css("background-position","0 -2px");
            $('#diente45-a').css("background-repeat","no-repeat");

            $('#diente45b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-45b.png') }}')");
            $('#diente45b-a').css("background-position","0 23px");
            $('#diente45b-a').css("background-repeat","no-repeat");

            $('#f45').css("background","#FFFFFF");
            $('#f45b-a').css("background","#FFFFFF");
            $('#f45b-b').css("background","#FFFFFF");

            $("#f45desact").attr("id","f45");
            $("#f45b-adesact").attr("id","f45b-a");
            $("#f45b-bdesact").attr("id","f45b-b");
            $('#d45').trigger('click');
        }
	);

    //FURCA
	$('#f45').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i45').css({"background":"#FFFFFF"});
			$('#furca45').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca45').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca45').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca45').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f45b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca45-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca45-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca45-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca45-a').css("background","none");
        }
    );
    $('#f45b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca45-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca45-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca45-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca45-b').css("background","none");
        }
    );




</script>



