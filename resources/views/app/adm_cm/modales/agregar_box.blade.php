<div id="agreg_box_ad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agreg_box_ad" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Añadir box de atención</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="modal-body">
                        <form>
                            <div class="form-row">
                                <div class="col-md-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Asignar N° al box</label>
                                        <input type="text" name="numero_box" id="numero_box" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tipo Box</label>
                                        <select class="form-control form-control-sm" name="tpo_box_servicio" id="tpo_box_servicio" onchange="dame_especializacion_box()">
                                            <option value="0">Seleccione</option>
                                            <option value="Normal">Normal</option>
                                            <option value="Especializado">Especializado</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12" id="contenedor_tpo_especializacion">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Tipo de especialización</label>
                                        <select class="form-control form-control-sm" name="tpo_especializacion" id="tpo_especializacion">
                                            <option value="0">Seleccione</option>
                                            <option value="Oftalmologia">Oftalmología</option>
                                            <option value="Otorrino">Otorrino</option>
                                            <option value="Odontologia general">Odontologia general</option>
                                            <option value="Sala de procedimientos">Sala de procedimientos</option>
                                            <option value="Vacunatorio">Vacunatorio</option>
                                            <option value="Kinesiologia y rehabilitacion">Kinesiologia y rehabilitacion</option>
                                            <option value="Etc">Etc</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 d-none">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Equipamiento</label>
                                        <select class="form-control form-control-sm" name="equip_ad" id="equip_ad" multiple="multiple">
                                            <option value="Carro paro">Carro paro</option>
                                            <option value="Oxigenoterápia">Oxigenoterápia</option>
                                            <option value="Pabellon de yeso">Pabellon de yeso</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 d-none">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Cantidad de camillas</label>
                                        <input type="number" class="form-control form-control-sm" name="n_camillas_box_servicio" id="n_camillas_box_servicio">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Ubicación</label>
                                        <select class="form-control form-control-sm" name="tpo_equip_servicio" id="tpo_equip_servicio">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Piso 1</option>
                                            <option value="2">Piso 2</option>
                                            <option value="3">Piso 3</option>
                                            <option value="4">Piso 4</option>
                                            <option value="5">Piso 5</option>
                                            <option value="6">Piso 6</option>
                                            <option value="7">Piso 7</option>
                                            <option value="8">Piso 8</option>
                                            <option value="9">Piso 9</option>
                                            <option value="10">Piso 10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="form-group">
                                        <label class="floating-label-activo-sm">Sección</label>
                                        <select class="form-control form-control-sm" name="seccion_box" id="seccion_box">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Pediatría</option>
                                            <option value="2">General</option>
                                            <option value="3">Ginecobstetricia</option>
                                            <option value="4">Rehabilitación</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Observaciones</label>
                                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ot_pat_act_" id="ot_pat_act_"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

					<div class="col-sm-12 text-center">
                        <button type="button" onclick="guardar_box_servicio()" class="btn btn-info btn-sm mx-auto" data-toggle="collapse" data-target=".info-basica" aria-expanded="false" aria-controls="info-basica-1 info-basica-2">
                            <i class="feather icon-plus"></i> Añadir
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

    function agregar_box()  {
        $('#agreg_box_ad').modal('show');
    }

    function guardar_box_servicio(){
        let numero_box = $('#numero_box').val();
        let tpo_box_servicio = $('#tpo_box_servicio').val();
        let id_institucion = $('#id_institucion').val();
        let id_lugar_atencion = $('#add_empleado_id_lugar_atencion').val();
        if(tpo_box_servicio == 'Especializado'){
            var tpo_especializacion = $('#tpo_especializacion').val();
        }else{
            var tpo_especializacion = '';
        }
        let tpo_equip_servicio = $('#tpo_equip_servicio').val();
        let seccion_box = $('#seccion_box').val();
        let ot_pat_act_ = $('#ot_pat_act_').val();
        let n_camillas_box_servicio = $('#n_camillas_box_servicio').val();
        let equip_ad = $('#equip_ad').val();
        let url = "{{ route('adm_cm.guardar_box_servicio') }}";

        var valido = 1;
        var mensaje = '';

        if(numero_box == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar el número de box</li>';
        }
        if(tpo_box_servicio == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar el tipo de box</li>';
        }

        if(tpo_box_servicio == 'Especializado' && tpo_especializacion == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar el tipo de especialización</li>';
        }
        if(tpo_equip_servicio == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la ubicación del box</li>';
        }
        if(seccion_box == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar la sección del box</li>';
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
                numero_box: numero_box,
                tpo_box_servicio: tpo_box_servicio,
                tpo_especializacion: tpo_especializacion,
                tpo_equip_servicio: tpo_equip_servicio,
                seccion_box: seccion_box,
                ot_pat_act_: ot_pat_act_,
                n_camillas_box_servicio: n_camillas_box_servicio,
                equip_ad: equip_ad,
                id_institucion: id_institucion,
                id_lugar_atencion: id_lugar_atencion,
                _token:'{{ csrf_token() }}'
            }
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {
                $('#agreg_box_ad').modal('hide');
                swal({
                    title: "Box guardado",
                    text: "Box guardado correctamente",
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
