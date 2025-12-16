  {{--  </head>  --}}
  <style>
    #i37{
    background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente37-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla6/periodontograma-dientes-arriba-37.png') }}');
        width:60px;
        background-position: 0px -2px;
        background-repeat: no-repeat;
    }


    #i37b{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente37b-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla8/periodontograma-dientes-abajo-37b.png') }}');
        width:70px;
        background-position: 0 23px;
        background-repeat: no-repeat;
    }
    #d37,#i37,#i37b,#f37,,#ae37-a,#ae37-b:hover{
        background: #E6E6E6;
    }
    #i37-implante{
        display:none;
        background: #000000;
        width: 8px;
        height:8px;
        margin: -12px 20px;
        position: absolute;
        cursor: pointer;
    }
    #f37{
        width: 95%;
        height: 18px;

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
    #pi37{
        width: 100%;
    }
    #furca37-a,#furca37-b{
        width: 16px;
        height: 16px;
        position: absolute;
    }
    #furca37-a{
        margin-top: 70px;
    }
    #furca37-b{
        margin-top: 80px;
        margin-left: 28px;
    }

    .f37,{
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



    }

</style>
   @php
        $pieza37 = $piezas_periodonto->firstWhere('pieza', '37');
        $cuerpo37 = $pieza37 ? $pieza37->cuerpo : [];
        $pronostico37 = $cuerpo37['pronostico'] ?? '';
    @endphp
<div class="col-md-12 bg-white shadow-sm rounded mx-1">
    <div class="col-md-12">
        <div class="row">

            <div style="display:none">
                <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl37.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau37.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-37b.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-37b.png') }}"/>
            </div>
        </div>

    </div>
</div>

