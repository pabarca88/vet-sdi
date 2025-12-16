{{-- <div class="card">
    <div class="card-body">
        <div id="pieza_dental" class="row">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="plan_tto_implante" role="tabpanel" aria-labelledby="plan_implante_tab"><br>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-row">
                                <div class="col-sm-12 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <input type="text" class="form-control form-control-sm" id="numero_pieza_tto_imp">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <select name="tpo_tto_imp" data-titulo="tpo_tto_imp" data-seccion="Implante"  id="tpo_tto_imp" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('tpo_tto_imp','div_tpo_tto_imp','obs_tpo_tto_imp',10);">
                                            <option selected  value="1">Anclaje de precisión s/implantes</option>
                                            <option value="2">Anclaje de presición sobre Implante</option>
                                            <option value="3">Barra para prótesis sobre Implante</option>
                                            <option value="4">Cirugía Periimplantaria de manejo de tejidos blandos, por sitio</option>
                                            <option value="5">Cirugía Periimplantaria de tejidos blandos (no incluye insumos)</option>
                                            <option value="6">Conexión de Implante (No incluye valor aditamientos)</option>
                                            <option value="7">Corona de cerámica s/metal sobre implante cementada</option>
                                            <option value="8">Cirugía Periimplantaria de tejidos blandos (no incluye insumos)</option>
                                            <option value="9"> Corona provisional s/implante</option>
                                            <option value="10">  Corona Temporal Sobre Implantes</option>
                                            <option value="10">  Otro proc Implantes</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_tpo_tto_imp" style="display:none;">
                                        <label class="floating-label-activo-sm">Otro tipo de Tratamiento</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_tpo_tto_imp" id="obs_tpo_tto_imp"></textarea>
                                        <div class="form-group mt-3">
                                            <label class="floating-label-activo-sm">UCO?</label>
                                            <input type="text"class="form-control form-control-sm">
                                        </div>
                                        <div class="form-group mt-3">
                                            <label class="floating-label-activo-sm">Laboratorio</label>
                                            <input type="text"class="form-control form-control-sm">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Marca Inplante</label>
                                        <select name="marc_implante"  id="marc_implante" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('marc_implante','div_marc_implante','obs_marc_implante',3);">
                                            <option selected  value="1">MARCA 1</option>
                                            <option value="2">MARCA 2</option>
                                            <option value="3">OTRO</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_marc_implante" style="display:none;">
                                        <label class="floating-label-activo-sm">Otra Marca</label>
                                        <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_marc_implante" id="obs_marc_implante"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Forma y material del Implante</label>
                                        <select name="mat_form_marca" id="mat_form_forma"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('mat_form_forma','div_mat_form_forma','det_mat_form_forma',13)">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Cilíndricos Titanio</option>
                                            <option value="2">Cilíndricos Porcelana</option>
                                            <option value="3">Cilíndricos Zirconio</option>
                                            <option value="4">Laminados Titanio</option>
                                            <option value="5">Laminados Porcelana</option>
                                            <option value="6">Laminados Zirconio</option>
                                            <option value="7">Tornillo Titanio</option>
                                            <option value="8">Tornillo Porcelana</option>
                                            <option value="9">Tornillo Zirconio</option>
                                            <option value="10">Cónicos Titanio</option>
                                            <option value="11">Cónicos Porcelana</option>
                                            <option value="12">Cónicos Zirconio</option>
                                            <option value="13">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group"   id="div_mat_form_forma" style="display:none">
                                        <label class="floating-label-activo-sm">Detalle Otros<i>(describir)</i></label>
                                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_mat_form_forma" id="det_mat_form_forma"></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Convenio</label>
                                        <select name="conv_odont_implante"   id="conv_odont_implante" class="form-control form-control-sm">
                                            <option selected  value="1">Si</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="cargar_a_presupuesto_tto()"><i class="fas fa-save"></i> Cargar a presupuesto</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    @if($seccion == 'impl')
                    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_dental_tto({{ $counter }})">X</button>
                    <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_dental_tto({{ $counter }})"><i class="fas fa-save"></i></button>
                    @else
                    <button type="button" class="btn btn-icon btn-danger-light-c" onclick="ocultar_pieza_dental_tto_period({{ $counter }})">X</button>
                    <button type="button" class="btn btn-icon btn-primary-light-c" onclick="guardar_pieza_dental_tto_period({{ $counter }})"><i class="fas fa-save"></i></button>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function ocultar_pieza_dental_tto(){
        $('#contenedor_pieza_tto_implante').empty();
    }

    function ocultar_pieza_dental_tto_period(){
        $('#contenedor_pieza_plan_implante').empty();
    }

    function cargar_a_presupuesto_tto(){
        let numero_pieza = $('#numero_pieza_tto_imp').val();
        let tipo_tto = $('#tpo_tto_imp').val();
        let marca_imp = $('#marc_implante').val();
        let mat_form_forma = $('#mat_form_forma').val();
        let conv_odont_implante = $('#conv_odont_implante').val();

        let valido = 1;
        let mensaje = '';

        if(numero_pieza == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar numero de pieza </li>';
        }
        if(tipo_tto == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar tipo de tratamiento </li>';
        }
    }
</script> --}}
<div class="row" >
    <div class="col-md-12" id="contenedor_pieza_tto_impl{{ $counter }}">
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-sm-2 col-md-4 col-lg-4 col-xl-2">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Pieza N°</label>
                            <input type="text" class="form-control form-control-sm" id="numero_pieza_tto_imp{{ $counter }}" value="{{ $pieza }}">
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <label class="floating-label-activo-sm">Tratamiento</label>
                        <input type="text" name="diag_presupuesto_pieza{{ $counter }}" id="diag_presupuesto_pieza{{ $counter }}" class="form-control form-control-sm tratamiento-autocomplete ui-autocomplete-input" autocomplete="off">
                    </div>
                    <div class="col-sm-3 col-md-3">
                        <label class="floating-label-activo-sm">Valor</label>
                        <input type="text" name="valor_presupuesto_pieza{{ $counter }}" id="valor_presupuesto_pieza{{ $counter }}" class="form-control form-control-sm">
                    </div>
                    <div class="col-sm-1-col-md-1">
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="cargar_a_presupuesto_impl({{ $counter }})"><i class="fas fa-save"></i> </button>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-danger btn-icon btn-sm" onclick="ocultar_pieza_impl({{ $counter }})">X</button>
            </div>
        </div>
    </div>
