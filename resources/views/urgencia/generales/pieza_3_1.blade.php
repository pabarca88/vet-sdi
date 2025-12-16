
    {{--  </head>  --}}
    <style>
        #i31,#i32,#i33,#i34,#i35,#i36,#i37,#i38{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente31-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla6/periodontograma-dientes-arriba-31.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i38b,#i37b,#i36b,#i35b,#i34b,#i33b,#i32b,#i31b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente31b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla8/periodontograma-dientes-abajo-31b.png') }}');
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


                    <img src="{{ asset('images/dental/periodontograma/img/tabla6/implantes/periodontograma-dientes-arriba-tornillo-31.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla6/tachados/periodontograma-dientes-arriba-tachados-31.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-31b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla8/tachados/periodontograma-dientes-abajo-tachados-31b.png') }}"/>



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
                                            <td class="borde"><div style="text-align: center" id="d31">4.1</div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Implante</td>
                                            <td class="borde"><div id="i31"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Movilidad</td>
                                            <td class="#" colspan="2">
                                                <input style="width: 20%;height: 25px; margin-left: 7px" type="number" id="m31" name="m31" value="0" tabindex="2" onchange="rangoNumero('m31')"/>
                                                <input style="width: 73%;height: 25px; margin-left: 2px" type="text"  id="m31" name="m31" value="" placeholder="Observaciones" tabindex="1"/>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="titulo">Pron&oacute;stico individual</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="text" id="pi31" name="pi31"  tabindex="553"/>

                                                {{--  <textarea name="" id="" cols="30" rows="2"></textarea>  --}}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="titulo">Sangrado </td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="s31-a"></div>
                                                <div style="width: 30%;height: 25px;" id="s31-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="s31-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo"> Supuraci&oacute;n</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="su31-a"></div>
                                                <div style="width: 30%;height: 25px;" id="su31-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="su31-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Higiene</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px; margin-left: 7px" id="p31-a"></div>
                                                <div style="width: 30%;height: 25px;" id="p31-b"></div>
                                                <div style="width: 30%;height: 25px;" id="p31-c"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Plataforma</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae31" name="ae31" value="" onchange="anchuraValor()" tabindex="537"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Altura  MG</td>
                                            <td class="borde formulario center">

                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg31-a" name="mg31-a" value="0" onchange="cargar31a();getDefectos();rangoNumeroMargen('mg31-a');cargar31a();" tabindex="321"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg31-b" name="mg31-b" value="0" onchange="cargar31a();getDefectos();rangoNumeroMargen('mg31-b');cargar31a();" tabindex="322"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg31-c" name="mg31-c" value="0" onchange="cargar31a();getDefectos();rangoNumeroMargen('mg31-c');cargar31a();" tabindex="323"/>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Prof. de sondaje</td>
                                            <td class="borde formulario center" >
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps31-a" name="ps31-a" value="0" onchange="cargar31a();getDefectos();" tabindex="409"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps31-b" name="ps31-b" value="0" onchange="cargar31a();getDefectos();" tabindex="410"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps31-c" name="ps31-c" value="0" onchange="cargar31a();getDefectos();" tabindex="411"/>
                                            </td>
                                        </tr>
                                        <tr>
                                           <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                            <td colspan="2" class="noborde formulario" style="position: relative;" >
                                                <div id="lineas-gr"></div>
                                                {{--  <div id="visualization18a" style="width: 40px; height: 160px;position:absolute;margin:0 0 0 105px;"></div>  --}}
                                                <div id="visualization31a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente31-a"><div id="furca31"></div></div>
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
                                                    <div id="visualization31b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente31b-a">
                                                        <div id="furca31-a"></div>
                                                        <div id="furca31-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Prof. de sondaje</td>

                                                    <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps31b-a" name="ps31b-a" value="0" onchange="cargar31b();getDefectos();" tabindex="457"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps31b-b" name="ps31b-b" value="0" onchange="cargar31b();getDefectos();" tabindex="458"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps31b-c" name="ps31b-c" value="0" onchange="cargar31b();getDefectos();" tabindex="459"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number"  id="mg31b-a" name="mg31b-a" value="0" onchange="cargar31b();getDefectos();rangoNumeroMargen('mg31b-a');cargar31b();" tabindex="505"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg31b-b" name="mg31b-b" value="0" onchange="cargar31b();getDefectos();rangoNumeroMargen('mg31b-b');cargar31b();" tabindex="506"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg31b-c" name="mg31b-c" value="0" onchange="cargar31b();getDefectos();rangoNumeroMargen('mg31b-c');cargar31b();" tabindex="507"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="p31b-a"></div>
                                                    <div style="width: 30%;height: 25px;" id="p31b-b"></div>31
                                                    <div <div style="width: 30%;height: 25px;" id="p31b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="s31b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="p31b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="p31b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="su31b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="su31b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="su31b-c" ></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="titulo">Nota</td>
                                                <td class="borde">
                                                    <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n31" name="n31" tabindex="000"/></td>
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





