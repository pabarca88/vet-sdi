<div id="modal_insumos_lab" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_insumos_lab" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="insumosModalLabel">Insumos para el tratamiento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
          </div>
          <div class="modal-body">

            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="floating-label-activo-sm">Profesional</label>
                        <input type="text" name="" id="" class="form-control form-control-sm" value="{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="floating-label-activo-sm">Paciente</label>
                        <input type="text" name="" id="" class="form-control form-control-sm" value="{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}">
                    </div>
                </div>
                <div class="col-md-2" id="tipo_insumo_select">
                    <div class="form-group">
                        <label for="tipoInsumo" class="floating-label-activo-sm">Tipo de Insumo</label>
                        <select name="tipoInsumo_lab" id="tipoInsumo_lab" class="form-control form-control-sm" onchange="dame_marcas_implantes_lab(this)">
                            <option value="0">Seleccione</option>
                            <option value="8">Aditamentos</option>
                            <option value="9">Otros Insumos</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" id="insumos_select">
                    <div class="form-group">
                    <label for="" class="floating-label-activo-sm" id="titulo_tipo_insumo">Insumos</label>
                    <select name="nombreInsumo_lab" data-titulo="Ex_cuello" data-seccion="Cuello" id="nombreInsumo_lab" class="form-control form-control-sm">
                        <option value="0">Seleccione</option>
                    </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="floating-label-activo-sm">Cantidad</label>
                        <input type="number" name="cantidad_lab_modal" id="cantidad_lab_modal" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="floating-label-activo-sm">Valor</label>
                        <input type="number" name="precio_lab_modal" id="precio_lab_modal" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" class="floating-label-activo-sm">Total</label>
                        <input type="text" name="total_lab_modal" id="total_lab_modal" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-11">
                    <div class="form-group">
                        <label for="" class="floating-label-activo-sm">Observaciones</label>
                        <textarea class="form-control caja-texto form-control-sm mb-9" name="insumos_obs_tto_lab_modal" id="insumos_obs_tto_lab_modal" cols="30" rows="1" onfocus="this.rows = 4" onblur="this.rows=1"></textarea>
                    </div>

                </div>
                <div class="col-1">
                    <button type="button" class="btn btn-icon btn-primary" onclick="guardar_insumo_lab()"><i class="feather icon-shopping-cart"></i></button>
                </div>
            </div>
            <hr>
            <h5 class="mb-3">Laboratorio</h5>
            <div class="form-row">
                <div class="col-9">
                    <div class="form-group fill">
                        <label class="floating-label-activo-sm">Tratamiento</label>
                        <input type="text" name="diag_presupuesto_lab_impl" id="diag_presupuesto_lab_impl" placeholder="DESCRIBA EL TRATAMIENTO PARA LABORATORIO" class="form-control form-control-sm ui-autocomplete-input" autocomplete="off">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Valor</label>
                        <input type="text" name="precio_lab_tto" id="precio_lab_tto" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="col-1">
                    <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_rehab_impl_lab()"><i class="feather icon-shopping-cart"></i></button>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
    </div>
</div>

<script>
    function guardar_insumo_lab(){
        let nombreInsumo = $('#nombreInsumo_lab option:selected').text();
        let tipoInsumo = $('#tipoInsumo_lab').val();
        if(tipoInsumo == 1){
            var marcaInsumo = $('#marcasImplantes_lab option:selected').text();
        }else{
            var marcaInsumo = '';
        }
        var idMarcaInsumo = $('#marcasImplantes_lab').val();
        console.log(idMarcaInsumo);
        let tipoInsumo_text = $('#tipoInsumo_lab option:selected').text();
        let cantidad = $('#cantidad_lab_modal').val();
        let precio = $('#precio_lab_modal').val();
        let total = $('#total_lab_modal').val();

        console.log(tipoInsumo);

        let mensaje = '';
        let valido = 1;

        if(nombreInsumo == ''){
            valido = 0;
            mensaje += '<li>Nombre insumo </li>';
        }
        if(tipoInsumo == 0){
            valido = 0;
            mensaje += '<li>Tipo de Insumo </li>';
        }
        if(cantidad == '' || cantidad <= 0){
            valido = 0;
            mensaje += '<li>Cantidad </li>';
        }
        if(precio == '' || cantidad <= 0){
            valido = 0;
            mensaje += '<li>Precio </li>';
        }

        if(valido == 1){
            let data = {
                insumos: nombreInsumo,
                idTipoInsumo: tipoInsumo,
                tipoInsumo: tipoInsumo_text,
                marcaInsumo: marcaInsumo,
                idMarcaInsumo: idMarcaInsumo,
                cantidad: cantidad,
                valor: precio,
                total: total,
                id_paciente: $('#id_paciente_fc').val(),
                id_ficha_atencion: $('#id_fc').val(),
                observaciones: $('#insumos_obs_tto').val(),
                impl_rehab: 1,
                _token: CSRF_TOKEN
            }

            console.log(data);
            let url = '{{ ROUTE("dental.agregar_insumos_tto") }}';
            $.ajax({
                url: url,
                type:'post',
                data: data,
                success: function(resp){
                    console.log(resp);
                    if(resp.mensaje == 'ok'){
                        swal({
                            icon:'success',
                            text:'Se a agregado los insumos correctamente',
                            title:'Exito'
                        });
                        let nuevo_insumo = resp.insumo;
                        cargar_a_presupuesto_insumo(nuevo_insumo.id);
                        $('#modal_insumos').modal('hide');
                        //limpiar_formulario_insumo();
                        let insumos = resp.insumos;
                        console.log(insumos);
                        let table = $('#table_insumos_rehab_impl').DataTable();

                        //Limpiar la tabla sin perder la configuración de DataTables
                        table.clear();

                        //Recorrer el array de insumos y agregarlos a la tabla
                        insumos.forEach(insumo => {
                            if(insumo.impl_rehab == 1){
                                let total = insumo.cantidad * insumo.valor;
                                                 // Botones de acción
                                if(insumo.presupuesto == 0 || insumo.presupuesto == null){
                                        // Botones de acción
                                    var botones = `
                                        <td>
                                            <button type="button" class="btn btn-icon btn-primary" onclick="cargar_a_presupuesto_insumo(${insumo.id},'lab')">
                                                <i class="feather icon-shopping-cart"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id},'lab')"><i class="feather icon-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id},'lab')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>`;
                                }else{
                                    var botones = `
                                        <td>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="sacar_de_presupuesto_insumo(${insumo.id},'lab')">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-icon btn-warning" onclick="dame_insumo(${insumo.id},'lab')"><i class="feather icon-edit"></i></button>
                                            <button type="button" class="btn btn-icon btn-danger" onclick="eliminar_insumo(${insumo.id},'lab')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>`;
                                }
                                table.row.add([
                                    insumo.insumos + ' ' + insumo.nombre_marca,         // Nombre del insumo
                                    insumo.observaciones,
                                    insumo.cantidad,       // Cantidad utilizada
                                    formatoMoneda(insumo.valor),         // Unidad de medida
                                    formatoMoneda(total),
                                    botones
                                ]);
                            }

                        });

                        //Dibujar la tabla nuevamente con los nuevos datos
                        table.draw();
                        dame_insumos_tratamiento();
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }else{
            swal({
                title: "Campos requeridos",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }



    }



</script>
