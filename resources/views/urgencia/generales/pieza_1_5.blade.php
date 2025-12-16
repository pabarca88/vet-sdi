
{{--  </head>  --}}
    <style>
        #i18,#i17,#i16,#i15,#i14,#i13,#i12,#i11{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente15-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-15.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i18b,#i17b,#i16b,#i15b,#i14b,#i13b,#i12b,#i11b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente15b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-15b.png') }}');
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
                <img src="{{ asset('images/dental/periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-15.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/tabla1/tachados/periodontograma-dientes-arriba-tachados-15.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-15b.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-15b.png') }}"/>
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
                                        <td class="borde formulario" ><div id="d15">1.5</div></td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Implante</td>
                                        <td class="borde formulario"><div id="i15"></div></td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Movilidad</td>
                                        <td class="#" colspan="2">
                                            <input style="width: 20%;height: 25px; margin-left: 7px" type="number"  id="m15" name="m15" value="0" tabindex="1" onchange="rangoNumero('m15');"/>
                                            <input style="width: 73%;height: 25px; margin-left: 2px" type="text"  id="m15" name="m15" value="" placeholder="Observaciones" tabindex="1000"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Pron&oacute;stico individual</td>
                                        <td class="borde formulario">
                                            <input style="width: 93%;height: 25px; margin-left: 7px" type="text" id="pi15" name="pi15"  tabindex="20"/>
                                            {{--  <textarea name="" id="" cols="30" rows="2"></textarea>  --}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Sangrado </td>
                                        <td class="borde formulario">
                                            <div style="width: 30%;height: 25px;margin-left: 7px" id="s15-a"></div>
                                            <div style="width: 30%;height: 25px;" id="s15-b" ></div>
                                            <div style="width: 30%;height: 25px;" id="s15-c" ></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo"> Supuraci&oacute;n</td>
                                        <td class="borde formulario">
                                            <div style="width: 30%;height: 25px;margin-left: 7px" id="su15-a"></div>
                                            <div style="width: 30%;height: 25px;" id="su15-b" ></div>
                                            <div style="width: 30%;height: 25px;" id="su15-c" ></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Higiene</td>
                                        <td class="borde formulario">
                                            <div style="width: 30%;height: 25px; margin-left: 7px" id="p15-a"></div>
                                            <div style="width: 30%;height: 25px;" id="p15-b"></div>
                                            <div style="width: 30%;height: 25px;" id="p15-c"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Plataforma</td>
                                        <td class="borde formulario">
                                            <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae15" name="ae15" value="" onchange="anchuraValor()" tabindex="36"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Altura  MG</td>
                                        <td class="borde formulario center">
                                            <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg15-a" name="mg15-a" value="0" onchange="cargar15a();getDefectos();rangoNumeroMargen('mg15-a');cargar15a();" tabindex="58"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="mg15-b" name="mg15-b" value="0" onchange="cargar15a();getDefectos();rangoNumeroMargen('mg15-b');cargar15a();" tabindex="59"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="mg15-c" name="mg15-c" value="0" onchange="cargar15a();getDefectos();rangoNumeroMargen('mg15-c');cargar15a();" tabindex="60"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Profundidad de sondaje</td>
                                        <td class="borde formulario center" >
                                            <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps15-a" name="ps15-a" value="0" onchange="cargar15a();getDefectos();" tabindex="106"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="ps15-b" name="ps15-b" value="0" onchange="cargar15a();getDefectos();" tabindex="107"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="ps15-c" name="ps15-c" value="0" onchange="cargar15a();getDefectos();" tabindex="108"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                        <td colspan="2" class="noborde formulario" style="position: relative;" >
                                         <div id="lineas-gr"></div>
                                         {{--  <div id="visualization18a" style="width: 40px; height: 160px;position:absolute;margin:0 0 0 105px;"></div>  --}}
                                         <div id="visualization15a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                         <div id="diente15-a"><div id="furca15"></div></div>
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
                                            <div id="visualization15b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente15b-a">
                                                <div id="furca15-a"></div>
                                                <div id="furca15-b"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Profundidad de sondaje</td>
                                        <td class="borde">
                                            <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps15b-a" name="ps15b-a" value="0" onchange="cargar15b();getDefectos();" tabindex="154"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="ps15b-b" name="ps15b-b" value="0" onchange="cargar15b();getDefectos();" tabindex="155"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="ps15b-c" name="ps15b-c" value="0" onchange="cargar15b();getDefectos();" tabindex="156"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Altura MG</td>
                                        <td class="borde">
                                            <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg15b-a" name="mg15b-a" value="0" onchange="cargar15b();getDefectos();rangoNumeroMargen('mg15b-a');cargar15b();" tabindex="202"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="mg15b-b" name="mg15b-b" value="0" onchange="cargar15b();getDefectos();rangoNumeroMargen('mg15b-b');cargar15b();" tabindex="203"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="mg15b-c" name="mg15b-c" value="0" onchange="cargar15b();getDefectos();rangoNumeroMargen('mg15b-c');cargar15b();" tabindex="204"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Higiene</td>
                                        <td class="borde">
                                            <div style="width: 30%;height: 25px;margin-left: 7px" id="p15b-a"></div>
                                            <div style="width: 30%;height: 25px;" id="p15b-b"></div>
                                            <div <div style="width: 30%;height: 25px;" id="p15b-c"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Sangrado </td>
                                        <td class="borde">
                                            <div style="width: 30%;height: 25px;margin-left: 7px" id="s15b-a"></div>
                                            <div style="width: 30%;height: 25px;"id="s15b-b" ></div>
                                            <div style="width: 30%;height: 25px;" id="s15b-c" ></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Supuraci&oacute;n</td>
                                        <td class="borde">
                                            <div style="width: 30%;height: 25px;margin-left: 7px" id="su15b-a"></div>
                                            <div style="width: 30%;height: 25px;"id="su15b-b" ></div>
                                            <div style="width: 30%;height: 25px;" id="su15b-c" ></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Nota</td>
                                        <td class="borde">
                                            <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n15" name="n15" tabindex="244"/>
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





