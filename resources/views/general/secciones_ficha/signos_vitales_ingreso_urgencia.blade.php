
            <div class="row">
                <div class="col-sm-12 pb-0 mb-2 d-inline">
                        <p class="pt-3 d-inline">
                        <script>
                            var f = new Date();
                            document.write(  + f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear() + " -" + f.getHours()+ ":" + f.getMinutes() +"  " );
                        </script>
                        </p>
                    <button type="button" class="btn btn-info-light-c btn-xxs btn-agregar-evolucion d-inline float-right "><i class="feather icon-plus"></i> Nueva evolución</button>
                </div>
            </div>
                <div class=" border  px-2 pt-3 pb-1 rounded shadow">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
                            <div class="form-group">
                                <label class="floating-label-activo-sm t-red" for="av_subj_sc_od">Responsable</label>
                                <select name="resp_tto"  id="resp_tto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('resp_tto','div_resp_tto','nom_resp_tto',4);">
                                    <option  value="0">Seleccione</option>
                                    <option  value="1">Juana Perez </option>
                                    <option  value="2">Maria la del Barrio</option>
                                    <option  value="3">alumna en práctica</option>
                                    <option  value="4">Otro/a<option>
                                </select>
                            </div>
                            <div class="form-group" id="div_resp_tto" style="display:none;">
                                <label class="floating-label-activo-sm t-red" for="obs_av_subj_sc_od">Nombre/Rut <i>(Anotar)</i></label>
                                <textarea class="form-control form-control-sm" data-titulo="Obs. Agudeza visual Subj.S/C OD" data-seccion="Agudeza Visual" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="nom_resp_tto" id="nom_resp_tto"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-1 col-md col-lg col-xl">
                            <div class="form-group">
                                 <label class="floating-label-activo-sm">Tº</label>
                                 <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="{{ $fichaAtencion->temperatura }}">
                            </div>
                        </div>
                        <div class="col-sm-1 col-md col-lg col-xl">
                            <div class="form-group">
                                @if (isset($fichaAtencion) && $fichaAtencion->pulso != null)
                                <label class="floating-label-activo-sm">Pulso</label>
                                <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{{ $fichaAtencion->pulso }}">
                                @else
                                <label class="floating-label-activo-sm">Pulso</label>
                                <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{!! old('pulso') !!}">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-1 col-md-col-lg-col"-xl>
                            <div class="form-group">
                                @if (isset($fichaAtencion) && $fichaAtencion->presion_bi !=
                                null)
                                <label class="floating-label-activo-sm">PAS</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="pas" value="{{ $fichaAtencion->presion_bi }}">
                                @else
                                <label class="floating-label-activo-sm">PAS</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="pas" value="{!! old('presion_bi') !!}">
                                @endif
                            </div>
                        </div>
    					<div class="col-sm-1 col-md col-lg col-xl">
                            <div class="form-group">
                                @if (isset($fichaAtencion) && $fichaAtencion->presion_bi !=
                                null)
                                <label class="floating-label-activo-sm">PAD</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="pad" value="{{ $fichaAtencion->presion_bi }}">
                                @else
                                <label class="floating-label-activo-sm">PAD</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="pad" value="{!! old('presion_bi') !!}">
                                @endif
                            </div>
                        </div>
    					<div class="col-sm-1 col-md col-lg col-xl">
                            <div class="form-group">
                                @if (isset($fichaAtencion) && $fichaAtencion->presion_bi !=
                                null)
                                <label class="floating-label-activo-sm">PAM</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="pam" value="{{ $fichaAtencion->presion_bi }}">
                                @else
                                <label class="floating-label-activo-sm">PAM</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="pam" value="{!! old('presion_bi') !!}">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-1 col-md col-lg col-xl">
                            <div class="form-group">
                                @if (isset($fichaAtencion) && $fichaAtencion->presion_bi !=
                                null)
                                <label class="floating-label-activo-sm">F/R</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{{ $fichaAtencion->presion_bi }}">
                                @else
                                <label class="floating-label-activo-sm">F/R</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{!! old('presion_bi') !!}">
                                @endif
                            </div>
                        </div>
    					 <div class="col-sm-1 col-md col-lg col-xl">
                            <div class="form-group">
                                @if (isset($fichaAtencion) && $fichaAtencion->peso != null)
                                <label class="floating-label-activo-sm">Peso</label>
                                <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="{{ $fichaAtencion->peso }}">
                                @else
                                <label class="floating-label-activo-sm">Peso</label>
                                <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="{!! old('peso') !!}">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-1 col-md col-lg col-xl">
                            <div class="form-group">
                                @if (isset($fichaAtencion) && $fichaAtencion->talla != null)
                                <label class="floating-label-activo-sm">Talla</label>
                                <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="{{ $fichaAtencion->talla }}">
                                @else
                                <label class="floating-label-activo-sm">Talla</label>
                                <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="{!! old('talla') !!}">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-1 col-md col-lg col-xl">
                            <div class="form-group">
                                @if (isset($fichaAtencion) && $fichaAtencion->imc != null)
                                <label class="floating-label-activo-sm">IMC</label>
                                <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="{{ $fichaAtencion->imc }}">
                                @else
                                <label class="floating-label-activo-sm">IMC</label>
                                <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="{!! old('imc') !!}">
                                @endif
                            </div>
    					</div>
                    </div>
                    <div class="form-row">
                         <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                 <label class="floating-label-activo-sm">Hemoglucotest</label>
                                 <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="{{ $fichaAtencion->temperatura }}">
                            </div>
                        </div>
                         <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                @if (isset($fichaAtencion) && $fichaAtencion->pulso != null)
                                <label class="floating-label-activo-sm">Glasgow</label>
                                <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{{ $fichaAtencion->pulso }}">
                                @else
                                <label class="floating-label-activo-sm">Glasgow</label>
                                <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{!! old('pulso') !!}">
                                @endif
                            </div>
                        </div>
    					<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group">
                                @if (isset($fichaAtencion) && $fichaAtencion->presion_bi !=
                                null)
                                <label class="floating-label-activo-sm">EVA</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{{ $fichaAtencion->presion_bi }}">
                                @else
                                <label class="floating-label-activo-sm">EVA</label>
                                <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{!! old('presion_bi') !!}">
                                @endif
                            </div>
                        </div>
                         <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="form-group">
                                @if (isset($fichaAtencion) && $fichaAtencion->presion_bi !=
                                null)
                                <label class="floating-label-activo-sm">Otras Pruebas</label>

    							   <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>
                                @else
                                <label class="floating-label-activo-sm">Otras Pruebas</label>
                               <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea>
                                @endif
                            </div>
                        </div>
                        {{--  <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                            <div class="form-group">
                                @if (isset($fichaAtencion) && $fichaAtencion->estado_nutricional
                                != null)
                                <label class="floating-label-activo-sm">Estado  Nutricional</label>
                                <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">
                                @else
                                <label class="floating-label-activo-sm">Estado  Nutricional</label>
                                <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{!! old('estado_nutricional') !!}">
                                @endif
                            </div>
                        </div>  --}}
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            @if (isset($fichaAtencion) && $fichaAtencion->estado_nutricional
                            != null)
                            <label class="floating-label-activo-sm">Gravedad/Estado de consciencia</label>
                            <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">
                            @else
                            <label class="floating-label-activo-sm">Gravedad/Estado de consciencia</label>
                            <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{!! old('estado_nutricional') !!}">
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                <br>

                <div id="contenedor_evolucion">
                    <div id="evolucion" class="row">
                    </div>
                </div>
 

        <!--PAGINACIÓN-->

        <!--Programar paginación para las evoluciones, ejemplo: Se muestran 8 y para ver las otras se usa la paginación-->
        <div class="row mt-3">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <nav aria-label="...">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link">Anterior</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Siguiente</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>



