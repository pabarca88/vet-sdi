<div id="permisos_rol_admin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="permisos_rol" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Permisos para Asistentes <br>(Agregar / Modificar / Eliminar) </h5>
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
                                    <input type="checkbox" class="custom-control-input" data-id="{{ $tipo_asistente->id }}" data-nombre="{{ $tipo_asistente->nombres }}" id="rol_permiso_{{ $tipo_asistente->id }}" onchange="cambiarRol(this, {{ $tipo_asistente->id }}, '{{ $tipo_asistente->nombres }}')">
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

<script>
// Función principal para mostrar el modal y cargar roles actuales
function roles_permisos_admin(tipo, id_administrativo, roles) {
    console.log(tipo,id_administrativo,roles);
    if (!id_administrativo) {
        swal("Error", "ID de administrativo requerido", "error");
        return false;
    }

    // Guardar el ID del administrativo
    $('#permisos_rol_admin').data('id-administrativo', id_administrativo);
    
    // Limpiar todos los checkboxes
    $('#permisos_rol_admin input[type="checkbox"]').prop('checked', false);
    
    // Activar checkboxes según roles actuales
if (roles) {
    const rolesArray = roles.split(',').map(rol => rol.trim());
    $('#permisos_rol_admin input[type="checkbox"]').each(function() {
        const rolNombre = $(this).data('nombre');
        
        // Buscar coincidencia exacta o por inicio
        const coincide = rolesArray.some(rol => {
            const rolLower = rol.toLowerCase();
            const nombreLower = rolNombre.toLowerCase();
            
            // Coincidencia exacta o el rol de la base empieza con el nombre del checkbox
            return rolLower === nombreLower || rolLower.startsWith(nombreLower);
        });
        
        if (coincide) {
            $(this).prop('checked', true);
        }
    });
}
    
    $('#permisos_rol_admin').modal('show');
}

// Función simple para cambiar rol
function cambiarRol(checkbox, idTipo, nombreTipo) {
    console.log(checkbox, idTipo, nombreTipo);
    const idAdministrativo = $('#permisos_rol_admin').data('id-administrativo');
    const isChecked = $(checkbox).prop('checked');
    
    if (!idAdministrativo) {
        swal("Error", "No se encontró el ID del administrativo", "error");
        return;
    }
    
    // Desmarcar otros checkboxes (solo un rol a la vez)
    $('#permisos_rol_admin input[type="checkbox"]').not(checkbox).prop('checked', false);
    
    // Confirmar cambio
    swal({
        title: "Cambiar Rol",
        text: `¿Desea ${isChecked ? 'asignar' : 'quitar'} el rol "${nombreTipo}"?`,
        icon: "warning",
        buttons: ["Cancelar", "Confirmar"],
        dangerMode: false,
    })
    .then((willChange) => {
        if (willChange) {
            ejecutarCambioRol(idAdministrativo, idTipo, isChecked ? 1 : 0);
        } else {
            // Revertir el checkbox si se canceló
            $(checkbox).prop('checked', !isChecked);
        }
    });
}

// Función para ejecutar el cambio de rol via AJAX
function ejecutarCambioRol(idUser, idTipo, movimiento) {
    $.ajax({
        url: "{{ route('adm_cm.personal.asistente.actualizar.rol') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            id_user: idUser,
            id_tipo: idTipo,
            id_tipo_movimiento: "ADMINISTRADOR", // Fijo para administrativos
            movimiento: movimiento
        },
        success: function(data) {
            console.log(data);
            if (data && data.estado == 1) {
                swal("Éxito", "Rol actualizado correctamente", "success")
                .then(() => {
                    $('#permisos_rol_admin').modal('hide');
                    // Recargar la tabla de personal
                    if (typeof cargar_tabla_asistentes_ === 'function') {
                        cargar_tabla_asistentes_();
                    }
                    // O recargar la página si no existe la función
                    else {
                        location.reload();
                    }
                });
            } else {
                let mensaje = data.msj || 'Error al actualizar el rol';
                swal("Error", mensaje, "error");
            }
        },
        error: function(xhr, status, error) {
            console.error('Error AJAX:', error);
            swal("Error", "Error de conexión al servidor", "error");
        }
    });
}
</script>
