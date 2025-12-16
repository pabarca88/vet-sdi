
    {{--  </head>  --}}
    <style>
        #i18{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente18-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-18.png') }}');
            width:54px;
            background-position: 0 -2px;
            background-repeat: no-repeat;
        }


        #i18b{
            background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
            width: 100%;
            height:18px;
        }
        #diente18b-a{
            margin:auto;
            background: url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-18b.png') }}');
            width:54px;
            background-position: 0 23px;
            background-repeat: no-repeat;
        }
        #d18,#i18,#i18b,#f18,,#ae18-a,#ae18-b:hover{
            background: #E6E6E6;
        }
        #i18-implante{
            display:none;
            background: #000000;
            width: 8px;
            height:8px;
            margin: -12px 20px;
            position: absolute;
            cursor: pointer;
        }
        #f18{
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
        #pi18{
            width: 35px;
        }
        #furca18-a,#furca18-b{
            width: 18px;
            height: 18px;
            position: absolute;
        }
        #furca18-a{
            margin-top: 70px;
        }
        #furca18-b{
            margin-top: 80px;
            margin-left: 28px;
        }

        .f18,{
            width: 100%;
            height: 18px;
            background: #f5c6c6;
            border: 1px solid #2cdcbf;
            background-repeat: no-repeat;
            float:left;
            display:inline;
        }
        {{--  .titulo{
            text-align: left;
            padding-right: 5px;
            font-weight:bold;
            color:rgb(39, 41, 47);
        }  --}}
        {{--  .borde{
                border: 1px solid #a4a4a4;
                padding: 1px;
                text-align: center;
            }  --}}
        .noborde{



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

                    <img src="{{ asset('images/dental/periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-18.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla1/tachados/periodontograma-dientes-arriba-tachados-18.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-18b.png') }}"/>

                    <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-18b.png') }}"/>
                </div>
            </div>

        </div>
    </div>

    <!--LADO IZQ-->





    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card-a">
            <div class="card-header-a" id="motivo">
                <h6 class="text-center">Vestibular</h6>
             </div>
            <div class="card-body-aten-a ">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <form name ="grafico1" id="grafico1" action="#">
                            <table id="tabla" style="width: 100%">
                                <tbody>
                                    <tr>
                                        <td class="titulo"></td>
                                        <td class="borde formulario" ><div id="d18">1.8</div></td>

                                    </tr>
                                    <tr>
                                        <td class="titulo">Implante</td>
                                        <td class="borde formulario"><div id="i18"></div></td>

                                    </tr>
                                    <tr>
                                        <td class="titulo">Movilidad</td>
                                        <td class="#" colspan="2">
                                            <input style="width: 20%;height: 25px; margin-left: 7px" type="number"  id="m18" name="m18" value="0" tabindex="1" onchange="rangoNumero('m18');"/>

                                              <textarea style="width: 50%;height: 25px; margin-right: 7px"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" placeholder="Observaciones" name="obs_p1.8" id="obs_p1.8"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Pron&oacute;stico </td>
                                        <td class="borde formulario">

                                            <select style="width: 93%;height: 25px; margin-left: 7px" name="pi18" id="pi18">
                                                <option value="" selected></option>
                                                <option value="B">Buen Pronóstico</option>
                                                <option value="D">Dudoso</option>
                                                <option value="M">Reservado</option>
                                                <option value="I">Mal Pronóstico</option>
                                            </select>

                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="titulo">Furca</td>
                                        <td class="borde"><div id="f18"></div></td>

                                    </tr>
                                    <tr>
                                        <td class="titulo">Sangrado </td>
                                        <td class="borde formulario">
                                            <div style="width: 30%;height: 20px;margin-left: 7px" id="s18-a"></div>
                                            <div style="width: 30%;height: 20px;" id="s18-b" ></div>
                                            <div style="width: 30%;height: 20px;" id="s18-c" ></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo"> Supuraci&oacute;n</td>
                                        <td class="borde formulario">
                                            <div style="width: 30%;height: 20px;margin-left: 7px" id="su18-a"></div>
                                            <div style="width: 30%;height: 20px;" id="su18-b" ></div>
                                            <div style="width: 30%;height: 20px;" id="su18-c" ></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Higiene</td>
                                        <td class="borde formulario">
                                            <div style="width: 30%;height: 20px; margin-left: 7px" id="p18-a"></div>
                                            <div style="width: 30%;height: 20px;" id="p18-b"></div>
                                            <div style="width: 30%;height: 20px;" id="p18-c"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Plataforma</td>
                                        <td class="borde formulario">

                                            <input style="width: 93%;height: 25px; margin-left: 7px" type="number" id="ae18" name="ae18" value="0" tabindex="33"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="titulo">Altura  MG</td>
                                        <td class="borde formulario center">
                                            <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="mg18-a" name="mg18-a" value="0" onchange="cargar18a();getDefectos();rangoNumeroMargen('mg18-a');cargar18a();" tabindex="49"/>
                                            <input type="number" style="width: 30%;height: 25px;"  id="mg18-b" name="mg18-b" value="0" onchange="cargar18a();getDefectos();rangoNumeroMargen('mg18-b');cargar18a();" tabindex="50"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="mg18-c" name="mg18-c" value="0" onchange="cargar18a();getDefectos();rangoNumeroMargen('mg18-c');cargar18a();" tabindex="51"/>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="titulo">P sondaje</td>
                                        <td class="borde formulario center" >
                                            <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps18-a" name="ps18-a" value="0" onchange="cargar18a();getDefectos();" tabindex="97"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="ps18-b" name="ps18-b" value="0" onchange="cargar18a();getDefectos();" tabindex="98"/>
                                            <input style="width: 30%;height: 25px;" type="number" id="ps18-c" name="ps18-c" value="0" onchange="cargar18a();getDefectos();" tabindex="99"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                        <td colspan="2" class="noborde formulario" style="position: relative;" >
                                        <div id="lineas-gr"></div>

                                        <div id="visualization18a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                        <div id="diente18-a"><div id="furca18"></div></div>
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

    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card-a">
            <div class="card-header-a" id="motivo">
                <h6 class="text-center">Palatino</h6>
            </div>
            <div class="card-body-aten-a">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <form name ="grafico3" id="grafico3" action="#">
                            <table id="tabla" style="width: 100%">
                                <tbody>
                                        <tr>
                                            <!--<td class="titulo" style="color:#565A5D">Palatino</td>-->
                                            <td colspan="2" class="noborde">
                                                <div id="lineas-gr-inf"></div>
                                                <div id="visualization18b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                <div id="diente18b-a">
                                                    <div id="furca18-a"></div>
                                                    <div id="furca18-b"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">P. sondaje</td>
                                            <td class="borde">
                                                <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps18b-a" name="ps18b-a" value="0" onchange="cargar18b();getDefectos();" tabindex="145"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps18b-b" name="ps18b-b" value="0" onchange="cargar18b();getDefectos();" tabindex="146"/>
                                                <input style="width: 30%;height: 25px;" type="number" id="ps18b-c" name="ps18b-c" value="0" onchange="cargar18b();getDefectos();" tabindex="147"/></td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Altura MG</td>
                                            <td class="borde">
                                                <div class="row">
                                                    <div class="col-md-4 text-center">
                                                        <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg18b-a" name="mg18b-a" value="0" onchange="cargar18b();getDefectos();rangoNumeroMargen('mg18b-a');cargar18b();" tabindex="193"/>
                                                    </div>
                                                    <div class="col-md-4 text-center">
                                                        <input class="form-control form-control-sm"  type="number" id="mg18b-b" name="mg18b-b" value="0" onchange="cargar18b();getDefectos();rangoNumeroMargen('mg18b-b');cargar18b();" tabindex="194"/>
                                                    </div>
                                                    <div class="col-md-4 text-center">
                                                        <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg18b-c" name="mg18b-c" value="0" onchange="cargar18b();getDefectos();rangoNumeroMargen('mg18b-c');cargar18b();" tabindex="195"/>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Sangrado </td>
                                            <td class="borde">
                                                <div style="width: 30%;height: 20px;margin-left: 7px" id="s18b-a"></div>
                                                <div style="width: 30%;height: 20px;" id="s18b-b" ></div>
                                                <div style="width: 30%;height: 20px;" id="s18b-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Supuraci&oacute;n</td>
                                            <td class="borde">
                                                <div style="width: 30%;height: 20px;margin-left: 7px" id="su18b-a"></div>
                                                <div style="width: 30%;height: 20px;"id="su18b-b" ></div>
                                                <div style="width: 30%;height: 20px;" id="su18b-c" ></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Higiene</td>
                                            <td class="borde">
                                                <div style="width: 30%;height: 20px;margin-left: 7px" id="p18b-a"></div>
                                                <div style="width: 30%;height: 20px;" id="p18b-b"></div>
                                                <div style="width: 30%;height: 20px;" id="p18b-c"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Furca</td>
                                            <td class="borde"style="text-align:center">
                                                <div style="width: 20%;height: 25px;margin-left: 7px" id="f18b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f18b-b">F-2</div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="titulo">Nota</td>
                                            <td class="borde">
                                                <input style="width: 93%;height: 25px;margin-left: 7px"  type="text" id="n18" name="n18" tabindex="257"/>
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
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="form-group"   id="obs_pieza1.8" >
            <label class="floating-label-activo-sm">Obs. Pieza 1.8<i> (describir)</i></label>
            <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 1.8" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_op_bruxismo" id="det_op_bruxismo"></textarea>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="form-group"   id="obs_pieza1.8" >
            <div class="form-group">
                <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-save"></i> + Guardar Evaluación 1.8</button>
            </div>
        </div>
    </div>

<script>

    $(document).ready(function() {
        // Handler for .ready() called.
        //anchuraValor();
        cargar18a();
        cargar18b();

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

    function drawVisualization18a(data18a) {
        // Create and draw the visualization.
        var ac18a = new google.visualization.AreaChart(document.getElementById('visualization18a'));
        ac18a.draw(data18a, {
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

        $('#visualization18a iframe').attr('allowTransparency', 'true');
        $('#visualization18a iframe').contents().find('body').css('background', 'transparent');

    }

    function cargar18a(){

        var datoae18=document.getElementById('ae18').value;

        var datomg18a=document.getElementById('mg18-a').value;
        var datomg18b=document.getElementById('mg18-b').value;
        var datomg18c=document.getElementById('mg18-c').value;

        var datops18a=document.getElementById('ps18-a').value;
        var datops18b=document.getElementById('ps18-b').value;
        var datops18c=document.getElementById('ps18-c').value;

        //alert(document.getElementById('ps18-a').value);

        if(datops18a>3){
            document.getElementById('ps18-a').style.color="red";
        }else{
            document.getElementById('ps18-a').style.color="black";
        }
        if(datops18b>3){
            document.getElementById('ps18-b').style.color="red";
        }else{
            document.getElementById('ps18-b').style.color="black";
        }
        if(datops18c>3){
            document.getElementById('ps18-c').style.color="red";
        }else{
            document.getElementById('ps18-c').style.color="black";
        }


        var data18a=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
            ['',    0+(parseInt(datomg18a)+parseInt(datops18a)),      0-parseInt(datops18a), parseInt(datoae18)],
            ['',    0+(parseInt(datomg18b)+parseInt(datops18b)),      0-parseInt(datops18b), parseInt(datoae18)],
            ['',    0+(parseInt(datomg18c)+parseInt(datops18c)),      0-parseInt(datops18c), parseInt(datoae18)]
        ]);

        drawVisualization18a(data18a);

    }

    function drawVisualization18b(data18b) {

        // Create and draw the visualization.
        var ac18b = new google.visualization.AreaChart(document.getElementById('visualization18b'));
        ac18b.draw(data18b, {
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
        $('#visualization18b iframe').attr('allowTransparency', 'true');
        $('#visualization18b iframe').contents().find('body').css('background', 'transparent');
    }

    function cargar18b(){

        var datomg18ba=document.getElementById('mg18b-a').value;
        var datomg18bb=document.getElementById('mg18b-b').value;
        var datomg18bc=document.getElementById('mg18b-c').value;

        var datops18ba=document.getElementById('ps18b-a').value;
        var datops18bb=document.getElementById('ps18b-b').value;
        var datops18bc=document.getElementById('ps18b-c').value;

        if(datops18ba>3){
            document.getElementById('ps18b-a').style.color="red";
        }else{
            document.getElementById('ps18b-a').style.color="black";
        }
        if(datops18bb>3){
            document.getElementById('ps18b-b').style.color="red";
        }else{
            document.getElementById('ps18b-b').style.color="black";
        }
        if(datops18bc>3){
            document.getElementById('ps18b-c').style.color="red";
        }else{
            document.getElementById('ps18b-c').style.color="black";
        }

        var data18b=google.visualization.arrayToDataTable([
            ['',   'Margen Gingival', 'Profundidad de sondaje'],
            ['',    0-(parseInt(datomg18ba)+parseInt(datops18ba)),      0+parseInt(datops18ba)],
            ['',    0-(parseInt(datomg18bb)+parseInt(datops18bb)),      0+parseInt(datops18bb)],
            ['',    0-(parseInt(datomg18bc)+parseInt(datops18bc)),      0+parseInt(datops18bc)]
        ]);

        drawVisualization18b(data18b);

    }

    arrstyle = ["i18","f18","f18b-a","f18b-b","s18-a","s18-b","s18-c","p18-a","p18-b","p18-c","s18b-a","s18b-b","s18b-c","p18b-a","p18b-b","p18b-c"];

    //FUNCIONES PARA ANCHURA ENCÍA
    $('#ae18').change(function() {
        if(parseInt(document.getElementById('ae18').value)<3){
            $(this).css("color","red");
        }else{
            $(this).css("color","black");
        }
        cargar18a();
    });

    //FUNCIONES PARA SANGRADO
    $('#s18-a').toggle(
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
    $('#s18-b').toggle(
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
    $('#s18-c').toggle(
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

    $('#s18b-a').toggle(
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
    $('#s18b-b').toggle(
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
    $('#s18b-c').toggle(
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
    $('#su18-a').toggle(
        function () {
            $(this).css({"background":"#f3e818"});
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
    $('#su18-b').toggle(
        function () {
            $(this).css({"background":"#f3e818"});
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
    $('#su18-c').toggle(
        function () {
            $(this).css({"background":"#f3e818"});
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

    $('#su18b-a').toggle(
        function () {
            $(this).css({"background":"#f3e818"});
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
    $('#su18b-b').toggle(
        function () {
            $(this).css({"background":"#f3e818"});
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
    $('#su18b-c').toggle(
        function () {
            $(this).css({"background":"#f3e818"});
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
    $('#p18-a').toggle(
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
    $('#p18-b').toggle(
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
    $('#p18-c').toggle(
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
    $('#p18b-a').toggle(
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
    $('#p18b-b').toggle(
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
    $('#p18b-c').toggle(
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
	$('#d18').toggle(
        function () {
            $('#diente18-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/tachados/periodontograma-dientes-arriba-tachados-18.png') }}')");
            $('#diente18-a').css("background-position","0 -2px");
            $('#diente18-a').css("background-repeat","no-repeat");
            $('#m18').css("display","none");
            $('#i18').css("display","none");
            $('#f18').css("display","none");
            $('#s18-a').css("display","none");
            $('#s18-b').css("display","none");
            $('#s18-c').css("display","none");
            $('#p18-a').css("display","none");
            $('#p18-b').css("display","none");
            $('#p18-c').css("display","none");
            $('#mg18-a').css("display","none");
            $('#mg18-b').css("display","none");
            $('#mg18-c').css("display","none");
            $('#ps18-a').css("display","none");
            $('#ps18-b').css("display","none");
            $('#ps18-c').css("display","none");
            /*$('#furca18').css("background","none");*/
            $('#mg18-a').val('0');
            $('#mg18-b').val('0');
            $('#mg18-c').val('0');
            $('#ps18-a').val('0');
            $('#ps18-b').val('0');
            $('#ps18-c').val('0');

            $('#diente18b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-18b.png') }}')");
            $('#diente18b-a').css("background-position","0 23px");
            $('#diente18b-a').css("background-repeat","no-repeat");
            $('#m18b').css("display","none");
            $('#i18b').css("display","none");
            $('#f18b-a').css("display","none");
            $('#f18b-b').css("display","none");
            $('#s18b-a').css("display","none");
            $('#s18b-b').css("display","none");
            $('#s18b-c').css("display","none");
            $('#p18b-a').css("display","none");
            $('#p18b-b').css("display","none");
            $('#p18b-c').css("display","none");
            $('#mg18b-a').css("display","none");
            $('#mg18b-b').css("display","none");
            $('#mg18b-c').css("display","none");
            $('#ps18b-a').css("display","none");
            $('#ps18b-b').css("display","none");
            $('#ps18b-c').css("display","none");
            $('#mg18b-a').val('0');
            $('#mg18b-b').val('0');
            $('#mg18b-c').val('0');
            $('#ps18b-a').val('0');
            $('#ps18b-b').val('0');
            $('#ps18b-c').val('0');

            $('#furca18').css("display","none");
            $('#furca18-a').css("display","none");
            $('#furca18-b').css("display","none");
            $('#ae18').css("display","none");
            $('#pi18').css("display","none");

            totalDientes--;
            getDefectos();
            cargar18a();
            cargar18b();

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
            $('#diente18-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-18.png') }}')");
            $('#diente18-a').css("background-position","0 -2px");
            $('#diente18-a').css("background-repeat","no-repeat");
            $('#m18').css("display","inline");
            $('#i18').css("display","block");
            $('#f18').css("display","inline");
            $('#s18-a').css("display","inline");
            $('#s18-b').css("display","inline");
            $('#s18-c').css("display","inline");
            $('#p18-a').css("display","inline");
            $('#p18-b').css("display","inline");
            $('#p18-c').css("display","inline");
            $('#mg18-a').css("display","inline");
            $('#mg18-b').css("display","inline");
            $('#mg18-c').css("display","inline");
            $('#ps18-a').css("display","inline");
            $('#ps18-b').css("display","inline");
            $('#ps18-c').css("display","inline");

            $('#diente18b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-18b.png') }}')");
            $('#diente18b-a').css("background-position","0 23px");
            $('#diente18b-a').css("background-repeat","no-repeat");
            $('#m18b').css("display","inline");
            $('#i18b').css("display","inline");
            $('#f18b-a').css("display","inline");
            $('#f18b-b').css("display","inline");
            $('#s18b-a').css("display","inline");
            $('#s18b-b').css("display","inline");
            $('#s18b-c').css("display","inline");
            $('#p18b-a').css("display","inline");
            $('#p18b-b').css("display","inline");
            $('#p18b-c').css("display","inline");
            $('#mg18b-a').css("display","inline");
            $('#mg18b-b').css("display","inline");
            $('#mg18b-c').css("display","inline");
            $('#ps18b-a').css("display","inline");
            $('#ps18b-b').css("display","inline");
            $('#ps18b-c').css("display","inline");

            $('#furca18').css("display","block");
            $('#furca18-a').css("display","block");
            $('#furca18-b').css("display","block");
            $('#ae18').css("display","inline");
            $('#pi18').css("display","inline");

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
	$('#i18').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
            $('#f18').css({"background":"#FFFFFF"});
            $('#diente18-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-18.png') }}')");
            $('#diente18-a').css("background-position","0 -2px");
            $('#diente18-a').css("background-repeat","no-repeat");

            $('#diente18b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-18b.png') }}')");
            $('#diente18b-a').css("background-position","0 23px");
            $('#diente18b-a').css("background-repeat","no-repeat");

            $('#furca18').css("background","none");
            $('#furca18-a').css("background","none");
            $('#furca18-b').css("background","none");
            $('#f18').css("background","none");
            $('#f18b-a').css("background","none");
            $('#f18b-b').css("background","none");

            $("#f18").attr("id","f18desact");
            $("#f18b-a").attr("id","f18b-adesact");
            $("#f18b-b").attr("id","f18b-bdesact");

        },
        function () {
            $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
            $('#diente18-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-18.png') }}')");
            $('#diente18-a').css("background-position","0 -2px");
            $('#diente18-a').css("background-repeat","no-repeat");

            $('#diente18b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-18b.png') }}')");
            $('#diente18b-a').css("background-position","0 23px");
            $('#diente18b-a').css("background-repeat","no-repeat");

            $('#f18').css("background","#FFFFFF");
            $('#f18b-a').css("background","#FFFFFF");
            $('#f18b-b').css("background","#FFFFFF");

            $("#f18desact").attr("id","f18");
            $("#f18b-adesact").attr("id","f18b-a");
            $("#f18b-bdesact").attr("id","f18b-b");
            $('#d18').trigger('click');
        }
	);

    //FURCA
	$('#f18').toggle(
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
			$('#i18').css({"background":"#FFFFFF"});
			$('#furca18').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
		},
		function () {

			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
			$('#furca18').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
			$('#furca18').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
		},
		function () {
			$(this).css({"background":"#FFFFFF"});
			$('#furca18').css("background","none");
		}
	);

    //FURCAS TABLA 3
    $('#f18b-a').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca18-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca18-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca18-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca18-a').css("background","none");
        }
    );
    $('#f18b-b').toggle(
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
            $('#furca18-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
            $('#furca18-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
            $('#furca18-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
        },
        function () {
            $(this).css({"background":"#FFFFFF"});
            $('#furca18-b').css("background","none");
        }
    );




</script>



