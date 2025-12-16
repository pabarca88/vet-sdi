
<div id="contenedor_evoluciones_paciente">
    @if (isset($controles_ciclo) && count($controles_ciclo) > 0)
    <div class="row">
        <div class="col-sm-12 pb-0 mb-2 d-inline">
            <div class="pt-3 d-inline">
                <h6 class="t-aten d-inline ml-3">Control de ciclo de ingreso</h6>
            </div>
        </div>
    </div>
        @php $count = 0; @endphp
        @foreach ($controles_ciclo as $cc)

            <div class="form-row">
                <div class="form-group col-md-2">
                    <p class="pt-3 d-inline">
                        {{ $cc->created_at->format('d/m/Y H:i') }} {{ $cc->nombre }}
                    </p>
                </div>
                <div class="form-group col-md-10">
                    <label class="floating-label-active">Evolución</label>
                    <textarea class="form-control form-control-sm" name="evolucion{{ $count }}" id="evolucion{{ $count }}" rows="2" onfocus="this.rows=4" onblur="this.rows=3;">{{ $cc->evolucion }}</textarea>
                </div>
                <hr>
                <div class="offset-md-2 col-md-10 d-flex justify-content-end">
                    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminarEvolucionAgregada({{ $cc->id }},{{ $count }})"><i class="feather icon-x"></i>
                    </button>
                </div>
                <div class=" col-md-12 d-flex justify-content-between">
                    <div class="row">
                        @if(count($cc->recetas) > 0)
                        <div class="col-md-4">
                            <table class="table table-bordered table-xs table-responsive">
                                <thead>
                                    <tr>
                                        <td>Medicamento</td>
                                        <td>Posología</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cc->recetas as $m)
                                        <tr>
                                            <td>{{ $m->nombre_medicamento }}</td>
                                            <td>{{ $m->frecuencia }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        @endif
                        @if(count($cc->examenes) > 0)
                        <div class="col-md-4">
                            <table class="table table-bordered table-xs table-responsive">
                                <thead>
                                    <tr>
                                        <td>Examenes</td>
                                        <td>Tipo</td>
                                        <td>Prioridad </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cc->examenes as $e)
                                        <tr>
                                            <td>{{ $e->datos_examen->examen }}</td>
                                            <td>{{ $e->datos_examen->tipo_examen }}</td>
                                            <td>{{ $e->datos_examen->prioridad }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        @endif
                        @if(count($cc->procedimientos) > 0)
                        <div class="col-md-4">
                            <table class="table table-bordered table-xs table-responsive">
                                <thead>
                                    <tr>
                                        <td>Procedimiento</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cc->procedimientos as $p)
                                        <tr>
                                            <td>{{ $p->datos_procedimiento->nombre_procedimiento }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        @endif
                    </div>


                </div>
            </div>
            @if(isset($idCounter))
            <div class="form-row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-end">
                    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminarEvolucionPacienteHosp({{ $idCounter }})"><i class="feather icon-x"></i> </button>
                    <button type="button" class="btn btn-icon btn-success-light-c" onclick="agregarEvolucionPacienteHosp({{ $idCounter }})"><i class="feather icon-save"></i> </button>
                </div>
            </div>
            @endif
            @php $count++; @endphp
        @endforeach
        <div class="form-row">
            <div
                class="form-group col-md-12">
                <h6
                    class="text-c-blue">
                    Resumen de
                    evoluciones e
                    interconsultas</h6>
            </div>
        </div>
        <div class="form-row">
            <div
                class="form-group col-md-12">
                <textarea class="form-control form-control-sm" name="resumen_evolucion" id="resumen_evolucion" rows="3"
                    onfocus="this.rows=5" onblur="this.rows=4;"></textarea>
            </div>
        </div>
    @else
        @if($enfermera)
        <div class="form-row">
            <div
                class="form-group col-md-2">
                <script>
                    var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                        "Octubre", "Noviembre", "Diciembre");
                    var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                    var f = new Date();

                    document.write("<b>" + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                        .getFullYear() + "</b>");
                </script>
            </div>
            <div
                class="form-group col-md-10">
                <label
                    class="floating-label">Evolución</label>
                <textarea class="form-control form-control-sm" name="evolucion1" id="evolucion1" rows="2"
                    onfocus="this.rows=4" onblur="this.rows=3;"></textarea>
            </div>
            <hr>

        </div>
        <div class="form-row">
            <div
                class="form-group col-md-12">
                <h6
                    class="text-c-blue">
                    Resumen de
                    evoluciones e
                    interconsultas</h6>
            </div>
        </div>
        <div class="form-row">
            <div
                class="form-group col-md-12">
                <textarea class="form-control form-control-sm" name="resumen_evolucion" id="resumen_evolucion" rows="3"
                    onfocus="this.rows=5" onblur="this.rows=4;"></textarea>
            </div>
        </div>
        <div class="form-row d-flex justify-content-end">
            <button type="button" class="btn btn-outline-success btn-sm btn-icon my-3" onclick="guardar_evolucion_hospital()"><i class="fas fa-save"></i></button>
        </div>

        <div id="contenedor_evoluciones_paciente">


        </div>
        @endif
    @endif