<script>
    /* Ponemos "agregarEvolucion" en el ámbito de toda la página */
    function agregarEvolucion(){
        var html = '';
        html += '<div class="border px-2 pt-3 pb-1 rounded shadow mb-4">';
        html += '<div id="contenedor_evolucion">';
        html += '<div id="evolucion" class="row">';
        html += '<div class="col-sm-12">';
        html += '<form>';
        html += '<div class="form-row">';
        html += '<div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-2 col-xxl-1 col-xxxl-1">';
        {{--  html += ' <label class="floating-label-activo-sm">Agregar fecha</label>';  --}}
        var f = new Date();
        html += ' <input class="form-control form-control-sm" name="fecha" type="hidden" value="'+ f.getFullYear() + " -/ " + (f.getMonth() + 1) + "-" + f.getDate()+'">';
        html += ' <input class="form-control form-control-sm" name="hora" type="hidden" value="'+ f.getHours()+ ":"+ f.getMinutes() +'">';
        html += f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear() + " - " + f.getHours()+ ":"+ f.getMinutes()+ "";
            html += '<br>';
        html += '(Rut responsable)';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';

        html += '<label class="floating-label-activo-sm">Tº</label>';
        html += ' <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="{{ $fichaAtencion->temperatura }}">';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += '  <label class="floating-label-activo-sm">Pulso</label> ';
        html += ' <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{{ $fichaAtencion->pulso }}"> ';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += ' <label class="floating-label-activo-sm">PAS</label> ';
        html += ' <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{{ $fichaAtencion->presion_bi }}"> ';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += '  <label class="floating-label-activo-sm">PAD</label>';
        html += '  <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += '  <label class="floating-label-activo-sm">PAM</label>';
        html += '  <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += '  <label class="floating-label-activo-sm">F/R</label>';
        html += '  <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">';
        html += '</div>';


        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += '  <label class="floating-label-activo-sm">PESO</label>';
        html += '  <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += '  <label class="floating-label-activo-sm">TALLA</label>';
        html += '  <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += '  <label class="floating-label-activo-sm">IMC</label>';
        html += '  <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">';
        html += '</div>';
        html += '</div>';
        html += '<div class="form-row">';
        html += ' <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">';
        html += '  <label class="floating-label-activo-sm">Hemoglucotest</label>';
        html += '  <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">';
        html += '</div>';
        html += ' <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">';
        html += ' <label class="floating-label-activo-sm">Glasgow</label>';
        html += '  <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">';
        html += '</div>';
        html += ' <div class="form-group col">';
        html += ' <label class="floating-label-activo-sm">EVA</label> ';
        html += ' <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{{ $fichaAtencion->presion_bi }}"> ';
        html += '</div>';
        html += ' <div class="form-group col-md-5 col-lg-5 col-xl-5">';
        html += ' <label class="floating-label-activo-sm">Otras Pruebas</label> ';
        html += ' <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_av_autorefrac_oi" id="obs_av_autorefrac_oi"></textarea> ';
        html += '</div>';

        html += ' <div class="form-group col-sm-12 col-md-5 col-lg-5 col-xl-5">';
            html += ' <label class="floating-label-activo-sm">Gravedad Estado Conciencia</label>';
            html += '   <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">';
            html += '</div>';

        html += '<div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '<button type="button" class="btn btn-icon btn-danger-light-c"><i class="feather icon-x"></i> </button>';
        html += '&#160;';
        html += '&#160;';
        html += '<button type="button" class="btn btn-icon btn-success-light-c"><i class="feather icon-save"></i> </button>';
        html += '</div>';
        html += ' </div>';
        html += '<div class="form-row">';
        html += '</div>';
        html += '</form>';
        html += ' </div>';
        html += '</div>';
        html += '</div>';
        html += '       ';
        html += '   </div>';
        html += '</div>';
        html += '</div>';
 

       $('#contenedor_evolucion').append(html);
   } // agregarEvolucion
   $(document).ready(function(){
       /* Sacar la funcion "agregarPieza de este ámbito */
       $('.btn-agregar-evolucion').click(function(){
           agregarEvolucion();
       });
       $('#pad').on('input', function() {
            var value = $(this).val();
            var pas = $('#pas').val();
            console.log(value, pas);
            var resultado = ((parseInt(value) * 2) + parseInt(pas));
            $('#pam').val(parseInt(resultado)/3);
        });

        $('#talla').on('input', function(){
            var h = $(this).val();
            var height = h / 100;
            var weight = parseFloat($('#peso').val());

            console.log(height, weight);

            var imc = Math.round(parseFloat(weight) / (parseFloat(height) ** 2));
            $('#imc').val(imc);
        });
   });



