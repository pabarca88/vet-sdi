<table class="display table table-striped table-hover dt-responsive nowrap w-100" id="tabla_curaciones_lpp_servicio">
    <thead>
        <tr>
            <th class="text-center align-middle">Fecha y Hora</th>
            <th class="text-center align-middle">Grado</th>
            <th class="text-center align-middle">Localización</th>
            <th class="text-center align-middle">Acción</th>
            <th class="text-center align-middle">materiales</th>
            <th class="text-center align-middle">acciones</th>
        </tr>
    </thead>
    <tbody>
        @if($curaciones_lpp->count() > 0)
        @foreach($curaciones_lpp as $cl)
        <tr>
            <td class="text-center align-middle">{{ $cl->fecha}} {{ $cl->hora }} <br> {{ $cl->responsable }} </td>
            <td class="text-center align-middle">{{ $cl->datos_curacion_lpp->upp_gr_eval }}</td>
            <td class="text-center align-middle">{{ $cl->datos_curacion_lpp->upp_local_eval }}</td>
            <td class="text-center align-middle"><div class="switch switch-success d-inline">
                <input type="checkbox" id="curacion_lpp_servicio_listo{{ $cl->id }}">
                <label for="curacion_lpp_servicio_listo{{ $cl->id }}" class="cr"></label>
            </div></td>
            <td class="text-center align-middle"><button type="button" class="btn btn-outline-primary btn-sm" data-target="#modalAgregarInsumo" data-toggle="modal">Insumos</button></td>
            <td class="text-center align-middle"><button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_curacion_lpp_servicio({{ $cl->id }})"><i class="fas fa-trash"></i> </button></td>
        @endforeach
        @endif
    </tbody>
</table>
<div class="form-row">
    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
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
    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
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
    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
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
                <h6 class="t-aten">Tipo de Antisépticos y materiales usados</h6>
            </div>
        </div>
        <div class="form-row mt-1">
            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <label class="floating-label-activo-sm" for="antisep">Seleccionar tipo de antisepticos</label>
                <select class="form-control form-control-sm" name="antisep" id="antisep" multiple="multiple">
                    <option value="1">Solución fisiológica</option>
                    <option value="2">Bialcohol</option>
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <label class="floating-label-activo-sm" for="tpo_apos">Seleccionar tipo de apósitos y materiales</label>
                <select class="form-control form-control-sm" name="tpo_apos" id="tpo_apos" multiple="multiple">
                    <option value="1">Apósitos Pasivos</option>
                    <option value="2">Apósito Interactivo (Espuma Hidrofílica)</option>
                    <option value="3">Apósito Bioactivo (Alginato)</option>
                    <option value="4">Apósitos Mixtos</option>
                    <option value="5">Vasocontrictores</option>
                    <option value="6">Otros</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <label class="floating-label-activo-sm" for="antisep">Observaciones</label>
                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ot_pat_act" id="ot_pat_act"></textarea>
            </div>
        </div>

    </div>
</div>
<button class="btn btn-outline-primary btn-sm w-100 my-2">Guardar</button>
<script>
    /** MENSAJE*/
    /** CARGAR mensaje */
    $('#mensaje_ficha').html(' Solo el campo dignóstico es Obligatorio el resto es  opcional');
    $('#mensaje_ficha').show();
    setTimeout(function(){
        $('#mensaje_ficha').hide();
    }, 5000);
        /** cronico */
    $(document).ready(function() {
        $('#pat_pat').select2();
        $('#antisep').select2();
        $('#tpo_apos').select2();
        $('#pat_prop').select2();
        $('#sint_act').select2();
        $('#gin_obt').select2();
        $('#select_5').select2();
        $('#select_6').select2();
        $('#select_7').select2();
        $('#select_8').select2();
        $('#select_9').select2();
        $('#select_10').select2();
        $('#select_11').select2();
        $('#select_12').select2();
        $('#select_13').select2();
        $('#select_14').select2();
        $('#select_15').select2();
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

    function eliminar_curacion_lpp_servicio(id){
        swal({
            title: "¿Estás seguro?",
            text: "Una vez eliminado, no podrás recuperar este registro!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                confirmar_eliminacion_curacion_lpp_servicio(id);
            } else {
                swal("Operación cancelada!");
            }
        });
    }

    function confirmar_eliminacion_curacion_lpp_servicio(id){
        var id = id;
        var url = "{{ route('enfermeria.eliminar_curacion_lpp_servicio', 'id') }}";
        url = url.replace('id', id);
        $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        let mensaje = response.mensaje;
                        if(mensaje == "OK"){
                            let curaciones_lpp = response.curaciones_lpp;
                            $('#tabla_curaciones_lpp_servicio tbody').empty();
                            $.each(curaciones_lpp, function(index, value){
                                let fila = '<tr>';
                                fila += '<td class="text-center align-middle">'+value.fecha+' '+value.hora+'<br>'+value.responsable+'</td>';
                                fila += '<td class="text-center align-middle">'+value.datos_curacion_lpp.upp_gr_eval+'</td>';
                                fila += '<td class="text-center align-middle">'+value.datos_curacion_lpp.upp_local_eval+'</td>';
                                fila += '<td class="text-center align-middle"><div class="switch switch-success d-inline"><input type="checkbox" id="curacion_lpp_servicio_listo'+value.id+'"><label for="curacion_lpp_servicio_listo'+value.id+'" class="cr"></label></div></td>';
                                fila += '<td class="text-center align-middle"><button type="button" class="btn btn-outline-primary btn-sm" data-target="#modalAgregarInsumo" data-toggle="modal">Insumos</button></td>';
                                fila += '<td class="text-center align-middle"><button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_curacion_lpp_servicio('+value.id+')"><i class="fas fa-trash"></i> </button></td>';
                                $('#tabla_curaciones_lpp_servicio tbody').append(fila);
                            });
                        }else{
                            swal({
                                title: "Error",
                                text: mensaje,
                                icon: "error",
                                button: "Aceptar",
                            });
                        }
                    }
    });
    }
</script>