<!--LADO IZQ-->
<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Vestibular (3.7)</h5>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-4">
                            <form name ="grafico1" id="grafico1" action="#">
                                <table id="tabla" style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                            <td colspan="2" class="noborde formulario" style="position: relative;" >
                                            <div id="lineas-gr"></div>

                                            <div id="visualization37a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente37-a"><div id="furca37"></div></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>

                        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">

                            <form name ="grafico1" id="grafico1" action="#">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-6 my-2">
                                        <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d37">Diente ausente</div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-2">
                                         <div class="form-group">
                                            <label class="floating-label-activo-sm"></label>
                                            <div class="py-2 border input-dental rounded" id="i37">Marcar Implante</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Movilidad</label>
                                            <input  class="form-control form-control-xs"  type="number"  id="m37" name="m37" value="{{ $cuerpo37["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m37');"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Pronóstico</label>
                                            <select class="form-control form-control-xs" name="pi37" id="pi37">
                                                <option value="B" {{ $pronostico37 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                <option value="D" {{ $pronostico37 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                <option value="M" {{ $pronostico37 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                <option value="I" {{ $pronostico37 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Furca</label>
                                            <div class="border rounded input-dental pointer w-100" id="f37"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s37-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s37-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s37-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su37-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su37-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su37-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p37-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p37-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p37-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control form-control-xs" type="number" id="ae37" name="ae37" value="{{ $cuerpo37["plataforma"] ?? 0 }}" tabindex="33"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg37-a" name="mg37-a" value="{{ $cuerpo37["vest_altura_mg_a"] ?? 0 }}" onchange="cargar37a();getDefectos();rangoNumeroMargen('mg37-a');cargar37a();" tabindex="49"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg37-b" name="mg37-b" value="{{ $cuerpo37["vest_altura_mg_b"] ?? 0 }}" onchange="cargar37a();getDefectos();rangoNumeroMargen('mg37-b');cargar37a();" tabindex="50"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg37-c" name="mg37-c" value="{{ $cuerpo37["vest_altura_mg_c"] ?? 0 }}" onchange="cargar37a();getDefectos();rangoNumeroMargen('mg37-c');cargar37a();" tabindex="50"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps37-a" name="ps37-a" value="{{ $cuerpo37["vest_psondaje_a"] ?? 0 }}" onchange="cargar37a();getDefectos();" tabindex="97"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps37-b" name="ps37-b" value="{{ $cuerpo37["vest_psondaje_b"] ?? 0 }}" onchange="cargar37a();getDefectos();" tabindex="98"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps37-c" name="ps37-c" value="{{ $cuerpo37["vest_psondaje_c"] ?? 0 }}" onchange="cargar37a();getDefectos();" tabindex="99"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Palatino (3.7)</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-4">
                            <form name ="grafico3" id="grafico3" action="#">
                                <table id="tabla" style="width: 100%">
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
                                           <!-- <tr>
                                                <td class="titulo">P. sondaje</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps37b-a" name="ps37b-a" value="0" onchange="cargar37b();getDefectos();" tabindex="145"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps37b-b" name="ps37b-b" value="0" onchange="cargar37b();getDefectos();" tabindex="146"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps37b-c" name="ps37b-c" value="0" onchange="cargar37b();getDefectos();" tabindex="147"/></td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <div class="row">
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg37b-a" name="mg37b-a" value="0" onchange="cargar37b();getDefectos();rangoNumeroMargen('mg37b-a');cargar37b();" tabindex="193"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  type="number" id="mg37b-b" name="mg37b-b" value="0" onchange="cargar37b();getDefectos();rangoNumeroMargen('mg37b-b');cargar37b();" tabindex="194"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg37b-c" name="mg37b-c" value="0" onchange="cargar37b();getDefectos();rangoNumeroMargen('mg37b-c');cargar37b();" tabindex="195"/>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="s37b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="s37b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="s37b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="su37b-a"></div>
                                                    <div style="width: 30%;height: 20px;"id="su37b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="su37b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="p37b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="p37b-b"></div>
                                                    <div style="width: 30%;height: 20px;" id="p37b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Furca</td>
                                                <td class="borde"style="text-align:center">
                                                    <div style="width: 20%;height: 25px;margin-left: 7px" id="f37b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f37b-b">F-2</div>

                                                </td>
                                            </tr>-->

                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <form class="pl-2" name ="grafico3" id="grafico3" action="#">
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps37b-a" name="ps37b-a" value="{{ $cuerpo37["pala_psondaje_a"] ?? 0 }}" onchange="cargar37b();getDefectos();" tabindex="145"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps37b-b" name="ps37b-a" value="{{ $cuerpo37["pala_psondaje_b"] ?? 0 }}" onchange="cargar37b();getDefectos();" tabindex="146"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps37b-c" name="ps37b-a" value="{{ $cuerpo37["pala_psondaje_c"] ?? 0 }}" onchange="cargar37b();getDefectos();" tabindex="147"//>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg37b-a" name="mg37b-a" value="{{ $cuerpo37["pala_altura_mg_a"] ?? 0 }}" onchange="cargar37b();getDefectos();rangoNumeroMargen('mg37b-a');cargar37b();" tabindex="193"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg37b-b" name="mg37b-b" value="{{ $cuerpo37["pala_altura_mg_b"] ?? 0 }}" onchange="cargar37b();getDefectos();rangoNumeroMargen('mg37b-b');cargar37b();" tabindex="194"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg37b-c" name="mg37b-c" value="{{ $cuerpo37["pala_altura_mg_c"] ?? 0 }}" onchange="cargar37b();getDefectos();rangoNumeroMargen('mg37b-c');cargar37b();" tabindex="195"/>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s37b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s37b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s37b-c"></div>
                                    </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su37b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su37b-b" ></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su37b-c"></div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p37b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p37b-b"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p37b-c"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Furca</h6>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <div class="border rounded input-dental pointer w-100" id="f37b-a"></div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" id="obs_pieza3.7">
                        <label class="floating-label-activo-sm">Obs. Pieza 3.7</label>
                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 3.7" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_37" id="obs_37" placeholder="Describa observaciones">{{ $cuerpo37["observaciones"] ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--FORMULARIO DE OBS. Y BOTÓN GUARDAR-->

<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
    <div id="obs_pieza3.7">
            <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('37')"><i class="feather icon-save"></i>  Guardar evaluación 3.7</button>
    </div>
</div>

<script>

$(document).ready(function() {
    // Handler for .ready() called.
    //anchuraValor();
    cargar37a();
    cargar37b();

});
function rangoNumero(campo){
    var dato=document.getElementById(campo).value;
    dato= parseInt(dato);
    //alert(dato);
    if(dato<(-3) || dato>3){
        alert("El dato de movilidad debe estar comprendido entre -3 y +3");
        document.getElementById(campo).value='0';
    }
}

function rangoNumeroMargen(campo){
    var dato=document.getElementById(campo).value;
    dato= parseInt(dato);
    //alert(dato);
    if(dato<(-9) || dato>9){
        alert("El dato de margen gingival debe estar comprendido entre -9 y +9");
        document.getElementById(campo).value='0';
    }

}

function drawVisualization37a(data37a) {
    // Create and draw the visualization.
    var ac37a = new google.visualization.AreaChart(document.getElementById('visualization37a'));
    ac37a.draw(data37a, {
    isStacked: true,
    backgroundColor: 'transparent',
    legend: {position: 'none'},
    tooltip: {trigger:'none'},
    axisTitlesPosition: 'none',
    theme: {chartArea: {width: '100%', height: '100%'}},
    width: 40,
    height: 160,
    hAxis: {},
    vAxis: {gridlines: {color: 'transparent', count: 31},baseline:0,textPosition:'none',viewWindowMode: 'explicit',viewWindow: {max:19,min:-12}}
    });

    $('#visualization37a iframe').attr('allowTransparency', 'true');
    $('#visualization37a iframe').contents().find('body').css('background', 'transparent');

}

function cargar37a(){

    var datoae37=document.getElementById('ae37').value;

    var datomg37a=document.getElementById('mg37-a').value;
    var datomg37b=document.getElementById('mg37-b').value;
    var datomg37c=document.getElementById('mg37-c').value;

    var datops37a=document.getElementById('ps37-a').value;
    var datops37b=document.getElementById('ps37-b').value;
    var datops37c=document.getElementById('ps37-c').value;

    //alert(document.getElementById('ps37-a').value);

    if(datops37a>3){
        document.getElementById('ps37-a').style.color="red";
    }else{
        document.getElementById('ps37-a').style.color="black";
    }
    if(datops37b>3){
        document.getElementById('ps37-b').style.color="red";
    }else{
        document.getElementById('ps37-b').style.color="black";
    }
    if(datops37c>3){
        document.getElementById('ps37-c').style.color="red";
    }else{
        document.getElementById('ps37-c').style.color="black";
    }


    var data37a=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
        ['',    0+(parseInt(datomg37a)+parseInt(datops37a)),      0-parseInt(datops37a), parseInt(datoae37)],
        ['',    0+(parseInt(datomg37b)+parseInt(datops37b)),      0-parseInt(datops37b), parseInt(datoae37)],
        ['',    0+(parseInt(datomg37c)+parseInt(datops37c)),      0-parseInt(datops37c), parseInt(datoae37)]
    ]);

    drawVisualization37a(data37a);

}

function drawVisualization37b(data37b) {

    // Create and draw the visualization.
    var ac37b = new google.visualization.AreaChart(document.getElementById('visualization37b'));
    ac37b.draw(data37b, {
    isStacked: true,
    backgroundColor: 'transparent',
    legend: {position: 'none'},
    tooltip: {trigger:'none'},
    axisTitlesPosition: 'none',
    theme: {chartArea: {width: '100%', height: '100%'}},
    width: 40,
    height: 160,
    hAxis: {},
    vAxis: {gridlines: {color: 'transparent', count: 31},baseline:0,textPosition:'none',viewWindowMode: 'explicit',viewWindow: {max:12,min:-19}}
    });
    $('#visualization37b iframe').attr('allowTransparency', 'true');
    $('#visualization37b iframe').contents().find('body').css('background', 'transparent');
}

function cargar37b(){

    var datomg37ba=document.getElementById('mg37b-a').value;
    var datomg37bb=document.getElementById('mg37b-b').value;
    var datomg37bc=document.getElementById('mg37b-c').value;

    var datops37ba=document.getElementById('ps37b-a').value;
    var datops37bb=document.getElementById('ps37b-b').value;
    var datops37bc=document.getElementById('ps37b-c').value;

    if(datops37ba>3){
        document.getElementById('ps37b-a').style.color="red";
    }else{
        document.getElementById('ps37b-a').style.color="black";
    }
    if(datops37bb>3){
        document.getElementById('ps37b-b').style.color="red";
    }else{
        document.getElementById('ps37b-b').style.color="black";
    }
    if(datops37bc>3){
        document.getElementById('ps37b-c').style.color="red";
    }else{
        document.getElementById('ps37b-c').style.color="black";
    }

    var data37b=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje'],
        ['',    0-(parseInt(datomg37ba)+parseInt(datops37ba)),      0+parseInt(datops37ba)],
        ['',    0-(parseInt(datomg37bb)+parseInt(datops37bb)),      0+parseInt(datops37bb)],
        ['',    0-(parseInt(datomg37bc)+parseInt(datops37bc)),      0+parseInt(datops37bc)]
    ]);

    drawVisualization37b(data37b);

}

arrstyle = ["i37","f37","f37b-a","f37b-b","s37-a","s37-b","s37-c","p37-a","p37-b","p37-c","s37b-a","s37b-b","s37b-c","p37b-a","p37b-b","p37b-c"];

//FUNCIONES PARA ANCHURA ENCÍA
$('#ae37').change(function() {
    if(parseInt(document.getElementById('ae37').value)<3){
        $(this).css("color","red");
    }else{
        $(this).css("color","black");
    }
    cargar37a();
});

//FUNCIONES PARA SANGRADO
$('#s37-a').toggle(
    function () {
        $(this).css({"background":"#FA5858"});
        totalSangrado++;
        getSangrado();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSangrado--;
        getSangrado();
    }
);
$('#s37-b').toggle(
    function () {
        $(this).css({"background":"#FA5858"});
        totalSangrado++;
        getSangrado();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSangrado--;
        getSangrado();
    }
);
$('#s37-c').toggle(
    function () {
        $(this).css({"background":"#FA5858"});
        totalSangrado++;
        getSangrado();
    },
    function () {
        $(this).css({"background":"url({{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }})"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSangrado--;
        getSangrado();
    }
);

$('#s37b-a').toggle(
    function () {
        $(this).css({"background":"#FA5858"});
        totalSangrado++;
        getSangrado();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSangrado--;
        getSangrado();
    }
);
$('#s37b-b').toggle(
    function () {
        $(this).css({"background":"#FA5858"});
        totalSangrado++;
        getSangrado();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSangrado--;
        getSangrado();
    }
);
$('#s37b-c').toggle(
    function () {
        $(this).css({"background":"#FA5858"});
        totalSangrado++;
        getSangrado();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSangrado--;
        getSangrado();
    }
);

//FUNCIONES PARA SUPURACION
$('#su37-a').toggle(
    function () {
        $(this).css({"background":"#ffba57"});
        totalSupuracion++;
        getSupuracion();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSupuracion--;
        getSupuracion();
    }
);
$('#su37-b').toggle(
    function () {
        $(this).css({"background":"#ffba57"});
        totalSupuracion++;
        getSupuracion();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSupuracion--;
        getSupuracion();
    }
);
$('#su37-c').toggle(
    function () {
        $(this).css({"background":"#ffba57"});
        totalSupuracion++;
        getSupuracion();
    },
    function () {
        $(this).css({"background":"url({{ asset('images/dental/periodontograma/img/supuracion.png') }})"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSupuracion--;
        getSupuracion();
    }
);

$('#su37b-a').toggle(
    function () {
        $(this).css({"background":"#f3e837"});
        totalSupuracion++;
        getSupuracion();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSupuracion--;
        getSupuracion();
    }
);
$('#su37b-b').toggle(
    function () {
        $(this).css({"background":"#f3e837"});
        totalSupuracion++;
        getSupuracion();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSupuracion--;
        getSupuracion();
    }
);
$('#su37b-c').toggle(
    function () {
        $(this).css({"background":"#f3e837"});
        totalSupuracion++;
        getSupuracion();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSupuracion--;
        getSupuracion();
    }
);

//PLACA
$('#p37-a').toggle(
    function () {
        $(this).css({"background":"#58ACFA"});
        totalPlaca++;
        getPlaca();
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalPlaca--;
        getPlaca();
    }
);
$('#p37-b').toggle(
    function () {
        $(this).css({"background":"#58ACFA"});
        totalPlaca++;
        getPlaca();
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalPlaca--;
        getPlaca();
    }
);
$('#p37-c').toggle(
    function () {
        $(this).css({"background":"#58ACFA"});
        totalPlaca++;
        getPlaca();
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalPlaca--;
        getPlaca();
    }
);
$('#p37b-a').toggle(
    function () {
        $(this).css({"background":"#58ACFA"});
        totalPlaca++;
        getPlaca();
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalPlaca--;
        getPlaca();
    }
);
$('#p37b-b').toggle(
    function () {
        $(this).css({"background":"#58ACFA"});
        totalPlaca++;
        getPlaca();
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalPlaca--;
        getPlaca();
    }
);
$('#p37b-c').toggle(
    function () {
        $(this).css({"background":"#58ACFA"});
        totalPlaca++;
        getPlaca();
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalPlaca--;
        getPlaca();
    }
);

//TACHADOS
$('#d37').toggle(
    function () {
        $('#diente37-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau37.png') }}')");
        $('#diente37-a').css("background-position","1px -2px");
        $('#diente37-a').css("background-repeat","no-repeat");
        $('#m37').prop('disabled', true); // Deshabilita el input con id 'm37'
        $('#i37').prop("disabled",true);
        $('#f37').prop("disabled",true);
        $('#s37-a').prop("disabled",true);
        $('#s37-b').prop("disabled",true);
        $('#s37-c').prop("disabled",true);
        $('#p37-a').prop("disabled",true);
        $('#p37-b').prop("disabled",true);
        $('#p37-c').prop("disabled",true);
        $('#mg37-a').prop("disabled",true);
        $('#mg37-b').prop("disabled",true);
        $('#mg37-c').prop("disabled",true);
        $('#ps37-a').prop("disabled",true);
        $('#ps37-b').prop("disabled",true);
        $('#ps37-c').prop("disabled",true);
        /*$('#furca37').css("background","none");*/
        $('#mg37-a').val('0');
        $('#mg37-b').val('0');
        $('#mg37-c').val('0');
        $('#ps37-a').val('0');
        $('#ps37-b').val('0');
        $('#ps37-c').val('0');

        $('#diente37b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-37b.png') }}')");
        $('#diente37b-a').css("background-position","0 23px");
        $('#diente37b-a').css("background-repeat","no-repeat");
        $('#m37b').prop("disabled",true);
        $('#i37b').prop("disabled",true);
        $('#f37b-a').prop("disabled",true);
        $('#f37b-b').prop("disabled",true);
        $('#s37b-a').prop("disabled",true);
        $('#s37b-b').prop("disabled",true);
        $('#s37b-c').prop("disabled",true);
        $('#p37b-a').prop("disabled",true);
        $('#p37b-b').prop("disabled",true);
        $('#p37b-c').prop("disabled",true);
        $('#mg37b-a').prop("disabled",true);
        $('#mg37b-b').prop("disabled",true);
        $('#mg37b-c').prop("disabled",true);
        $('#ps37b-a').prop("disabled",true);
        $('#ps37b-b').prop("disabled",true);
        $('#ps37b-c').prop("disabled",true);
        $('#mg37b-a').val('0');
        $('#mg37b-b').val('0');
        $('#mg37b-c').val('0');
        $('#ps37b-a').val('0');
        $('#ps37b-b').val('0');
        $('#ps37b-c').val('0');

        $('#furca37').prop("disabled",true);
        $('#furca37-a').prop("disabled",true);
        $('#furca37-b').prop("disabled",true);
        $('#ae37').prop("disabled",true);
        $('#pi37').prop("disabled",true);

        totalDientes--;
        getDefectos();
        cargar37a();
        cargar37b();

        {{--  cargar17a();
        cargar16a();
        cargar15a();
        cargar14a();
        cargar13a();
        cargar12a();
        cargar11a();;
        cargar2();
        cargar3();
        cargar4();  --}}
        getSangrado();
        getSupuracion();
        getPlaca();

    },
    function () {
        $('#diente37-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-37.png') }}')");
        $('#diente37-a').css("background-position","0 -2px");
        $('#diente37-a').css("background-repeat","no-repeat");
        $('#m37').prop("disabled",false);
        $('#i37').prop("disabled",false);
        $('#f37').prop("disabled",false);
        $('#s37-a').prop("disabled",false);
        $('#s37-b').prop("disabled",false);
        $('#s37-c').prop("disabled",false);
        $('#p37-a').prop("disabled",false);
        $('#p37-b').prop("disabled",false);
        $('#p37-c').prop("disabled",false);
        $('#mg37-a').prop("disabled",false);
        $('#mg37-b').prop("disabled",false);
        $('#mg37-c').prop("disabled",false);
        $('#ps37-a').prop("disabled",false);
        $('#ps37-b').prop("disabled",false);
        $('#ps37-c').prop("disabled",false);

        $('#diente37b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-37b.png') }}')");
        $('#diente37b-a').css("background-position","0 23px");
        $('#diente37b-a').css("background-repeat","no-repeat");
        $('#m37b').prop("disabled",false);
        $('#i37b').prop("disabled",false);
        $('#f37b-a').prop("disabled",false);
        $('#f37b-b').prop("disabled",false);
        $('#s37b-a').prop("disabled",false);
        $('#s37b-b').prop("disabled",false);
        $('#s37b-c').prop("disabled",false);
        $('#p37b-a').prop("disabled",false);
        $('#p37b-b').prop("disabled",false);
        $('#p37b-c').prop("disabled",false);
        $('#mg37b-a').prop("disabled",false);
        $('#mg37b-b').prop("disabled",false);
        $('#mg37b-c').prop("disabled",false);
        $('#ps37b-a').prop("disabled",false);
        $('#ps37b-b').prop("disabled",false);
        $('#ps37b-c').prop("disabled",false);

        $('#furca37').css("display","block");
        $('#furca37-a').css("display","block");
        $('#furca37-b').css("display","block");
        $('#ae37').prop("disabled",false);
        $('#pi37').prop("disabled",false);

        totalDientes++;

        {{--  cargar17a();
        cargar16a();
        cargar15a();
        cargar14a();
        cargar13a();
        cargar12a();
        cargar11a();;
        cargar2();
        cargar3();
        cargar4();  --}}
        getSangrado();
        getPlaca();
    }
);

//IMPLANTES
$('#i37').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
        $('#f37').css({"background":"#FFFFFF"});
        $('#diente37-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl37.png') }}')");
        $('#diente37-a').css("background-position","0px -2px");
        $('#diente37-a').css("background-repeat","no-repeat");

        $('#diente37b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-37b.png') }}')");
        $('#diente37b-a').css("background-position","0 23px");
        $('#diente37b-a').css("background-repeat","no-repeat");

        $('#furca37').css("background","none");
        $('#furca37-a').css("background","none");
        $('#furca37-b').css("background","none");
        $('#f37').css("background","none");
        $('#f37b-a').css("background","none");
        $('#f37b-b').css("background","none");

        $("#f37").attr("id","f37desact");
        $("#f37b-a").attr("id","f37b-adesact");
        $("#f37b-b").attr("id","f37b-bdesact");

    },
    function () {
        $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
        $('#diente37-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-37.png') }}')");
        $('#diente37-a').css("background-position","0 -2px");
        $('#diente37-a').css("background-repeat","no-repeat");

        $('#diente37b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-37b.png') }}')");
        $('#diente37b-a').css("background-position","0 23px");
        $('#diente37b-a').css("background-repeat","no-repeat");

        $('#f37').css("background","#FFFFFF");
        $('#f37b-a').css("background","#FFFFFF");
        $('#f37b-b').css("background","#FFFFFF");

        $("#f37desact").attr("id","f37");
        $("#f37b-adesact").attr("id","f37b-a");
        $("#f37b-bdesact").attr("id","f37b-b");
        $('#d37').trigger('click');
    }
);

//FURCA
$('#f37').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#i37').css({"background":"#FFFFFF"});
        $('#furca37').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {

        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca37').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca37').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca37').css("background","none");
    }
);

//FURCAS TABLA 3
$('#f37b-a').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca37-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca37-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca37-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca37-a').css("background","none");
    }
);
$('#f37b-b').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca37-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca37-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca37-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca37-b').css("background","none");
    }
);




</script>
