  {{--  </head>  --}}
  <style>
    #i28{
    background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente28-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla2/periodontograma-dientes-arriba-28.png') }}');
        width:54px;
        background-position: 0 -2px;
        background-repeat: no-repeat;
    }


    #i28b{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente28b-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla4/periodontograma-dientes-abajo-28b.png') }}');
        width:54px;
        background-position: 0 23px;
        background-repeat: no-repeat;
    }
    #d28,#i28,#i28b,#f28,,#ae28-a,#ae28-b:hover{
        background: #E6E6E6;
    }
    #i28-implante{
        display:none;
        background: #000000;
        width: 8px;
        height:8px;
        margin: -12px 20px;
        position: absolute;
        cursor: pointer;
    }
    #f28{
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
    #pi28{
        width: 100%;
    }
    #furca28-a,#furca28-b{
        width: 16px;
        height: 16px;
        position: absolute;
    }
    #furca28-a{
        margin-top: 70px;
    }
    #furca28-b{
        margin-top: 80px;
        margin-left: 28px;
    }

    .f28,{
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
    $pieza28 = $piezas_periodonto->firstWhere('pieza', '28');
    $cuerpo28 = $pieza28 ? $pieza28->cuerpo : [];
    $pronostico28 = $cuerpo28['pronostico'] ?? '';
@endphp
<div class="col-md-12 bg-white shadow-sm rounded mx-1">
    <div class="col-md-12">
        <div class="row">

            <div style="display:none">
                <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl28.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau28.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-28b.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-28b.png') }}"/>
            </div>
        </div>

    </div>
</div>

<!--LADO IZQ-->
<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Vestibular</h5>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <!--NUEVO FORM-->
                    <div class="row">
                        <div class="col-12 text-center">
                            Pieza 2.8
                        </div>
                    </div>
                    <!--FORMULARIO ANTIGUO-->
                    <div class="form-row">
                        <div class="col-md-4">
                            <form name ="grafico1" id="grafico1" action="#">
                                <table id="tabla" style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                            <td colspan="2" class="noborde formulario" style="position: relative;" >
                                            <div id="lineas-gr"></div>

                                            <div id="visualization28a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente28-a"><div id="furca28"></div></div>
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
                                        <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d28">Diente ausente</div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-2">
                                         <div class="form-group">
                                            <label class="floating-label-activo-sm"></label>
                                            <div class="py-2 border input-dental rounded" id="i28">Marcar Implante</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Movilidad</label>
                                            <input  class="form-control form-control-xs"  type="number"  id="m28" name="m28" value="{{ $cuerpo28["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m28');"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Pronóstico</label>
                                            <select class="form-control form-control-xs" name="pi28" id="pi28">
                                            <option value="" {{ $pronostico28 == '' ? 'selected' : '' }}></option>
                                                <option value="B" {{ $pronostico28 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                <option value="D" {{ $pronostico28 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                <option value="M" {{ $pronostico28 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                <option value="I" {{ $pronostico28 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Furca</label>
                                            <div class="border rounded input-dental pointer w-100" id="f28"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s28-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s28-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s28-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su28-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su28-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su28-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p28-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p28-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p28-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control form-control-xs" type="number" id="ae28" name="ae28" value="{{ $cuerpo28["plataforma"] ?? 0 }}" tabindex="33"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg28-a" name="mg28-a" value="{{ $cuerpo28["vest_altura_mg_a"] ?? 0 }}" onchange="cargar28a();getDefectos();rangoNumeroMargen('mg28-a');cargar28a();" tabindex="49"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg28-b" name="mg28-b" value="{{ $cuerpo28["vest_altura_mg_b"] ?? 0 }}" onchange="cargar28a();getDefectos();rangoNumeroMargen('mg28-b');cargar28a();" tabindex="50"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg28-c" name="mg28-c" value="{{ $cuerpo28["vest_altura_mg_c"] ?? 0 }}" onchange="cargar28a();getDefectos();rangoNumeroMargen('mg28-c');cargar28a();" tabindex="50"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps28-a" name="ps28-a" value="{{ $cuerpo28["vest_psondaje_a"] ?? 0 }}" onchange="cargar28a();getDefectos();" tabindex="97"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps28-b" name="ps28-b" value="{{ $cuerpo28["vest_psondaje_b"] ?? 0 }}" onchange="cargar28a();getDefectos();" tabindex="98"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps28-c" name="ps28-c" value="{{ $cuerpo28["vest_psondaje_c"] ?? 0 }}" onchange="cargar28a();getDefectos();" tabindex="99"/>
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
            <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Palatino</h5>
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
                                                    <div id="visualization28b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente28b-a">
                                                        <div id="furca28-a"></div>
                                                        <div id="furca28-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                           <!-- <tr>
                                                <td class="titulo">P. sondaje</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps28b-a" name="ps28b-a" value="0" onchange="cargar28b();getDefectos();" tabindex="145"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps28b-b" name="ps28b-b" value="0" onchange="cargar28b();getDefectos();" tabindex="146"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps28b-c" name="ps28b-c" value="0" onchange="cargar28b();getDefectos();" tabindex="147"/></td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <div class="row">
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg28b-a" name="mg28b-a" value="0" onchange="cargar28b();getDefectos();rangoNumeroMargen('mg28b-a');cargar28b();" tabindex="193"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  type="number" id="mg28b-b" name="mg28b-b" value="0" onchange="cargar28b();getDefectos();rangoNumeroMargen('mg28b-b');cargar28b();" tabindex="194"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg28b-c" name="mg28b-c" value="0" onchange="cargar28b();getDefectos();rangoNumeroMargen('mg28b-c');cargar28b();" tabindex="195"/>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="s28b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="s28b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="s28b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="su28b-a"></div>
                                                    <div style="width: 30%;height: 20px;"id="su28b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="su28b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="p28b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="p28b-b"></div>
                                                    <div style="width: 30%;height: 20px;" id="p28b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Furca</td>
                                                <td class="borde"style="text-align:center">
                                                    <div style="width: 20%;height: 25px;margin-left: 7px" id="f28b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f28b-b">F-2</div>

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
                                    <input class="form-control form-control-xs" type="number" id="ps28b-a" name="ps28b-a" value="{{ $cuerpo28["pala_psondaje_a"] ?? 0 }}" onchange="cargar28b();getDefectos();" tabindex="145"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps28b-b" name="ps28b-b" value="{{ $cuerpo28["pala_psondaje_b"] ?? 0 }}" onchange="cargar28b();getDefectos();" tabindex="146"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps28b-c" name="ps28b-c" value="{{ $cuerpo28["pala_psondaje_c"] ?? 0 }}" onchange="cargar28b();getDefectos();" tabindex="147"//>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg28b-a" name="mg28b-a" value="{{ $cuerpo28["pala_altura_mg_a"] ?? 0 }}" onchange="cargar28b();getDefectos();rangoNumeroMargen('mg28b-a');cargar28b();" tabindex="193"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg28b-b" name="mg28b-b" value="{{ $cuerpo28["pala_altura_mg_b"] ?? 0 }}" onchange="cargar28b();getDefectos();rangoNumeroMargen('mg28b-b');cargar28b();" tabindex="194"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg28b-c" name="mg28b-c" value="{{ $cuerpo28["pala_altura_mg_c"] ?? 0 }}" onchange="cargar28b();getDefectos();rangoNumeroMargen('mg28b-c');cargar28b();" tabindex="195"/>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s28b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s28b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s28b-c"></div>
                                    </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su28b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su28b-b" ></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su28b-c"></div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p28b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p28b-b"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p28b-c"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Furca</h6>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <div class="border rounded input-dental pointer w-100" id="f28b-a"></div>
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
<!--FORMULARIO DE OBS. Y BOTÓN GUARDAR-->
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="form-group" id="obs_pieza2.8">
                <label class="floating-label-activo-sm">Obs. Pieza 2.8</label>
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 2.8" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_28" id="obs_28" placeholder="Describa observaciones">{{ $cuerpo28["observaciones"] ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
    <div id="obs_pieza2.8">
            <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('28')"><i class="feather icon-save"></i>  Guardar evaluación 2.8</button>
    </div>
</div>

<script>

$(document).ready(function() {
    // Handler for .ready() called.
    //anchuraValor();
    cargar28a();
    cargar28b();

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

function drawVisualization28a(data28a) {
    // Create and draw the visualization.
    var ac28a = new google.visualization.AreaChart(document.getElementById('visualization28a'));
    ac28a.draw(data28a, {
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

    $('#visualization28a iframe').attr('allowTransparency', 'true');
    $('#visualization28a iframe').contents().find('body').css('background', 'transparent');

}

function cargar28a(){

    var datoae28=document.getElementById('ae28').value;

    var datomg28a=document.getElementById('mg28-a').value;
    var datomg28b=document.getElementById('mg28-b').value;
    var datomg28c=document.getElementById('mg28-c').value;

    var datops28a=document.getElementById('ps28-a').value;
    var datops28b=document.getElementById('ps28-b').value;
    var datops28c=document.getElementById('ps28-c').value;

    //alert(document.getElementById('ps28-a').value);

    if(datops28a>3){
        document.getElementById('ps28-a').style.color="red";
    }else{
        document.getElementById('ps28-a').style.color="black";
    }
    if(datops28b>3){
        document.getElementById('ps28-b').style.color="red";
    }else{
        document.getElementById('ps28-b').style.color="black";
    }
    if(datops28c>3){
        document.getElementById('ps28-c').style.color="red";
    }else{
        document.getElementById('ps28-c').style.color="black";
    }


    var data28a=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
        ['',    0+(parseInt(datomg28a)+parseInt(datops28a)),      0-parseInt(datops28a), parseInt(datoae28)],
        ['',    0+(parseInt(datomg28b)+parseInt(datops28b)),      0-parseInt(datops28b), parseInt(datoae28)],
        ['',    0+(parseInt(datomg28c)+parseInt(datops28c)),      0-parseInt(datops28c), parseInt(datoae28)]
    ]);

    drawVisualization28a(data28a);

}

function drawVisualization28b(data28b) {

    // Create and draw the visualization.
    var ac28b = new google.visualization.AreaChart(document.getElementById('visualization28b'));
    ac28b.draw(data28b, {
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
    $('#visualization28b iframe').attr('allowTransparency', 'true');
    $('#visualization28b iframe').contents().find('body').css('background', 'transparent');
}

function cargar28b(){

    var datomg28ba=document.getElementById('mg28b-a').value;
    var datomg28bb=document.getElementById('mg28b-b').value;
    var datomg28bc=document.getElementById('mg28b-c').value;

    var datops28ba=document.getElementById('ps28b-a').value;
    var datops28bb=document.getElementById('ps28b-b').value;
    var datops28bc=document.getElementById('ps28b-c').value;

    if(datops28ba>3){
        document.getElementById('ps28b-a').style.color="red";
    }else{
        document.getElementById('ps28b-a').style.color="black";
    }
    if(datops28bb>3){
        document.getElementById('ps28b-b').style.color="red";
    }else{
        document.getElementById('ps28b-b').style.color="black";
    }
    if(datops28bc>3){
        document.getElementById('ps28b-c').style.color="red";
    }else{
        document.getElementById('ps28b-c').style.color="black";
    }

    var data28b=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje'],
        ['',    0-(parseInt(datomg28ba)+parseInt(datops28ba)),      0+parseInt(datops28ba)],
        ['',    0-(parseInt(datomg28bb)+parseInt(datops28bb)),      0+parseInt(datops28bb)],
        ['',    0-(parseInt(datomg28bc)+parseInt(datops28bc)),      0+parseInt(datops28bc)]
    ]);

    drawVisualization28b(data28b);

}

arrstyle = ["i28","f28","f28b-a","f28b-b","s28-a","s28-b","s28-c","p28-a","p28-b","p28-c","s28b-a","s28b-b","s28b-c","p28b-a","p28b-b","p28b-c"];

//FUNCIONES PARA ANCHURA ENCÍA
$('#ae28').change(function() {
    if(parseInt(document.getElementById('ae28').value)<3){
        $(this).css("color","red");
    }else{
        $(this).css("color","black");
    }
    cargar28a();
});

//FUNCIONES PARA SANGRADO
$('#s28-a').toggle(
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
$('#s28-b').toggle(
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
$('#s28-c').toggle(
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

$('#s28b-a').toggle(
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
$('#s28b-b').toggle(
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
$('#s28b-c').toggle(
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
$('#su28-a').toggle(
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
$('#su28-b').toggle(
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
$('#su28-c').toggle(
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

$('#su28b-a').toggle(
    function () {
        $(this).css({"background":"#f3e828"});
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
$('#su28b-b').toggle(
    function () {
        $(this).css({"background":"#f3e828"});
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
$('#su28b-c').toggle(
    function () {
        $(this).css({"background":"#f3e828"});
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
$('#p28-a').toggle(
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
$('#p28-b').toggle(
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
$('#p28-c').toggle(
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
$('#p28b-a').toggle(
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
$('#p28b-b').toggle(
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
$('#p28b-c').toggle(
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
$('#d28').toggle(
    function () {
        $('#diente28-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau28.png') }}')");
        $('#diente28-a').css("background-position","-36px -13px");
        $('#diente28-a').css("background-repeat","no-repeat");
        $('#m28').prop('disabled', true); // Deshabilita el input con id 'm28'
        $('#i28').prop("disabled",true);
        $('#f28').prop("disabled",true);
        $('#s28-a').prop("disabled",true);
        $('#s28-b').prop("disabled",true);
        $('#s28-c').prop("disabled",true);
        $('#p28-a').prop("disabled",true);
        $('#p28-b').prop("disabled",true);
        $('#p28-c').prop("disabled",true);
        $('#mg28-a').prop("disabled",true);
        $('#mg28-b').prop("disabled",true);
        $('#mg28-c').prop("disabled",true);
        $('#ps28-a').prop("disabled",true);
        $('#ps28-b').prop("disabled",true);
        $('#ps28-c').prop("disabled",true);
        /*$('#furca28').css("background","none");*/
        $('#mg28-a').val('0');
        $('#mg28-b').val('0');
        $('#mg28-c').val('0');
        $('#ps28-a').val('0');
        $('#ps28-b').val('0');
        $('#ps28-c').val('0');

        $('#diente28b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-28b.png') }}')");
        $('#diente28b-a').css("background-position","0 23px");
        $('#diente28b-a').css("background-repeat","no-repeat");
        $('#m28b').prop("disabled",true);
        $('#i28b').prop("disabled",true);
        $('#f28b-a').prop("disabled",true);
        $('#f28b-b').prop("disabled",true);
        $('#s28b-a').prop("disabled",true);
        $('#s28b-b').prop("disabled",true);
        $('#s28b-c').prop("disabled",true);
        $('#p28b-a').prop("disabled",true);
        $('#p28b-b').prop("disabled",true);
        $('#p28b-c').prop("disabled",true);
        $('#mg28b-a').prop("disabled",true);
        $('#mg28b-b').prop("disabled",true);
        $('#mg28b-c').prop("disabled",true);
        $('#ps28b-a').prop("disabled",true);
        $('#ps28b-b').prop("disabled",true);
        $('#ps28b-c').prop("disabled",true);
        $('#mg28b-a').val('0');
        $('#mg28b-b').val('0');
        $('#mg28b-c').val('0');
        $('#ps28b-a').val('0');
        $('#ps28b-b').val('0');
        $('#ps28b-c').val('0');

        $('#furca28').prop("disabled",true);
        $('#furca28-a').prop("disabled",true);
        $('#furca28-b').prop("disabled",true);
        $('#ae28').prop("disabled",true);
        $('#pi28').prop("disabled",true);

        totalDientes--;
        getDefectos();
        cargar28a();
        cargar28b();

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
        $('#diente28-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-28.png') }}')");
        $('#diente28-a').css("background-position","0 -2px");
        $('#diente28-a').css("background-repeat","no-repeat");
        $('#m28').prop("disabled",false);
        $('#i28').prop("disabled",false);
        $('#f28').prop("disabled",false);
        $('#s28-a').prop("disabled",false);
        $('#s28-b').prop("disabled",false);
        $('#s28-c').prop("disabled",false);
        $('#p28-a').prop("disabled",false);
        $('#p28-b').prop("disabled",false);
        $('#p28-c').prop("disabled",false);
        $('#mg28-a').prop("disabled",false);
        $('#mg28-b').prop("disabled",false);
        $('#mg28-c').prop("disabled",false);
        $('#ps28-a').prop("disabled",false);
        $('#ps28-b').prop("disabled",false);
        $('#ps28-c').prop("disabled",false);

        $('#diente28b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-28b.png') }}')");
        $('#diente28b-a').css("background-position","0 23px");
        $('#diente28b-a').css("background-repeat","no-repeat");
        $('#m28b').prop("disabled",false);
        $('#i28b').prop("disabled",false);
        $('#f28b-a').prop("disabled",false);
        $('#f28b-b').prop("disabled",false);
        $('#s28b-a').prop("disabled",false);
        $('#s28b-b').prop("disabled",false);
        $('#s28b-c').prop("disabled",false);
        $('#p28b-a').prop("disabled",false);
        $('#p28b-b').prop("disabled",false);
        $('#p28b-c').prop("disabled",false);
        $('#mg28b-a').prop("disabled",false);
        $('#mg28b-b').prop("disabled",false);
        $('#mg28b-c').prop("disabled",false);
        $('#ps28b-a').prop("disabled",false);
        $('#ps28b-b').prop("disabled",false);
        $('#ps28b-c').prop("disabled",false);

        $('#furca28').css("display","block");
        $('#furca28-a').css("display","block");
        $('#furca28-b').css("display","block");
        $('#ae28').prop("disabled",false);
        $('#pi28').prop("disabled",false);

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
$('#i28').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
        $('#f28').css({"background":"#FFFFFF"});
        $('#diente28-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl28.png') }}')");
        $('#diente28-a').css("background-position","-38px -2px");
        $('#diente28-a').css("background-repeat","no-repeat");

        $('#diente28b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-28b.png') }}')");
        $('#diente28b-a').css("background-position","0 23px");
        $('#diente28b-a').css("background-repeat","no-repeat");

        $('#furca28').css("background","none");
        $('#furca28-a').css("background","none");
        $('#furca28-b').css("background","none");
        $('#f28').css("background","none");
        $('#f28b-a').css("background","none");
        $('#f28b-b').css("background","none");

        $("#f28").attr("id","f28desact");
        $("#f28b-a").attr("id","f28b-adesact");
        $("#f28b-b").attr("id","f28b-bdesact");

    },
    function () {
        $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
        $('#diente28-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-28.png') }}')");
        $('#diente28-a').css("background-position","0 -2px");
        $('#diente28-a').css("background-repeat","no-repeat");

        $('#diente28b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-28b.png') }}')");
        $('#diente28b-a').css("background-position","0 23px");
        $('#diente28b-a').css("background-repeat","no-repeat");

        $('#f28').css("background","#FFFFFF");
        $('#f28b-a').css("background","#FFFFFF");
        $('#f28b-b').css("background","#FFFFFF");

        $("#f28desact").attr("id","f28");
        $("#f28b-adesact").attr("id","f28b-a");
        $("#f28b-bdesact").attr("id","f28b-b");
        $('#d28').trigger('click');
    }
);

//FURCA
$('#f28').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#i28').css({"background":"#FFFFFF"});
        $('#furca28').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {

        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca28').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca28').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca28').css("background","none");
    }
);

//FURCAS TABLA 3
$('#f28b-a').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca28-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca28-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca28-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca28-a').css("background","none");
    }
);
$('#f28b-b').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca28-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca28-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca28-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca28-b').css("background","none");
    }
);




</script>
