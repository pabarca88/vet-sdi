<!--datos convenio-->
<div id="editarConvenioInstitucion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editarConvenioInstitucion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Edicion Convenio</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Nombre Convenio</label>
                            <input type="text" class="form-control" id="nombre_convenio_edicion" name="nombre_convenio_edicion">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tipo Convenio</label>
                            <select name="tipo_convenio_edicion" id="tipo_convenio_edicion" class="form-control">
                                <option value="0">Seleccione</option>
                                @foreach($tipos_convenio as $key_tc => $value_tc)
                                    <option value="{{ $value_tc->id }}">{{ $value_tc->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Porcentaje</label>
                            <input type="text" class="form-control" name="porcentaje_dcto_edicion" id="porcentaje_dcto_edicion">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Tipo Convenio Inst</label>
                            <select name="tipo_convenio_institucion_edicion" id="tipo_convenio_institucion_edicion" class="form-control">
                                <option value="0">Seleccione</option>
                                @foreach($tipos_convenio_institucion as $key_tc => $value_tc)
                                    <option value="{{ $value_tc->id }}">{{ $value_tc->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Fecha Inicial</label>
                            <input type="date" class="form-control" value="<?php echo date('Y-m-d') ?>" id="fecha_inicial_pago_convenio_edicion" name="fecha_inicial_pago_convenio_edicion">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Fecha Final</label>
                            <input type="date" class="form-control" value="" id="fecha_final_pago_convenio_edicion" name="fecha_final_pago_convenio_edicion">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group ">
                            <label class="floating-label-activo-sm" for="productos_convenio_">Productos a Convenir</label>
                            <select class="form-control form-control-sm" name="productos_convenio_edicion" id="productos_convenio_edicion" multiple="multiple">
                                @foreach($tipoproducto_convenios as $tp)
                                    <option value="{{ $tp->id }}">{{ $tp->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Rut representante</label>
                            <input type="text" class="form-control" oninput="formatoRut(this)" id="rut_representante_convenio_edicion" name="rut_representante_convenio_edicion">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Nombre representante</label>
                            <input type="text" class="form-control" id="nombre_representante_convenio_edicion" name="nombre_representante_convenio_edicion">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Telefono</label>
                            <input type="text" class="form-control" id="telefono_representante_convenio_edicion" name="telefono_representante_convenio_edicion">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Email</label>
                            <input type="text" class="form-control" id="email_representante_convenio_edicion" name="email_representante_convenio_edicion">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Direccion</label>
                            <input type="text" class="form-control" id="direccion_representante_convenio_edicion" name="direccion_representante_convenio_edicion">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Observaciones</label>
                            <textarea name="observaciones_edicion_convenio" id="observaciones_edicion_convenio" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-outline-warning btn-sm float-right" onclick="guardar_edicion_convenio_institucion()"><i class="fas fa-edit"></i> Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
function guardar_edicion_convenio_institucion(){
    var id_convenio_institucion = $('#id_convenio_institucion').val();
    var nombre_convenio_edicion = $('#nombre_convenio_edicion').val();
    var tipo_convenio_edicion = $('#tipo_convenio_edicion').val();
    var porcentaje_dcto_edicion = $('#porcentaje_dcto_edicion').val();
    var tipo_convenio_institucion_edicion = $('#tipo_convenio_institucion_edicion').val();
    var fecha_inicial_pago_convenio_edicion = $('#fecha_inicial_pago_convenio_edicion').val();
    var fecha_final_pago_convenio_edicion = $('#fecha_final_pago_convenio_edicion').val();
    var productos_convenio_edicion = $('#productos_convenio_edicion').val();
    var rut_representante_convenio_edicion = $('#rut_representante_convenio_edicion').val();
    var nombre_representante_convenio_edicion = $('#nombre_representante_convenio_edicion').val();
    var telefono_representante_convenio_edicion = $('#telefono_representante_convenio_edicion').val();
    var email_representante_convenio_edicion = $('#email_representante_convenio_edicion').val();
    var direccion_representante_convenio_edicion = $('#direccion_representante_convenio_edicion').val();
    var observaciones_edicion_convenio = $('#observaciones_edicion_convenio').val();

    var valido = 1;
    var mensaje = '';

    if(nombre_convenio_edicion == ''){
        valido = 0;
        mensaje += '<li>Debe ingresar nombre de convenio</li>';
    }
    if(tipo_convenio_edicion == 0){
        valido = 0;
        mensaje += '<li>Debe seleccionar tipo de convenio</li>';
    }
    if(porcentaje_dcto_edicion == ''){
        valido = 0;
        mensaje += '<li>Debe ingresar porcentaje de descuento</li>';
    }
    if(tipo_convenio_institucion_edicion == 0){
        valido = 0;
        mensaje += '<li>Debe seleccionar tipo de convenio institucion</li>';
    }
    if(fecha_inicial_pago_convenio_edicion == ''){
        valido = 0;
        mensaje += '<li>Debe ingresar fecha inicial de pago</li>';
    }
    if(fecha_final_pago_convenio_edicion == ''){
        valido = 0;
        mensaje += '<li>Debe ingresar fecha final de pago</li>';
    }
    if(productos_convenio_edicion == null){
        valido = 0;
        mensaje += '<li>Debe seleccionar productos a convenir</li>';
    }
    if(rut_representante_convenio_edicion == ''){
        valido = 0;
        mensaje += '<li>Debe ingresar rut representante</li>';
    }
    if(nombre_representante_convenio_edicion == ''){
        valido = 0;
        mensaje += '<li>Debe ingresar nombre representante</li>';
    }
    if(telefono_representante_convenio_edicion == ''){
        valido = 0;
        mensaje += '<li>Debe ingresar telefono representante</li>';
    }
    if(email_representante_convenio_edicion == ''){
        valido = 0;
        mensaje += '<li>Debe ingresar email representante</li>';
    }
    if(direccion_representante_convenio_edicion == ''){
        valido = 0;
        mensaje += '<li>Debe ingresar direccion representante</li>';
    }
    if(observaciones_edicion_convenio == ''){
        valido = 0;
        mensaje += '<li>Debe ingresar observaciones</li>';
    }

    if(valido == 0){
        swal({
            title: 'Error',
            content:{
                element: 'div',
                attributes:{
                    innerHTML: mensaje
                }
            },
            icon: 'error',
            button: 'Aceptar'
        });
        return false;
    }

    $.ajax({
        url: "{{ route('adm_cm.editar_convenio') }}",
        type: 'POST',
        data: {
            id_convenio_institucion: id_convenio_institucion,
            nombre_convenio_edicion: nombre_convenio_edicion,
            tipo_convenio_edicion: tipo_convenio_edicion,
            porcentaje_dcto_edicion: porcentaje_dcto_edicion,
            tipo_convenio_institucion_edicion: tipo_convenio_institucion_edicion,
            fecha_inicial_pago_convenio_edicion: fecha_inicial_pago_convenio_edicion,
            fecha_final_pago_convenio_edicion: fecha_final_pago_convenio_edicion,
            productos_convenio_edicion: productos_convenio_edicion,
            rut_representante_convenio_edicion: rut_representante_convenio_edicion,
            nombre_representante_convenio_edicion: nombre_representante_convenio_edicion,
            telefono_representante_convenio_edicion: telefono_representante_convenio_edicion,
            email_representante_convenio_edicion: email_representante_convenio_edicion,
            direccion_representante_convenio_edicion: direccion_representante_convenio_edicion,
            observaciones_edicion_convenio: observaciones_edicion_convenio,
            _token: "{{ csrf_token() }}",
        },
        success: function(data){
             console.log(data);
            if(data.estado == 1){
                swal({
                    title: 'Exito',
                    text: data.msj,
                    icon: 'success',
                    button: 'Aceptar'
                });
                $('#editarConvenioInstitucion').modal('hide');
                $('#card_body_convenios_institucion').empty();
                $('#card_body_convenios_institucion').html(data.v);
            }else{
                swal({
                    title: 'Error',
                    text: data.msj,
                    icon: 'error',
                    button: 'Aceptar'
                });
            }
        },
        error: function(data){
            alert('Error al editar convenio');
        }
    });
}

</script>