</div>
{{-- @if($enfermera)
<h6>Evoluciones</h6>
<div id="contenedor_nueva_evolucion"></div>
<button type="button" class="btn btn-info-light-c btn-xxs d-inline float-right"
            onclick="mostrarNuevaEvolucionPaciente({{ $contador_div_evaluaciones }})"><i class="feather icon-plus"></i>
            Nueva evolución</button>
@endif --}}
<!--PAGINACIÓN-->

<!--Programar paginación para las evoluciones, ejemplo: Se muestran 8 y para ver las otras se usa la paginación-->
{{-- <div class="row mt-3">
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
</div> --}}

{{-- @include('page.general.modal_enfermeria.informacion_respiracion') --}}

<script>
    /* Definimos una variable global para los IDs */
    var idCounter = 2;
    /* Ponemos "agregarEvolucion" en el ámbito de toda la página */
    function agregarEvolucion() {
        var html = '';
        html += '<div class="border px-2 pt-3 pb-1 rounded shadow mb-4" id="contenedor_completo_' + idCounter + '">';
        html += '<div id="contenedor_evolucion_' + idCounter + '">';
        html += '<div id="evolucion_' + idCounter + '" class="row">';
        html += '<div class="col-sm-12">';
        html += '<form>';
        html += '<div class="form-row">';
        html += '<div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-2 col-xxl-1 col-xxxl-1">';
        {{--  html += ' <label class="floating-label-activo-sm">Agregar fecha</label>';  --}}
        var f = new Date();
        html += ' <input class="form-control form-control-sm" name="fecha" type="hidden" value="' + f.getFullYear() +
            " -/ " + (f.getMonth() + 1) + "-" + f.getDate() + '">';
        html += ' <input class="form-control form-control-sm" name="hora" type="hidden" value="' + f.getHours() + ":" +
            f.getMinutes() + '">';
        html += f.getDate() + "/" + (f.getMonth() + 1) + "/" + f.getFullYear() + " - " + f.getHours() + ":" + f
            .getMinutes() + "";
        html += '<br>';
        html += '(Rut responsable)';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';

        html += '<label class="floating-label-activo-sm">Tº</label>';
        html +=
        ' <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="">';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += '  <label class="floating-label-activo-sm">Pulso</label> ';
        html += ' <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value=""> ';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += ' <label class="floating-label-activo-sm">PAS</label> ';
        html += ' <input type="text" class="form-control form-control-sm" name="pas" id="pas" value=""> ';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += '  <label class="floating-label-activo-sm">PAD</label>';
        html += '  <input type="text" class="form-control form-control-sm" name="pad" id="pad" value="">';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += '  <label class="floating-label-activo-sm">PAM</label>';
        html += '  <input type="text" class="form-control form-control-sm" name="pam" id="pam" value="">';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += '  <label class="floating-label-activo-sm">F/R</label>';
        html += '  <input type="text" class="form-control form-control-sm" name="frec_resp" id="frec_resp" value="">';
        html += '</div>';


        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += '  <label class="floating-label-activo-sm">Peso</label>';
        html += '  <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="">';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += '  <label class="floating-label-activo-sm">Talla</label>';
        html += '  <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="">';
        html += '</div>';
        html += ' <div class="form-group col-sm-2 col-md-1 col-lg col-xl">';
        html += '  <label class="floating-label-activo-sm">IMC</label>';
        html += '  <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="">';
        html += '</div>';
        html += '</div>';
        html += '<div class="form-row">';
        html += ' <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">';
        html += '  <label class="floating-label-activo-sm">Hemoglucotest</label>';
        html +=
            '  <input type="text" class="form-control form-control-sm" name="hemoglucotest" id="hemoglucotest" value="">';
        html += '</div>';
        html += ' <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">';
        html += ' <label class="floating-label-activo-sm">Glasgow</label>';
        html += '  <input type="text" class="form-control form-control-sm" name="glasgow" id="glasgow" value="">';
        html += '</div>';
        html += ' <div class="form-group col">';
        html += ' <label class="floating-label-activo-sm">EVA</label> ';
        html += ' <input type="text" class="form-control form-control-sm" name="c_eva" id="c_eva" value=""> ';
        html += '</div>';
        html += ' <div class="form-group col-md-5 col-lg-5 col-xl-5">';
        html += ' <label class="floating-label-activo-sm">Otras Pruebas</label> ';
        html +=
            ' <textarea class="form-control form-control-sm"   rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="otras_pruebas" id="otras_pruebas"></textarea> ';
        html += '</div>';

        html += ' <div class="form-group col-sm-12 col-md-5 col-lg-5 col-xl-5">';
        html += ' <label class="floating-label-activo-sm">Gravedad Estado Conciencia</label>';
        html +=
            '   <input type="text" class="form-control form-control-sm" name="gravedad_e_conc" id="gravedad_e_conc" value="">';
        html += '</div>';

        html += '<div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">';
        html += '<button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminarEvolucion(' +
            idCounter + ')"><i class="feather icon-x"></i> </button>';
        html += '&#160;';
        html += '&#160;';
        html +=
            '<button type="button" class="btn btn-icon btn-success-light-c"><i class="feather icon-save"></i> </button>';
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

        // Incrementamos idCounter para la próxima ejecución
        idCounter++;

        $('#contenedor_evolucion').append(html);
    } // agregarEvolucion
    $(document).ready(function() {
        /* Sacar la funcion "agregarPieza de este ámbito */
        $('.btn-agregar-evolucion').click(function() {
            //    agregarEvolucion();
        });
        //    $('#pad').on('input', function() {
        //         var value = $(this).val();
        //         var pas = $('#pas').val();
        //         console.log(value, pas);
        //         var resultado = ((parseInt(value) * 2) + parseInt(pas));
        //         $('#pam').val((parseInt(resultado)/3).toFixed(2));
        //     });

        //     $('#talla').on('input', function(){
        //         var h = $(this).val();
        //         var height = h / 100;
        //         var weight = parseFloat($('#peso').val());

        //         console.log(height, weight);

        //         var imc = Math.round(parseFloat(weight) / (parseFloat(height) ** 2));
        //         $('#imc').val(imc);
        //     });

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

    function eliminarEvolucion(id) {
        // Elimina el elemento con el ID proporcionado
        $('#contenedor_completo_' + id).remove();
    }

    function agregarEvolucionPaciente(idEvolucion = null) {
        var id = idEvolucion ? idEvolucion : '';
        var fecha = $('#fecha' + id).val();
        var hora = $('#hora' + id).val();
        var temperatura = $('#temperatura' + id).val();
        var pulso = $('#pulso' + id).val();
        var pas = $('#pas' + id).val();
        var pad = $('#pad' + id).val();
        var pam = $('#pam' + id).val();
        var frec_resp = $('#fr' + id).val();
        var peso = $('#peso' + id).val();
        var talla = $('#talla' + id).val();
        var imc = $('#imc' + id).val();
        var tipo_respiracion_servicio = $('#tipo_respiracion_servicio' + id).val();
        var sat_fio2 = $('#saturacion_fio2' + id).val();
        var sat_o2 = $('#saturacion_oxigeno' + id).val();
        var dispositivo_servicio = $('#dispositivo_servicio' + id).val();
        var hemoglucotest = $('#hemoglucotest' + id).val();
        var glasgow = $('#glasgow' + id).val();
        var c_eva = $('#c_eva' + id).val();
        var otras_pruebas = $('#otras_pruebas' + id).val();
        var gravedad_e_conc = $('#gravedad_e_conc' + id).val();

        var urlParams = new URLSearchParams(window.location.search);
        var idPaciente = urlParams.get('id_paciente');



        var data = {
            id_paciente: idPaciente,
            fecha: fecha,
            hora: hora,
            temperatura: temperatura,
            pulso: pulso,
            pas: pas,
            pad: pad,
            pam: pam,
            frec_resp: frec_resp,
            peso: peso,
            talla: talla,
            imc: imc,
            tipo_respiracion_servicio: tipo_respiracion_servicio,
            sat_fio2: sat_fio2,
            sat_o2: sat_o2,
            dispositivo_servicio: dispositivo_servicio,
            hemoglucotest: hemoglucotest,
            glasgow: glasgow,
            c_eva: c_eva,
            otras_pruebas: otras_pruebas,
            gravedad_e_conc: gravedad_e_conc,
            idCounter: idCounter,
            idEvolucion: idEvolucion,
            _token: '{{ csrf_token() }}'
        }

        let url = "{{ route('enfermeria.agregar_evolucion_paciente') }}";
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(resp) {
                console.log(resp);
                let mensaje = resp.mensaje;
                let vista = resp.vista;
                if (mensaje == 'OK') {
                    swal({
                        title: 'Éxito',
                        text: 'Evolución agregada correctamente',
                        icon: 'success',
                        button: 'Aceptar'
                    });
                    $('#contenedor_evoluciones_paciente').empty();
                    $('#contenedor_evoluciones_paciente').html(vista);
                    $('#contenedor_nueva_evolucion').empty();
                    idCounter++;
                } else {
                    swal({
                        title: 'Error',
                        text: mensaje,
                        icon: 'error',
                        button: 'Aceptar'
                    })
                }

            },
            error: function(error) {
                console.log(error);
            }
        });
    }



    function mostrarNuevaEvolucionPaciente(counter) {
        let url = "{{ route('enfermeria.mostrar_nueva_evolucion_paciente') }}";
        $.ajax({
            url: url,
            type: 'post',
            data: {
                counter: counter,
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                $('#contenedor_nueva_evolucion').html(resp);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function mostrarNuevaEvolucionPacienteHosp(counter) {
        let url = "{{ route('enfermeria.mostrar_nueva_evolucion_paciente_hosp') }}";
        $.ajax({
            url: url,
            type: 'post',
            data: {
                counter: counter,
                _token: '{{ csrf_token() }}'
            },
            success: function(resp) {
                $('#contenedor_nueva_evolucion').html(resp);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function eliminarEvolucionPaciente(id) {
        let idEvolucion = $('#evolucion' + id).val();
        console.log(idEvolucion);
        // Elimina el elemento con el ID proporcionado
        $('#contenedor_evolucion_' + id).remove();
    }

    function calcularPAM(idEvolucion = null) {
        var id = idEvolucion ? idEvolucion : '';
        var pas = $('#pas' + id).val();
        if (pas == '') {
            pas = 0;
        }
        var pad = $('#pad' + id).val();
        // if(pad == ''){
        //     pad = 0;
        // }
        // var pam = ((parseInt(pas) * 2) + parseInt(pad)) / 3;
        // $('#pam' + id).val(pam.toFixed(2));

        var resultado = ((parseInt(pad) * 2) + parseInt(pas));
        $('#pam' + id).val((parseInt(resultado) / 3).toFixed(2));
    }

    function calcularIMC(idEvolucion = null) {
        var id = idEvolucion ? idEvolucion : '';
        var talla = $('#talla' + id).val();
        var peso = $('#peso' + id).val();
        console.log(talla);
        console.log(peso);
        if (talla == '' || peso == '') {
            return;
        }
        var height = talla / 100;
        var imc = peso / (height ** 2);
        $('#imc' + id).val(imc.toFixed(2));
    }

    // function eliminarEvolucionAgregada(id) {
    //     swal({
    //         title: 'Advertencia',
    //         text: '¿Está seguro de eliminar esta evolución?',
    //         icon: 'warning',
    //         buttons: ['Cancelar', 'Aceptar'],
    //         dangerMode: true
    //     }).then((aceptar) => {
    //         if (aceptar) {
    //             confirmarEliminarEvolucionAgregada(id);
    //         }
    //     })
    // }

    // function confirmarEliminarEvolucionAgregada(id){
    //     let url = "{{ route('enfermeria.eliminar_evolucion_agregada') }}";
    //     var urlParams = new URLSearchParams(window.location.search);
    //     var idPaciente = urlParams.get('id_paciente');
    //     $.ajax({
    //         url: url,
    //         type: 'post',
    //         data: {
    //             id: id,
    //             id_paciente: idPaciente,
    //             _token: '{{ csrf_token() }}'
    //         },
    //         success: function(resp) {
    //             console.log(resp);
    //             let mensaje = resp.mensaje;
    //             let vista = resp.vista;
    //             if (mensaje == 'OK') {
    //                 swal({
    //                     title: 'Éxito',
    //                     text: 'Evolución eliminada correctamente',
    //                     icon: 'success',
    //                     button: 'Aceptar'
    //                 });
    //                 $('#contenedor_evoluciones_paciente').empty();
    //                 $('#contenedor_evoluciones_paciente').append(vista);
    //             } else {
    //                 swal({
    //                     title: 'Error',
    //                     text: mensaje,
    //                     icon: 'error',
    //                     button: 'Aceptar'
    //                 })
    //             }
    //         },
    //         error: function(error) {
    //             console.log(error);
    //         }
    //     });
    // }

    function mostrarDatosRespiracion(e, idEvolucion = null){
        console.log(e);
        let id = idEvolucion ? idEvolucion : '';
        let value = e.target.value;
        console.log(value);
        if(value == 0){
            $('#select_info_respiracion_servicio'+id).addClass('d-none');
        }else{
            $('#select_info_respiracion_servicio'+id).removeClass('d-none');
        }

    }
</script>
