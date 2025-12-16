
    {{--  </head>  --}}
    <style>
        #i31,#i32,#i33,#i34,#i35,#i36,#i37,#i38{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente37-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla6/periodontograma-dientes-arriba-37.png') }}');
            width:54px;
            background-position: 0 0px;
            background-repeat: no-repeat;
        }


        #i38b,#i37b,#i36b,#i35b,#i34b,#i33b,#i32b,#i31b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente37b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla8/periodontograma-dientes-abajo-37b.png') }}');
            width:54px;
            background-position: 0 25px;
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


                    <img src="{{ asset('images/dental/periodontograma/img/tabla6/implantes/periodontograma-dientes-arriba-tornillo-37.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla6/tachados/periodontograma-dientes-arriba-tachados-37.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-37b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla8/tachados/periodontograma-dientes-abajo-tachados-37b.png') }}"/>



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
                                            <td class="borde formulario" ><div id="d37">3.7</div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Implante</td>
                                            <td class="borde formulario"><div id="i37"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Movilidad</td>
                                            <td class="#" colspan="2">
                                                <input style="width: 20%;height: 25px; margin-left: 7px" type="number"  id="m37" name="m37" value="0" tabindex="1" onchange="rangoNumero('m37');"/>
                                                <input style="width: 73%;height: 25px; margin-left: 2px" type="text"  id="m37" name="m37" value="" placeholder="Observaciones" tabindex="1000"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Pron&oacute;stico individual</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="text" id="pi37" name="pi37"  tabindex="559"/>
                                                {{--  <textarea name="" id="" cols="30" rows="2"></textarea>  --}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Furca</td>
                                            <td class="borde"><div id="f37"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Sangrado </td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="s37-a"></div>
                                                <div style="width: 30%;height: 25px;" id="s37-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="s37-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo"> Supuraci&oacute;n</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="su7-a"></div>
                                                <div style="width: 30%;height: 25px;" id="su37-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="su37-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Higiene</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px; margin-left: 7px" id="p37-a"></div>
                                                <div style="width: 30%;height: 25px;" id="p37-b"></div>
                                                <div style="width: 30%;height: 25px;" id="p37-c"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Plataforma</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae37" name="ae37" value="" onchange="anchuraValor()" tabindex="543"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Altura  MG</td>
                                            <td class="borde formulario center">
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg37-a" name="mg37-a" value="0" onchange="cargar37a();getDefectos();rangoNumeroMargen('mg37-a');cargar37a();" tabindex="339"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg37-b" name="mg37-b" value="0" onchange="cargar37a();getDefectos();rangoNumeroMargen('mg37-b');cargar37a();" tabindex="340"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg37-c" name="mg37-c" value="0" onchange="cargar37a();getDefectos();rangoNumeroMargen('mg37-c');cargar37a();" tabindex="341"/>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Prof. de sondaje</td>
                                            <td class="borde formulario center" >
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps37-a" name="ps37-a" value="0" onchange="cargar37a();getDefectos();" tabindex="427"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps37-b" name="ps37-b" value="0" onchange="cargar37a();getDefectos();" tabindex="428"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps37-c" name="ps37-c" value="0" onchange="cargar37a();getDefectos();" tabindex="429"/>
                                            </td>
                                        </tr>
                                        <tr>
                                           <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                           <td colspan="2" class="noborde formulario" style="position: relative;" >
                                            <div id="lineas-gr"></div>
                                            {{--  <div id="visualization18a" style="width: 40px; height: 160px;position:absolute;margin:0 0 0 105px;"></div>  --}}
                                            <div id="visualization37a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente37-a"><div id="furca37"></div></div>
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
                                                    <div id="visualization37b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente37b-a">
                                                        <div id="furca37-a"></div>
                                                        <div id="furca37-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Prof. de sondaje</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps37b-a" name="ps37b-a" value="0" onchange="cargar37b();getDefectos();" tabindex="475"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps37b-b" name="ps37b-b" value="0" onchange="cargar37b();getDefectos();" tabindex="476"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps37b-c" name="ps37b-c" value="0" onchange="cargar37b();getDefectos();" tabindex="477"/></td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg37b-a" name="mg37b-a" value="0" onchange="cargar37b();getDefectos();rangoNumeroMargen('mg37b-a');cargar37b();" tabindex="523"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg37b-b" name="mg37b-b" value="0" onchange="cargar37b();getDefectos();rangoNumeroMargen('mg37b-b');cargar37b();" tabindex="524"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg37b-c" name="mg37b-c" value="0" onchange="cargar37b();getDefectos();rangoNumeroMargen('mg37b-c');cargar37b();" tabindex="525"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="p37b-a"></div>
                                                    <div style="width: 30%;height: 25px;" id="p37b-b"></div>
                                                    <div <div style="width: 30%;height: 25px;" id="p37b-c"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="s37b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="s37b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="s37b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="su37b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="su37b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="su37b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Furca</td>
                                                <td class="borde"style="text-align:center">
                                                    <div style="width: 90%;height: 25px;margin-left: 7px" id="f37b-a"></div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Nota</td>
                                                <td class="borde">
                                                    <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n37" name="n37" tabindex="000"/>
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