</script>
<script>
    function IsNumeric(valor) {
        var log = valor.length;
        var sw = "S";
        for (x = 0; x < log; x++) {
            v1 = valor.substr(x, 1);
            v2 = parseInt(v1);
            //Compruebo si es un valor numérico
            if (isNaN(v2)) {
                sw = "N";
            }
        }
        if (sw == "S") {
            return true;
        } else {
            return false;
        }
    }

    var primerslap = false;
    var segundoslap = false;

    function formateafecha(fecha) {
        var long = fecha.length;
        var dia;
        var mes;
        var ano;

        if ((long >= 2) && (primerslap == false)) {
            dia = fecha.substr(0, 2);
            if ((IsNumeric(dia) == true) && (dia <= 31) && (dia != "00")) {
                fecha = fecha.substr(0, 2) + "/" + fecha.substr(3, 7);
                primerslap = true;
            } else {
                fecha = "";
                primerslap = false;
            }
        } else {
            dia = fecha.substr(0, 1);
            if (IsNumeric(dia) == false) {
                fecha = "";
            }
            if ((long <= 2) && (primerslap = true)) {
                fecha = fecha.substr(0, 1);
                primerslap = false;
            }
        }
        if ((long >= 5) && (segundoslap == false)) {
            mes = fecha.substr(3, 2);
            if ((IsNumeric(mes) == true) && (mes <= 12) && (mes != "00")) {
                fecha = fecha.substr(0, 5) + "/" + fecha.substr(6, 4);
                segundoslap = true;
            } else {
                fecha = fecha.substr(0, 3);;
                segundoslap = false;
            }
        } else {
            if ((long <= 5) && (segundoslap = true)) {
                fecha = fecha.substr(0, 4);
                segundoslap = false;
            }
        }
        if (long >= 7) {
            ano = fecha.substr(6, 4);
            if (IsNumeric(ano) == false) {
                fecha = fecha.substr(0, 6);
            } else {
                if (long == 10) {
                    if ((ano == 0) || (ano < 1900) || (ano > 2100)) {
                        fecha = fecha.substr(0, 6);
                    }
                }
            }
        }

        if (long >= 10) {
            fecha = fecha.substr(0, 10);
            dia = fecha.substr(0, 2);
            mes = fecha.substr(3, 2);
            ano = fecha.substr(6, 4);
            // Año no viciesto y es febrero y el dia es mayor a 28
            if ((ano % 4 != 0) && (mes == 02) && (dia > 28)) {
                fecha = fecha.substr(0, 2) + "/";
            }
        }
        return (fecha);
    }
</script>

