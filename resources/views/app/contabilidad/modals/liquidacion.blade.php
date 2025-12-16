<div id="liquidacion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="liquidacion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Liquidaci&oacute;n Centro M&eacute;dico</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Rut</label>
                                <input type="text" class="form-control form-control-sm" name="rut_prof" id="rut_prof">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Fecha Liquidaci&oacute;n</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_liq" id="fecha_liq" value="<?php echo date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">N&deg; Atenciones</label>
                                <input class="form-control form-control-sm" name="n_atenc" id="n_atenc" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Descuentos</label>
                                <input class="form-control form-control-sm" name="desc" id="desc" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Porcentaje</label>
                                <input class="form-control form-control-sm" name="porc" id="porc" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Total</label>
                                <input class="form-control form-control-sm" name="total_pago" id="total_pago" type="text" >
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right my-3" onclick="generar_liquidacion()">Generar liquidación</button>
                        </div>
                    </div>

                <form>
                <div class="col-sm-12 mt-3">

                        <table class="table table-bordered w-100" id="tabla_liquidaciones_profesional">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Mes</th>
                                    <th class="text-center align-middle">N&deg; Atenciones</th>
                                    <th class="text-center align-middle">&#37;</th>
                                    <th class="text-center align-middle">Descuentos</th>
                                    <th class="text-center align-middle">A Pagar</th>
                                    <th class="text-center align-middle">ver PDF</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_liquidaciones_profesional">

                            </tbody>
                        </table>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="switch switch-success d-inline m-r-10">
                            <input type="checkbox" id="correo-contador" checked="">
                            <label for="correo-contador" class="cr"></label>
                        </div>
                        <label>Notificar por correo electr&oacute;nico</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function generar_liquidacion(){
        let rut = $('#rut_prof').val();
        let fecha = $('#fecha_liq').val();
        let numero_atenciones = $('#n_atenc').val();
        let descuentos = $('#desc').val();
        let porcentaje = $('#porc').val();
        let total_pago = $('#total_pago').val();
        let id_profesional = $('#id_profesional').val();
        let id_institucion = $('#id_institucion').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        var id_contrato = $('#id_contrato').val();

        let valido = 1;
        let mensaje = '';

        if(rut == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar rut</li>';
        }
        if(fecha == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar fecha</li>';
        }
        if(numero_atenciones == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar numero de atenciones</li>';
        }
        if(descuentos == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar descuentos</li>';
        }
        if(porcentaje == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar porcentaje</li>';
        }
        if(total_pago == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar total</li>';
        }

        if(valido == 0){
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
            return false;
        }

        let data = {
            rut: rut,
            fecha: fecha,
            numero_atenciones: numero_atenciones,
            descuentos: descuentos,
            porcentaje: porcentaje,
            total_pago: total_pago,
            id_profesional: id_profesional,
            id_institucion: id_institucion,
            id_lugar_atencion: id_lugar_atencion,
            id_contrato: id_contrato,
            _token: CSRF_TOKEN
        }

        let url = '{{ ROUTE("adm_cm.generar_liquidacion_profesional") }}';

        $.ajax({
            type:'post',
            data: data,
            url: url,
            success: function(resp){
                console.log(resp);
                if(resp.estado == 'OK'){
                    swal({
                        title:'exito',
                        text:resp.mensaje,
                        icon:'success'
                    });
                }else{
                    swal({
                        title:'error',
                        text: resp.mensaje,
                        icon:'error'
                    });
                }
                limpiar_formulario_liquidaciones();
                $('#liquidacion').modal('hide');
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

    function limpiar_formulario_liquidaciones(){
        $('#rut_prof').val('');
        $('#n_atenc').val('');
        $('#desc').val('');
        $('#porc').val('');
        $('#total_pago').val('');
    }
</script>
