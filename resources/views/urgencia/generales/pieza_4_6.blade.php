
    {{--  </head>  --}}
    <style>
        #i18,#i17,#i16,#i15,#i14,#i13,#i12,#i11,#i21,#i22,#i23,#i24,#i25,#i26,#i27,#i28,#i48,#i47,#i46,#i45,#i44,#i43,#i42,#i41{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente46-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla5/periodontograma-dientes-arriba-46.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i18b,#i17b,#i16b,#i15b,#i14b,#i13b,#i12b,#i11b,#i21b,#i22b,#i23b,#i24b,#i25b,#i26b,#i27b,#i28b,#i48b,,#i47b,#i46b,,#i45b,#i44b,#i43b,#i42b,#i41b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente46b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla7/periodontograma-dientes-abajo-46b.png') }}');
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

        #tabla-1 td,  td,#tabla-3,td,#tabla-5
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


                    <img src="{{ asset('images/dental/periodontograma/img/tabla5/implantes/periodontograma-dientes-arriba-tornillo-46.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla5/tachados/periodontograma-dientes-arriba-tachados-46.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-46b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla7/tachados/periodontograma-dientes-abajo-tachados-46b.png') }}"/>



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
                                            <td class="borde"><div style="text-align: center" id="d46">4.6</div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Implante</td>
                                            <td class="borde"><div id="i46"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Movilidad</td>
                                            <td class="#" colspan="2">
                                                <input style="width: 20%;height: 25px; margin-left: 7px" type="number" id="m46" name="m46" value="0" tabindex="2" onchange="rangoNumero('m46')"/>
                                                <input style="width: 73%;height: 25px; margin-left: 2px" type="text"  id="m46" name="m46" value="" placeholder="Observaciones" tabindex="1"/>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="titulo">Pron&oacute;stico individual</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="text" id="pi46" name="pi46"  tabindex="547"/>

                                                {{--  <textarea name="" id="" cols="30" rows="2"></textarea>  --}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Furca</td>
                                            <td class="borde"><div id="f46"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Sangrado </td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="s46-a"></div>
                                                <div style="width: 30%;height: 25px;" id="s46-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="s46-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo"> Supuraci&oacute;n</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="su46-a"></div>
                                                <div style="width: 30%;height: 25px;" id="su46-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="su46-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Higiene</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px; margin-left: 7px" id="p46-a"></div>
                                                <div style="width: 30%;height: 25px;" id="p46-b"></div>
                                                <div style="width: 30%;height: 25px;" id="p46-c"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Plataforma</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae46" name="ae46" value="" onchange="anchuraValor()" tabindex="531"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Altura  MG</td>
                                            <td class="borde formulario center">

                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg46-a" name="mg46-a" value="0" onchange="cargar46a();getDefectos();rangoNumeroMargen('mg46-a');cargar46a();" tabindex="303"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg46-b" name="mg46-b" value="0" onchange="cargar46a();getDefectos();rangoNumeroMargen('mg46-b');cargar46a();" tabindex="304"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg46-c" name="mg46-c" value="0" onchange="cargar46a();getDefectos();rangoNumeroMargen('mg46-c');cargar46a();" tabindex="305"/>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Prof. de sondaje</td>
                                            <td class="borde formulario center" >
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps46-a" name="ps46-a" value="0" onchange="cargar46a();getDefectos();" tabindex="551"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps46-b" name="ps46-b" value="0" onchange="cargar46a();getDefectos();" tabindex="552"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps46-c" name="ps46-c" value="0" onchange="cargar46a();getDefectos();" tabindex="553"/>
                                            </td>
                                        </tr>
                                        <tr>
                                           <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                            <td colspan="2" class="noborde formulario" style="position: relative;" >
                                                <div id="lineas-gr"></div>
                                                {{--  <div id="visualization18a" style="width: 40px; height: 160px;position:absolute;margin:0 0 0 105px;"></div>  --}}
                                                <div id="visualization46a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente46-a"><div id="furca46"></div></div>
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
                                                    <div id="visualization46b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente46b-a">
                                                        <div id="furca46-a"></div>
                                                        <div id="furca46-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Prof. de sondaje</td>

                                                    <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps46b-a" name="ps46b-a" value="0" onchange="cargar46b();getDefectos();" tabindex="439"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps46b-b" name="ps46b-b" value="0" onchange="cargar46b();getDefectos();" tabindex="440"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps46b-c" name="ps46b-c" value="0" onchange="cargar46b();getDefectos();" tabindex="441"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number"  id="mg46b-a" name="mg46b-a" value="0" onchange="cargar46b();getDefectos();rangoNumeroMargen('mg46b-a');cargar46b();" tabindex="487"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg46b-b" name="mg46b-b" value="0" onchange="cargar46b();getDefectos();rangoNumeroMargen('mg46b-b');cargar46b();" tabindex="488"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg46b-c" name="mg46b-c" value="0" onchange="cargar46b();getDefectos();rangoNumeroMargen('mg46b-c');cargar46b();" tabindex="489"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="p46b-a"></div>
                                                    <div style="width: 30%;height: 25px;" id="p46b-b"></div>46
                                                    <div <div style="width: 30%;height: 25px;" id="p46b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="s46b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="p46b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="p46b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="su46b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="su46b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="su46b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Furca</td>
                                                <td class="borde">
                                                    <div style="width: 90%;height: 25px;margin-left: 7px" id="f46b-a"></div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Nota</td>
                                                <td class="borde">
                                                    <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n46" name="n46" tabindex="000"/></td>
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





