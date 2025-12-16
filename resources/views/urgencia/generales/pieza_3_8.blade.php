
    {{--  </head>  --}}
    <style>
        #i18,#i17,#i16,#i15,#i14,#i13,#i12,#i11,#i21,#i22,#i23,#i24,#i25,#i26,#i27,#i28,#i31,#i32,#i33,#i34,#i35,#i36,#i37,#i38{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente38-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla6/periodontograma-dientes-arriba-38.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i18b,#i17b,#i16b,#i15b,#i14b,#i13b,#i12b,#i11b,#i21b,#i22b,#i23b,#i24b,#i25b,#i26b,#i27b,#i28b,#i38b,#i37b,#i36b,#i35b,#i34b,#i33b,#i32b,#i31b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente38b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla8/periodontograma-dientes-abajo-38b.png') }}');
            width:54px;
            background-position: 0 23px;
            background-repeat: no-repeat;
        }



        #lineas-gr,#lineas-gr-inf{
            {{--  width: 400px;  --}}
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
        #tabla-titulo-inputdent{
            background-color: #E5EAE9;
            border:none;
        }

        #inputdent{
            width: 50px;
            height: 18px;
            margin: 0;
            font-size: 9px;
            border: none;
            text-align: center;
            outline: none;

        }

        #tabla-1 td.titulo
        {
            width : 0% !important;
        }

        #tabla-1 td.formulario
        {
            min-width : auto !important;
        }

        #tabla-1 td,  td,#tabla-3
        {
            height: 0px;
            {{--  min-width: 150px;  --}}
            {{--  min-width: 444px;  --}}
            vertical-align: left;
            width: 100%;
        }

        #tabla-3 td.titulo
        {
            width : 0% !important;
        }

        #tabla-3 td.formulario
        {
            min-width : auto !important;
        }

    </style>
    <div class="col-md-12 bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">

                <div style="display:none">
                    <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla6/implantes/periodontograma-dientes-arriba-tornillo-38.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla6/tachados/periodontograma-dientes-arriba-tachados-38.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-38b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla8/tachados/periodontograma-dientes-abajo-tachados-38b.png') }}"/>



                </div>
            </div>

        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card-a">
            <div class="card-header-a" id="motivo">
                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                    vestibular
                </button>
            </div>
            <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                <div class="card-body-aten-a shadow-none">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <form name ="grafico1" id="grafico1" action="#">
                                <table id="tabla-1" style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <td class="titulo"></td>
                                            <td class="borde formulario" ><div id="d38">3.8</div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Implante</td>
                                            <td class="borde formulario"><div id="i38"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Movilidad</td>
                                            <td class="#" colspan="2">
                                                <input style="width: 20%;height: 25px; margin-left: 7px" type="number"  id="m38" name="m38" value="0" tabindex="1" onchange="rangoNumero('m38');"/>
                                                <input style="width: 73%;height: 25px; margin-left: 2px" type="text"  id="m38" name="m38" value="" placeholder="Observaciones" tabindex="1000"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Pron&oacute;stico individual</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="text" id="pi38" name="pi38"  tabindex="560"/>
                                                {{--  <textarea name="" id="" cols="30" rows="2"></textarea>  --}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Furca</td>
                                            <td class="borde"><div id="f38"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Sangrado </td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="s38-a"></div>
                                                <div style="width: 30%;height: 25px;" id="s38-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="s38-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo"> Supuraci&oacute;n</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="su38-a"></div>
                                                <div style="width: 30%;height: 25px;" id="su38-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="su38-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Higiene</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px; margin-left: 7px" id="p38-a"></div>
                                                <div style="width: 30%;height: 25px;" id="p38-b"></div>
                                                <div style="width: 30%;height: 25px;" id="p38-c"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Plataforma</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae38" name="ae38" value="" onchange="anchuraValor()" tabindex="544"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Altura  MG</td>
                                            <td class="borde formulario center">
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg38-a" name="mg38-a" value="0" onchange="cargar38a();getDefectos();rangoNumeroMargen('mg38-a');cargar38a();" tabindex="342"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg38-b" name="mg38-b" value="0" onchange="cargar38a();getDefectos();rangoNumeroMargen('mg38-b');cargar38a();" tabindex="343"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg38-c" name="mg38-c" value="0" onchange="cargar38a();getDefectos();rangoNumeroMargen('mg38-c');cargar38a();" tabindex="344"/>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Prof. de sondaje</td>
                                            <td class="borde formulario center" >
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps38-a" name="ps38-a" value="0" onchange="cargar38a();getDefectos();" tabindex="430"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps38-b" name="ps38-b" value="0" onchange="cargar38a();getDefectos();" tabindex="431"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps38-c" name="ps38-c" value="0" onchange="cargar38a();getDefectos();" tabindex="432"/>
                                            </td>
                                        </tr>
                                        <tr>
                                           <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                           <td colspan="2" class="noborde formulario" style="position: relative;" >
                                            <div id="lineas-gr"></div>
                                            {{--  <div id="visualization18a" style="width: 40px; height: 160px;position:absolute;margin:0 0 0 105px;"></div>  --}}
                                            <div id="visualization38a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente38-a"><div id="furca38"></div></div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card-a">
            <div class="card-header-a" id="motivo">
                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                    Palatino
                </button>
            </div>
            <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
                <div class="card-body-aten-a shadow-none">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <form name ="grafico3" id="grafico3" action="#">
                                <table id="tabla-3" style="width: 100%">
                                    <tbody>
                                            <tr>
                                                <!--<td class="titulo" style="color:#565A5D">Palatino</td>-->
                                                <td colspan="2" class="noborde">
                                                    <div id="lineas-gr-inf"></div>
                                                    <div id="visualization38b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente38b-a">
                                                        <div id="furca38-a"></div>
                                                        <div id="furca38-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Prof. de sondaje</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps38b-a" name="ps38b-a" value="0" onchange="cargar38b();getDefectos();" tabindex="478"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps38b-b" name="ps38b-b" value="0" onchange="cargar38b();getDefectos();" tabindex="479"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps38b-c" name="ps38b-c" value="0" onchange="cargar38b();getDefectos();" tabindex="480"/></td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg38b-a" name="mg38b-a" value="0" onchange="cargar38b();getDefectos();rangoNumeroMargen('mg38b-a');cargar38b();" tabindex="526"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg38b-b" name="mg38b-b" value="0" onchange="cargar38b();getDefectos();rangoNumeroMargen('mg38b-b');cargar38b();" tabindex="527"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg38b-c" name="mg38b-c" value="0" onchange="cargar38b();getDefectos();rangoNumeroMargen('mg38b-c');cargar38b();" tabindex="528"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="p38b-a"></div>
                                                    <div style="width: 30%;height: 25px;" id="p38b-b"></div>
                                                    <div <div style="width: 30%;height: 25px;" id="p38b-c"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="s38b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="s38b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="s38b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="su38b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="su38b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="su38b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Furca</td>
                                                <td class="borde"style="text-align:center">
                                                    <div style="width: 90%;height: 25px;margin-left: 7px" id="f38b-a"></div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Nota</td>
                                                <td class="borde">
                                                    <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n38" name="n38" tabindex="000"/>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