</div>

{{-- Script para inicializar el autocomplete --}}
<script>
    $(document).ready(function() {
        $('.tratamiento-autocomplete').each(function() {
            $(this).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('dental.getTratamientoImplantologia') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            if (data.length == 0) {
                                $('.diagnostico_activo').hide();
                                $('.diagnostico_inactivo').show();
                            } else {
                                $('.diagnostico_activo').show();
                                $('.diagnostico_inactivo').hide();
                            }
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    console.log(ui.item);
                    $(this).val(ui.item.label);
                    $(this).next('input[type="hidden"]').val(ui.item.value);
                    // Buscar el input de valor asociado y asignar el valor del diagnóstico
                    let inputValor = $(this).closest('.form-row').find('input[name^="valor_presupuesto_pieza"]');
                    if (inputValor.length) {
                        inputValor.val(ui.item.valor);
                    }
                    return false;
                }
            });
        });
        $('#paciente_piezas_dentales_ex').select2();
    });
</script>

<script>


function cargar_a_presupuesto_impl(counter){
    let pieza = $('#numero_pieza_tto_imp'+counter).val();
    let tto = $('#diag_presupuesto_pieza'+counter).val();
    let valido = 1;
    let mensaje = '';

    console.log(pieza, tto);
    let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto_period') }}";
    let data = {
        pieza: pieza,
        tto: tto,
        id_ficha_atencion: $('#id_fc').val(),
        id_lugar_atencion: $('#id_lugar_atencion').val(),
        id_paciente: dame_id_paciente(),
        _token: "{{ csrf_token() }}"
    }
    console.log(data);
    $.ajax({
        type:'post',
        url: url,
        data: data,
        success: function(resp){
            console.log(resp);
            if(resp.status == 1){
                swal({
                    icon:'success',
                    title:'Info',
                    text: resp.mensaje
                });
                let odontograma = resp.odontograma_paciente;
                let html = '';
                odontograma.forEach(function(odonto){
                    html += '<tr>';
                    html += '<td>'+odonto.fecha+'</td>';
                    html += '<td>'+odonto.tratamiento+'</td>';
                    html += '<td>'+odonto.caras+'</td>';
                    html += '<td>'+odonto.pieza+'</td>';
                    html += '<td>'+odonto.diagnostico+'</td>';
                    html += '<td>'+formatoMoneda(odonto.valor)+'</td>';
                    // html += '<td>';
                    // html += '<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma('+odonto.id+')"><i class="feather icon-x"></i>Eliminar</button>';
                    // if(odonto.presupuesto == 0){
                    //     html += '<button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('+odonto.id+')"><i class="fas fa-save"></i>Cargar a presupuesto</button>';
                    // }else{
                    //     html += '<button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto('+odonto.id+')"><i class="fas fa-trash"></i>Sacar de presupuesto</button>';
                    // }

                    // html += '</td>';
                     // Checkbox para seleccionar el odontograma
                    html += '<td>';
                    html += '<div class="form-check">';
                    html += '<input class="form-check-input" type="checkbox" value="' + odonto.id + '" '
                    html += odonto.presupuesto == 1 ? 'checked ' : '';
                    html += 'onchange="togglePresupuesto(' + odonto.id + ', this.checked)">';
                    html += '<label class="form-check-label"></label>';
                    html += '</div>';
                    html += '</td>';
                    html += '<td>';
                    html += '<div class="form-check">';
                    html += '<input class="form-check-input checkbox-seleccion" type="checkbox" value="' + odonto.id + '" ';
                    html += 'id="seleccionCheck' + odonto.id + '" ';
                    html += 'onchange="toggleSeleccion(' + odonto.id + ', this.checked)">';
                    html += '<label class="form-check-label" for="seleccionCheck' + odonto.id + '"></label>';
                    html += '</div>';
                    html += '</td>';
                    html += '</tr>';
                });
                $('#contenedor_examenes_grupos_dentales').empty();
                $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
                $('#table_odontograma tbody').html(html);
                $('#contenedor_piezas_dentales_presupuesto').empty();
                $('#table_trabajos_presupuesto tbody').empty();
                odontograma.forEach(function(odonto){
                    if(odonto.presupuesto == 1){
                        $('#contenedor_piezas_dentales_presupuesto').append(`
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-informacion">
                                        <div class="card-body pb-0">
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Pieza</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Sub-Total</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label class="floating-label-activo-sm">Descuento</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label-activo-sm">Total prestación</label>
                                                    <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                </div>
                                                <div class="form-group col-md-2 d-flex justify-content-center">
                                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="fas fa-trash"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        `);
                        $('#table_trabajos_presupuesto tbody').append(`
                            <tr>
                                <td>${odonto.fecha}</td>
                                <td>${odonto.diagnostico} </td>
                                <td>${odonto.caras} </td>
                                <td>${odonto.pieza} </td>
                                <td>${odonto.tratamiento} </td>
                                <td>${formatoMoneda(odonto.valor)} </td>
                                <td> </td>
                                <td>
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                </td>
                            </tr>
                        `);
                    }
                });
                let valores_boca_general = resp.valores[0];
                let valores_odontograma = resp.valores[1];
                let valores_insumos = resp.valores[2];
                let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                $('#subtotal_clinico').val(formatoMoneda(total_general));
                $('#total_clinico').val(formatoMoneda(total_general));
                $('#total_presupuesto_dental').val(total_general);

                $('#monto_total').html(formatoMoneda(valores_insumos)+' + '+formatoMoneda(valores_odontograma + valores_boca_general)+' = '+formatoMoneda(total_general));


                let table = $('#presup_estado_pago').DataTable();
                table.clear().draw();

                // Recorrer el odontograma y agregar nuevas filas
                odontograma.forEach(function(odonto) {
                    if (odonto.presupuesto == 1) {
                        // Agregar una nueva fila a la tabla
                        let rowNode = table.row.add([
                            odonto.descripcion,
                            odonto.pieza,
                            formatoMoneda(odonto.valor),
                            0,
                            formatoMoneda(odonto.valor),
                            '',
                            '', // Columna vacía
                            '',
                        ]).draw(false).node(); // Obtener el nodo de la fila

                        // Agregar clases a la fila
                        $(rowNode).addClass('text-center align-middle');
                    }
                });
            }else{
                swal({
                    icon:'error',
                    title:'info',
                    text: resp.mensaje
                });
            }


            $('#tratamiento_presupuesto tbody').empty();
            let presupuesto = resp.presupuesto;
            console.log(presupuesto);
            $('#tratamiento_presupuesto tbody').append(`
            <tr>
                <td class="text-center align-middle">${presupuesto.fecha}</td>
                <td class="text-center align-middle">${presupuesto.id}</td>
                <td class="text-center align-middle">${presupuesto.aprobado}</td>
                <td class="text-center align-middle">Sector I</td>
                <td class="text-center align-middle">${presupuesto.boca}</td>

                <td class="text-center align-middle">
                    <div class="form-group col-md-4">
                        <div class="switch switch-success d-inline m-r-2">
                            <input type="checkbox" id="info_finalizado" checked="">
                            <label for="info_finalizado" class="cr"></label>
                        </div>
                        <label>Realizado?</label>
                    </div>
                </td>
                <td class="text-center align-middle">
                    ${presupuesto.fecha}
                </td>
                <td class="text-center align-middle">
                    <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()" ;="">
                        <i class="fa fa-plus"></i> Trabajar en pieza
                    </button>
                </td>
            </tr>
            `);

        },
        error: function(error){
            console.log(error.responseText);
        }
    });
}


function ocultar_pieza_impl(counter){
    console.log(counter);
    $('#contenedor_pieza_tto_impl'+counter).empty();
}

</script>
