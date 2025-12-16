  {{--  </head>  --}}
  <style>
    #i38{
    background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente38-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla6/periodontograma-dientes-arriba-38.png') }}');
        width:54px;
        background-position: -7px -2px;
        background-repeat: no-repeat;
    }


    #i38b{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente38b-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla8/periodontograma-dientes-abajo-38b.png') }}');
        width:54px;
        background-position: 0 23px;
        background-repeat: no-repeat;
    }
    #d38,#i38,#i38b,#f38,,#ae38-a,#ae38-b:hover{
        background: #E6E6E6;
    }
    #i38-implante{
        display:none;
        background: #000000;
        width: 8px;
        height:8px;
        margin: -12px 20px;
        position: absolute;
        cursor: pointer;
    }
    #f38{
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
    #pi38{
        width: 100%;
    }
    #furca38-a,#furca38-b{
        width: 16px;
        height: 16px;
        position: absolute;
    }
    #furca38-a{
        margin-top: 70px;
    }
    #furca38-b{
        margin-top: 80px;
        margin-left: 38px;
    }

    .f38,{
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
        $pieza38 = $piezas_periodonto->firstWhere('pieza', '38');
        $cuerpo38 = $pieza38 ? $pieza38->cuerpo : [];
        $pronostico38 = $cuerpo38['pronostico'] ?? '';
    @endphp
<div class="col-md-12 bg-white shadow-sm rounded mx-1">
    <div class="col-md-12">
        <div class="row">

            <div style="display:none">
                <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl38.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau38.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-38b.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-38b.png') }}"/>
            </div>
        </div>

    </div>
</div>

<!--LADO IZQ-->
<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Vestibular (3.8)</h5>
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

                                            <div id="visualization38a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente38-a"><div id="furca38"></div></div>
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
                                        <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d38">Diente ausente</div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-2">
                                         <div class="form-group">
                                            <label class="floating-label-activo-sm"></label>
                                            <div class="py-2 border input-dental rounded" id="i38">Marcar Implante</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Movilidad</label>
                                            <input  class="form-control form-control-xs"  type="number"  id="m38" name="m38" value="{{ $cuerpo38["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m38');"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Pronóstico</label>
                                            <select class="form-control form-control-xs" name="pi38" id="pi38">
                                                <option value="B" {{ $pronostico38 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                <option value="D" {{ $pronostico38 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                <option value="M" {{ $pronostico38 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                <option value="I" {{ $pronostico38 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Furca</label>
                                            <div class="border rounded input-dental pointer w-100" id="f38"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s38-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s38-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s38-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su38-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su38-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su38-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p38-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p38-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p38-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control form-control-xs" type="number" id="ae38" name="ae38" value="{{ $cuerpo38['plataforma'] ?? 0 }}" tabindex="33"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg38-a" name="mg38-a" value="{{ $cuerpo38["vest_altura_mg_a"] ?? 0 }}" onchange="cargar38a();getDefectos();rangoNumeroMargen('mg38-a');cargar38a();" tabindex="49"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg38-b" name="mg38-b" value="{{ $cuerpo38["vest_altura_mg_b"] ?? 0 }}" onchange="cargar38a();getDefectos();rangoNumeroMargen('mg38-b');cargar38a();" tabindex="50"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg38-c" name="mg38-c" value="{{ $cuerpo38["vest_altura_mg_c"] ?? 0 }}" onchange="cargar38a();getDefectos();rangoNumeroMargen('mg38-c');cargar38a();" tabindex="50"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps38-a" name="ps38-a" value="{{ $cuerpo38["vest_psondaje_a"] ?? 0 }}" onchange="cargar38a();getDefectos();" tabindex="97"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps38-b" name="ps38-b" value="{{ $cuerpo38["vest_psondaje_b"] ?? 0 }}" onchange="cargar38a();getDefectos();" tabindex="98"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps38-c" name="ps38-c" value="{{ $cuerpo38["vest_psondaje_c"] ?? 0 }}" onchange="cargar38a();getDefectos();" tabindex="99"/>
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
            <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Palatino (3.8)</h5>
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
                                                    <div id="visualization38b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente38b-a">
                                                        <div id="furca38-a"></div>
                                                        <div id="furca38-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
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
                                    <input class="form-control form-control-xs" type="number" id="ps38b-a" name="ps38b-a" value="{{ $cuerpo38['pala_psondaje_a'] ?? 0 }}" onchange="cargar38b();getDefectos();" tabindex="145"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps38b-b" name="ps38b-a" value="{{ $cuerpo38['pala_psondaje_b'] ?? 0 }}" onchange="cargar38b();getDefectos();" tabindex="146"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps38b-c" name="ps38b-a" value="{{ $cuerpo38['pala_psondaje_c'] ?? 0 }}" onchange="cargar38b();getDefectos();" tabindex="147"//>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg38b-a" name="mg38b-a" value="{{ $cuerpo38["pala_altura_mg_a"] ?? 0 }}" onchange="cargar38b();getDefectos();rangoNumeroMargen('mg38b-a');cargar38b();" tabindex="193"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg38b-b" name="mg38b-b" value="{{ $cuerpo38["pala_altura_mg_b"] ?? 0 }}" onchange="cargar38b();getDefectos();rangoNumeroMargen('mg38b-b');cargar38b();" tabindex="194"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg38b-c" name="mg38b-c" value="{{ $cuerpo38["pala_altura_mg_c"] ?? 0 }}" onchange="cargar38b();getDefectos();rangoNumeroMargen('mg38b-c');cargar38b();" tabindex="195"/>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s38b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s38b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s38b-c"></div>
                                    </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su38b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su38b-b" ></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su38b-c"></div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p38b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p38b-b"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p38b-c"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Furca</h6>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <div class="border rounded input-dental pointer w-100" id="f38b-a"></div>
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
                    <div class="form-group" id="obs_pieza3.8">
                        <label class="floating-label-activo-sm">Obs. Pieza 3.8</label>
                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 3.8" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_38" id="obs_38" placeholder="Describa observaciones">{{ $cuerpo38["observaciones"] ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BOTÓN GUARDAR-->
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
    <div id="obs_pieza2.8">
            <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('38')"><i class="feather icon-save"></i>  Guardar evaluación 3.8</button>
    </div>
</div>

<script>

$(document).ready(function() {
    // Handler for .ready() called.
    //anchuraValor();
    cargar38a();
    cargar38b();

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

function drawVisualization38a(data38a) {
    // Create and draw the visualization.
    var ac38a = new google.visualization.AreaChart(document.getElementById('visualization38a'));
    ac38a.draw(data38a, {
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

    $('#visualization38a iframe').attr('allowTransparency', 'true');
    $('#visualization38a iframe').contents().find('body').css('background', 'transparent');

}

function cargar38a(){

    var datoae38=document.getElementById('ae38').value;

    var datomg38a=document.getElementById('mg38-a').value;
    var datomg38b=document.getElementById('mg38-b').value;
    var datomg38c=document.getElementById('mg38-c').value;

    var datops38a=document.getElementById('ps38-a').value;
    var datops38b=document.getElementById('ps38-b').value;
    var datops38c=document.getElementById('ps38-c').value;

    //alert(document.getElementById('ps38-a').value);

    if(datops38a>3){
        document.getElementById('ps38-a').style.color="red";
    }else{
        document.getElementById('ps38-a').style.color="black";
    }
    if(datops38b>3){
        document.getElementById('ps38-b').style.color="red";
    }else{
        document.getElementById('ps38-b').style.color="black";
    }
    if(datops38c>3){
        document.getElementById('ps38-c').style.color="red";
    }else{
        document.getElementById('ps38-c').style.color="black";
    }


    var data38a=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
        ['',    0+(parseInt(datomg38a)+parseInt(datops38a)),      0-parseInt(datops38a), parseInt(datoae38)],
        ['',    0+(parseInt(datomg38b)+parseInt(datops38b)),      0-parseInt(datops38b), parseInt(datoae38)],
        ['',    0+(parseInt(datomg38c)+parseInt(datops38c)),      0-parseInt(datops38c), parseInt(datoae38)]
    ]);

    drawVisualization38a(data38a);

}

function drawVisualization38b(data38b) {

    // Create and draw the visualization.
    var ac38b = new google.visualization.AreaChart(document.getElementById('visualization38b'));
    ac38b.draw(data38b, {
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
    $('#visualization38b iframe').attr('allowTransparency', 'true');
    $('#visualization38b iframe').contents().find('body').css('background', 'transparent');
}

function cargar38b(){

    var datomg38ba=document.getElementById('mg38b-a').value;
    var datomg38bb=document.getElementById('mg38b-b').value;
    var datomg38bc=document.getElementById('mg38b-c').value;

    var datops38ba=document.getElementById('ps38b-a').value;
    var datops38bb=document.getElementById('ps38b-b').value;
    var datops38bc=document.getElementById('ps38b-c').value;

    if(datops38ba>3){
        document.getElementById('ps38b-a').style.color="red";
    }else{
        document.getElementById('ps38b-a').style.color="black";
    }
    if(datops38bb>3){
        document.getElementById('ps38b-b').style.color="red";
    }else{
        document.getElementById('ps38b-b').style.color="black";
    }
    if(datops38bc>3){
        document.getElementById('ps38b-c').style.color="red";
    }else{
        document.getElementById('ps38b-c').style.color="black";
    }

    var data38b=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje'],
        ['',    0-(parseInt(datomg38ba)+parseInt(datops38ba)),      0+parseInt(datops38ba)],
        ['',    0-(parseInt(datomg38bb)+parseInt(datops38bb)),      0+parseInt(datops38bb)],
        ['',    0-(parseInt(datomg38bc)+parseInt(datops38bc)),      0+parseInt(datops38bc)]
    ]);

    drawVisualization38b(data38b);

}

arrstyle = ["i38","f38","f38b-a","f38b-b","s38-a","s38-b","s38-c","p38-a","p38-b","p38-c","s38b-a","s38b-b","s38b-c","p38b-a","p38b-b","p38b-c"];

//FUNCIONES PARA ANCHURA ENCÍA
$('#ae38').change(function() {
    if(parseInt(document.getElementById('ae38').value)<3){
        $(this).css("color","red");
    }else{
        $(this).css("color","black");
    }
    cargar38a();
});

//FUNCIONES PARA SANGRADO
$('#s38-a').toggle(
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
$('#s38-b').toggle(
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
$('#s38-c').toggle(
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

$('#s38b-a').toggle(
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
$('#s38b-b').toggle(
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
$('#s38b-c').toggle(
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
$('#su38-a').toggle(
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
$('#su38-b').toggle(
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
$('#su38-c').toggle(
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

$('#su38b-a').toggle(
    function () {
        $(this).css({"background":"#f3e838"});
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
$('#su38b-b').toggle(
    function () {
        $(this).css({"background":"#f3e838"});
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
$('#su38b-c').toggle(
    function () {
        $(this).css({"background":"#f3e838"});
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
$('#p38-a').toggle(
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
$('#p38-b').toggle(
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
$('#p38-c').toggle(
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
$('#p38b-a').toggle(
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
$('#p38b-b').toggle(
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
$('#p38b-c').toggle(
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
$('#d38').toggle(
    function () {
        $('#diente38-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau38.png') }}')");
        $('#diente38-a').css("background-position","-7px -2px");
        $('#diente38-a').css("background-repeat","no-repeat");
        $('#m38').prop('disabled', true); // Deshabilita el input con id 'm38'
        $('#i38').prop("disabled",true);
        $('#f38').prop("disabled",true);
        $('#s38-a').prop("disabled",true);
        $('#s38-b').prop("disabled",true);
        $('#s38-c').prop("disabled",true);
        $('#p38-a').prop("disabled",true);
        $('#p38-b').prop("disabled",true);
        $('#p38-c').prop("disabled",true);
        $('#mg38-a').prop("disabled",true);
        $('#mg38-b').prop("disabled",true);
        $('#mg38-c').prop("disabled",true);
        $('#ps38-a').prop("disabled",true);
        $('#ps38-b').prop("disabled",true);
        $('#ps38-c').prop("disabled",true);
        /*$('#furca38').css("background","none");*/
        $('#mg38-a').val('0');
        $('#mg38-b').val('0');
        $('#mg38-c').val('0');
        $('#ps38-a').val('0');
        $('#ps38-b').val('0');
        $('#ps38-c').val('0');

        $('#diente38b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-38b.png') }}')");
        $('#diente38b-a').css("background-position","0 23px");
        $('#diente38b-a').css("background-repeat","no-repeat");
        $('#m38b').prop("disabled",true);
        $('#i38b').prop("disabled",true);
        $('#f38b-a').prop("disabled",true);
        $('#f38b-b').prop("disabled",true);
        $('#s38b-a').prop("disabled",true);
        $('#s38b-b').prop("disabled",true);
        $('#s38b-c').prop("disabled",true);
        $('#p38b-a').prop("disabled",true);
        $('#p38b-b').prop("disabled",true);
        $('#p38b-c').prop("disabled",true);
        $('#mg38b-a').prop("disabled",true);
        $('#mg38b-b').prop("disabled",true);
        $('#mg38b-c').prop("disabled",true);
        $('#ps38b-a').prop("disabled",true);
        $('#ps38b-b').prop("disabled",true);
        $('#ps38b-c').prop("disabled",true);
        $('#mg38b-a').val('0');
        $('#mg38b-b').val('0');
        $('#mg38b-c').val('0');
        $('#ps38b-a').val('0');
        $('#ps38b-b').val('0');
        $('#ps38b-c').val('0');

        $('#furca38').prop("disabled",true);
        $('#furca38-a').prop("disabled",true);
        $('#furca38-b').prop("disabled",true);
        $('#ae38').prop("disabled",true);
        $('#pi38').prop("disabled",true);

        totalDientes--;
        getDefectos();
        cargar38a();
        cargar38b();

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
        $('#diente38-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-38.png') }}')");
        $('#diente38-a').css("background-position","0 -2px");
        $('#diente38-a').css("background-repeat","no-repeat");
        $('#m38').prop("disabled",false);
        $('#i38').prop("disabled",false);
        $('#f38').prop("disabled",false);
        $('#s38-a').prop("disabled",false);
        $('#s38-b').prop("disabled",false);
        $('#s38-c').prop("disabled",false);
        $('#p38-a').prop("disabled",false);
        $('#p38-b').prop("disabled",false);
        $('#p38-c').prop("disabled",false);
        $('#mg38-a').prop("disabled",false);
        $('#mg38-b').prop("disabled",false);
        $('#mg38-c').prop("disabled",false);
        $('#ps38-a').prop("disabled",false);
        $('#ps38-b').prop("disabled",false);
        $('#ps38-c').prop("disabled",false);

        $('#diente38b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-38b.png') }}')");
        $('#diente38b-a').css("background-position","0 23px");
        $('#diente38b-a').css("background-repeat","no-repeat");
        $('#m38b').prop("disabled",false);
        $('#i38b').prop("disabled",false);
        $('#f38b-a').prop("disabled",false);
        $('#f38b-b').prop("disabled",false);
        $('#s38b-a').prop("disabled",false);
        $('#s38b-b').prop("disabled",false);
        $('#s38b-c').prop("disabled",false);
        $('#p38b-a').prop("disabled",false);
        $('#p38b-b').prop("disabled",false);
        $('#p38b-c').prop("disabled",false);
        $('#mg38b-a').prop("disabled",false);
        $('#mg38b-b').prop("disabled",false);
        $('#mg38b-c').prop("disabled",false);
        $('#ps38b-a').prop("disabled",false);
        $('#ps38b-b').prop("disabled",false);
        $('#ps38b-c').prop("disabled",false);

        $('#furca38').css("display","block");
        $('#furca38-a').css("display","block");
        $('#furca38-b').css("display","block");
        $('#ae38').prop("disabled",false);
        $('#pi38').prop("disabled",false);

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
$('#i38').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
        $('#f38').css({"background":"#FFFFFF"});
        $('#diente38-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl38.png') }}')");
        $('#diente38-a').css("background-position","-7px -2px");
        $('#diente38-a').css("background-repeat","no-repeat");

        $('#diente38b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-38b.png') }}')");
        $('#diente38b-a').css("background-position","0 23px");
        $('#diente38b-a').css("background-repeat","no-repeat");

        $('#furca38').css("background","none");
        $('#furca38-a').css("background","none");
        $('#furca38-b').css("background","none");
        $('#f38').css("background","none");
        $('#f38b-a').css("background","none");
        $('#f38b-b').css("background","none");

        $("#f38").attr("id","f38desact");
        $("#f38b-a").attr("id","f38b-adesact");
        $("#f38b-b").attr("id","f38b-bdesact");

    },
    function () {
        $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
        $('#diente38-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-38.png') }}')");
        $('#diente38-a').css("background-position","0 -2px");
        $('#diente38-a').css("background-repeat","no-repeat");

        $('#diente38b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-38b.png') }}')");
        $('#diente38b-a').css("background-position","0 23px");
        $('#diente38b-a').css("background-repeat","no-repeat");

        $('#f38').css("background","#FFFFFF");
        $('#f38b-a').css("background","#FFFFFF");
        $('#f38b-b').css("background","#FFFFFF");

        $("#f38desact").attr("id","f38");
        $("#f38b-adesact").attr("id","f38b-a");
        $("#f38b-bdesact").attr("id","f38b-b");
        $('#d38').trigger('click');
    }
);

//FURCA
$('#f38').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#i38').css({"background":"#FFFFFF"});
        $('#furca38').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {

        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca38').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca38').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca38').css("background","none");
    }
);

//FURCAS TABLA 3
$('#f38b-a').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca38-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca38-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca38-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca38-a').css("background","none");
    }
);
$('#f38b-b').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca38-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca38-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca38-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca38-b').css("background","none");
    }
);




</script>
