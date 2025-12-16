<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <input type="hidden" name="id_paciente_fc_hosp" value="{{ $paciente->id }}" id="id_paciente_fc_hosp">
    <input type="hidden" name="rut_paciente_fc_hosp" value="{{ $paciente->rut }}" id="rut_paciente_fc_hosp">
    <input type="hidden" name="prevision_paciente_fc_hosp" value="{{ $paciente->prevision->id }}" id="prevision_paciente_fc_hosp">
    <input type="hidden" name="id_profesional_fc_hosp" value="{{ $profesional->id }}" id="id_profesional_fc_hosp">
    <input type="hidden" name="id_lugar_atencion_hosp" id="id_lugar_atencion_hosp" value="{{ $id_lugar_atencion }}">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 py-0 px-3 ">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h6 class="tit-gen float-left d-inline pt-3">Atención de paciente en sala de hospitalización</h6>
                <div class="alert alert-warning-b py-1 px-0 float-right d-inline" >
                    <p class="p-10 d-inline font-weight-bolder">Servicio: </p>
                    <p class="p-10 d-inline">Nombre del servicio</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body pt-2">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-inline">
                                <h6 class="t-aten d-inline float-left pt-1">Evoluciones</h6>
                                <button type="button" class="btn btn-info-light-c btn-sm btn-agregar-evolucion d-inline float-right" ><i class="feather icon-plus"></i> Nueva evolución</button>
                            </div>
                        </div> <hr class="mt-1">
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <p>
                                    <script>
                                        var f = new Date();
                                        document.write(  + f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear() + " -/" + f.getHours()+ ":" + f.getMinutes() +" min " );
                                    </script>
                                </p>
                            </div>
                            <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                <label class="floating-label-activo-sm">Evolución</label>
                                <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=4" onblur="this.rows=3;" id="hosp_op_evol" name="hosp_op_evol"></textarea>
                            </div>
                            <div class="form-group col-md-2">
                                <button type="button" class="btn btn-danger-light-c"><i class="feather icon-x"></i> </button>&#160;
                                <button type="button" class="btn btn-success-light-c"><i class="feather icon-save"></i> </button>
                            </div>
                        </div>
                        <div id="contenedor_evolucion">
                            <div id="evolucion" class="row">
                            </div>
                        </div>
                        <!--PAGINACIÓN-->
                        <!--Programar paginación para las evoluciones, ejemplo: Se muestran 8 y para ver las otras se usa la paginación-->
                        <div class="form-row">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    /* Ponemos "agregarEvolucion" en el ámbito de toda la página */
    function agregarEvolucion(){
        var html = '';
        html += '<div id="contenedor_evolucion">';
        html += '<div id="evolucion" class="row">';
        html += '<div class="col-sm-12">';
        html += '<form>';
        html += '<div class="form-row">';
        html += '<div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        {{--  html += ' <label class="floating-label-activo-sm">Agregar Fecha</label>';  --}}
        var f = new Date();
        html += ' <input class="form-control form-control-sm" name="fecha" type="hidden" value="'+ f.getFullYear() + " -/ " + (f.getMonth() + 1) + "-" + f.getDate()+'">';
        html += ' <input class="form-control form-control-sm" name="hora" type="hidden" value="'+ f.getHours()+ ":"+ f.getMinutes() +'">';
        html += f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear() + " -/ " + f.getHours()+ ":"+ f.getMinutes()+ " min.";

        html += '</div>';
        html += ' <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">';
        html += ' <label class="floating-label-activo-sm">Evolución</label>';
        html += '<textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=4" onblur="this.rows=3;"></textarea>';
        html += '</div>';
        html += '<div class="form-group col-md-2">';
        html += '<button type="button" class="btn btn-danger-light-c"><i class="feather icon-x"></i> </button>';
        html += '&#160;';
        html += '&#160;';
        html += '<button type="button" class="btn btn-success-light-c"><i class="feather icon-save"></i> </button>';
        html += '</div>';
        html += ' </div>';
        html += '<div class="form-row">';
        html += '</div>';
        html += '</form>';
        html += ' </div>';
        html += '</div>';
        html += '</div>';
        html += '       ';
        html += '    </div>';
        html += '</div>';

       $('#contenedor_evolucion').append(html);
   } // agregarEvolucion
   $(document).ready(function(){
       /* Sacar la funcion "agregarPieza de este ámbito */
       $('.btn-agregar-evolucion').click(function(){
           agregarEvolucion();
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
