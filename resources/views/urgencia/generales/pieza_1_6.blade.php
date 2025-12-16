
    {{--  </head>  --}}
    <style>
        #i18,#i16,#i16,#i15,#i14,#i13,#i12,#i11{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente16-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-16.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i18b,#i16b,#i16b,#i15b,#i14b,#i13b,#i12b,#i11b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente16b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-16b.png') }}');
            width:54px;
            background-position: 0 23px;
            background-repeat: no-repeat;
        }
        ,#su16-a,#su16-b,#su16-c,#su16b-a,#su16b-b,#su16b-c:hover{
            background: #E6E6E6;
        }
       #i16-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #i16,#i16b,#f16,#s16-a,#su16-a,#su16-b,#su16-c,#su16b-a,#su16b-b,#su16b-c,#p16-a,#p16-b,#ae16-a,#ae16-b{

            border: 1px solid #C3C9C8;
            display: inline;
            float: left;
            height: 18px;
            margin: 1px;
            width: 23%;
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




        #tabla td.titulo
        {
            width : 0% !important;
        }

        #tabla td.formulario
        {
            min-width : auto !important;
        }

        #tabla td
        {
            height: 0px;

            vertical-align: left;
            width: 100%;
        }


        .titulo
        { color: #b12145 !important

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
                    <img src="{{ asset('images/dental/periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-16.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/tabla1/tachados/periodontograma-dientes-arriba-tachados-16.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-abajo-tornillo-16b.png') }}"/>
                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-16b.png') }}"/>
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
                                            <td class="borde formulario" ><div id="d16">1.6</div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Implante</td>
                                            <td class="borde"><div id="i16"></div></td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Movilidad</td>
                                            <td class="#" colspan="2">
                                                <input style="width: 20%;height: 25px; margin-left: 7px"  type="number" id="m16" name="m16" value="0" tabindex="2" onchange="rangoNumero('m16')"/>
                                                <input style="width: 73%;height: 25px; margin-left: 2px" type="text"  id="m16" name="m16" value="" placeholder="Observaciones" tabindex="1000"/>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="titulo">Pron&oacute;stico individual</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="text" id="pi16" name="pi16"  tabindex="19"/>

                                                {{--  <textarea name="" id="" cols="30" rows="2"></textarea>  --}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Furca</td>
                                            <td class="borde">
                                                <div style="width: 93%;height: 25px;margin-left: 7px" id="f16b-a"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Sangrado </td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="s16-a"></div>
                                                <div style="width: 30%;height: 25px;" id="s16-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="s16-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo"> Supuraci&oacute;n</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px;margin-left: 7px" id="su16-a"></div>
                                                <div style="width: 30%;height: 25px;" id="su16-b" ></div>
                                                <div style="width: 30%;height: 25px;" id="su16-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Higiene</td>
                                            <td class="borde formulario">
                                                <div style="width: 30%;height: 25px; margin-left: 7px" id="p16-a"></div>
                                                <div style="width: 30%;height: 25px;" id="p16-b"></div>
                                                <div style="width: 30%;height: 25px;" id="p16-c"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Plataforma</td>
                                            <td class="borde formulario">
                                                <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae16" name="ae16" value="" onchange="anchuraValor()" tabindex="35"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Altura  MG</td>
                                            <td class="borde formulario center">

                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg16-a" name="mg16-a" value="0" onchange="cargar16a();getDefectos();rangoNumeroMargen('mg16-a');cargar16a();" tabindex="55"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg16-b" name="mg16-b" value="0" onchange="cargar16a();getDefectos();rangoNumeroMargen('mg16-b');cargar16a();" tabindex="56"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="mg16-c" name="mg16-c" value="0" onchange="cargar16a();getDefectos();rangoNumeroMargen('mg16-c');cargar16a();" tabindex="57"/>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="titulo">Prof. de sondaje</td>
                                            <td class="borde formulario center" >
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps16-a" name="ps16-a" value="0" onchange="cargar16a();getDefectos();" tabindex="103"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps16-b" name="ps16-b" value="0" onchange="cargar16a();getDefectos();" tabindex="104"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps16-c" name="ps16-c" value="0" onchange="cargar16a();getDefectos();" tabindex="105"/>
                                            </td>
                                        </tr>
                                        <tr>
                                           <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                            <td colspan="2" class="noborde formulario" style="position: relative;" >
                                                <div id="lineas-gr"></div>
                                                {{--  <div id="visualization18a" style="width: 40px; height: 160px;position:absolute;margin:0 0 0 105px;"></div>  --}}
                                                <div id="visualization16a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente16-a"><div id="furca16"></div></div>
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
                            <form name ="grafico5" id="grafico5" action="#">
                                <table id="tabla" style="width: 100%">
                                    <tbody>
                                            <tr>
                                                <!--<td class="titulo" style="color:#565A5D">Palatino</td>-->
                                                <td colspan="2" class="noborde">
                                                    <div id="lineas-gr-inf"></div>
                                                    <div id="visualization16b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente16b-a">
                                                        <div id="furca16-a"></div>
                                                        <div id="furca16-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Prof. de sondaje</td>

                                                    <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps16b-a" name="ps16b-a" value="0" onchange="cargar16b();getDefectos();" tabindex="151"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps16b-b" name="ps16b-b" value="0" onchange="cargar16b();getDefectos();" tabindex="152"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps16b-c" name="ps16b-c" value="0" onchange="cargar16b();getDefectos();" tabindex="153"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number"  id="mg16b-a" name="mg16b-a" value="0" onchange="cargar16b();getDefectos();rangoNumeroMargen('mg16b-a');cargar16b();" tabindex="199"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg16b-b" name="mg16b-b" value="0" onchange="cargar16b();getDefectos();rangoNumeroMargen('mg16b-b');cargar16b();" tabindex="200"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="mg16b-c" name="mg16b-c" value="0" onchange="cargar16b();getDefectos();rangoNumeroMargen('mg16b-c');cargar16b();" tabindex="201"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="p16b-a"></div>
                                                    <div style="width: 30%;height: 25px;" id="p16b-b"></div>
                                                    <div <div style="width: 30%;height: 25px;" id="p16b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="su16b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="su16b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="su16b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 25px;margin-left: 7px" id="s16b-a"></div>
                                                    <div style="width: 30%;height: 25px;"id="s16b-b" ></div>
                                                    <div style="width: 30%;height: 25px;" id="s16b-c" ></div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="titulo">Furca</td>
                                                <td class="borde">
                                                    <div style="width: 20%;height: 25px;margin-left: 7px" id="f16b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f16b-b">F-2</div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Nota</td>
                                                <td class="borde">
                                                    <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n16" name="n16" tabindex="243"/></td>
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





