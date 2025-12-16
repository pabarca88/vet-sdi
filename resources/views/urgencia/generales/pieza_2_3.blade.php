
    {{--  </head>  --}}
    <style>
        #i18,#i17,#i16,#i15,#i14,#i13,#i12,#i11,#i21,#i22,#i23{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente23-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla2/periodontograma-dientes-arriba-23.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i18b,#i17b,#i16b,#i15b,#i14b,#i13b,#i12b,#i11b,#i21b,#i22b,#i23b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente23b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla4/periodontograma-dientes-arriba-23b.png') }}');
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
                    <img src="{{ asset('images/dental/periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-23.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/tabla2/tachados/periodontograma-dientes-arriba-tachados-23.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-23b.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/tabla4/tachados/periodontograma-dientes-arriba-tachados-23b.png') }}"/>
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
                                            <td class="borde"><div id="d23">2.3</div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Implante</td>
                                            <td class="borde"><div id="i23"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Movilidad</td>
                                            <td class="#" colspan="2">
                                                <input style="width: 20%;height: 25px; margin-left: 7px"  type="number" id="m23" name="m23" value="0" tabindex="2" onchange="rangoNumero('m23')"/>
                                                <input style="width: 73%;height: 25px; margin-left: 2px" type="text"  id="m23" name="m23" value="" placeholder="Observaciones" tabindex="1000"/>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="titulo">Pron&oacute;stico individual</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="text" id="pi23" name="pi23"  tabindex="27"/>

                                                {{--  <textarea name="" id="" cols="30" rows="2"></textarea>  --}}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="titulo">Sangrado </td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="s23-a"></div>
                                                <div style="width: 30%;height: 25px;" id="s23-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="s23-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo"> Supuraci&oacute;n</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="su23-a"></div>
                                                <div style="width: 30%;height: 25px;" id="su23-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="su23-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Higiene</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px; margin-left: 7px" id="p23-a"></div>
                                                <div style="width: 30%;height: 25px;" id="p23-b"></div>
                                                <div style="width: 30%;height: 25px;" id="p23-c"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Plataforma</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae23" name="ae23" value="" onchange="anchuraValor()" tabindex="43"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Altura  MG</td>
                                            <td class="borde formulario center">

                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg23-a" name="mg23-a" value="0" onchange="cargar23a();getDefectos();rangoNumeroMargen('mg23-a');cargar23a();" tabindex="79"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg23-b" name="mg23-b" value="0" onchange="cargar23a();getDefectos();rangoNumeroMargen('mg23-b');cargar23a();" tabindex="80"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg23-c" name="mg23-c" value="0" onchange="cargar23a();getDefectos();rangoNumeroMargen('mg23-c');cargar23a();" tabindex="81"/>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Prof. de sondaje</td>
                                            <td class="borde formulario center">
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps23-a" name="ps23-a" value="0" onchange="cargar23a();getDefectos();" tabindex="127"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps23-b" name="ps23-b" value="0" onchange="cargar23a();getDefectos();" tabindex="128"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps23-c" name="ps23-c" value="0" onchange="cargar23a();getDefectos();" tabindex="129"/>
                                            </td>
                                        </tr>
                                        <tr>
                                           <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                            <td colspan="2" class="noborde formulario" style="position: relative;" >
                                                <div id="lineas-gr"></div>
                                                {{--  <div id="visualization18a" style="width: 40px; height: 160px;position:absolute;margin:0 0 0 105px;"></div>  --}}
                                                <div id="visualization23a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente23-a"><div id="furca23"></div></div>
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
                                                    <div id="visualization23b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente23b-a">
                                                        <div id="furca23-a"></div>
                                                        <div id="furca23-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Prof. de sondaje</td>

                                                    <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps23b-a" name="ps23b-a" value="0" onchange="cargar23b();getDefectos();" tabindex="175"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps23b-b" name="ps23b-b" value="0" onchange="cargar23b();getDefectos();" tabindex="176"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps23b-c" name="ps23b-c" value="0" onchange="cargar23b();getDefectos();" tabindex="177"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number"  id="mg23b-a" name="mg23b-a" value="0" onchange="cargar23b();getDefectos();rangoNumeroMargen('mg23b-a');cargar23();" tabindex="223"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg23b-b" name="mg23b-b" value="0" onchange="cargar23b();getDefectos();rangoNumeroMargen('mg23b-b');cargar23b();" tabindex="224"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg23b-c" name="mg23b-c" value="0" onchange="cargar23b();getDefectos();rangoNumeroMargen('mg23b-c');cargar23b();" tabindex="225"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="p23b-a"></div>
                                                    <div style="width: 30%;height: 25px;" id="p23b-b"></div>
                                                    <div <div style="width: 30%;height: 25px;" id="p23b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="s23b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="p23b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="p23b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="su23b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="su23b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="su23b-c" ></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="titulo">Nota</td>
                                                <td class="borde">
                                                    <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n23" name="n23" tabindex="251"/></td>
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





