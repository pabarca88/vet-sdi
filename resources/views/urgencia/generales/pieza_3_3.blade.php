
    {{--  </head>  --}}
    <style>
        #i31,#i32,#i33,#i34,#i35,#i36,#i37,#i38{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente33-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla6/periodontograma-dientes-arriba-33.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i38b,#i37b,#i36b,#i35b,#i34b,#i33b,#i32b,#i31b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente33b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla8/periodontograma-dientes-abajo-33b.png') }}');
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


                    <img src="{{ asset('images/dental/periodontograma/img/tabla6/implantes/periodontograma-dientes-arriba-tornillo-33.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla6/tachados/periodontograma-dientes-arriba-tachados-33.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-33b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla8/tachados/periodontograma-dientes-abajo-tachados-33b.png') }}"/>



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
                                            <td class="borde"><div style="text-align: center" id="d33">3.3</div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Implante</td>
                                            <td class="borde"><div id="i33"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Movilidad</td>
                                            <td class="#" colspan="2">
                                                <input style="width: 20%;height: 25px; margin-left: 7px" type="number" id="m33" name="m33" value="0" tabindex="2" onchange="rangoNumero('m33')"/>
                                                <input style="width: 73%;height: 25px; margin-left: 2px" type="text"  id="m33" name="m33" value="" placeholder="Observaciones" tabindex="1"/>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="titulo">Pron&oacute;stico individual</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="text" id="pi33" name="pi33"  tabindex="555"/>

                                                {{--  <textarea name="" id="" cols="30" rows="2"></textarea>  --}}
                                            </td>

                                        </tr>

                                        <tr>
                                            <td class="titulo">Sangrado </td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="s33-a"></div>
                                                <div style="width: 30%;height: 25px;" id="s33-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="s33-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo"> Supuraci&oacute;n</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="su33-a"></div>
                                                <div style="width: 30%;height: 25px;" id="su33-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="su33-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Higiene</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px; margin-left: 7px" id="p33-a"></div>
                                                <div style="width: 30%;height: 25px;" id="p33-b"></div>
                                                <div style="width: 30%;height: 25px;" id="p33-c"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Plataforma</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae33" name="ae33" value="" onchange="anchuraValor()" tabindex="539"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Altura  MG</td>
                                            <td class="borde formulario center">

                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg33-a" name="mg33-a" value="0" onchange="cargar33a();getDefectos();rangoNumeroMargen('mg33-a');cargar33a();" tabindex="327"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg33-b" name="mg33-b" value="0" onchange="cargar33a();getDefectos();rangoNumeroMargen('mg33-b');cargar33a();" tabindex="328"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg33-c" name="mg33-c" value="0" onchange="cargar33a();getDefectos();rangoNumeroMargen('mg33-c');cargar33a();" tabindex="329"/>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Prof. de sondaje</td>
                                            <td class="borde formulario center" >
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps33-a" name="ps33-a" value="0" onchange="cargar33a();getDefectos();" tabindex="415"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps33-b" name="ps33-b" value="0" onchange="cargar33a();getDefectos();" tabindex="416"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps33-c" name="ps33-c" value="0" onchange="cargar33a();getDefectos();" tabindex="417"/>
                                            </td>
                                        </tr>
                                        <tr>
                                           <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                            <td colspan="2" class="noborde formulario" style="position: relative;" >
                                                <div id="lineas-gr"></div>
                                                {{--  <div id="visualization18a" style="width: 40px; height: 160px;position:absolute;margin:0 0 0 105px;"></div>  --}}
                                                <div id="visualization33a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente33-a"><div id="furca33"></div></div>
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
                                                    <div id="visualization33b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente33b-a">
                                                        <div id="furca33-a"></div>
                                                        <div id="furca33-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Prof. de sondaje</td>

                                                    <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps33b-a" name="ps33b-a" value="0" onchange="cargar33b();getDefectos();" tabindex="463"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps33b-b" name="ps33b-b" value="0" onchange="cargar33b();getDefectos();" tabindex="464"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps33b-c" name="ps33b-c" value="0" onchange="cargar33b();getDefectos();" tabindex="465"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number"  id="mg33b-a" name="mg33b-a" value="0" onchange="cargar33b();getDefectos();rangoNumeroMargen('mg33b-a');cargar33b();" tabindex="511"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg33b-b" name="mg33b-b" value="0" onchange="cargar33b();getDefectos();rangoNumeroMargen('mg33b-b');cargar33b();" tabindex="512"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg33b-c" name="mg33b-c" value="0" onchange="cargar33b();getDefectos();rangoNumeroMargen('mg33b-c');cargar33b();" tabindex="513"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="p33b-a"></div>
                                                    <div style="width: 30%;height: 25px;" id="p33b-b"></div>33
                                                    <div <div style="width: 30%;height: 25px;" id="p33b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="s33b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="p33b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="p33b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="su33b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="su33b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="su33b-c" ></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="titulo">Nota</td>
                                                <td class="borde">
                                                    <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n33" name="n33" tabindex="000"/></td>
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





