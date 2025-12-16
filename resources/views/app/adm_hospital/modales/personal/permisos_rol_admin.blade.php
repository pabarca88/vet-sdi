<div id="permisos_rol_admin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="permisos_rol" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Permisos para Asistentes Agregar/Modificar/Eliminar </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <input type="hidden" name="permisos_rol_id" id="permisos_rol_id" value="">
            </div>
            <div class="modal-body">
                <div class="row" >
                    @if(isset($lista_tipo_administrativo))
                        @foreach ($lista_tipo_administrativo as $tipo_asistente)
                            <div class="col-md-12">
                                <div class="custom-control custom-switch">
                                    {{-- <input type="checkbox" class="custom-control-input" data-rol="{{ str_replace([' ', 'Publico', 'Consulta','Administrativo', 'ManejodeAgenda'], ['', 'Caja','','Adm', 'ManejoAgenda'], $tipo_asistente->nombre) }}" id="rol_permiso_{{ $tipo_asistente->id }}" onchange="modificar_rol({{ $tipo_asistente->id }}, 'Asistente', 'rol_permiso_{{ $tipo_asistente->id }}' )"> --}}
                                    <input type="checkbox" class="custom-control-input" data-rol="{{ str_replace([' ', 'Publico', 'Consulta','Administrativo', 'ManejodeAgenda'], ['', 'Caja','','Adm', 'ManejoAgenda'], $tipo_asistente->nombres) }}" data-id="{{ $tipo_asistente->id }}" data-id_tipo_movimiento="Admin" id="rol_permiso_{{ $tipo_asistente->id }}" onchange="confirmar_modificar_rol({{ $tipo_asistente->id }}, 'Asistente', 'rol_permiso_{{ $tipo_asistente->id }}' )">
                                    <label class="custom-control-label" for="rol_permiso_{{ $tipo_asistente->id }}">{{ $tipo_asistente->nombres }}</label>
                                </div>

                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

{{-- modal confirmacion --}}
<div id="permisos_rol_admin_confirmacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="permisos_rol_confirmacion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Confirmación actualizacion de Permisos para Asistentes </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="permisos_rol_confirmacion_id_tipo" id="permisos_rol_confirmacion_id_tipo" value="">
                <input type="hidden" name="permisos_rol_confirmacion_id_tipo_movimiento" id="permisos_rol_confirmacion_id_tipo_movimiento" value="">
                <input type="hidden" name="permisos_rol_confirmacion_id_checkbox" id="permisos_rol_confirmacion_id_checkbox" value="">
                <div class="row" >
                    <p>Esta por Actualiza el Tipo de Usuario.<br/>
                    Si desea confirmar el cambio presione "Continuar"<br/>
                    Si NO desea confirmar el cambio presione "Cancelar"</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-sm mx-auto" onclick="confirmar_modificacion($('#permisos_rol_confirmacion_id_tipo').val(), $('#permisos_rol_confirmacion_id_tipo_movimiento').val(), $('#permisos_rol_confirmacion_id_checkbox').val());">Continuar</button>
                <button type="button" class="btn btn-danger btn-sm mx-auto" onclick="cancelar_modificacion($('#permisos_rol_confirmacion_id_checkbox').val())">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>

    function roles_permisos_admin(tipo, id_asistente, roles)
    {
        var mensaje = '';
        if(tipo == '')
        {
            mensaje = 'Rol Actual del Asistente requerido.';
             swal({
                title: "Campos requeridos",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }
        if(id_asistente == '')
        {
            mensaje = 'ID Asistente requerido';
             swal({
                title: "Campos requeridos",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return false;
        }

        var temp = roles.split(',');
        console.log(temp);

        /** limpieza */
        $('#permisos_rol_admin').find('input,textarea,select,checkbox').each(function(key, element){
            if($(element).attr('type') == 'checkbox')
            {
                $(element).prop('checked', '');
            }
            else if($(element).attr('type') == 'hidden')
            {
                $(element).val('');
            }
        });

        /** activar */
        $('#permisos_rol_admin').find('input,textarea,select,checkbox').each(function(key, element){
            if($(element).attr('type') == 'checkbox')
            {
                temp.forEach(element2 => {
                    if(element2 == $(element).attr('data-rol'))
                        $(element).prop('checked', true);
                });
            }
        });

        $('#permisos_rol_admin').modal('show');
        $('#permisos_rol_id_admin').val(id_asistente);
    }

    function modificar_rol(id_tipo, id_tipo_movimiento, id_checkbox )
    {
        $('#permisos_rol_admin_confirmacion').modal('hide');
        let _token = CSRF_TOKEN;
        let url = "{{ route('adm_cm.personal.asistente.actualizar.rol') }}";

        var movimiento = 0;
        if($('#'+id_checkbox).prop('checked'))
            movimiento = 1;
        else
            movimiento = 0;


        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: _token,
                id_user : $('#permisos_rol_admin_id').val(),
                id_tipo : $('#'+id_checkbox).attr('data-rol'),
                id_tipo_movimiento : id_tipo_movimiento,
                movimiento : movimiento,
            },
        })
        .done(function(data) {
            if (data != null) {
                if(data.estado == 1)
                {
                    swal({
                        title: "Actualizacion de permiso",
                        text: 'Registro Exitoso.',
                        icon: "success",
                        buttons: "Aceptar",
                    });
                    $('#permisos_rol_admin').modal('hide');
                    cargar_tabla_asistentes_();
                }
                else
                {
                    var mensaje = '';
                    if(data.error)
                    {
                        $.each(data.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Actualizacion de permiso",
                        text: mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            }
            else
            {
                swal({
                    title: "Error",
                    text: "Error al cargar ingresar personal",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function confirmar_modificar_rol( id_tipo, id_tipo_movimiento, id_checkbox )
    {
        $('#permisos_rol_confirmacion').modal('show');
        $('#permisos_rol_confirmacion_id_tipo').val(id_tipo);
        $('#permisos_rol_confirmacion_id_tipo_movimiento').val(id_tipo_movimiento);
        $('#permisos_rol_confirmacion_id_checkbox').val(id_checkbox);
    }

    function cancelar_modificacion(id_checkbox)
    {
        if( $('#'+id_checkbox).prop('checked') )
        {
            $('#'+id_checkbox).prop('checked', false);
        }
        else
        {
            $('#'+id_checkbox).prop('checked', true);
        }
        $('#permisos_rol_confirmacion').modal('hide');
    }

    function confirmar_modificacion( id_tipo, id_tipo_movimiento, id_checkbox )
    {
        $('#permisos_rol_admin .modal-body').find('input').each(function(key, element){
            if( $(element).attr('type') == 'checkbox')
            {
                if(id_checkbox != $(element).attr('id') )
                {
                    if( $(element).prop('checked') )
                    {
                        // var rol = $(element).attr('data-rol');
                        var id_tipo2 = $(element).attr('data-id');
                        var id_tipo_movimiento2 = $(element).attr('data-id_tipo_movimiento');
                        var id_checkbox2 = $(element).attr('id');

                        console.log(id_tipo2);
                        console.log(id_tipo_movimiento2);
                        console.log(id_checkbox2);
                        console.log('**********');
                        $(element).prop('checked', false);
                        modificar_rol(id_tipo2, id_tipo_movimiento2, id_checkbox2 );
                    }
                }
            }
        });

        modificar_rol(id_tipo, id_tipo_movimiento, id_checkbox );
    }

</script>
