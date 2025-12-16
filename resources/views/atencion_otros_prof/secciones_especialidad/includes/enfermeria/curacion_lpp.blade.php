
<div class="form-row">
    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="form-group">
            <label class="floating-label-activo-sm t-red" for="cp_cult">Toma de Cultivo</label>
            <select name="cp_cult" id="cp_cult" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_cult','div_cp_cult','obs_cp_cult',6);">
                <option selected value="0">Seleccione</option>
                <option value="1">No</option>
                <option value="2">Si</option>
                <option value="6">Observaciones</option>
            </select>
        </div>
        <div class="form-group" id="div_cp_cult" style="display:none;">
            <label class="floating-label-activo-sm t-red" for="obs_cp_cult">Observaciones <i>(Describir)</i></label>
            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_cult" id="obs_cp_cult"></textarea>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="form-group">
            <label class="floating-label-activo-sm t-red" for="cp_td">Tipos de debridamiento</label>
            <select name="cp_td" id="cp_td" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_td','div_cp_td','obs_cp_td',8);">
                <option selected value="0">Seleccione</option>
                <option value="1">Quirúrgico </option>
                <option value="2">Cortante</option>
                <option value="3">Enzimático</option>
                <option value="4">Autolítico</option>
                <option value="5">Osmótico</option>
                <option value="6">Larval</option>
                <option value="7">Mecánico</option>
                <option value="8">Otros</option>
            </select>
        </div>
        <div class="form-group" id="div_cp_td" style="display:none;">
            <label class="floating-label-activo-sm t-red" for="obs_cp_td">Otras <i>(Describir)</i></label>
            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_td" id="obs_cp_td"></textarea>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="form-group">
            <label class="floating-label-activo-sm t-red" for="cp_duch">Duchoterapia</label>
            <select name="cp_duch" id="cp_duch" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('cp_duch','div_cp_duch','obs_cp_duch',3);">
                <option selected value="0">Seleccione</option>
                <option value="1">Si</option>
                <option value="2">No</option>
                <option value="3">Observaciones</option>
            </select>
        </div>
        <div class="form-group" id="div_cp_duch" style="display:none;">
            <label class="floating-label-activo-sm t-red" for="obs_cp_duch">Observaciones <i>(Describir)</i></label>
            <textarea class="form-control form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_cp_duch" id="obs_cp_duch"></textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="form-row mt-2">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h6 class="t-aten mb-4">Tipo de Antisépticos y materiales usados</h6>
            </div>
        </div>
        <div class="form-row mt-1">
            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <label class="floating-label-activo-sm" for="desinf">Tipo de antisepticos</label>
                <select class="form-control form-control-sm" name="desinf" id="desinf" multiple="multiple">
                    <option value="1">Solución fisiológica</option>
                    <option value="2">Bialcohol</option>
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <label class="floating-label-activo-sm" for="tpo_cub">Tipo de apósitos y materiales</label>
                <select class="form-control form-control-sm" name="tpo_cub" id="tpo_cub" multiple="multiple">
                    <option value="1">Apósitos Pasivos</option>
                    <option value="2">Apósito Interactivo(Espuma Hidrofílica)</option>
                    <option value="3">Apósito Bioactivo(Alginato)</option>
                    <option value="4">Apósitos Mixtos</option>
                    <option value="5">Vasocontrictores</option>
                    <option value="6">Otros</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <label class="floating-label-activo-sm" for="obs_cur">Observaciones</label>
                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_cur" id="obs_cur"></textarea>
            </div>
        </div>
        <button class="btn btn-outline-primary btn-sm w-100 my-2">Guardar</button>
    </div>
</div>
<script>
    /** MENSAJE*/
    /** CARGAR mensaje */
    $('#mensaje_ficha').html(' Solo el campo dignóstico es obligatorio el resto es  opcional');
    $('#mensaje_ficha').show();
    setTimeout(function(){
        $('#mensaje_ficha').hide();
    }, 5000);
        /** cronico */
    $(document).ready(function() {

        $('#desinf').select2();
        $('#tpo_cub').select2();

    });


    function cargarIgual(input)
    {

        let actual = $('#'+input);
        let equivalentes = $('#'+input).attr('data-input_igual').split(',');
        $.each(equivalentes, function( index, value ) {
            var equivalente = $('#'+value);
            equivalente.val(actual.val());
        });

    }
    function evaluar_para_carga_detalle(select, div, input, valor)
    {
        var valor_select = $('#'+select+'').val();
        if(valor_select == valor) $('#'+div+'').show();
        else {
            $('#'+div+'').hide();
            $('#'+input+'').val('');
        }
    }

    function eliminarCuracion(id){
        swal({
            title: "¿Estás seguro?",
            text: "Una vez eliminado, no podrás recuperar este registro!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ route('eliminar_curacion') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "id_paciente": dame_id_paciente()
                    },
                    success: function(data){

                        // convertir json a objeto
                        var obj = JSON.parse(data);
                        var curaciones = obj.curaciones;
                        $('#tabla_curaciones_servicio tbody').empty();
                        $('#tabla_curaciones_procedimientos tbody').empty();
                        curaciones.forEach(curacion => {
                            let datos = curacion.datos_curacion;
                            $('#tabla_curaciones_servicio tbody').append(`
                                <tr>
                                    <td>${curacion.fecha} ${curacion.hora} <br> ${curacion.responsable}</td>
                                    <td class="text-center align-middle">${datos.nombre_procedimiento}</td>
                                    <td class="text-center align-middle">
                                        <input type="text" class="form-control form-control-sm" id="vigilancia_curacion_servicio${curacion.id}" />
                                    </td>
                                    <td class="text-center align-middle">
                                        <div class="switch switch-success d-inline">
                                            <input type="checkbox" id="curaciones_servicio_listo${curacion.id}" checked="">
                                            <label for="curaciones_servicio_listo${curacion.id}" class="cr"></label>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modalAgregarInsumos_">
                                            Insumos
                                        </button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-outline-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminarCuracion(${curacion.id})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            `);
                            $('$tabla_curaciones_procedimientos tbody').append(`
                            <tr>
                                <td class="text-center align-middle text-wrap hidden" hidden="hidden">1</td>
                                <td class="text-center align-middle text-wrap">Retiro de puntos</td>
                                <td class="text-center align-middle text-wrap"><input type="text" id="ind_vig_sig1" name="ind_vig_sig1" class="form-control form-control-sm"></td>
                                                                            <td class="text-center align-middle">
                                                                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminarCuracion(1)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                            </td>
                                                                        </tr>
                            `);
                        });

                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            }
        });

    }
</script>

@include('atencion_otros_prof.secciones_especialidad.includes.enfermeria.modal.insumos_servicios')
