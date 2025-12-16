<div id="agregar_salas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_salas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Agregar Salas a servicios</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Servicio</label>
                                        <select class="form-control form-control-sm" name="servicio_salas" id="servicio_salas" >
                                            <option value="0">Seleccione</option>
                                            @foreach ($servicios_internos as $servicio)
                                                <option value="{{ $servicio->id }}">{{ $servicio->nombre_servicio }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Cantidad de Salas</label>
                                        <input type="number" name="cantidad_salas" id="cantidad_salas" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Camillas por sala</label>
                                        <input type="number" name="camillas_salas" id="camillas_salas" class="form-control form-control-sm">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="observaciones_salas_servicio" id="observaciones_salas_servicio"></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>

					<div class="col-sm-12">
                        <button type="button" onclick="guardar_salas_servicio()" class="btn btn-info btn-sm float-right" data-toggle="collapse" data-target=".info-basica" aria-expanded="false" aria-controls="info-basica-1 info-basica-2">
                            <i class="feather icon-check-square"></i> Guardar cambios
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {

        $('#equip_ad').select2();
        // $('#tpo_cub').select2();
        $('#equip_ed').select2();
    });

    function agregar_sala()  {
        $('#agregar_salas').modal('show');
    }

    function guardar_salas_servicio(){
        let cantidad_salas = $('#cantidad_salas').val();
        let camillas_salas = $('#camillas_salas').val();
        let servicio_salas = $('#servicio_salas').val();
        let id_institucion = $('#id_institucion').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        let observaciones_salas_servicio = $('#observaciones_salas_servicio').val();
        let url = "{{ route('adm_hospital.guardar_salas_servicio') }}";

        var valido = 1;
        var mensaje = '';

        if(cantidad_salas == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar cantidad de salas</li>';
        }
        if(camillas_salas == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar cantidad de camillas por sala</li>';
        }
        if(servicio_salas == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar un servicio</li>';
        }
        if(observaciones_salas_servicio == 0){
            valido = 0;
            mensaje += '<li>Debe ingresar observaciones</li>';
        }
        if(valido == 0){
            swal({
                title: "Error",
                content:{
                    element: "div",
                    attributes:{
                        innerHTML: mensaje
                    }
                },
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
            return false;
        }

        $.ajax({
            url: url,
            type: "post",
            data: {
                cantidad_salas: cantidad_salas,
                servicio_salas: servicio_salas,
                observaciones_salas_servicio: observaciones_salas_servicio,
                id_institucion: id_institucion,
                id_lugar_atencion: id_lugar_atencion,
                _token:'{{ csrf_token() }}'
            }
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {
                $('#agregar_salas').modal('hide');
                swal({
                    title: "Servicio guardado",
                    text: "Servicio guardado correctamente",
                    icon: "success",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
                $('#tabla_boxes_atencion').empty();
                $('#tabla_boxes_atencion').append(data.v);
            }else{
                swal({
                    title: "Error",
                    text: "Error al guardar el box",
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }
        });
    }

    function dame_especializacion_box(){
        let tipo_box = $('#tpo_box_servicio').val();
        console.log(tipo_box);
        if(tipo_box == 'Especializado'){
            $('#contenedor_tpo_especializacion').removeClass('d-none');
        }else{
            $('#contenedor_tpo_especializacion').addClass('d-none');
        }
    }

    function editar_dame_especializacion_box(){
        let tipo_box = $('#editar_tpo_box_servicio').val();
        console.log(tipo_box);
        if(tipo_box == 'Especializado'){
            $('#editar_contenedor_tpo_especializacion').removeClass('d-none');
        }else{
            $('#editar_contenedor_tpo_especializacion').addClass('d-none');
        }
    }
</script>
