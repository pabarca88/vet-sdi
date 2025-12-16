
    {{--  </head>  --}}
    <style>
        #i18,#i17,#i16,#i15,#i14,#i13,#i12,#i11{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente13-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-13.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i18b,#i17b,#i16b,#i15b,#i14b,#i13b,#i12b,#i11b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente13b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-13b.png') }}');
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
                    <img src="{{ asset('images/dental/periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-13.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/tabla1/tachados/periodontograma-dientes-arriba-tachados-13.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-13b.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-13b.png') }}"/>
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
                                            <td class="borde"><div id="d13">1.3</div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Implante</td>
                                            <td class="borde"><div id="i13"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Movilidad</td>
                                            <td class="#" colspan="2">
                                                <input style="width: 20%;height: 25px; margin-left: 7px"  type="number" id="m13" name="m13" value="0" tabindex="2" onchange="rangoNumero('m13')"/>
                                                <input style="width: 73%;height: 25px; margin-left: 2px" type="text"  id="m13" name="m13" value="" placeholder="Observaciones" tabindex="1000"/>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="titulo">Pron&oacute;stico individual</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="text" id="pi13" name="pi13"  tabindex="19"/>

                                                {{--  <textarea name="" id="" cols="30" rows="2"></textarea>  --}}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="titulo">Sangrado </td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="s13-a"></div>
                                                <div style="width: 30%;height: 25px;" id="s13-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="s13-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo"> Supuraci&oacute;n</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="su36-a"></div>
                                                <div style="width: 30%;height: 25px;" id="su13-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="su13-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Higiene</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px; margin-left: 7px" id="p13-a"></div>
                                                <div style="width: 30%;height: 25px;" id="p13-b"></div>
                                                <div style="width: 30%;height: 25px;" id="p13-c"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Plataforma</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae13" name="ae13" value="" onchange="anchuraValor()" tabindex="38"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Altura  MG</td>
                                            <td class="borde formulario center">

                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg13-a" name="mg13-a" value="0" onchange="cargar13a();getDefectos();rangoNumeroMargen('mg13-a');cargar13a();" tabindex="64"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg13-b" name="mg13-b" value="0" onchange="cargar13a();getDefectos();rangoNumeroMargen('mg13-b');cargar13a();" tabindex="65"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg13-c" name="mg13-c" value="0" onchange="cargar13a();getDefectos();rangoNumeroMargen('mg13-c');cargar13a();" tabindex="66"/>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Prof. de sondaje</td>
                                            <td class="borde formulario center" >
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps13-a" name="ps13-a" value="0" onchange="cargar13a();getDefectos();" tabindex="112"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps13-b" name="ps13-b" value="0" onchange="cargar13a();getDefectos();" tabindex="113"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps13-c" name="ps13-c" value="0" onchange="cargar13a();getDefectos();" tabindex="114"/>
                                            </td>
                                        </tr>
                                        <tr>
                                           <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                            <td colspan="2" class="noborde formulario" style="position: relative;" >
                                                <div id="lineas-gr"></div>
                                                {{--  <div id="visualization18a" style="width: 40px; height: 160px;position:absolute;margin:0 0 0 105px;"></div>  --}}
                                                <div id="visualization13a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente13-a"><div id="furca13"></div></div>
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
                                                    <div id="visualization13b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente13b-a">
                                                        <div id="furca13-a"></div>
                                                        <div id="furca13-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Prof. de sondaje</td>

                                                    <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps13b-a" name="ps13b-a" value="0" onchange="cargar13b();getDefectos();" tabindex="160"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps13b-b" name="ps13b-b" value="0" onchange="cargar13b();getDefectos();" tabindex="161"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps13b-c" name="ps13b-c" value="0" onchange="cargar13b();getDefectos();" tabindex="162"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number"  id="mg13b-a" name="mg13b-a" value="0" onchange="cargar13b();getDefectos();rangoNumeroMargen('mg13b-a');cargar13b();" tabindex="208"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg13b-b" name="mg13b-b" value="0" onchange="cargar13b();getDefectos();rangoNumeroMargen('mg13b-b');cargar13b();" tabindex="209"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg13b-c" name="mg13b-c" value="0" onchange="cargar13b();getDefectos();rangoNumeroMargen('mg13b-c');cargar13b();" tabindex="210"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="p13b-a"></div>
                                                    <div style="width: 30%;height: 25px;" id="p13b-b"></div>
                                                    <div <div style="width: 30%;height: 25px;" id="p13b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="s13b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="p13b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="p13b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="su13b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="su13b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="su13b-c" ></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="titulo">Nota</td>
                                                <td class="borde">
                                                    <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n13" name="n13" tabindex="246"/></td>
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





