
    {{--  </head>  --}}
    <style>
        #i31,#i32,#i33,#i34,#i35,#i36,#i37,#i38{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente32-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla6/periodontograma-dientes-arriba-32.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


         #i38b,#i37b,#i36b,#i35b,#i34b,#i33b,#i32b,#i31b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente32b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla8/periodontograma-dientes-abajo-32b.png') }}');
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


                    <img src="{{ asset('images/dental/periodontograma/img/tabla6/implantes/periodontograma-dientes-arriba-tornillo-32.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla6/tachados/periodontograma-dientes-arriba-tachados-32.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-32b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla8/tachados/periodontograma-dientes-abajo-tachados-32b.png') }}"/>



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
                                            <td class="borde"><div style="text-align: center" id="d32">3.2</div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Implante</td>
                                            <td class="borde"><div id="i32"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Movilidad</td>
                                            <td class="#" colspan="2">
                                                <input style="width: 20%;height: 25px; margin-left: 7px" type="number" id="m32" name="m32" value="0" tabindex="2" onchange="rangoNumero('m32')"/>
                                                <input style="width: 73%;height: 25px; margin-left: 2px" type="text"  id="m32" name="m32" value="" placeholder="Observaciones" tabindex="1"/>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="titulo">Pron&oacute;stico individual</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="text" id="pi32" name="pi32"  tabindex="554"/>

                                                {{--  <textarea name="" id="" cols="30" rows="2"></textarea>  --}}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="titulo">Sangrado </td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="s32-a"></div>
                                                <div style="width: 30%;height: 25px;" id="s32-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="s32-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo"> Supuraci&oacute;n</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="su32-a"></div>
                                                <div style="width: 30%;height: 25px;" id="su32-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="su32-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Higiene</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px; margin-left: 7px" id="p32-a"></div>
                                                <div style="width: 30%;height: 25px;" id="p32-b"></div>
                                                <div style="width: 30%;height: 25px;" id="p32-c"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Plataforma</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae32" name="ae32" value="" onchange="anchuraValor()" tabindex="538"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Altura  MG</td>
                                            <td class="borde formulario center">

                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg32-a" name="mg32-a" value="0" onchange="cargar32a();getDefectos();rangoNumeroMargen('mg32-a');cargar32a();" tabindex="325"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg32-b" name="mg32-b" value="0" onchange="cargar32a();getDefectos();rangoNumeroMargen('mg32-b');cargar32a();" tabindex="326"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg32-c" name="mg32-c" value="0" onchange="cargar32a();getDefectos();rangoNumeroMargen('mg32-c');cargar32a();" tabindex="327"/>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Prof. de sondaje</td>
                                            <td class="borde formulario center" >
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps32-a" name="ps32-a" value="0" onchange="cargar32a();getDefectos();" tabindex="412"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps32-b" name="ps32-b" value="0" onchange="cargar32a();getDefectos();" tabindex="413"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps32-c" name="ps32-c" value="0" onchange="cargar32a();getDefectos();" tabindex="414"/>
                                            </td>
                                        </tr>
                                        <tr>
                                           <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                            <td colspan="2" class="noborde formulario" style="position: relative;" >
                                                <div id="lineas-gr"></div>
                                                {{--  <div id="visualization18a" style="width: 40px; height: 160px;position:absolute;margin:0 0 0 105px;"></div>  --}}
                                                <div id="visualization32a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente32-a"><div id="furca32"></div></div>
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
                                                    <div id="visualization32b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente32b-a">
                                                        <div id="furca32-a"></div>
                                                        <div id="furca32-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Prof. de sondaje</td>

                                                    <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps32b-a" name="ps32b-a" value="0" onchange="cargar32b();getDefectos();" tabindex="460"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps32b-b" name="ps32b-b" value="0" onchange="cargar32b();getDefectos();" tabindex="461"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps32b-c" name="ps32b-c" value="0" onchange="cargar32b();getDefectos();" tabindex="462"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number"  id="mg32b-a" name="mg32b-a" value="0" onchange="cargar32b();getDefectos();rangoNumeroMargen('mg32b-a');cargar32b();" tabindex="508"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg32b-b" name="mg32b-b" value="0" onchange="cargar32b();getDefectos();rangoNumeroMargen('mg32b-b');cargar32b();" tabindex="509"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg32b-c" name="mg32b-c" value="0" onchange="cargar32b();getDefectos();rangoNumeroMargen('mg32b-c');cargar32b();" tabindex="510"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="p32b-a"></div>
                                                    <div style="width: 30%;height: 25px;" id="p32b-b"></div>
                                                    <div <div style="width: 30%;height: 25px;" id="p32b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="s32b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="p32b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="p32b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="su32b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="su32b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="su32b-c" ></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="titulo">Nota</td>
                                                <td class="borde">
                                                    <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n32" name="n32" tabindex="000"/></td>
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





