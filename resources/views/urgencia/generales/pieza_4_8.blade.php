
    {{--  </head>  --}}
    <style>
        #i18,#i17,#i16,#i15,#i14,#i13,#i12,#i11,#i21,#i22,#i23,#i24,#i25,#i26,#i27,#i28,#i48{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente48-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla5/periodontograma-dientes-arriba-48.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i18b,#i17b,#i16b,#i15b,#i14b,#i13b,#i12b,#i11b,#i21b,#i22b,#i23b,#i24b,#i25b,#i26b,#i27b,#i28b,#i48b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente48b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla7/periodontograma-dientes-abajo-48b.png') }}');
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


                    <img src="{{ asset('images/dental/periodontograma/img/tabla5/implantes/periodontograma-dientes-arriba-tornillo-48.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla5/tachados/periodontograma-dientes-arriba-tachados-48.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-48b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla7/tachados/periodontograma-dientes-abajo-tachados-48b.png') }}"/>



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
                                            <td class="borde formulario" ><div id="d48">4.8</div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Implante</td>
                                            <td class="borde formulario"><div id="i48"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Movilidad</td>
                                            <td class="#" colspan="2">
                                                <input style="width: 20%;height: 25px; margin-left: 7px" type="number"  id="m48" name="m48" value="0" tabindex="1" onchange="rangoNumero('m48');"/>
                                                <input style="width: 73%;height: 25px; margin-left: 2px" type="text"  id="m48" name="m48" value="" placeholder="Observaciones" tabindex="1000"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Pron&oacute;stico individual</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="text" id="pi48" name="pi48"  tabindex="545"/>
                                                {{--  <textarea name="" id="" cols="30" rows="2"></textarea>  --}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Furca</td>
                                            <td class="borde"><div id="f48"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Sangrado </td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="s48-a"></div>
                                                <div style="width: 30%;height: 25px;" id="s48-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="s48-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo"> Supuraci&oacute;n</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="su48-a"></div>
                                                <div style="width: 30%;height: 25px;" id="su48-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="su48-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Higiene</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px; margin-left: 7px" id="p48-a"></div>
                                                <div style="width: 30%;height: 25px;" id="p48-b"></div>
                                                <div style="width: 30%;height: 25px;" id="p48-c"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Plataforma</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae48" name="ae48" value="" onchange="anchuraValor()" tabindex="529"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Altura  MG</td>
                                            <td class="borde formulario center">
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg48-a" name="mg48-a" value="0" onchange="cargar48a();getDefectos();rangoNumeroMargen('mg48-a');cargar48a();" tabindex="297"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg48-b" name="mg48-b" value="0" onchange="cargar48a();getDefectos();rangoNumeroMargen('mg48-b');cargar48a();" tabindex="298"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg48-c" name="mg48-c" value="0" onchange="cargar48a();getDefectos();rangoNumeroMargen('mg48-c');cargar48a();" tabindex="299"/>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Prof. de sondaje</td>
                                            <td class="borde formulario center" >
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps48-a" name="ps48-a" value="0" onchange="cargar48a();getDefectos();" tabindex="345"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps48-b" name="ps48-b" value="0" onchange="cargar48a();getDefectos();" tabindex="346"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps48-c" name="ps48-c" value="0" onchange="cargar48a();getDefectos();" tabindex="347"/>
                                            </td>
                                        </tr>
                                        <tr>
                                           <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                           <td colspan="2" class="noborde formulario" style="position: relative;" >
                                            <div id="lineas-gr"></div>
                                            {{--  <div id="visualization18a" style="width: 40px; height: 160px;position:absolute;margin:0 0 0 105px;"></div>  --}}
                                            <div id="visualization48a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente48-a"><div id="furca48"></div></div>
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
                                                    <div id="visualization48b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente48b-a">
                                                        <div id="furca48-a"></div>
                                                        <div id="furca48-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Prof. de sondaje</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps48b-a" name="ps48b-a" value="0" onchange="cargar48b();getDefectos();" tabindex="433"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps48b-b" name="ps48b-b" value="0" onchange="cargar48b();getDefectos();" tabindex="434"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps48b-c" name="ps48b-c" value="0" onchange="cargar48b();getDefectos();" tabindex="435"/></td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg48b-a" name="mg48b-a" value="0" onchange="cargar48b();getDefectos();rangoNumeroMargen('mg48b-a');cargar48b();" tabindex="481"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg48b-b" name="mg48b-b" value="0" onchange="cargar48b();getDefectos();rangoNumeroMargen('mg48b-b');cargar48b();" tabindex="482"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg48b-c" name="mg48b-c" value="0" onchange="cargar48b();getDefectos();rangoNumeroMargen('mg48b-c');cargar48b();" tabindex="483"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="p48b-a"></div>
                                                    <div style="width: 30%;height: 25px;" id="p48b-b"></div>
                                                    <div <div style="width: 30%;height: 25px;" id="p48b-c"></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="s48b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="s48b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="s48b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="su48b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="su48b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="su48b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Furca</td>
                                                <td class="borde"style="text-align:center">
                                                    <div style="width: 90%;height: 25px;margin-left: 7px" id="f48b-a"></div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Nota</td>
                                                <td class="borde">
                                                    <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n48" name="n48" tabindex="000"/>
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





