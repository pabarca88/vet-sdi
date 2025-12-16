  {{--  </head>  --}}
  <style>
    #i42{
    background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente42-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla5/periodontograma-dientes-arriba-42.png') }}');
        width:54px;
        background-position: 0 4px;
        background-repeat: no-repeat;
    }


    #i42b{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente42b-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla7/periodontograma-dientes-abajo-42b.png') }}');
        width:54px;
        background-position: 0 16px;
        background-repeat: no-repeat;
    }
    #d42,#i42,#i42b,#f1,,#ae42-a,#ae42-b:hover{
        background: #E6E6E6;
    }
    #i42-implante{
        display:none;
        background: #000000;
        width: 8px;
        height:8px;
        margin: -12px 20px;
        position: absolute;
        cursor: pointer;
    }
    #f42{
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
    #pi42{
        width: 100%;
    }


    .f42,{
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
        $pieza42 = $piezas_periodonto->firstWhere('pieza', '42');
        $cuerpo42 = $pieza42 ? $pieza42->cuerpo : [];
        $pronostico42 = $cuerpo42['pronostico'] ?? '';
    @endphp
<div class="col-md-12 bg-white shadow-sm rounded mx-1">
    <div class="col-md-12">
        <div class="row">

            <div style="display:none">
                <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl42.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau42.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-42b.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-42b.png') }}"/>
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
                        <div class="col-42 text-center">
                            Pieza 4.2
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

                                            <div id="visualization42a" style="width: 60px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                           </div>
                                           <div id="diente42-a">
                                            <div id="furca42-a"></div>
                                            <div id="furca42-b"></div>
                                        </div>
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
                                        <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d42">Diente ausente</div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-2">
                                         <div class="form-group">
                                            <label class="floating-label-activo-sm"></label>
                                            <div class="py-2 border input-dental rounded" id="i42">Marcar Implante</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Movilidad</label>
                                            <input  class="form-control form-control-xs"  type="number"  id="m42" name="m42" value="{{ $cuerpo42["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m42');"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-9">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Pronóstico</label>
                                            <select class="form-control form-control-xs" name="pi42" id="pi42">
                                                <option value="" {{ $pronostico42 == '' ? 'selected' : '' }}></option>
                                                <option value="B" {{ $pronostico42 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                <option value="D" {{ $pronostico42 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                <option value="M" {{ $pronostico42 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                <option value="I" {{ $pronostico42 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  <div class="col-sm-42 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Furca</label>
                                            <div class="border rounded input-dental pointer w-100" id="f42"></div>
                                        </div>
                                    </div>  --}}
                                </div>

                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s42-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s42-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s42-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su42-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su42-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su42-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p42-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p42-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p42-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control form-control-xs" type="number" id="ae42" name="ae42" value="{{ $cuerpo42["plataforma"] ?? 0 }}" tabindex="33"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg42-a" name="mg42-a" value="{{ $cuerpo42["vest_altura_mg_a"] ?? 0 }}" onchange="cargar42a();getDefectos();rangoNumeroMargen('mg42-a');cargar42a();" tabindex="49"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg42-b" name="mg42-b" value="{{ $cuerpo42["vest_altura_mg_b"] ?? 0 }}" onchange="cargar42a();getDefectos();rangoNumeroMargen('mg42-b');cargar42a();" tabindex="50"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg42-c" name="mg42-c" value="{{ $cuerpo42["vest_altura_mg_c"] ?? 0 }}" onchange="cargar42a();getDefectos();rangoNumeroMargen('mg42-c');cargar42a();" tabindex="50"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps42-a" name="ps42-a" value="{{ $cuerpo42["vest_psondaje_a"] ?? 0 }}" onchange="cargar42a();getDefectos();" tabindex="97"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps42-b" name="ps42-b" value="{{ $cuerpo42["vest_psondaje_b"] ?? 0 }}" onchange="cargar42a();getDefectos();" tabindex="98"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps42-c" name="ps42-c" value="{{ $cuerpo42["vest_psondaje_c"] ?? 0 }}" onchange="cargar42a();getDefectos();" tabindex="99"/>
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
                                                    <div id="visualization42b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente42b-a">
                                                        <div id="furca42-a"></div>
                                                        <div id="furca42-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                           <!-- <tr>
                                                <td class="titulo">P. sondaje</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps42b-a" name="ps42b-a" value="0" onchange="cargar42b();getDefectos();" tabindex="145"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps42b-b" name="ps42b-b" value="0" onchange="cargar42b();getDefectos();" tabindex="146"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps42b-c" name="ps42b-c" value="0" onchange="cargar42b();getDefectos();" tabindex="147"/></td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <div class="row">
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg42b-a" name="mg42b-a" value="0" onchange="cargar42b();getDefectos();rangoNumeroMargen('mg42b-a');cargar42b();" tabindex="193"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  type="number" id="mg42b-b" name="mg42b-b" value="0" onchange="cargar42b();getDefectos();rangoNumeroMargen('mg42b-b');cargar42b();" tabindex="194"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg42b-c" name="mg42b-c" value="0" onchange="cargar42b();getDefectos();rangoNumeroMargen('mg42b-c');cargar42b();" tabindex="195"/>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="s42b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="s42b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="s42b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="su42b-a"></div>
                                                    <div style="width: 30%;height: 20px;"id="su42b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="su42b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="p42b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="p42b-b"></div>
                                                    <div style="width: 30%;height: 20px;" id="p42b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Furca</td>
                                                <td class="borde"style="text-align:center">
                                                    <div style="width: 20%;height: 25px;margin-left: 7px" id="f42b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f42b-b">F-2</div>

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
                                    <input class="form-control form-control-xs" type="number" id="ps42b-a" name="ps42b-a" value="{{ $cuerpo42["pala_psondaje_a"] ?? 0 }}" onchange="cargar42b();getDefectos();" tabindex="145"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps42b-b" name="ps42b-a" value="{{ $cuerpo42["pala_psondaje_b"] ?? 0 }}" onchange="cargar42b();getDefectos();" tabindex="146"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps42b-c" name="ps42b-a" value="{{ $cuerpo42["pala_psondaje_c"] ?? 0 }}" onchange="cargar42b();getDefectos();" tabindex="147"//>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                <div class="col-sm-42 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg42b-a" name="mg42b-a" value="{{ $cuerpo42["pala_altura_mg_a"] ?? 0 }}" onchange="cargar42b();getDefectos();rangoNumeroMargen('mg42b-a');cargar42b();" tabindex="193"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg42b-b" name="mg42b-b" value="{{ $cuerpo42["pala_altura_mg_b"] ?? 0 }}" onchange="cargar42b();getDefectos();rangoNumeroMargen('mg42b-b');cargar42b();" tabindex="194"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg42b-c" name="mg42b-c" value="{{ $cuerpo42["pala_altura_mg_c"] ?? 0 }}" onchange="cargar42b();getDefectos();rangoNumeroMargen('mg42b-c');cargar42b();" tabindex="195"/>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s42b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s42b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s42b-c"></div>
                                    </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer pointer rounded-pill border-warning input-dental" id="su42b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su42b-b" ></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su42b-c"></div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p42b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p42b-b"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p42b-c"></div>
                                </div>
                            </div>
                            {{--  <div class="form-row">
                                <div class="col-sm-42 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Furca</h6>
                                </div>
                                <div class="col-sm-42 col-md-8">
                                    <div class="border rounded input-dental pointer w-100" id="f12b-a"></div>
                                </div>
                            </div>  --}}
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
            <div class="form-group" id="obs_pieza4.2">
                <label class="floating-label-activo-sm">Obs. Pieza 4.2</label>
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 4.2" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_42" id="obs_42" placeholder="Describa observaciones">{{ $cuerpo42["observaciones"] ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
    <div id="obs_pieza4.2">
            <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('42')"><i class="feather icon-save"></i>  Guardar evaluación 4.2</button>
    </div>
</div>

<script>

$(document).ready(function() {
    // Handler for .ready() called.
    //anchuraValor();
    cargar42a();
    cargar42b();

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

function drawVisualization42a(data42a) {
    // Create and draw the visualization.
    var ac42a = new google.visualization.AreaChart(document.getElementById('visualization42a'));
    ac42a.draw(data42a, {
    isStacked: true,
    backgroundColor: 'transparent',
    legend: {position: 'none'},
    tooltip: {trigger:'none'},
    axisTitlesPosition: 'none',
    theme: {chartArea: {width: '100%', height: '100%'}},
    width: 40,
    height: 160,
    hAxis: {},
    vAxis: {gridlines: {color: 'transparent', count: 31},baseline:0,textPosition:'none',viewWindowMode: 'explicit',viewWindow: {max:19,min:-42}}
    });

    $('#visualization42a iframe').attr('allowTransparency', 'true');
    $('#visualization42a iframe').contents().find('body').css('background', 'transparent');

}

function cargar42a(){

    var datoae42=document.getElementById('ae42').value;

    var datomg42a=document.getElementById('mg42-a').value;
    var datomg42b=document.getElementById('mg42-b').value;
    var datomg42c=document.getElementById('mg42-c').value;

    var datops42a=document.getElementById('ps42-a').value;
    var datops42b=document.getElementById('ps42-b').value;
    var datops42c=document.getElementById('ps42-c').value;

    //alert(document.getElementById('ps42-a').value);

    if(datops42a>3){
        document.getElementById('ps42-a').style.color="red";
    }else{
        document.getElementById('ps42-a').style.color="black";
    }
    if(datops42b>3){
        document.getElementById('ps42-b').style.color="red";
    }else{
        document.getElementById('ps42-b').style.color="black";
    }
    if(datops42c>3){
        document.getElementById('ps42-c').style.color="red";
    }else{
        document.getElementById('ps42-c').style.color="black";
    }


    var data42a=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
        ['',    0+(parseInt(datomg42a)+parseInt(datops42a)),      0-parseInt(datops42a), parseInt(datoae42)],
        ['',    0+(parseInt(datomg42b)+parseInt(datops42b)),      0-parseInt(datops42b), parseInt(datoae42)],
        ['',    0+(parseInt(datomg42c)+parseInt(datops42c)),      0-parseInt(datops42c), parseInt(datoae42)]
    ]);

    drawVisualization42a(data42a);

}

function drawVisualization42b(data42b) {

    // Create and draw the visualization.
    var ac42b = new google.visualization.AreaChart(document.getElementById('visualization42b'));
    ac42b.draw(data42b, {
    isStacked: true,
    backgroundColor: 'transparent',
    legend: {position: 'none'},
    tooltip: {trigger:'none'},
    axisTitlesPosition: 'none',
    theme: {chartArea: {width: '100%', height: '100%'}},
    width: 40,
    height: 160,
    hAxis: {},
    vAxis: {gridlines: {color: 'transparent', count: 31},baseline:0,textPosition:'none',viewWindowMode: 'explicit',viewWindow: {max:42,min:-19}}
    });
    $('#visualization42b iframe').attr('allowTransparency', 'true');
    $('#visualization42b iframe').contents().find('body').css('background', 'transparent');
}

function cargar42b(){

    var datomg42ba=document.getElementById('mg42b-a').value;
    var datomg42bb=document.getElementById('mg42b-b').value;
    var datomg42bc=document.getElementById('mg42b-c').value;

    var datops42ba=document.getElementById('ps42b-a').value;
    var datops42bb=document.getElementById('ps42b-b').value;
    var datops42bc=document.getElementById('ps42b-c').value;

    if(datops42ba>3){
        document.getElementById('ps42b-a').style.color="red";
    }else{
        document.getElementById('ps42b-a').style.color="black";
    }
    if(datops42bb>3){
        document.getElementById('ps42b-b').style.color="red";
    }else{
        document.getElementById('ps42b-b').style.color="black";
    }
    if(datops42bc>3){
        document.getElementById('ps42b-c').style.color="red";
    }else{
        document.getElementById('ps42b-c').style.color="black";
    }

    var data42b=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje'],
        ['',    0-(parseInt(datomg42ba)+parseInt(datops42ba)),      0+parseInt(datops42ba)],
        ['',    0-(parseInt(datomg42bb)+parseInt(datops42bb)),      0+parseInt(datops42bb)],
        ['',    0-(parseInt(datomg42bc)+parseInt(datops42bc)),      0+parseInt(datops42bc)]
    ]);

    drawVisualization42b(data42b);

}

arrstyle = ["i42","f42","f42b-a","f42b-b","s42-a","s42-b","s42-c","p42-a","p42-b","p42-c","s42b-a","s42b-b","s42b-c","p42b-a","p42b-b","p42b-c"];

//FUNCIONES PARA ANCHURA ENCÍA
$('#ae42').change(function() {
    if(parseInt(document.getElementById('ae42').value)<3){
        $(this).css("color","red");
    }else{
        $(this).css("color","black");
    }
    cargar42a();
});

//FUNCIONES PARA SANGRADO
$('#s42-a').toggle(
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
$('#s42-b').toggle(
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
$('#s42-c').toggle(
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

$('#s42b-a').toggle(
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
$('#s42b-b').toggle(
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
$('#s42b-c').toggle(
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
$('#su42-a').toggle(
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
$('#su42-b').toggle(
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
$('#su42-c').toggle(
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

$('#su42b-a').toggle(
    function () {
        $(this).css({"background":"#f3e842"});
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
$('#su42b-b').toggle(
    function () {
        $(this).css({"background":"#f3e842"});
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
$('#su42b-c').toggle(
    function () {
        $(this).css({"background":"#f3e842"});
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
$('#p42-a').toggle(
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
$('#p42-b').toggle(
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
$('#p42-c').toggle(
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
$('#p42b-a').toggle(
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
$('#p42b-b').toggle(
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
$('#p42b-c').toggle(
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
$('#d42').toggle(
    function () {
        $('#diente42-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau42.png') }}')");
        $('#diente42-a').css("background-position","-36px -42px");
        $('#diente42-a').css("background-repeat","no-repeat");
        $('#m42').prop('disabled', true); // Deshabilita el input con id 'm42'
        $('#i42').prop("disabled",true);
        $('#f42').prop("disabled",true);
        $('#s42-a').prop("disabled",true);
        $('#s42-b').prop("disabled",true);
        $('#s42-c').prop("disabled",true);
        $('#p42-a').prop("disabled",true);
        $('#p42-b').prop("disabled",true);
        $('#p42-c').prop("disabled",true);
        $('#mg42-a').prop("disabled",true);
        $('#mg42-b').prop("disabled",true);
        $('#mg42-c').prop("disabled",true);
        $('#ps42-a').prop("disabled",true);
        $('#ps42-b').prop("disabled",true);
        $('#ps42-c').prop("disabled",true);
        /*$('#furca42').css("background","none");*/
        $('#mg42-a').val('0');
        $('#mg42-b').val('0');
        $('#mg42-c').val('0');
        $('#ps42-a').val('0');
        $('#ps42-b').val('0');
        $('#ps42-c').val('0');

        $('#diente42b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-42b.png') }}')");
        $('#diente42b-a').css("background-position","0 23px");
        $('#diente42b-a').css("background-repeat","no-repeat");
        $('#m42b').prop("disabled",true);
        $('#i42b').prop("disabled",true);
        $('#f42b-a').prop("disabled",true);
        $('#f42b-b').prop("disabled",true);
        $('#s42b-a').prop("disabled",true);
        $('#s42b-b').prop("disabled",true);
        $('#s42b-c').prop("disabled",true);
        $('#p42b-a').prop("disabled",true);
        $('#p42b-b').prop("disabled",true);
        $('#p42b-c').prop("disabled",true);
        $('#mg42b-a').prop("disabled",true);
        $('#mg42b-b').prop("disabled",true);
        $('#mg42b-c').prop("disabled",true);
        $('#ps42b-a').prop("disabled",true);
        $('#ps42b-b').prop("disabled",true);
        $('#ps42b-c').prop("disabled",true);
        $('#mg42b-a').val('0');
        $('#mg42b-b').val('0');
        $('#mg42b-c').val('0');
        $('#ps42b-a').val('0');
        $('#ps42b-b').val('0');
        $('#ps42b-c').val('0');

        $('#furca42').prop("disabled",true);
        $('#furca42-a').prop("disabled",true);
        $('#furca42-b').prop("disabled",true);
        $('#ae42').prop("disabled",true);
        $('#pi42').prop("disabled",true);

        totalDientes--;
        getDefectos();
        cargar42a();
        cargar42b();

        {{--  cargar17a();
        cargar16a();
        cargar15a();
        cargar14a();
        cargar42a();
        cargar42a();
        cargar11a();;
        cargar2();
        cargar3();
        cargar4();  --}}
        getSangrado();
        getSupuracion();
        getPlaca();

    },
    function () {
        $('#diente42-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-42.png') }}')");
        $('#diente42-a').css("background-position","0 -2px");
        $('#diente42-a').css("background-repeat","no-repeat");
        $('#m42').prop("disabled",false);
        $('#i42').prop("disabled",false);
        $('#f42').prop("disabled",false);
        $('#s42-a').prop("disabled",false);
        $('#s42-b').prop("disabled",false);
        $('#s42-c').prop("disabled",false);
        $('#p42-a').prop("disabled",false);
        $('#p42-b').prop("disabled",false);
        $('#p42-c').prop("disabled",false);
        $('#mg42-a').prop("disabled",false);
        $('#mg42-b').prop("disabled",false);
        $('#mg42-c').prop("disabled",false);
        $('#ps42-a').prop("disabled",false);
        $('#ps42-b').prop("disabled",false);
        $('#ps42-c').prop("disabled",false);

        $('#diente42b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-42b.png') }}')");
        $('#diente42b-a').css("background-position","0 23px");
        $('#diente42b-a').css("background-repeat","no-repeat");
        $('#m42b').prop("disabled",false);
        $('#i42b').prop("disabled",false);
        $('#f42b-a').prop("disabled",false);
        $('#f42b-b').prop("disabled",false);
        $('#s42b-a').prop("disabled",false);
        $('#s42b-b').prop("disabled",false);
        $('#s42b-c').prop("disabled",false);
        $('#p42b-a').prop("disabled",false);
        $('#p42b-b').prop("disabled",false);
        $('#p42b-c').prop("disabled",false);
        $('#mg42b-a').prop("disabled",false);
        $('#mg42b-b').prop("disabled",false);
        $('#mg42b-c').prop("disabled",false);
        $('#ps42b-a').prop("disabled",false);
        $('#ps42b-b').prop("disabled",false);
        $('#ps42b-c').prop("disabled",false);

        $('#furca42').css("display","block");
        $('#furca42-a').css("display","block");
        $('#furca42-b').css("display","block");
        $('#ae42').prop("disabled",false);
        $('#pi42').prop("disabled",false);

        totalDientes++;

        {{--  cargar17a();
        cargar16a();
        cargar15a();
        cargar14a();
        cargar42a();
        cargar42a();
        cargar11a();;
        cargar2();
        cargar3();
        cargar4();  --}}
        getSangrado();
        getPlaca();
    }
);

//IMPLANTES
$('#i42').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
        $('#f42').css({"background":"#FFFFFF"});
        $('#diente42-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl42.png') }}')");
        $('#diente42-a').css("background-position","-38px -2px");
        $('#diente42-a').css("background-repeat","no-repeat");

        $('#diente42b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-42b.png') }}')");
        $('#diente42b-a').css("background-position","0 23px");
        $('#diente42b-a').css("background-repeat","no-repeat");

        $('#furca42').css("background","none");
        $('#furca42-a').css("background","none");
        $('#furca42-b').css("background","none");
        $('#f42').css("background","none");
        $('#f42b-a').css("background","none");
        $('#f42b-b').css("background","none");

        $("#f42").attr("id","f42desact");
        $("#f42b-a").attr("id","f42b-adesact");
        $("#f42b-b").attr("id","f42b-bdesact");

    },
    function () {
        $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
        $('#diente42-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-42.png') }}')");
        $('#diente42-a').css("background-position","0 -2px");
        $('#diente42-a').css("background-repeat","no-repeat");

        $('#diente42b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-42b.png') }}')");
        $('#diente42b-a').css("background-position","0 23px");
        $('#diente42b-a').css("background-repeat","no-repeat");

        $('#f42').css("background","#FFFFFF");
        $('#f42b-a').css("background","#FFFFFF");
        $('#f42b-b').css("background","#FFFFFF");

        $("#f42desact").attr("id","f42");
        $("#f42b-adesact").attr("id","f42b-a");
        $("#f42b-bdesact").attr("id","f42b-b");
        $('#d42').trigger('click');
    }
);

//FURCA
$('#f42').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#i42').css({"background":"#FFFFFF"});
        $('#furca42').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {

        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca42').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca42').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca42').css("background","none");
    }
);

//FURCAS TABLA 3
$('#f42b-a').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca42-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca42-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca42-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca42-a').css("background","none");
    }
);
$('#f42b-b').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca42-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca42-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca42-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca42-b').css("background","none");
    }
);




</script>









