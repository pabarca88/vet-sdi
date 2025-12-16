
    {{--  </head>  --}}
    <style>
        #i17{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente17-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-17.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i17b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente17b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-17b.png') }}');
            width:54px;
            background-position: 0 23px;
            background-repeat: no-repeat;
        }
        #d17,#i17,#i17b,#f17,,#ae17-a,#ae17-b,#su17-a,#su17-b,#su17-c,:hover{
            background: #E6E6E6;
        }
        #i17-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f17{
            width: 95%;
            height: 18px;
            background: #f5c6c6;
            border: 1px solid #2cdcbf;
            background-repeat: no-repeat;
            float:left;
            display:inline;
        }
        #lineas-gr,#lineas-gr-inf{
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
        #pi17{
            width: 35px;
        }
        #furca17-a,#furca17-b{
            width: 18px;
            height: 18px;
            position: absolute;
        }
        #furca17-a{
            margin-top: 70px;
        }
        #furca17-b{
            margin-top: 80px;
            margin-left: 28px;
        }
        #tabla td.titulo
        {
            width : 0% !important;
        }

        #tabla td.formulario
        {
            min-width : auto !important;
        }

        #tabla td,  td,#tabla
        {
            height: 0px;

            vertical-align: left;
            width: 100%;
        }

        #tabla-3 td.titulo
        {
            width : 0% !important;
        }

        #tabla td.formulario
        {
            min-width : auto !important;
        }
        .f17,{
            width: 100%;
            height: 18px;
            background: #f5c6c6;
            border: 1px solid #2cdcbf;
            background-repeat: no-repeat;
            float:left;
            display:inline;
        }
        .titulo{
            text-align: left;
           padding-right: 5px;
           font-weight:bold;
           color:rgb(39, 41, 47);
        }
        .borde{
                border: 1px solid #a4a4a4;
                padding: 1px;
                text-align: center;
            }
        .noborde{
                /*padding:2px 0 7px;*/
                margin:0;
                text-align: center;
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


                    <img src="{{ asset('images/dental/periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-17.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla1/tachados/periodontograma-dientes-arriba-tachados-17.png') }}"/>


                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-abajo-tornillo-17b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-abajo-tachados-17b.png') }}"/>



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
                                <table id="tabla" style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <td class="titulo"></td>
                                            <td class="borde formulario" ><div id="d17">1.7</div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Implante</td>
                                            <td class="borde formulario"><div id="i17"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Movilidad</td>
                                            <td class="#" colspan="2">
                                                <input style="width: 20%;height: 25px; margin-left: 7px" type="number"  id="m17" name="m17" value="0" tabindex="1" onchange="rangoNumero('m17');"/>
                                                <input style="width: 73%;height: 25px; margin-left: 2px" type="text"  id="m17" name="m17" value="" placeholder="Observaciones" tabindex="1"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Pron&oacute;stico </td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="text" id="pi17" name="pi17"  tabindex="17"/>
                                                {{--  <textarea name="" id="" cols="30" rows="2"></textarea>  --}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Furca</td>
                                            <td class="borde"><div id="f17"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Sangrado </td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 20px;margin-left: 7px" id="s17-a"></div>
                                                <div style="width: 30%;height: 20px;" id="s17-b" ></div>
                                                <div style="width: 30%;height: 20px;" id="s17-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo"> Supuraci&oacute;n</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 20px;margin-left: 7px" id="su17-a"></div>
                                                <div style="width: 30%;height: 20px;" id="su17-b" ></div>
                                                <div style="width: 30%;height: 20px;" id="su17-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Higiene</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 20px; margin-left: 7px" id="p17-a"></div>
                                                <div style="width: 30%;height: 20px;" id="p17-b"></div>
                                                <div style="width: 30%;height: 20px;" id="p17-c"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Plataforma</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae17" name="ae17" value="" onchange="anchuraValor()" tabindex="33"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Altura  MG</td>
                                            <td class="borde formulario center">
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg17-a" name="mg17-a" value="0" onchange="cargar17a();getDefectos();rangoNumeroMargen('mg17-a');cargar17a();" tabindex="49"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg17-b" name="mg17-b" value="0" onchange="cargar17a();getDefectos();rangoNumeroMargen('mg17-b');cargar17a();" tabindex="50"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg17-c" name="mg17-c" value="0" onchange="cargar17a();getDefectos();rangoNumeroMargen('mg17-c');cargar17a();" tabindex="51"/>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">P sondaje</td>
                                            <td class="borde formulario center" >
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps17-a" name="ps17-a" value="0" onchange="cargar17a();getDefectos();" tabindex="97"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps17-b" name="ps17-b" value="0" onchange="cargar17a();getDefectos();" tabindex="98"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps17-c" name="ps17-c" value="0" onchange="cargar17a();getDefectos();" tabindex="99"/>
                                            </td>
                                        </tr>
                                        <tr>
                                           <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                           <td colspan="2" class="noborde formulario" style="position: relative;" >
                                            <div id="lineas-gr"></div>
                                            {{--  <div id="visualization17a" style="width: 40px; height: 160px;position:absolute;margin:0 0 0 105px;"></div>  --}}
                                            <div id="visualization17a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente17-a"><div id="furca17"></div></div>
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
                                <table id="tabla" style="width: 100%">
                                    <tbody>
                                            <tr>
                                                <!--<td class="titulo" style="color:#565A5D">Palatino</td>-->
                                                <td colspan="2" class="noborde">
                                                    <div id="lineas-gr-inf"></div>
                                                    <div id="visualization17b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente17b-a">
                                                        <div id="furca17-a"></div>
                                                        <div id="furca17-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">P. sondaje</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps17b-a" name="ps17b-a" value="0" onchange="cargar17b();getDefectos();" tabindex="145"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps17b-b" name="ps17b-b" value="0" onchange="cargar17b();getDefectos();" tabindex="146"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps17b-c" name="ps17b-c" value="0" onchange="cargar17b();getDefectos();" tabindex="147"/></td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg17b-a" name="mg17b-a" value="0" onchange="cargar17b();getDefectos();rangoNumeroMargen('mg17b-a');cargar17b();" tabindex="193"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg17b-b" name="mg17b-b" value="0" onchange="cargar17b();getDefectos();rangoNumeroMargen('mg17b-b');cargar17b();" tabindex="194"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg17b-c" name="mg17b-c" value="0" onchange="cargar17b();getDefectos();rangoNumeroMargen('mg17b-c');cargar17b();" tabindex="195"/>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="s17b-a"></div>
                                                    <div style="width: 30%;height: 20px;"id="s17b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="s17b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="su17b-a"></div>
                                                    <div style="width: 30%;height: 20px;"id="su17b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="su17b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="p17b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="p17b-b"></div>
                                                    <div style="width: 30%;height: 20px;" id="p17b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Furca</td>
                                                <td class="borde"style="text-align:center">
                                                    <div style="width: 45%;height: 25px;margin-left: 7px" id="f17b-a">F-1</div><div style="width: 45%;height: 25px;margin-left: 7px" id="f17b-b">F-2</div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Nota</td>
                                                <td class="borde">
                                                    <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n17" name="n17" tabindex="257"/>
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





