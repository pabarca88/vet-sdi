
    {{--  </head>  --}}
    <style>
        #i18,#i17,#i16,#i15,#i14,#i13,#i12,#i11,#i21,#i22,#i23,#i24,#i25,#i26,#i27,#i28,#i48,#i47,#i46,#i45,#i44,#i43,#i42,#i41{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente41-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla5/periodontograma-dientes-arriba-41.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i18b,#i17b,#i16b,#i15b,#i14b,#i13b,#i12b,#i11b,#i21b,#i22b,#i23b,#i24b,#i25b,#i26b,#i27b,#i28b,#i48b,,#i47b,#i46b,,#i45b,#i44b,#i43b,#i42b,#i41b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente41b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla7/periodontograma-dientes-abajo-41b.png') }}');
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


                    <img src="{{ asset('images/dental/periodontograma/img/tabla5/implantes/periodontograma-dientes-arriba-tornillo-41.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla5/tachados/periodontograma-dientes-arriba-tachados-41.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-41b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla7/tachados/periodontograma-dientes-abajo-tachados-41b.png') }}"/>



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
                                            <td class="borde"><div style="text-align: center" id="d41">4.1</div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Implante</td>
                                            <td class="borde"><div id="i41"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Movilidad</td>
                                            <td class="#" colspan="2">
                                                <input style="width: 20%;height: 25px; margin-left: 7px" type="number" id="m41" name="m41" value="0" tabindex="2" onchange="rangoNumero('m41')"/>
                                                <input style="width: 73%;height: 25px; margin-left: 2px" type="text"  id="m41" name="m41" value="" placeholder="Observaciones" tabindex="1"/>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="titulo">Pron&oacute;stico individual</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="text" id="pi41" name="pi41"  tabindex="552"/>

                                                {{--  <textarea name="" id="" cols="30" rows="2"></textarea>  --}}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="titulo">Sangrado </td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="s41-a"></div>
                                                <div style="width: 30%;height: 25px;" id="s41-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="s41-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo"> Supuraci&oacute;n</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="su41-a"></div>
                                                <div style="width: 30%;height: 25px;" id="su41-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="su41-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Higiene</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px; margin-left: 7px" id="p41-a"></div>
                                                <div style="width: 30%;height: 25px;" id="p41-b"></div>
                                                <div style="width: 30%;height: 25px;" id="p41-c"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Plataforma</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae41" name="ae41" value="" onchange="anchuraValor()" tabindex="536"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Altura  MG</td>
                                            <td class="borde formulario center">

                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg41-a" name="mg41-a" value="0" onchange="cargar41a();getDefectos();rangoNumeroMargen('mg41-a');cargar41a();" tabindex="318"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg41-b" name="mg41-b" value="0" onchange="cargar41a();getDefectos();rangoNumeroMargen('mg41-b');cargar41a();" tabindex="319"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg41-c" name="mg41-c" value="0" onchange="cargar41a();getDefectos();rangoNumeroMargen('mg41-c');cargar41a();" tabindex="320"/>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Prof. de sondaje</td>
                                            <td class="borde formulario center" >
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps41-a" name="ps41-a" value="0" onchange="cargar41a();getDefectos();" tabindex="406"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps41-b" name="ps41-b" value="0" onchange="cargar41a();getDefectos();" tabindex="407"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps41-c" name="ps41-c" value="0" onchange="cargar41a();getDefectos();" tabindex="408"/>
                                            </td>
                                        </tr>
                                        <tr>
                                           <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                            <td colspan="2" class="noborde formulario" style="position: relative;" >
                                                <div id="lineas-gr"></div>
                                                {{--  <div id="visualization18a" style="width: 40px; height: 160px;position:absolute;margin:0 0 0 105px;"></div>  --}}
                                                <div id="visualization41a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente41-a"><div id="furca41"></div></div>
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
                                                    <div id="visualization41b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente41b-a">
                                                        <div id="furca41-a"></div>
                                                        <div id="furca41-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Prof. de sondaje</td>

                                                    <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps41b-a" name="ps41b-a" value="0" onchange="cargar41b();getDefectos();" tabindex="454"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps41b-b" name="ps41b-b" value="0" onchange="cargar41b();getDefectos();" tabindex="455"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps41b-c" name="ps41b-c" value="0" onchange="cargar41b();getDefectos();" tabindex="456"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number"  id="mg41b-a" name="mg41b-a" value="0" onchange="cargar41b();getDefectos();rangoNumeroMargen('mg41b-a');cargar41b();" tabindex="502"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg41b-b" name="mg41b-b" value="0" onchange="cargar41b();getDefectos();rangoNumeroMargen('mg41b-b');cargar41b();" tabindex="503"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg41b-c" name="mg41b-c" value="0" onchange="cargar41b();getDefectos();rangoNumeroMargen('mg41b-c');cargar41b();" tabindex="504"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="p41b-a"></div>
                                                    <div style="width: 30%;height: 25px;" id="p41b-b"></div>41
                                                    <div <div style="width: 30%;height: 25px;" id="p41b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="s41b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="p41b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="p41b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="su41b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="su41b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="su41b-c" ></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="titulo">Nota</td>
                                                <td class="borde">
                                                    <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n41" name="n41" tabindex="000"/></td>
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





