
{{--  </head>  --}}
    <style>
        #i18,#i17,#i16,#i15,#i14,#i13,#i12,#i11{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente14-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-14.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i18b,#i17b,#i16b,#i15b,#i14b,#i13b,#i12b,#i11b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente14b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-14b.png') }}');
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
                <img src="{{ asset('images/dental/periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-14.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/tabla1/tachados/periodontograma-dientes-arriba-tachados-14.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-14b.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-14b.png') }}"/>
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
                                        <td class="borde formulario" ><div id="d14">1.4</div></td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Implante</td>
                                        <td class="borde formulario"><div id="i14"></div></td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Movilidad</td>
                                        <td class="#" colspan="2">
                                            <input style="width: 20%;height: 25px; margin-left: 7px" type="number"  id="m14" name="m14" value="0" tabindex="1" onchange="rangoNumero('m14');"/>
                                            <input style="width: 73%;height: 25px; margin-left: 2px" type="text"  id="m14" name="m14" value="" placeholder="Observaciones" tabindex="1000"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Pron&oacute;stico individual</td>
                                        <td class="borde formulario">
                                            <input style="width: 93%;height: 25px; margin-left: 7px" type="text" id="pi14" name="pi14"  tabindex="21"/>
                                            {{--  <textarea name="" id="" cols="30" rows="2"></textarea>  --}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Sangrado </td>
                                        <td class="borde formulario">
                                            <div style="width: 30%;height: 25px;margin-left: 7px" id="s14-a"></div>
                                            <div style="width: 30%;height: 25px;" id="s14-b" ></div>
                                            <div style="width: 30%;height: 25px;" id="s14-c" ></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo"> Supuraci&oacute;n</td>
                                        <td class="borde formulario">
                                            <div style="width: 30%;height: 25px;margin-left: 7px" id="su14-a"></div>
                                            <div style="width: 30%;height: 25px;" id="su14-b" ></div>
                                            <div style="width: 30%;height: 25px;" id="su14-c" ></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Higiene</td>
                                        <td class="borde formulario">
                                            <div style="width: 30%;height: 25px; margin-left: 7px" id="p14-a"></div>
                                            <div style="width: 30%;height: 25px;" id="p14-b"></div>
                                            <div style="width: 30%;height: 25px;" id="p14-c"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Plataforma</td>
                                        <td class="borde formulario">
                                            <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae14" name="ae14" value="" onchange="anchuraValor()" tabindex="37"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Altura  MG</td>
                                        <td class="borde formulario center">
                                            <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg14-a" name="mg14-a" value="0" onchange="cargar14a();getDefectos();rangoNumeroMargen('mg14-a');cargar14a();" tabindex="61"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="mg14-b" name="mg14-b" value="0" onchange="cargar14a();getDefectos();rangoNumeroMargen('mg14-b');cargar14a();" tabindex="62"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="mg14-c" name="mg14-c" value="0" onchange="cargar14a();getDefectos();rangoNumeroMargen('mg14-c');cargar14a();" tabindex="63"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Prof. de sondaje</td>
                                        <td class="borde formulario center" >
                                            <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps14-a" name="ps14-a" value="0" onchange="cargar14a();getDefectos();" tabindex="109"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="ps14-b" name="ps14-b" value="0" onchange="cargar14a();getDefectos();" tabindex="110"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="ps14-c" name="ps14-c" value="0" onchange="cargar14a();getDefectos();" tabindex="111"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                        <td colspan="2" class="noborde formulario" style="position: relative;" >
                                         <div id="lineas-gr"></div>
                                         {{--  <div id="visualization18a" style="width: 40px; height: 160px;position:absolute;margin:0 0 0 105px;"></div>  --}}
                                         <div id="visualization14a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                         <div id="diente14-a"><div id="furca14"></div></div>
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
                                            <div id="visualization14b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente15b-a">
                                                <div id="furca14-a"></div>
                                                <div id="furca14-b"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Prof. de sondaje</td>
                                        <td class="borde">
                                            <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps14b-a" name="ps14b-a" value="0" onchange="cargar14b();getDefectos();" tabindex="109"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="ps14b-b" name="ps14b-b" value="0" onchange="cargar14b();getDefectos();" tabindex="110"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="ps14b-c" name="ps14b-c" value="0" onchange="cargar14b();getDefectos();" tabindex="111"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Altura MG</td>
                                        <td class="borde">
                                            <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg14b-a" name="mg14b-a" value="0" onchange="cargar14b();getDefectos();rangoNumeroMargen('mg14b-a');cargar14b();" tabindex="205"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="mg14b-b" name="mg14b-b" value="0" onchange="cargar14b();getDefectos();rangoNumeroMargen('mg14b-b');cargar14b();" tabindex="206"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="mg14b-c" name="mg14b-c" value="0" onchange="cargar14b();getDefectos();rangoNumeroMargen('mg14b-c');cargar14b();" tabindex="207"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Higiene</td>
                                        <td class="borde">
                                            <div style="width: 30%;height: 25px;margin-left: 7px" id="p14b-a"></div>
                                            <div style="width: 30%;height: 25px;" id="p14b-b"></div>
                                            <div <div style="width: 30%;height: 25px;" id="p14b-c"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Sangrado </td>
                                        <td class="borde">
                                            <div style="width: 30%;height: 25px;margin-left: 7px" id="s14b-a"></div>
                                            <div style="width: 30%;height: 25px;"id="s14b-b" ></div>
                                            <div style="width: 30%;height: 25px;" id="s14b-c" ></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Supuraci&oacute;n</td>
                                        <td class="borde">
                                            <div style="width: 30%;height: 25px;margin-left: 7px" id="su14b-a"></div>
                                            <div style="width: 30%;height: 25px;"id="su14b-b" ></div>
                                            <div style="width: 30%;height: 25px;" id="su14b-c" ></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Nota</td>
                                        <td class="borde">
                                            <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n14" name="n14" tabindex="245"/>
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





