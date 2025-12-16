
    {{--  </head>  --}}
    <style>
        #i15{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente15-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-15.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i15b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente15b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-15b.png') }}');
            width:54px;
            background-position: 0 23px;
            background-repeat: no-repeat;
        }
        #d15,#i15,#i15b,#f15,,#ae15-a,#ae15-b:hover{
            background: #E6E6E6;
        }
        #i15-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f15{
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
        #pi15{
            width: 100%;
        }
        #furca15-a,#furca15-b{
            width: 16px;
            height: 16px;
            position: absolute;
        }
        #furca15-a{
            margin-top: 70px;
        }
        #furca15-b{
            margin-top: 80px;
            margin-left: 28px;
        }

        .f15,{
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
    $pieza15 = $piezas_periodonto->firstWhere('pieza', '15');
    $cuerpo15 = $pieza15 ? $pieza15->cuerpo : [];
    $pronostico15 = $cuerpo15['pronostico'] ?? '';
    @endphp
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl15.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau15.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-15b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-15b.png') }}"/>
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
                                Pieza 1.5
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

                                                <div id="visualization15a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente15-a"><div id="furca15"></div></div>
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
                                            <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d15">Diente ausente</div>
                                        </div>
                                        <div class="col-sm-12 col-md-6 my-2">
                                             <div class="form-group">
                                                <label class="floating-label-activo-sm"></label>
                                                <div class="py-2 border input-dental rounded" id="i15">Marcar Implante</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Movilidad</label>
                                                <input  class="form-control form-control-xs"  type="number"  id="m15" name="m15" value="0" tabindex="1" onchange="rangoNumero('m15');"/>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Pronóstico</label>
                                                <select class="form-control form-control-xs" name="pi15" id="pi15">
                                                    <option value="" {{ $pronostico15 == '' ? 'selected' : '' }}></option>
                                                    <option value="B" {{ $pronostico15 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico15 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico15 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico15 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-3">
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Furca</label>
                                                <div class="border rounded input-dental pointer w-100" id="f15"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s15-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s15-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s15-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su15-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su15-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su15-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p15-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p15-b"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p15-c"></div>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <input class="form-control form-control-xs" type="number" id="ae15" name="ae15" value="{{ $cuerpo15["plataforma"] ?? 0 }}" tabindex="33"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg15-a" name="mg15-a" value="{{ $cuerpo15["vest_altura_mg_a"] ?? 0 }}" onchange="cargar15a();getDefectos();rangoNumeroMargen('mg15-a');cargar15a();" tabindex="49"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg15-b" name="mg15-b" value="{{ $cuerpo15["vest_altura_mg_b"] ?? 0 }}" onchange="cargar15a();getDefectos();rangoNumeroMargen('mg15-b');cargar15a();" tabindex="50"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="mg15-c" name="mg15-c" value="{{ $cuerpo15["vest_altura_mg_c"] ?? 0 }}" onchange="cargar15a();getDefectos();rangoNumeroMargen('mg15-c');cargar15a();" tabindex="50"/>
                                        </div>
                                    </div>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps15-a" name="ps15-a" value="{{ $cuerpo15["vest_psondaje_a"] ?? 0 }}" onchange="cargar15a();getDefectos();" tabindex="97"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps15-b" name="ps15-b" value="{{ $cuerpo15["vest_psondaje_b"] ?? 0 }}" onchange="cargar15a();getDefectos();" tabindex="98"/>
                                        </div>
                                        <div class="col">
                                            <input class="form-control form-control-xs" type="number" id="ps15-c" name="ps15-c" value="{{ $cuerpo15["vest_psondaje_c"] ?? 0 }}" onchange="cargar15a();getDefectos();" tabindex="99"/>
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
                                                        <div id="visualization15b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                        <div id="diente15b-a">
                                                            <div id="furca15-a"></div>
                                                            <div id="furca15-b"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                               <!-- <tr>
                                                    <td class="titulo">P. sondaje</td>
                                                    <td class="borde">
                                                        <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps15b-a" name="ps15b-a" value="0" onchange="cargar15b();getDefectos();" tabindex="145"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps15b-b" name="ps15b-b" value="0" onchange="cargar15b();getDefectos();" tabindex="146"/>
                                                        <input style="width: 30%;height: 25px;" type="number" id="ps15b-c" name="ps15b-c" value="0" onchange="cargar15b();getDefectos();" tabindex="147"/></td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Altura MG</td>
                                                    <td class="borde">
                                                        <div class="row">
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg15b-a" name="mg15b-a" value="0" onchange="cargar15b();getDefectos();rangoNumeroMargen('mg15b-a');cargar15b();" tabindex="193"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm"  type="number" id="mg15b-b" name="mg15b-b" value="0" onchange="cargar15b();getDefectos();rangoNumeroMargen('mg15b-b');cargar15b();" tabindex="194"/>
                                                            </div>
                                                            <div class="col-md-4 text-center">
                                                                <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg15b-c" name="mg15b-c" value="0" onchange="cargar15b();getDefectos();rangoNumeroMargen('mg15b-c');cargar15b();" tabindex="195"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Sangrado </td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="s15b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="s15b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="s15b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Supuraci&oacute;n</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="su15b-a"></div>
                                                        <div style="width: 30%;height: 20px;"id="su15b-b" ></div>
                                                        <div style="width: 30%;height: 20px;" id="su15b-c" ></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Higiene</td>
                                                    <td class="borde">
                                                        <div style="width: 30%;height: 20px;margin-left: 7px" id="p15b-a"></div>
                                                        <div style="width: 30%;height: 20px;" id="p15b-b"></div>
                                                        <div style="width: 30%;height: 20px;" id="p15b-c"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="titulo">Furca</td>
                                                    <td class="borde"style="text-align:center">
                                                        <div style="width: 20%;height: 25px;margin-left: 7px" id="f15b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f15b-b">F-2</div>

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
                                        <input class="form-control form-control-xs" type="number" id="ps15b-a" name="ps15b-a" value="{{ $cuerpo15["pala_psondaje_a"] ?? 0 }}" onchange="cargar15b();getDefectos();" tabindex="145"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps15b-b" name="ps15b-b" value="{{ $cuerpo15["pala_psondaje_b"] ?? 0 }}" onchange="cargar15b();getDefectos();" tabindex="146"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps15b-c" name="ps15b-c" value="{{ $cuerpo15["pala_psondaje_c"] ?? 0 }}" onchange="cargar15b();getDefectos();" tabindex="147"//>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg15b-a" name="mg15b-a" value="{{ $cuerpo15["pala_altura_mg_a"] ?? 0 }}" onchange="cargar15b();getDefectos();rangoNumeroMargen('mg15b-a');cargar15b();" tabindex="193"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg15b-b" name="mg15b-b" value="{{ $cuerpo15["pala_altura_mg_b"] ?? 0 }}" onchange="cargar15b();getDefectos();rangoNumeroMargen('mg15b-b');cargar15b();" tabindex="194"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg15b-c" name="mg15b-c" value="{{ $cuerpo15["pala_altura_mg_c"] ?? 0 }}" onchange="cargar15b();getDefectos();rangoNumeroMargen('mg15b-c');cargar15b();" tabindex="195"/>
                                    </div>
                                </div>
                                 <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s15b-a"></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s15b-b" ></div>
                                        </div>
                                        <div class="col">
                                            <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s15b-c"></div>
                                        </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental" id="su15b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su15b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su15b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p15b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p15b-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p15b-c"></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-4">
                                            <h6 class="font-weight-bold text-c-blue pt-2">Furca</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <div class="border rounded input-dental pointer w-100" id="f15b-a"></div>
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
                <div class="form-group" id="obs_pieza1.5">
                    <label class="floating-label-activo-sm">Obs. Pieza 1.5</label>
                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 1.5" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_15" id="obs_15" placeholder="Describa observaciones">{{ $cuerpo15["observaciones"] ?? '' }}</textarea>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
        <div id="obs_pieza1.5">
                <button type="button" onclick="guardar_pieza('15')" class="btn btn-info text-center"><i class="feather icon-save"></i>  Guardar evaluación 1.5</button>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar15a();
        cargar15b();

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

    function drawVisualization15a(data15a) {
        // Create and draw the visualization.
        var ac15a = new google.visualization.AreaChart(document.getElementById('visualization15a'));
        ac15a.draw(data15a, {
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

        $('#visualization15a iframe').attr('allowTransparency', 'true');
        $('#visualization15a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar15a(){

        var datoae15=document.getElementById('ae15').value;

        var datomg15a=document.getElementById('mg15-a').value;
        var datomg15b=document.getElementById('mg15-b').value;
        var datomg15c=document.getElementById('mg15-c').value;

        var datops15a=document.getElementById('ps15-a').value;
        var datops15b=document.getElementById('ps15-b').value;
        var datops15c=document.getElementById('ps15-c').value;

        //alert(document.getElementById('ps15-a').value);

        if(datops15a>3){
            document.getElementById('ps15-a').style.color="red";
        }else{
            document.getElementById('ps15-a').style.color="black";
        }
        if(datops15b>3){
            document.getElementById('ps15-b').style.color="red";
        }else{
            document.getElementById('ps15-b').style.color="black";
        }
        if(datops15c>3){
            document.getElementById('ps15-c').style.color="red";
        }else{
            document.getElementById('ps15-c').style.color="black";
        }


        var data15a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg15a)+parseInt(datops15a)),      0-parseInt(datops15a), parseInt(datoae15)],
            ['',    0+(parseInt(datomg15b)+parseInt(datops15b)),      0-parseInt(datops15b), parseInt(datoae15)],
            ['',    0+(parseInt(datomg15c)+parseInt(datops15c)),      0-parseInt(datops15c), parseInt(datoae15)]
        ]);

        drawVisualization15a(data15a);

    }

    function drawVisualization15b(data15b) {

        // Create and draw the visualization.
        var ac15b = new google.visualization.AreaChart(document.getElementById('visualization15b'));
        ac15b.draw(data15b, {
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
        $('#visualization15b iframe').attr('allowTransparency', 'true');
        $('#visualization15b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar15b(){

        var datomg15ba=document.getElementById('mg15b-a').value;
        var datomg15bb=document.getElementById('mg15b-b').value;
        var datomg15bc=document.getElementById('mg15b-c').value;

        var datops15ba=document.getElementById('ps15b-a').value;
        var datops15bb=document.getElementById('ps15b-b').value;
        var datops15bc=document.getElementById('ps15b-c').value;

        if(datops15ba>3){
            document.getElementById('ps15b-a').style.color="red";
        }else{
            document.getElementById('ps15b-a').style.color="black";
        }
        if(datops15bb>3){
            document.getElementById('ps15b-b').style.color="red";
        }else{
            document.getElementById('ps15b-b').style.color="black";
        }
        if(datops15bc>3){
            document.getElementById('ps15b-c').style.color="red";
        }else{
            document.getElementById('ps15b-c').style.color="black";
        }

        var data15b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg15ba)+parseInt(datops15ba)),      0+parseInt(datops15ba)],
            ['',    0-(parseInt(datomg15bb)+parseInt(datops15bb)),      0+parseInt(datops15bb)],
            ['',    0-(parseInt(datomg15bc)+parseInt(datops15bc)),      0+parseInt(datops15bc)]
        ]);

        drawVisualization15b(data15b);

    }

    arrstyle = ["i15","f15","f15b-a","f15b-b","s15-a","s15-b","s15-c","p15-a","p15-b","p15-c","s15b-a","s15b-b","s15b-c","p15b-a","p15b-b","p15b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae15').change(function() {
        if(parseInt(document.getElementById('ae15').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar15a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s15-a').toggle(
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
    $('#s15-b').toggle(
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
    $('#s15-c').toggle(
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

    $('#s15b-a').toggle(
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
    $('#s15b-b').toggle(
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
    $('#s15b-c').toggle(
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
    $('#su15-a').toggle(
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
    $('#su15-b').toggle(
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
    $('#su15-c').toggle(
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

    $('#su15b-a').toggle(
        function () {
            $(this).css({"background":"#f3e815"});
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
    $('#su15b-b').toggle(
        function () {
            $(this).css({"background":"#f3e815"});
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
    $('#su15b-c').toggle(
        function () {
            $(this).css({"background":"#f3e815"});
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
    $('#p15-a').toggle(
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
    $('#p15-b').toggle(
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
    $('#p15-c').toggle(
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
    $('#p15b-a').toggle(
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
    $('#p15b-b').toggle(
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
    $('#p15b-c').toggle(
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
	$('#d15').toggle(
        function () {
            $('#diente15-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau15.png') }}')");
            $('#diente15-a').css("background-position","0px -2px");
            $('#diente15-a').css("background-repeat","no-repeat");
            $('#m15').prop('disabled', true); // Deshabilita el input con id 'm15'
            $('#i15').prop("disabled",true);
            $('#f15').prop("disabled",true);
            $('#s15-a').prop("disabled",true);
            $('#s15-b').prop("disabled",true);
            $('#s15-c').prop("disabled",true);
            $('#p15-a').prop("disabled",true);
            $('#p15-b').prop("disabled",true);
            $('#p15-c').prop("disabled",true);
            $('#mg15-a').prop("disabled",true);
            $('#mg15-b').prop("disabled",true);
            $('#mg15-c').prop("disabled",true);
            $('#ps15-a').prop("disabled",true);
            $('#ps15-b').prop("disabled",true);
            $('#ps15-c').prop("disabled",true);
            /*$('#furca15').css("background","none");*/
            $('#mg15-a').val('0');
            $('#mg15-b').val('0');
            $('#mg15-c').val('0');
            $('#ps15-a').val('0');
            $('#ps15-b').val('0');
            $('#ps15-c').val('0');

            $('#diente15b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-15b.png') }}')");
            $('#diente15b-a').css("background-position","0 23px");
            $('#diente15b-a').css("background-repeat","no-repeat");
            $('#m15b').prop("disabled",true);
            $('#i15b').prop("disabled",true);
            $('#f15b-a').prop("disabled",true);
            $('#f15b-b').prop("disabled",true);
            $('#s15b-a').prop("disabled",true);
            $('#s15b-b').prop("disabled",true);
            $('#s15b-c').prop("disabled",true);
            $('#p15b-a').prop("disabled",true);
            $('#p15b-b').prop("disabled",true);
            $('#p15b-c').prop("disabled",true);
            $('#mg15b-a').prop("disabled",true);
            $('#mg15b-b').prop("disabled",true);
            $('#mg15b-c').prop("disabled",true);
            $('#ps15b-a').prop("disabled",true);
            $('#ps15b-b').prop("disabled",true);
            $('#ps15b-c').prop("disabled",true);
            $('#mg15b-a').val('0');
            $('#mg15b-b').val('0');
            $('#mg15b-c').val('0');
            $('#ps15b-a').val('0');
            $('#ps15b-b').val('0');
            $('#ps15b-c').val('0');

            $('#furca15').prop("disabled",true);
            $('#furca15-a').prop("disabled",true);
            $('#furca15-b').prop("disabled",true);
            $('#ae15').prop("disabled",true);
            $('#pi15').prop("disabled",true);

            totalDientes--;
            getDefectos();
            cargar15a();
            cargar15b();

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
            $('#diente15-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-15.png') }}')");
            $('#diente15-a').css("background-position","0 -2px");
            $('#diente15-a').css("background-repeat","no-repeat");
            $('#m15').prop("disabled",false);
            $('#i15').prop("disabled",false);
            $('#f15').prop("disabled",false);
            $('#s15-a').prop("disabled",false);
            $('#s15-b').prop("disabled",false);
            $('#s15-c').prop("disabled",false);
            $('#p15-a').prop("disabled",false);
            $('#p15-b').prop("disabled",false);
            $('#p15-c').prop("disabled",false);
            $('#mg15-a').prop("disabled",false);
            $('#mg15-b').prop("disabled",false);
            $('#mg15-c').prop("disabled",false);
            $('#ps15-a').prop("disabled",false);
            $('#ps15-b').prop("disabled",false);
            $('#ps15-c').prop("disabled",false);

            $('#diente15b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-15b.png') }}')");
            $('#diente15b-a').css("background-position","0 23px");
            $('#diente15b-a').css("background-repeat","no-repeat");
            $('#m15b').prop("disabled",false);
            $('#i15b').prop("disabled",false);
            $('#f15b-a').prop("disabled",false);
            $('#f15b-b').prop("disabled",false);
            $('#s15b-a').prop("disabled",false);
            $('#s15b-b').prop("disabled",false);
            $('#s15b-c').prop("disabled",false);
            $('#p15b-a').prop("disabled",false);
            $('#p15b-b').prop("disabled",false);
            $('#p15b-c').prop("disabled",false);
            $('#mg15b-a').prop("disabled",false);
            $('#mg15b-b').prop("disabled",false);
            $('#mg15b-c').prop("disabled",false);
            $('#ps15b-a').prop("disabled",false);
            $('#ps15b-b').prop("disabled",false);
            $('#ps15b-c').prop("disabled",false);

            $('#furca15').css("display","block");
            $('#furca15-a').css("display","block");
            $('#furca15-b').css("display","block");
            $('#ae15').prop("disabled",false);
            $('#pi15').prop("disabled",false);

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
	$('#i15').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f15').css({"background":"#FFFFFF"});
            $('#diente15-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl15.png') }}')");
            $('#diente15-a').css("background-position","1px -2px");
            $('#diente15-a').css("background-repeat","no-repeat");

            $('#diente15b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-15b.png') }}')");
            $('#diente15b-a').css("background-position","0 23px");
            $('#diente15b-a').css("background-repeat","no-repeat");

            $('#furca15').css("background","none");
            $('#furca15-a').css("background","none");
            $('#furca15-b').css("background","none");
            $('#f15').css("background","none");
            $('#f15b-a').css("background","none");
            $('#f15b-b').css("background","none");

            $("#f15").attr("id","f15desact");
            $("#f15b-a").attr("id","f15b-adesact");
            $("#f15b-b").attr("id","f15b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente15-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-15.png') }}')");
            $('#diente15-a').css("background-position","0 -2px");
            $('#diente15-a').css("background-repeat","no-repeat");

            $('#diente15b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-15b.png') }}')");
            $('#diente15b-a').css("background-position","0 23px");
            $('#diente15b-a').css("background-repeat","no-repeat");

            $('#f15').css("background","#FFFFFF");
            $('#f15b-a').css("background","#FFFFFF");
            $('#f15b-b').css("background","#FFFFFF");

            $("#f15desact").attr("id","f15");
            $("#f15b-adesact").attr("id","f15b-a");
            $("#f15b-bdesact").attr("id","f15b-b");
            $('#d15').trigger('click');
        }
	);

    //FURCA
	$('#f15').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i15').css({"background":"#FFFFFF"});
			$('#furca15').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca15').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca15').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca15').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f15b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca15-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca15-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca15-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca15-a').css("background","none");
        }
    );
    $('#f15b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca15-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca15-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca15-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca15-b').css("background","none");
        }
    );




</script>



