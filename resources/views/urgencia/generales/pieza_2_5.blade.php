
    {{--  </head>  --}}
    <style>
        #i18,#i17,#i16,#i15,#i14,#i13,#i12,#i11,#i21,#i22,#i23,#i24,#i25{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente25-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla2/periodontograma-dientes-arriba-25.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i18b,#i17b,#i16b,#i15b,#i14b,#i13b,#i12b,#i11b,#i21b,#i22b,#i23b,#i24b,#i25{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente25b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla4/periodontograma-dientes-arriba-25b.png') }}');
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
                    <img src="{{ asset('images/dental/periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-25.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/tabla2/tachados/periodontograma-dientes-arriba-tachados-25.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-25b.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/tabla4/tachados/periodontograma-dientes-arriba-tachados-25b.png') }}"/>
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
                                            <td class="borde"><div id="d25">2.5</div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Implante</td>
                                            <td class="borde"><div id="i25"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Movilidad</td>
                                            <td class="#" colspan="2">
                                                <input style="width: 20%;height: 25px; margin-left: 7px"  type="number" id="m25" name="m25" value="0" tabindex="2" onchange="rangoNumero('m25')"/>
                                                <input style="width: 73%;height: 25px; margin-left: 2px" type="text"  id="m25" name="m25" value="" placeholder="Observaciones" tabindex="1000"/>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="titulo">Pron&oacute;stico individual</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="text" id="pi25" name="pi25"  tabindex="29"/>

                                                {{--  <textarea name="" id="" cols="30" rows="2"></textarea>  --}}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="titulo">Sangrado </td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="s25-a"></div>
                                                <div style="width: 30%;height: 25px;" id="s25-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="s25-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo"> Supuraci&oacute;n</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="su25-a"></div>
                                                <div style="width: 30%;height: 25px;" id="su25-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="su25-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Higiene</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px; margin-left: 7px" id="p25-a"></div>
                                                <div style="width: 30%;height: 25px;" id="p25-b"></div>
                                                <div style="width: 30%;height: 25px;" id="p25-c"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Plataforma</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae25" name="ae25" value="" onchange="anchuraValor()" tabindex="45"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Altura  MG</td>
                                            <td class="borde formulario center">

                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg25-a" name="mg25-a" value="0" onchange="cargar25a();getDefectos();rangoNumeroMargen('mg25-a');cargar25a();" tabindex="85"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg25-b" name="mg25-b" value="0" onchange="cargar25a();getDefectos();rangoNumeroMargen('mg25-b');cargar25a();" tabindex="86"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg25-c" name="mg25-c" value="0" onchange="cargar25a();getDefectos();rangoNumeroMargen('mg25-c');cargar25a();" tabindex="87"/>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Prof. de sondaje</td>
                                            <td class="borde formulario center">
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps25-a" name="ps25-a" value="0" onchange="cargar25a();getDefectos();" tabindex="133"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps25-b" name="ps25-b" value="0" onchange="cargar25a();getDefectos();" tabindex="134"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps25-c" name="ps25-c" value="0" onchange="cargar25a();getDefectos();" tabindex="135"/>
                                            </td>
                                        </tr>
                                        <tr>
                                           <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                            <td colspan="2" class="noborde formulario" style="position: relative;" >
                                                <div id="lineas-gr"></div>
                                                {{--  <div id="visualization18a" style="width: 40px; height: 160px;position:absolute;margin:0 0 0 105px;"></div>  --}}
                                                <div id="visualization25a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente25-a"><div id="furca25"></div></div>
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
                                                    <div id="visualization25b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente25b-a">
                                                        <div id="furca25-a"></div>
                                                        <div id="furca25-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Prof. de sondaje</td>

                                                    <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps25b-a" name="ps25b-a" value="0" onchange="cargar25b();getDefectos();" tabindex="181"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps25b-b" name="ps25b-b" value="0" onchange="cargar25b();getDefectos();" tabindex="182"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps25b-c" name="ps25b-c" value="0" onchange="cargar25b();getDefectos();" tabindex="183"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number"  id="mg25b-a" name="mg25b-a" value="0" onchange="cargar25b();getDefectos();rangoNumeroMargen('mg25b-a');cargar25();" tabindex="226"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg25b-b" name="mg25b-b" value="0" onchange="cargar25b();getDefectos();rangoNumeroMargen('mg25b-b');cargar25b();" tabindex="227"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg25b-c" name="mg25b-c" value="0" onchange="cargar25b();getDefectos();rangoNumeroMargen('mg25b-c');cargar25b();" tabindex="228"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="p25b-a"></div>
                                                    <div style="width: 30%;height: 25px;" id="p25b-b"></div>
                                                    <div <div style="width: 30%;height: 25px;" id="p25b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="s25b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="p25b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="p25b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="su25b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="su25b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="su25b-c" ></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="titulo">Nota</td>
                                                <td class="borde">
                                                    <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n25" name="n25" tabindex="253"/></td>
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





